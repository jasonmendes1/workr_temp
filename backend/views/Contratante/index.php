<?php

use backend\models\Cargo;
use backend\models\Contratante;
use backend\models\Empresa;
use backend\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContratanteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contratantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contratante-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Contratante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'ID de Conta',
                'attribute' => 'IDUser',
                'value' => function ($model) {
                    $user = User::find()->where(['id' => $model->IDUser])->one();
                    return $user->id;
                }
            ],
            //'IDContratante',
            [
                'label' => 'ID de Contratante',
                'attribute' => 'IDContratante'
            ],
            [
                'label' => 'Username',
                'attribute' => 'IDUser',
                'value' => function ($model) {
                    $user = User::find()->where(['id' => $model->IDUser])->one();
                    return $user->username;
                }
            ],
            'nome',
            [
                'label' => 'Email',
                'attribute' => 'IDUser',
                'value' => function ($model) {
                    $user = User::find()->where(['id' => $model->IDUser])->one();
                    return $user->email;
                }
            ],
            'sexo',
            'avatar',
            'datanascimento:date',
            [
                'label' => 'Registado em',
                'attribute' => 'IDUser',
                'value' => function ($model) {
                    $user = User::find()->where(['id' => $model->IDUser])->one();
                    return $user->created_at;
                }
            ],
            //'IDUser',
            //'IDCargo',
            [
                'label' => 'Cargo',
                'attribute' => 'IDCargo',
                'value' => function ($model) {
                    $contratante = Cargo::find()->where(['idcargo' => $model->IDCargo])->one();
                    return $contratante->cargo;
                }
            ],
            [
                'label' => 'Empresa',
                'attribute' => 'IDEmpresa',
                'value' => function ($model) {
                    $empresa = Empresa::find()->where(['idempresa' => $model->IDEmpresa])->one();
                    return $empresa->nome;
                }
            ],
            //'IDEmpresa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
