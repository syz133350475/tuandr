<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/www/wwwroot/www.tuandr.com/addons/groupshopping/template/platform/groupRecordDetail.html";i:1583811704;}*/ ?>

<div class="col-md-12 padding-15 bg-f5 mb-20">
    <div class="media text-left ">
        <div class="media-left">
            <p><img src="<?php echo __IMG($groupRecord['goods']['pic_cover_mid']); ?>" style="width:80px;height:80px;"></p>
        </div>
        <div class="media-body max-w-300 ">
            <div class="line-2-ellipsis line-title">
                团编号：<?php echo $groupRecord['record_no']; ?>
            </div>
            <div class="line-2-ellipsis line-title">
                商品名称：<?php echo $groupRecord['goods']['goods_name']; ?>
            </div>
            
            <div class="line-2-ellipsis line-title">
                成团人数：<?php echo $groupRecord['group_num']; ?>
            </div>
            <div class="line-2-ellipsis line-title">
                <?php if($groupRecord['status']==1): ?>
                <span class="text-success">拼团成功</span>
                <?php elseif($groupRecord['status']==0): ?>
                <span class="text-warning">等待成团</span>
                <?php else: ?>
                <span class="text-danger">拼团失败</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<table class="table v-table table-auto-center">
    <thead>
        <tr>
            <th>会员</th>
            <th>拼团价</th>
            <th>购买数量</th>
            <th>实付金额</th>
            <th>订单状态</th>
            <th>下单时间</th>
        </tr>
    </thead>
    <tbody id="group_shopping_list">
    </tbody>
</table>
<input type="hidden" id="page_index">
<input type="hidden" id="record_id" value="<?php echo $record_id; ?>">
<input type="hidden" id="buyer_id" value="<?php echo $groupRecord['uid']; ?>">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>


<script id="shop_curr_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td>
            <div class="media text-left ">
                <div class="media-left">
                    <p><img src="<%item.buyer.user_headimg%>" style="width:60px;height:60px;"></p>
                </div>
                <div class="media-body max-w-300 ">
                    <div class="line-2-ellipsis line-title">
                        <%if item.buyer.user_name%>
                        <%item.buyer.user_name%>
                        <%else%>
                        <%item.buyer.nick_name%>
                        <%/if%>
                    </div>
                    <div class="line-2-ellipsis line-title">
                        <%item.buyer.level_name%>
                    </div>
                    <%if item.is_head%>
                    <div class="line-2-ellipsis line-title bg-primary text-center" style='border-radius:2px;'>
                        团长
                    </div>
                    <%/if%>
                </div>
            </div>
        </td>
        <td><%item.price%></td>
        <td><%item.num%></td>
        <td><%item.real_price%></td>
        <td><%if item.order_status == 5%>已关闭<%else if item.order_status == 0%>未支付<%else%>已支付<%/if%></td>
        <td><%item.create_time%></td>
    </tr>
    <%/each%>
</script>
<script>
    require(['util', 'tpl'], function (util, tpl) {
        util.initPage(LoadingInfo);
        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            var record_id = $('#record_id').val();
            var buyer_id = $('#buyer_id').val();
            if(!record_id){
                return;
            }
            $.ajax({
                type: "post",
                url: "<?php echo $getGroupMemberListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "record_id": record_id,
                    "buyer_id": buyer_id
                },
                success: function (data) {
                    var html = '<tr><td class="h-200" colspan="6">暂无符合条件的数据记录</td></tr>';
                    if (data.data) {
                        if (tpl('shop_curr_list', data)) {
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
