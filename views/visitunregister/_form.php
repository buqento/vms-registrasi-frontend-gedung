<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use app\models\DclLongVisit;
/* @var $this yii\web\View */
/* @var $model app\models\Visitunregister */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visitunregister-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'guest_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->fileInput() ?>

    <?= $form->field($model, 'code')->hiddenInput()->label(false) ?>
    
    <?= $form->field($model, 'destination_id')->hiddenInput()->label(false) ?>

    <hr>
    <?php echo $form->field($model, 'dt_visit')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [ 'autoclose' => true ]
        ]);
    ?>

    <?php 
    $long_visit = DclLongVisit::find()
        ->select(['title'])
        ->indexBy('id')
        ->column();
    ?>
    <?= $form->field($model, 'long_visit')->dropDownList($long_visit) ?>

    <?= $form->field($model, 'additional_info')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
