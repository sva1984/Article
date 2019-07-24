<?php

namespace frontend\services;


use common\models\User;
use common\repositories\ArticalsRepository;
use frontend\views\articals\view;


class CommentTreeService
{

    protected $commentTreeRepository;

    public function __construct(ArticalsRepository $commentTreeRepository)
    {
        $this->commentTreeRepository = $commentTreeRepository;
    }

/** Comments $comment*/
    /**
     * @param $model
     * @param $parrentCommentId
     * @param $level
     * @return mixed
     * @var $printComment frontend\views\articals\view
     */
    function tree($model, $parrentCommentId, $level) //рекурсивная функция
    {
        $level += 1;
        foreach ($model->comments as $childcomment) {

            if ($parrentCommentId == $childcomment->parrent_comment_id)
            {

                printComment($childcomment, $model, $level);
                $parrentCommentIdChild = $childcomment->id;
                tree($model, $parrentCommentIdChild, $level);
            }

        }
        $level -=1;
    }

}
