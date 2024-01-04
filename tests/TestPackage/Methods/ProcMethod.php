<?php

namespace Moteam\Kernel\Tests\TestPackage\Methods;

use Moteam\Kernel\Method;

class ProcMethod extends Method {
	public function __invoke() {
		return \md5(\lcg_value());
	}
}