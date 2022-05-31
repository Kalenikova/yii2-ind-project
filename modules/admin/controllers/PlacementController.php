<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Placement;
use app\modules\admin\models\PlacementSearch;
use app\modules\admin\models\Books;
use app\modules\admin\models\Room;
use app\modules\admin\models\Libraries;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlacementController implements the CRUD actions for Placement model.
 */
class PlacementController extends Controller
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
     * Lists all Placement models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PlacementSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Placement model.
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
     * Creates a new Placement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Placement();

        $modelBooks = Books::find()->orderBy('title ASC')->all();
        foreach ($modelBooks as $value) {
            $arrBooks[$value->book_num] = $value->title;
        }

        $modelLibraries = Libraries::find()->orderBy('name ASC')->all();
        foreach ($modelLibraries as $value) {
            $arrLibraries[$value->id] = $value->name;
        }

        $modelRoom = Room::find()->orderBy('reading_room ASC')->all();
        foreach ($modelRoom as $value) {
            $arrRoom[$value->id] = $value->reading_room;
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
            'arrBooks' => $arrBooks,
            'arrLibraries' => $arrLibraries,
            'arrRoom' => $arrRoom,
        ]);
    }

    /**
     * Updates an existing Placement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelBooks = Books::find()->orderBy('title ASC')->all();
        foreach ($modelBooks as $value) {
            $arrBooks[$value->book_num] = $value->title;
        }

        $modelLibraries = Libraries::find()->orderBy('name ASC')->all();
        foreach ($modelLibraries as $value) {
            $arrLibraries[$value->id] = $value->name;
        }

        $modelRoom = Room::find()->orderBy('reading_room ASC')->all();
        foreach ($modelRoom as $value) {
            $arrRoom[$value->id] = $value->reading_room;
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'arrBooks' => $arrBooks,
            'arrLibraries' => $arrLibraries,
            'arrRoom' => $arrRoom,
        ]);
    }

    /**
     * Deletes an existing Placement model.
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
     * Finds the Placement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Placement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Placement::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
