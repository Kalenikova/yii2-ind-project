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
    <h3><?= $form->field($model, 'name')->label('Название книги') ?></h3>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-outline-success']); ?>
    <?php ActiveForm::end(); ?></br>

    <table class="table  table-hover">

  <thead>
            <tr>


                <th scope="col">Книга</th>
                <th scope="col">Количество выдачи</th>
                

            </tr>
        </thead>
  <tbody><?php foreach ($populars as $popular) : ?>
                <tr>
                    <td><?= Html::encode($popular->books->title) ?></td>
                    <td><?= Html::encode($popular->cnt) ?></td>
                    

        </tbody><?php endforeach; ?>
</table>


</div>