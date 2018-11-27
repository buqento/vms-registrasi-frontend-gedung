<?php

use yii\helpers\Html;

$this->title = 'Kunjungan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visited-create">

	<p class="text-right"><span class="badge badge-primary"><?= $model->tenant->name ?></span></p>
	<hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
