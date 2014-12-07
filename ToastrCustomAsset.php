<?php
/**
 * @copyright Copyright &copy; Odai Alali 2014
 * @package yii2-toastr
 * @version 0.1-dev
 */
namespace odaialali\yii2toastr;

use yii\web\AssetBundle;
/**
 * Description of ToastrAsset
 *
 * @author Odai Alali <odai.alali@gmail.com>
 */
class ToastrCustomAsset extends AssetBundle{
    public $css = [
        'toastr-style-reset.css',
    ];
    public $depends = [
        'odaialali\yii2toastr\ToastrAsset',
    ];
    
    public function init() {
        $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }
}
