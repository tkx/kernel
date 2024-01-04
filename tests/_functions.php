<?php
namespace Moteam\Kernel\Tests;

use Moteam\Kernel\Config;
use Moteam\Kernel\Kernel;
use Moteam\Kernel\Tests\TestPackage\TestPackage;
use Moteam\Kernel\Tests\Services\TestService;

function getConfig(): Config {
    return (new Config())
        ->setBuildPath(__DIR__ . "/build")
        ->setBuildNamespace("Moteam\\Kernel\\Tests\\build")
        ->setDefinitions([
            "int" => function(string $name, array $params): int { return (int) $params[$name]; },
            "string" => function(string $name, array $params): string { return (string) $params[$name]; },
            TestService::class => function(string $name, array $params): TestService { return new TestService(); },
        ])->setPackages([
            TestPackage::class,
        ]);
}

function getKernel(Config $config): Kernel {
    return new Kernel($config);
}