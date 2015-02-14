<?php
namespace Mostad\User\InputFilter;

use Doctrine\Common\Persistence\ObjectRepository;
use DoctrineModule\Validator\NoObjectExists;
use Zend\Filter\StringToLower;
use Zend\Filter\StringTrim;
use Zend\InputFilter\InputFilter;
use Zend\Validator\EmailAddress;

/**
 * Class UserInputFilter
 *
 * @package Mostad\User\InputFilter
 */
class UserInputFilter extends InputFilter implements UserInputFilterInterface
{
    /**
     * @var ObjectRepository
     */
    protected $userRepository;

    /**
     * @param ObjectRepository $userRepository
     */
    public function __construct(ObjectRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                ['name' => StringToLower::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name'    => EmailAddress::class,
                    'options' => [
                        'messages' => [
                            EmailAddress::INVALID_FORMAT => 'Invalid email address',
                        ],
                    ],
                ],
                [
                    'name' => NoObjectExists::class,
                    'options' => [
                        'fields'            => ['email'],
                        'messages'          => [
                            NoObjectExists::ERROR_OBJECT_FOUND => 'A user with this email already exists',
                        ],
                        'object_repository' => $this->userRepository,
                    ]
                ]
            ],
        ]);
    }
}
