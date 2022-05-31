<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Placement */

$this->title = $model->books->title;
$this->params['breadcrumbs'][] = ['label' => 'Placements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="placement-view" style="padding-top: 10px ;">

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
            'id',
            [
                'attribute' => 'book_num',
                'value' => function($model){
                    return $model->books->title;
                }
            ],
            [
                'attribute' => 'reading_room',
                'value' => function($model){
                    return $model->room->reading_room;
                }
            ],
            'shelf',
            'stillage',
            [
                'attribute' => 'id_lib',
                'value' => function($model){
                    return $model->libraries->name;
                }
            ],
        ],
    ]) ?>

</div>
