<?php
/**
 * 登录控制
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-06 18:03:50
 * @version $Id$
 */

namespace backend\models;
use yii\base\Model;

class Login extends CommonModel{


    //登录验证
    public function loginCheck($username, $password, $user_ip){
        $user = $this->db->createCommand('select id, username, avatar, password, encrypt, login_times, last_login_time, last_login_ip from {{%user}} where username = :username', array('username' => $username))->queryOne();
        if(!$user){
            return -1;
        }
        $password = md5(md5($password).$user['encrypt']);
        if($password != $user['password']){
            return -2;
        }
        $this->loginSuccess($user['id'], $user_ip);
        return true;
    }

    //用户登录成功
    private function loginSuccess($uid, $user_ip){
        /**
         * 更新上次登录ip
         * 更新登录次数
         * 更新登录时间
         */        
        $this->db->createCommand('update {{%user}} set login_times = login_times + 1, last_login_time = :last_login_time, last_login_ip = :last_login_ip where id = '.$uid, array('last_login_ip' => $user_ip, 'last_login_time' => date('Y-m-d H:i:s')))->execute();
    }
}