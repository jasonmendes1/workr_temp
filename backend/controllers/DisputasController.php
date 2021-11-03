<?php

namespace backend\controllers;

use backend\models\Disputas;
use backend\models\DisputasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DisputasController implements the CRUD actions for Disputas model.
 */
class DisputasController extends Controller
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
     * Lists all Disputas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DisputasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Disputas model.
     * @param int $IDDisputa Id Disputa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IDDisputa)
    {
        return $this->render('view', [
            'model' => $this->findModel($IDDisputa),
        ]);
    }

    /**
     * Creates a new Disputas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Disputas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'IDDisputa' => $model->IDDisputa]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Disputas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $IDDisputa Id Disputa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IDDisputa)
    {
        $model = $this->findModel($IDDisputa);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IDDisputa' => $model->IDDisputa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Disputas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $IDDisputa Id Disputa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDDisputa)
    {
        $this->findModel($IDDisputa)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Disputas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $IDDisputa Id Disputa
     * @return Disputas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IDDisputa)
    {
        if (($model = Disputas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
