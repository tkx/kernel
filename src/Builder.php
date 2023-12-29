<?php declare(strict_types=1);

namespace Moteam\Kernel;
use Moteam\Kernel\Contracts\ConfigInterface;
use Moteam\Kernel\Contracts\BuilderInterface;

class Builder implements BuilderInterface {
    public static function b(ConfigInterface $config) {
        (new static())->build($config);
    }

    /**
     * @inheritDoc
     */
    public function build(ConfigInterface $config): self {
        $bns = $config->getBuildNamespace();

        foreach($config->getMethods() as $name => $klass) {
            /**
             * @var string $klassName
             * Class name without namespace
             */
            $klassName = \basename(\str_replace('\\', '/', $klass));

            /** @var array<\ReflectionParameter> $params */
            $params = (new \ReflectionClass($klass))->getMethod("__invoke")->getParameters();
            
            /** @var string $paramParts */
            $paramParts = \implode("\n", 
                \array_map(
                    fn(array $entry) => "\t\t\t(\$kernel->getConfig()->getDefinition({$entry["type"]}))(\"{$entry["name"]}\", \$params),",
                    \array_map(
                        fn(\ReflectionParameter $p) => [
                            "name" => $p->getName(),
                            "type" => $p->getType()->isBuiltin() ? ('"' . $p->getType()->getName() . '"') : ("\\" . $p->getType()->getName() . "::class"),
                        ],
                        $params
                    )
                )
            );

            $tpl = "<?php declare(strict_types=1);
/**
 * THIS CODE IS GENERATED. DO NOT MODIFY.
 */
namespace {$bns};

use Moteam\Kernel\Contracts\KernelInterface;
use Moteam\Kernel\MethodInvoker;
use {$klass};

class {$klassName}Invoker extends MethodInvoker {
	public function __invoke(KernelInterface \$kernel, array \$params) {
		return (new {$klassName}(\$kernel))(
{$paramParts}
		);
	}
}
            ";

            \file_put_contents(
                $config->getBuildPath() . "/" . $klassName . "Invoker.php",
                $tpl
            );
        }

        return $this;
    }
}