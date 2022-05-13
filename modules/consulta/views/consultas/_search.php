<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\consulta\models\ConsultasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-consultas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_situacion') ?>

    <?= $form->field($model, 'motivo_consulta') ?>

    <?= $form->field($model, 'estado_actual') ?>

    <?= $form->field($model, 'institucion_hospitalaria') ?>

    <?= $form->field($model, 'grupos_sociales') ?>

    <?php // echo $form->field($model, 'grupos_familiares') ?>

    <?php // echo $form->field($model, 'habitos_autocuido') ?>

    <?php // echo $form->field($model, 'medico_actual') ?>

    <?php // echo $form->field($model, 'enfermedad_actual') ?>

    <?php // echo $form->field($model, 'medicamento_actual') ?>

    <?php // echo $form->field($model, 'id_conducta') ?>

    <?php // echo $form->field($model, 'id_prueba') ?>

    <?php // echo $form->field($model, 'id_tratamiento') ?>

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
