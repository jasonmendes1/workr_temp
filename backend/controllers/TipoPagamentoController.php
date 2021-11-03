<?php

namespace backend\controllers;

use backend\models\TipoPagamento;
use backend\models\TipoPagamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoPagamentoController implements the CRUD actions for TipoPagamento model.
 */
class TipoPagamentoController extends Controller
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
     * Lists all TipoPagamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TipoPagamentoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoPagamento model.
     * @param int $IDTipoPagamento Id Tipo Pagamento
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IDTipoPagamento)
    {
        return $this->render('view', [
            'model' => $this->findModel($IDTipoPagamento),
        ]);
    }

    /**
     * Creates a new TipoPagamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TipoPagamento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'IDTipoPagamento' => $model->IDTipoPagamento]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TipoPagamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $IDTipoPagamento Id Tipo Pagamento
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IDTipoPagamento)
    {
        $model = $this->findModel($IDTipoPagamento);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IDTipoPagamento' => $model->IDTipoPagamento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TipoPagamento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $IDTipoPagamento Id Tipo Pagamento
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDTipoPagamento)
    {
        $this->findModel($IDTipoPagamento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TipoPagamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $IDTipoPagamento Id Tipo Pagamento
     * @return TipoPagamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IDTipoPagamento)
    {
        if (($model = TipoPagamento::findOne($IDTipoPagamento)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
