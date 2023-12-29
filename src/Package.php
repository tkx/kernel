<?php declare(strict_types=1);

namespace Moteam\Kernel;
use Moteam\Kernel\Contracts\PackageInterface;

abstract class Package implements PackageInterface {
    abstract public static function getMethods(): array;
}