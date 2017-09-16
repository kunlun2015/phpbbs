<?php
    $this->title = 'Debug PHP';
    use yii\helpers\Url;
    \frontend\assets\AppAsset::addCss($this, 'static/css/style.css');
    \frontend\assets\AppAsset::addCss($this, 'static/libs/swiper/css/swiper.min.css');
    \frontend\assets\AppAsset::addScript($this, 'static/libs/swiper/js/swiper.jquery.min.js');
    \frontend\assets\AppAsset::addScript($this, 'static/js/index.js');
?>
<div class="hot-recommend clearfix">
    <div class="slide-wrap">
        <div class="swiper-wrapper">
            <?php foreach ($bannerList as $k => $v) { ?>
            <a href="" class="slide swiper-slide">
            <div class="swiper-slide">
                <img src="<?=Yii::$app->params['imgUrl'].$v['picture']?>" alt="">
                <span class="title"><?=$v['title']?></span>
            </div>
            </a>
            <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="hot-recomment-r">
        <ul class="top">
            <?php foreach ($topRightTopList as $k => $v) {?>
            <li>
                <p class="title">
                    <a href="<?=Url::to(['/detail', 'id' => $v['id']])?>"><?=$v['title']?></a>
                </p>
                <div class="abstract">
                    <?=mb_substr($v['abstract'], 0, 60, 'utf-8')?> [<a href="<?=Url::to(['/detail', 'id' => $v['id']])?>">详情</a>]
                </div>
            </li>
            <?php } ?>
        </ul>
        <ul class="list">
            <?php foreach ($topRightBottomList as $k => $v) {?>
            <li><a href="<?=Url::to(['/detail', 'id' => $v['id']])?>"><?=$v['title']?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="hot-recomment-d">
        <ul>
            <?php foreach ($leftTopList as $k => $v) {?>
        <?php if($k === 5) echo '<ul>' ?>
            <li>[<a class="cate-a" href=""><?=$v['lname']?></a>]<a href="<?=Url::to(['/detail', 'id' => $v['id']])?>"><?=mb_substr($v['title'], 0, 20, 'utf-8')?></a></li>
        <?php if(count($leftTopList) > 5 && $k === 4) echo '</ul>' ?>        
            <?php } ?>
        </ul>
    </div>
</div>
<div class="category-recommend clearfix">
    <div class="recommend-l">        
        <ul class="article-list">
            <?php foreach ($leftList as $k => $v) {?>
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
    </div>
    <div class="recommend-r">
        <div class="category">
            <div class="title"><span>热门标签</span></div>
            <div class="hot-tags">
                <?php foreach($tagsList as $k => $v){?>              
                <a href=""><span><?=$v['name']?></span></a>
                <?php } ?>
            </div>
        </div>
        <div class="category">
            <div class="title"><span>行业资讯</span></div>
            <ul>
                <?php foreach ($industryNews as $k => $v) {?>
                <li><a href="<?=Url::to(['/detail', 'id' => $v['id']])?>"><?=$v['title']?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>