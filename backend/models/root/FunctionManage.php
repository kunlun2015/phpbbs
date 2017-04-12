<?php
/**
 * 功能管理
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-11 14:43:06
 * @version $Id$
 */

namespace backend\models\root;
use yii\base\Model;

class FunctionManage extends \backend\models\CommonModel{

    //添加功能分组
    public function addFunctionGroup($data){
        return $this->db->createCommand()->insert('{{%function_group}}', $data)->execute();
    }

    //获取功能分组列表
    public function functionGroupList(){
        return $this->db->createCommand('select id, name, sort, status, create_at from {{%function_group}} order by sort desc')->queryAll();
    }

    //获取一条分组数据
    public function oneFunctionGroupData($groupid){
        return $this->db->createCommand('select id, name, sort, status, remarks from {{%function_group}} where id = :groupid', array('groupid' => $groupid))->queryOne();
    }

   //更新分组数据
    public function editFunctionGroup($data, $groupid){
        return $this->db->createCommand()->update('{{%function_group}}', $data, array('id' => $groupid))->execute();
    }

    /**
     * 删除一条分组信息
     * 删除分组信息，同时删除此分组下的所有菜单信息
     */
    public function deleteFunctionGroup($groupid){       
        $transaction = $this->db->beginTransaction();
        try {
            $this->db->createCommand()->delete('{{%function_group}}', array('id' => $groupid))->execute();
            $this->db->createCommand()->delete('{{%function}}', array('groupid' => $groupid))->execute();
            $transaction->commit();
            return true;
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    //获取有效功能菜单分组
    public function availableFunctionGroup(){
        return $this->db->createCommand('select id, name from {{%function_group}} where status = 0 order by sort desc')->queryAll();
    }

    //添加功能
    public function functionAdd($data){
        return $this->db->createCommand()->insert('{{%function}}', $data)->execute();
    }
}