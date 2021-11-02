<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Servicos */

$this->title = 'Update Servicos: ' . $model->IDServico;
$this->params['breadcrumbs'][] = ['label' => 'Servicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDServico, 'url' => ['view', 'IDServico' => $model->IDServico]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
