<?php
/**
 * 站点信息管理
 * @authors Amos (szhcool1129@sina.com)
 * @date    2017-09-23 12:50:10
 * @version $Id$
 */
$this->title = '';
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
            <a href="<?php echo Url::to(['/site-info']); ?>">站点信息</a>
            <i class="fa fa-angle-right"></i>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> 站点信息 </span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group fr">
                                <a href="<?=Url::to(['site-info/add'])?>" class="btn sbold green"> 添加
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
                            <th> 名称 </th>
                            <th> 创建时间 </th>
                            <th> 创建人 </th>
                            <th> 操作 </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<input disabled="disabled" type="hidden" name="request_url" value="<?php echo Url::to(['category/save']); ?>">
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
<?php \backend\assets\AppAsset::addScript($this, 'static/global/plugins/datatables/jquery.dataTables.min.js'); ?>
<?php \backend\assets\AppAsset::addScript($this, 'static/js/site-info.js'); ?>