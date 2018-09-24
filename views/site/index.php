<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;

use app\models\DclDestination;
use yii\widgets\ListView;
use yii\grid\GridView;
?>

<div class="container">
    <div class="row">
    	<?= $this->render('_search', ['model' => $searchModel]) ?>
        <?php
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'itemView' => '_tenant',
            'summary' => false
        ]);

		// echo GridView::widget([
		//     'dataProvider' => $dataProvider,
		//     'filterModel' => $searchModel,
		// ]);
        ?>
    </div>
</div>