<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Prestador */

$this->title = $model->IDPrestador;
$this->params['breadcrumbs'][] = ['label' => 'Prestadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prestador-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IDPrestador' => $model->IDPrestador], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IDPrestador' => $model->IDPrestador], [
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
            'IDPrestador',
            'nome',
            'sexo',
            'avatar',
            'datanascimento',
            'nif',
            'num_tele',
            'IDUser',
        ],
    ]) ?>

</div>
