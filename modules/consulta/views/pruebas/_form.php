<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblPruebas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pruebas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pruebas_psicologicas')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'resultados_obtenidos')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'impresion_diagnostica')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pronostico_esperado')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
