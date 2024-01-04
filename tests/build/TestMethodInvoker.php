<?php declare(strict_types=1);
/**
 * THIS CODE IS GENERATED. DO NOT MODIFY.
 */
namespace Moteam\Kernel\Tests\build;

use Moteam\Kernel\Contracts\KernelInterface;
use Moteam\Kernel\MethodInvoker;
use Moteam\Kernel\Tests\TestPackage\Methods\TestMethod;

class TestMethodInvoker extends MethodInvoker {
	public function __invoke(KernelInterface $kernel, array $params): \Moteam\Kernel\Tests\TestPackage\Methods\TestMethodResponse {
		return (new TestMethod($kernel))(
			($kernel->getConfig()->getDefinition("string"))("key", $params),
			($kernel->getConfig()->getDefinition("int"))("value", $params),
			($kernel->getConfig()->getDefinition(\Moteam\Kernel\Tests\Services\TestService::class))("testService", $params),
		);
	}
}
            