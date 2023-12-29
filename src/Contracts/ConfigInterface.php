<?php declare(strict_types=1);

namespace Moteam\Kernel\Contracts;

interface ConfigInterface {
    /**
     * Set packages with methods to serve.
     * @param array<string> $packages
     * @return ConfigInterface
     */
    function setPackages(array $packages): self;
    
    /**
     * Set type resolver definitions.
     * @param array<string, \Closure> $definitions
     * @return KernelInterface
     */
    function setDefinitions(array $definitions): self;
    
    /**
     * Set methods to serve.
     * @param array<string, string> $methods
     * @return KernelInterface
     */
    function setMethods(array $methods): self;
    
    /**
     * Set namespace where compiled (built) methods will be stored.
     * @param string $namespace
     * @return KernelInterface
     */
    function setBuildNamespace(string $namespace): self;
    
    /**
     * Set path where compiled (built) methods will be stored.
     * @param string $path
     * @return KernelInterface
     */
    function setBuildPath(string $path): self;
    
    /**
     * Return definition for the type.
     * @param string $type
     * @return \Closure
     */
    function getDefinition(string $type): \Closure;
    
    /**
     * @return array<string, string>
     */
    function getMethods(): array;
    
    /**
     * @return array<string, \Closure>
     */
    function getDefinitions(): array;
    
    /**
     * @return array<string>
     */
    function getPackages(): array;
    
    /**
     * @return array<string>
     */
    function getBuildPath(): string;
    
    /**
     * @return array<string>
     */
    function getBuildNamespace(): string;
}