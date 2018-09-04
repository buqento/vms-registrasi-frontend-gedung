<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Userapp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userapp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'guest_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->fileInput() ?>
    <br>
    <h4>Data Login</h4>
    <hr>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
