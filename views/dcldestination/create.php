<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DclDestination */

$this->title = 'Create Dcl Destination';
$this->params['breadcrumbs'][] = ['label' => 'Dcl Destinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dcl-destination-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
