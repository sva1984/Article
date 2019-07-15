<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Articals */

$this->title = 'Create Articals';
$this->params['breadcrumbs'][] = ['label' => 'Articals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
