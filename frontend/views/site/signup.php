<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\jui\DatePicker;


$this->title = 'Signup Prestador';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'nome')->textInput() ?>

                <?= $form->field($model, 'sexo')->dropDownList(['' =>'Selecionar Sexo...','Masculino' => 'Masculino', 'Feminino' => 'Feminino']) ?>

                <?= $form->field($model,'datanascimento')->widget(DatePicker::className(),['dateFormat' => 'y-M-d']) ?>

                <?= $form->field($model, 'num_tele')->textInput(['type' => 'text', 'maxlength' => 9]) ?>

                <?= $form->field($model, 'nif')->textInput(['type' => 'text', 'maxlength' => 9]) ?>

                <?= $form->field($model, 'avatar')->fileInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
