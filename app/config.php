<?php

return [

    // Slim framework settings
    'settings.displayErrorDetails' => true,

    // Doctrine
    'settings.doctrine' => [
        'meta' => [
            'entity_path' => [
                __DIR__ . '/../src/Entity'
            ],
            'auto_generate_proxies' => true,
            'proxy_dir'   =>  __DIR__.'/../var/cache/doctrine/proxies',
            'cache'       => null,
        ],
        'connection' => [
            'driver'   => 'pdo_mysql',
            'host'     => 'slim_adr_mysql',
            'dbname'   => 'slim_adr',
            'user'     => 'root',
            'password' => 'root',
        ]
    ],

    // Twig
    'settings.twig' => [
        'path'     => __DIR__ . '/../src/Views',
        'settings' => [
            'cache' => __DIR__ . '/../var/cache/twig'
        ]
    ],
];
