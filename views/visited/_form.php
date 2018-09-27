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

    <?= $form->field($model, 'guest_name')->textInput(['maxlength' => true]) ?>

    <?php 
        $id_type = DclType::find()
            ->select(['title'])
            ->indexBy('title')
            ->column();

        echo $form->field($model, 'id_type')->widget(Select2::classname(), [
            'data' => $id_type,
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

    <?= $form->field($model, 'destination')->hiddenInput()->label(false) ?>

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

    <?php echo $form->field($model, 'dt_visit')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Tentukan waktu kunjungan ...'],
        'pluginOptions' => [ 'autoclose' => true ]
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

    <?= $form->field($model, 'additional_info')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
