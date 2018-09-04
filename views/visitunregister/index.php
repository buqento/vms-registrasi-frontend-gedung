<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VisitunregisterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visitunregisters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitunregister-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Visitunregister', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'guest_name',
            'id_number',
            'phone_number',
            'email:email',
            //'photo',
            //'code',
            //'destination_id',
            //'dt_visit',
            //'long_visit',
            //'additional_info:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
