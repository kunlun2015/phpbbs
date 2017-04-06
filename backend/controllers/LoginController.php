<?php
/**
 * 用户登录
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-06 14:50:10
 * @version $Id$
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Login;

class LoginController extends CommonController{

    //登录页面
    public function actionIndex(){
        return $this->renderPartial('index');
    }

    //用户登录验证
    public function actionCheck(){        
        $username = trim($this->request->post('username'));
        $password = $this->request->post('password');
        $user_ip  = $this->request->userIP;
        $rst = (new Login)->loginCheck($username, $password, $user_ip);
    }

}