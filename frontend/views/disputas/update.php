<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Disputas */

$this->title = 'Update Disputas: ' . $model->IDDisputa;
$this->params['breadcrumbs'][] = ['label' => 'Disputas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDDisputa, 'url' => ['view', 'IDDisputa' => $model->IDDisputa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="disputas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
