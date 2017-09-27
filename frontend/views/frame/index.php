<?php
/**
 * php版块
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-09-23 12:23:18
 * @version $Id$
 */

    $this->title = 'php框架';
    use yii\helpers\Url;
    \frontend\assets\AppAsset::addCss($this, 'static/css/style.css');
    \frontend\assets\AppAsset::addScript($this, 'static/js/detail.js');
?>
<div class="wrap detail">
    <ul class="nav-title">
        <?php foreach($navTitleArr as $k => $v){ ?>
        <li><a href=""><?=$v['name']?></a></li>
        <?php } ?>
    </ul>
    <div class="left">
        <ul class="article-list">
            <?php foreach ($postsList as $k => $v) {?>
            <li>
                <?php if($v['thumbnail']){ ?>
                <div class="thumb pic-style">                   
                    <img src="<?=Yii::$app->params['imgUrl']?><?=$v['thumbnail']?>" alt="<?=$v['title']?>">
                    <div class="pic-style-text">
                        <p><?=$v['lname']?></p>
                        <a href="<?=Url::to(['/detail', 'id' => $v['id']])?>" target="_blank">debugphp.com</a>
                    </div>
                </div>
                <?php } ?>
                <div class="article-info">
                    <p class="title"><a href="<?=Url::to(['/detail', 'id' => $v['id']])?>"><?=$v['title']?></a></p>
                    <p class="abstract"><?=$v['abstract']?></p>
                    <div class="attr">
                        <span>来源：管理员</span>
                        <span>时间：<?=$v['create_at']?></span>
                        <span>阅读数：<?=$v['views']?></span>
                        <span>作者：<?=$v['author']?></span>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
        <div class="btn-loading-more loading">加载更多</div>
    </div>
    <div class="right">
        <div class="category">
            <div class="title"><span>热门标签</span></div>
            <div class="hot-tags">
                <?php foreach($tagsList as $k => $v){?>              
                <a href=""><span><?=$v['name']?></span></a>
                <?php } ?>
            </div>
        </div>
        <div class="category">
            <div class="title"><span>阅读排行</span></div>
            <ul>
                <?php foreach ($readRankingList as $k => $v) {?>
                <li><a href="<?=Url::to(['/detail', 'id' => $v['id']])?>"><?=mb_substr($v['title'], 0 , 30, 'utf-8')?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
