<?php
/**
 * api
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-12-19 12:39:55
 * @version $Id$
 */

namespace frontend\modules\api\controllers;
use yii;
use yii\web\Controller;

class ApiController extends Controller 
{

    protected $app;
    protected $request;

    public function init()
    {
        header('Access-Control-Allow-Origin:*');
        $this->enableCsrfValidation = false;
        $this->app = Yii::$app;
        $this->request = $this->app->request;
    }

    public function beforeAction($action)
    {
        if(!$this->request->isPost){
            exit('only post request available');
        }
        return parent::beforeAction($action);
    }

    /**
     * 输出json格式数据
     * @param  int $code 状态码
     * @param  string $msg  提示信息
     * @param  array  $data 返回数据
     * @return string json
     */
    public function jsonExit($code, $msg, $data)
    {
        $return = ['errCode' => $code, 'errMsg' => $msg, 'data' => $data];
        exit(json_encode($return));
    }
}