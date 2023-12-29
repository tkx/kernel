<?php
namespace X;

require __DIR__ . "/../vendor/autoload.php";

require __DIR__ . "/config.php";
require __DIR__ . "/TestPackage/TestPackage.php";
require __DIR__ . "/TestPackage/Methods/TestMethod.php";
require __DIR__ . "/TestPackage/Methods/InnerMethod.php";
require __DIR__ . "/TestPackage/Methods/ProcMethod.php";
require __DIR__ . "/Services/TestService.php";

use Moteam\Kernel\Kernel;
use Moteam\Kernel\Builder;
use function X\getConfig;

\putenv("DEBUG=1");

// create config
$config = getConfig();

// build config on the fly
!!\getEnv("DEBUG") && print_r("jit built\n") &&
(new Builder())->build($config);

// create kernel
$kernel = new Kernel($config);

// run methods with kernel
$res = $kernel->run("test.method", ["key" => "lalisa", "value" => 28]);
$res1 = $kernel->run("test.proc", []);

print_r([
	$res,
	$res1,
]);
