<?php
/**
 * 详情
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-04 17:45
 * @version $Id$
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Posts;
use frontend\models\Tags;
use common\widgets\Alert;

class DetailController extends AppController {

    private $postsModel;

    public function init()
    {
        parent::init();
        $this->postsModel = new Posts;
    }

    //详情
    public function actionIndex($id)
    {
        $id = (int)$id;
        $data['detail'] = $this->postsModel->detail($id);
        if(!$data['detail']){
            return $this->tipsPage(['errMsg' => '很抱歉，您浏览的文章不存在！']);
        }
        if($data['detail']['status'] != 0 && $this->request->get('key') != md5($data['detail']['title'].$data['detail']['fmap'].date('YmdH'))){
            return $this->tipsPage(['errMsg' => '很抱歉，您浏览的文章暂未发布！']);
        }
        //导航面包屑
        $data['navTitleArr'] =$this->postsModel->categoryLevel($data['detail']['lid']);
        $this->postsModel->postViewsIncrease($id);
        //标签
        $data['tagsList'] = (new Tags)->tagsList(1, 1, 10, $tagsToalPage);
        //阅读排行
        $data['readRankingList'] = $this->postsModel->postList(0, 0, '', 0, 'views', 'desc', 1, 10, $readRankingListTotalPage);
        return $this->render('detail', $data);
    }

}