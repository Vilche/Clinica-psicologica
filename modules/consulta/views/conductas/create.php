<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblConductas */

$this->title = 'Create Tbl Conductas';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Conductas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-conductas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
