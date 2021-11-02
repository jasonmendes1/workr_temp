<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TipopagamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipopagamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipopagamento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipopagamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDTipoPagamento',
            'tipoPagamento',
            'IDPagamento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
