# yii2-bounce

Helper classes for working with email bounces.

Installation
------------

Install package by composer
```composer
{
    "require": {
       "strong2much/yii2-bounce": "dev-master"
    }
}

Or

$ composer require strong2much/yii2-bounce "dev-master"
```

Use the following code in your configuration file. You can use different services
```php
'bounce' => [
    'class' => 'strong2much\bounce\BounceManager'
]
```

In order to use full functionality, you will need to apply migrations.
