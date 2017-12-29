<?php
/**
 * wap版首页数据接口
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-12-19 12:29:26
 * @version $Id$
 */
namespace frontend\modules\api\controllers;

use yii\web\Controller;
use frontend\modules\api\models\Swiper;
use frontend\modules\api\models\Posts;

class HomeController extends ApiController 
{

    public function actionSwiper()
    {
        $swiper = new Swiper;
        $list = $swiper->swiperList();
        $this->jsonExit(0, 'data is ok', $list);
    }

    public function actionList()
    {
        $page = intval($this->request->post('page')) ? intval($this->request->post('page')) : 1;
        $pageSize = 8;
        $recommendType = '1,2,3,4';
        $posts = new Posts;
        $list = $posts->indexList($recommendType, $page, $pageSize, $totalPage);
        $this->jsonExit(0, 'ok', ['list' => $list, 'totalPage' => $totalPage]);
    }
}