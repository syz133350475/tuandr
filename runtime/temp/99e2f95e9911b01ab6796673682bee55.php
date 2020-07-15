<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/www/wwwroot/www.tuandr.com/addons/groupshopping/template/platform/groupRecord.html";i:1583811704;}*/ ?>

<div class="col-md-12 padding-15 bg-f5 mb-20">
    <div class="media text-left ">
        <div class="media-left">
            <p><img src="<?php echo __IMG($groupDetail['goods']['pic_cover_mid']); ?>" style="width:60px;height:60px;" onerror="this.src='/public/platform/images/custom/nogoods.png';"></p>
        </div>
        <div class="media-body">
            <div class="line-2-ellipsis line-title">
                商品名称：<?php echo $groupDetail['goods']['goods_name']; ?>
            </div>
            <div class="line-2-ellipsis line-title">
                拼团价：
                <?php if($groupDetail['goods']['min_price'] == $groupDetail['goods']['max_price']): ?>
                    ￥<?php echo $groupDetail['goods']['min_price']; else: ?>
                    ￥<?php echo $groupDetail['goods']['min_price']; ?>~￥<?php echo $groupDetail['goods']['max_price']; endif; ?>
            </div>
            <div class="line-2-ellipsis line-title">
                成团人数：<?php echo $groupDetail['group_num']; ?>
            </div>
        </div>
    </div>
</div>
<ul id="record_status" class="nav nav-tabs v-nav-tabs fs-12">
    <li role="presentation" class="active" data-status="1"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="true">拼团成功</a></li>
    <li role="presentation" class="" data-status="0"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false">等待成团</a></li>
    <li role="presentation" class="" data-status="-1"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false">拼团失败</a></li>
    <div class="input-group search-input-group ml-10" style="float:right">
        <input type="text" class="form-control" placeholder="团编号" id="search_text" value="">
        <span class="input-group-btn">
            <button class="btn btn-primary search" type="button">搜索</button>
        </span>
    </div>
    <div class="form-group ml-10" style="float:right">
        <div class="date-input-group date_style">
            <div class="date-input-control" style="width: 220px">
                <input type="text" class="form-control fs-12" id="date" placeholder="时间区间" value="" autocomplete="off"><i class="icon icon-calendar"></i>
            </div>
        </div>
    </div>
</ul>
<table class="table v-table table-auto-center">
    <thead>
        <tr>
            <th>团编号</th>
            <th>团长</th>
            <th>参团人数/成团人数</th>
            <th>开团时间</th>
            <th>状态</th>
            <th>订单状态</th>
            <th class="col-md-2 pr-14 operationLeft">操作</th>
        </tr>
    </thead>
    <tbody id="group_shopping_list">
    </tbody>
</table>
<input type="hidden" id="page_index">
<input type="hidden" id="group_id" value="<?php echo $group_id; ?>">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>


<script id="shop_curr_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td><%item.record_no%></td>
        <td>
            <div class="media text-left ">
                <div class="media-left">
                    <p><img src="<%item.user_headimg%>" style="width:60px;height:60px;"></p>
                </div>
                <div class="media-body max-w-300 ">
                    <div class="line-2-ellipsis line-title">
                        <%if item.user_name%>
                        <%item.user_name%>
                        <%else%>
                        <%item.nick_name%>
                        <%/if%>
                    </div>
                    <div class="line-2-ellipsis line-title">
                        <%item.level_name%>
                    </div>
                </div>
            </div>
        </td>

        <td>
           <%item.now_num%>/<%item.group_num%>
        </td>
        <td> <%item.create_time%></td>
        <td>
            <%if item.status==1%>
            <span class="text-success">拼团成功</span>
            <%else if item.status==0%>
            <span class="text-warning">等待成团</span>
            <%else%>
            <span class="text-danger">拼团失败</span>
            <%/if%>
        </td>
        <td>
            <%if item.order_status==1%>
            <span class="text-success">退款成功</span>
            <%else if item.order_status==-1%>
            <span class="text-warning">部分退款失败</span>
            <%/if%>
        </td>
        <td class="operationLeft fs-0">
            <a href="javascript:void(0);" class="btn-operation" data-type="detail" record_id="<%item.record_id%>">详情</a>
        </td>
    </tr>
    <%/each%>
</script>
<script>
    require(['util', 'tpl'], function (util, tpl) {
        var startDate = '';
        var endDate = '';
        util.initPage(LoadingInfo);
        // util.date('#date', {"opens": "left", single: false}, function (start, end) {
        //     startDate = start.format('YYYY-MM-DD');
        //     endDate = end.format('YYYY-MM-DD');
        // });
        util.layDate('#date',true,function(value, date, endDate){
            startDate=date.year+"-"+date.month+"-"+date.date;
            endDate=endDate.year+"-"+endDate.month+"-"+endDate.date;
        });
        var record_status = $('#record_status').find('li.active').data('status');
        $('#record_status').on('click', 'li', function () {
            record_status = $(this).data('status');
            LoadingInfo(1);
        });
        $('#group_shopping_list').on('click', '.btn-operation', function () {
            var type = $(this).attr('data-type');
            var record_id = $(this).attr('record_id');
            switch (type) {
                case 'detail':
                    location.href = __URL('ADDONS_MAINgroupRecordDetail&record_id=' + record_id);
                    break;
            }
        });
        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            var group_id = $('#group_id').val();
            if(!group_id){
                return;
            }
            $.ajax({
                type: "post",
                url: "<?php echo $getGroupRecordListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "search_text": $("#search_text").val(),
                    "record_status": record_status,
                    "startDate": startDate,
                    "endDate": endDate,
                    "group_id": group_id

                },
                success: function (data) {
                    var html = '<tr><td class="h-200" colspan="7">暂无符合条件的数据记录</td></tr>';
                    if (data.data) {
                        if (tpl('shop_curr_list', data)) {
                            for(var i = 0;i < data.data.length; i++){
                                data.data[i]['user_headimg'] = __IMG( data.data[i]['user_headimg']);
                            }
                            $("#group_shopping_list").html(tpl('shop_curr_list', data));
                        } else {
                            $("#group_shopping_list").html(html);
                        }
                        $('#page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                    } else {
                        $("#group_shopping_list").html(html);
                    }
                }
            });
        }
    })


</script>
