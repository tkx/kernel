<?php declare(strict_types=1);

namespace Moteam\Kernel;
use Moteam\Kernel\Contracts\KernelInterface;
use Moteam\Kernel\Contracts\MethodInvokerInterface;

abstract class MethodInvoker implements MethodInvokerInterface {
    abstract public function __invoke(KernelInterface $kernel, array $params);
}