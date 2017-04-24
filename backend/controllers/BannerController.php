<?php
/**
 * banner管理
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-24 13:13:43
 * @version $Id$
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Banner;
use yii\helpers\Url;

class BannerController extends AdminController{

    public function actionIndex(){
        return $this->render('index');
    }

    //添加轮播图
    public function actionAdd(){
        $data['bannerCate'] = (new Banner)->bannerCate();
        return $this->render('add', $data);
    }

    public function actionSave(){
        if(!$this->request->isAjax){
            //$this->jsonExit(-1, '非法请求！');
        }
        $act = $this->request->post('act');
        switch ($act) {
            case 'uploadImg':
                $upload = new \common\models\Upload;
                $upload->saveDir = 'banner';
                $rst = $upload->uploadFile();
                break;
            
            default:
               
                break;
        }
    }

}