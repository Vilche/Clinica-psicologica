<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPacientes */

$this->title = 'Update Tbl Pacientes: ' . $model->id_paciente;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_paciente, 'url' => ['view', 'id_paciente' => $model->id_paciente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-pacientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
