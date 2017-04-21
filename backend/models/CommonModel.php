<?php
/**
 * model 基类，初始化方法及参数
 * @authors Amos (735767227@qq.com)
 * @date    2017-03-28 10:40:26
 * @version $Id$
 */

namespace backend\models;
use yii;
use yii\base\Model;

class CommonModel extends \common\models\CommonModel{

    protected $db;
    protected $session;

    public function init(){
        $this->db = Yii::$app->db;
        $this->session = Yii::$app->session;
    }

    protected function getTotalPage($sql, $page_size){
        $rst = $this->db->createCommand($sql)->queryOne();
        return ceil($rst['count(*)']/$page_size);
    }
}