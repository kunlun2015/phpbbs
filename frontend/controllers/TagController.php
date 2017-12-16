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

    public function actionIndex()
    {
        $posts = new Posts;
        //标签
        $data['tagsList'] = (new Tags)->tagsList(1, 1, 10, $tagsToalPage);
        $data['tagId'] = $this->request->get('id') ? intval($this->request->get('id')) : 0;
        //posts list
        
        return $this->render('index', $data);
    }

}