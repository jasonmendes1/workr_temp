<?php

use backend\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PrestadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prestadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestador-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Prestador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

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
            'IDPrestador',
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
            'nif',
            'num_tele',
            [
                'label' => 'Registado em:',
                'attribute' => 'IDUser',
                'value' => function ($model) {
                    $user = User::find()->where(['id' => $model->IDPrestador])->one();
                    return $user->created_at;
                }
            ],
            //'IDUser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>