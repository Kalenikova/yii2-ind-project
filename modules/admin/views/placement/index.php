<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PlacementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Месторасположении книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="placement-index" style="padding-top: 10px ;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новое месторасположении книг', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'books_num',
                'value' => function($data){
                    return $data->books->title;
                }
            ],
            [
                'attribute' => 'reading_room',
                'value' => function($data){
                    return $data->room->reading_room;
                }
            ],
            'shelf',
            'stillage',
            [
                'attribute' => 'id_lib',
                'value' => function($data){
                    return $data->libraries->name;
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
