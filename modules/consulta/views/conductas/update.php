<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblConductas */

$this->title = 'Update Tbl Conductas: ' . $model->id_conducta;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Conductas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_conducta, 'url' => ['view', 'id_conducta' => $model->id_conducta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-conductas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
