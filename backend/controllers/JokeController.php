<?php
/**
 * 爱乐笑话网
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-20 10:59:29
 * @version $Id$
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class JokeController extends AdminController{

    public function actionAdd(){
        return $this->render('../site/index');
    }

    public function actionAddGroup(){
        return $this->render('../site/index');
    }

}