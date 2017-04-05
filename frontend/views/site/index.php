<?php
    $this->title = 'PHP';
    \frontend\assets\AppAsset::addCss($this, 'static/css/index.css');
    \frontend\assets\AppAsset::addCss($this, 'static/libs/swiper/css/swiper.min.css');
    \frontend\assets\AppAsset::addScript($this, 'static/libs/swiper/js/swiper.jquery.min.js');
    \frontend\assets\AppAsset::addScript($this, 'static/js/index.js');
?>
<header class="common-header">
    <div class="top-bar">
        <div class="top-bar-info clearfix">
            <div class="login">
                <a href="">注册</a> | 
                <a href="">登陆</a>
            </div>
        </div>
    </div>
    <div class="top"></div>
    <div class="menu">
        <ul class="clearfix">
            <li>
                <a href="">首页</a>                
            </li>            
            <li><a href="">PHP技术</a></li>
            <li><a href="">数据库</a></li>
            <li><a href="">服务器</a></li>
            <li><a href="">PHP框架</a></li>
            <li>
                <a href="">前端开发</a>
                <ul class="sub">
                    <li><a href="">JS/Jquery</a></li>
                    <li><a href="">HTML5</a></li>
                    <li><a href="">CSS3</a></li>
                    <li><a href="">Angularjs</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>
<div class="hot-recommend clearfix">
    <div class="slide-wrap">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide">
                <a href=""><img src="static/images/test.jpg" alt=""><span class="title">新闻APP后端系统架构成长之路 - 高可用架构设计</span></a>
                
            </div>
            <div class="swiper-slide"><a href=""><img src="static/images/test.jpg" alt=""><span class="title">新闻APP后端系统架构成长之路 - 高可用架构设计</span></a></div>
            <div class="swiper-slide"><a href=""><img src="static/images/test.jpg" alt=""><span class="title">新闻APP后端系统架构成长之路 - 高可用架构设计</span></a></div>
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
        <div class="category">
            <div class="title"><span>PHP技术</span></div>
            <ul>
                <li>[<a class="cate-a" href="">Linux命令</a>]<a href="">基础教程：svn命令在linux下的.</a></li>
                <li>[<a class="cate-a" href="">简介</a>]<a href="">HTTP简介，http是一个属于应用.</a></li>
                <li>[<a class="cate-a" href="">跨站攻击</a>]<a href="">PHP漏洞全解(六)跨网站请求伪造.</a></li>
                <li>[<a class="cate-a" href="">职场攻略</a>]<a href="">PHP学习路线以及10个PHP优化技.</a></li>
                <li>[<a class="cate-a" href="">面向对象</a>]<a href="">什么是CGI、FastCGI、PHP.</a></li>
            </ul>
        </div>
        <div class="category ml-20">
            <div class="title"><span>数据库</span></div>
            <ul>
                <li>[<a class="cate-a" href="">Linux命令</a>]<a href="">基础教程：svn命令在linux下的.</a></li>
                <li>[<a class="cate-a" href="">简介</a>]<a href="">HTTP简介，http是一个属于应用.</a></li>
                <li>[<a class="cate-a" href="">跨站攻击</a>]<a href="">PHP漏洞全解(六)跨网站请求伪造.</a></li>
                <li>[<a class="cate-a" href="">职场攻略</a>]<a href="">PHP学习路线以及10个PHP优化技.</a></li>
                <li>[<a class="cate-a" href="">面向对象</a>]<a href="">什么是CGI、FastCGI、PHP.</a></li>
            </ul>
        </div>
        <div class="category mt-10">
            <div class="title"><span>服务器</span></div>
            <ul>
                <li>[<a class="cate-a" href="">Linux命令</a>]<a href="">基础教程：svn命令在linux下的.</a></li>
                <li>[<a class="cate-a" href="">简介</a>]<a href="">HTTP简介，http是一个属于应用.</a></li>
                <li>[<a class="cate-a" href="">跨站攻击</a>]<a href="">PHP漏洞全解(六)跨网站请求伪造.</a></li>
                <li>[<a class="cate-a" href="">职场攻略</a>]<a href="">PHP学习路线以及10个PHP优化技.</a></li>
                <li>[<a class="cate-a" href="">面向对象</a>]<a href="">什么是CGI、FastCGI、PHP.</a></li>
            </ul>
        </div>
        <div class="category ml-20 mt-10">
            <div class="title"><span>PHP框架</span></div>
            <ul>
                <li>[<a class="cate-a" href="">Linux命令</a>]<a href="">基础教程：svn命令在linux下的.</a></li>
                <li>[<a class="cate-a" href="">简介</a>]<a href="">HTTP简介，http是一个属于应用.</a></li>
                <li>[<a class="cate-a" href="">跨站攻击</a>]<a href="">PHP漏洞全解(六)跨网站请求伪造.</a></li>
                <li>[<a class="cate-a" href="">职场攻略</a>]<a href="">PHP学习路线以及10个PHP优化技.</a></li>
                <li>[<a class="cate-a" href="">面向对象</a>]<a href="">什么是CGI、FastCGI、PHP.</a></li>
            </ul>
        </div>
    </div>
    <div class="recommend-r">
        <div class="category">
            <div class="title"><span>行业资讯</span></div>
            <ul>
                <li><a href="">基础教程：svn命令在linux下的.</a></li>
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