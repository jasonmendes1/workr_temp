<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Servicos */

$this->title = 'Create Servicos';
$this->params['breadcrumbs'][] = ['label' => 'Servicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
