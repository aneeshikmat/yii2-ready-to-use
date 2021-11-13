<?php

use common\components\helpers\LanguageHelpers;

return [
    'name' => 'Yii Skeleton',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => [
        'queue'
    ],
    'components' => [
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6Le9WoAUAAAAAHaTtKqnBmxuYW8DHTfAU2v4v5iL',
            'secret' => '6Le9WoAUAAAAALQ_0w2vDeDxn1zGBYW29SGYKmsW',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'urlManager' => [
            //'class' => 'codemix\localeurls\UrlManager',
            'class' => common\components\UrlManager::class,
            'languages' => LanguageHelpers::getLanguagesIso(),
            'enableDefaultLanguageUrlCode' => true,
            'ignoreLanguageUrlPatterns' => [
                // route pattern => url pattern
                '#^api/#' => '#^api/#',
                '#^cdn/#' => '#^cdn/#',
            ],
        ],
        // 'cache' => [
        //     'class' => 'yii\caching\FileCache',
        // ],
        'imageCache' => [
            'class' => '\common\components\imageCache',
        ],
        'i18n' => [
            'class' => '\common\lib\i18nModule\components\I18n',
            'messageSourceConfig' => [
                'class' => \yii\i18n\DbMessageSource::className(),
                'enableCaching' => true,
                'forceTranslation' => true,
            ],
            'handleMissing' => true,
            'only' => [
                'app',
                '*',
                'yii'
            ],
            'override' => true,
            'languages' => LanguageHelpers::getLanguagesIso(),
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
];
