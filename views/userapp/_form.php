<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\select2\Select2;
use app\models\DclType;
use timurmelnikov\widgets\WebcamShoot;
?>

<div class="userapp-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="col-md-4">

    <?= $form->field($model, 'guest_name')->textInput(['maxlength' => true]) ?>

    <?php 
        $type_id = DclType::find()
            ->select(['title'])
            ->indexBy('id')
            ->column();

        echo $form->field($model, 'type_id')->widget(Select2::classname(), [
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
    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

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
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
