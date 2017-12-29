<?php
/**
 * api common model
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-12-19 12:59:13
 * @version $Id$
 */

namespace frontend\modules\api\models;
use yii;
use yii\base\Model;

class CommonModel extends \common\models\CommonModel
{
    protected $db;
    protected $params;

    public function init()
    {
        $this->db = Yii::$app->db;
        $this->params = Yii::$app->params;
    }

    //获取总页数
    protected function getTotalPage($sql, $pageSize){
        $rst = $this->db->createCommand($sql)->queryOne();
        return ceil($rst['count(*)']/$pageSize);
    }
}