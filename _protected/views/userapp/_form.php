<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use kartik\select2\Select2;
use app\models\VmsType;
use timurmelnikov\widgets\WebcamShoot;

$fusername = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fpassword = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

?>

<div class="userapp-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="col-md-4">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php 
        $type_id = VmsType::find()
            ->select(['title'])
            ->indexBy('id')
            ->column();

        echo $form->field($model, 'vms_type_id')->widget(Select2::classname(), [
            'data' => $type_id,
            'language' => 'en',
        ]);
    ?>

    <?= $form->field($model, 'id_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->widget(Select2::classname(), [
            'data' => [
                'L' => 'Laki-laki',
                'P' => 'Perempuan'
            ],
            'language' => 'en'
        ]);
    ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>

    <?= WebcamShoot::widget([
            'targetInputID' => 'photo',
            'targetImgID' => 'textphoto',
        ])
    ?>

    <?= $form->field($model, 'photo')->hiddenInput(['id' => 'photo'])->label(false) ?>

</div>
<div class="col-md-4">
    <h4>Data Login</h4>
    <hr>
    <?= $form->field($model, 'username', $fusername)->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password', $fpassword)->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
