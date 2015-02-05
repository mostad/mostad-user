<?php
namespace Mostad\User\Factory\Service;

use Mostad\User\Service\UserService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class UserServiceFactory
 *
 * @package Mostad\User\Factory\Service
 */
class UserServiceFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceManager
     *
     * @return UserService
     */
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        /**
         * @var \Doctrine\Common\Persistence\ObjectManager $objectManager
         * @var \Zend\ServiceManager\ServiceManager        $serviceManager
         */
        $objectManager = $serviceManager->get('Mostad\ObjectManager');

        return new UserService($objectManager);
}}
