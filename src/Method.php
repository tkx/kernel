<?php declare(strict_types=1);

namespace Moteam\Kernel;
use Moteam\Kernel\Contracts\KernelInterface;
use Moteam\Kernel\Contracts\MethodInterface;

/**
 * @method __invoke
 * @inheritDoc
 */
abstract class Method implements MethodInterface {
    protected KernelInterface $kernel;

    public function __construct(KernelInterface $kernel) {
        $this->kernel = $kernel;
    }

    /**
     * @inheritDoc
     */
    public function getKernel(): KernelInterface {
        return $this->kernel;
    }

    public function response() {
        
    }
}