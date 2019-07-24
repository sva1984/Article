<?php

namespace frontend\repositories;

use common\models\Articals;


class CommentTreeRepository
{
    protected $commentTreeModel;

    public function __construct(Articals $commentTreeModel)
    {
        $this->commentTreeModel = $commentTreeModel;
    }


}