<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use Da\QrCode\QrCode;

$qrCode = (new QrCode($model->visit_code))
    ->setSize(600)
    ->setMargin(5)
    ->useForegroundColor(0, 0, 0);

$qrCode->writeFile('../../yiibase/qrcode/'. $model->visit_code .'.png');

// echo $_GET['textimg'];

$this->title = $model->visit_code;
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-md-4 text-center">
        <h2><?= $model->visit_code ?></h2>
        <img src="<?php echo $qrCode->writeDataUri(); ?>" alt="..." class="img-thumbnail"> 
        <hr>
        <?php
            echo Html::a('<i class="fa glyphicon glyphicon-save"></i> Simpan sebagai PDF', 
                [
                    '/visited/export', 
                    'visit_code' => $model->visit_code,
                    'guest_name' => $model->guest_name,
                    'destination' => $model->destination

                ], 
                [
                    'class'=>'btn btn-success', 
                    'target'=>'_blank', 
                    'data-toggle'=>'tooltip', 
                    'title'=>'Simpan sebagai PDF'
                ]
        );
        ?>
    </div>
    <br>
    <div class="col-md-8">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'guest_name',
                'id_type',
                'id_number',
                'phone_number',
                'email:email',
                // 'photo',
                'address',
                'visit_code',
                'destination',
                'dt_visit',
                'long_visit',
                'additional_info:ntext',
                // 'created',
            ],
        ]) ?>
    </div>
</div>