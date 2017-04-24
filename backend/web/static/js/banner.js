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
    $('#banner-file-input').change(function(){
        lrz(this.files[0], {quality: 1})
            .then(function (rst) {
                $('#img-preview').attr('src', rst.base64);
                $('#img-preview').attr('width', '100%');
                return rst;
            })
            .then(function (rst) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', $("input[name=request_url]").val());

                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // 上传成功
                    } else {
                        // 处理其他情况
                    }
                };

                xhr.onerror = function () {
                    // 处理错误
                };

                xhr.upload.onprogress = function (e) {
                    // 上传进度
                    var percentComplete = ((e.loaded / e.total) || 0) * 100;
                    console.log(percentComplete);
                };

                // 添加参数
                rst.formData.append('fileLen', rst.fileLen);
                rst.formData.append('act', 'uploadImg');
                rst.formData.append($('#csrf').attr('name'), $('#csrf').val());

                // 触发上传
                xhr.send(rst.formData);

                return rst;
            })
            .catch(function (err) {

            })
            .always(function () {

            });
    })
})