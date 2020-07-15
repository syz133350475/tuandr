<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/www/wwwroot/www.tuandr.com/addons/credential/template/platform/credentialList.html";i:1583811698;}*/ ?>

<form class="v-filter-container">
    <div class="filter-fields-wrap">
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label">证书名称</label>
                    <div class="v__controls">
                        <input type="text" id="cred_name" class="v__control_input" autocomplete="off">
                    </div>
                </div>

                <div class="v__control-group">
                    <label class="v__control-label">证书类型</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="type" >
                            <option value="">所有</option>
                            <option value="1">分销商证书</option>
                            <option value="2">团队队长证书</option>
                            <option value="3">区域代理证书</option>
                            <option value="4">全球股东证书</option>
                            <option value="5">渠道商证书</option>
                            <option value="6">微店证书</option>
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
    <span class="text">证书列表</span>
</div>
<div class="mb-20">
    <button class="btn btn-primary J-add"><i class="icon icon-add1"></i> 添加证书</button>
    <button class="btn btn-primary J-clear-cache"><i class="icon icon-add1"></i> 清除证书缓存</button>
</div>
<table class="table v-table table-auto-center">
    <thead>
    <tr>
        <th>证书名称</th>
        <th>证书类型</th>
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



<script id="tpl_cred_list" type="text/html">
    <%each data as item item_id%>
    <tr>
        <td>
            <%item.cred_name%>
        </td>
        <!--<%if item.type == 1%>-->
        <!--<%/if%>-->
        <td>
        <%if item.cred_type == 1%>
            分销商证书
        <%else if item.cred_type == 2%>
            团队队长证书
        <%else if item.cred_type == 3%>
            区域代理证书
        <%else if item.cred_type == 4%>
            全球股东证书
        <%else if item.cred_type == 5%>
            渠道商证书
        <%else if item.cred_type == 6%>
            微店证书
        <%/if%>
        </td>
        <td>
            <%if item.is_default == 1%>
            <span class="label label-success">是</span>
            <%else%>
            <span class="label label-danger">否</span>
            <%/if%>
        </td>
        <td class="fs-0 operationLeft">
            <%if item.is_default == 0%>
            <a href="javascript:void(0);" class="btn-operation J-default" data-type="<%item.cred_type%>" data-cred_id="<%item.cred_id%>" data-original-title="默认">设为默认</a>
            <%/if%>
            <a href="javascript:void(0);" class="btn-operation J-edit" data-type="edit" data-cred_id="<%item.cred_id%>">编辑</a>
            <a href="javascript:void(0);" data-cred_id="<%item.cred_id%>" class="btn-operation text-red1 J-del">删除</a>
        </td>
    </tr>
    <%/each%>
</script>

<script>
    require(['util', 'tpl'], function (util, tpl) {
        util.initPage(LoadingInfo);

        // edit cred
        $("#list").on('click', '.J-edit', function () {
            var id = $(this).data('cred_id');
            location.href = __URL('ADDONS_MAINupdateCredential&cred_id=' + id);
        })

        // view record
        $("#list").on('click', '.J-record', function () {
            var id = $(this).data('cred-id');
            location.href = __URL('ADDONS_MAINcredRecord&cred_id=' + id);
        })

        // 新建cred
        $('.J-add').on('click', function () {
            var url = "<?php echo $credentialDialogUrl; ?>";
            util.confirm2('新增页面', 'url:' + url, 'col-md-10', function () {})
        })

        //清除证书缓存
        $('.J-clear-cache').click(function(){
            $.ajax({
                'url':'<?php echo $deleteCredCacheUrl; ?>',
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
            var id = $(this).data('cred_id');
            var type = $(this).data('type');
            $(".tooltip.fade.top.in").remove();
            $.ajax({
                type: "post",
                url: "<?php echo $defaultCredUrl; ?>",
                data: {
                    "cred_id": id,
                    "type": type,
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

        //删除证书
        $('#list').on('click', '.J-del', function () {
            var cred_id = $(this).data('cred_id');
            util.alert('确认删除该证书吗？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $deleteCredUrl; ?>",
                    data: {
                        "cred_id": cred_id
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
                url: "<?php echo $credentialListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "page_size": $("#showNumber").val(),
                    "type": $("#type").val(),
                    "cred_name": $("#cred_name").val()
                },
                success: function (data) {
                    if (data.total_count == 0) {
                        $("#list").html('<tr align="center"><td class="h-200" colspan="5">暂无符合条件的数据记录</td></tr>')
                        return true;
                    }
                    $("#list").html(tpl('tpl_cred_list', data))
                    $('#page').paginator('option', {
                        totalCounts: data.total_count
                    });
                }
            });
        }
    })
</script>

