<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ContratanteSearch */
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

            'IDContratante',
            'nome',
            'sexo',
            'avatar',
            'datanascimento',
            //'IDUser',
            //'IDCargo',
            //'IDEmpresa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
