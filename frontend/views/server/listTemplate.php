<?php
/**
 * server list template
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-09-28 12:32:33
 * @version $Id$
 */
    use yii\helpers\Url;
?>
<?php foreach ($postsList as $k => $v) {?>
<li>
    <?php if($v['thumbnail']){ ?>
    <div class="thumb pic-style">                   
        <img src="<?=Yii::$app->params['imgUrl']?><?=$v['thumbnail']?>" alt="<?=$v['title']?>">
        <div class="pic-style-text">
            <p><?=$v['lname']?></p>
            <a href="<?=Url::to(['/detail', 'fmap' => $v['fmap'], 'id' => $v['id']])?>" target="_blank">debugphp.com</a>
        </div>
    </div>
    <?php } ?>
    <div class="article-info">
        <p class="title"><a href="<?=Url::to(['/detail', 'fmap' => $v['fmap'], 'id' => $v['id']])?>"><?=$v['title']?></a></p>
        <p class="abstract"><?=$v['abstract']?></p>
        <div class="attr">
            <span>来源：管理员</span>
            <span>时间：<?=$v['create_at']?></span>
            <span>阅读数：<?=$v['views']?></span>
            <span>作者：<?=$v['author']?></span>
        </div>
    </div>
</li>
<?php } ?>