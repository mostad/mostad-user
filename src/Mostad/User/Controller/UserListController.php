<?php
namespace Mostad\User\Controller;

use Mostad\User\Entity\UserInterface;
use Mostad\User\InputFilter\UserInputFilterInterface;
use Mostad\User\Service\UserServiceInterface;
use Zend\Stdlib\Hydrator\ClassMethods;
use ZfrRest\Mvc\Controller\AbstractRestfulController;
use ZfrRest\View\Model\ResourceViewModel;

/**
 * Class UserListController
 *
 * @package Mostad\User\Controller
 */
class UserListController extends AbstractRestfulController
{
    /**
     * @var UserInterface
     */
    protected $userPrototype;

    /**
     * @var UserServiceInterface
     */
    protected $userService;

    /**
     * @param UserInterface        $userPrototype
     * @param UserServiceInterface $userService
     */
    public function __construct(UserInterface $userPrototype, UserServiceInterface $userService)
    {
        $this->userPrototype = $userPrototype;
        $this->userService   = $userService;
    }

    /**
     * @return ResourceViewModel
     */
    public function post()
    {
        /** @var \Mostad\User\Entity\UserInterface $user */
        // TODO: Make validation group customizable
        $data = $this->validateIncomingData(UserInputFilterInterface::class, ['email']);
        $user = $this->hydrateObject(ClassMethods::class, clone $this->userPrototype, $data);

        $user = $this->userService->create($user);

        return new ResourceViewModel(['user' => $user], ['template' => 'mostad/user']);
    }
}
