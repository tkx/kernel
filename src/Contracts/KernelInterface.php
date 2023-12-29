<?php declare(strict_types=1);

namespace Moteam\Kernel\Contracts;

/**
 * Kernel = DI + Methods.
 * See examples.
 */
interface KernelInterface {
    /**
     * @return ConfigInterface
     */
    function getConfig(): ConfigInterface;
    
    /**
     * Run method with parameters.
     * @param string $name
     * @param array $params<string, mixed>
     * @return mixed
     */
    function run(string $name, array $params = []);
}