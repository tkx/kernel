<?php declare(strict_types=1);

namespace Moteam\Kernel\Contracts;

/**
 * Implementations should contain __invoke with a needed set of arguments,
 * which will receive values injected by kernel.
 * @method __invoke(...$args)
 */
interface MethodInterface {
    /**
     * Get methods kernel to call other methods from this method.
     * @return KernelInterface
     */
    function getKernel(): KernelInterface;

    // function __invoke(...);
}