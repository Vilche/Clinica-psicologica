<?php

use app\models\TblMotivoconsulta;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\seguimiento\models\MotivoconsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Motivoconsultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-motivoconsulta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Motivoconsulta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_motivo',
            'tipo_motivo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblMotivoconsulta $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_motivo' => $model->id_motivo]);
                 }
            ],
        ],
    ]); ?>


</div>
