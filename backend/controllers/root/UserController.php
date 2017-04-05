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
use yii\helpers\Url;

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
                $data = array(
                    'username' => trim($this->request->post('username')),
                    'mobile'   => $this->request->post('mobile'),
                    'password' => trim($this->request->post('password')),
                    'remarks'   => $this->request->post('remarks')
                    );
                $model = new User;
                $rst = $model->addUser($data);
                if($rst){
                    $this->jsonExit(0, '用户添加成功！', array('url' => Url::to(['root/user'])));
                }else{
                    $this->jsonExit(-1, '用户添加失败，请稍候重试！');
                }
                break;
            
            default:
                # code...
                break;
        }
    }

}