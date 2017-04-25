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
        $cate_id = $this->request->get('cate_id', 0);
        $pageNum = intval($this->request->get('page', 1)) ? $this->request->get('page', 1) : 1;
        $pageSize = 10;
        $data['list'] = (new Banner)->bannerList($cate_id, $pageSize, $pageNum, $totalPage);
        $data['bannerCate'] = (new Banner)->bannerCate();      
        return $this->render('index', $data);
    }

    //添加轮播图
    public function actionAdd(){
        $data['bannerCate'] = (new Banner)->bannerCate();
        return $this->render('add', $data);
    }
    //编辑轮播图
    public function actionEdit(){
        $id = $this->request->get('id', 0);
        if(!$id){
            exit('参数有误！');
        }
        $banner = new Banner;
        $data['bannerCate'] = $banner->bannerCate();
        $data['detail'] = $banner->getBannerById($id);
        return $this->render('edit', $data);
    }

    public function actionSave(){
        if(!$this->request->isAjax){
            $this->jsonExit(-1, '非法请求！');
        }
        $act = $this->request->post('act');
        switch ($act) {
            case 'uploadImg':
                $upload = new \common\models\Upload;
                $upload->saveDir = 'banner';
                $rst = $upload->uploadFile();
                if($rst['code'] === 0){
                    $this->jsonExit(0, '轮播图片上传成功！', array('path' => $rst['path'], 'url' => $this->params['imgUrl'].$rst['path']));
                }else{
                    $this->jsonExit(-1, '图片上传失败，请重试！');
                }
                break;

            case 'add':
                $data = array(
                        'cate_id'    => $this->request->post('cate_id'),
                        'title'      => $this->request->post('title'),
                        'href'       => $this->request->post('href'),
                        'sort'       => $this->request->post('sort') ? $this->request->post('sort') : 0,
                        'begin_time' => $this->request->post('begin_time'),
                        'end_time'   => $this->request->post('end_time'),
                        'picture'    => $this->request->post('picture'),                        
                        'created'    => $this->session->get('user')['username']
                    );
                $rst = (new Banner)->addBanner($data);
                if($rst){
                    $this->jsonExit(0, 'banner轮播图添加成功！', array('url' => Url::to(['/banner'])));
                }else{
                    $this->jsonExit(-1, 'banner轮播图添加失败！');
                }
                break;

            case 'edit':
                $banner_id = $this->request->post('banner_id');
                $data = array(
                        'cate_id'    => $this->request->post('cate_id'),
                        'title'      => $this->request->post('title'),
                        'href'       => $this->request->post('href'),
                        'sort'       => $this->request->post('sort') ? $this->request->post('sort') : 0,
                        'begin_time' => $this->request->post('begin_time'),
                        'end_time'   => $this->request->post('end_time'),
                        'picture'    => $this->request->post('picture'),                        
                        'created'    => $this->session->get('user')['username']
                    );
                $rst = (new Banner)->editBanner($data, $banner_id);
                if($rst){
                    $this->jsonExit(0, 'banner轮播图编辑成功！', array('url' => Url::to(['/banner'])));
                }else{
                    $this->jsonExit(-1, 'banner轮播图编辑失败！');
                }
                break;
            
            default:
               
                break;
        }
    }

}