<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\select2\Select2;
use app\models\DclType;
/* @var $this yii\web\View */
/* @var $model app\models\Userapp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userapp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'guest_name')->textInput(['maxlength' => true]) ?>

    <?php 
        $id_type = DclType::find()
            ->select(['title'])
            ->indexBy('title')
            ->column();

        echo $form->field($model, 'id_type')->widget(Select2::classname(), [
            'data' => $id_type,
            'language' => 'en',
            'options' => ['placeholder' => 'pilih tipe identitas ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'id_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]); ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>
    
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
