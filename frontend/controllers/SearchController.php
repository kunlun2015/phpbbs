<?php
/**
 * 搜索模块
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-10-30 16:07:25
 * @version $Id$
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Search;

class SearchController extends AppController {

    public function actionIndex()
    {
        $keywords = $this->request->get('keywords');
        $page = intval($this->request->get('page')) ? intval($this->request->get('page')) : 1;
        $pageSize = 10;
        $search = new Search;
        $list = $search->searchResultList($keywords, $page, $pageSize, $totalPage);
    }

}