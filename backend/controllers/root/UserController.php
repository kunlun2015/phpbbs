<?php
/**
 * 用户管理
 * @authors Amos (735767227@qq.com)
 * @date    2017-03-28 14:01:50
 * @version $Id$
 */

namespace backend\controllers\root;
use Yii;
use yii\web\Controller;
use backend\models\root\User;

class UserController extends RootController{

    private $page_size = 10;

    //初始化
    public function init(){
        parent::init();
    }

    //用户管理
    public function actionIndex(){
        $page = intval($this->request->get('page', 1));
        $model = new User;
        $data['list'] = $model->userList($this->page_size, $page, $total_page);
        return $this->render('index', $data);
    }

    //用户添加
    public function actionAdd(){
        return $this->render('add');
    }

    //用户操作
    public function actionAction(){
        if(!$this->request->isAjax){
            $this->jsonExit(-1, '非法请求！');
        }
        $act = $this->request->post('act');
        switch ($act) {
            case 'add':
                $username = trim($this->request->post('username'));
                $password = $this->request->post('password');
                break;
            
            default:
                # code...
                break;
        }
    }

}