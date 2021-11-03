<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PrestadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prestadors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestador-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Prestador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDPrestador',
            'nome',
            'sexo',
            'avatar',
            'datanascimento',
            //'nif',
            //'num_tele',
            //'IDUser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
