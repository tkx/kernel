<?php

namespace Moteam\Kernel\Tests\TestPackage\Methods;

use Moteam\Kernel\Method;
use Moteam\Kernel\MethodResponse;
use Moteam\Kernel\Tests\Services\TestService;

/**
 * @method self key(string)
 * @method self value(int)
 * @method self rnd(int)
 * @method self inner(InnerMethodResponse)
 * @method self proc(string)
 */
class TestMethodResponse extends MethodResponse {
    public string $key;
    public int $value;
    public int $rnd;
    public InnerMethodResponse $inner;
    public string $proc;
}

class TestMethod extends Method {
    /**
     * TestService instance will be automatically created and injected.
     */
	public function __invoke(string $key, int $value, TestService $testService): TestMethodResponse {
        return (new TestMethodResponse())
            ->key($key)
            ->value($value)
            ->rnd($testService->test($value))
            ->inner($this->getKernel()->run("test.inner", []))
            ->proc($this->getKernel()->run("test.proc", []))
        ;
	}
}