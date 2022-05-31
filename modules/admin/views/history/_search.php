<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\HistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-search" style="padding-top: 10px ;">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_lib') ?>

    <?= $form->field($model, 'ticket_num') ?>

    <?= $form->field($model, 'books_num') ?>

    <?= $form->field($model, 'take_date') ?>

    <?php  echo $form->field($model, 'id_worker_take') ?>

    <?php echo $form->field($model, 'return_date') ?>

    <?php echo $form->field($model, 'id_worker_return') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
