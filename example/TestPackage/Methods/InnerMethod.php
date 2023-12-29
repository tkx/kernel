<?php

namespace X\TestPackage\Methods;

use Moteam\Kernel\Method;

class InnerMethod extends Method {
	public function __invoke() {
		return \lcg_value();
	}
}