<?php declare(strict_types=1);

namespace Moteam\Kernel;
use Moteam\Kernel\Contracts\KernelInterface;
use Moteam\Kernel\Contracts\ConfigInterface;

/**
 * @inheritDoc
 * Basic KernelInterface implementation.
 */
class Kernel implements KernelInterface {
    private ConfigInterface $_config;

    public function __construct(ConfigInterface $config) {
        $this->_config = $config;
    }

    /**
     * @inheritDoc
     */
    public function getConfig(): ConfigInterface {
        return $this->_config;
    }

    /**
     * @inheritDoc
     */
    public function run(string $name, array $params = []) {
        /** @var MethodInvoker $klass */
        $klass = \basename(\str_replace('\\', '/', $this->getConfig()->getMethods()[$name] . "Invoker"));
        require $this->getConfig()->getBuildPath() . "/" . $klass . ".php";
        $klass = $this->getConfig()->getBuildNamespace() . "\\" . $klass;
        /** @var MethodInvoker $method */
        $method = new $klass();
        return $method($this, $params);
    }

}