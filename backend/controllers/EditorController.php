<?php
/**
 * 编辑器样式开发
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-11-14 16:55:24
 * @version $Id$
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use backend\models\Editor;

class EditorController extends AdminController
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $editor = new Editor;
        $data['cate'] = $editor->cates();
        $data['list'] = $editor->dataList($data['cate'][0]['cate_id'], $data['cate'][0]['sub'][0]['cate_id']);
        return $this->renderPartial('index', $data);
    }

    public function actionDataList()
    {
        $cate_2 = $this->request->post('cate_2');
        $cate_3 = $this->request->post('cate_3');
        $editor = new Editor;
        $list = $editor->dataList($cate_2, $cate_3);
        if($list !== false){
            $this->jsonExit(0, 'ok', $list);
        }else{
            $this->jsonExit(-1, 'error');
        }

        
    }
}