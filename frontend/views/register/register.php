<?php
/**
 * 用户注册
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-09-01 10:40:14
 * @version $Id$
 */
use yii\helpers\Html;
use yii\helpers\Url;
\frontend\assets\AppAsset::register($this);
\frontend\assets\AppAsset::addCss($this, 'css/register.css');
\frontend\assets\AppAsset::addScript($this, 'libs/jquery/jquery.validate.min.js');
\frontend\assets\AppAsset::addScript($this, 'js/register.js');
$this->title = '用户注册';
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
            <div class="page-func">用户注册</div>
        </div>
    </header>
    <div class="register-wrap">
        <div class="register-box">
            <div class="register-form">
                <form action="" method="post" id="register-form">
                    <div class="login-btn">已有账号?去<a href="<?=Url::to(['/login'])?>">登录</a></div>
                    <ul>
                        <li>
                            <span>用户名</span>
                            <input type="text" name="username" placeholder="请输入用户名">
                        </li>
                        <li>
                            <span>手机号码</span>
                            <input type="text" name="mobile" placeholder="请输入手机号码">
                        </li>
                        <li>
                            <span>E-mail</span>
                            <input type="text" name="email" placeholder="请输入E-mail">
                        </li>
                        <li>
                            <span>登录密码</span>
                            <input type="password" name="password" placeholder="请输入登录密码">
                        </li>
                        <li>
                            <span>确认密码</span>
                            <input type="password" name="password_confirm" placeholder="请再次输入登录密码">
                        </li>
                        <li class="submit-btn-container">
                            <input type="submit" value="提 交">
                        </li>
                    </ul>
                </form>
            </div>
            <div class="desc">
                <img src="./static/images/php-1.jpg" alt="">
            </div>
        </div>        
    </div>
<?php $this->endBody() ?>
<?php echo $this->render('../layouts/footer')?>
</body>
</html>
<?php $this->endPage() ?>
