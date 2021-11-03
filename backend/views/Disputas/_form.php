<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Disputas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disputas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resolvido')->dropDownList([ 'Sim' => 'Sim', 'Não' => 'Não', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'IDPagamento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
