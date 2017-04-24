<?php
/**
 * 轮播图管理-添加
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-24 14:28:22
 * @version $Id$
 */

$this->title = '轮播图管理-添加';
use yii\helpers\Url;
?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo Url::to(['/site']); ?>">首页</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo Url::to(['/banner']); ?>">banner管理</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>添加</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="#">
                        <i class="icon-bell"></i> Action</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-shield"></i> Another action</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-user"></i> Something else here</a>
                </li>
                <li class="divider"> </li>
                <li>
                    <a href="#">
                        <i class="icon-bag"></i> Separated link</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<h3 class="page-title"> banner轮播图
    <small>分类别管理各个页面的banner轮播图</small>
</h3>
<div class="note note-info">
    <p> 分类别管理各个页面的banner轮播图 </p>
</div>
<div class="row">
    <div class="col-md-12">
       <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">添加轮播图</span>
                </div>
                <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                            <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                            <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                    </div>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal add-user-form" role="form" novalidate="novalidate">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">轮播图类别</label>
                            <div class="col-md-9">                                
                                <select class="form-control input-medium" name="cate_id" id="cate_id">
                                    <?php foreach ($bannerCate as $k => $v) { ?>
                                    <option value="<?=$k?>"><?=$v?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">标题</label>
                            <div class="col-md-9">
                                <input type="text" name="title" class="form-control input-inline input-medium" placeholder="轮播图标题">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">跳转链接</label>
                            <div class="col-md-9">
                                <input type="text" name="href" class="form-control input-inline input-xlarge" placeholder="跳转链接">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">排序</label>
                            <div class="col-md-9">
                                <input type="text" name="sort" class="form-control input-inline input-medium" placeholder="排序，越大越靠前">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">有效期</label>
                            <div class="col-md-9">
                                <input type="text" name="begin_time" id="begin_time" class="form-control input-inline input-medium" placeholder="开始时间"> ~ <input type="text" name="end_time" id="end_time" class="form-control input-inline input-medium" placeholder="结束时间">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">轮播图片</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-inline input-xlarge" readonly="readonly" placeholder="图片路径(上传后自动填充)">
                                <input type="file" class="none" id="banner-file-input" accept="image/png,image/jpeg,image/jpg" capture="camera">
                                <button type="button" class="btn blue select-banner-img">选择图片</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <img id="img-preview" src="">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">确 定</button>
                                <button type="button" class="btn default">取 消</button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="act" value="add">
                    <input type="hidden" id="csrf" name="<?= \Yii::$app->request->csrfParam; ?>" value="<?= \Yii::$app->request->getCsrfToken();?>">
                    <input disabled="disabled" type="hidden" name="request_url" value="<?php echo Url::to(['banner/save']); ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
    $this->registerJs("
        laydate.skin('molv');
        var start = {
            elem: '#begin_time',
            format: 'YYYY-MM-DD hh:mm:ss',
            min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: false,
            choose: function(datas){
                end.min = datas;
                end.start = datas
            }
        };
        var end = {
            elem: '#end_time',
            format: 'YYYY-MM-DD hh:mm:ss',
            min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: false,
            choose: function(datas){
                start.max = datas;
            }
        };
        laydate(start);
        laydate(end);"
    ); 
?>
<?php  \backend\assets\AppAsset::addScript($this, 'static/plugin/laydate/laydate.js'); ?>
<?php  \backend\assets\AppAsset::addScript($this, 'static/plugin/localResizeIMG/dist/lrz.bundle.js'); ?>
<?php  \backend\assets\AppAsset::addScript($this, 'static/js/banner.js'); ?>
  