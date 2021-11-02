<?php

namespace frontend\controllers;

use frontend\models\Servicos;
use frontend\models\ServicosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServicosController implements the CRUD actions for Servicos model.
 */
class ServicosController extends Controller
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
     * Lists all Servicos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servicos model.
     * @param int $IDServico Id Servico
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IDServico)
    {
        return $this->render('view', [
            'model' => $this->findModel($IDServico),
        ]);
    }

    /**
     * Creates a new Servicos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Servicos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'IDServico' => $model->IDServico]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Servicos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $IDServico Id Servico
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IDServico)
    {
        $model = $this->findModel($IDServico);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IDServico' => $model->IDServico]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Servicos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $IDServico Id Servico
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDServico)
    {
        $this->findModel($IDServico)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Servicos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $IDServico Id Servico
     * @return Servicos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IDServico)
    {
        if (($model = Servicos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
