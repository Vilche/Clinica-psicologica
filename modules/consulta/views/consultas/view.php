<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $model->id_situacion?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">

                     <tr>
                        <td width="16%"><b>Expediente:</b></td>
                        <td width="34%"><?= $model->paciente->id_paciente ?></td>
                    </tr>   
                    <tr>
                        <td width="16%"><b>Nombre :</b></td>
                        <td width="34%"> <?= $model->paciente->nombre_paciente ?></td>
                        <td width="16%"><b>Apellido :</b></td>
                        <td width="34%"> <?= $model->paciente->apellido_paciente ?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>Motivo de consulta:</b></td>
                        <td width="34%"><?= $model->motivo_consulta ?></td>
                        <td width="16%"><b>Estado actual:</b></td>
                        <td width="34%"> <?= $model->estado_actual ?></td>
                    </tr>
                    <tr>
                    <td width="16%"><b>institucion hospitalaria:</b></td>
                        <td width="34%"> <?= $model->institucion_hospitalaria ?></td>
                        <td width="16%"><b>Grupos sociales:</b></td>
                        <td width="34%"> <?= $model->grupos_sociales ?></td>
                    </tr>
                    <td width="16%"><b>Grupos familiares:</b></td>
                        <td width="34%"> <?= $model->grupos_familiares ?></td>
                        <td width="16%"><b>Habitos de autocuido:</b></td>
                        <td width="34%"> <?= $model->habitos_autocuido ?></td>
                    </tr>
                    <td width="16%"><b>Enfermedad:</b></td>
                        <td width="34%"> <?= $model->enfermedad_actual ?></td>
                        <td width="16%"><b>medicamento actual:</b></td>
                        <td width="34%"> <?= $model->medicamento_actual ?></td>
                    </tr>

                    <td width="16%"><b>Conducta:</b></td>
                        <td width="34%"> <?= $model->conducta->conducta ?></td>
                        <td width="16%"><b>Pruebas:</b></td>
                        <td width="34%"> <?= $model->prueba->pruebas_psicologicas ?></td>
                    </tr>
                    <td width="16%"><b>Tratamiento:</b></td>
                        <td width="34%"> <?= $model->tratamiento->indicador_tratamiento ?></td>
                    </tr>

                    <tr>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:m:i', strtotime($model->fecha_ingreso)) ?></td>
                    </tr>

                   
                   
                    <tr>
                        
                        <td><b>Estado: </b></td>
                        <td><span class="badge bg-<?= $model->activo == 1 ? "green" : "red"; ?>"><?= $model->activo == 1 ? "Activo" : "Inactivo"; ?></span></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                    <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'id_situacion' => $model->id_situacion], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>