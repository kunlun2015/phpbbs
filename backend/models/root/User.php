<?php
/**
 * 
 * @authors Amos (735767227@qq.com)
 * @date    2017-03-28 16:57:05
 * @version $Id$
 */

namespace backend\models\root;
use yii\base\Model;

class User extends \backend\models\CommonModel{

    //用户列表
    public function userList($page_size, $page, &$total_page){
        $offset = ($page - 1)*$page_size;
        $rst = $this->db->createCommand("select id, username, avatar, mobile from {{%user}} order by id desc limit $offset, $page_size")->queryAll();
        $sql_total = 'select count(*) from {{%user}}';
        $total_page = $this->getTotalPage($sql_total, $page_size);
        return $rst;
    }

    public function addUser(){
           
    }

}