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

    private $user;

    //登录验证
    public function loginCheck($username, $password, $user_ip){
        $this->user = $this->db->createCommand('select id, username, avatar, password, encrypt, login_times, last_login_time, last_login_ip from {{%user}} where username = :username', array('username' => $username))->queryOne();
        if(!$this->user){
            return -1;
        }
        $password = md5(md5($password).$this->user['encrypt']);
        if($password != $this->user['password']){
            return -2;
        }
        $this->loginSuccess($this->user['id'], $user_ip);
        $this->userLoginStatusKeep();
        return true;
    }

    //用户登录成功
    private function loginSuccess($user_ip){
        /**
         * 更新上次登录ip
         * 更新登录次数
         * 更新登录时间
         */        
        $this->db->createCommand('update {{%user}} set login_times = login_times + 1, last_login_time = :last_login_time, last_login_ip = :last_login_ip where id = '.$this->user['id'], array('last_login_ip' => $user_ip, 'last_login_time' => date('Y-m-d H:i:s')))->execute();
        return true;
    }

    //用户登录状态存储
    private function userLoginStatusKeep(){
        $session_info = array(
            'id'              => $this->user['id'],
            'username'        => $this->user['username'],
            'avatar'          => $this->user['avatar'],
            'login_times'     => $this->user['login_times'],
            'last_login_time' => $this->user['last_login_time'],
            'last_login_ip'   => $this->user['last_login_ip']
        );
        $this->session->set('user', $session_info);
        return true;
    }
}