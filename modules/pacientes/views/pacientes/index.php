<?php
Yii::$app->language = 'es_ES';


use app\models\TblPacientes;
use app\models\TblUsuarios;
use app\modules\pacientes\Pacientes;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Listado de pacientes';
$this->params['breadcrumbs'][] = 'Listado de pacientes';
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <div class="tbl-cat-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>
            <?php
            $gridColumns = [
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'contentOptions' => ['class' => 'kartik-sheet-style'],
                    'width' => '36px',
                    'header' => '#',
                    'headerOptions' => ['class' => 'kartik-sheet-style']
                    
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '80px', /*El ancho que tendra la columna */
                    'format' => 'raw', /* El formato de la columna, puede ser html o raw*/
                    'vAlign' => 'middle', /* Alineacion vertical */
                    'hAlign' => 'center', /*Alineacion horizontal */
                    'attribute' => 'id_paciente', /* El atributo que se mostrara, este es correspondiente a los que estan en la db */
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::tag('span', $model->id_paciente, ['class' => 'badge bg-purple']); /* Una etiqueta donde se muestra el valor del atributo especificado */
                    },
                    'filter' => false,
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '450px',
                    'attribute' => 'nombre_paciente',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::a($model->nombre_paciente,  ['view', 'id_paciente' => $model->id_paciente]);
                    },
                    'filterType' => GridView::FILTER_SELECT2, 
                    'filter' => ArrayHelper::map(TblPacientes::find()->orderBy('nombre_paciente')->all(), 'id_paciente', 'nombre_paciente'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Selecciona un paciente...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '450px',
                    'attribute' => 'apellido_paciente',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::a($model->apellido_paciente,  ['view', 'id_paciente' => $model->id_paciente]);
                    },
                    'filterType' => GridView::FILTER_SELECT2, 
                    'filter' => ArrayHelper::map(TblPacientes::find()->orderBy('apellido_paciente')->all(), 'id_paciente', 'apellido_paciente'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Selecciona un paciente...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '150px',
                    'format' => 'raw',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'attribute' => 'edad_paciente',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::tag('span', $model->edad_paciente, ['class' => 'badge bg-purple']);
                    },
                    'filter' => false,
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '150px',
                    'format' => 'raw',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'attribute' => 'lugar_nacimiento',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::tag('span', $model->lugar_nacimiento, ['class' => 'badge bg-purple']);
                    },
                    'filter' => false,
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'fecha_nacimiento',
                    'headerOptions' => ['class' => 'kv-sticky-column'],
                    'contentOptions' => ['class' => 'kv-sticky-column'],
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'width' => '250px',
                    'filterType' => GridView::FILTER_DATE,
                    'filterWidgetOptions' => ([
                        'model' => $dataProvider,
                        'attribute' => 'fecha_nacimiento',
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'yyyy-M-dd',
                            'autoWidget' => true,
                            'autoclose' => true,
                            'todayHighlight' => true,
                        ],
                    ]),
                ],
                /*[
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'fecha_mod',
                    'headerOptions' => ['class' => 'kv-sticky-column'],
                    'contentOptions' => ['class' => 'kv-sticky-column'],
                    'vAlign' => 'middle',
                    'hAlign' => 'right',
                    'width' => '250px',
                    'filterType' => GridView::FILTER_DATE,
                    'filterWidgetOptions' => ([
                        'model' => $dataProvider,
                        'attribute' => 'fecha_mod',
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'yyyy-M-dd',
                            'autoWidget' => true,
                            'autoclose' => true,
                            'todayHighlight' => true,
                        ],
                    ]),
                ],*/
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'urlCreator' => function ($action, TblPacientes $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_paciente' => $model->id_paciente]);
                     }
                ],
            ];

            $exportmenu = ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_CSV => false,
                ],
            ]);

            echo GridView::widget([
                'id' => 'kv-Listado-de-pacientes',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                // set your toolbar
                'toolbar' =>  [
                    [
                        'content' =>
                        Html::a('<i class="fas fa-plus"></i> Agregar', ['create'], [
                            'class' => 'btn btn-success',
                            'data-pjax' => 0,
                        ]) . ' ' .
                            Html::a('<i class="fas fa-redo"></i>', ['index'], [
                                'class' => 'btn btn-outline-success',
                                'data-pjax' => 0,
                            ]),
                        'options' => ['class' => 'btn-group mr-2']
                    ],
                    '{toggleData}',
                    $exportmenu,
                    
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                // set export properties
                // parameters from the demo form
                'bordered' => true,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                //'showPageSummary'=>$pageSummary,
                'panel' => [
                    'type' => GridView::TYPE_INFO,
                    'heading' => 'Listado de pacientes',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>