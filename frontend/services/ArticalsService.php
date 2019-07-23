<?php

namespace frontend\services;

use common\models\Articals;
use frontend\repositories\ArticalsRepository;
use yii\web\NotFoundHttpException;

class ArticalsService
{

    protected $articalsRepository;

    public function __construct(ArticalsRepository $articalsRepository)
    {
        $this->articalsRepository = $articalsRepository;
    }

    public function findModel($slug)
    {
        return $this->articalsRepository->getBy(['slug' => $slug]);
    }
}
