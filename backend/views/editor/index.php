<?php
/**
 * 编辑器
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-11-14 16:59:35
 * @version $Id$
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>kunlun editor</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="http://kunlun.debugphp.com/static/css/editor.css" rel="stylesheet">
    <script src="http://kunlun.debugphp.com/static/js/jquery-3.2.1.min.js"></script>
    <style id="global-style">
        
    </style>
</head>
<body>
    <ul class="left-menu">
        <?php foreach ($cate as $k => $v) { ?>
        <li data-cate="<?=$v['cate_id']?>" class="cate <?php if($k === 0){ ?>active<?php } ?>"><?=$v['name']?></li>
        <script>var mainCate_<?=$v['cate_id']?> = '<?=json_encode($v['sub'])?>';</script>
        <?php } ?>
    </ul>
    <div class="content">
        <ul class="global-color">
            <li data-color="#AC1D10" style="background-color: #AC1D10;"></li>
            <li data-color="#D82821" style="background-color: #D82821;"></li>
            <li data-color="#EF7060" style="background-color: #EF7060;"></li>
            <li data-color="#FDE2D8" style="background-color: #FDE2D8;"></li>
            <li data-color="#D32A63" style="background-color: #D32A63;"></li>
            <li data-color="#EB6794" style="background-color: #EB6794;"></li>
            <li data-color="#F5BDD1" style="background-color: #F5BDD1;"></li>
            <li data-color="#FFEBF0" style="background-color: #FFEBF0;"></li>
            <li data-color="#E2561B" style="background-color: #E2561B;"></li>
            <li data-color="#FF8124" style="background-color: #FF8124;"></li>
            <li data-color="#FCB42B" style="background-color: #FCB42B;"></li>
            <li data-color="#FEECAF" style="background-color: #FEECAF;"></li>
            <li data-color="#0C8918" style="background-color: #0C8918;"></li>
            <li data-color="#80B135" style="background-color: #80B135;"></li>
            <li data-color="#C2C92A" style="background-color: #C2C92A;"></li>
            <li data-color="#E5F3D0" style="background-color: #E5F3D0;"></li>
            <li data-color="#374AAE" style="background-color: #374AAE;"></li>
            <li data-color="#1E9BE8" style="background-color: #1E9BE8;"></li>
            <li data-color="#59C3F9" style="background-color: #59C3F9;"></li>
            <li data-color="#B6E4FD" style="background-color: #B6E4FD;"></li>
            <li data-color="#8D4BBB" style="background-color: #8D4BBB;"></li>
            <li data-color="#A65BCB" style="background-color: #A65BCB;"></li>
            <li data-color="#CCA4E3" style="background-color: #CCA4E3;"></li>
            <li data-color="#BE7763" style="background-color: #BE7763;"></li>
            <li data-color="#212122" style="background-color: #212122;"></li>
            <li data-color="#757576" style="background-color: #757576;"></li>
            <li data-color="#C6C6C7" style="background-color: #C6C6C7;"></li>
            <li data-color="#F5F5F4" style="background-color: #F5F5F4;"></li>
            <li data-color="#3C4350" style="background-color: #3C4350;"></li>
        </ul>
        <ul class="sub-cate">
            <?php foreach ($cate[0]['sub'] as $k => $v) { ?>
            <li data-cate="<?=$v['cate_id']?>" <?php if($k === 0){?>class="active"<?php } ?>><?=$v['name']?></li>
            <?php } ?>
        </ul>
        <ul class="list">
            <?php foreach ($list as $k => $v) {?>
            <li><?=$v['html']?></li>
            <?php } ?>
        </ul>
    </div>
    <script>
        $(function(){
            $('.global-color li').click(function(){
                var color = $(this).data('color');             
                document.getElementById("global-style").innerHTML=".wxqq-bg{background-color: "+color+"!important;}.wxqq-borderTopColor{border-top-color: "+color+"!important;}.wxqq-borderBottomColor{border-bottom-color: "+color+"!important;}.wxqq-borderRightColor{border-right-color: "+color+"!important;}.wxqq-borderLeftColor{border-left-color: "+color+"!important;}.wxqq-Color{color: "+color+"!important;}";
                return false;
            })
            $(document).on('click', '.list li', function(){
                parent.ue.execCommand('inserthtml', $(this).html());
                return false;
            })
            $(document).on('click', '.cate', function(){                
                var _this = $(this);
                var cate_2 = _this.data('cate');
                var subList = JSON.parse(eval('mainCate_'+cate_2));
                var cate_3 = subList[0]['cate_id'];
                $.ajax({
                    url: 'editor/data-list',
                    type: 'post',
                    dataType: 'json',
                    data: {cate_2: cate_2, cate_3: cate_3},
                    success: function(res){
                        if(res.code == 0){
                            var subLi = '';
                            $.each(subList, function(index, value){
                                active = '';
                                if(index === 0){
                                    var active = ' class="active"';
                                }
                                subLi += '<li data-cate="'+cate_2+'"'+active+'>'+value.name+'</li>';
                            })
                            $('.sub-cate').html(subLi);
                            var htmls = '';
                            $.each(res.data, function(index, value){
                                htmls += '<li>'+value.html+'</li>';
                            })
                            $('.list').html(htmls);
                        }else{

                        }
                    }
                })
                return false;
            })
        })
    </script>
</body>
</html>