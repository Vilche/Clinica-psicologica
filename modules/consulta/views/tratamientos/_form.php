<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblTratamientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-tratamientos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'indicador_tratamiento')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'objetivo_tratamiento')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tecnica_tratamiento')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
