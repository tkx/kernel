<?php declare(strict_types=1);

namespace Moteam\Kernel;
use Moteam\Kernel\Contracts\MethodResponseInterface;

class MethodResponse implements MethodResponseInterface {
	public function __set(string $name, $value) {
		throw new \InvalidArgumentException();
	}
	
	public function __get(string $name) {
		throw new \InvalidArgumentException();
	}

	/** @inheritDoc */
	public function __call(string $propName, array $arguments): self {
		$this->{$propName} = $arguments[0];
		return $this;
	}
}