<?php

namespace qrcode;

use Yii;
use qrcode\phpqrcode\QRcode;


/**
 * This is just an example.
 */
class AutoloadExample extends \yii\base\Widget
{
    
    public $text;
    public $filename;
    public $errorCorrectionLevel; 
    public $matrixPointSize;
    public $margin = 2;
    public $upload_path;
    
    private function setDefaultUploadPath(){
	  $this->upload_path = Yii::getAlias("@uploads")."/qrcodes";
    }
    
    private function setFilePath(){
	  $this->filename = $this->upload_path."/".$this->filename;
    }


    public function run()
    {
	  if(empty($this->upload_path)){
		$this->setDefaultUploadPath();
	  }
	  $this->setFilePath();
	  
	  self::png();
	  
        return;
    }
    
    
    private function png(){
	  QRcode::png($this->text, $this->filename, $this->errorCorrectionLevel, $this->matrixPointSize, $this->margin);
    }


    public static function test(){
	  return self;
	  echo __FUNCTION__." herer ";
    }
    
    
    
}
