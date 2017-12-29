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
use frontend\models\Tags;
use frontend\models\Posts;

class TagController extends AppController {

    private $postsModel;

    public function init()
    {
        parent::init();
        $this->postsModel = new Posts;
    }

    public function actionIndex()
    {
        $tagId = $this->request->get('id');
        $page = intval($this->request->get('page')) ? intval($this->request->get('page')) : 1;
        $pageSize = 10;
        //标签
        $data['tagsList'] = (new Tags)->tagsList(1, 1, 10, $tagsToalPage);
        $data['tagId'] = $this->request->get('id') ? intval($this->request->get('id')) : 0;
        //posts list       
        $data['postsList'] = $this->postsModel->getPidByTagId($tagId, $page, $pageSize, $data['totalPage']);
        //阅读排行
        $data['readRankingList'] = $this->postsModel->postList(0, 0, '', 0, 'views', 'desc', 1, 10, $readRankingListTotalPage);
        return $this->render('index', $data);
    }

}