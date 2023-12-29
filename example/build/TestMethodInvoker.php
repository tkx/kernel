<?php declare(strict_types=1);
/**
 * THIS CODE IS GENERATED. DO NOT MODIFY.
 */
namespace X\build;

use Moteam\Kernel\Contracts\KernelInterface;
use Moteam\Kernel\MethodInvoker;
use X\TestPackage\Methods\TestMethod;

class TestMethodInvoker extends MethodInvoker {
	public function __invoke(KernelInterface $kernel, array $params) {
		return (new TestMethod($kernel))(
			($kernel->getConfig()->getDefinition("string"))("key", $params),
			($kernel->getConfig()->getDefinition("int"))("value", $params),
			($kernel->getConfig()->getDefinition(\X\Services\TestService::class))("testService", $params),
		);
	}
}
            