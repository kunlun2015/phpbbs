<?php
/**
 * 标签
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-09-16 11:44:01
 * @version $Id$
 */

namespace frontend\models;
use yii\base\Model;

class Tags extends CommonModel
{
    public function tagsList($cate, $page, $pageSize, &$toalPage)
    {
        $offset = ($page - 1)*$pageSize;
        $sql = 'select id, cate, name, nums from {{%tags}} where 1 = 1';
        $sqlTotal = 'select count(*) from {{%tags}} where 1 = 1';
        if($cate){
            $sql .= ' and cate = '.$cate;
            $sqlTotal .= ' and cate = '.$cate;
        }
        $sql .= ' order by nums desc limit :offset, :pageSize';
        $list = $this->db->createCommand($sql, ['offset' => $offset, 'pageSize' => $pageSize])->queryAll();
        $totalPage = $this->getTotalPage($sqlTotal, $pageSize);
        return $list;
    }
}