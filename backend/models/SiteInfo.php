<?php
/**
 * 站点信息管理
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-09-23 13:05:08
 * @version $Id$
 */

namespace backend\models;
use yii\base\Model;

class SiteInfo extends CommonModel
{

    public function add($data)
    {
        return $this->db->createCommand()->insert('{{%common_page_text}}', $data)->execute();
    }

}