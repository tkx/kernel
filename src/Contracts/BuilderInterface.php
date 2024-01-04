<?php declare(strict_types=1);

namespace Moteam\Kernel\Contracts;

interface BuilderInterface {
    /**
     * Build config, i.e. create method invokers in buildPath.
     * Same builder can be used to build different kernels.
     */
    function build(ConfigInterface $config);
}