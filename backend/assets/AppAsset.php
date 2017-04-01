<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
        'assets/global/plugins/font-awesome/css/font-awesome.min.css',
        'assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
        'assets/global/plugins/bootstrap/css/bootstrap.min.css',
        'assets/global/plugins/uniform/css/uniform.default.css',
        'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

        'assets/global/css/components.min.css',
        'assets/global/css/plugins.min.css',

        'assets/layouts/layout/css/layout.min.css',
        'assets/layouts/layout/css/themes/darkblue.min.css',
        'assets/layouts/layout/css/custom.min.css'

    ];
    public $js = [
        'assets/global/plugins/jquery.min.js',
        'assets/global/plugins/bootstrap/js/bootstrap.min.js',
        'assets/global/plugins/js.cookie.min.js',
        'assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
        'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'assets/global/plugins/jquery.blockui.min.js',
        'assets/global/plugins/uniform/jquery.uniform.min.js',
        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
        'assets/global/scripts/app.min.js',
        'assets/layouts/layout/scripts/layout.min.js',
        'assets/layouts/layout/scripts/demo.min.js',
        'assets/layouts/global/scripts/quick-sidebar.min.js'
    ];
    public $depends = [
        
    ];
}
