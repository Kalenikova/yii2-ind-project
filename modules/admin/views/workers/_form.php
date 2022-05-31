<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Workers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workers-form" style="padding-top: 10px ;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FIO')->textInput(['maxlength' => true])->label('ФИО') ?>

    <?= $form->field($model, 'id_lib')->dropDownList($arrLibraries)->label('Библиотека') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить/Изменить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
