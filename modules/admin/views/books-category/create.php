<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BooksCategory */

$this->title = 'Добавить новую категорию';
$this->params['breadcrumbs'][] = ['label' => 'Books Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-category-create" style="padding-top: 10px ;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
