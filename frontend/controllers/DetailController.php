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
            return $this->tipsPage(['msg' => '文章不存在']);
        }
        return $this->render('detail', $data);
    }

}