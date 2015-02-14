<?php
namespace Mostad\User\Factory\InputFilter;

use Mostad\User\Entity\UserInterface;
use Mostad\User\InputFilter\UserInputFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class UserInputFilterFactory
 *
 * @package Mostad\User\Factory\InputFilter
 */
class UserInputFilterFactory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \Doctrine\Common\Persistence\ObjectRepository $userRepository
         * @var \Zend\InputFilter\InputFilterPluginManager    $serviceLocator
         */
        $userRepository = $serviceLocator->getServiceLocator()->get('Mostad\ObjectManager')->getRepository(UserInterface::class);

        return new UserInputFilter(
            $userRepository
        );
}}
