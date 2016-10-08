<?php

use Interop\Container\ContainerInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

return [

    // Slim settings
    'settings.displayErrorDetails' => true,

    // Doctrine
    'doctrine' => [
        'meta' => [
            'entity_path' => [
                __DIR__ . '/../src/Entity'
            ],
            'auto_generate_proxies' => true,
            'proxy_dir' =>  __DIR__.'/../var/cache/doctrine/proxies',
            'cache' => null,
        ],
        'connection' => [
            'driver'   => 'pdo_mysql',
            'host'     => 'slim_adr_mysql',
            'dbname'   => 'slim_adr',
            'user'     => 'root',
            'password' => 'root',
        ]
    ],

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

];
