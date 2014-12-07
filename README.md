Yii2 Toastr Notification
========================
Yii2 Toastr Notification

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
<?= \odaialali\yii2toastr\Toastr::widget(); ?>
```

There are 2 main useful widgets

ToastrFlash
-----------

displays Yii flash messages in toastr notification style

```php
<?= \odaialali\yii2toastr\ToastrFlash::widget(); ?>
```

ToastrAjaxFeed
--------------

fetch notification from ajax url

```php
<?= \odaialali\yii2toastr\ToastrAjaxFeed::widget([
    'feedUrl' => yii\helpers\Url::toRoute('/user/profile/notification-feed'),
    'options' => [
        'positionClass' => 'toast-bottom-left'
    ]
]);?>
```