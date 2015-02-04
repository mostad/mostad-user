<?php
namespace Mostad\User\Entity;

/**
 * Interface UserInterface
 *
 * @package Mostad\User\Entity
 */
interface UserInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     */
    public function setEmail($email);
}
