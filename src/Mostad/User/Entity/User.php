<?php
namespace Mostad\User\Entity;

/**
 * Class User
 *
 * @package Mostad\User\Entity
 */
class User implements UserInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
