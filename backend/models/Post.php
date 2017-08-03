<?php
/**
 * post model
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-01 16:30
 * @version $Id$
 */
namespace backend\models;
use yii\base\Model;

class Post extends CommonModel
{
    //添加数据
    public function addPost($data)
    {
        $transaction = $this->db->beginTransaction();
        try {
            $this->db->createCommand()->insert('{{%post_basic}}', [
                'fid'      => $data['fid'],
                'lid'      => $data['lid'],
                'title'    => $data['title'],
                'display_order' => $data['display_order'],
                'author'   => $data['author'],
                'authorid' => $data['authorid']
            ])->execute();
            $bid = $this->db->getLastInsertID();
            $this->db->createCommand()->insert('{{%posts}}', [
                'bid'   => $bid,
                'fid'   => $data['fid'],
                'lid'   => $data['lid'],
                'title' => $data['title'],
                'posts' => $data['posts']
            ])->execute();
            $transaction->commit();
            return true;
        } catch (\Exception $e) {
            $transaction->rollBack();
            //throw $e;
            return false;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            //throw $e;
            return false;
        }
    }

    //编辑数据
    public function updatePost($id, $data)
    {
        $transaction = $this->db->beginTransaction();
        try {
            $this->db->createCommand()->update('{{%post_basic}}', [
                'fid'      => $data['fid'],
                'lid'      => $data['lid'],
                'title'    => $data['title'],
                'display_order' => $data['display_order']
            ], ['id' => $id])->execute();
            $this->db->createCommand()->update('{{%posts}}', [
                'fid'   => $data['fid'],
                'lid'   => $data['lid'],
                'title' => $data['title'],
                'posts' => $data['posts']
            ], ['bid' => $id])->execute();
            $transaction->commit();
            return true;
        } catch (\Exception $e) {
            $transaction->rollBack();
            //throw $e;
            return false;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            //throw $e;
            return false;
        }
    }

    //文章列表
    public function  postsList($id, $title, $pageSize, $page, &$totalPage)
    {
        $offset = ($page - 1)*$pageSize;
        $sql = 'select id, fid, lid, author, authorid, title, display_order, status, views, comments, likes, unlikes, create_at from {{%post_basic}} where 1 = 1';
        $sqlTotal = 'select count(*) from {{%post_basic}} where 1 = 1';
        if($id){
            $sql .= " and id = $id";
            $sqlTotal .= " and id = $id";
        }
        if($title){
            $sql .= " and title like '%$title%'";
            $sqlTotal .= " and title like '%$title%'";
        }
        $sql .= " order by create_at desc limit $offset, $pageSize";
        $list = $this->db->createCommand($sql)->queryAll();
        $totalPage = $this->getTotalPage($sqlTotal, $pageSize);
        return $list;
    }

    //文章详情
    public function detail($id)
    {
        $detail = $this->db->createCommand('select t1.id, t1.fid, t1.lid, t1.title, display_order, status, posts from {{%post_basic}} t1 left join {{%posts}} t2 on t1.id = t2.bid where id = :id',
            ['id' => $id])->queryOne();
        return $detail;
    }
}
