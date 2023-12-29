<?php declare(strict_types=1);

namespace Moteam\Kernel\Contracts;

/**
 * Kernel's DI complied method base.
 */
interface MethodInvokerInterface {
    /**
     * @param KernelInterface $kernel
     * @param array<string, mixed> $params
     * @return mixed result of method call.
     */
    function __invoke(KernelInterface $kernel, array $params);
}