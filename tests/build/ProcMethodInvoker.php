<?php declare(strict_types=1);
/**
 * THIS CODE IS GENERATED. DO NOT MODIFY.
 */
namespace Moteam\Kernel\Tests\build;

use Moteam\Kernel\Contracts\KernelInterface;
use Moteam\Kernel\MethodInvoker;
use Moteam\Kernel\Tests\TestPackage\Methods\ProcMethod;

class ProcMethodInvoker extends MethodInvoker {
	public function __invoke(KernelInterface $kernel, array $params) {
		return (new ProcMethod($kernel))(

		);
	}
}
            