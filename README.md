Yii2 Toastr Notification
========================
This is the [Toastr](https://github.com/CodeSeven/toastr) extension for Yii 2. It encapsulates Toastr plugin in terms of Yii widgets, and makes ajax notification easy to implement.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist odaialali/yii2-toastr "*"
```

or add

```
"odaialali/yii2-toastr": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, you can test that the extension works by simply use it in your code by  :

```php
<?= \odaialali\yii2toastr\Toastr::widget([
    'toastType' => 'error',
    'message' => 'This is an error.',
    'customStyle' => false
]);?>
```

There are 2 main useful widgets

ToastrFlash
-----------

displays Yii flash messages in toastr notification style

```php
<?php
$session = \Yii::$app->getSession();
$session->setFlash('error', "msg1");
$session->setFlash('danger', "msg2");
$session->setFlash('warning', "msg3");
$session->setFlash('info', "msg4");
$session->setFlash('success', "msg5");
?>
```
```php
<?= \odaialali\yii2toastr\ToastrFlash::widget([
    'options' => [
        'positionClass' => 'toast-bottom-left'
    ]
]);?>
```

ToastrAjaxFeed
--------------

fetch notification from ajax url

```php
<?= \odaialali\yii2toastr\ToastrAjaxFeed::widget([
    'feedUrl' => yii\helpers\Url::toRoute('/user/profile/notification-feed'),
    'interval' => 5000,
    'options' => [
        'positionClass' => 'toast-bottom-left'
    ]
]);?>
```

the ajax controller should return an array like this
```php
public function actionNotificationFeed(){
    $ret = [
        [
            'type' => 'error',
            'message' => 'error message',
            'title' => 'Hey!'
        ],
        [
            'type' => 'info',
            'message' => 'another message',
            'title' => 'Hello'
        ]
    ];
    return \yii\helpers\Json::encode($ret);
}
```