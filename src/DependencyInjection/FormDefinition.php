<?php

namespace Ekkinox\SlimADR\DependencyInjection;

use Interop\Container\ContainerInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

/**
 * Class ValidatorDefinition
 *
 * @package Ekkinox\SlimADR\DependencyInjection
 */
class FormDefinition implements ContainerDefinitionInterface
{
    /**
     * @inheritdoc
     */
    public function getSettingsKey()
    {
        return 'settings.form';
    }

    /**
     * @inheritdoc
     */
    public function __invoke()
    {
    }
}
