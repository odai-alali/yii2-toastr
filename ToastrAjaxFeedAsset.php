<?php
/**
 * @copyright Copyright &copy; Odai Alali 2014
 * @package yii2-toastr
 * @version 0.1-dev
 */

namespace odaialali\yii2toastr;

use yii\web\AssetBundle;
/**
 * Description of ToastrAjaxFeedAsset
 *
 * @author Odai Alali <odai.alali@gmail.com>
 */
class ToastrAjaxFeedAsset extends AssetBundle {
    public $js = [
        'toastr-ajax-feed.js',
    ];
    
    public function init() {
        $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }
}
