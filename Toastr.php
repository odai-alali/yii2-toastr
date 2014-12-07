<?php

/**
 * @copyright Copyright &copy; Odai Alali 2014
 * @package yii2-toastr
 * @version 0.1-dev
 */

namespace odaialali\yii2toastr;

use odaialali\yii2toastr\ToastrAsset;
use odaialali\yii2toastr\ToastrCustomAsset;
use yii\helpers\Json;
/**
 * Description of Toastr
 *
 * @author Odai Alali <odai.alali@gmail.com>
 */
class Toastr extends \yii\base\Widget{
    const TYPE_ERROR = 'error';
    const TYPE_INFO = 'info';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';
    
    public $customStyle = true;
    public $toastType;
    
    public $title;
    public $message;
    
    public $options = [];
    
    public function init() {
        parent::init();
        if(empty($this->toastType)){
            $this->toastType = self::TYPE_INFO;
        }
        if(empty($this->title)){
            $this->title = false;
        }
        if($this->customStyle){
            ToastrCustomAsset::register($this->getView());
        }else{
            ToastrAsset::register($this->getView());
        }
    }
    
    public function run() {
        parent::run();
        $this->registerNotification();
    }
    
    protected function registerNotification(){
        $view = $this->getView();
        if ($this->options !== false) {
            $options = empty($this->options) ? '[]' : Json::encode($this->options);
            switch($this->toastType){
                case 'error':
                    $js = "toastr.error('".$this->message."', '".$this->title."', ".$options.")";
                    break;
                case 'warning':
                    $js = "toastr.warning('".$this->message."', '".$this->title."', ".$options.")";
                    break;
                case 'info':
                    $js = "toastr.info('".$this->message."', '".$this->title."', ".$options.")";
                    break;
                case 'success':
                    $js = "toastr.success('".$this->message."', '".$this->title."', ".$options.")";
                    break;
            }
            if(isset($js)){
                $view->registerJs($js);
            }
        }
    }
}
