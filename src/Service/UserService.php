<?php
namespace Mostad\User\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Mostad\User\Entity\UserInterface;

/**
 * Class UserService
 *
 * @package Mostad\Service
 */
class UserService implements UserServiceInterface
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * {@inheritdoc}
     */
    public function create(UserInterface $user)
    {
        $this->objectManager->persist($user);
        $this->objectManager->flush();

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(UserInterface $user)
    {
        $this->objectManager->remove($user);
        $this->objectManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function update(UserInterface $user)
    {
        $this->objectManager->persist($user);
        $this->objectManager->flush();

        return $user;
    }
}
