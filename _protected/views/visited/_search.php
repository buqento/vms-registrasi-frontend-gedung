<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VisitedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visited-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'guest_name') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'id_number') ?>

    <?= $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'destination_id') ?>

    <?php // echo $form->field($model, 'dt_visit') ?>

    <?php // echo $form->field($model, 'long_visit') ?>

    <?php // echo $form->field($model, 'additional_info') ?>

    <?php // echo $form->field($model, 'created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
