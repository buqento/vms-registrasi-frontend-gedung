<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use Da\QrCode\QrCode;

/* @var $this yii\web\View */
/* @var $model app\models\Visitunregister */

$this->title = $model->code;
$this->params['breadcrumbs'][] = $this->title;

$qrCode = (new QrCode($model->code))
    ->setSize(250)
    ->setMargin(5)
    ->useForegroundColor(51, 153, 255);

$qrCode->writeFile(__DIR__ .'/'. $model->code . '.png');

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
                // 'id',
                'guest_name',
                'id_number',
                'phone_number',
                'email:email',
                'photo',
                'code',
                'destination_id',
                'dt_visit',
                'long_visit',
                'additional_info:ntext',
            ],
        ]) ?>
	</div>
</div>