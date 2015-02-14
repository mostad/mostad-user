<?php
$users['meta'] = $this->renderPaginator($this->users);
$users['data'] = [];

foreach ($this->users as $user) {
    $users['data'][] = $this->renderResource('mostad/user', ['user' => $user]);
}

return $users;
