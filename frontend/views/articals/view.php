<?php

use common\models\Comment;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Articals */
/* @var $commentModel common\models\Comment */
/* @var $userModel common\models\User */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
//echo '<pre>';
//die(print_r($model));

function printComment($item, $model, $n)
{ ?>

    <li style="margin-left: <?php $margin = 40 * $n;
    echo "$margin";
    //        echo '100';
    //    else echo '40';
    ?>px">
        <img src="<?= Html::encode($item->createdBy->img_url)?>" width="30" height="30">
        <b><?= Html::encode($item->createdBy->username); ?></b>

        <i>| <?= Html::encode($item->getTimeCreate()); ?></i>

        <?= Html::a('Add comment', ['articals/filial-comment?id=' . $item->id . '&slug=' . $model->slug],
            ['class' => 'btn btn-primary']) ?>
        <br>
        <p class="commentText">

            <?= Html::encode($item->comment); ?>

        </p>
        <br>
        <hr>
    </li>
<?php } ?>


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
            [
                'label' => 'created_by',
                'value' => function (\common\models\Articals $item) {
                    return $item->createdBy->username;
                }
            ],
            [
                'label' => 'updated_by',
                'value' => function (\common\models\Articals $item) {
                    return $item->updatedBy->username;
                }
            ],
        ],


    ]) ?>

</div>
<?=
$this->render('_form', [
    'model' => $commentModel,
]) ?>




<?php
// TODO: Переделать дерево комментов
/** Comments $comment*/
$i = $j = 0;
/**
 * @param $model
 * @param $parrentCommentId
 * @param $level
 * @return mixed
 *
 */
function tree($model, $parrentCommentId, $level) //рекурсивная функция
{
    foreach ($model->comments as $childcomment) {
        if ($parrentCommentId == $childcomment->parrent_comment_id) {
            $level += 1;
            printComment($childcomment, $model, $level);
            $parrentCommentId = $childcomment->id;
            //if ($level < 20/*$childcomment->comments*/) {
            tree($model, $parrentCommentId, $level);
           // }
            return $childcomment;
        }
    }
}

foreach ($model->comments as $comment) { ?>
    <?php if ($comment->parrent_comment_id == null) //определяю родительский комментарий
    {

        $level = 1;
        printComment($comment, $model, $level); //печатаю родительский коммент
        $parrentCommentId = $comment->id;
        tree($model, $parrentCommentId, $level);

    }


}


?>







