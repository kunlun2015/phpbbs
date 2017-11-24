<?php
/**
 * 
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-11-20 09:56:47
 * @version $Id$
 */

namespace backend\models;
use yii\base\Model;

class Editor extends CommonModel
{
    protected $db;

    public function init()
    {
        $this->db = new \yii\db\Connection([
            'dsn' => 'mysql:host=127.0.0.1;dbname=editor',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
        ]);
    }

    public function cates()
    {
        $list = $this->db->createCommand('select cate_id, pid, name from cate where pid = :pid and level = :level', ['pid' => 1, 'level' => 2])->queryAll();
        foreach ($list as $k => $v) {
            $list[$k]['sub'] = $this->db->createCommand('select cate_id, pid, name from cate where pid = :pid and level = :level', ['pid' => $v['cate_id'], 'level' => 3])->queryAll();
        }
        return $list;
    }

    public function dataList($cate_2, $cate_3)
    {
        $sql = 'select html from editor_theme where 1 = 1';       
        if($cate_2){
            $sql .= ' and cate_2 = '.$cate_2;
        }
        if($cate_3){
            $sql .= ' and cate_3 = '.$cate_3;
        }
        $sql .= ' order by id';
        $list = $this->db->createCommand($sql)->queryAll();
        return $list;
    }
}