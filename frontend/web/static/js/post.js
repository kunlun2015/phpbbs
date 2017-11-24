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
                _this.text('加载中...').addClass('loading');
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
                _this.text('加载更多').removeClass('loading');
            }
        })
        return false;
    })
    function path(){
        var args = arguments,
            result = [];
        for(var i = 0; i< args.length; i++)
            result.push(args[i].replace('@', '/static/libs/syntaxHighlighter/script/'));
        return result
    };    
    typeof(SyntaxHighlighter) === 'object' && SyntaxHighlighter.autoloader.apply(null, path(
            'applescript        @shBrushAppleScript.js',
            'actionscript3 as3      @shBrushAS3.js',
            'bash shell     @shBrushBash.js',
            'coldfusion cf      @shBrushColdFusion.js',
            'cpp c          @shBrushCpp.js',
            'c# c-sharp csharp      @shBrushCSharp.js',
            'css            @shBrushCss.js',
            'delphi pascal      @shBrushDelphi.js',
            'diff patch pas     @shBrushDiff.js',
            'erl erlang     @shBrushErlang.js',
            'groovy         @shBrushGroovy.js',
            'java           @shBrushJava.js',
            'jfx javafx     @shBrushJavaFX.js',
            'js jscript javascript  @shBrushJScript.js',
            'perl pl            @shBrushPerl.js',
            'php            @shBrushPhp.js',
            'text plain     @shBrushPlain.js',
            'py python          @shBrushPython.js',
            'ruby rails ror rb      @shBrushRuby.js',
            'sass scss          @shBrushSass.js',
            'scala          @shBrushScala.js',
            'sql            @shBrushSql.js',
            'vb vbnet           @shBrushVb.js',
            'xml xhtml xslt html        @shBrushXml.js'
        )
    );
    typeof(SyntaxHighlighter) === 'object' && SyntaxHighlighter.all();

})