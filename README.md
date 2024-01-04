# RPC with DI kernel

```php
class TestMethodResponse extends MethodResponse {
    public string $key;
    public int $value;
    public float $rnd;
}

class TestMethod extends Method {
    // $key, $value and $testService will be injected from kernel (using definitions and passed params)
	public function __invoke(string $key, int $value, TestService $testService): TestMethodResponse {
		return (new TestMethodResponse()) // explicitly create response
            ->key($key) // use auto-setter with the same name as response' property $key
            ->value($value) // use auto-setter with the same name as response' property $value
            ->rnd($testService->test($value)) // use auto-setter with the same name as response' property $rnd
            // ->something(123) // will fail => no property $something exists in response object
        ;
	}
}

class TestPackage extends Package {
	public static function getMethods(): array {
		return [
            /** @return TestMethodResponse */ // optional set method return type
			"test.method" => TestMethod::class, // add method name and class
		];
	}
}

$config = (new Config())
    ->setBuildPath(__DIR__ . "/build") // set build path where wired injections will be stored
    ->setBuildNamespace("X\\build") // set namespace of built sources
    ->setDefinitions([ // injection rules for each type used
        "int" => function(string $name, array $params): int { return (int) $params[$name]; },
        "string" => function(string $name, array $params): string { return (string) $params[$name]; },
        TestService::class => function(string $name, array $params): TestService { return new TestService(); },
    ])->setPackages([
        TestPackage::class, // add method packages
    ]);

// optional build, better be moved to console command to use in workflows
(new Builder())->build($config);

// -----------------------------------------------------------------------------
// driver code

// create kernel with config
$kernel = new Kernel($config);

// call some method
// these params will be passed to method's parameters with the same names and types
$res = $kernel->run("test.method", ["key" => "data", "value" => 123]);
```