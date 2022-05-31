<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PlacementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="placement-search" style="padding-top: 10px ;">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'books_num') ?>

    <?= $form->field($model, 'reading_room') ?>

    <?= $form->field($model, 'shelf') ?>

    <?= $form->field($model, 'stillage') ?>

    <?php // echo $form->field($model, 'id_lib') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
