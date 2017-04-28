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

    //数据操作
    public function actionSave(){
        if(!$this->request->isAjax){
            $this->jsonExit(-1, '非法请求！');
        }
        $act = $this->request->post('act');
        switch ($act) {
            case 'add':
                $data = array(
                    'name' => $this->request->post('name'),
                    'href' => $this->request->post('href') ? $this->request->post('href') : '',
                    'sort' => $this->request->post('sort') ? $this->request->post('href') : 0,
                    'remarks' => $this->request->post('remarks')
                    );
                break;
            
            default:
                # code...
                break;
        }
    }
}