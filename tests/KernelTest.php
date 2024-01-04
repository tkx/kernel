<?php declare(strict_types=1);

namespace Moteam\Kernel\Tests;
use Moteam\Kernel\Tests\TestPackage\Methods\BadMethodResponse;
use Moteam\Kernel\Tests\TestPackage\Methods\InnerMethodResponse;
use Moteam\Kernel\Tests\TestPackage\Methods\TestMethodResponse;
use PHPUnit\Framework\TestCase;

use function Moteam\Kernel\Tests\getConfig;
use function Moteam\Kernel\Tests\getKernel;
use Moteam\Kernel\Builder;

class KernelTest extends TestCase {
    public function testMain() {
        $config = getConfig();
        $kernel = getKernel($config);

        Builder::b($config);

        /** @var TestMethodResponse $res */
        $res = $kernel->run("test.method", ["key" => "test", "value" => 123]);

        $this->assertInstanceOf(TestMethodResponse::class, $res);
        $this->assertEquals(123, $res->value);
        $this->assertEquals("test", $res->key);
        $this->assertLessThanOrEqual(123, $res->rnd);
        $this->assertGreaterThanOrEqual(0, $res->rnd);
        $this->assertTrue(\strlen($res->proc) == 32 && \ctype_xdigit($res->proc));
        $this->assertInstanceOf(InnerMethodResponse::class, $res->inner);
    }
}