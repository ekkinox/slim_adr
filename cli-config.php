<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require 'vendor/autoload.php';

$settings = include __DIR__ . '/app/config.php';

$settings = $settings['settings.doctrine'];

$config = Setup::createAnnotationMetadataConfiguration(
    $settings['meta']['entity_path'],
    $settings['meta']['auto_generate_proxies'],
    $settings['meta']['proxy_dir'],
    $settings['meta']['cache'],
    false
);

$em = EntityManager::create($settings['connection'], $config);

return ConsoleRunner::createHelperSet($em);
