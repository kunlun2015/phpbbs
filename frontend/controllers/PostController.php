<?php
/**
 * 异步数据请求
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-09-26 13:56:19
 * @version $Id$
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Posts;
use frontend\models\Tags;

class PostController extends AppController {

    public function beforeAction()
    {
        return parent::beforeAction();
    }

}