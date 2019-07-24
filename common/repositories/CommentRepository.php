<?php

namespace common\repositories;

use common\models\Comment;


class CommentRepository
{
    protected $commentModel;

    public function __construct(Comment $commentModel)
    {
        $this->commentModel = $commentModel;
    }

    public function getBy(array $condition)
    {

    }
}