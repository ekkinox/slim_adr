<?php

namespace Ekkinox\SlimADR\DependencyInjection;

use Interop\Container\ContainerInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

/**
 * Class TwigDefinition
 *
 * @package Ekkinox\SlimADR\DependencyInjection
 */
class TwigDefinition extends AbstractContainerDefinition
{
    /**
     * @inheritdoc
     */
    public function getSettingsKey()
    {
        return 'settings.twig';
    }

    /**
     * @inheritdoc
     */
    public function __invoke()
    {
        return [
            Twig::class => function (ContainerInterface $container) {

                $settings = $this->getSettings($container);

                $twig = new Twig($settings['path'], $settings['settings']);

                $twig->addExtension(new TwigExtension(
                    $container->get('router'),
                    $container->get('request')->getUri()
                ));

                return $twig;
            }
        ];
    }
}
