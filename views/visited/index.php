<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Kunjungan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visited-index">

	<h3 class="text-right">
	  <?= Html::encode($this->title) ?> 
	  <span class="glyphicon glyphicon glyphicon-menu-right"></span>
	  <small class="text-muted">Daftar</small>
	</h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'guest_name',
            // 'id_type',
            // 'id_number',
            'visit_code',
            // 'gender',
            // 'phone_number',
            //'email:email',
            //'photo',
            //'address',
            //'code',
            'destination',
            'dt_visit',
            'long_visit',
            'additional_info:ntext',
            // 'created',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-info-sign"></span>', $url, [
                                    'title' => Yii::t('app', 'Lihat Detail'),
                        ]);
                    }
                ],
            ]
        ],
    ]); ?>
</div>
