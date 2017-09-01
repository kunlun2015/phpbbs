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
\frontend\assets\AppAsset::addCss($this, 'static/css/register.css');
\frontend\assets\AppAsset::addScript($this, 'static/libs/jquery/jquery.validate.min.js');
\frontend\assets\AppAsset::addScript($this, 'static/js/register.js');
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
        <div class="register-form">
            <form action="" method="post">
                <ul>
                    <li>
                        <span>用户名</span>
                        <input type="text" name="username" placeholder="用户名">
                    </li>
                </ul>
            </form>
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
