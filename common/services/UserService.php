<?php

namespace common\services;

use common\models\User;
use common\repositories\CommentRepository;
use common\models\Comment;
class UserService
{

    protected $userRepository;

    public function __construct(CommentRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function newUserModel()
    {
        $userModel = new User();
        return $userModel;
    }
}
