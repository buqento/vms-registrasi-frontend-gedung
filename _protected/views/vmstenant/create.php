<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VmsTenant */

$this->title = 'Create Vms Tenant';
$this->params['breadcrumbs'][] = ['label' => 'Vms Tenants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vms-tenant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
