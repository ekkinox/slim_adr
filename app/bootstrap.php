<?php

use Ekkinox\SlimADR\SlimADRApp;

require __DIR__ . '/../vendor/autoload.php';

$app = new SlimADRApp();

require __DIR__ . '/routing.php';

$app->run();
