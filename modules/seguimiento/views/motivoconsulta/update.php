<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblMotivoconsulta */

$this->title = 'Update Tbl Motivoconsulta: ' . $model->id_motivo;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Motivoconsultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_motivo, 'url' => ['view', 'id_motivo' => $model->id_motivo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-motivoconsulta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
