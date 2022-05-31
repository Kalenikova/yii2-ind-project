<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Libraries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="libraries-form" style="padding-top: 10px ;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название библиотеки') ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true])->label('Адрес') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить/Изменить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
