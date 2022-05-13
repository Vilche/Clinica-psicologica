<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblSeguimiento */

$this->title = 'Create Tbl Seguimiento';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Seguimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-seguimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
