<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articals-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Articals', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
[
                'attribute' => 'Text',
                'value' => function ($data) {
                    $minText = $data->text;
                    if (strlen($data->text) > 60) {
                        $minText = substr($data->text, 0, 20);
                    }
                    return $minText;}
],
//            'text:ntext',
//            'tagId',
//            'slug',
            'time_create:datetime',
//            'time_update:datetime',
            ['label' => 'created_by',
                'value' => function(\common\models\Articals $item){
        return $item->createdBy->username; }],
            ['label' => 'updated_by',
                'value' => function(\common\models\Articals $item){
                    return $item->updatedBy->username; }],
//            'created_by',
//            'updated_by',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
//    print_r(User::findone)
    ?>
    <?php echo "Enter count: ".Yii::$app->request->cookies['enter']; ?>

</div>
