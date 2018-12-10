<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="container">
    <?php $form = ActiveForm::begin([
        // 'layout' => 'horizontal',
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="container">
        <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Pencarian tenant'])->label(false) ?>
        </div>
    </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>