<?php
/**
 * 注册
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-08-30 13:48:45
 * @version $Id$
 */

namespace frontend\models;
use yii\base\Model;

class Register extends CommonModel
{
    //生成注册激活码
    public function generateActiveCode()
    {
        $activeCode = $this->randString(8, 5);
        return $activeCode;
    }
}