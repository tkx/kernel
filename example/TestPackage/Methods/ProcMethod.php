<?php

namespace X\TestPackage\Methods;

use Moteam\Kernel\Method;

class ProcMethod extends Method {
	public function __invoke(): string {
		return \md5(\lcg_value());
	}
}