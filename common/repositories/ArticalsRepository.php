<?php

namespace common\repositories;

use common\models\Articals;
use yii\web\NotFoundHttpException;

class ArticalsRepository
{
    protected $articalsModel;

    public function __construct(Articals $articalsModel)
    {
        $this->articalsModel = $articalsModel;
    }

    public function getBy($condition)
    {
        if (($model = $this->findBy($condition)) !== null) {//перенести в сервис
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function findBy($condition)
    {
        $model = Articals::findOne($condition);
        return $model;
    }
}