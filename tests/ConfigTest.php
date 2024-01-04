<?php declare(strict_types=1);

namespace Moteam\Kernel\Tests;

require __DIR__ . "/Services/TestService.php";
require __DIR__ . "/TestPackage/Methods/TestMethod.php";
require __DIR__ . "/TestPackage/Methods/InnerMethod.php";
require __DIR__ . "/TestPackage/Methods/ProcMethod.php";
require __DIR__ . "/TestPackage/TestPackage.php";
require __DIR__ . "/_functions.php";

use Moteam\Kernel\Tests\TestPackage\Methods\InnerMethod;
use Moteam\Kernel\Tests\TestPackage\Methods\ProcMethod;
use Moteam\Kernel\Tests\TestPackage\Methods\TestMethod;
use PHPUnit\Framework\TestCase;
use Moteam\Kernel\Tests\Services\TestService;
use Moteam\Kernel\Tests\TestPackage\TestPackage;
use function Moteam\Kernel\Tests\getConfig;

class ConfigTest extends TestCase {
    public function testMain() {
        $config = getConfig();

        $this->assertEquals(__DIR__ . "/build", $config->getBuildPath());

        $this->assertEquals("Moteam\\Kernel\\Tests\\build", $config->getBuildNamespace());

        $this->assertInstanceOf(\Closure::class, $config->getDefinition("int"));
        $this->assertInstanceOf(\Closure::class, $config->getDefinition("string"));
        $this->assertInstanceOf(\Closure::class, $config->getDefinition(TestService::class));
        
        $this->assertContains(TestPackage::class, $config->getPackages());
        $this->assertArrayHasKey("test.inner", $config->getMethods());
        $this->assertArrayHasKey("test.method", $config->getMethods());
        $this->assertArrayHasKey("test.proc", $config->getMethods());
        $this->assertEquals(InnerMethod::class, $config->getMethods()["test.inner"]);
        $this->assertEquals(TestMethod::class, $config->getMethods()["test.method"]);
        $this->assertEquals(ProcMethod::class, $config->getMethods()["test.proc"]);
    }
}