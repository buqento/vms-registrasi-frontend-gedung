<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use kartik\file\FileInput;
use app\models\DclLongVisit;
use app\models\DclType;
use timurmelnikov\widgets\WebcamShoot;
?>

<div class="visited-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if(Yii::$app->user->isGuest){ ?>

    <div class="col-md-6">

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

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'visit_code')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'destination_id')->hiddenInput()->label(false) ?>

    <?php } ?>

    <?php
    if(Yii::$app->user->isGuest){
        // echo $form->field($model, 'photo')->widget(FileInput::classname(), [
        //     'options' => ['accept' => 'image/*',  'capture'=> 'user'],
        // ]);
        echo WebcamShoot::widget([
            'targetInputID' => 'photo',
            'targetImgID' => 'textphoto',
        ]);
        echo $form->field($model, 'photo')->hiddenInput(['id' => 'photo'])->label(false);
    }else{
        echo $form->field($model, 'photo')->hiddenInput()->label(false);
    }
    ?>
</div>
<div class="col-md-6">
    <?php 
        echo $form->field($model, 'dt_visit')->widget(DateTimePicker::classname(), [
                'options' => 
                [
                    'placeholder' => 'Pilih Tanggal & Jam'
                ],
                'readonly' => true,
                'removeButton' => false,
                // 'pickerButton' => ['icon' => 'time'],
                'pluginOptions' => 
                [ 
                    'autoclose' => true, 
                    'todayHighlight' => true, 
                    'startDate' => date('Y-m-d H:i:s'),
                    'endDate' => '+7d',
                ]
            ]);
    ?>

    <?php 
        $long_visit = DclLongVisit::find()
            ->select(['title'])
            ->indexBy('title')
            ->column();

        echo $form->field($model, 'long_visit')->widget(Select2::classname(), [
            'data' => $long_visit,
            'language' => 'en',
        ]);
    ?>

    <?= $form->field($model, 'host')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'additional_info')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton('Kirim', ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
