<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;

use app\models\DclDestination;
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
             <?php
                $rows = Yii::$app->db->createCommand('SELECT * FROM dcl_destination')->queryAll();
                foreach($rows as $row)
                {
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-12">

                        <div class="card">
                          <img class="card-img-top img-fluid" src="../../../backend/web/uploads/<?php echo $row['picture']; ?>" alt="<?php echo $row['company_name']; ?>">
                          <div class="card-body">
                            <h3 class="card-title"><?php echo $row['company_name']; ?></h3>
                            <p class="card-text"><?php echo $row['address']; ?></p>
                            <?php
                            if(Yii::$app->user->isGuest){
                                $controller = 'visitunregister';
                            }else{
                                $controller = 'visit';
                            }
                            ?>
                            <a href="<?php echo '?r='.$controller.'/create&id='.$row['id']; ?>" class="btn btn-primary">Kunjungi &raquo;</a>
                          </div>
                        </div>

                    </div>

            <?php } ?>
            <div>
                
            </div>
        </div>

 
    </div>
</div>
