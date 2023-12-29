# RPC with DI kernel

```php
class TestMethod extends Method {
    /**
     * TestService instance will be automatically created and injected.
     */
	public function __invoke(string $key, int $value, TestService $testService) {
		return [
            $key => $value, 
            "rnd" => $testService->test($value),
            "inner" => $this->getKernel()->run("test.inner", []),
        ];
	}
}

class TestPackage extends Package {
	public static function getMethods(): array {
		return [
			"test.method" => TestMethod::class,
			"test.inner" => InnerMethod::class,
		];
	}
}

$config = (new Config())
    ->setBuildPath(__DIR__ . "/build")
    ->setBuildNamespace("X\\build")
    ->setDefinitions([
        "int" => function(string $name, array $params): int { return (int) $params[$name]; },
        "string" => function(string $name, array $params): string { return (string) $params[$name]; },
        TestService::class => function(string $name, array $params): TestService { return new TestService(); },
    ])->setPackages([
        TestPackage::class,
    ]);

(new Builder())->build($config);

$kernel = new Kernel($config);

$res = $kernel->run("test.method", ["key" => "data", "value" => 123]);
```