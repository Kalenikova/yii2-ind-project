<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap4\Button;
use yii\widgets\ActiveForm;

$this->title = 'Книги';
?>
<div class="" style="padding-top:30px;">

    <?php $form = ActiveForm::begin(); ?>
    <h3><?= $form->field($model, 'title')->label('Характеристика') ?></h3>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-outline-success']); ?>
    <?php ActiveForm::end(); ?></br>

    <table class="table  table-hover">

  <thead>
            <tr>
                <th scope="col">ФИО</th>
                <th scope="col">Номер абонемента</th>
                <th scope="col">Библиотека</th>
                <th scope="col">Категория</th>
                <th scope="col">Характеристика</th>
            </tr>
        </thead>
  <tbody><?php foreach ($readers as $reader) : ?>
                <tr>
                    <td><?= Html::encode($reader->FIO) ?></td>
                    <td><?= Html::encode($reader->ticket_num) ?></td>
                    <td><?= Html::encode($reader->libraries->name) ?></td>
                    <td><?= Html::encode($reader->readers_category->name) ?></td>
                    <td><?= Html::encode($reader->property) ?></td>
                </tr>
        </tbody><?php endforeach; ?>
</table>


</div>