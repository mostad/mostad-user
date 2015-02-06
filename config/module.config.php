<?php
namespace Mostad\User;

use Mostad\User\Controller\UserListController;
use Mostad\User\Entity\User;
use Mostad\User\Entity\UserInterface;
use Mostad\User\Factory\Controller\UserListControllerFactory;
use Mostad\User\Factory\Service\UserServiceFactory;
use Mostad\User\InputFilter\UserInputFilter;
use Mostad\User\InputFilter\UserInputFilterInterface;
use Mostad\User\Service\UserServiceInterface;
use Zend\Mvc\Router\Http\Literal;

return [
    'controllers' => [
        'factories' => [
            UserListController::class => UserListControllerFactory::class,
        ],
    ],

    'input_filters' => [
        'invokables' => [
            UserInputFilterInterface::class => UserInputFilter::class,
        ],
    ],

    'router' => [
        'routes' => [
            'users' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/users',
                    'defaults' => [
                        'controller' => UserListController::class,
                    ],
                ],
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            UserServiceInterface::class => UserServiceFactory::class,
        ],
        'invokables' => [
            UserInterface::class => User::class,
        ],
        'shared' => [
            UserInterface::class => false,
        ],
    ],

    'view_manager' => [
        'template_map' => [
            'default/mostad/user.php' => __DIR__ .'/../view/default/mostad/user.php',
        ],
    ],
];
