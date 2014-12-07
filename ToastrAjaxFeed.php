<?php

/**
 * @copyright Copyright &copy; Odai Alali 2014
 * @package yii2-toastr
 * @version 0.1-dev
 */

namespace odaialali\yii2toastr;

use odaialali\yii2toastr\ToastrAjaxFeedAsset;
use yii\helpers\Json;
/**
 * Description of ToastrAjaxFeed
 *
 * @author Odai Alali <odai.alali@gmail.com>
 */
class ToastrAjaxFeed extends \yii\base\Widget {
    public $customStyle = true;
    public $options = [];
    public $feedUrl = '';
    public $interval = 6000;
    
    public function init() {
        parent::init();
        if($this->customStyle){
            ToastrCustomAsset::register($this->getView());
        }else{
            ToastrAsset::register($this->getView());
        }
    }
    
    public function run() {
        parent::run();
        $view = $this->getView();
        $options = empty($this->options) ? '[]' : Json::encode($this->options);
        ToastrAjaxFeedAsset::register($view);
        $view->registerJs('jQuery(document).ready( function() {'
                . 'setInterval('
                . 'function(){'
                . 'ToastrAjaxFeed.getNotifications(\''.$this->feedUrl.'\', '.$options.')'
                . '}' 
                . ','
                . $this->interval.');} );');
    }
}
