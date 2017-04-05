/**
 * common js
 * @authors Amos (735767227@qq.com)
 * @date    2017-03-15 14:16:47
 * @version $Id$
 */

$('.menu li').hover(function(){    
    if($(this).find('.sub').length > 0){
        $(this).find('.sub').slideDown();
    }
}, function(){
    $(this).find('.sub').slideUp();
})
