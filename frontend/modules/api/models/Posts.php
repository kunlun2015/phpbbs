<?php
/**
 * posts
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-12-19 16:46:47
 * @version $Id$
 */

namespace frontend\modules\api\models;
use yii;
use yii\base\Model;

class Posts extends CommonModel
{

    /**
     * wap首页列表
     * @param  string $recommendType 要显示的首页分类
     * @param  int $page             页码
     * @param  [type] $pageSize      偏移量
     * @param  [type] &$totalPage    总页数
     * @return array
     */
    public function indexList($recommendType, $page, $pageSize, &$totalPage)
    {
        $offset = ($page - 1)*$pageSize;
        $sql = "select id, fid, lid, title, abstract, thumbnail, views, create_at from {{%post_basic}} where status = 0 and recommend_type in ($recommendType) order by id desc limit :offset, :pageSize";
        $sqlTotal = 'select count(*) from {{%post_basic}} where status = 0 and recommend_type in ('.$recommendType.')';
        $list = $this->db->createCommand($sql, ['offset' => $offset, 'pageSize' => $pageSize])->queryAll();
        $totalPage = $this->getTotalPage($sqlTotal, $pageSize);
        foreach ($list as $k => $v) {
            $v['thumbnail'] && $list[$k]['thumbnail'] = $this->params['imgUrl'].$v['thumbnail'];
            $fidInfo = $this->getPostCateById($v['fid']);
            $lidInfo = $this->getPostCateById($v['lid']);
            $list[$k]['fname'] = $fidInfo['name'];
            $list[$k]['lname'] = $lidInfo['name'];
            $list[$k]['fmap'] = $this->params['cateMap'][$v['fid']];
        }
        return $list;
    }

    /**
     * 按类别获取posts list
     * @param  int $fid            分类id
     * @param  int $page           页码
     * @param  int $pageSize   页面偏移量
     * @param  int &$totalPage 总页数
     * @return array             
     */
    public function getListByFid($fid, $page, $pageSize, &$totalPage)
    {
        $offset = ($page - 1)*$pageSize;
        $sql = "select id, fid, lid, title, abstract, thumbnail, views, create_at from {{%post_basic}} where fid = :fid and status = 0 order by id desc limit :offset, :pageSize";
        $sqlTotal = "select count(*) from {{%post_basic}} where fid = {$fid} and status = 0";
        $list = $this->db->createCommand($sql, ['fid' => $fid, 'offset' => $offset, 'pageSize' => $pageSize])->queryAll();
        $totalPage = $this->getTotalPage($sqlTotal, $pageSize);
        foreach ($list as $k => $v) {
            $v['thumbnail'] && $list[$k]['thumbnail'] = $this->params['imgUrl'].$v['thumbnail'];
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
}
