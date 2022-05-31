<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\HistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'История';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-index" style="padding-top: 10px ;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_lib',
                'value' => function($data){
                    return $data->libraries->name;
                }
            ],
            [
                'attribute' => 'ticket_num',
                'value' => function($data){
                    return $data->readers->FIO;
                }
            ],
            [
                'attribute' => 'books_num',
                'value' => function($data){
                    return $data->books->title;
                }
            ],
            'take_date',
            [
                'attribute' => 'id_worker_take',
                'value' => function($data){
                    return $data->workers->FIO;
                }
            ],
            'return_date',
            [
                'attribute' => 'id_worker_return',
                'value' => function($data){
                    return $data->workers->FIO;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
