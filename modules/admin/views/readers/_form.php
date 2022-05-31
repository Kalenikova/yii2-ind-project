<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Readers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="readers-form" style="padding-top: 10px ;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FIO')->textInput(['maxlength' => true])->label('ФИО') ?>

    <?= $form->field($model, 'ticket_num')->textInput()->label('Номер читательского билета') ?>

    <?= $form->field($model, 'id_lib')->dropDownList($arrLibraries)->label('Библиотека') ?>

    <?= $form->field($model, 'id_category')->dropDownList($arrReadersCategory)->label('Категория/Жанр') ?>

    <?= $form->field($model, 'property')->textInput(['maxlength' => true])->label('Характеристика') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
