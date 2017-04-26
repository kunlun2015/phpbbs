<?php
/**
 * 网站分类结构
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-26 14:05:53
 * @version $Id$
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Banner;
use yii\helpers\Url;

class CategoryController extends AdminController{

    public function actionIndex(){
        return $this->render('index');
    }

    //添加分类
    public function actionAdd(){
        return $this->render('add');
    }

    //编辑分类
    public function actionEdit(){
        return $this->render('add');
    }
}