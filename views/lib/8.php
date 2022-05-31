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
    <h3><?= $form->field($model, 'take_date')->label('Дата выдачи') ?></h3>
    <h3><?= $form->field($model, 'return_date')->label('Дата возврата') ?></h3>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-outline-success']); ?>
    <?php ActiveForm::end(); ?></br>

    <table class="table  table-hover">

  <thead>
            <tr>
                <th scope="col">Библиотека</th>
                <th scope="col">Читатель</th>
                <th scope="col">Книга</th>
                <th scope="col">Библиотекарь</th>
            </tr>
        </thead>
  <tbody><?php foreach ($dates as $date) : ?>
                <tr>
                    <td><?= Html::encode($date->libraries->name) ?></td>
                    <td><?= Html::encode($date->readers->FIO) ?></td>
                    <td><?= Html::encode($date->books->title) ?></td>
                    <td><?= Html::encode($date->workers->FIO) ?></td>
        </tbody><?php endforeach; ?>
</table>


</div>