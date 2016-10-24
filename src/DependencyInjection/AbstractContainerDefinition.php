<?php

namespace Ekkinox\SlimADR\DependencyInjection;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Interop\Container\Exception\NotFoundException;

/**
 * Class AbstractContainerDefinition
 *
 * @package Ekkinox\SlimADR\DependencyInjection
 */
abstract class AbstractContainerDefinition implements ContainerDefinitionInterface
{
    /**
     * @param ContainerInterface $container
     *
     * @return mixed
     *
     * @throws NotFoundException
     * @throws ContainerException
     */
    protected function getSettings(ContainerInterface $container)
    {
        return $container->get($this->getSettingsKey());
    }
}
