<?php
/**
 * 
 * @authors Kunlun (szhcool1129@sina.com)
 * @date    2017-09-24 08:19:21
 * @version $Id$
 */

    $this->title = '关于debugphp';
    use yii\helpers\Url;
    \frontend\assets\AppAsset::addCss($this, 'static/css/style.css');
?>
<div class="wrap">
    <?=$this->render('/layouts/commonPageLeftNav', ['title' => $title]);?>
    <div class="comment-text"><?=$detail['content']?></div>
</div>