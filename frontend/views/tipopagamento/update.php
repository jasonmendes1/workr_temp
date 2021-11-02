<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tipopagamento */

$this->title = 'Update Tipopagamento: ' . $model->IDTipoPagamento;
$this->params['breadcrumbs'][] = ['label' => 'Tipopagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDTipoPagamento, 'url' => ['view', 'IDTipoPagamento' => $model->IDTipoPagamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipopagamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
