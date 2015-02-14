<?php
namespace Mostad\User\Controller;

use Doctrine\Common\Collections\Selectable;
use Doctrine\Common\Persistence\ObjectRepository;
use DoctrineModule\Paginator\Adapter\Selectable as SelectableAdapter;
use Mostad\User\Entity\UserInterface;
use Mostad\User\InputFilter\UserInputFilterInterface;
use Mostad\User\Service\UserServiceInterface;
use Zend\Paginator\Paginator;
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
     * @var ObjectRepository
     */
    protected $userRepository;

    /**
     * @var UserServiceInterface
     */
    protected $userService;

    /**
     * @param UserInterface        $userPrototype
     * @param Selectable           $userRepository
     * @param UserServiceInterface $userService
     */
    public function __construct(
        UserInterface        $userPrototype,
        Selectable           $userRepository,
        UserServiceInterface $userService
    )
    {
        $this->userPrototype  = $userPrototype;
        $this->userRepository = $userRepository;
        $this->userService    = $userService;
    }

    /**
     * @return ResourceViewModel
     */
    public function get()
    {
        $users = new Paginator(new SelectableAdapter($this->userRepository));
        $users->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));

        return new ResourceViewModel(['users' => $users]);
    }

    /**
     * @return ResourceViewModel
     */
    public function post()
    {
        /** @var \Mostad\User\Entity\UserInterface $user */
        $data = $this->validateIncomingData(UserInputFilterInterface::class);
        $user = $this->hydrateObject(ClassMethods::class, clone $this->userPrototype, $data);

        $user = $this->userService->create($user);

        return new ResourceViewModel(['user' => $user], ['template' => 'mostad/user']);
    }
}
