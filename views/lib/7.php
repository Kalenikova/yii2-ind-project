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
    <h3><?= $form->field($model, 'place')->label('Полка') ?></h3>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-outline-success']); ?>
    <?php ActiveForm::end(); ?></br>

    <table class="table  table-hover">

  <thead>
            <tr>
                <th scope="col">Библиотека</th>                
                <th scope="col">Номенклатурный номер</th>
                <th scope="col">Читательский зал</th>
                <th scope="col">Полка</th>
                <th scope="col">Стелаж</th>
            </tr>
        </thead>
  <tbody><?php foreach ($places as $place) : ?>
                <tr>
                    <td><?= Html::encode($place->libraries->name) ?></td>
                    <td><?= Html::encode($place->books->title) ?></td>
                    <td><?= Html::encode($place->reading_room) ?></td>
                    <td><?= Html::encode($place->shelf) ?></td>
                    <td><?= Html::encode($place->stillage) ?></td>
                </tr>
        </tbody><?php endforeach; ?>
</table>


</div>