<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPruebas */

$this->title = 'Update Tbl Pruebas: ' . $model->id_prueba;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pruebas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_prueba, 'url' => ['view', 'id_prueba' => $model->id_prueba]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-pruebas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
