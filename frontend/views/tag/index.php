<?php
/**
 * 热门标签
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-12-16 15:03:37
 * @version $Id$
 */

    $this->title = '热门标签';
    use yii\helpers\Url;
    \frontend\assets\AppAsset::addCss($this, 'css/style.css');
    \frontend\assets\AppAsset::addScript($this, 'js/post.js');
?>
<div class="wrap tag">
    <ul class="nav-title">        
        <li><a href="/">首页</a></li>
        <li><a>热门标签</a></li>
    </ul>
    <div class="left">
        <div class="hot-tags">
            <?php foreach($tagsList as $k => $v){?>              
            <a href="<?=Url::to(['/tag', 'id' => $v['id']])?>" <?php if($v['id'] == $tagId){echo 'class="active"';} ?>><span><?=$v['name']?></span></a>
            <?php } ?>
        </div>
    </div>
    <ul class="article-list">            
        <?=$this->render('listTemplate', ['postsList' => $postsList])?>
    </ul>
    <?php if($totalPage > 1){ ?>
    <div class="btn-loading-more" data-fid="<?=$fid?>" data-page="1" data-total="<?=$totalPage?>">加载更多</div>
    <?php } ?>
</div>