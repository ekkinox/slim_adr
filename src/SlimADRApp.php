<?php

namespace Ekkinox\SlimADR;

use DI\Bridge\Slim\App;
use DI\ContainerBuilder;

/**
 * Class SlimADRApp
 *
 * @package Ekkinox\SlimADR
 */
class SlimADRApp extends App
{
    /**
     * @inheritdoc
     */
    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->addDefinitions(__DIR__ . '/../app/config.php');
    }
}
