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
                <h3 class="card-title"><?= $model->paciente->nombre_paciente ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>N sesion:</b></td>
                        <td width="34%"><?= $model->cod_sesion ?></td>
                       
                    </tr>
                    <tr>
                        <td width="16%"><b>Nombre:</b></td>
                        <td width="34%"> <?= $model->paciente->nombre_paciente ?></td>
                        <td width="16%"><b>Apellido:</b></td>
                        <td width="34%"> <?= $model->paciente->apellido_paciente ?></td>
                    
                    </tr>
                    <tr>
                        <td width="16%"><b>Fecha </b></td>
                        <td width="34%"> <?= $model->fecha_seguimiento?></td>
                        <td width="16%"><b>Lugar</b></td>
                        <td width="34%"> <?= $model->lugar_seguimiento?></td>                       
                        
                    </tr>
                    <tr>
                        <td width="16%"><b>Motivo consulta </b></td>
                        <td width="34%"> <?= $model->motivo->tipo_motivo?></td>
                        <td width="16%"><b>objetivos:</b></td>
                        <td width="34%"> <?= $model->objetivo_sesion?></td>                       
                        
                    </tr>
                    <tr>
                        <td width="16%"><b>Tecnica </b></td>
                        <td width="34%"> <?= $model->tecnica_sesion?></td>
                        <td><b>Conclusiones: </b></td>
                        <td><?= $model->conclusiones_sesion?></td>                      
                    </tr>
                    <tr>
                        <td width="16%"><b>Recomendaciones </b></td>
                         <td width="34%"> <?= $model->recomendaciones_sesion?></td>
                    </tr>
                    <tr>
                    <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:m:i', strtotime($model->fecha_ingreso)) ?></td>
                        <td><b>Estado: </b></td>
                        <td><span class="badge bg-<?= $model->activo == 1 ? "green" : "red"; ?>"><?= $model->activo == 1 ? "Activo" : "Inactivo"; ?></span></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                    <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'id_seguimiento' => $model->id_seguimiento], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>