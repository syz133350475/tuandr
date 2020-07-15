<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/www/wwwroot/www.tuandr.com/addons/helpcenter/template/platform/questionList.html";i:1583811702;}*/ ?>

<!-- page -->
<div class="mb-20 flex flex-pack-justify">
    <div class="">
        <a href="<?php echo __URL('ADDONS_MAINaddQuestion'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加问题</a>
    </div>
    <div class="input-group search-input-group">
        <input type="text" class="form-control" id="search_text" name="search_text" placeholder="问题名称">
        <span class="input-group-btn "><a class="btn btn-primary J-search">搜索</a></span>
    </div>
</div>
<table class="table v-table table-auto-center">
    <thead>
        <tr>
            <th>排序</th>
            <th>问题标题</th>
            <th>问题分类</th>
            <th>显示</th>
            <th class="col-md-2 pr-14 operationLeft">操作</th>
        </tr>
    </thead>
    <tbody id="question_list">
    </tbody>

</table>
<input type="hidden" id="page_index">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>
<!-- page end -->


<script id="shop_curr_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td>
            <input type="number" class="form-control sort-form-control J-sort" min="0" value="<%item.sort%>" data-question_id="<%item.question_id%>">
        </td>
        <td>
            <%item.title%>
        </td>
        <td>
            <%item.name%>
        </td>
        <td>
            <%if item.status==1%>
            <a class="label label-success J-show" href="javascript:void(0);" data-question_id="<%item.question_id%>" data-show="0">是</a>
            <%else%>
            <a class="label label-danger J-show" href="javascript:void(0);" data-question_id="<%item.question_id%>" data-show="1">否</a>
            <%/if%>
        </td>
        <td class="operationLeft fs-0">
            <a href="javascript:void(0);" class="btn-operation edit" data-type="edit" data-question_id="<%item.question_id%>">编辑</a>
            <a href="javascript:void(0);" class="btn-operation text-red1 del" data-question_id="<%item.question_id%>">删除</a>
        </td>
    </tr>
    <%/each%>
</script>

<script>
    require(['util', 'tpl'], function (util, tpl) {
        util.initPage(LoadingInfo);
        //搜索
        $('.J-search').on('click', function () {
            util.initPage(LoadingInfo);
        });
        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $questionListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "search_text": $("#search_text").val(),

                },
                success: function (data) {
                    var html = '<tr><td class="h-200" colspan="5">暂无符合条件的数据记录</td></tr>';
                    if (data.data) {
                        if (tpl('shop_curr_list', data)) {
                            $("#question_list").html(tpl('shop_curr_list', data));
                        } else {
                            $("#question_list").html(html);
                        }
                        $('#page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                    } else {
                        $("#question_list").html(html);
                    }
                }
            });
        }
        $('#question_list').on('click', '.del', function () {
            var question_id = $(this).attr('data-question_id');
            util.alert('删除问题？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $deleteQuestionUrl; ?>",
                    data: {"question_id": question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                        } else {
                            util.message(data['message'], 'danger');
                        }
                    }
                });
            });
        });
        $('#question_list').on('click', '.edit', function () {
            var question_id = $(this).attr('data-question_id');
            location.href = __URL('ADDONS_MAINupdateQuestion&question_id=' + question_id);
        });
        $('#question_list').on('click', '.J-show', function () {
            var question_id = $(this).data('question_id');
            var status = $(this).data('show');
            $.ajax({
                type: "post",
                url: "<?php echo $changeQuestionShowUrl; ?>",
                data: {'question_id': question_id, 'status': status},
                async: false,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message('操作成功', 'success', LoadingInfo($('#page_index').val()));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
        $('#question_list').on('change', '.J-sort', function () {
            var question_id = $(this).data('question_id');
            var sort_val = $(this).val();
            $.ajax({
                type: "post",
                url: "<?php echo $changeQuestionSortUrl; ?>",
                data: {'question_id': question_id, 'sort': sort_val},
                async: true,
                success: function (data) {
                    if (data['code'] <= 0) {
                        util.message(data["message"], 'danger');
                    } else {
                        LoadingInfo($('#page_index').val());
                    }
                }
            });
        });
    });

</script>

