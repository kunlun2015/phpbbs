<?php
/**
 * 我的账户
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-20 14:35:42
 * @version $Id$
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\My;
use yii\helpers\Url; 

class MyController extends AdminController{

    private $my;

    public function init(){
        parent::init();
        $this->my = new My;
        $this->my['uid'] = $this->session->get('user')['id'];
    }

    //账户首页
    public function actionIndex(){
        $data['myInfo'] = $this->my->myInfo();
        return $this->render('index', $data);
    }

    //保存用户数据
    public function actionSave(){
        $act = $this->request->post('act');
        switch ($act) {
            case 'password':
                $password     = $this->request->post('password');
                $password_old = $this->request->post('password_old');
                //校验原密码是否正确
                $checkPassword= $this->my->checkOldPassword($password_old);
                if(!$checkPassword){
                    $this->jsonExit(-1, '原密码输入不正确！');
                }
                $rst = $this->my->editPassword($password);
                if($rst){
                    $this->session->remove('user');
                    $this->jsonExit(0, '密码修改成功,请重新登录！', array('url' => Url::to(['/login'])));
                }else{
                    $this->jsonExit(-1, '密码修改失败！');
                }
                break;

            case 'editMyInfo':
                $data = array(
                        'realname' => $this->request->post('realname'),
                        'mobile'   => $this->request->post('mobile'),
                        'remarks'  => $this->request->post('remarks')
                    );
                $rst = $this->my->editMyInfo($data);
                if($rst){
                    $this->jsonExit(0, '信息已保存', array('url' => Url::to(['/login'])));
                }else{
                    $this->jsonExit(-1, '信息保存失败');
                }
                break;

            case 'uploadAvatar':
                $base64 = $this->request->post('base64');
                $upload = new \common\models\Upload;
                $upload->saveDir = 'avatar';
                $rst = $upload->saveBase64Img($base64);
                if($rst['code'] === 0){
                    $this->jsonExit($rst['code'], $rst['msg'], array('path' => $rst['path']));
                }else{
                    $this->jsonExit($rst['code'], $rst['msg']);
                }

                break;
            
            default:
                # code...
                break;
        }
    }

}