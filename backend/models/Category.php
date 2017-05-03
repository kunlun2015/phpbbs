<?php
/**
 * category manage
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-27 09:21:28
 * @version $Id$
 */

namespace backend\models;
use yii\base\Model;

class Category extends CommonModel{

    //添加分类数据
    public function addCategory($data){
        return $this->db->createCommand()->insert('{{%category}}', $data)->execute();
    }

    //获取分类列表数据
    public function categoryList($parentId){
        return $this->db->createCommand('select id, pid, name, sort, href, status, created, create_at from {{%category}} where pid = :pid', array('pid' => $parentId))->queryAll();
    }
}