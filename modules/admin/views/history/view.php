<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\History */

$this->title = $model->readers->FIO;
$this->params['breadcrumbs'][] = ['label' => 'Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="history-view"  style="padding-top: 10px ;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id_lib',
                'value' => function($model){
                    return $model->libraries->name;
                }
            ],
            [
                'attribute' => 'ticket_num',
                'value' => function($model){
                    return $model->readers->FIO;
                }
            ],
            [
                'attribute' => 'book_num',
                'value' => function($model){
                    return $model->books->title;
                }
            ],
            'take_date',
            [
                'attribute' => 'id_worker_take',
                'value' => function($model){
                    return $model->workers->FIO;
                }
            ],
            'return_date',
            [
                'attribute' => 'id_worker_return',
                'value' => function($model){
                    return $model->workers->FIO;
                }
            ],
        ],
    ]) ?>

</div>
