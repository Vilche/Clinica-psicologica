<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblConsultas */

$this->title = 'Update Tbl Consultas: ' . $model->id_situacion;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_situacion, 'url' => ['view', 'id_situacion' => $model->id_situacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-consultas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        
  ]) ?>

</div>
