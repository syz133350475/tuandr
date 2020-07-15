<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/www.tuandr.com/addons/store/template/platform/assistantList.html";i:1583811702;}*/ ?>

<div class="mb-20">
    <a href="<?php echo __URL('ADDONS_MAINaddAssistant'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i>添加店员</a>
    <div class="input-group search-input-group ml-10" style="float:right">
        <input type="text" class="form-control" placeholder="店员名称" id="search_text" value="">
        <span class="input-group-btn">
            <button class="btn btn-primary search J-search" type="button">搜索</button>
        </span>
    </div>
</div>

<table class="table v-table table-auto-center">
    <thead>
        <tr>
            <th>名称</th>
            <th>所属门店</th>
            <th>岗位</th>
            <th>状态</th>
            <th class="col-md-2 pr-14 operationLeft">操作</th>
        </tr>
    </thead>
    <tbody id="assistant_list">
    </tbody>
</table>
<input type="hidden" id="page_index">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>


<script id="list" type="text/html">
    <%each data as item index%>
    <tr>
        <td><%item.assistant_name%></td>
        <td><%item.store_name%></td>
        <td><%item.jobs_name%></td>
        <td>
            <%if item.status==1%>
            <span class="label label-success J-close" data-id="<%item.assistant_id%>">正常</span>
            <%else%>
            <span class="label label-danger J-open" data-id="<%item.assistant_id%>">已停用</span>
            <%/if%>
        </td>
        <td class="operationLeft fs-0">
            <a href="javascript:void(0);" class="btn-operation" data-type="edit" data-id="<%item.assistant_id%>">编辑</a>
            <a href="javascript:void(0);" class="btn-operation text-red1 del" data-id="<%item.assistant_id%>">删除</a>
        </td>
    </tr>
    <%/each%>
</script>
<script>
    require(['util', 'tpl'], function (util, tpl) {
        util.initPage(LoadingInfo);
        $('.J-search').on('click', function () {
            util.initPage(LoadingInfo);
        });
        $('#assistant_list').on('click', '.del', function () {
            var assistant_id = $(this).attr('data-id');
            util.alert('删除？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $deleteAssistantUrl; ?>",
                    data: {"assistant_id": assistant_id},
                    dataType: "json",
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                        } else {
                            util.message(data['message']);
                        }
                    }
                });
            });
        });
        $('#assistant_list').on('click', '.btn-operation', function () {
            var type = $(this).attr('data-type');
            var assistant_id = $(this).attr('data-id');
            switch (type) {
                case 'edit':
                    location.href = __URL('ADDONS_MAINeditAssistant&assistant_id=' + assistant_id);
                    break;
            }
        });
        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $assistantListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "search_text": $("#search_text").val()
                },
                success: function (data) {
                    var html = '<tr><td class="h-200" colspan="5">暂无符合条件的数据记录</td></tr>';
                    if (data.data) {
                        if (tpl('list', data)) {
                            $("#assistant_list").html(tpl('list', data));
                        } else {
                            $("#assistant_list").html(html);
                        }
                        $('#page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                    } else {
                        $("#assistant_list").html(html);
                    }
                }
            });
        }
        $("#assistant_list").on('click', '.J-open', function(){
            var assistant_id = $(this).data('id');
            $.ajax({
                type: "post",
                url: "<?php echo $enableOrUnableUrl; ?>",
                data: {"assistant_id": assistant_id,"enable":1},
                dataType: "json",
                async : true,
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',LoadingInfo($('#page_index').val()));
                    }else{
                        util.message(data["message"],'danger',LoadingInfo($('#page_index').val()));
                    }
                }
            });
        });
        $("#assistant_list").on('click', '.J-close', function(){
            var assistant_id = $(this).data('id');
            $.ajax({
                type: "post",
                url: "<?php echo $enableOrUnableUrl; ?>",
                data: {"assistant_id": assistant_id,"enable":0},
                dataType: "json",
                async : true,
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',LoadingInfo($('#page_index').val()));
                    }else{
                        util.message(data["message"],'danger',LoadingInfo($('#page_index').val()));
                    }
                }
            });
        });
    });


</script>
