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

    //获取总页数
    protected function getTotalPage($sql, $page_size){
        $rst = $this->db->createCommand($sql)->queryOne();
        return ceil($rst['count(*)']/$page_size);
    }

    //生成页码导航
    protected function pagination($totalPage, $curPage, $pageNums){
        $middlePage = ceil($pageNums/2);
        if($beginPageNum*2 == $pageNums){

        }
        /*<ul class="pagination" style="visibility: visible;">
            <li class="prev disabled"><a href="#" title="First"><i class="fa fa-angle-double-left"></i></a></li>
            <li class="prev disabled"><a href="#" title="Prev"><i class="fa fa-angle-left"></i></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li class="next"><a href="#" title="Next"><i class="fa fa-angle-right"></i></a></li>
            <li class="next"><a href="#" title="Last"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>*/
        $pagination = '<ul class="pagination" style="visibility: visible;">';
        if($totalPage == 1){
            return '';
        }else{
            if($curPage == 1){
                $pagination .= '<li class="active"><a href="#" title="第1页">1</a></li>';
                for ($i=2; $i < $pageNums; $i++) { 
                    if($i > $totalPage){
                        break;
                    }
                    $pagination .= '<li><a href="#" title="第'.$i.'页">'.$i.'</a></li>';
                }
                $pagination .= '<li class="next"><a href="#" title="下一页"><i class="fa fa-angle-right"></i></a></li>
                                <li class="next"><a href="#" title="最后一页"><i class="fa fa-angle-double-right"></i></a></li>';
            }else{
                
            }
        }
        $pagination .= '</ul>';
    }

}