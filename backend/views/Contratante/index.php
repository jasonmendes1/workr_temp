<?php

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
                'label' => 'ID da Conta',
                'attribute' => 'IDUser',
                'value' => function ($model) {
                    $user = User::find()->where(['id' => $model->IDPrestador])->one();
                    return $user->id;
                }
            ],
            'IDContratante',
            [
                'label' => 'Username',
                'attribute' => 'IDUser',
                'value' => function ($model) {
                    $user = User::find()->where(['id' => $model->IDPrestador])->one();
                    return $user->username;
                }
            ],
            'nome',
            [
                'label' => 'Email',
                'attribute' => 'IDUser',
                'value' => function ($model) {
                    $user = User::find()->where(['id' => $model->IDPrestador])->one();
                    return $user->email;
                }
            ],
            'sexo',
            'avatar',
            'datanascimento:date',
            [
                'label' => 'Registado em:',
                'attribute' => 'IDUser',
                'value' => function ($model) {
                    $user = User::find()->where(['id' => $model->IDPrestador])->one();
                    return $user->created_at;
                }
            ],
            //'IDUser',
            //'IDCargo',
            //'IDEmpresa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
