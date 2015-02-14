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
         * @var UserInterface                                 $userPrototype
         * @var UserServiceInterface                          $userService
         * @var \Doctrine\Common\Persistence\ObjectRepository $userRepository
         * @var \Zend\Mvc\Controller\ControllerManager        $serviceLocator
         * @var \Zend\ServiceManager\ServiceManager           $serviceManager
         */
        $serviceManager = $serviceLocator->getServiceLocator();
        $userPrototype  = $serviceManager->get(UserInterface::class);
        $userRepository = $serviceManager->get('Mostad\ObjectManager')->getRepository(UserInterface::class);
        $userService    = $serviceManager->get(UserServiceInterface::class);

        return new UserListController($userPrototype, $userRepository, $userService);
    }
}
