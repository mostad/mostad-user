<?php
namespace Mostad\User;

use Mostad\Service\UserService;
use Mostad\User\Factory\Service\UserServiceFactory;

return [
    'service_manager' => [
        'factories' => [
            UserService::class => UserServiceFactory::class,
        ],
    ],
];
