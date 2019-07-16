<?php

use common\models\Comment;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Articals */
/* @var $commentModel common\models\Comment */
/* @var $filialComment \frontend\controllers\ArticalsController */
//$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Articals', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="articals-view">

</div>
<?= $this->render('_formparrent', [
    'model' => $filialComment,
]) ?>
