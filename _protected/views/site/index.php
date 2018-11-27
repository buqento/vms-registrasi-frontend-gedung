<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;

use app\models\VmsTenant;
use app\models\VmsType;
use yii\widgets\ListView;
use yii\grid\GridView;

?>

<div class="container">
    <div class="row">

    	<?= $this->render('_search', ['model' => $searchModel]) ?>

        <?php
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_tenant',
            'summary' => false,
            'pager' => [
                'firstPageLabel' => 'Pertama',
                'lastPageLabel' => 'Terakhir',
                'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
                'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
                'maxButtonCount' => 3,
            ],
        ]);
        ?>
    </div>
</div>