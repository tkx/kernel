<?php
namespace X\TestPackage;

use Moteam\Kernel\Package;
use X\TestPackage\Methods\TestMethod;
use X\TestPackage\Methods\InnerMethod;
use X\TestPackage\Methods\ProcMethod;

class TestPackage extends Package {
	public static function getMethods(): array {
		return [
			"test.method" => TestMethod::class,
			"test.inner" => InnerMethod::class,
			"test.proc" => ProcMethod::class,
		];
	}
}