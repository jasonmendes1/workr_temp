<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pagamento */

$this->title = 'Update Pagamento: ' . $model->IDPagamento;
$this->params['breadcrumbs'][] = ['label' => 'Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDPagamento, 'url' => ['view', 'IDPagamento' => $model->IDPagamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pagamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
