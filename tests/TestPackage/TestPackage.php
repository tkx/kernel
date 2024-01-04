<?php
namespace Moteam\Kernel\Tests\TestPackage;

use Moteam\Kernel\Package;
use Moteam\Kernel\Tests\TestPackage\Methods\TestMethod;
use Moteam\Kernel\Tests\TestPackage\Methods\TestMethodResponse;
use Moteam\Kernel\Tests\TestPackage\Methods\InnerMethodResponse;
use Moteam\Kernel\Tests\TestPackage\Methods\InnerMethod;
use Moteam\Kernel\Tests\TestPackage\Methods\ProcMethod;

class TestPackage extends Package {
	public static function getMethods(): array {
		return [
			/** @return InnerMethodResponse */
			"test.inner" => InnerMethod::class,

			/** @return TestMethodResponse */
			"test.method" => TestMethod::class,
			
			/** @return string */
			"test.proc" => ProcMethod::class,
		];
	}
}