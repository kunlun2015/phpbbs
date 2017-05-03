<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class SiteController extends AppController{
    /**
     *首页
     * @return mixed
     */
    public function actionIndex(){
        $data = array();
        return $this->render('index', $data);
    }

    public function actionTest(){        
        echo Yii::t('app', 'whatisthis');
    }

}
