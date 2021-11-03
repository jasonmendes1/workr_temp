<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pagamento */

$this->title = $model->IDPagamento;
$this->params['breadcrumbs'][] = ['label' => 'Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pagamento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IDPagamento' => $model->IDPagamento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IDPagamento' => $model->IDPagamento], [
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
            'IDPagamento',
            'valor',
            'taxa',
            'IDTipoPagamento',
            'IDContrante',
            'IDPrestador',
        ],
    ]) ?>

</div>
