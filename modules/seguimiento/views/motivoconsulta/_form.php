<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblMotivoconsulta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-motivoconsulta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_motivo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
