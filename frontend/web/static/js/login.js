/**
 * user login
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-23 18:14
 * @version $
 */
$(document).ready(function () {
    $("#login-form").validate({
        rules: {
            username: {
                required: !0
            },
            password: {
                required: !0
            }
        },
        messages: {
            username: {
                required: '用户名称不能为空'
            },
            password: {
                required: '请输入登录密码'
            }
        },
        errorLabelContainer: ".err-display",
        debug:true,
        showErrors: function (errorMap, errorList) {
            if(errorList.length > 0){
                $('.err-display').text(errorList[0].message);
            }else{
                $('.err-display').text('');
            }
            return false;
        },
        submitHandler: function () {
            console.log('ok')
            return false;
        }
    });
})