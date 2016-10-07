<?php

use \Slim\App as Application;

require __DIR__ . '/../vendor/autoload.php';

$configurationFiles = [
    __DIR__ . '/routing.php'
];

$app = new Application();

foreach ($configurationFiles as $configurationFile) {
    require $configurationFile;
}

$app->run();