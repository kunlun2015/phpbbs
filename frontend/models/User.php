<?php
/**
 * users
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-08-31 16:17:57
 * @version $Id$
 */

namespace frontend\models;
use yii\base\Model;

class User extends CommonModel
{
    /**
     * 根据用户名获取用户信息
     * @params string $username 
     * @return array
     */
    public function getUserByUsername($username)
    {
        return $this->db->createCommand('select id as uid, username, realname, sex, mobile, avatar, login_times, last_login_time, last_login_ip, remarks, status, create_at from {{%users}} where username = :username', ['username' => $username])->queryOne();
    }

    /**
     * 根据用户uid获取用户信息
     * @params int $uid
     * @return array
     */
    public function getUserById($uid)
    {
        return $this->db->createCommand('select id as uid, username, realname, sex, mobile, avatar, login_times, last_login_time, last_login_ip, remarks, status, create_at from {{%users}} where id = :uid', ['uid' => $uid])->queryOne();
    }
}