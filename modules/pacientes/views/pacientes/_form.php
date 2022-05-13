<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\FileInput;

Yii::$app->language = 'es_ES';
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline" style="padding:15px;">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <form role="form">
                <div class="box-body">
                    <?= $form->field($model, 'nombre_paciente')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'apellido_paciente')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'edad_paciente')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'fecha_nacimiento')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'lugar_nacimiento')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'telefono_paciente')->textInput(['maxlength' => true]) ?>
                    
                    <?= $form->field($model, 'direccion_paciente')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'profesion_paciente')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'nivel_academico')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'estado_civil')->textInput(['maxlength' => true]) ?>

                    <?php if (Yii::$app->user->can('MasterAccess')) {
                        echo $form->field($model, 'activo')->widget(SwitchInput::class, [
                            'pluginOptions' => [
                                'handleWidth' => 70,
                                'onColor' => 'success',
                                'offColor' => 'danger',
                                'onText' => '<i class="fa fa-check"></i> Enable',
                                'offText' => '<i class="fa fa-close"></i> Disable'
                            ]
                        ]);
                    } else {
                        echo $form->field($model, 'activo', ['showLabels' => false])->hiddenInput(['maxlength' => true]);
                    }
                    ?>

                    <?php
                        /* echo $form->field($model, 'status')->widget(SwitchInput::class, [
                            'pluginOptions' => [
                                'handleWidth' => 70,
                                'onColor' => 'success',
                                'offColor' => 'danger',
                                'onText' => '<i class="fa fa-check"></i> Enable',
                                'offText' => '<i class="fa fa-close"></i> Disable'
                            ]
                        ]);*/
                    ?>
                </div>
                <div class="box-footer">
                    <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Save' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?= Html::a('<i class="fa fa-ban"></i> Cancelar', ['view', 'id_usuario' => $model->id_paciente], ['class' => 'btn btn-danger']) ?>
                </div>
            </form>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>