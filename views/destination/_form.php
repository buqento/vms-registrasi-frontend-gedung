<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Destination */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="destination-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open_hour')->textInput() ?>

    <?= $form->field($model, 'close_hour')->textInput() ?>

    <?= $form->field($model, 'build_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floor')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'picture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
