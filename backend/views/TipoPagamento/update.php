<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TipoPagamento */

$this->title = 'Update Tipo Pagamento: ' . $model->IDTipoPagamento;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDTipoPagamento, 'url' => ['view', 'IDTipoPagamento' => $model->IDTipoPagamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-pagamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
