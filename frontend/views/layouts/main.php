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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
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
                    <a href="<?=Url::to(['/']);?>">首页</a>                
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
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
<div class="footer">
    
</div>
</body>
</html>
<?php $this->endPage() ?>
