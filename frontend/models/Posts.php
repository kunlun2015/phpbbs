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
     * @param int $type 推荐类型1：首页左侧,2首页左侧上，3：首页上右侧上4：首页上右侧下
     * @return array
     */
    public function recommendCateList($recommendType, $pageSize, $page, &$totalPage)
    {
        $offset = ($page - 1)*$pageSize;
        $list = $this->db->createCommand('select id, fid, lid, author, title, abstract, thumbnail, views, create_at from {{%post_basic}} where recommend_type = :type and status = 0 order by id desc limit :offset, :pageSize', [
                'type' => $recommendType,
                'offset' => $offset,
                'pageSize' => $pageSize
            ])->queryAll();
        foreach ($list as $k => $v) {
            $fidInfo = $this->getPostCateById($v['fid']);
            $lidInfo = $this->getPostCateById($v['lid']);
            $list[$k]['fname'] = $fidInfo['name'];
            $list[$k]['lname'] = $lidInfo['name'];
            $list[$k]['fmap'] = $this->params['cateMap'][$v['fid']];
        }
        $sqlTotal = 'select count(*) from {{%post_basic}} where recommend_type = '.$recommendType.' and status = 0';
        $totalPage = $this->getTotalPage($sqlTotal, $pageSize);
        return $list;
    }

    /**
     * 获取文章列表
     * @param int $fid 第一级分类
     * @param int $lid 最后一级分类
     * @param string $title 文章标题
     * @param int $display_order 置顶显示顺序
     * @return array
     */
    public function postList($fid, $lid, $title, $displayOrder = 0, $orderBy, $sort, $page, $pageSize, &$totalPage)
    {
        $offset = ($page - 1)*$pageSize;
        $sql = 'select id, fid, lid, author, title, abstract, thumbnail, views, create_at from {{%post_basic}} where status = 0';
        $sqlTotal = 'select count(*) from {{%post_basic}} where status = 0';
        if($fid){
            $sql .= ' and fid = '.$fid;
            $sqlTotal .= ' and fid = '.$fid;
        }
        if($lid){
            $sql .= ' and lid = '.$lid;
            $sqlTotal .= ' and lid = '.$lid;
        }
        if($title){
            $sql .= " and title like '%$title%'";
            $sqlTotal .= " and title like '%$title%'";
        }
        if($displayOrder){
            $sql .= ' and display_order = '.$displayOrder;
            $sqlTotal .= ' and display_order = '.$displayOrder;
        }
        $orderBy = $orderBy ? $orderBy : 'id';
        if($orderBy){
            $sql .= ' order by '.$orderBy;
        }
        $sort = $sort ? $sort : ' desc';
        if($sort){
            $sql .= ' '.$sort;
        }
        $sql .= ' limit :offset, :pageSize';
        $list = $this->db->createCommand($sql, ['offset' => $offset, 'pageSize' => $pageSize])->queryAll();
        $totalPage = $this->getTotalPage($sqlTotal, $pageSize);
        foreach ($list as $k => $v) {
            $fidInfo = $this->getPostCateById($v['fid']);
            $lidInfo = $this->getPostCateById($v['lid']);
            $list[$k]['fname'] = $fidInfo['name'];
            $list[$k]['lname'] = $lidInfo['name'];
            $list[$k]['fmap'] = $this->params['cateMap'][$v['fid']];
        }
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
        $detail['fmap'] = $this->params['cateMap'][$detail['fid']];
        return $detail;
    }

    /**
     * 根据类别id获取名称
     * @param int $id 类别名称
     * @return array
     */
    public function getPostCateById($id)
    {
        return $this->db->createCommand('select id, pid, name, href from {{%category}} where id = :id', ['id' => $id])->queryOne();
    }

    /**
     * 文章阅读数自增长
     * @param int $pid 文章id
     * @return boolean
     */
    public function postViewsIncrease($pid)
    {
        return $this->db->createCommand('update {{%post_basic}} set views = views + 1 where id = :pid', ['pid' => $pid])->execute();
    }

    /**
     * 获取分类的层级关系
     * @param int $id 分类id
     * @return array
     */
    public function categoryLevel($id, $levelArray=[])
    {
        $category = $this->db->createCommand('select id, pid, name from {{%category}} where id = :id', array('id' => $id))->queryOne();
        if(!$category){
            return [];
        }
        if(!$category['pid']){
            $levelArray[] = $category;
            krsort($levelArray);
            return $levelArray;
        }else{
            $levelArray[] = $category;
            return $this->categoryLevel($category['pid'], $levelArray);
        }
    }


    public function getPidByTagId($tagId)
    {
        $list = $this->db->createCommand('select pid from {{%post_tags}} where ')->queryAll();
    }
}