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
use securimage\Securimage;

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

    //测试验证码
    public function actionTest()
    {
        $img = new Securimage;
        $img->num_lines = 8;
        $img->image_width = 240;
        $img->image_height = 120;
        $img->charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $img->code_length = 4;
        $img->createCode();
        file_put_contents('test.log', var_export($img->code, true)."\r\n", FILE_APPEND);
        $img->show();
    }

    //测试log
    public function actionLog()
    {

        //var_dump(Yii::$app->controller->module->id.'/');
        $this->log->debug(['ok']);
    }


    public function actionSave()
    {
        $data = [
            'username' => trim($this->request->post('username')),
            'mobile' => trim($this->request->post('mobile')),
            'email' => trim($this->request->post('email')),
            'password' => trim($this->request->post('password'))
        ];
        $user = new User;
        if($user->getUserByUsername($data['username'])){
            $this->jsonExit(-1, '用户名已被注册');
        }
        if($user->insert($data)){
            //发送激活邮件

            $this->jsonExit(0, '恭喜您注册成功，请登陆您的邮箱激活账户！');
        }else{
            //注册失败邮件提醒并记录日志
            $this->log->info(['title' => '注册失败', 'data' => $data]);
            $this->jsonExit(-1, '非常抱歉，注册失败了！我们已记录错误，请等待网站管理员与您邮件联系！');
        }
    }
}