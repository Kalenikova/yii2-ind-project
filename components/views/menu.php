<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;

use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>

<!doctype html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

        <div class="wrapper" id="wrapper">
            <!-- Header -->
            <header id="wn__header" class="header__area header__absolute sticky__header" style="background-color: #d3d3d3;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 d-none d-lg-block">
                            <nav class="mainmenu__nav">
                                <ul class="meninmenu d-flex justify-content-start" >

                                   <?php 
                                    NavBar::begin([
                                        'brandUrl' => Yii::$app->homeUrl,
                                        'options' => [
                                            'class' => 'navbar navbar-expand-lg navbar-light  fixed-top',
                                        ],
                                    ]); ?>

                                    <?php
                                    echo Nav::widget([
                                        'options' => ['class' => 'navbar-nav'],
                                        'items' => [
                                           ['label' => Html::img('images/logo.png'), 'url' => ['/site/index']],
                                            ['label' => 'Главная страница', 'url' => ['/site/index']],
                                            ['label' => 'Административная часть', 'items' => [
                                                ['label' => 'Книги', 'url' => ['/admin/books']],
                                                ['label' => 'Жанры/Категории', 'url' => ['/admin/books-category']],
                                                ['label' => 'История посещения', 'url' => ['/admin/history']],
                                                ['label' => 'Библиотеки', 'url' => ['/admin/libraries']],
                                                ['label' => 'Место расположения литературы', 'url' => ['/admin/placement']],
                                                ['label' => 'Читатели', 'url' => ['/admin/readers']],
                                                ['label' => 'Категории читателей', 'url' => ['/admin/readers-category']],
                                                ['label' => 'Залы библиотек', 'url' => ['/admin/room']],
                                                ['label' => 'Библиотекари', 'url' => ['/admin/workers']],
                                            ]],
                                            ['label' => 'Запросы', 'items' => [
                                                ['label' => 'Запрос 1', 'url' => ['/lib/1']],
                                                ['label' => 'Запрос 2', 'url' => ['/lib/2']],
                                                ['label' => 'Запрос 3', 'url' => ['/lib/3']],
                                                ['label' => 'Запрос 4', 'url' => ['/lib/4']],
                                                ['label' => 'Запрос 5', 'url' => ['/lib/5']],
                                                ['label' => 'Запрос 6', 'url' => ['/lib/6']],
                                                ['label' => 'Запрос 7', 'url' => ['/lib/7']],
                                                ['label' => 'Запрос 8', 'url' => ['/lib/8']],
                                                ['label' => 'Запрос 9', 'url' => ['/lib/9']],
                                                ['label' => 'Запрос 10', 'url' => ['/lib/10']],
                                                ['label' => 'Запрос 11', 'url' => ['/lib/11']],
                                                ['label' => 'Запрос 12', 'url' => ['/lib/12']],
                                                ['label' => 'Запрос 13', 'url' => ['/lib/13']],
                                                ['label' => 'Запрос 14', 'url' => ['/lib/14']],
                                                ['label' => 'Запрос 15', 'url' => ['/lib/15']],
                                                ['label' => 'Запрос 16', 'url' => ['/lib/16']],
                                            ]],
                                            Yii::$app->user->isGuest ? (['label' => 'Вход', 'url' => ['/site/login']]
                                            ) : ('<li>'
                                                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                                                . Html::submitButton(
                                                    'Выход (' . Yii::$app->user->identity->username . ')',
                                                    ['class' => 'btn btn-link logout', 'style' => '
                                                    align-items: center;
                                                    align-self: stretch;
                                                    color: #333;
                                                    display: flex;
                                                    font-size: 14px;
                                                    font-weight: 600;
                                                    padding: 0 25px;
                                                    text-transform: uppercase;
                                                    transition: all 0.4s ease 0s;']
                                                )
                                                . Html::endForm()
                                                . '</li>'
                                            )
                                        ],
                                        'encodeLabels' => false,
                                    ]);
                                    NavBar::end(); 
                                    ?> 

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
        </div>
</body>
</html>