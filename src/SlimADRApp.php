<?php

namespace Ekkinox\SlimADR;

use DI\Bridge\Slim\App;
use DI\ContainerBuilder;
use Ekkinox\SlimADR\DependencyInjection\ContainerDefinitionInterface;
use Ekkinox\SlimADR\DependencyInjection\DoctrineDefinition;
use Ekkinox\SlimADR\DependencyInjection\TwigDefinition;

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

        foreach ($this->getContainerDefinitions() as $definition) {
            $builder->addDefinitions($definition());
        }
    }

    /**
     * @return ContainerDefinitionInterface[]
     */
    protected function getContainerDefinitions()
    {
        return [
            new DoctrineDefinition(),
            new TwigDefinition(),
        ];
    }
}
