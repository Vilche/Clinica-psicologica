<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblMotivoconsulta */

$this->title = 'Create Tbl Motivoconsulta';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Motivoconsultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-motivoconsulta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
