<?php

namespace X\TestPackage\Methods;

use Moteam\Kernel\Method;
use X\Services\TestService;

class TestMethod extends Method {
    /**
     * TestService instance will be automatically created and injected.
     */
	public function __invoke(string $key, int $value, TestService $testService) {
		return [
            $key => $value, 
            "rnd" => $testService->test($value),
            "inner" => $this->getKernel()->run("test.inner", []),
        ];
	}
}