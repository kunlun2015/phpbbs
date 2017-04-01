<?php
/**
 * 系统管理资源
 * @authors Amos (735767227@qq.com)
 * @date    2017-03-24 14:11:02
 * @version $Id$
 */
namespace backend\assets;
use yii\web\AssetBundle;

class RootAsset extends AssetBundle
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
        'assets/global/plugins/select2/css/select2.min.css',
        'assets/global/plugins/select2/css/select2-bootstrap.min.css',
        'assets/global/plugins/datatables/datatables.min.css',
        'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
        'assets/global/css/plugins.min.css',

        'assets/layouts/layout2/css/layout.min.css',
        'assets/layouts/layout2/css/themes/blue.min.css',
        'assets/layouts/layout2/css/custom.min.css',
        'assets/pages/css/login-2.min.css',
        'assets/css/style.css'

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
        'assets/global/plugins/select2/js/select2.full.min.js',
        'assets/global/plugins/jquery-validation/js/jquery.validate.min.js',
        'assets/global/plugins/jquery-validation/js/additional-methods.min.js',
        'assets/global/scripts/datatable.js',
        'assets/global/plugins/datatables/datatables.min.js',
        'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js',
        'assets/global/scripts/app.min.js',
        'assets/layouts/layout2/scripts/layout.min.js',
        'assets/layouts/layout2/scripts/demo.min.js',
        'assets/layouts/global/scripts/quick-sidebar.min.js',
        'assets/global/plugins/select2/js/select2.full.min.js',
        'assets/plugin/layer/layer.js',
        'assets/js/common.js'
    ];
    public $depends = [
        
    ];

    //定义按需加载JS方法，注意加载顺序在最后  
    public static function addScript($view, $jsfile) {  
        $view->registerJsFile('@web/'.$jsfile, [AppAsset::className(), 'depends' => 'backend\assets\RootAsset']);  
    }  
      
   //定义按需加载css方法，注意加载顺序在最后  
    public static function addCss($view, $cssfile) {  
        $view->registerCssFile('@web/'.$cssfile, [AppAsset::className(), 'depends' => 'backend\assets\RootAsset']);  
    }  
}
