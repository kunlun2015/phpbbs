<?php
/**
 * 前台控制器父类
 * @authors Amos (735767227@qq.com)
 * @date    2017-03-13 17:28:28
 * @version $Id$
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class AppController extends Controller {
    
    protected $app;
    protected $request;

    public function init(){
        $this->app = Yii::$app;
        $this->app->language = 'zh_CN';
        $this->request = $this->app->request;
    }

    /**
     * 展示提示信息页面
     * @param array $params
     * @param string $type 默认index 提示信息, 404:404页面，500:500页面
     * @param tips page
     */
    protected function tipsPage($params, $type = 'index')
    {
        return $this->app->runAction('tips/'.$type, ['params' => $params]);
    }

}