<?php
/**
 * 详情Model
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-16 18:18
 * @version $Id$
 */
namespace frontend\models;
use yii\base\Model;

class Detail extends CommonModel
{

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