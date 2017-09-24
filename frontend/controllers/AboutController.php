<?php
/**
 * 
 * @authors Kunlun (szhcool1129@sina.com)
 * @date    2017-09-24 08:14:38
 * @version $Id$
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\CommonPage;
use common\widgets\Alert;

class AboutController extends AppController {

    private $model;
    private $listMap;
    public function init()
    {
        parent::init();
        $this->listMap = [
                'debugphp' => [
                    'title' => '关于debugphp',
                    'id' => 1
                ],
                'contact' => [
                    'title' => '联系我们',
                    'id' => 2
                ],
                'feedback' => [
                    'title' => '意见反馈',
                    'id' => 3
                ],
                'exemption' => [
                    'title' => '免责声明',
                    'id' => 4
                ],
                'sitemap' => [
                    'title' => '网站地图',
                    'id' => 5
                ],
                'experience' => [
                    'title' => '发展经历',
                    'id' => 6
                ]
            ];
        $this->model = new CommonPage;
    }

    public function actionDebugphp()
    {
        $data['detail'] = $this->model->detail($this->listMap[$this->app->controller->action->id]['id']);
        $data['title'] = $this->listMap[$this->app->controller->action->id]['title'];
        return $this->render('commonLayouts', $data);
    }

    public function actionContact()
    {
        $data['detail'] = $this->model->detail($this->listMap[$this->app->controller->action->id]['id']);
        $data['title'] = $this->listMap[$this->app->controller->action->id]['title'];
        return $this->render('commonLayouts', $data);
    }

    public function actionFeedback()
    {
        $data['detail'] = $this->model->detail($this->listMap[$this->app->controller->action->id]['id']);
        $data['title'] = $this->listMap[$this->app->controller->action->id]['title'];
        return $this->render('commonLayouts', $data);
    }

    public function actionExemption()
    {
        $data['detail'] = $this->model->detail($this->listMap[$this->app->controller->action->id]['id']);
        $data['title'] = $this->listMap[$this->app->controller->action->id]['title'];
        return $this->render('commonLayouts', $data);
    }

    public function actionSitemap()
    {
        $data['detail'] = $this->model->detail($this->listMap[$this->app->controller->action->id]['id']);
        $data['title'] = $this->listMap[$this->app->controller->action->id]['title'];
        return $this->render('commonLayouts', $data);
    }

    public function actionExperience()
    {
        $data['detail'] = $this->model->detail($this->listMap[$this->app->controller->action->id]['id']);
        $data['title'] = $this->listMap[$this->app->controller->action->id]['title'];
        return $this->render('commonLayouts', $data);
    }

}