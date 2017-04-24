<?php
/**
 * 轮播图管理
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-24 13:17:28
 * @version $Id$
 */

$this->title = '轮播图管理';
use yii\helpers\Url;
?>
<!-- BEGIN PAGE BAR -->
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
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> 轮播图管理 </span>
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
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="<?php echo Url::to(['banner/add']); ?>" class="btn sbold green"> 添加
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="banner-list-table">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> 标题 </th>
                            <th> 图片 </th>
                            <th> 状态 </th>
                            <th> 排序 </th>
                            <th> 有效期 </th>
                            <th> 操作 </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td class="center">   </td>
                            <td>  </td>
                            <td class="table-opt-td"> </td>
                        </tr>                                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
    $this->registerJs('
            $("#banner-list-table").dataTable({
                bPaginate: false,
                bInfo: false,
                bFilter: false,
                language: {
                    emptyTable: "暂无列表数据" 
                },
                columnDefs: [{
                    orderable: !1,
                    targets: [0, 6]
                }],
                order: []
            });
        ');
?>
<?php \backend\assets\AppAsset::addScript($this, 'static/global/scripts/datatable.js'); ?>
<?php \backend\assets\AppAsset::addScript($this, 'static/global/plugins/datatables/jquery.datatables.min.js'); ?>
<?php \backend\assets\AppAsset::addScript($this, 'static/js/banner.js'); ?>