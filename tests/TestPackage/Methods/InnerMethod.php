<?php

namespace Moteam\Kernel\Tests\TestPackage\Methods;

use Moteam\Kernel\Method;
use Moteam\Kernel\MethodResponse;

/**
 * @method self val(float)
 * @method self time(int)
 * @method self test(string)
 */
class InnerMethodResponse extends MethodResponse {
	public float $val;
	public int $time;
	public string $test;
}

class InnerMethod extends Method {
	public function __invoke(): InnerMethodResponse {
		return (new InnerMethodResponse())
			->val(\lcg_value())
			->time(\time())
			->test("aaa")
		;
	}
}