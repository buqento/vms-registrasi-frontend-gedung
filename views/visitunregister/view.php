<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use Da\QrCode\QrCode;
use app\models\DclDestination;
/* @var $this yii\web\View */
/* @var $model app\models\Visitunregister */

$this->title = $model->code;
$this->params['breadcrumbs'][] = $this->title;

$qrCode = (new QrCode($model->code))
    ->setSize(600)
    ->setMargin(5)
    ->useForegroundColor(0, 0, 0);

$qrCode->writeFile('../../yiibase/qrcode/'. $model->code . '.png');

?>

<div class="row">
	<div class="col-md-2 text-center">
		<img src="<?php echo $qrCode->writeDataUri(); ?>" alt="..." class="img-thumbnail"> 
		<h2><?php echo $model->code; ?></h2>
        <?php
            echo Html::a('<i class="fa glyphicon glyphicon-download"></i> Simpan ke PDF', 
                [
                    '/visitunregister/report', 
                    'code' => $model->code,
                    'guest_name' => $model->guest_name,
                    'company_name' => $model->company_name

                ], 
                [
                    'class'=>'btn btn-success', 
                    'target'=>'_blank', 
                    'data-toggle'=>'tooltip', 
                    'title'=>'Generated PDF file'
                ]
        );
        ?>
	</div>
    <br>
	<div class="col-md-10">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'guest_name',
                'id_number',
                'phone_number',
                'email',
                'code',
                'company_name',
                'dt_visit:datetime',
                'long_visit',
                'additional_info:ntext',
            ],
        ]) ?>
	</div>
</div>