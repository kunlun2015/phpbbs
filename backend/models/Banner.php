<?php
/**
 * banner轮播图数据管理
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-24 13:24:30
 * @version $Id$
 */

namespace backend\models;
use yii\base\Model;

class Banner extends CommonModel{

    //轮播图分类
    public function bannerCate(){
        return array('首页轮播图');
    }

}