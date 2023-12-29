<?php
namespace X;

use Moteam\Kernel\Config;
use X\TestPackage\TestPackage;
use X\Services\TestService;

function getConfig(): Config {
    return (new Config())
        ->setBuildPath(__DIR__ . "/build")
        ->setBuildNamespace("X\\build")
        ->setDefinitions([
            "int" => function(string $name, array $params): int { return (int) $params[$name]; },
            "string" => function(string $name, array $params): string { return (string) $params[$name]; },
            TestService::class => function(string $name, array $params): TestService { return new TestService(); },
        ])->setPackages([
            TestPackage::class,
        ]);
}