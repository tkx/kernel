<?php declare(strict_types=1);

namespace Moteam\Kernel\Tests;
use PHPUnit\Framework\TestCase;

use function Moteam\Kernel\Tests\getConfig;
use Moteam\Kernel\Builder;

class BuilderTest extends TestCase {
    public function testMain() {
        $config = getConfig();

        (new Builder())->build($config);

        foreach($config->getMethods() as $name => $klass) {
            $klassName = \basename(\str_replace('\\', '/', $klass));
            $this->assertFileExists($config->getBuildPath() . "/{$klassName}Invoker.php");
        }
    }
}