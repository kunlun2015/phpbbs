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
        <div class="top">           
            <div class="logo"></div>
            <div class="g-search">
                <form action="" method="get">
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
<?php echo $this->render('footer')?>
</body>
</html>
<?php $this->endPage() ?>
