<?php declare(strict_types=1);

namespace Moteam\Kernel\Contracts;

/**
 * Pack of methods.
 */
interface PackageInterface {
    /**
     * @return array<string, string>
     */
    static function getMethods(): array;
}