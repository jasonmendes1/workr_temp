<?php

namespace backend\controllers;

use backend\models\Contratante;
use backend\models\ContratanteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContratanteController implements the CRUD actions for Contratante model.
 */
class ContratanteController extends Controller
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
     * Lists all Contratante models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContratanteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contratante model.
     * @param int $IDContratante Id Contratante
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IDContratante)
    {
        return $this->render('view', [
            'model' => $this->findModel($IDContratante),
        ]);
    }

    /**
     * Creates a new Contratante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Contratante();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'IDContratante' => $model->IDContratante]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Contratante model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $IDContratante Id Contratante
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IDContratante)
    {
        $model = $this->findModel($IDContratante);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IDContratante' => $model->IDContratante]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Contratante model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $IDContratante Id Contratante
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDContratante)
    {
        $this->findModel($IDContratante)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contratante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $IDContratante Id Contratante
     * @return Contratante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IDContratante)
    {
        if (($model = Contratante::findOne($IDContratante)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
