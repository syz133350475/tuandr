<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/www/wwwroot/www.tuandr.com/addons/store/template/admin/storeList.html";i:1587970154;}*/ ?>

<div class="mb-20">
    <a href="<?php echo __URL('ADDONS_ADMIN_MAINaddStore'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i>添加门店</a>
    <a href="javascript:void(0)" class="btn btn-primary J-storeSet">门店配置</a>
    <div class="input-group search-input-group ml-10" style="float:right">
        <input type="text" class="form-control" placeholder="门店名称" id="search_text" value="">
        <span class="input-group-btn">
            <button class="btn btn-primary search J-search" type="button">搜索</button>
        </span>
    </div>
</div>
<div class="mb-20 bg-info border-info padding-15">店员端登录地址：<a href="<?php echo __URLS('CLERK_MAIN'); ?>" target="_blank"><?php echo __URLS('CLERK_MAIN'); ?></a></div>
<table class="table v-table table-auto-center">
    <thead>
        <tr>
            <th>门店名称</th>
            <th>门店地址</th>
            <th>状态</th>
            <th class="col-md-2 pr-14 operationLeft">操作</th>
        </tr>
    </thead>
    <tbody id="store_list">
    </tbody>
</table>
<input type="hidden" id="page_index">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>


<script id="list" type="text/html">
    <%each data as item index%>
    <tr>
        <td><%item.store_name%></td>
        <td><%item.address%></td>
        <td>
            <%if item.status==1%>
            <span class="label label-success">营业中</span>
            <%else%>
            <span class="label label-danger">歇业中</span>
            <%/if%>
        </td>
        <td class="fs-0 operationLeft">
            <a href="javascript:void(0);" class="btn-operation" data-type="edit" data-id="<%item.store_id%>">编辑</a>
            <a href="javascript:void(0);" class="btn-operation text-red1 del" data-id="<%item.store_id%>">删除</a>
            <!--<a href="javascript:void(0);" class="text-primary" data-id="<%item.store_id%>">门店小程序码</a>-->
        </td>
    </tr>
    <%/each%>
</script>
<script>
    require(['utilAdmin', 'tpl'], function (utilAdmin, tpl) {
        utilAdmin.initPage(LoadingInfo);
        $('.J-search').on('click', function () {
            utilAdmin.initPage(LoadingInfo);
        });
        $('#store_list').on('click', '.del', function () {
            var store_id = $(this).attr('data-id');
            utilAdmin.alert('删除？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $deleteStoreUrl; ?>",
                    data: {"store_id": store_id},
                    dataType: "json",
                    success: function (data) {
                        if (data["code"] > 0) {
                            utilAdmin.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                        } else {
                            utilAdmin.message(data['message']);
                        }
                    }
                });
            });
        });
        $('#store_list').on('click', '.btn-operation', function () {
            var type = $(this).attr('data-type');
            var store_id = $(this).attr('data-id');
            switch (type) {
                case 'edit':
                    location.href = __URL('ADDONS_ADMIN_MAINeditStore&store_id=' + store_id);
                    break;
            }
        });
        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $storeListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "search_text": $("#search_text").val()
                },
                success: function (data) {
                    var html = '<tr><td class="h-200" colspan="4">暂无符合条件的数据记录</td></tr>';
                    if (data.data) {
                        if (tpl('list', data)) {
                            $("#store_list").html(tpl('list', data));
                        } else {
                            $("#store_list").html(html);
                        }
                        $('#page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                    } else {
                        $("#store_list").html(html);
                    }
                }
            });
        }
        $('.J-storeSet').on('click',function(){
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">线下自提</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="email_is_use" ><label for="email_is_use" class=""></label></div></div></div>';
            html += '</form>';
            $.ajax({
                type:"post",
                url:"<?php echo $getStoreSetUrl; ?>",
                data:{ },
                async:true,
                success:function (data) {
                    if(data['is_use']==1){
                        $("#email_is_use").prop("checked", true);
                    }
                }
            });
            utilAdmin.confirm('门店配置',html,function(){
                if(this.$content.find('#email_is_use').is(':checked')){
                    var is_use =1;
                }
                $.ajax({
                    type:"post",
                    url:"<?php echo $storeSetUrl; ?>",
                    data:{
                        'is_use':is_use
                    },
                    async:true,
                    dataType: 'json',
                    success:function (data) {
                        if (data["code"] > 0) {
                            utilAdmin.message( data["message"],'success');
                        }else{
                            utilAdmin.message( data["message"],'danger');
                        }
                    }
                });
            })
        })
    });


</script>
