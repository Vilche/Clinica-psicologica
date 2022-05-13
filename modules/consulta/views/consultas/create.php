<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblConsultas */

$this->title = 'Create Tbl Consultas';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-consultas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
         'model' => $model,
         'model5'=>$model5,
         'model2' => $model2, 
         'model3' => $model3,
         'model4' => $model4,
    ]) ?>

</div>
