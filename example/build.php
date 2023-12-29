<?php
namespace X;

require __DIR__ . "/../vendor/autoload.php";

require __DIR__ . "/config.php";
require __DIR__ . "/TestPackage/TestPackage.php";
require __DIR__ . "/TestPackage/Methods/TestMethod.php";
require __DIR__ . "/TestPackage/Methods/InnerMethod.php";
require __DIR__ . "/TestPackage/Methods/ProcMethod.php";
require __DIR__ . "/Services/TestService.php";

use Moteam\Kernel\Builder;
use function X\getConfig;

// create config
$config = getConfig();

// build config
(new Builder())->build($config);
// or
Builder::b($config);

print_r([
    "built to namespace and path",
    $config->getBuildNamespace(),
    $config->getBuildPath(),
]);