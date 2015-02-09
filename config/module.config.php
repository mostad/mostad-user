<?php
namespace Mostad\User;

use Mostad\User\Controller\UserListController;
use Mostad\User\Entity\AbstractUser;
use Mostad\User\Entity\UserInterface;
use Mostad\User\Factory\Controller\UserListControllerFactory;
use Mostad\User\Factory\InputFilter\UserInputFilterFactory;
use Mostad\User\Factory\Service\UserServiceFactory;
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
        'factories' => [
            UserInputFilterInterface::class => UserInputFilterFactory::class,
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
            UserInterface::class => AbstractUser::class,
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
