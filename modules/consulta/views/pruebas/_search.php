<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\consulta\models\PruebasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pruebas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_prueba') ?>

    <?= $form->field($model, 'pruebas_psicologicas') ?>

    <?= $form->field($model, 'resultados_obtenidos') ?>

    <?= $form->field($model, 'impresion_diagnostica') ?>

    <?= $form->field($model, 'pronostico_esperado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
