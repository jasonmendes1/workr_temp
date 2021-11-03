<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Contratante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contratante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sexo')->dropDownList([ 'Masculino' => 'Masculino', 'Feminino' => 'Feminino', 'Outro' => 'Outro', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datanascimento')->textInput() ?>

    <?= $form->field($model, 'IDUser')->textInput() ?>

    <?= $form->field($model, 'IDCargo')->textInput() ?>

    <?= $form->field($model, 'IDEmpresa')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
