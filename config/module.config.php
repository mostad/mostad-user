<?php
namespace Mostad\User;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ .'\Entity' => [
                'class' => AnnotationDriver::class,
                'paths' => __DIR__ .'/../src/'. str_replace('\\', '/', __NAMESPACE__) .'/Entity',
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ .'\Entity'  => __NAMESPACE__ .'\Entity',
                ],
            ],
        ],
    ],
];
