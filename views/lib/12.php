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
    <h3><?= $form->field($model, 'reading_room')->label('Читальный зал') ?></h3>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-outline-success']); ?>
    <?php ActiveForm::end(); ?></br>


    <table class="table  table-hover">

  <thead>
            <tr>
                <th scope="col">ФИО</th>
                <th scope="col">Библиотека</th>
                <th scope="col">Читальный зал</th>
            </tr>
        </thead>
  <tbody><?php foreach ($rooms as $room) : ?>
                <tr>
                    <td><?= Html::encode($room->FIO) ?></td>
                    <td><?= Html::encode($room->libraries->name) ?></td>
                    <td><?= Html::encode($room->reading_room) ?></td>
                </tr>
        </tbody><?php endforeach; ?>
</table>


</div>