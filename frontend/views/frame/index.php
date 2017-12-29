<?php
/**
 * php版块
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-09-23 12:23:18
 * @version $Id$
 */

    $this->title = 'php框架-debugphp';
    use yii\helpers\Url;
    \frontend\assets\AppAsset::addCss($this, 'css/style.css');
    \frontend\assets\AppAsset::addScript($this, 'js/post.js');
?>
<div class="wrap detail">
    <ul class="nav-title">
        <?php foreach($navTitleArr as $k => $v){ ?>
        <li><a href="<?=Url::to(['/frame'])?>"><?=$v['name']?></a></li>
        <?php } ?>
    </ul>
    <div class="left">
        <ul class="article-list">            
            <?=$this->render('listTemplate', ['postsList' => $postsList])?>
        </ul>
        <?php if($totalPage > 1){ ?>
        <div class="btn-loading-more" data-fid="<?=$fid?>" data-page="1" data-total="<?=$totalPage?>">加载更多</div>
        <?php } ?>
    </div>
    <div class="right">
        <div class="category">
            <div class="title"><span>热门标签</span></div>
            <div class="hot-tags">
                <?php foreach($tagsList as $k => $v){?>              
                <a href="<?=Url::to(['/tag', 'id' => $v['id']])?>"><span><?=$v['name']?></span></a>
                <?php } ?>
            </div>
        </div>
        <div class="category">
            <div class="title"><span>阅读排行</span></div>
            <ul>
                <?php foreach ($readRankingList as $k => $v) {?>
                <li><a href="<?=Url::to(['/detail', 'fmap' => $v['fmap'], 'id' => $v['id']])?>"><?=mb_substr($v['title'], 0 , 30, 'utf-8')?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
