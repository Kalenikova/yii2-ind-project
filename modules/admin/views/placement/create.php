<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Placement */

$this->title = 'Добавить месторасположение книги';
$this->params['breadcrumbs'][] = ['label' => 'Placements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="placement-create" style="padding-top: 10px ;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrBooks' => $arrBooks,
        'arrLibraries' => $arrLibraries,
        'arrRoom' => $arrRoom,
    ]) ?>

</div>
