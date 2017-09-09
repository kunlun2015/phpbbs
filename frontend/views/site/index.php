<?php
    $this->title = 'Debug PHP';
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
            <li>
                <p class="title">
                    <a href="">新闻APP后端系统架构成长之路 - 高可用架构设计</a>
                </p>
                <div class="abstract">
                    一年来从接受APP后端工作到现在可谓一路艰辛，中间踏过无数坑坑洼洼，也从中学到很 [<a href="">详情</a>]
                </div>
            </li>
            <li>
                <p class="title">
                    <a href="">PHP基础： CLI模式开发不需要任何一种Web服务器</a>
                </p>
                <div class="abstract">
                    PHP CLI模式开发不需要任何一种Web服务器（包括Apache或MS IIS [<a href="">详情</a>]
                </div>
            </li>
        </ul>
        <ul class="list">
            <li>
                <a href="">Serverless技术架构，传说中的FAAS（Func.</a>
            </li>
            <li><a href="">PHP漏洞全解(六)跨网站请求伪造.</a></li>
            <li><a href="">php 获取今日、昨日、上周、本月的起始时间戳</a></li>
            <li><a href="">PHP学习路线以及10个PHP优化技巧.</a></li>
            <li><a href="">适用于PHP初学者的学习线路和建议.</a></li>
            <li><a href="">什么是CGI、FastCGI、PHP-CGI、PHP-F.</a></li>
            <li><a href="">PHP多种序列化/反序列化的方法.</a></li>
            <li><a href="">PHP开发的发展现状和前景.</a></li>
        </ul>
    </div>
    <div class="hot-recomment-d">
        <ul>
            <li>[<a class="cate-a" href="">Linux命令</a>]<a href="">基础教程：svn命令在linux下的.</a></li>
            <li>[<a class="cate-a" href="">简介</a>]<a href="">HTTP简介，http是一个属于应用.</a></li>
            <li>[<a class="cate-a" href="">跨站攻击</a>]<a href="">PHP漏洞全解(六)跨网站请求伪造.</a></li>
            <li>[<a class="cate-a" href="">职场攻略</a>]<a href="">PHP学习路线以及10个PHP优化技.</a></li>
            <li>[<a class="cate-a" href="">面向对象</a>]<a href="">什么是CGI、FastCGI、PHP.</a></li>
        </ul>
        <ul>
            <li>[<a class="cate-a" href="">Linux命令</a>]<a href="">基础教程：svn命令在linux下的.</a></li>
            <li>[<a class="cate-a" href="">简介</a>]<a href="">HTTP简介，http是一个属于应用.</a></li>
            <li>[<a class="cate-a" href="">跨站攻击</a>]<a href="">PHP漏洞全解(六)跨网站请求伪造.</a></li>
            <li>[<a class="cate-a" href="">职场攻略</a>]<a href="">PHP学习路线以及10个PHP优化技.</a></li>
            <li>[<a class="cate-a" href="">面向对象</a>]<a href="">什么是CGI、FastCGI、PHP.</a></li>
        </ul>
    </div>
</div>
<div class="category-recommend clearfix">
    <div class="recommend-l">        
        <ul class="article-list">
            <li>
                <div class="thumb">
                    <a href=""><img src="http://static.bbs.nubia.cn/portal/201708/29/101154jwxq1odnogs1zfhv.jpg" alt=""></a>
                </div>
                <div class="article-info">
                    <p class="title"><a href="">Apache Flink 技术解读之分布式运行时环境</a></p>
                    <p class="abstract">任务与运算符链接在实际的分布式计算环境中，Flink 会将多个运算子任务链接到分布式计算任务中。每个线程执行一个计算任务。将运算符链接到计算任务中对于系统性能的提升有很大的帮助：它降低了线程间切换与缓冲的开</p>
                    <div class="attr">
                        <span>来源：管理员</span>
                        <span>时间：2017-08-18</span>
                        <span>阅读数：150</span>
                        <span>作者：Kunlun</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="article-info">
                    <p class="title"><a href="">Apache Flink 技术解读之分布式运行时环境</a></p>
                    <p class="abstract">任务与运算符链接在实际的分布式计算环境中，Flink 会将多个运算子任务链接到分布式计算任务中。每个线程执行一个计算任务。将运算符链接到计算任务中对于系统性能的提升有很大的帮助：它降低了线程间切换与缓冲的开</p>
                    <div class="attr">
                        <span>来源：管理员</span>
                        <span>时间：2017-08-18</span>
                        <span>阅读数：150</span>
                        <span>作者：Kunlun</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="article-info">
                    <p class="title"><a href="">Apache Flink 技术解读之分布式运行时环境</a></p>
                    <p class="abstract">任务与运算符链接在实际的分布式计算环境中，Flink 会将多个运算子任务链接到分布式计算任务中。每个线程执行一个计算任务。将运算符链接到计算任务中对于系统性能的提升有很大的帮助：它降低了线程间切换与缓冲的开</p>
                    <div class="attr">
                        <span>来源：管理员</span>
                        <span>时间：2017-08-18</span>
                        <span>阅读数：150</span>
                        <span>作者：Kunlun</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="article-info">
                    <p class="title"><a href="">Apache Flink 技术解读之分布式运行时环境</a></p>
                    <p class="abstract">任务与运算符链接在实际的分布式计算环境中，Flink 会将多个运算子任务链接到分布式计算任务中。每个线程执行一个计算任务。将运算符链接到计算任务中对于系统性能的提升有很大的帮助：它降低了线程间切换与缓冲的开</p>
                    <div class="attr">
                        <span>来源：管理员</span>
                        <span>时间：2017-08-18</span>
                        <span>阅读数：150</span>
                        <span>作者：Kunlun</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="article-info">
                    <p class="title"><a href="">Apache Flink 技术解读之分布式运行时环境</a></p>
                    <p class="abstract">任务与运算符链接在实际的分布式计算环境中，Flink 会将多个运算子任务链接到分布式计算任务中。每个线程执行一个计算任务。将运算符链接到计算任务中对于系统性能的提升有很大的帮助：它降低了线程间切换与缓冲的开</p>
                    <div class="attr">
                        <span>来源：管理员</span>
                        <span>时间：2017-08-18</span>
                        <span>阅读数：150</span>
                        <span>作者：Kunlun</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="recommend-r">
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
            <div class="title"><span>行业资讯</span></div>
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