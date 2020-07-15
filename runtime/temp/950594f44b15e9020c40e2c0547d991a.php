<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/www/wwwroot/www.tuandr.com/addons/store/template/platform/jobsList.html";i:1583811702;}*/ ?>

<div class="mb-20">
    <a href="<?php echo __URL('ADDONS_MAINaddJobs'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i>添加岗位</a>
    <div class="input-group search-input-group ml-10" style="float:right">
        <input type="text" class="form-control" placeholder="岗位名称" id="search_text" value="">
        <span class="input-group-btn">
            <button class="btn btn-primary search J-search" type="button">搜索</button>
        </span>
    </div>
</div>

<table class="table v-table table-auto-center">
    <thead>
        <tr>
            <th>岗位</th>
            <th class="col-md-2 pr-14 operationLeft">操作</th>
        </tr>
    </thead>
    <tbody id="jobs_list">
    </tbody>
</table>
<input type="hidden" id="page_index">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>


<script id="list" type="text/html">
    <%each data as item index%>
    <tr>
        <td><%item.jobs_name%></td>
        <td class="operationLeft fs-0">
            <a href="javascript:void(0);" class="btn-operation" data-type="edit" data-id="<%item.jobs_id%>">编辑</a>
            <a href="javascript:void(0);" class="btn-operation text-red1 del" data-id="<%item.jobs_id%>">删除</a>
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
        $('#jobs_list').on('click', '.del', function () {
            var jobs_id = $(this).attr('data-id');
            util.alert('删除？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $deleteJobsUrl; ?>",
                    data: {"jobs_id": jobs_id},
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
        $('#jobs_list').on('click', '.btn-operation', function () {
            var type = $(this).attr('data-type');
            var jobs_id = $(this).attr('data-id');
            switch (type) {
                case 'edit':
                    location.href = __URL('ADDONS_MAINeditJobs&jobs_id=' + jobs_id);
                    break;
            }
        });
        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $jobsListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "search_text": $("#search_text").val()
                },
                success: function (data) {
                    var html = '<tr><td class="h-200" colspan="2">暂无符合条件的数据记录</td></tr>';
                    if (data.data) {
                        if (tpl('list', data)) {
                            $("#jobs_list").html(tpl('list', data));
                        } else {
                            $("#jobs_list").html(html);
                        }
                        $('#page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                    } else {
                        $("#jobs_list").html(html);
                    }
                }
            });
        }
    });


</script>
