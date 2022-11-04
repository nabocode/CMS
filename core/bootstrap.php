<?php

use Core\Cms;
use Core\DependencyInjection\DependencyInjection;

try {
    // Dependency Injection
    $dependencyInjection = new DependencyInjection();

    $services = require __DIR__ . '/Config/Service.php';

    foreach ($services as $service) {
        $provider = new $service($dependencyInjection);
        $provider->init();
    }

    $cms = new Cms($dependencyInjection);
    $cms->run();

} catch(\ErrorException $e) {
    echo $e->getMessage();
}