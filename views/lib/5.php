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
    <h3><?= $form->field($model, 'FIO')->label('ФИО читателя') ?></h3>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-outline-success']); ?>
    <?php ActiveForm::end(); ?></br>

    <table class="table  table-hover">

  <thead>
            <tr>
                <th scope="col">Название книги</th>
                <th scope="col">Категория</th>
                <th scope="col">Автор</th>
            </tr>
        </thead>
  <tbody><?php foreach ($books as $book) : ?>
                <tr>
                    <td><?= Html::encode($book->title) ?></td>
                    <td><?= Html::encode($book->books_category->name) ?></td>
                    <td><?= Html::encode($book->author) ?></td>
                </tr>
        </tbody><?php endforeach; ?>
</table>


</div>