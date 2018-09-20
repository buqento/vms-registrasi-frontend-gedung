<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DclDestination */

$this->title = 'Update Dcl Destination: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dcl Destinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dcl-destination-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
