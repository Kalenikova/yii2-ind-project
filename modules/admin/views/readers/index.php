<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ReadersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Читатель';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="readers-index" style="padding-top: 10px ;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить читателя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'FIO',
            'ticket_num',
            [
                'attribute' => 'id_lib',
                'value' => function($model){
                    return $model->libraries->name;
                }
            ],
            [
                'attribute' => 'id_category',
                'value' => function($model){
                    return $model->category->name;
                }
            ],
            //'property',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
