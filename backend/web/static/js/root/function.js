/**
 * 功能管理
 * @authors Amos (735767227@qq.com)
 * @date    2017-04-10 17:53:38
 * @version $Id$
 */
$(document).ready(function(){
    $("#sample_1").dataTable({
        bPaginate: false,
        bInfo: false,
        bFilter: false,
        language: {
            emptyTable: "暂无功能数据" 
        },
        columnDefs: [{
            orderable: !1,
            targets: [0]
        }],
        order: []
    });
})
