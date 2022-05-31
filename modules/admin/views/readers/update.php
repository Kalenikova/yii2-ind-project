<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Readers */

$this->title = 'Обновить информацию о читателе: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Readers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="readers-update" style="padding-top: 10px ;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrLibraries' => $arrLibraries,
        'arrReadersCategory' => $arrReadersCategory,
    ]) ?>

</div>
