<?php declare(strict_types=1);
/**
 * THIS CODE IS GENERATED. DO NOT MODIFY.
 */
namespace X\build;

use Moteam\Kernel\Contracts\KernelInterface;
use Moteam\Kernel\MethodInvoker;
use X\TestPackage\Methods\InnerMethod;

class InnerMethodInvoker extends MethodInvoker {
	public function __invoke(KernelInterface $kernel, array $params) {
		return (new InnerMethod($kernel))(

		);
	}
}
            