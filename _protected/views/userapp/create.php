<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Userapp */

$this->title = 'Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userapp-create">

	<p class="text-right"><span class="badge badge-primary"><?= $this->title ?></span></p>
	<hr>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
