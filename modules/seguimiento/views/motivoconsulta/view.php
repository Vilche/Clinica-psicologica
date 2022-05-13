<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblMotivoconsulta */

$this->title = $model->id_motivo;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Motivoconsultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-motivoconsulta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_motivo' => $model->id_motivo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_motivo' => $model->id_motivo], [
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
            'id_motivo',
            'tipo_motivo',
        ],
    ]) ?>

</div>
