<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPruebas */

$this->title = 'Create Tbl Pruebas';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pruebas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pruebas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
