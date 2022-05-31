<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form" style="padding-top: 10px ;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reading_room')->textInput()->label('Читательский зал') ?>

    <?= $form->field($model, 'id_lib')->textInput()->dropDownList($arrLibraries)->label('Библиотека') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить/Изменить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
