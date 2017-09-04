/**
 * register
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-09-01 10:53:53
 * @version $Id$
 */
$(document).ready(function () {
    $("#register-form").validate({
        rules: {
            username: {
                required: !0,
                maxlength: 8
            },
            email: {
                required: !0,
                email: !0
            },
            password: {
                required: !0
            },
            password_confirm: {
                equalTo: "input[name='password']",
            }
        },
        messages: {
            username: {
                required: '用户名称不能为空',
                maxlength: '用户名不能多于8个字符'
            },
            email: {
                required: '电子邮箱不能为空',
                email: '请正确输入您的邮箱地址'
            },
            password: {
                required: '请输入登录密码'
            },
            password_confirm: {
                equalTo: '两次密码输入不一致',
            }
        },   
        submitHandler: function () {
           $.ajax({
                url: 'register/save',
                dataType: 'json',
                type: 'post', 
                data: $("#register-form").serialize(),
                beforeSend: function(){

                },
                success: function(res){

                }

           })
            return false;
        }
    });
})