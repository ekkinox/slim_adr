<?php

namespace Ekkinox\SlimADR\DependencyInjection;

/**
 * Interface ContainerDefinitionInterface
 *
 * @package Ekkinox\SlimADR\DependencyInjection
 */
interface ContainerDefinitionInterface
{
    /**
     * @return array
     */
    public function __invoke();

    /**
     * @return string
     */
    public function getSettingsKey();
}
