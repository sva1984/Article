<?php

namespace common\services;

use common\repositories\CommentRepository;
use common\models\Comment;


class CommentService
{

    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function newCommentModel()
    {
        $commentModel = new Comment();
        return $commentModel;
    }


}


