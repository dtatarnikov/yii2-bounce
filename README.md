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

Use the following code in your configuration file.
```php
'bounce' => [
    'class' => 'strong2much\bounce\BounceManager'
]
```

You can use it as follows:
```php
//To add bounce report
$data = Yii::$app->bounce->parseMessage($emailMessage);
foreach($data as $bounceData) {
    Yii::$app->bounce->pushReport($bounceData['recipient'], $bounceData);
}

//To check bounce report
if(!Yii::$app->bounce->hasReport($email)) {
    //do some logic
}
```

In order to use full functionality, you will need to apply migrations.
