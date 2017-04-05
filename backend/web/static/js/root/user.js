/**
 * 用户管理
 * @authors Amos (735767227@qq.com)
 * @date    2017-03-28 14:42:44
 * @version $Id$
 */

$(document).ready(function(){
    $("#sample_1").dataTable({
        bPaginate: false,
        bInfo: false,
        bFilter: false,
        language: {
            emptyTable: "暂无用户数据" 
        },
        columnDefs: [{
            orderable: !1,
            targets: [0]
        }],
        order: []
    });
    //添加用户
    var e = $(".add-user-form"),
    r = $(".alert-danger", e),
    i = $(".alert-success", e);
    e.validate({
        errorElement: "span",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        ignore: "",
        messages: {
            username:{
                required: '请输入要添加的用户名',
                minlength: '用户名不能少于4位'
            },
            password: {
                required: '您输入新的登录密码',
                minlength: '密码不能少于6位字符'
            },
            password_confirm: {
                equalTo: '两次登陆密码不一致' 
            }
        },
        rules: {
            username: {
                required: !0,
                minlength: 4
            },
            password: {
                required: !0,
                minlength: 6
            },
            password_confirm: {
                equalTo: '#password'
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
            $.ajax({
                url: $("input[name=request_url]").val(),
                type: 'post',
                dataType: 'json',
                data: $('.add-user-form').serialize(),
                success: function(res){
                    if(res.code == 0){
                        layer.alert(res.msg, {title: siteName+'提示您：', icon: 1});
                    }else{
                        layer.alert(res.msg, {title: siteName+'提示您：', icon: 2});
                    }
                }
            })
        }
    })

});