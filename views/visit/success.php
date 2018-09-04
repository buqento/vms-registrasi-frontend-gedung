<?php
use yii\helpers\Html;
use Da\QrCode\QrCode;
use yii\widgets\DetailView;

$qrCode = (new QrCode($model->code))
    ->setSize(250)
    ->setMargin(5)
    ->useForegroundColor(51, 153, 255);

$qrCode->writeFile(__DIR__ . '/'. $model->code .'.png');
?>

<div class="row">
	<div class="col-md-2 text-center">
		<img src="<?php echo $qrCode->writeDataUri(); ?>" alt="..." class="img-thumbnail"> 
		<h2><?php echo $model->code; ?></h2>
	</div>
	<div class="col-md-10">
	    <?= DetailView::widget([
	        'model' => $model,
	        'attributes' => [
	            'code',
	            'destination_id',
	            'user_id',
	            'dt_visit',
	            'long_visit',
	            'additional_info:ntext',
	        ],
	    ]) ?>
	</div>
</div>

