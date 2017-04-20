<?php
/**
 * 后台管理员父类
 * @authors Amos (735767227@qq.com)
 * @date    2017-03-24 13:37:59
 * @version $Id$
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class AdminController extends CommonController{

    public function init(){
        parent::init();
        //登录控制
        if(!$this->session->get('user')){
            return $this->redirect(Url::to(['/login'], true), 301);
        }
        $userMenuLevel = (new \backend\models\Login)->userAuthorityMenuLevel($this->session->get('user')['id']);
        Yii::$app->view->params['userMenuLevel'] = $userMenuLevel;
        //Yii::$app->view->params['menuHtml'] = $this->renderPartial('../login/userMenu', array('userMenuLevel' => $userMenuLevel));
    }
    
}