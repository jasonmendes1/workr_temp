<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ContratanteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contratante-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDContratante') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'sexo') ?>

    <?= $form->field($model, 'avatar') ?>

    <?= $form->field($model, 'datanascimento') ?>

    <?php // echo $form->field($model, 'IDUser') ?>

    <?php // echo $form->field($model, 'IDCargo') ?>

    <?php // echo $form->field($model, 'IDEmpresa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
