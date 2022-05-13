<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\seguimiento\models\SeguimientoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-seguimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_seguimiento') ?>

    <?= $form->field($model, 'cod_sesion') ?>

    <?= $form->field($model, 'id_paciente') ?>

    <?= $form->field($model, 'fecha_seguimiento') ?>

    <?= $form->field($model, 'lugar_seguimiento') ?>

    <?php // echo $form->field($model, 'id_motivo') ?>

    <?php // echo $form->field($model, 'objetivo_sesion') ?>

    <?php // echo $form->field($model, 'tecnica_sesion') ?>

    <?php // echo $form->field($model, 'conclusiones_sesion') ?>

    <?php // echo $form->field($model, 'recomendaciones_sesion') ?>

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
