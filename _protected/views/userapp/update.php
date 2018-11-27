<?php

use yii\helpers\Html;



$this->title = 'Ubah Akun';
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userapp-update">

	<p class="text-right"><span class="badge badge-primary"><?= $this->title ?></span></p>
	<hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
