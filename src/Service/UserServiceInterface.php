<?php
namespace Mostad\User\Service;

use Mostad\User\Entity\UserInterface;

/**
 * Interface UserServiceInterface
 *
 * @package Mostad\User\Service
 */
interface UserServiceInterface
{
    /**
     * @param UserInterface $user
     *
     * @return UserInterface
     */
    public function create(UserInterface $user);

    /**
     * @param UserInterface $user
     *
     * @return void
     */
    public function delete(UserInterface $user);

    /**
     * @param UserInterface $user
     *
     * @return UserInterface
     */
    public function update(UserInterface $user);
}
