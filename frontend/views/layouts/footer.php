<?php
/**
 * 通用footer
 * @authors Kunlun (szhcool1129@sina.com)
 * @date    2017-09-04 12:02:44
 * @version $Id$
 */
    use yii\helpers\Url;
?>
<footer class="footer">    
    <div class="footer-wrap">
        <div class="link">
            <a href="<?=Url::to(['/about/debugphp'])?>">关于debugphp</a>
            <a href="<?=Url::to(['/about/contact'])?>">联系我们</a>
            <a href="<?=Url::to(['/about/feedback'])?>">意见反馈</a>
            <a href="<?=Url::to(['/about/exemption'])?>">免责声明</a>
            <a href="<?=Url::to(['/about/sitemap'])?>">网站地图</a>
            <a href="<?=Url::to(['/about/experience'])?>">发展经历</a>
        </div>
        <p class="copyright">Copyright © 2017-<?=date('Y')?> <a href="<?=Url::to(['/']);?>">www.debugphp.com</a>  All Rights Reserved</p>
        <p class="copyright"><a href="http://www.miitbeian.gov.cn/">皖ICP备15003242号-3</a></p>
    </div>
</footer>
<script>
   var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1271432715'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/z_stat.php%3Fid%3D1271432715%26show%3Dpic' type='text/javascript'%3E%3C/script%3E")); 
</script>