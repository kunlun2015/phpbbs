<?php
/**
 * 标签索引
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-12-15 10:51:10
 * @version $Id$
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Posts;

class TagController extends AppController {

    public function actionIndex()
    {
        return $this->render('index');
    }

}