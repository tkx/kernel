<?php declare(strict_types=1);

namespace Moteam\Kernel;
use Moteam\Kernel\Contracts\ConfigInterface;

class Config implements ConfigInterface {
    /**
     * Type resolver definitions.
     * @property array<string, \Closure> $_definitions
     */
    private array $_definitions;
    /**
     * Package class names.
     * @property array<string> $_packages
     */
    private array $_packages;
    /**
     * Methods class-map.
     * @property array<string, string> $_methods
     */
    private array $_methods;
    /**
     * Path (dir) where built invoker classes are put
     * @property string $_buildPath
     */
    private string $_buildPath;
    /**
     * Namespace under which invoker classes are available
     * @property string $_buildNamespace
     */
    private string $_buildNamespace;

    public function __construct() {
        $this->_definitions = [];
        $this->_packages = [];
        $this->_methods = [];
        $this->_buildPath = "";
        $this->_buildNamespace = "";
    }

    /**
     * @inheritDoc
     */
    public function getPackages(): array {
        return $this->_packages;
    }

    /**
     * @inheritDoc
     */
    public function getMethods(): array {
        return $this->_methods;
    }

    /**
     * @inheritDoc
     */
    public function getDefinitions(): array {
        return $this->_definitions;
    }

    /**
     * @inheritDoc
     */
    public function getBuildNamespace(): string {
        return $this->_buildNamespace;
    }

    /**
     * @inheritDoc
     */
    public function getBuildPath(): string {
        if(!$this->_buildPath) {
            throw new \RuntimeException("no build path specified");
        }
        return $this->_buildPath;
    }

    /**
     * @inheritDoc
     */
    public function getDefinition(string $type): \Closure {
        if(!\array_key_exists($type, $this->getDefinitions())) {
            throw new \InvalidArgumentException(\sprintf("no definition for %s", $type));
        }
        return $this->getDefinitions()[$type];
    }

    /**
     * @inheritDoc
     */
    public function setPackages(array $packs): self {
        foreach($packs as $klass) {
            $this->_packages[] = $klass;
            $this->setMethods($klass::getMethods());
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setMethods(array $meths): self {
        foreach($meths as $name => $klass) {
            $this->_methods[$name] = $klass;
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDefinitions(array $defs): self {
        foreach($defs as $type => $func) {
            $this->_definitions[$type] = $func;
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setBuildNamespace(string $ns): self {
        $this->_buildNamespace = $ns;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setBuildPath(string $path): self {
        $this->_buildPath = $path;
        return $this;
    }
}