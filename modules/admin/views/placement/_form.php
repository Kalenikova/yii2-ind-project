<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Placement */
/* @var $form yii\widgets\ActiveForm */
?>
 
<div class="placement-form" style="padding-top: 10px ;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'books_num')->dropDownList($arrBooks)->label('Книга') ?>

    <?= $form->field($model, 'reading_room')->dropDownList($arrRoom)->label('Читальный зал') ?>

    <?= $form->field($model, 'shelf')->textInput()->label('Полка') ?>

    <?= $form->field($model, 'stillage')->textInput()->label('Стеллаж') ?>

    <?= $form->field($model, 'id_lib')->dropDownList($arrLibraries)->label('Библиотека') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить/Изменить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
