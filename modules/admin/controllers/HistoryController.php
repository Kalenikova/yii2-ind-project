<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\History;
use app\modules\admin\models\HistorySearch;
use app\modules\admin\models\Libraries;
use app\modules\admin\models\Readers;
use app\modules\admin\models\Books;
use app\modules\admin\models\Workers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HistoryController implements the CRUD actions for History model.
 */
class HistoryController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all History models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new HistorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single History model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new History model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new History();

        $modelLibraries = Libraries::find()->orderBy('name ASC')->all();
        foreach ($modelLibraries as $value) {
            $arrLibraries[$value->id] = $value->name;
        }

        $modelReaders = Readers::find()->orderBy('FIO ASC')->all();
        foreach ($modelReaders as $value) {
            $arrReaders[$value->ticket_num] = $value->FIO;
        }

        $modelBooks = Books::find()->orderBy('title ASC')->all();
        foreach ($modelBooks as $value) {
            $arrBooks[$value->book_num] = $value->title;
        }

        $modelWorkers = Workers::find()->orderBy('FIO ASC')->all();
        foreach ($modelWorkers as $value) {
            $arrWorkers[$value->id] = $value->FIO;
        }

        $modelWorkersr = Workers::find()->orderBy('FIO ASC')->all();
        foreach ($modelWorkersr as $value) {
            $arrWorkersr[$value->id] = $value->FIO;
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'arrLibraries' => $arrLibraries,
            'arrReaders' => $arrReaders,
            'arrBooks' => $arrBooks,
            'arrWorkers' => $arrWorkers,
            'arrWorkersr' => $arrWorkersr,
        ]);
    }

    /**
     * Updates an existing History model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelLibraries = Libraries::find()->orderBy('name ASC')->all();
        foreach ($modelLibraries as $value) {
            $arrLibraries[$value->id] = $value->name;
        }

        $modelReaders = Readers::find()->orderBy('FIO ASC')->all();
        foreach ($modelReaders as $value) {
            $arrReaders[$value->ticket_num] = $value->FIO;
        }

        $modelBooks = Books::find()->orderBy('title ASC')->all();
        foreach ($modelBooks as $value) {
            $arrBooks[$value->book_num] = $value->title;
        }

        $modelWorkers = Workers::find()->orderBy('FIO ASC')->all();
        foreach ($modelWorkers as $value) {
            $arrWorkers[$value->id] = $value->FIO;
        }

        $modelWorkersr = Workers::find()->orderBy('FIO ASC')->all();
        foreach ($modelWorkersr as $value) {
            $arrWorkersr[$value->id] = $value->FIO;
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'arrLibraries' => $arrLibraries,
            'arrReaders' => $arrReaders,
            'arrBooks' => $arrBooks,
            'arrWorkers' => $arrWorkers,
            'arrWorkersr' => $arrWorkersr,
        ]);
    }

    /**
     * Deletes an existing History model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the History model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return History the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = History::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
