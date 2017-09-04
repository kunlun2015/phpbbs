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
use frontend\models\Detail;
use common\widgets\Alert;

class DetailController extends AppController {

    private $detailModel;

    public function init()
    {
        parent::init();
        $this->detailModel = new Detail;
    }

    //详情
    public function actionIndex($id)
    {
        $id = (int)$id;
        $data['detail'] = $this->detailModel->detail($id);
        return $this->render('detail', $data);
    }

}