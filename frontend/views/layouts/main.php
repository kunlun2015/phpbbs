<?php
/**
 * 站点主布局
 */
use yii\helpers\Html;
use yii\helpers\Url;
\frontend\assets\AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="keywords" content="php,debugphp,调试php,php教程,php技术,php资讯,服务器,linux,mysql,php框架,web,前端开发,js,jquery" />
    <meta name="description" content="debugphp是中国最大的php技术类分享平台，提供php等相关技术的分享、教程的演示、问题答疑以及互联网行业内资讯的快递等，旨在为php初学者及开发者提供一些常见问题的解决方案。" />
    <meta name="author" content="debugphp" />
    <meta name="copyright" content="Copyright 2017-<?=date('Y')?>. www.debugphp.com . All Rights Reserved." />
    <meta name="application-name" content="debugphp" />
    <?php $this->head() ?>
</head>
<body>
    <header class="common-header">
        <div class="top-bar">
            <div class="top-bar-info clearfix">
                <div class="login">
                    <a href="<?=Url::to(['/register'])?>">注册</a> | 
                    <a href="<?=Url::to(['/login'])?>">登陆</a>
                </div>
            </div>
        </div>
        <div class="top">           
            <div class="logo"></div>
            <div class="g-search">
                <form action="/search" method="get">
                    <input type="text" name="keywords" id="keywords" placeholder="请输入搜索关键字">
                    <input class="btn" type="submit" value="搜索">
                </form>                
            </div>
        </div>
        <div class="menu">
            <ul class="clearfix">
                <li>
                    <a href="<?=Url::to(['/']);?>">首页</a>                
                </li>            
                <li><a href="<?=Url::to(['/php'])?>">PHP技术</a></li>
                <li><a href="<?=Url::to(['/db'])?>">数据库</a></li>
                <li><a href="<?=Url::to(['/server'])?>">服务器</a></li>
                <li><a href="<?=Url::to(['/frame'])?>">PHP框架</a></li>
                <li>
                    <a href="<?=Url::to(['/web'])?>">前端开发</a>
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
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
<?php echo $this->render('footer')?>
</body>
</html>
<?php $this->endPage() ?>
