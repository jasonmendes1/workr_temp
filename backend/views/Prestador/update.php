<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prestador */

$this->title = 'Update Prestador: ' . $model->IDPrestador;
$this->params['breadcrumbs'][] = ['label' => 'Prestadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDPrestador, 'url' => ['view', 'IDPrestador' => $model->IDPrestador]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prestador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
