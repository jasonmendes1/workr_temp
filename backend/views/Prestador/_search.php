<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PrestadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prestador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDPrestador') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'sexo') ?>

    <?= $form->field($model, 'avatar') ?>

    <?= $form->field($model, 'datanascimento') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'num_tele') ?>

    <?php // echo $form->field($model, 'IDUser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
