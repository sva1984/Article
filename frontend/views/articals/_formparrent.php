<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $filialComment common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $parentCommentId int */
?>

<div class="articals-form">

    <?php $form = ActiveForm::begin(['action' => ['articals/filial-comment?id='. $parentCommentId. '&slug=' . $model->slug]]);

        //echo $form->field($filialComment, 'parrent_comment_id')->hiddenInput(['value' => $filialComment->parrent_comment_id])->label(false);

    ?>

    <?= $form->field($filialComment, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
