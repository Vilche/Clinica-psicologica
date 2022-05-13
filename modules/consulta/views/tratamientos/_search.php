<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\consulta\models\TratamientosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-tratamientos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tratamiento') ?>

    <?= $form->field($model, 'indicador_tratamiento') ?>

    <?= $form->field($model, 'objetivo_tratamiento') ?>

    <?= $form->field($model, 'tecnica_tratamiento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
