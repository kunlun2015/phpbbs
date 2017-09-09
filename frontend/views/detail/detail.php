<?php
/**
 * 详情
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-16 18:16
 * @version $Id$
 */

    $this->title = '详情';
    \frontend\assets\AppAsset::addCss($this, 'static/css/style.css');
    \frontend\assets\AppAsset::addScript($this, 'static/js/detail.js');
?>
<div class="wrap detail">
    <ul class="nav-title">
        <li><a href="">PHP技术</a></li>
        <li><a href="">PHP基础</a></li>
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
    </div>
    <div class="right">
        <div class="category">
            <div class="title"><span>热门标签</span></div>
            <div class="hot-tags">
                <a href=""><span>php高级编程</span></a>
                <a href=""><span>jquery</span></a>
                <a href=""><span>Mysql主从</span></a>
                <a href=""><span>环境搭建</span></a>
                <a href=""><span>php7</span></a>
                <a href=""><span>php高级编程</span></a>
            </div>
        </div>
        <div class="category">
            <div class="title"><span>阅读排行</span></div>
            <ul>
                <li>
                    <a href="">基础教程：svn命令在linux下的.</a>
                </li>
                <li><a href="">HTTP简介，http是一个属于应用.</a></li>
                <li><a href="">PHP漏洞全解(六)跨网站请求伪造.</a></li>
                <li><a href="">PHP学习路线以及10个PHP优化技.</a></li>
                <li><a href="">什么是CGI、FastCGI、PHP.</a></li>
                <li><a href="">基础教程：svn命令在linux下的.</a></li>
                <li><a href="">HTTP简介，http是一个属于应用.</a></li>
                <li><a href="">PHP漏洞全解(六)跨网站请求伪造.</a></li>
                <li><a href="">PHP学习路线以及10个PHP优化技.</a></li>
                <li><a href="">什么是CGI、FastCGI、PHP.</a></li>
            </ul>
        </div>
    </div>
</div>
