<?php
/**
 * 功能添加
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-10 18:22:00
 * @version $Id$
 */
use yii\helpers\Url;
$this->title = '功能管理-添加功能';
?>
<h3 class="page-title"> 功能添加
    <small>功能添加、修改等</small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo Url::to(['root/site']); ?>">首页</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo Url::to(['root/function']); ?>">功能管理</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>添加功能</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"> Actions
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
<div class="row">
    <div class="col-md-12">
       <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">添加功能</span>
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
                <form class="form-horizontal add-user-form" role="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">菜单名称</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control input-inline input-medium" placeholder="菜单名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">菜单图标</label>
                            <div class="col-md-9">
                                <input type="text" name="icon" class="form-control input-inline input-medium" placeholder="菜单图标">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">控制器</label>
                            <div class="col-md-9">
                                <input type="password" name="controller" class="form-control input-inline input-medium" placeholder="控制器">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">方法名称</label>
                            <div class="col-md-9">
                                <input type="password" name="password_confirm" class="form-control input-inline input-medium" placeholder="方法名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">URL</label>
                            <div class="col-md-9">
                                <input type="password" name="password_confirm" class="form-control input-inline input-medium" placeholder="跳转链接">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">备注</label>
                            <div class="col-md-9">
                                <textarea name="remarks" cols="30" rows="4" class="form-control" placeholder="备注信息"></textarea>
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
                    <input type="hidden" name="<?= \Yii::$app->request->csrfParam; ?>" value="<?= \Yii::$app->request->getCsrfToken();?>">
                    <input disabled="disabled" type="hidden" name="request_url" value="<?php echo Url::to(['root/user/action']); ?>">
                </form>
            </div>
        </div>
    </div>
</div>