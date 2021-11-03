<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ServicosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDServico') ?>

    <?= $form->field($model, 'requerimento') ?>

    <?= $form->field($model, 'dataInicio') ?>

    <?= $form->field($model, 'dataFim') ?>

    <?= $form->field($model, 'IDPrestador') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
