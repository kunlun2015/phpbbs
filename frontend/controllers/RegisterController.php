<?php
/**
 * 注册
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-08-30 13:47:15
 * @version $Id$
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Register;
use frontend\models\User;

class RegisterController extends AppController 
{
    //用户注册页
    public function actionIndex()
    {
        return $this->renderPartial('register');
    }

    //用户注册邮箱激活
    public function actionEmailActive()
    {
        $username = $this->request->get('username');
        $code = $this->request->get('code');
        if(!($username && $code)){
            return $this->tipsPage(['errMsg' => '参数不完整', 'errCode' => 404]);
        }
        $user = new User;
        $userInfo = $user->getUserByUsername($username);
    }


}