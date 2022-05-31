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
    <h3><?= $form->field($model, 'title')->label('Издание') ?></h3>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-outline-success']); ?>
    <?php ActiveForm::end(); ?></br>

    <table class="table  table-hover">

  <thead>
            <tr>
                <th scope="col">Библиотека</th>
                <th scope="col">Читатель</th>
                <th scope="col">Книга</th>
                <th scope="col">Дата выдачи</th>
                <th scope="col">Библиотекарь</th>
                <th scope="col">Дата возврата</th>
                <th scope="col">Библиотекарь</th>
            </tr>
        </thead>
  <tbody><?php foreach ($books as $book) : ?>
                <tr>
                    <td><?= Html::encode($book->libraries->name) ?></td>
                    <td><?= Html::encode($book->readers->FIO) ?></td>
                    <td><?= Html::encode($book->books->title) ?></td>
                    <td><?= Html::encode($book->take_date) ?></td>
                    <td><?= Html::encode($book->workers->FIO) ?></td>
                    <td><?= Html::encode($book->return_date) ?></td>
                    <td><?= Html::encode($book->workers->FIO) ?></td>
                </tr>
        </tbody><?php endforeach; ?>
</table>


</div>