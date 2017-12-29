<?php
/**
 * swiper
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-12-19 13:01:11
 * @version $Id$
 */

namespace frontend\modules\api\models;
use yii;
use yii\base\Model;

class Swiper extends CommonModel
{
    public function swiperList()
    {
        $list = $this->db->createCommand('select id, title, href, picture from {{%slide_banner}} where cate_id = :cateId and status = 0 and begin_time <= :curTime and end_time >= :curTime order by sort desc', ['cateId' => 1, 'curTime' => date('Y-m-d H:i:s')])->queryAll();
        foreach ($list as $k => $v) {
            $list[$k]['picture'] = $this->params['imgUrl'].$v['picture'];
        }
        return $list;
    }
}