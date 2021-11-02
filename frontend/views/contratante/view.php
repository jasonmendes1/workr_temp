<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Contratante */

$this->title = $model->IDContratante;
$this->params['breadcrumbs'][] = ['label' => 'Contratantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contratante-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IDContratante' => $model->IDContratante], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IDContratante' => $model->IDContratante], [
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
            'IDContratante',
            'nome',
            'sexo',
            'avatar',
            'datanascimento',
            'IDUser',
            'IDCargo',
            'IDEmpresa',
        ],
    ]) ?>

</div>
