<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="books-form" style="padding-top: 10px ;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_num')->textInput()->label('Номенклатурный номер') ?>

    <?= $form->field($model, 'id_category')->dropDownList($arrBooksCategory)->label('Категория') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Название') ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true])->label('Автор') ?>

    <?= $form->field($model, 'come_date')->textInput()->label('Дата получения') ?>

    <?= $form->field($model, 'end_date')->textInput()->label('Дата списания') ?>

    <?= $form->field($model, 'give')->dropDownList([
        'Да' => 'Да',
        'Нет' => 'Нет',
    ])->label('Выдача') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить/Изменить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
