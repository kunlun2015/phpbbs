<?php
/**
 * 搜索模型
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-10-30 16:10:43
 * @version $Id$
 */

namespace frontend\models;
use yii\base\Model;

class Search extends CommonModel
{

    public function searchResultList($keywords, $page, $pageSize, &$totalPage)
    {
        $offset = ($page - 1)*$pageSize;
        $list = $this->db->createCommand('select id, author, authorid, title, tag, abstract, views, comments, likes, unlikes, create_at from {{%post_basic}} where title like :keywords limit :offset, :pageSize', ['keywords' => "%$keywords%", 'offset' => $offset, 'pageSize' => $pageSize])->queryAll();
        $totalSql = "select count(*) from {{%post_basic}} where title like '%$keywords%'";
        $totalPage = $this->getTotalPage($totalSql, $pageSize);
        return $list;
    }
}