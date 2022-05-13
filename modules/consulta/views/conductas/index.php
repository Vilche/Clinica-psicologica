<?php

use app\models\TblConductas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\consulta\models\ConductasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Conductas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-conductas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Conductas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_conducta',
            'conducta',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblConductas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_conducta' => $model->id_conducta]);
                 }
            ],
        ],
    ]); ?>


</div>
