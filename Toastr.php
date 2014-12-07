<?php

/**
 * @copyright Copyright &copy; Odai Alali 2014
 * @package yii2-toastr
 * @version 0.1-dev
 */

namespace odaialali\yii2toastr;

use odaialali\yii2toastr\ToastrAsset;
/**
 * Description of Toastr
 *
 * @author Odai Alali <odai.alali@gmail.com>
 */
class Toastr extends \yii\base\Widget{
    
    public function init() {
        parent::init();
        ToastrAsset::register($this->getView());
    }
    
    public function run() {
        parent::run();
        echo 'loaded';
    }
}
