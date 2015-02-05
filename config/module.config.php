<?php
namespace Mostad\User;

use Mostad\User\Factory\Service\UserServiceFactory;
use Mostad\User\Service\UserService;

return [
    'service_manager' => [
        'factories' => [
            UserService::class => UserServiceFactory::class,
        ],
    ],
];
