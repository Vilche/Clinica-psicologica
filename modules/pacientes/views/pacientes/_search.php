<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pacientes\models\PacientesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pacientes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_paciente') ?>

    <?= $form->field($model, 'nombre_paciente') ?>

    <?= $form->field($model, 'apellido_paciente') ?>

    <?= $form->field($model, 'edad_paciente') ?>

    <?= $form->field($model, 'fecha_nacimiento') ?>

    <?php // echo $form->field($model, 'lugar_nacimiento') ?>

    <?php // echo $form->field($model, 'telefono_paciente') ?>

    <?php // echo $form->field($model, 'direccion_paciente') ?>

    <?php // echo $form->field($model, 'profesion_paciente') ?>

    <?php // echo $form->field($model, 'nivel_academico') ?>

    <?php // echo $form->field($model, 'estado_civil') ?>

    <?php // echo $form->field($model, 'user_ingreso') ?>

    <?php // echo $form->field($model, 'fecha_ingreso') ?>

    <?php // echo $form->field($model, 'user_modifico') ?>

    <?php // echo $form->field($model, 'fecha_modifico') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
