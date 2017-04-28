/**
 * category manage
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-27 09:09:12
 * @version $Id$
 */
$(document).ready(function(){
    var e = $(".add-category-form"),
    r = $(".alert-danger", e),
    i = $(".alert-success", e);
    e.validate({
        errorElement: "span",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        ignore: "",
        messages: {
            name: {
                required: '分类名称不能为空'
            },
            sort: {
                number: '排序只能为数字'
            }
        },
        rules: {
            name: {
                required: !0
            },
            sort: {
                number: true
            }
        },
        invalidHandler: function(e, t) {
            i.hide(),
            r.show(),
            App.scrollTo(r, -200)
        },
        highlight: function(e) {
            $(e).closest(".form-group").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group").removeClass("has-error")
        },
        success: function(e) {
            e.closest(".form-group").removeClass("has-error")
        },
        submitHandler: function(e) {
            i.show(),
            r.hide()
            if(!$('#begin_time').val()){
                layer.alert('请选择有效期的开始时间', {title: siteName+'提示您：', icon: 1}, function(index){
                    $('#begin_time').click();
                    layer.close(index);
                });
                return false;
            }
            if(!$('#end_time').val()){
                layer.alert('请选择有效期的结束时间', {title: siteName+'提示您：', icon: 1}, function(index){
                    $('#end_time').click();
                    layer.close(index);
                });
                return false;
            }
            $.ajax({
                url: $("input[name=request_url]").val(),
                type: 'post',
                dataType: 'json',
                data: $('.add-banner-form').serialize(),
                success: function(res){
                    if(res.code == 0){
                        layer.alert(res.msg, {title: siteName+'提示您：', icon: 1}, function(index){
                            window.location.href = res.data.url;
                        });
                    }else{
                        layer.alert(res.msg, {title: siteName+'提示您：', icon: 2});
                    }
                }
            })
        }
    })
})