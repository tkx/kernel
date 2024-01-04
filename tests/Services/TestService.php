<?php

namespace Moteam\Kernel\Tests\Services;

class TestService {
    public function test(int $value): int {
        return \rand(0, $value);
    }
}