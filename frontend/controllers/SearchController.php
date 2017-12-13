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
        $data['keywords'] = $this->request->get('keywords');
        if(!$data['keywords']){
            return $this->tipsPage(['errMsg' => '搜索关键词不能为空。', 'redirect' => true, 'timeout' => 3]);
        }
        $page = intval($this->request->get('page')) ? intval($this->request->get('page')) : 1;
        $pageSize = 10;
        $search = new Search;
        $data['list'] = $search->searchResultList($data['keywords'], $page, $pageSize, $totalPage);
        return $this->renderPartial('index', $data);
    }

}