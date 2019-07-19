<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \common\models\Articals;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articals';
$this->params['breadcrumbs'][] = $this->title;
$query = Articals::find()->where(['active' => true]);
$provider = new \yii\data\ActiveDataProvider(['query' => $query])
?>
<div class="articals-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $provider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'title',
//            'text:ntext',
//            'tagId',

            [
                'format' => 'raw',

                'value' => function ($data) {
                    return '<a href="/articals/view?slug=' . $data->slug . '">' . $data->title . '</a>';
                },
                'attribute' => 'Title'
            ],
            [
                'attribute' => 'Text',
                'value' => function ($data) {
                    $minText = $data->text;
                    if (strlen($data->text) > 60) {
                        $minText = substr($data->text, 0, 100);
                    }
                    return $minText;
                },
            ],
            ['label' => 'created_by',
                'value' => function(\common\models\Articals $item){
                    return $item->createdBy->username; }],
            ['label' => 'updated_by',
                'value' => function(\common\models\Articals $item){
                    return $item->updatedBy->username; }],
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
