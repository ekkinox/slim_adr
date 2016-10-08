<?php

namespace Ekkinox\SlimADR;

use DI\Bridge\Slim\App;
use DI\ContainerBuilder;
use Interop\Container\ContainerInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

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
        $builder
            ->addDefinitions(__DIR__ . '/../app/config.php')
            ->addDefinitions(
                [
                    // Doctrine EntityManager
                    EntityManager::class => function (ContainerInterface $container) {
                        $settings = $container->get('doctrine');
                        $config   = Setup::createAnnotationMetadataConfiguration(
                            $settings['meta']['entity_path'],
                            $settings['meta']['auto_generate_proxies'],
                            $settings['meta']['proxy_dir'],
                            $settings['meta']['cache'],
                            false
                        );

                        return EntityManager::create($settings['connection'], $config);
                    },

                    // Twig
                    Twig::class => function (ContainerInterface $c) {
                        $twig = new Twig(
                            __DIR__ . '/../src/Views',
                            [
                                'cache' => __DIR__ . '/../var/cache/twig'
                            ]
                        );

                        $twig->addExtension(new TwigExtension(
                            $c->get('router'),
                            $c->get('request')->getUri()
                        ));

                        return $twig;
                    }
                ]
        );
    }
}
