<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblTratamientos */

$this->title = 'Create Tbl Tratamientos';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tratamientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tratamientos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
