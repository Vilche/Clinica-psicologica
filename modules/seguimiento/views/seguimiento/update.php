<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblSeguimiento */

$this->title = 'Update Tbl Seguimiento: ' . $model->id_seguimiento;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Seguimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_seguimiento, 'url' => ['view', 'id_seguimiento' => $model->id_seguimiento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-seguimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
