<?php

use app\models\TblEspecies;
use backend\models\TblSucursales;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use kartik\widgets\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\models\TblConductas;
use app\models\TblPacientes;
use kartik\editors\Summernote;

?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Crear / Editar registro</h3>
            </div>
            <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
            <div class="card-body">
                <form role="form">
                    <div class="row">
                        <div class="col-md-12">

                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'id_paciente', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'id_paciente', ['showLabels' => false])->widget(Select2::class, [
                                'data' => ArrayHelper::map(TblPacientes::find()->all(), 'id_paciente','apellido_paciente','nombre_paciente'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar paciente -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div> 
                        
                            <?= Html::activeLabel($model, 'motivo_consulta', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'motivo_consulta', ['showLabels' => false])->widget(Summernote::class, [
                                'useKrajeePresets' => true,
                                'container' => [
                                    'class' => 'kv-editor-container',
                                ],
                                'pluginOptions' => [
                                    'height' => 100,
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'estado_actual', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'estado_actual', ['showLabels' => false])->widget(Summernote::class, [
                                'useKrajeePresets' => true,
                                'container' => [
                                    'class' => 'kv-editor-container',
                                ],
                                'pluginOptions' => [
                                    'height' => 100,
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'institucion_hospitalaria', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'institucion_hospitalaria', ['showLabels' => false])->widget(Summernote::class, [
                                'useKrajeePresets' => true,
                                'container' => [
                                    'class' => 'kv-editor-container',
                                ],
                                'pluginOptions' => [
                                    'height' => 100,
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'grupos_sociales', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'grupos_sociales', ['showLabels' => false])->widget(Summernote::class, [
                                'useKrajeePresets' => true,
                                'container' => [
                                    'class' => 'kv-editor-container',
                                ],
                                'pluginOptions' => [
                                    'height' => 100,
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'grupos_familiares', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'grupos_familiares', ['showLabels' => false])->widget(Summernote::class, [
                                'useKrajeePresets' => true,
                                'container' => [
                                    'class' => 'kv-editor-container',
                                ],
                                'pluginOptions' => [
                                    'height' => 100,
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'habitos_autocuido', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'habitos_autocuido', ['showLabels' => false])->widget(Summernote::class, [
                                'useKrajeePresets' => true,
                                'container' => [
                                    'class' => 'kv-editor-container',
                                ],
                                'pluginOptions' => [
                                    'height' => 100,
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'medico_actual', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'medico_actual', ['showLabels' => false])->widget(Summernote::class, [
                                'useKrajeePresets' => true,
                                'container' => [
                                    'class' => 'kv-editor-container',
                                ],
                                'pluginOptions' => [
                                    'height' => 100,
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'enfermedad_actual', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'enfermedad_actual', ['showLabels' => false])->widget(Summernote::class, [
                                'useKrajeePresets' => true,
                                'container' => [
                                    'class' => 'kv-editor-container',
                                ],
                                'pluginOptions' => [
                                    'height' => 100,
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'medicamento_actual', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'medicamento_actual', ['showLabels' => false])->widget(Summernote::class, [
                                'useKrajeePresets' => true,
                                'container' => [
                                    'class' => 'kv-editor-container',
                                ],
                                'pluginOptions' => [
                                    'height' => 100,
                                ]
                            ]); ?>
                        </div>     
                                       
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'id_conducta', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'id_conducta', ['showLabels' => false])->widget(Select2::class, [
                                'data' => ArrayHelper::map(TblConductas::find()->all(), 'id_conducta', 'conducta'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Conducta -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>

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

                        
                    </div>
                    <div class="card-footer">
                        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Guardar' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        <?= Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
                    </div>
                </form>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>