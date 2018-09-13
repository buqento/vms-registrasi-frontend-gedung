<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use app\models\DclLongVisit;
/* @var $this yii\web\View */
/* @var $model app\models\Visit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'destination_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>
   
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
        <?= Html::submitButton('Kirim', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
