<?php
$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
    
);

return [
    'language' => 'zh-CN',
    'id' => 'app-backend',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'basePath' => dirname(__DIR__),

    'defaultRoute' => 'user/site/index',
    'layoutPath' => 'backend/layouts',
    'layout' => 'main',

    'bootstrap' => ['log'],
    'modules' => [
        'rule' => [
            'class' => 'backend\modules\rule\Module',
        ],
        'user' => [
            'class' => 'backend\modules\user\Module',
        ],
        'menu' => [
            'class' => 'backend\modules\menu\Module',
        ],
        'members' => [
            'class' => 'backend\modules\members\Module',
        ],
        // 工作人员 add by wodrow
        'staff' => [
            'class' => 'backend\modules\staff\Module',
        ],
    ],
    'components' => [
        'assetManager' => [
            'basePath' => '@webroot/backend/web/assets',
            'baseUrl' => '@web/backend/web/assets'
        ],
        'user' => [
            'identityClass' => 'backend\modules\user\models\User',
            'loginUrl'=>['/user/site/login'],
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'user/site/error',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'i18n' => [
            'translations' => [
                'common' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => 'common/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'common' => 'common.php',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
