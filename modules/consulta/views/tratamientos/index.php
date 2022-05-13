<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\consulta\models\TratamientosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Tratamientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tratamientos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Tratamientos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tratamiento',
            'indicador_tratamiento:ntext',
            'objetivo_tratamiento:ntext',
            'tecnica_tratamiento:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblTratamientos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_tratamiento' => $model->id_tratamiento]);
                 }
            ],
        ],
    ]); ?>


</div>
