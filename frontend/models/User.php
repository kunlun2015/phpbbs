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

    /**
     * 插入用户
     * @param array $data 用户参数
     * @return boolen
     */
    public function insert($data)
    {
        return $this->db->createCommand()->insert('{{%users}}', $data)->execute();
    }

    /**
     * 用户激活
     * @param int $uid 用户uid
     * @return boolen
     */
    public function active($uid)
    {
        return $this->db->createCommand()->update('{{%users}}', ['status' => 1], ['id' => $uid])->execute();
    }

    /**
     * 获取登录密码信息
     * @param int $uid 用户uid
     * @return array
     */
    public function getLoginPsd($uid)
    {
        return $this->db->createCommand('select password, encrypt from {{%login_psd}} where uid = :uid', ['uid' => $uid])->queryOne();
    }
}