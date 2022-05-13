<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblPruebas */

$this->title = $model->id_prueba;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pruebas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-pruebas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_prueba' => $model->id_prueba], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_prueba' => $model->id_prueba], [
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
            'id_prueba',
            'pruebas_psicologicas:ntext',
            'resultados_obtenidos:ntext',
            'impresion_diagnostica:ntext',
            'pronostico_esperado:ntext',
        ],
    ]) ?>

</div>
