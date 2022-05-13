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
                <h3 class="card-title"><?= $model->nombre_paciente." ".$model->apellido_paciente ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>N. Expediente:</b></td>
                        <td width="34%"><?= $model->id_paciente ?></td>
                        <td width="16%"><b>Nombre:</b></td>
                        <td width="34%"> <?= $model->nombre_paciente ?></td>
                    </tr>
                    <tr>
                    <td width="16%"><b>Edad:</b></td>
                        <td width="34%"> <?= $model->edad_paciente ?></td>
                        <td width="16%"><b>Apellido:</b></td>
                        <td width="34%"> <?= $model->apellido_paciente ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:m:i', strtotime($model->fecha_ingreso)) ?></td>
                        <td width="16%"><b>Fecha de nacimiento:</b></td>
                        <td width="34%"> <?= $model->fecha_nacimiento ?></td>
                        
                        
                    </tr>
                    <tr>
                        <td width="16%"><b>telefono </b></td>
                        <td width="34%"> <?= $model->telefono_paciente?></td>
                        <td width="16%"><b>Direccion</b></td>
                        <td width="34%"> <?= $model->direccion_paciente?></td>                       
                        
                    </tr>
                    <tr>
                        <td width="16%"><b>Profesion </b></td>
                        <td width="34%"> <?= $model->profesion_paciente?></td>
                        <td width="16%"><b>Nivel Academico</b></td>
                        <td width="34%"> <?= $model->nivel_academico?></td>                       
                        
                    </tr>
                    <tr>
                        <td width="16%"><b>Estado Civil </b></td>
                        <td width="34%"> <?= $model->estado_civil?></td>
                        <td><b>Usuario: </b></td>
                        <td><?= $model->userIngreso->nombre?></td>                      
                        
                    </tr>
                    <tr>
                        
                        <td><b>Estado: </b></td>
                        <td><span class="badge bg-<?= $model->activo == 1 ? "green" : "red"; ?>"><?= $model->activo == 1 ? "Activo" : "Inactivo"; ?></span></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                    <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'id_paciente' => $model->id_paciente], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>