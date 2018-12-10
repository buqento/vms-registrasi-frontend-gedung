<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use Da\QrCode\QrCode;

$this->title = 'Detail Kunjungan';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="view">

    <p class="text-right"><span class="badge badge-primary"><?= $this->title ?></span></p>
    <hr>

    <div class="col-md-4 text-center">
        
        <?php
            // if($model->status == 1){
                $qrCode = (new QrCode($model->visit_code))->setSize(600)->setMargin(5)->useForegroundColor(0, 0, 0);
                echo '<img src="'.$qrCode->writeDataUri().'" alt="..." class="img-thumbnail"><hr>';
            echo Html::a('<i class="fa glyphicon glyphicon-save"></i> Unduh Kode Kunjungan', 
                [
                    '/visited/export', 
                    'visit_code' => $model->visit_code,
                    'name' => $model->name,
                    'vms_tenant_id' => $model->tenant->name
                ], 
                [
                    'class'=>'btn btn-success', 
                    'target'=>'_blank', 
                    'data-toggle'=>'tooltip', 
                    'title'=>'Unduh Kode Kunjungan'
                ]);

            // }else{
            //     echo '<img src="'.$model->photo.'" class="img-thumbnail">';
            // }
        ?> 
    </div>
    <div class="col-md-8">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'visit_code',
                [
                    'attribute' => 'vms_tenant_id',
                    'value' => function($data) {
                        return $data->tenant->name;
                    }
                ],
                'visit_date:datetime',
                'visit_long',
                [
                    'attribute' => 'employe_id',
                    'value' => function($data){
                        return $data->employe->name;
                    }
                ],
                'additional_info:ntext',
                // 'created',
            ],
        ]) ?>
    </div>
</div>