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

class PostController extends AppController {

    private $posts;

    public function init()
    {
        parent::init();
        $this->posts = new Posts;
    }

    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }

    /**
     * 公共列表返回
     * @return [json]
     */
    public function actionList()
    {
        $fid = $this->request->post('fid');
        $page = $this->request->post('page');
        $pageSize = 5;
        $postsList = $this->posts->postList($fid, $lid = 0, $title = 0, $displayOrder = 0, $orderBy = 'id', $sort = 'desc', $page, $pageSize, $totalPage);
        if($postsList){
            $htmlStr = $this->renderPartial('/php/listTemplate', ['postsList' => $postsList]);
            $this->jsonExit(0, 'ok', ['html' => $htmlStr]);
        }else{
            $this->jsonExit(-1, 'failed');
        }
    }

}