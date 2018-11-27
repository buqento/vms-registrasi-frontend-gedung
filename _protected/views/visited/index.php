    <?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\UrlManager;

$this->title = 'Kunjungan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visited-index">

    <p class="text-right"><span class="badge badge-primary"><?= $this->title ?></span></p>
    <hr>
    
    <div class="col-md-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'summary' => false,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                // 'guest_name',
                // 'type_id',
                // 'id_number',
                // 'visit_code',
                // 'gender',
                // 'phone_number',
                //'email:email',
                //'photo',
                //'address',
                [
                    'attribute' => 'vms_tenant_id',
                    'value' => function($data) {
                        return $data->tenant->name;
                    }
                ],
                // 'long_visit',
                'visit_date',
                'employe_id',
                'additional_info:ntext',
                [
                    'attribute' => 'status',
                    'value' => 
                        function($data)
                            {
                                switch ($data->status) {
                                    case 1:
                                        $vStatus = 'Disetujui';
                                        break;
                                    case 2:
                                        $vStatus = 'Ditolak';
                                        break;
                                    
                                    default:
                                        $vStatus = 'Pending';
                                        break;
                                }
                                return $vStatus;
                            }
                ], 

                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width:50px; white-space: normal;'],
                    'template' => '{view} {delete} {qrcode}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-info-sign"></span>', $url, [
                                // 'class'=>'btn btn-success'
                            ]);
                        },

                        // 'qrcode' => function ($url, $model) {
                        //     return Html::a('<span class="glyphicon glyphicon-qrcode"></span>', $url, [
                        //         'class'=>'btn btn-success'
                        //     ]);
                
                        // }

                    ],

                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = ['visited/view/', 'id' => $key]; 
                            return $url;
                        }

                        if ($action === 'delete') {
                            $url = ['visited/delete/', 'id' => $key]; 
                            return $url;
                        }
                        // if ($action === 'qrcode') {
                        //     $url = ['visited/generate/', 'id' => $key]; // your own url generation logic
                        //     return $url;
                        // }
                    }
                ]
            ],
        ]); ?>
    </div>
</div>
