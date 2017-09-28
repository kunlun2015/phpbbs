/**
 * detail js
 * @authors Kunlun (szhcool1129@sina.com)
 * @date    2017-09-03 12:35:20
 * @version $Id$
 */
var apiUrl = '';
window._bd_share_config={
    "common":{
        "bdSnsKey":{},
        "bdText":"",
        "bdMini":"2",
        "bdMiniList":false,
        "bdPic":"",
        "bdStyle":"0",
        "bdSize":"32"
    },
    "share":{}
};
with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
$(document).ready(function(){
    //通用版块列表异步加载更多
    $('.btn-loading-more').click(function(){
        var _this = $(this);
        if(_this.data('page') >= _this.data('total') || _this.hasClass('loading')){
            return false;
        }
        $.ajax({
            url: apiUrl+'post/list',
            method: 'post',
            dataType: 'json',
            data: {fid: _this.data('fid'), page: _this.data('page')+1},
            beforeSend: function(){
                _this.text('加载中...');
            },
            success: function(res){
                if(res.code == 0){
                    $('.article-list').append(res.data.html);
                    _this.data('page', _this.data('page')+1);
                    if(_this.data('page')+1 >= _this.data('total')){
                        _this.remove();
                    }
                }else{
                    console.log('response error');
                }
            },
            complete: function(){
                _this.text('加载更多');
            }
        })
        return false;
    })
})