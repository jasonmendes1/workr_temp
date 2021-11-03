<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = 'Update Empresa: ' . $model->IDEmpresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDEmpresa, 'url' => ['view', 'IDEmpresa' => $model->IDEmpresa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empresa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
