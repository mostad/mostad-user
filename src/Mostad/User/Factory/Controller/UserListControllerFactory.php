<?php
namespace Mostad\User\Factory\Controller;

use Mostad\User\Controller\UserListController;
use Mostad\User\Entity\UserInterface;
use Mostad\User\Service\UserServiceInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class UserListControllerFactory
 *
 * @package Mostad\User\Factory\Controller
 */
class UserListControllerFactory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var UserInterface                          $userPrototype
         * @var UserServiceInterface                   $userService
         * @var \Zend\Mvc\Controller\ControllerManager $serviceLocator
         */
        $userPrototype = $serviceLocator->getServiceLocator()->get(UserInterface::class);
        $userService   = $serviceLocator->getServiceLocator()->get(UserServiceInterface::class);

        return new UserListController($userPrototype, $userService);
}}
