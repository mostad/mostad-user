<?php
namespace Mostad\User;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Mostad\User\Entity\User;
use Zend\Authentication\AuthenticationService;
use ZfrOAuth2\Server\Entity\TokenOwnerInterface;
use ZfrOAuth2Module\Server\Factory\AuthenticationServiceFactory;

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

        'entity_resolver' => [
            'orm_default' => [
                'resolvers' => [
                    TokenOwnerInterface::class => User::class,
                ],
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            AuthenticationService::class => AuthenticationServiceFactory::class,
        ],
    ],

    'zfr_oauth2_server' => [
        'object_manager' => EntityManager::class,
    ],
];
