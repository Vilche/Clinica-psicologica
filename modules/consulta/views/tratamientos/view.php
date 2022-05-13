<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblTratamientos */

$this->title = $model->id_tratamiento;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tratamientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-tratamientos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_tratamiento' => $model->id_tratamiento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_tratamiento' => $model->id_tratamiento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tratamiento',
            'indicador_tratamiento:ntext',
            'objetivo_tratamiento:ntext',
            'tecnica_tratamiento:ntext',
        ],
    ]) ?>

</div>
