<?php
/**
 * 首页
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-04 17:45
 * @version $Id$
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use frontend\models\Index;

class SiteController extends AppController{

    private $indexModel;

    public function init()
    {
        parent::init();
        $this->indexModel = new Index;
    }

    /**
     *首页
     * @return mixed
     */
    public function actionIndex()
    {
        $data['bannerList'] = $this->indexModel->bannerList($cateId=1);
        return $this->render('index', $data);
    }

    public function actionTest()
    {
        echo Yii::t('app', 'whatisthis');
    }

}
