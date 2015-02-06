<?php
/** @var \Mostad\User\Entity\UserInterface $user */
$user = $this->user;

return [
    'id'    => $user->getId(),
    'email' => $user->getEmail(),
];
