<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1>User Name <?= Html::encode($model->username) ?></h1>
    <img src="<?= Html::encode($model->img_url)?>" width="100" height="100">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
//            'status',
            'created_at:datetime',
            'updated_at:datetime',
//            'verification_token',
            'img_url:url',
        ],
    ]) ?>

</div>
