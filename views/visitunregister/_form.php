<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\file\FileInput;
use kartik\select2\Select2;
use app\models\DclLongVisit;
use app\models\DclType;
/* @var $this yii\web\View */
/* @var $model app\models\Visitunregister */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visitunregister-form">
    
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

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

    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'photo')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]); ?>

    <?= $form->field($model, 'code')->hiddenInput()->label(false) ?>
    
    <?= $form->field($model, 'destination_id')->hiddenInput()->label(false) ?>

    <hr>
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
            'options' => ['placeholder' => 'pilih lama kunjungan ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'additional_info')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
