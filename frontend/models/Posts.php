<?php
/**
 * 文章相关
 * @authors Kunlun (szhcool1129@sina.com)
 * @date    2017-09-09 12:51:03
 * @version $Id$
 */

namespace frontend\models;
use yii\base\Model;

class Posts extends CommonModel
{

    /**
     * 推荐分类文章列表
     * @param int $type 推荐类型1：首页左侧,2首页左侧上，3：首页左侧上4：首页左侧下
     * 
     */
    public function recommendCateList($recommendType, $pageSize, $page, &$totalPage)
    {
        $offset = ($page - 1)*$pageSize;
        $list = $this->db->createCommand('select id, author, title, abstract, thumbnail, views, create_at from {{%post_basic}} where recommend_type = :type and status = 0 order by id desc limit :offset, :pageSize', [
                'type' => $recommendType,
                'offset' => $offset,
                'pageSize' => $pageSize
            ])->queryAll();
        $sqlTotal = 'select count(*) from {{%post_basic}} where recommend_type = '.$recommendType.' and status = 0';
        $totalPage = $this->getTotalPage($sqlTotal, $pageSize);
        return $list;
    }

    /**
     * 获取文章详情
     * @param $id int 文章id
     * @return mixed array
     */
    public function detail($id)
    {
        $detail = $this->db->createCommand('select t1.id, t1.fid, t1.lid, author, authorid, t1.title, tag, abstract, thumbnail, display_order, status, views, comments, likes, unlikes, create_at, posts from {{%post_basic}} t1 left join {{%posts}} t2 on t1.id = t2.bid where t1.id = :id', ['id' => $id])->queryOne();
        return $detail;
    }

    public function commentList($pageSize, $page, &$totalPage)
    {
        $list = $this->db->createCommand()->queryAll();
    }
}