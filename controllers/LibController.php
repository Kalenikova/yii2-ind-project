<?php

namespace app\controllers;


use app\models\Z1;
use app\models\Z17;
use app\models\Z2;
use app\models\Z3;
use app\models\Z4;
use app\models\Z5;
use app\models\Z6;
use app\models\Z7;
use app\models\Z8;
use app\models\Z9;
use app\models\Z10;
use app\models\Z11;
use app\models\Z12;
use app\models\Z13;
use app\models\Z14;
use app\models\Z15;
use app\models\Z16;
use app\models\Reg;
use app\models\Libraries;
use app\models\Readers_category;
use app\models\Placement;
use app\models\Readers;
use app\models\Workers;
use app\models\Books;
use app\models\Histories;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;

class LibController extends Controller
{



    public function action1()
    {
        $model = new Z1();
        if ($model->load(Yii::$app->request->post())) {
            $readers = readers::find()->where(['like', 'property', $model->title])->all();
        } else {
            $readers = readers::find()->all();
        }
        return $this->render('1', ['readers' => $readers, 'model' => $model]);
    }

    public function action17()
    {

        $model = new Z17();
        
        if ($model->load(Yii::$app->request->post())) {
            $readers = readers::find()->where(['like', 'property', $model->title])->all();
        } else {
            $readers = readers::find()->all();
        }
        $readers = readers::find()->all();
        return $this->render('17', [ 'model' => $model,'readers' => $readers]);
    }

    public function action2()
    {
        $model = new Z2();
        if ($model->load(Yii::$app->request->post())) {
            $books = histories::find()->leftJoin('books', "books.book_num=history.books_num")
                ->where(['like', 'books.title', $model->title])->andWhere(['is', 'return_date', null])->all();
        } else {
            $books = histories::find()->all();
        }
        return $this->render('2', ['books' => $books, 'model' => $model]);
    }


    public function action3()
    {
        $model = new Z3();
        if ($model->load(Yii::$app->request->post())) {
            $books = histories::find()->leftJoin('books', "books.book_num=history.books_num")
                ->where(['like', 'books.author', $model->title])->andWhere(['is', 'return_date', null])->all();
        } else {
            $books = histories::find()->all();
        }
        return $this->render('3', ['books' => $books, 'model' => $model]);
    }

    public function action4()
    {
        $model = new Z4();
        if ($model->load(Yii::$app->request->post())) {
            $dates = histories::find()
                ->where(['>', 'take_date', $model->take_date])
                ->andWhere(['<', 'return_date', $model->return_date])->all();
        } else {
            $dates = histories::find()->all();
        }
        return $this->render('4', ['dates' => $dates, 'model' => $model]);
    }

    public function action5()
    {
        $model = new Z5();
        if ($model->load(Yii::$app->request->post())) {
            $books = books::find()->leftJoin('history', "books.book_num=history.books_num")
                ->leftJoin('readers', "history.ticket_num=readers.ticket_num")
                ->where(['like', 'readers.FIO', $model->FIO])->andWhere('readers.id_lib=history.id_lib')->all();
        } else {
            $books = books::find()->all();
        }
        return $this->render('5', ['books' => $books, 'model' => $model]);
    }

    public function action6()
    {
        $model = new Z6();
        if ($model->load(Yii::$app->request->post())) {
            $books = books::find()->rightJoin('history', "books.book_num=history.books_num")
                ->leftJoin('readers', "history.ticket_num=readers.ticket_num")
                ->where(['like', 'readers.FIO', $model->FIO])->andWhere('readers.id_lib<>history.id_lib')->all();
        } else {
            $books = books::find()->all();
        }
        return $this->render('6', ['books' => $books, 'model' => $model]);
    }

    public function action7()
    {
        $model = new Z7();
        if ($model->load(Yii::$app->request->post())) {
            $places = placement::find()->where(['like', 'shelf', $model->place])->all();
        } else {
            $places = placement::find()->all();
        }
        return $this->render('7', ['places' => $places, 'model' => $model]);
    }

    public function action8()
    {
        $model = new Z8();
        if ($model->load(Yii::$app->request->post())) {
            $dates = histories::find()->where(['>', 'take_date', $model->take_date])
            ->andWhere(['<', 'return_date', $model->return_date])->all();
        } else {
            $dates = histories::find()->all();
        }
        return $this->render('8', ['dates' => $dates, 'model' => $model]);
    }

    public function action9()
    {
        $model = new Z9();
        if ($model->load(Yii::$app->request->post())) {
            $dates = histories::find()->select(['COUNT(ticket_num) AS cnt', 'id_worker_take'])
                ->where(['>', 'take_date', $model->take_date])
                ->andWhere(['<', 'return_date', $model->return_date])
                ->groupBy('id_worker_take')->all();
        } else {
            $dates = histories::find()->select(['COUNT(ticket_num) AS cnt', 'id_worker_take'])
            ->groupBy('id_worker_take')->all();
        }
        return $this->render('9', ['dates' => $dates, 'model' => $model]);
    }

    public function action10()
    {
        $model = new Z10();
        if ($model->load(Yii::$app->request->post())) {
            $dates = histories::find()
                ->where('DATEDIFF(`return_date`,`take_date`)>30')->andWhere(['like', 'FIO', $model->title])
                ->all();
        } else {
            $dates = histories::find()->where('DATEDIFF(`return_date`,`take_date`)>30')->all();
        }
        return $this->render('10', ['dates' => $dates, 'model' => $model]);
    }

    public function action11()
    {
        $model = new Z11();
        if ($model->load(Yii::$app->request->post())) {
            $books = books::find()->where(['>=', 'come_date', $model->take_date])
            ->orWhere(['>=', 'end_date', $model->return_date])->all();
        } else {
            $books = books::find()->all();
        }
        return $this->render('11', ['books' => $books, 'model' => $model]);
    }

    public function action12()
    {
        $model = new Z12();
        if ($model->load(Yii::$app->request->post())) {
            $rooms = workers::find()->where(['like', 'reading_room', $model->reading_room])->all();
        } else {
            $rooms = workers::find()->all();
        }
        return $this->render('12', ['rooms' => $rooms, 'model' => $model]);
    }

    public function action13()
    {
        $model = new Z13();
        if ($model->load(Yii::$app->request->post())) {
            $dates = readers::find()->leftJoin('history', "readers.ticket_num=history.ticket_num")
                ->where(['<>', 'take_date', $model->take_date])
                ->orWhere(['<>', 'return_date', $model->return_date])
                ->all();
        } else {
            $dates = readers::find()->all();
        }
        return $this->render('13', ['dates' => $dates, 'model' => $model]);
    }


    public function action14()
    {
        $model = new Z14();
        if ($model->load(Yii::$app->request->post())) {
            $books = books::find()->where(['like', 'title', $model->title])->all();
        } else {
            $books = books::find()->all();
        }
        return $this->render('14', ['books' => $books, 'model' => $model]);
    }


    public function action15()
    {
        $model = new Z15();
        if ($model->load(Yii::$app->request->post())) {
            $books = books::find()->where(['like', 'author', $model->author])->all();
        } else {
            $books = books::find()->all();
        }
        return $this->render('15', ['books' => $books, 'model' => $model]);
    }

    public function action16()
    {
        $model = new Z16();
        if ($model->load(Yii::$app->request->post())) {
            $populars = histories::find()->select(['COUNT(ticket_num) as cnt', 'books_num'])
            ->leftJoin('books', "books.book_num=history.books_num")
                ->where(['like', 'books.title', $model->name])
                ->groupBy('books_num')->having('COUNT(ticket_num)>1')->all();
        } else {
            $populars = histories::find()->select(['COUNT(ticket_num) as cnt', 'books_num'])
            ->groupBy('books_num')->having('COUNT(ticket_num)>1')->all();
        }
        return $this->render('16', ['populars' => $populars, 'model' => $model]);
    }

    public function actionReg(){
        $mod = new Reg();

        if ($mod->load(Yii::$app->request->post()) && $mod->save()) {
            return $this->redirect(['/site/login']);
        } else {
            return $this->render('reg', [
                'mod' => $mod,
            ]);
        }
        
    }
}
