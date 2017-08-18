<?php
/**
 * 用户登录
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-16 18:30
 * @version $Id$
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class LoginController extends AppController {

    public function actionIndex()
    {
        return $this->renderPartial('login');
    }

}