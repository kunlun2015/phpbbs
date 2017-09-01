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
        <div class="top"></div>
        <div class="menu">
            <ul class="clearfix">
                <li>
                    <a href="<?=Url::to(['/']);?>">首页</a>                
                </li>            
                <li><a href="<?=Url::to(['/php'])?>">PHP技术</a></li>
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
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
<footer class="footer">    
    <div class="footer-wrap">
        <div class="link">
            <a href="">关于debugphp</a>
            <a href="">联系我们</a>
            <a href="">网站地图</a>
        </div>
        <p class="copyright">Copyright © 2017-2017 <a href="">www.debugphp.com</a>  All Rights Reserved</p>
        <p class="copyright">皖ICP备15003242号-1</p>
    </div>
</footer>
</body>
</html>
<?php $this->endPage() ?>
