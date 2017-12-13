<?php
/**
 * 搜索模型
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-10-30 16:10:43
 * @version $Id$
 */

namespace frontend\models;
use yii\base\Model;
use frontend\models\Posts;

class Search extends CommonModel
{

    public function searchResultList($keywords, $page, $pageSize, &$totalPage)
    {
        $offset = ($page - 1)*$pageSize;
        $list = $this->db->createCommand('select id, fid, lid, author, authorid, title, tag, abstract, thumbnail, views, comments, likes, unlikes, create_at from {{%post_basic}} where title like :keywords limit :offset, :pageSize', ['keywords' => "%$keywords%", 'offset' => $offset, 'pageSize' => $pageSize])->queryAll();
        $posts = new Posts;
        foreach ($list as $k => $v) {
            $fidInfo = $posts->getPostCateById($v['fid']);
            $lidInfo = $posts->getPostCateById($v['lid']);
            $list[$k]['fname'] = $fidInfo['name'];
            $list[$k]['lname'] = $lidInfo['name'];
            $list[$k]['fmap'] = $this->params['cateMap'][$v['fid']];
        }
        $totalSql = "select count(*) from {{%post_basic}} where title like '%$keywords%'";
        $totalPage = $this->getTotalPage($totalSql, $pageSize);
        return $list;
    }
}