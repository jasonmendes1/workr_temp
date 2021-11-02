<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Prestador */

$this->title = 'Create Prestador';
$this->params['breadcrumbs'][] = ['label' => 'Prestadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
