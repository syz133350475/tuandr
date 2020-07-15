<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/www/wwwroot/www.tuandr.com/addons/groupshopping/template/platform/groupShoppingList.html";i:1587970154;}*/ ?>


        <div class="mb-20">
            <a href="<?php echo __URL('ADDONS_MAINaddGroupShopping'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i>
                添加拼团</a>
            <div class="input-group search-input-group ml-10" style="float:right">
                <input type="text" class="form-control" placeholder="商品名称" id="search_text" value="">
                <span class="input-group-btn">
                    <button class="btn btn-primary search J-search" type="button">搜索</button>
                </span>
            </div>
        </div>
        <ul id="group_type" class="nav nav-tabs v-nav-tabs fs-12">
            <li role="presentation" class="active" data-type="all"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="true">全部</a></li>
            <!--<li role="presentation" class="" data-type="0"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false">待开始</a></li>-->
            <li role="presentation" class="" data-type="1"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false">进行中</a></li>
            <li role="presentation" class="" data-type="2"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false">已结束</a></li>
        </ul>
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th>商品信息</th>
                <th>拼团价</th>
                <th>参团情况</th>
                <th>成团时限</th>
                <th>状态</th>
                <th class="col-md-2 pr-14 operationLeft">操作</th>
            </tr>
            </thead>
            <tbody id="group_shopping_list">
            </tbody>
        </table>
        <input type="hidden" id="page_index">
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="page" class="pagination pull-right"></ul>
        </nav>


<script id="shop_curr_list" type="text/html">
<input type="hidden" value="<%addon_status.wap_status%>" id="wap">
    <input type="hidden" value="<%addon_status.is_minipro%>" id="mini">
    <input type="hidden" value="<%addon_status.is_pc_use%>" id="pc">
    <%each data as item index%>
    <tr>
        <td>
            <div class="media text-left ">
                <div class="media-left">
                    <p><img src="<%item.pic_cover_mid%>" style="width:60px;height:60px;"></p>
                </div>
                <div class="media-body max-w-300 ">
                    <div class="line-2-ellipsis line-title">
                        <%item.goods_name%>
                    </div>
                    <div class="line-2-ellipsis line-title">
                        ￥<%item.price%>
                    </div>
                </div>
            </div>
        </td>
       
        <td>
            <%if item.sku_price.min_price == item.sku_price.max_price%>
                ￥<%item.sku_price.min_price%>
            <%else%>
                ￥<%item.sku_price.min_price%>~￥<%item.sku_price.max_price%>
            <%/if%>
        </td>
        <td>
            参团人数：<%item.tuxedo_situation.tuxedo%></br>
            组团次数：<%item.tuxedo_situation.group_count%></br>
            成团次数：<%item.tuxedo_situation.success_count%>
        </td>
        <td><%item.group_time%>分钟</td>
        <td>
            <%if item.status==2%>
            <span class="label label-grey">已结束</span>
            <%else if item.status==1%>
            <span class="label label-green">进行中</span>
            <%/if%>
        </td>
        <td class="operationLeft fs-0">
            <a class="btn-operation link-pr" data-goods_id="<%item.goods_id%>" href="javascript:void(0);"> <span>链接</span>
                <div class="link-pos">
                    
                </div>
            </a>
            <%if item.status!=2%>
            <a href="javascript:void(0);" class="btn-operation off" data-group_id="<%item.group_id%>">关闭</a>
            <%/if%>
            <a href="javascript:void(0);" class="btn-operation" data-type="info" data-group_id="<%item.group_id%>">详情</a>
            <a href="javascript:void(0);" class="btn-operation" data-type="history" data-group_id="<%item.group_id%>">记录</a>
            <%if item.status==2%>
            <a href="javascript:void(0);" class="btn-operation del text-red1" data-group_id="<%item.group_id%>">删除</a>
            <%/if%>
        </td>
    </tr>
    <%/each%>
</script>
<script>
    require(['util', 'tpl'], function (util, tpl) {

        tpl.helper('__URLS',function(str){
            return  __URLS(str)
        })
        tpl.helper('__URL',function(str){
            return  __URL(str)
        })
        util.initPage(LoadingInfo);
        //搜索
        $('.J-search').on('click', function () {
            util.initPage(LoadingInfo);
        });
        var type = $('#group_type').find('li.active').data('type');
        $('#group_shopping_list').on('click', '.del', function () {
            var group_id = $(this).attr('data-group_id');
            util.alert('删除？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $deleteGroupShoppingUrl; ?>",
                    data: {"group_id": group_id},
                    dataType: "json",
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo($('#page_index').val(),type));
                        } else {
                            util.message(data['message']);
                        }
                    }
                });
            });
        });
        $('#group_shopping_list').on('click', '.off', function () {
            var group_id = $(this).attr('data-group_id');
            util.alert('关闭后未成团的订单将作废处理！', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $closeGroupShoppingUrl; ?>",
                    data: {"group_id": group_id},
                    dataType: "json",
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo($('#page_index').val(),type));
                        } else {
                            util.message(data['message']);
                        }
                    }
                });
            });
        });
        $('#group_shopping_list').on('click', '.on', function () {
            var group_id = $(this).attr('data-group_id');
            util.alert('开启活动？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $openGroupShoppingUrl; ?>",
                    data: {"group_id": group_id},
                    dataType: "json",
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo($('#page_index').val(),type));
                        } else {
                            util.message(data['message']);
                        }
                    }
                });
            });
        });
        $('#group_type').on('click','li',function(){
            type = $(this).data('type');
            LoadingInfo(1);
        });
		//当经过链接的时候再加载二维码
        $('body').on('mouseover', '.link-pr', function(){
            if($(this).attr('mark')){
                return;
            }
            var goods_id = $(this).data('goods_id');
            var wap = $('#wap').val();
			var mini = $('#mini').val();
			var pc = $('#pc').val();
            var html = '<div class="link-arrow">' +
            ' <form class="form-horizontal"> ';
            if(wap == 1){
                html += '<div class="form-group"> <label class="col-md-2 control-label">手机端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + __URLS('SHOP_MAIN/wap/goods/detail/' + goods_id) + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + __URLS('SHOP_MAIN/wap/goods/detail/' + goods_id) + '">复制链接</span> </div> </div> </div>';
            }

            if(pc == 1){
                html += ' <div class="form-group"> <label class="col-md-2 control-label">电脑端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + goods_id) + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + goods_id) + '">复制链接</span> </div> </div> </div> ';
            }
            if(mini == 1){
                html += ' <div class="form-group"> <label class="col-md-2 control-label">小程序端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + 'pages/goods/detail/index?goodsId=' + goods_id + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + 'pages/goods/detail/index?goodsId=' + goods_id + '">复制链接</span> </div> </div> </div> ';
            }
            if(wap == 1) {
                html += '</form> ' +
                    '<div class="flex link-flex"> ' +
                    '<div class="flex-1"> <div class="mb-04"><img src="' + __URL(PLATFORMMAIN + '/goods/getGoodsDetailQr') + '?goods_id=' + goods_id + '&qr_type=1&wap_path=/wap/goods/detail/" style="width: 100px;height: 100px"></div> <p>(手机端二维码)</p> </div> ';
            }
            if(mini == 1){
                html += '<div class="flex-1"> <div class="mb-04"><img src="'+ __URL(PLATFORMMAIN + '/goods/getGoodsDetailQr') +'?goods_id='+ goods_id +'&qr_type=2&mp_path=pages/goods/detail/index" style="width: 100px;height: 100px"></div> <p>(小程序二维码)</p> </div>';
            }
            html += ' </div> </div>';
            $(this).find('.link-pos').html(html);
            $(this).attr('mark', true);
            mark = true;
        })
        $('#group_shopping_list').on('click', '.btn-operation', function () {
            var type = $(this).attr('data-type');
            var group_id = $(this).attr('data-group_id');
            switch (type) {
                case 'edit':
                    location.href = __URL('ADDONS_MAINupdateGroupShopping&group_id=' + group_id);
                    break;
                case 'info':
                    location.href = __URL('ADDONS_MAINgroupShoppingDetail&group_id=' + group_id);
                    break;
                case 'history':
                    location.href = __URL('ADDONS_MAINgroupRecord&group_id=' + group_id);
                    break;
            }
        });
        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            var group_type = type;
            $.ajax({
                type: "post",
                url: "<?php echo $groupShoppingListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "search_text": $("#search_text").val(),
                    "group_type": group_type
                    
                },
                success: function (data) {
                    var html = '<tr><td class="h-200" colspan="6">暂无符合条件的数据记录</td></tr>';
                     if(data.data){
                        if (tpl('shop_curr_list', {data:data.data, addon_status:data.addon_status})) {
                            for(var i = 0;i < data.data.length; i++){
                                data.data[i]['pic_cover_mid'] = __IMG( data.data[i]['pic_cover_mid']);
                            }
                            $("#group_shopping_list").html(tpl('shop_curr_list', {data:data.data, addon_status:data.addon_status}));
                            util.tips();
                        } else {
                            $("#group_shopping_list").html(html);
                        }
                        $('#page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                     }else{
                         $("#group_shopping_list").html(html);
                     }
                }
            });
        }
        util.copy();
    });


</script>
