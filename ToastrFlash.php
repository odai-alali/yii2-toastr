<?php

/**
 * @copyright Copyright &copy; Odai Alali 2014
 * @package yii2-toastr
 * @version 0.1-dev
 */

namespace odaialali\yii2toastr;

use odaialali\yii2toastr\Toastr;
/**
 * Description of ToastrFlash
 *
 * @author Odai Alali <odai.alali@gmail.com>
 */
class ToastrFlash extends \yii\base\Widget {
    /*
     * @var boolean use custom style in asset ToastrCustomAsset
     */
    public $customStyle = true;
    /**
     * @var array the alert types configuration for the flash messages.
     */
    public $alertTypes = [
        'error'   => 'error',
        'danger'  => 'error',
        'success' => 'success',
        'info'    => 'info',
        'warning' => 'warning'
    ];
    
    public $options = [];
    
    public function init()
    {
        parent::init();

        $session = \Yii::$app->getSession();
        $flashes = $session->getAllFlashes();

        foreach ($flashes as $type => $data) {
            if (isset($this->alertTypes[$type])) {
                $data = (array) $data;
                foreach ($data as $message) {
                    echo Toastr::widget([
                        'toastType' => $this->alertTypes[$type],
                        'message' => $message,
                        'options' => $this->options,
                        'customStyle' => $this->customStyle 
                    ]);
                }

                $session->removeFlash($type);
            }
        }
    }
}
