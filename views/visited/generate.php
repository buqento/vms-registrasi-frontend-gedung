<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use Da\QrCode\QrCode;
$qrCode = (new QrCode($model->visit_code))
    ->setSize(600)
    ->setMargin(5)
    ->useForegroundColor(0, 0, 0);
$this->title = $model->visit_code;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-4 text-center">
        <h2><?= $model->visit_code ?></h2>
        <img src="<?php echo $qrCode->writeDataUri(); ?>" alt="..." class="img-thumbnail"> 
        <hr>
        <?php
            echo Html::a('<i class="fa glyphicon glyphicon-save"></i> Unduh PDF', 
                [
                    '/visited/export', 
                    'visit_code' => $model->visit_code,
                    'guest_name' => $model->guest_name,
                    'destination_id' => $model->tenant->company_name
                ], 
                [
                    'class'=>'btn btn-success', 
                    'target'=>'_blank', 
                    'data-toggle'=>'tooltip', 
                    'title'=>'Unduh PDF'
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
                [
                    'attribute' => 'type_id',
                    'value' => function($data) {
                        return $data->type->title;
                    }
                ],
                'id_number',
                'gender',
                'phone_number',
                'email:email',
                // 'photo',
                'address',
                'visit_code',
                [
                    'attribute' => 'destination_id',
                    'value' => function($data) {
                        return $data->tenant->company_name;
                    }
                ],
                'dt_visit',
                'long_visit',
                'additional_info:ntext',
                // 'created',
            ],
        ]) ?>
    </div>
</div>