<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/www/wwwroot/www.tuandr.com/addons/followgift/template/platform/followgiftList.html";i:1583811694;}*/ ?>

        <!-- page -->
		<div class="mb-20">
            <a href="<?php echo __URL('ADDONS_MAINaddFollowgift'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i>添加活动</a>
            <div class="input-group search-input-group ml-10" style="float:right">
                <input type="text" class="form-control" placeholder="活动名称" id="search_text" value="">
                <span class="input-group-btn">
                    <button id="search" class="btn btn-primary" type="button">搜索</button>
                </span>
            </div>
        </div>
        <ul id="follow_gift_tab" class="nav nav-tabs v-nav-tabs fs-12">
            <li role="presentation" class="active"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="true" data-state="" id="num-whole">全部<br>(0)</a></li>
            <li role="presentation"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false" data-state="2" id="num-start">活动中<br>(0)</a></li>
            <li role="presentation"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false" data-state="1" id="num-stay">待开始<br>(0)</a></li>
            <li role="presentation"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false" data-state="3" id="num-end">已结束<br>(0)</a></li>
        </ul>
        <input type="hidden" name="state" value="" id="state" autocomplete="off">
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th>活动名称</th>
                <th>关注方式</th>
                <th>活动时间</th>
                <th>状态</th>
                <th class="col-md-2 pr-14 operationLeft">操作</th>
            </tr>
            </thead>
            <tbody id="follow_gift_list">
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
        <td><%item.followgift_name%></td>
        <td>
			<%if item.modes == 1 %>
			首次关注
			<%/if%>
		</td>
        <td>
            <span><%timeStamp(item.start_time)%></span>
            ~
            <span><%timeStamp(item.end_time)%></span>
        </td>
		<td>
			<%if item.state == 1 %>
        	<p class="label label-warning">待开始</p>
        	<%else if item.state == 2 %>
			<p class="label label-success">进行中</p>
			<%else if item.state == 3 %>
			<p class="label label-danger">已结束</p>
			<%/if%>
		</td>
        <td class="fs-0 operationLeft">
            <a href="javascript:;" class="btn-operation" data-type="edit" data-id="<%item.follow_gift_id%>">编辑</a>
            <a href="javascript:;" class="btn-operation" data-type="history" data-id="<%item.follow_gift_id%>">记录</a>
            <a href="javascript:;" class="btn-operation" data-type="info" data-id="<%item.follow_gift_id%>">详情</a>
			<%if item.state == 3 %>
            <a href="javascript:;" data-id="<%item.follow_gift_id%>" class="btn-operation text-red1 del">删除</a>
			<%/if%>
        </td>
    </tr>
    <%/each%>
</script>

<script>
    require(['util', 'tpl'], function (util, tpl) {
        util.initPage(LoadingInfo);
        tpl.helper("timeStamp", function (timeStamp) {
            if (timeStamp > 0) {
                var date = new Date();
                date.setTime(timeStamp * 1000);
                var y = date.getFullYear();
                var m = date.getMonth() + 1;
                m = m < 10 ? ('0' + m) : m;
                var d = date.getDate();
                d = d < 10 ? ('0' + d) : d;
                var h = date.getHours();
                h = h < 10 ? ('0' + h) : h;
                var minute = date.getMinutes();
                var second = date.getSeconds();
                minute = minute < 10 ? ('0' + minute) : minute;
                second = second < 10 ? ('0' + second) : second;
                return y + '-' + m + '-' + d + ' ' + h + ':' + minute + ':' + second;
            } else {
                return "";
            }
        });
        
        $('#follow_gift_list').on('click', '.del', function () {
            var id = $(this).attr('data-id');
                util.alert('删除？', function () {
                    $.ajax({
                        type: "post",
                        url: "<?php echo $deleteFollowgiftUrl; ?>",
                        data: {"follow_gift_id": id},
                        dataType: "json",
                        success: function (data) {
                            if (data["code"] > 0) {
                                util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                            } else {
                                util.message(data['message']);
                            }
                        }
                    })
                })
        })

        $('#follow_gift_list').on('click', '.btn-operation', function () {
            var type = $(this).attr('data-type');
            var id = $(this).attr('data-id');
            switch (type) {
                case 'edit':
                    location.href = __URL('ADDONS_MAINupdateFollowgift&follow_gift_id=' + id);
                    break;
                case 'info':
                    location.href = __URL('ADDONS_MAINfollowgiftDetail&follow_gift_id=' + id);
                    break;
                case 'history':
                    location.href = __URL('ADDONS_MAINhistoryFollowgift&follow_gift_id=' + id);
                    break;
            }
        })

        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $followgiftListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "search_text": $("#search_text").val(),
                    "state": $("#state").val(),
                },
                success: function (data) {
                    html ='';
                    html += '<tr><td class="h-200" colspan="5">暂无符合条件的数据记录</td></tr>';
                    if(tpl('shop_curr_list', data)){
                        $("#follow_gift_list").html(tpl('shop_curr_list', data));
                        $('#page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                    }else{
                        $("#follow_gift_list").html(html);
                    }
                    $("#num-whole").html('全部<br>('+data.count.whole+')');
                    $("#num-start").html('活动中<br>('+data.count.start+')');
                    $("#num-stay").html('待开始<br>('+data.count.stay+')');
                    $("#num-end").html('已结束<br>('+data.count.end+')');
                }
            });
        }
        
        $("#search").on('click', function () {
        	LoadingInfo(1);
        });
        
        $('#follow_gift_tab').on('click', '.flex-auto-center', function () {
        	$('#state').val($(this).data('state'));
        	LoadingInfo(1);
        })
    })
</script>

