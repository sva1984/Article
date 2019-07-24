<?php

namespace common\repositories;

use common\models\User;


class UserRepository
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getBy(array $condition)
    {

    }
}