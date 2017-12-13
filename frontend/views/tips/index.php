<?php
/**
 * 提示页
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-12-13 12:00:51
 * @version $Id$
 */

    $this->title = $errMsg.'-debugphp温馨提示';
    use yii\helpers\Url;
    \frontend\assets\AppAsset::addCss($this, 'css/style.css');
?>
<div class="wrap">
    <div class="tips-page">
        <p class="msg"><?=$errMsg?></p>
        <?php if(isset($redirect) && $redirect === true){ ?>
        <p class="redirect-tips"><span class="timeout"><?=isset($timeout) ? $timeout : 0?></span>s后将跳转至上一页面，如果没有跳转请点击<a href="javascript:history.back();">此处</a></p>
        <?php } ?>
    </div>
</div>
<?php $this->beginBlock('tipsJs'); ?>
$(document).ready(function(){
    var timeout = <?=isset($timeout) ? $timeout : 0?>;
    <?php if(isset($redirect) && $redirect === true){ ?>
    timer = setInterval(function () {
        if (timeout > 1) {
            timeout = timeout - 1;
            $('.timeout').text(timeout);
        }else {
           clearInterval(timer);
           <?php if(isset($redirectUrl) && $redirectUrl){ ?>
           window.location.href = '<?=$redirectUrl?>';
           <?php }else{ ?>
           history.back();
           <?php } ?>
       }
    }, 1000);
    <?php } ?>
})
<?php $this->endBlock(); ?>
<?php $this->registerJs($this->blocks['tipsJs'], \yii\web\View::POS_END); ?>