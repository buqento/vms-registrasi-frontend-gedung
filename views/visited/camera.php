<?php
	use timurmelnikov\widgets\WebcamShoot;
use yii\helpers\Html;
    echo WebcamShoot::widget([
        'targetInputID' => 'textimg',
        'targetImgID' => 'textphoto',
    ]);

?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

