<?php
/**
 * 详情
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-16 18:16
 * @version $Id$
 */

    $this->title = $detail['title'].'-debugphp';
    use yii\helpers\Url;
    \frontend\assets\AppAsset::addCss($this, 'css/style.css');
    \frontend\assets\AppAsset::addCss($this, 'libs/syntaxHighlighter/shCore.css');
    \frontend\assets\AppAsset::addCss($this, 'libs/syntaxHighlighter/shThemeDefault.css');
    \frontend\assets\AppAsset::addScript($this, 'libs/syntaxHighlighter/script/shCore.js');
    \frontend\assets\AppAsset::addScript($this, 'libs/syntaxHighlighter/script/shAutoloader.js');
    \frontend\assets\AppAsset::addScript($this, 'js/post.js');

?>
<div class="wrap detail">
    <ul class="nav-title">
        <?php foreach($navTitleArr as $k => $v){ ?>
        <li><a href="<?=Url::to(['/'.$detail['fmap']])?>"><?=$v['name']?></a></li>
        <?php } ?>
    </ul>
    <div class="left">
        <div class="article">
            <p class="title"><?=$detail['title']?></p>
            <p class="article-attr">
                <span>来源：<?=$detail['author']?></span>
                <span>时间：<?=$detail['create_at']?></span>
                <span>阅读数：<?=$detail['views']?></span>
                <span>作者：<?=$detail['author']?></span>
            </p>
            <div class="abstract">
                <strong>摘要：</strong><?=$detail['abstract']?> ...
            </div>
            <div class="article-body"><?=$detail['posts']?></div>
        </div>
        <div class="share-btn">
            <div class="bdsharebuttonbox">
                <span>分享到：</span>
                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
            </div>
        </div>
        <div class="comment-box">
            <div id="SOHUCS" sid="<?=$detail['id']?>"></div>
            <script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
            <script type="text/javascript">
                window.changyan.api.config({
                    appid: 'cytm3wfWT',
                    conf: 'prod_df647135386f86264c1b288619d4c879'
                });
            </script>
        </div>
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
