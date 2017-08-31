<?php
/**
 * 首页数据
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-15 12:15
 * @version $Id$
 */

namespace frontend\models;
use yii\base\Model;

class Index extends CommonModel
{

    public function bannerList($cateId)
    {
        $list = $this->db->createCommand('select id, title, href, picture from {{%slide_banner}} where cate_id = :cateId and status = 0 and begin_time <= :curTime and end_time >= :curTime order by sort desc', ['cateId' => $cateId, 'curTime' => date('Y-m-d H:i:s')])->queryAll();
        return $list;
    }

}