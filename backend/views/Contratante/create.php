<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Contratante */

$this->title = 'Create Contratante';
$this->params['breadcrumbs'][] = ['label' => 'Contratantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contratante-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
