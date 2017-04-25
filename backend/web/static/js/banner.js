/**
 * banner管理
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-24 13:47:16
 * @version $Id$
 */
$(document).ready(function(){
    
    //选择轮播图片
    $('.select-banner-img').click(function(){
        $('#banner-file-input').click();
    })
    //上传banner轮播图
    var precessLayer;
    var uploadBannerFormData = {act: 'uploadImg'};
    uploadBannerFormData[$('#csrf').attr('name')] = $('#csrf').val();
    "undefined" != typeof addPage && $('#banner-file-input').fileupload({
        url: $("input[name=request_url]").val(),
        dataType: 'json',
        formData: uploadBannerFormData,
        add: function(e, data){
            precessLayer = layer.open({
                                  type: 1,
                                  title: false,
                                  closeBtn: 0,
                                  area: ['500px', '80px'], //宽高
                                  content: '<div class="upload-process"><div class="title">文件正在上传请稍候</div><div class="process-bar"><div class="progress-precent"></div></div></div>'
                                });
            data.submit();
        },
        done: function (e, res) {
            if(res.result.code === 0){
                layer.close(precessLayer);
                $('#img-preview').attr('src', res.result.data.url);
                $('#img-preview').attr('max-width', '100%');
                $('#picture').val(res.result.data.path);
            }else{

            }
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('.upload-process .progress-precent').css('width', progress+'%');
            $('.upload-process .progress-precent').text(progress+'%');
        }
    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');

    //提交banner    
    var e = $(".add-banner-form"),
    r = $(".alert-danger", e),
    i = $(".alert-success", e);
    e.validate({
        errorElement: "span",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        ignore: "",
        messages: {
            title: {
                required: '轮播图标题不能为空'
            },
            href: {
                required: '请填写跳转链接'
            },
            picture: {
                required: '请上传一张轮播图'
            }
        },
        rules: {
            title: {
                required: !0
            },
            href: {
                required: !0
            },
            picture: {
                required: !0
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
    //编辑banner
    var e = $(".edit-banner-form"),
    r = $(".alert-danger", e),
    i = $(".alert-success", e);
    e.validate({
        errorElement: "span",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        ignore: "",
        messages: {
            title: {
                required: '轮播图标题不能为空'
            },
            href: {
                required: '请填写跳转链接'
            },
            picture: {
                required: '请上传一张轮播图'
            }
        },
        rules: {
            title: {
                required: !0
            },
            href: {
                required: !0
            },
            picture: {
                required: !0
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
                data: $('.edit-banner-form').serialize(),
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