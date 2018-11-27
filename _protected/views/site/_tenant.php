<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\ActiveForm;

?>

<div class="card">
  <div class="card-body">
	<div class="col-sm-2">
		<img class="card-img-top img-fluid" src="<?= $model->picture ?>">
	</div>
	<div class="col-sm-10">
	    <h3 class="card-title"><?= Html::encode($model->name) ?></h3>

        <?=  Html::a('Kunjungi', ['visited/create', 'id' => $model->id], [
            'class' => 'btn btn-primary',
       ]) ?>

	</div>

  </div>
</div>
<br>