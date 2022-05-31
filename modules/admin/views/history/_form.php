<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-form" style="padding-top: 10px ;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_lib')->dropDownList($arrLibraries)->label('Библиотека') ?>

    <?= $form->field($model, 'ticket_num')->dropDownList($arrReaders)->label('Читатель') ?>

    <?= $form->field($model, 'books_num')->dropDownList($arrBooks)->label('Книга') ?>

    <?= $form->field($model, 'take_date')->textInput()->label('Дата выдачи') ?>

    <?= $form->field($model, 'id_worker_take')->dropDownList($arrWorkers)->label('Библиотекарь') ?>

    <?= $form->field($model, 'return_date')->textInput()->label('Дата возврата') ?>

    <?= $form->field($model, 'id_worker_return')->dropDownList($arrWorkersr)->label('Библиотекарь') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
