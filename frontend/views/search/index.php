<?php
/**
 * 搜索结果页
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-12-13 10:33:43
 * @version $Id$
 */
use yii\helpers\Html;
use yii\helpers\Url;
\frontend\assets\AppAsset::register($this);
\frontend\assets\AppAsset::addCss($this, 'css/style.css');
\frontend\assets\AppAsset::addScript($this, 'libs/jquery/jquery.validate.min.js');
$this->title = '搜索结果页';
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
    <div class="search-header">           
        <div class="logo"></div>
        <div class="g-search">
            <form action="/search" method="get">
                <input type="text" name="keywords" value="<?=$keywords?>" id="keywords" placeholder="请输入搜索关键字">
                <input class="btn" type="submit" value="搜索">
            </form>                
        </div>
    </div>
    <div class="search-wrap">
        <ul class="search-result-list article-list">
            <?=$this->render('listTemplate', ['postsList' => $list, 'keywords' => $keywords])?>
        </ul>
    </div>    
<?php $this->endBody() ?>
<?php echo $this->render('../layouts/footer')?>
</body>
</html>
<?php $this->endPage() ?>