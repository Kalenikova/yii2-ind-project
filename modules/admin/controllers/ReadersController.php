<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Readers;
use app\modules\admin\models\ReadersSearch;
use app\modules\admin\models\Libraries;
use app\modules\admin\models\ReadersCategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReadersController implements the CRUD actions for Readers model.
 */
class ReadersController extends Controller
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
     * Lists all Readers models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ReadersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Readers model.
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
     * Creates a new Readers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Readers();

        $modelLibraries = Libraries::find()->orderBy('name ASC')->all();
        foreach ($modelLibraries as $value) {
            $arrLibraries[$value->id] = $value->name;
        }

        $modelReadersCategory = ReadersCategory::find()->orderBy('name ASC')->all();
        foreach ($modelReadersCategory as $value) {
            $arrReadersCategory[$value->id] = $value->name;
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
            'arrReadersCategory' => $arrReadersCategory,
        ]);
    }

    /**
     * Updates an existing Readers model.
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

        $modelReadersCategory = ReadersCategory::find()->orderBy('name ASC')->all();
        foreach ($modelReadersCategory as $value) {
            $arrReadersCategory[$value->id] = $value->name;
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'arrLibraries' => $arrLibraries,
            'arrReadersCategory' => $arrReadersCategory,
        ]);
    }

    /**
     * Deletes an existing Readers model.
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
     * Finds the Readers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Readers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Readers::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
