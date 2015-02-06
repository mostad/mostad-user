<?php
namespace Mostad\User\InputFilter;

use Mostad\Common\Validator\NoRecordExistsValidator;
use Mostad\User\Entity\User;
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
     * {@inheritdoc}
     */
    public function init()
    {
        $this->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                [
                    'name' => StringTrim::class,
                ],
            ],
            'validators' => [
                [
                    'name' => EmailAddress::class,
                ],
                [
                    'name' => NoRecordExistsValidator::class,
                    'options' => [
                        'entity' => User::class,
                        'key'    => 'email',
                    ]
                ]
            ],
        ]);
    }
}
