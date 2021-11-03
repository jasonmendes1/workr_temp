<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TipoPagamento */

$this->title = $model->IDTipoPagamento;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipo-pagamento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IDTipoPagamento' => $model->IDTipoPagamento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IDTipoPagamento' => $model->IDTipoPagamento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IDTipoPagamento',
            'tipoPagamento',
        ],
    ]) ?>

</div>
