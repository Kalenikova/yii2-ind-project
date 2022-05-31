<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Placement */

$this->title = 'Обновить местонахождение: ' . $model->books->title;
$this->params['breadcrumbs'][] = ['label' => 'Placements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="placement-update" style="padding-top: 10px ;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrBooks' => $arrBooks,
        'arrLibraries' => $arrLibraries,
        'arrRoom' => $arrRoom,
    ]) ?>

</div>
