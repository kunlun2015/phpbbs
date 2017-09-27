<?php
/**
 * 数据库
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-09-27 14:17:04
 * @version $Id$
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Posts;
use frontend\models\Tags;

class DbController extends AppController {

    private $postsModel;

    public function init()
    {
        parent::init();
        $this->postsModel = new Posts;
    }

    public function actionIndex()
    {
        $fid = 10;
        //导航面包屑
        $data['navTitleArr'] =$this->postsModel->categoryLevel($fid);
        //posts list
        $data['postsList'] = $this->postsModel->postList($fid, $lid = 0, $title = 0, $displayOrder = 0, $orderBy = 'id', $sort = 'desc', $page = 1, $pageSize = 10, $totalPage);
        //标签
        $data['tagsList'] = (new Tags)->tagsList(1, 1, 10, $tagsToalPage);
        //阅读排行
        $data['readRankingList'] = $this->postsModel->postList(0, 0, '', 0, 'views', 'desc', 1, 10, $readRankingListTotalPage);
        return $this->render('index', $data);
    }

}