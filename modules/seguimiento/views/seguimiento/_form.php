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
use app\models\TblMotivoconsulta;


use kartik\widgets\FileInput;


Yii::$app->language = 'es_ES';
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline" style="padding:15px;">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <form role="form">
                <div class="box-body">
                    <?= $form->field($model, 'cod_sesion')->textInput(['maxlength' => true]) ?>

                    <div class="col-md-12">
                        <?= Html::activeLabel($model, 'id_paciente', ['class' => 'control-label']) ?>
                        <?= $form->field($model, 'id_paciente', ['showLabels' => false])->widget(Select2::class, [
                            'data' => ArrayHelper::map(TblPacientes::find()->all(), 'id_paciente', 'apellido_paciente', 'nombre_paciente'),
                            'language' => 'es',
                            'options' => ['placeholder' => '- Seleccionar paciente -'],
                            'pluginOptions' => ['allowClear' => true],
                        ]); ?>
                    </div>
                    
                    <?= $form->field($model, 'lugar_seguimiento')->textInput(['maxlength' => true]) ?>

                    <div class="col-md-6">
                        <?= Html::activeLabel($model, 'id_motivo', ['class' => 'control-label']) ?>
                        <?= $form->field($model, 'id_motivo', ['showLabels' => false])->widget(Select2::class, [
                            'data' => ArrayHelper::map(TblMotivoconsulta::find()->all(), 'id_motivo', 'tipo_motivo'),
                            'language' => 'es',
                            'options' => ['placeholder' => '- Seleccionar paciente -'],
                            'pluginOptions' => ['allowClear' => true],
                        ]); ?>
                    </div>

                    <?= Html::activeLabel($model, 'objetivo_sesion', ['class' => 'control-label']) ?>
                    <?= $form->field($model, 'objetivo_sesion', ['showLabels' => false])->widget(Summernote::class, [
                        'useKrajeePresets' => true,
                        'container' => [
                            'class' => 'kv-editor-container',
                        ],
                        'pluginOptions' => [
                            'height' => 100,
                        ]
                    ]); ?>
                </div>

        </div>
        <div class="col-md-12">
            <?= Html::activeLabel($model, 'tecnica_sesion', ['class' => 'control-label']) ?>
            <?= $form->field($model, 'tecnica_sesion', ['showLabels' => false])->widget(Summernote::class, [
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
            <?= Html::activeLabel($model, 'conclusiones_sesion', ['class' => 'control-label']) ?>
            <?= $form->field($model, 'conclusiones_sesion', ['showLabels' => false])->widget(Summernote::class, [
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
            <?= Html::activeLabel($model, 'recomendaciones_sesion', ['class' => 'control-label']) ?>
            <?= $form->field($model, 'recomendaciones_sesion', ['showLabels' => false])->widget(Summernote::class, [
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
            <?= Html::activeLabel($model, 'activo', ['class' => 'control-label']) ?>
            <?= $form->field($model, 'activo', ['showLabels' => false])->label('visible')->widget(SwitchInput::class, [
                'value' => $model->activo, //checked status can change by db value
                'options' => ['uncheck' => 0, 'value' => 1], //value if not set ,default is 1
                'pluginOptions' => [
                    'handleWidth' => 60,
                    'onColor' => 'success',
                    'offColor' => 'danger',
                    'onText' => 'Activo',
                    'offText' => 'Inactivo'
                ]
            ]); ?>
        </div>
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