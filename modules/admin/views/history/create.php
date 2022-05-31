<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\History */

$this->title = 'Добавить посетителя';
$this->params['breadcrumbs'][] = ['label' => 'Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-create" style="padding-top: 10px" >

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrLibraries' => $arrLibraries,
        'arrReaders' => $arrReaders,
        'arrBooks' => $arrBooks,
        'arrWorkers' => $arrWorkers,
        'arrWorkersr' => $arrWorkersr,
    ]) ?>

</div>
