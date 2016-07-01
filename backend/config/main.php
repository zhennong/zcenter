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
    'components' => require(__DIR__ . '/components.php'),

    'defaultRoute' => 'user/site/index',
    'layoutPath' => 'backend/layouts',
    'layout' => 'main',

    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'backend\modules\api\Module',
            'modules' => [
                'v1' => 'backend\modules\api\v1\Module'
            ]
        ],
        'app' => [
            'class' => 'backend\modules\app\module',
        ],
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

    'params' => $params,
];
