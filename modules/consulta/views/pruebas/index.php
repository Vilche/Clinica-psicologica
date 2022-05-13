<?php

use app\models\TblPruebas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\consulta\models\PruebasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Pruebas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pruebas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Pruebas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_prueba',
            'pruebas_psicologicas:ntext',
            'resultados_obtenidos:ntext',
            'impresion_diagnostica:ntext',
            'pronostico_esperado:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblPruebas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_prueba' => $model->id_prueba]);
                 }
            ],
        ],
    ]); ?>


</div>
