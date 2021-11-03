<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Servicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'requerimento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dataInicio')->textInput() ?>

    <?= $form->field($model, 'dataFim')->textInput() ?>

    <?= $form->field($model, 'IDPrestador')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
