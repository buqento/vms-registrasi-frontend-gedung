<?php

use yii\helpers\Html;

$this->title = 'Kunjungan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visited-create">

<h1><?= Html::encode($this->title) .' <small><i class="glyphicon glyphicon-menu-right"></i>'. $model->tenant->company_name.'</small>' ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
