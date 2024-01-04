<?php declare(strict_types=1);

namespace Moteam\Kernel\Contracts;

interface MethodResponseInterface {
    /**
     * @return MethodResponseInterface
     * @param string $propName
     * @param array $arguments
     * Used to set response properties without creating dedicated setters.
     */
    function __call(string $propName, array $arguments): self;
}