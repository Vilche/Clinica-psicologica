<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPacientes */

$this->title = 'Create Tbl Pacientes';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pacientes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
