<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Articals */
/* @var $commentModel common\models\Comment */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="articals-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            'text:ntext',
            //'tagId',
            ['label' => 'created_by',
                'value' => function(\common\models\Articals $item){
                    return $item->createdBy->username; }],
            ['label' => 'updated_by',
                'value' => function(\common\models\Articals $item){
                    return $item->updatedBy->username; }],
        ],


    ]) ?>

</div>
<?=
$this->render('_form', [
    'model' => $commentModel,
]) ?>


<?php foreach ($model->comments as $item)
{ ?>
    <li style="margin-left:100px">
        <b><?= Html::encode($item->createdBy->username); ?></b>
        <i>| <?= Html::encode($item->getTimeCreate()); ?></i>
        <?= Html::a('Add comment', ['articals/filial-comment?id='. $item->id . '&slug=' . $model->slug ], ['class'=>'btn btn-primary']) ?>
        <br>
        <p class="commentText">
            <?= Html::encode($item->comment); ?>
        </p>
        <br>
        <hr>
    </li>
<?php } ?>


<!--    if($item->articals_id & $item->parrentComment==null)-->
<!--    echo $this->render('_comment', ['comment' => $item, 'article' => $model]);-->
<!--//    if($item->parrentComment !== NULL){-->
<!--//        echo $this->render('_comment', ['comment' => $item->parrentComment, 'article' => $model]);-->
<!--//    }-->
