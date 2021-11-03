<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cargo */

$this->title = 'Update Cargo: ' . $model->IDCargo;
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDCargo, 'url' => ['view', 'IDCargo' => $model->IDCargo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cargo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
