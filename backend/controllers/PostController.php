<?php
/**
 * 文章管理
 * @authors Amos (735767227@qq.com)
 * @date    2017-08-01 09:36:36
 * @version $Id$
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Post;
use backend\models\Category;
use yii\helpers\Url;

class PostController extends AdminController
{
    private $posts;

    public function init()
    {
        parent::init();
        $this->posts = new Post;
    }

    public function actionIndex()
    {
        $pageSize = 10;
        $data['id'] = $this->request->get('id');
        $data['title'] = $this->request->get('title');
        $page = intval($this->request->get('page', 1)) ? intval($this->request->get('page', 1)) : 1;
        $data['list'] = $this->posts->postsList($data['id'], $data['title'], $pageSize, $page, $totalPage);
        return $this->render('index', $data);
    }

    public function actionAdd()
    {
        $category = new Category;
        $data['mainCate'] = $category->subCateList(0);
        return $this->render('add', $data);
    }

    public function actionEdit($id)
    {
        $data['detail'] = $this->posts->detail($id);
        $category = new Category;
        if($data['detail']['fid'] == $data['detail']['lid']){
            $data['cate'] = $category->subCateList(0);
        }else{
            $data['cate'] = $category->subCateList(0);
        }
        $cate = $category->categoryLevelByLastLevel($data['detail']['lid']);
        $data['cateList'] = $category->categoryLevelList($cate);
        return $this->render('edit', $data);
    }

    public function actionAction()
    {
        $act = $this->request->post('act');
        switch ($act) {
            case 'cate':
                $category = new Category;
                $pid = $this->request->post('pid');
                $list = $category->subCateList($pid);
                if(count($list) > 0){
                    $this->jsonExit(0, '', $list);
                }else{
                    $this->jsonExit(-1, '列表为空');
                }
                break;

            case 'add':
                $cate = $this->request->post('cate');
                $fid = $cate[0];
                $lid = array_pop($cate);
                $data = [
                    'fid' => $fid,
                    'lid' => $lid,
                    'title' => $this->request->post('title'),
                    'thumbnail' => $this->request->post('thumbnail'),
                    'abstract' => $this->request->post('abstract'),
                    'posts' => $this->request->post('posts'),
                    'display_order' => $this->request->post('display_order'),
                    'author' => $this->session->get('user')['username'],
                    'authorid' => $this->session->get('user')['id']
                ];
                $rst = $this->posts->addPost($data);
                if($rst){
                    $this->jsonExit(0, '文章添加成功');
                }else{
                    $this->jsonExit(-1, '文章添加失败');
                }
                break;

            case 'edit':
                $id = $this->request->post('id');
                $cate = $this->request->post('cate');
                $fid = $cate[0];
                $lid = array_pop($cate);
                $data = [
                    'fid' => $fid,
                    'lid' => $lid,
                    'title' => $this->request->post('title'),
                    'thumbnail' => $this->request->post('thumbnail'),
                    'abstract' => $this->request->post('abstract'),
                    'posts' => $this->request->post('posts'),
                    'display_order' => $this->request->post('display_order')
                ];
                $rst = $this->posts->updatePost($id, $data);
                if($rst){
                    $this->jsonExit(0, '文章编辑成功');
                }else{
                    $this->jsonExit(-1, '文章编辑失败');
                }
                break;

            case 'upload':
                $upload = new \common\models\Upload;
                $upload->saveDir = 'posts';
                $rst = $upload->uploadFile();
                if($rst['code'] === 0){
                    $this->jsonExit(0, '文件上传成功！', array('path' => $rst['path'], 'url' => $this->params['imgUrl'].$rst['path']));
                }else{
                    $this->jsonExit(-1, '文件上传失败，请重试！');
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}