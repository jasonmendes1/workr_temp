<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tipopagamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipopagamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipoPagamento')->dropDownList([ 'Multibanco' => 'Multibanco', 'Paypal' => 'Paypal', 'MBWay' => 'MBWay', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'IDPagamento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
