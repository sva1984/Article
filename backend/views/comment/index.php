<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'comment:ntext',
//            'articals_id',
//            'created_by',
//            'updated_by',
            ['label' => 'Created_by',
                'value' => function(\common\models\Comment $item){
                    return $item->createdBy->username; }],
            ['label' => 'Updated_by',
                'value' => function(\common\models\Comment $item){
                    return $item->updatedBy->username; }],
            ['label' => 'Title',
                'value' => function(\common\models\Comment $item){
                    return $item->articals->title; }],
            'time_create:datetime',
            'time_update:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
