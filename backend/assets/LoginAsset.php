<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'backend/web/css/bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        'backend/web/css/AdminLTE.min.css',
        'backend/web/css/blue.css'
    ];
    public $js = [
        'backend/web/js/jQuery-2.2.0.min.js',
        'backend/web/js/bootstrap.min.js',
        'backend/web/js/icheck.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
