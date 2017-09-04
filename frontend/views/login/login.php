<?php
/**
 * 用户登录
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-16 18:34
 * @version $Id$
 */
use yii\helpers\Html;
use yii\helpers\Url;
\frontend\assets\AppAsset::register($this);
\frontend\assets\AppAsset::addCss($this, 'static/css/login.css');
\frontend\assets\AppAsset::addScript($this, 'static/libs/jquery/jquery.validate.min.js');
\frontend\assets\AppAsset::addScript($this, 'static/js/login.js');
$this->title = '用户登录';
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
<?php $this->beginBody() ?>
    <header>
        <div class="header">
            <div class="logo"></div>
            <div class="page-func">用户登陆</div>
        </div>
    </header>
    <div class="login-wrap">
        <div class="wrap">
            <div class="desc">
                <img src="./static/images/php-1.jpg" alt="">
            </div>
            <div class="login-box">
                <div class="box-title">账号登陆</div>
                <form id="login-form" action="#" method="post">
                    <input type="text" name="username" placeholder="用户名">
                    <input type="password" name="password" placeholder="登陆密码">
                    <div class="reg-tips">还没有账号，去<a href="<?=Url::to(['/register'])?>">注册</a></div>
                    <div class="err-display"></div>
                    <input class="btn" type="submit" value="登陆">
                </form>
            </div>
        </div>
    </div>
<?php $this->endBody() ?>
<?php echo $this->render('../layouts/footer')?>
</body>
</html>
<?php $this->endPage() ?>
