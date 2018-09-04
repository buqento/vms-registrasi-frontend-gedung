<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DestinationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Destinations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="destination-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Destination', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'company_name',
            'open_hour',
            'close_hour',
            'build_name',
            //'floor',
            //'phone',
            //'email:email',
            //'profile:ntext',
            //'picture',
            //'address:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
