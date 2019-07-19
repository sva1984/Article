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

<?php
// TODO: Переделать дерево комментов
foreach ($model->comments as $item) { ?>
    <li style="margin-left: <?php if ($item->parrent_comment_id)
        echo '100';
    else echo '40';?>px">
        <b><?= Html::encode($item->createdBy->username); ?></b>
        <i>| <?= Html::encode($item->getTimeCreate()); ?></i>
        <?= Html::a('Add comment', ['articals/filial-comment?id=' . $item->id . '&slug=' . $model->slug], ['class' => 'btn btn-primary']) ?>
        <br>
        <p class="commentText">
            <?= Html::encode($item->comment); ?>
        </p>
        <br>
        <hr>
    </li>
<?php } ?>




<?php
////var_dump($model->comments);die;
////var_dump($commentModel);die;
//foreach($model->comments as $item)
//{
//
//    echo $this->render('_comment', ['comment' => $item, 'article' => $model]);
//    if($item->parrentComment){
//        echo $this->render('_comment', ['comment' => $item->parrentComment, 'article' => $model]);
//    }
//
//}
//?>


