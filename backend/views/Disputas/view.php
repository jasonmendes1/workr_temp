<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Disputas */

$this->title = $model->IDDisputa;
$this->params['breadcrumbs'][] = ['label' => 'Disputas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="disputas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IDDisputa' => $model->IDDisputa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IDDisputa' => $model->IDDisputa], [
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
            'IDDisputa',
            'descricao',
            'resolvido',
            'IDPagamento',
        ],
    ]) ?>

</div>
