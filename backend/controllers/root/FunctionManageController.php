<?php
/**
 * 功能管理
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-10 17:35:20
 * @version $Id$
 */

namespace backend\controllers\root;
use Yii;
use yii\web\Controller;
use backend\models\root\FunctionManage;
use yii\helpers\Url;

class FunctionManageController extends RootController{

    //一级功能列表
    public function actionIndex(){
        return $this->render('index');
    }

    //添加功能
    public function actionAdd(){
        $data['groupList'] = (new FunctionManage)->availableFunctionGroup();
        return $this->render('add', $data);
    }

    //功能分组
    public function actionFunctionGroup(){
        $data['list'] = (new FunctionManage)->functionGroupList();
        return $this->render('functionGroup', $data);
    }

    //获取编辑分组数据
    public function actionFunctionGroupEditData(){
        if(!$this->request->isAjax){
            $this->jsonExit(-1, '非法请求！');
        }
        $groupid = $this->request->get('groupid');        
        $rst = (new FunctionManage)->oneFunctionGroupData($groupid);
        $this->jsonExit(0, '数据获取成功！', $rst);
    }

    //get请求分配
    public function actionRequestDistribution(){
        $act = $this->request->get('act');
        switch ($act) {
            case 'deleteGroup':
                $groupid = $this->request->get('groupid');
                $rst = (new FunctionManage)->deleteFunctionGroup($groupid);
                if($rst){
                    $this->jsonExit(0, '分组删除成功！');
                }else{
                    $this->jsonExit(-1, '分组删除失败，请稍候重试！');
                }
                break;
            
            default:
                # code...
                break;
        }
    }

    //数据操作
    public function actionSave(){
        if(!$this->request->isAjax){
            $this->jsonExit(-1, '非法请求！');
        }
        $act = $this->request->post('act');
        switch ($act) {
            case 'add':
                    $data = array(
                            'groupid' => $this->request->post('groupid'),
                            'name'    => $this->request->post('name'),
                            'icon'    => $this->request->post('icon'),
                        );
                break;

            case 'addGroup':
                $data = array(
                        'name'    => trim($this->request->post('name')),
                        'sort'    => $this->request->post('sort'),
                        'status'  => $this->request->post('status'),
                        'remarks' => $this->request->post('remarks'),
                        'created' => $this->session->get('root_session')['username']
                    );
                $rst = (new FunctionManage)->addFunctionGroup($data);
                if($rst){
                    $this->jsonExit(0, '分组添加成功！');
                }else{
                    $this->jsonExit(-1, '分组添加失败，请稍候重试！');
                }
                break;

            case 'editGroup':
                $data = array(
                        'name'    => $this->request->post('name'),
                        'sort'    => $this->request->post('sort'),
                        'remarks' => $this->request->post('remarks'),
                        'status'  => $this->request->post('status')
                    );
                $groupid = $this->request->post('groupid');
                $rst = (new FunctionManage)->editFunctionGroup($data, $groupid);
                if($rst){
                    $this->jsonExit(0, '分组编辑成功！');
                }else{
                    $this->jsonExit(-1, '分组编辑失败，请稍候重试！');
                }
                break;
            
            default:
                
                break;
        }
    }

}