<?php
/**
 * commonPageLefNav
 * @authors Kunlun (szhcool1129@sina.com)
 * @date    2017-09-24 08:32:51
 * @version $Id$
 */
    use yii\helpers\Url;
?>
<ul class="nav-title">
    <li><a href="<?=Url::to(['/'])?>">首页</a></li>
    <li><?=$title?></li>
</ul>
<div class="left-nav">
    <ul>
        <li<?php if (Yii::$app->controller->action->id == 'debugphp'){ ?> class="active"<?php } ?>>
            <a href="<?=Url::to(['/about/debugphp'])?>">关于debugphp</a>
        </li>
        <li<?php if (Yii::$app->controller->action->id == 'contact'){ ?> class="active"<?php } ?>>
            <a href="<?=Url::to(['/about/contact'])?>">联系我们</a>
        </li>
        <li<?php if (Yii::$app->controller->action->id == 'feedback'){ ?> class="active"<?php } ?>>
            <a href="<?=Url::to(['/about/feedback'])?>">意见反馈</a>
        </li>
        <li<?php if (Yii::$app->controller->action->id == 'exemption'){ ?> class="active"<?php } ?>>
            <a href="<?=Url::to(['/about/exemption'])?>">免责声明</a>
        </li>
        <li<?php if (Yii::$app->controller->action->id == 'sitemap'){ ?> class="active"<?php } ?>>
            <a href="<?=Url::to(['/about/sitemap'])?>">网站地图</a>
        </li>
        <li<?php if (Yii::$app->controller->action->id == 'experience'){ ?> class="active"<?php } ?>>
            <a href="<?=Url::to(['/about/experience'])?>">发展经历</a>
        </li>
    </ul>
</div>