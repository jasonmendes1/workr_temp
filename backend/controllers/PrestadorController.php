<?php

namespace backend\controllers;

use backend\models\Prestador;
use backend\models\PrestadorSearch;
use backend\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrestadorController implements the CRUD actions for Prestador model.
 */
class PrestadorController extends Controller
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
     * Lists all Prestador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Prestador();
        $searchModel = new PrestadorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        //$user = User::find()->where(['id' => $model->IDUser])->one();
        $user = User::find()->where(['id' => Yii::$app->user->identity->getId()])->one();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'user' => $user,
        ]);
    }

    /**
     * Displays a single Prestador model.
     * @param int $IDPrestador Id Prestador
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Prestador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Prestador();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->IDPrestador]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Prestador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $IDPrestador Id Prestador
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDPrestador]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Prestador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $IDPrestador Id Prestador
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDPrestador)
    {
        $this->findModel($IDPrestador)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Prestador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $IDPrestador Id Prestador
     * @return Prestador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IDPrestador)
    {
        if (($model = Prestador::findOne($IDPrestador)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
