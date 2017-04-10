<?php
/**
 * 功能管理
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-10 17:35:20
 * @version $Id$
 */

namespace backend\controllers\root;
use Yii;
use yii\web\Controller;
use backend\models\root\User;
use yii\helpers\Url;

class FunctionController extends RootController{

    //一级功能列表
    public function actionIndex(){
        return $this->render('index');
    }

    //添加功能
    public function actionAdd(){
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
                
                break;
            
            default:
                
                break;
        }
    }

}