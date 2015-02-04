<?php
namespace Mostad\User\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZfrOAuth2\Server\Entity\TokenOwnerInterface;

/**
 * Class User
 *
 * @package Mostad\User\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface, TokenOwnerInterface
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(nullable=false, type="string", unique=true)
     */
    protected $email;

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getTokenOwnerId()
    {
        return $this->getId();
    }
}
