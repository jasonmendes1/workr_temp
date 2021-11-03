<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Disputas */

$this->title = 'Create Disputas';
$this->params['breadcrumbs'][] = ['label' => 'Disputas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disputas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
