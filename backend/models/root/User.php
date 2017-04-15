<?php
/**
 * 用户
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
        $rst = $this->db->createCommand("select id, username, realname, avatar, mobile, login_times, last_login_time, status from {{%user}} order by id desc limit $offset, $page_size")->queryAll();
        $sql_total = 'select count(*) from {{%user}}';
        $total_page = $this->getTotalPage($sql_total, $page_size);
        return $rst;
    }

    //添加用户
    public function addUser($data){
        $data['encrypt'] = $this->randString(8);
        $data['password'] = md5(md5($data['password']).$data['encrypt']);
        return $this->db->createCommand()->insert('{{%user}}', $data)->execute();
    }

    //获取修改用户信息
    public function getEditUser($uid){
        return $this->db->createCommand('select id, username, realname, mobile, remarks, status from {{%user}} where id = :uid', array('uid' => $uid))->queryOne();
    }

    //修改用户
    public function editUser($data){
        return $this->db->createCommand()->update('{{%user}}', $data, array('id' => $data['id']))->execute();
    }

    //生成menu tree
    public function menuLevelTree(){
        $menu = array();
        $group = (new FunctionManage)->availableFunctionGroup();
        $i = 0;
        foreach ($group as $k => &$v) {
            $menu[$i]['text'] = $v['name'];
            $menu[$i]['groupid'] = $v['id'];
            $firstLevelMenu = $this->getFirstLevalMenuByGroupId($v['id']); 
            //!$firstLevelMenu && unset($v);
            if(!$firstLevelMenu){
                unset($menu[$i]);
                $i += 1;
                continue;
            }     
            $menu[$i]['children'] = $firstLevelMenu;
            $j = 0;
            foreach ($firstLevelMenu as $kFirstLevelMenu => $vFirstLevelMenu) {
                $secondLevelMenu = $this->getMenuListByParentId($vFirstLevelMenu['id']);
                $menu[$i]['children'][$j]['children'] = $secondLevelMenu;
                $k = 0;
                foreach ($secondLevelMenu as $kSecondLevelMenu => $vSecondLevelMenu) {
                    $thirdLevelMenu = $this->getMenuListByParentId($vSecondLevelMenu['id']);
                    $menu[$i]['children'][$j]['children'][$k]['children'] = $thirdLevelMenu;
                    $k += 1;
                }
                $j += 1;
            }
            $i += 1;
        }
        return $menu;
    }

    //获取分组下的一级菜单
    private function getFirstLevalMenuByGroupId($groupid){
        return $this->db->createCommand('select id, name from {{%function}} where groupid = :groupid and parent_id = 0 and status = 0 order by sort desc', array('groupid' => $groupid))->queryAll();
    }

    //根据parent_id获取菜单树的list
    private function getMenuListByParentId($parent_id){
        return $this->db->createCommand('select id, name from {{%function}} where parent_id = :parent_id and status = 0 order by sort desc', array('parent_id' => $parent_id))->queryAll();
    }

}