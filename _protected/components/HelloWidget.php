<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if($this->message === null){
            $this->message = 'Welcome user';
        }else{
            $this->message == 'Welcome '.$this->message;
        }
    }

    public function run()
    {
        return Html::encode($this->message);
    }
}
?>