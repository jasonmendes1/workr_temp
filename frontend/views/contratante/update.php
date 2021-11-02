<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Contratante */

$this->title = 'Update Contratante: ' . $model->IDContratante;
$this->params['breadcrumbs'][] = ['label' => 'Contratantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDContratante, 'url' => ['view', 'IDContratante' => $model->IDContratante]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contratante-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
