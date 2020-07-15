<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/www/wwwroot/www.tuandr.com/addons/helpcenter/template/platform/questionCateList.html";i:1583811702;}*/ ?>

<!-- page -->
<div class="mb-20 flex flex-pack-justify">
    <div class="">
        <a href="javascript:void(0)" class="btn btn-primary J-add"><i class="icon icon-add1"></i> 添加分类</a>
    </div>
    <div class="input-group search-input-group">
        <input type="text" class="form-control" id="search_text" name="search_text" placeholder="分类名称">
        <span class="input-group-btn "><a class="btn btn-primary J-search">搜索</a></span>
    </div>
</div>
<table class="table v-table table-auto-center tree" >
    <thead>
        <tr>
            <th>排序</th>
            <th>分类名称</th>
            <th>是否显示</th>
            <th class="col-md-2 pr-14 operationLeft">操作</th>
        </tr>
    </thead>
    <tbody style="display: none;" id="add-area">
        <tr class="add_tr">
            <td>
                <input type="text" class="form-control sort-form-control J-addsort">
            </td>
            <td>
                <div><input type="text" class="form-control J-addname"></div>
            </td>
            <td>

            </td>
            <td class="fs-0 operationLeft">
                <a href="javascript:void(0);" class="btn-operation text-red1 J-adddel">删除</a>
            </td>
        </tr>
    </tbody>
    <tbody id="question_cate_list">

    </tbody>
</table>

<!-- page end -->


<script id="shop_curr_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td>
            <input type="text" data-id="<%item.cate_id%>" class="form-control sort-form-control J-sort" value="<%item.sort%>">
        </td>
        <td>
            <div><input type="text" data-id="<%item.cate_id%>" class="form-control J-name" value="<%item.name%>"></div>
        </td>
        <td>
            <%if item.status==1%>
            <a href="javascript:void(0);" class="label label-success J-show" data-show="0" data-id="<%item.cate_id%>">是</a>
            <%else%>
            <a href="javascript:void(0);" class="label label-danger J-show" data-show="1" data-id="<%item.cate_id%>">否</a>
            <%/if%>
        </td>
        <td class="fs-0 operationLeft">
            <a href="javascript:void(0);" data-id="<%item.cate_id%>" class="btn-operation text-red1 J-del">删除</a>
        </td>
    </tr>
    <%/each%>
</script>
<script>
    require(['util', 'tpl'], function (util, tpl) {
        LoadingInfo(0);
        $('.J-search').on('click', function () {
            LoadingInfo(0);
        });
        function LoadingInfo(order) {
            $.ajax({
                type: "post",
                url: "<?php echo $questionCateListUrl; ?>",
                data: {
                    "order": order,
                    "search_text": $("#search_text").val()
                },
                success: function (data) {
                    var html = '<tr class="J-noData"><td class="h-200" colspan="4">暂无符合条件的数据记录</td></tr>';
                    if (data.data) {
                        if (tpl('shop_curr_list', data)) {
                            $("#question_cate_list").html(tpl('shop_curr_list', data));
                        } else {
                            $("#question_cate_list").html(html);
                        }
                    } else {
                        $("#question_cate_list").html(html);
                    }

                }
            });
        }
        //删除分类
        $('#question_cate_list').on('click', '.J-del', function () {
            var cate_id = $(this).data('id');
            util.alert('确认删除此分类吗 ？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $deleteCateUrl; ?>",
                    async: true,
                    data: {
                        "cate_id": cate_id
                    },
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo(0));
                        } else {
                            util.message(data["message"], 'danger');
                        }
                    }
                });
            });
        });
        $('.J-add').on('click', function () {
            if($('#question_cate_list .add_tr').length>0){
                return;
            }
            $('#question_cate_list').find('.J-noData').remove();
            $('#question_cate_list').append($('#add-area').html());
        });
        $('#question_cate_list').on('click','.J-adddel',function () {
            $(this).parents('tr').remove();
        });
        //排序
        $('#question_cate_list').on('change', '.J-sort', function () {
            var cate_id = $(this).data('id');
            var sort_val = $(this).val();
            $.ajax({
                type: "post",
                url: "<?php echo $changeCateSortUrl; ?>",
                async: true,
                data: {cate_id: cate_id, sort: sort_val},
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', LoadingInfo(0));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
        //添加分类
        $('#question_cate_list').on('change', '.J-addname', function () {
            var name = $(this).val();
            var sort = $('#question_cate_list .J-addsort').val();
            $.ajax({
                type: "post",
                url: "<?php echo $addCateUrl; ?>",
                async: true,
                data: {name: name, sort: sort},
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', LoadingInfo(1));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
        //修改分类名
        $('#question_cate_list').on('change', '.J-name', function () {
            var cate_id = $(this).data('id');
            var name = $(this).val();
            $.ajax({
                type: "post",
                url: "<?php echo $changeCateNameUrl; ?>",
                async: true,
                data: {cate_id: cate_id, name: name},
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', LoadingInfo(0));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
        $('#question_cate_list').on('click', '.J-show', function () {
            var cate_id = $(this).data('id');
            var status = $(this).data('show');
            $.ajax({
                type: "post",
                url: "<?php echo $changeCateShowUrl; ?>",
                async: true,
                data: {cate_id: cate_id, status: status},
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', LoadingInfo(0));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
    });
</script>

