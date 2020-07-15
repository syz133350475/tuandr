<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/www.tuandr.com/addons/poster/template/platform/posterList.html";i:1583811698;}*/ ?>

<form class="v-filter-container">
    <div class="filter-fields-wrap">
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label">海报名称</label>
                    <div class="v__controls">
                        <input type="text" id="poster_name" class="v__control_input" autocomplete="off">
                    </div>
                </div>

                <div class="v__control-group">
                    <label class="v__control-label">海报类型</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="type" >
                            <option value="">所有</option>
                            <option value="1">商城</option>
                            <option value="2">商品</option>
                            <option value="3">关注</option>
                            <option value="4">微店</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label"></label>
                    <div class="v__controls">
                        <a class="btn btn-primary search J-search"><i class="icon icon-search"></i> 搜索</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="screen-title">
    <span class="text">海报列表</span>
</div>
<div class="mb-20">
    <button class="btn btn-primary J-add"><i class="icon icon-add1"></i> 新增页面</button>
    <button class="btn btn-primary J-clear-cache"><i class="icon icon-add1"></i> 清除海报缓存</button>
</div>
<table class="table v-table table-auto-center">
    <thead>
    <tr>
        <th>海报名称</th>
        <th>海报类型</th>
        <th>扫描/关注次数</th>
        <th>是否默认</th>
        <th class="col-md-2 pr-14 operationLeft">操作</th>
    </tr>
    </thead>
    <tbody id="list">
    </tbody>
</table>
<input type="hidden" id="page_index">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>



<script id="tpl_poster_list" type="text/html">
    <%each data as item item_id%>
    <tr>
        <td>
            <%item.poster_name%>
        </td>
        <td>
            <%if item.type == 1%>
            <span class="label label-success">商城</span>
            <%else if item.type == 2%>
            <span class="label label-warning">商品</span>
            <%else if item.type == 3%>
            <span class="label label-danger">关注</span>
            <%else if item.type == 4%>
            <span class="label label-info">微店</span>
            <%/if%>
        </td>
        <td><%item.scan_times%></td>
        <td>
            <%if item.is_default == 1%>
            <span class="label label-success">是</span>
            <%else%>
            <span class="label label-danger">否</span>
            <%/if%>
        </td>
        <td class="fs-0 operationLeft">
            <%if item.is_default == 0%>
            <a href="javascript:void(0);" class="btn-operation J-default" data-type="<%item.type%>" data-poster-id="<%item.poster_id%>" data-original-title="默认">设为默认</a>
            <%/if%>
            <a href="javascript:void(0);" class="btn-operation J-edit" data-type="edit" data-poster-id="<%item.poster_id%>">编辑</a>
            <%if item.type == 3%>
            <a href="javascript:void(0);" class="btn-operation J-record" data-type="history" data-poster-id="<%item.poster_id%>">关注记录</a>
            <%else%>
            <a href="javascript:void(0);" class="btn-operation J-record" data-type="history" data-poster-id="<%item.poster_id%>">扫码记录</a>
            <%/if%>
            <a href="javascript:void(0);" data-poster-id="<%item.poster_id%>" class="btn-operation text-red1 J-del">删除</a>
        </td>
    </tr>
    <%/each%>
</script>

<script>
    require(['util', 'tpl'], function (util, tpl) {
        util.initPage(LoadingInfo);

        // edit poster
        $("#list").on('click', '.J-edit', function () {
            var id = $(this).data('poster-id');
            location.href = __URL('ADDONS_MAINposter&poster_id=' + id);
        })

        // view record
        $("#list").on('click', '.J-record', function () {
            var id = $(this).data('poster-id');
            location.href = __URL('ADDONS_MAINposterRecord&poster_id=' + id);
        })

        // 新建poster
        $('.J-add').on('click', function () {
            var url = "<?php echo $posterDialogUrl; ?>";

            util.confirm2('新增页面', 'url:' + url, 'col-md-10', function () {})
        })

        //清除海报缓存
        $('.J-clear-cache').click(function(){
            $.ajax({
                'url':'<?php echo $deletePosterCacheUrl; ?>',
                'type':'post',
                'data':{},
                success:function(data){
                    if(data['code'] > 0){
                        util.message('清除成功', 'success', LoadingInfo(1));
                    }else{
                        util.message(data["message"], 'danger');
                    }
                }
            })
        })

        //set default
        $('#list').on('click', '.J-default', function () {
            var id = $(this).data('poster-id');
            var type = $(this).data('type');
            $(".tooltip.fade.top.in").remove();
            $.ajax({
                type: "post",
                url: "<?php echo $defaultPosterUrl; ?>",
                data: {
                    "id": id,
                    "type": type
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                    } else {
                        util.message(data["message"]);
                    }
                }
            })
        })

        //删除页面
        $('#list').on('click', '.J-del', function () {
            var poster_id = $(this).data('poster-id');
            util.alert('确认删除该模板吗？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $deletePosterUrl; ?>",
                    data: {
                        "id": poster_id
                    },
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                        } else {
                            util.message(data["message"], 'error');
                        }
                    }
                })
            })
        })

        $(".J-search").on('click', function () {
            LoadingInfo(1)
        })

        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $posterListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "page_size": $("#showNumber").val(),
                    "type": $("#type").val(),
                    "poster_name": $("#poster_name").val()
                },
                success: function (data) {
                    if (data.total_count == 0) {
                        $("#list").html('<tr align="center"><td class="h-200" colspan="5">暂无符合条件的数据记录</td></tr>')
                        return true;
                    }
                    $("#list").html(tpl('tpl_poster_list', data))
                    $('#page').paginator('option', {
                        totalCounts: data.total_count
                    });
                }
            });
        }
    })
</script>

