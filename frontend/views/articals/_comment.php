<?php

use yii\helpers\Html;

/* @var $comment common\models\Comment */
?>
<li style="margin-left:40px">
    <b><?= Html::encode($comment->createdBy->username); ?></b>
    <i>| <?= Html::encode($comment->getTimeCreate()); ?></i>
    <br>
    <p class="commentText">
        <?= Html::encode($comment->comment); ?>
    </p>
    <br>
    <hr>
</li>