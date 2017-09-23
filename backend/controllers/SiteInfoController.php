<?php
/**
 * 管理站点信息
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-09-23 12:48:56
 * @version $Id$
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\SiteInfo;
use yii\helpers\Url;

class SiteInfoController extends AdminController
{

    public function actionIndex()
    {
        
        return $this->render('index');
    }

    //添加
    public function actionAdd()
    {
                
        return $this->render('add');
    }

    //数据处理
    public function actionAction()
    {
        if(!$this->request->isAjax){
            $this->jsonExit(-1, '非法请求！');
        }
        $act = $this->request->post('act');
        $siteInfo = new SiteInfo;
        switch ($act) {
            case 'add':
                $data = [
                    'title' => $this->request->post('title'),
                    'content' => $this->request->post('content')
                ];
                $rst = $siteInfo->add($data);
                if($rst){
                    $this->jsonExit(0, '数据已成功保存', ['url' => Url::to(['/site-info'])]);
                }else{
                    $this->jsonExit(-1, '数据保存失败，请稍后重试');
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}