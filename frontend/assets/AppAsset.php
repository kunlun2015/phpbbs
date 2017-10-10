<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle{
    public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $baseUrl = 'http://static.debugphp.com';
    public $css = [
        'css/common.css',
    ];
    public $js = [
        'libs/jquery/jquery-3.1.0.min.js',
        'js/common.js'
    ];

    //定义按需加载JS方法，注意加载顺序在最后  
    public static function addScript($view, $jsfile) {  
        $view->registerJsFile('http://static.debugphp.com/'.$jsfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);  
    }  
      
   //定义按需加载css方法，注意加载顺序在最后  
    public static function addCss($view, $cssfile) {  
        $view->registerCssFile('http://static.debugphp.com/'.$cssfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);  
    }  
}
