<?php
/**
 * common page
 * @authors Kunlun (szhcool1129@sina.com)
 * @date    2017-09-24 09:13:38
 * @version $Id$
 */

namespace frontend\models;
use yii\base\Model;

class CommonPage extends CommonModel
{
    public function detail($id)
    {
        return $this->db->createCommand('select content from {{%common_page_text}} where id = :id', ['id' => $id])->queryOne();
    }
}