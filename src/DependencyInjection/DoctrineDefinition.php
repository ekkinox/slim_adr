<?php

namespace Ekkinox\SlimADR\DependencyInjection;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Interop\Container\ContainerInterface;

/**
 * Class DoctrineDefinition
 *
 * @package Ekkinox\SlimADR\DependencyInjection
 */
class DoctrineDefinition extends AbstractContainerDefinition
{
    /**
     * @inheritdoc
     */
    public function getSettingsKey()
    {
        return 'settings.doctrine';
    }

    /**
     * @inheritdoc
     */
    public function __invoke()
    {
        return [
            EntityManager::class => function (ContainerInterface $container) {

                $settings = $this->getSettings($container);

                $config = Setup::createAnnotationMetadataConfiguration(
                    $settings['meta']['entity_path'],
                    $settings['meta']['auto_generate_proxies'],
                    $settings['meta']['proxy_dir'],
                    $settings['meta']['cache'],
                    false
                );

                return EntityManager::create($settings['connection'], $config);
            },
        ];
    }
}
