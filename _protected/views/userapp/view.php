<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userapp-view">

    <h1>#<?= $this->title ?></h1>
    <div class="col-md-3">
        <img class="img-thumbnail" src="<?= $model->photo ?>">
    </div>
    <div class="col-md-9">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'name',
                [
                    'attribute' => 'vms_type_id',
                    'value' => function($data) {
                        return $data->type->title;
                    }
                ],
                'id_number',
                'phone',
                'email:email',
                // 'photo',
                'address',
                'username',
                [
                    'attribute'=>'password',
                    'value'=>'*******'
                ],
                // 'authKey',
            ],
        ]) ?>
    </div>
</div>
