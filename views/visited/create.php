<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Visited */

$this->title = 'Kunjungan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visited-create">

<h3 class="text-right">
  <?= Html::encode($this->title) ?> 
  <span class="glyphicon glyphicon glyphicon-menu-right"></span>
  <small class="text-muted"><?= $model->destination ?></small>
</h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
