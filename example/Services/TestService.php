<?php

namespace X\Services;

class TestService {
    public function test(int $value): int {
        return \rand(0, $value);
    }
}