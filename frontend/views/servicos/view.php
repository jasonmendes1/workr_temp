<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Servicos */

$this->title = $model->IDServico;
$this->params['breadcrumbs'][] = ['label' => 'Servicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="servicos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IDServico' => $model->IDServico], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IDServico' => $model->IDServico], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IDServico',
            'requerimento',
            'dataInicio',
            'dataFim',
            'IDPrestador',
        ],
    ]) ?>

</div>
