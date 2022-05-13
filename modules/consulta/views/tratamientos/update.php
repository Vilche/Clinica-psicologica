<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblTratamientos */

$this->title = 'Update Tbl Tratamientos: ' . $model->id_tratamiento;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tratamientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tratamiento, 'url' => ['view', 'id_tratamiento' => $model->id_tratamiento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-tratamientos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
