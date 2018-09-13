<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use Da\QrCode\QrCode;

$qrCode = (new QrCode($model->code))
    ->setSize(250)
    ->setMargin(5)
    ->useForegroundColor(51, 153, 255);

$qrCode->writeFile(__DIR__ . '/'. $model->code .'.png');


?>

<div class="row">
    <div class="col-md-2 text-center">
        <img src="<?php echo $qrCode->writeDataUri(); ?>" alt="..." class="img-thumbnail"> 
        <h2><?= $model->code ?></h2>
        <?php
            echo Html::a('<i class="fa glyphicon glyphicon-download"></i> Simpan ke PDF', 
                [
                    '/visitunregister/report', 
                    // 'code' => $model->code,
                    // 'guest_name' => $model->guest_name

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
                'code',
                'destination_id',
                // 'user_id',
                'dt_visit',
                'long_visit',
                'additional_info:ntext',
            ],
        ]) ?>
    </div>
</div>