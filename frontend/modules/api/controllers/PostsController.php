<?php
/**
 * posts list
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-12-25 18:09:25
 * @version $Id$
 */

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use frontend\modules\api\models\Posts;

class PostsController extends ApiController 
{

    private $posts;

    public function init()
    {
        parent::init();
        $this->posts = new Posts;
    }

    public function actionIndex()
    {
        $page = intval($this->request->post('page')) ? intval($this->request->post('page')) : 1;
        $pageSize = 8;
        $fid = intval($this->request->post('fid'));
        $list = $this->posts->getListByFid($fid, $page, $pageSize, $totalPage);
        $this->jsonExit(0, 'ok', ['list' => $list, 'totalPage' => $totalPage]);
    }

    public function actionDetail()
    {
        $id = $this->request->post('id');
        $detail = $this->posts->detail($id);
        if($detail){
            $this->jsonExit(0, 'ok', ['detail' => $detail]);
        }else{
            $this->jsonExit(-1, '文章不存在或暂未发布');
        }
    }
}
