<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/www.tuandr.com/addons/smashegg/template/admin/smasheggList.html";i:1583811704;}*/ ?>

        <!-- page -->
		<div class="mb-20">
            <a href="<?php echo __URL('ADDONS_ADMIN_MAINaddSmashegg'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i>添加砸金蛋</a>
            <div class="input-group search-input-group ml-10" style="float:right">
                <input type="text" class="form-control" placeholder="活动名称" id="search_text" value="">
                <span class="input-group-btn">
                    <button id="search" class="btn btn-primary" type="button">搜索</button>
                </span>
            </div>
        </div>
        <ul id="smash_egg_tab" class="nav nav-tabs v-nav-tabs fs-12">
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
                <th>每人参与次数</th>
                <th>参与人数</th>
                <th>中奖次数</th>
                <th>活动时间</th>
                <th>状态</th>
                <th class="col-md-2 pr-14 operationLeft">操作</th>
            </tr>
            </thead>
            <tbody id="smash_egg_list">
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
        <td><%item.smashegg_name%></td>
		<%if item.max_partake == 0 %>
			<td>无限</td>
		<%else%>
			<td><%item.max_partake%></td>
		<%/if%>
        <td><%item.partakeNum%></td>
        <td><%item.winningNum%></td>
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
            <a href="javascript:;" class="btn-operation" data-type="edit" data-id="<%item.smash_egg_id%>">编辑</a>
            <!--<a href="javascript:;" class="btn-operation copy" data-clipboard-text="<?php echo $receiveUrl; ?>/<%item.smash_egg_id%>">活动链接</a>-->
            <a class="btn-operation link-pr" href="javascript:void(0);"> <span>链接</span>
                <div class="link-pos">
                    <div class="link-arrow">
                        <form class="form-horizontal">
                            <%if addon_status.wap_status == 1%>
                            <div class="form-group"><label class="col-md-2 control-label">手机端</label>
                                <div class="col-md-10">
                                    <div class="input-group"><input class="form-control" type="text" disabled
                                                                    value="<%__URLS('SHOP_MAIN/wap/smashegg/centre/'+item.smash_egg_id)%>"> <span
                                            class="input-group-btn btn btn-primary bbllrr0 copy"
                                            data-clipboard-text="<%__URLS('SHOP_MAIN/wap/smashegg/centre/'+item.smash_egg_id)%>">复制链接</span> </div>
                                </div>
                            </div>
                            <%/if%>
                            <%if addon_status.is_minipro == 1%>
                            <div class="form-group"><label class="col-md-2 control-label">小程序端</label>
                                <div class="col-md-10">
                                    <div class="input-group"><input class="form-control" type="text" disabled
                                                                    value="package/pages/smashegg/smashegg?smasheggid=<%item.smash_egg_id%>"> <span
                                            class="input-group-btn btn btn-primary bbllrr0 copy"
                                            data-clipboard-text="package/pages/smashegg/smashegg?smasheggid=<%item.smash_egg_id%>">复制链接</span> </div>
                                </div>
                            </div>
                            <%/if%>
                            <!--<%if addon_status.is_pc_use == 1%>-->
                            <!--<div class="form-group"><label class="col-md-2 control-label">电脑端</label>-->
                            <!--<div class="col-md-10">-->
                            <!--<div class="input-group"><input class="form-control" type="text" disabled-->
                            <!--value="<%__URLS('SHOP_MAIN/goods/goodsinfo&goodsid='+item.smash_egg_id)%>"> <span-->
                            <!--class="input-group-btn btn btn-primary bbllrr0 copy"-->
                            <!--data-clipboard-text="<%__URLS('SHOP_MAIN/goods/goodsinfo&goodsid='+item.smash_egg_id)%>">复制链接</span> </div>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--<%/if%>-->
                        </form>
                        <div class="flex link-flex">
                            <%if addon_status.wap_status == 1%>
                            <div class="flex-1">
                                <div class="mb-04"><img
                                        src="<%__URL('admin/goods/getGoodsDetailQr')+'?smash_egg_id='+item.smash_egg_id +'&qr_type=1&wap_path=/wap/smashegg/centre/'%>" style="width: 100px;height: 100px">
                                </div>
                                <p>(手机端二维码)</p></div>
                            <%/if%>
                            <%if addon_status.is_minipro == 1%>
                            <div class="flex-1">
                                <div class="mb-04"><img
                                        src="<%__URL('admin/goods/getGoodsDetailQr')+'?smash_egg_id='+item.smash_egg_id +'&qr_type=2&mp_path=package/pages/smashegg/smashegg'%>" style="width: 100px;height: 100px">
                                </div>
                                <p>(小程序二维码)</p>
                            </div>
                            <%/if%>
                        </div>
                    </div>
                </div>
            </a>
            <a href="javascript:;" class="btn-operation" data-type="history" data-id="<%item.smash_egg_id%>">记录</a>
            <a href="javascript:;" class="btn-operation" data-type="info" data-id="<%item.smash_egg_id%>">详情</a>
			<%if item.state == 3 %>
            <a href="javascript:;" data-id="<%item.smash_egg_id%>" class="text-danger del">删除</a>
			<%/if%>
        </td>
    </tr>
    <%/each%>
</script>

<script>
    require(['utilAdmin', 'tpl', 'util'], function (utilAdmin, tpl, util) {
        utilAdmin.initPage(LoadingInfo);
        util.copy();
        tpl.helper('__URLS',function(str){
            return  __URLS(str)
        })
        tpl.helper('__URL',function(str){
            return  __URL(str)
        })
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
        
        $('#smash_egg_list').on('click', '.del', function () {
            var id = $(this).attr('data-id');
                utilAdmin.alert('删除？', function () {
                    $.ajax({
                        type: "post",
                        url: "<?php echo $deleteSmasheggUrl; ?>",
                        data: {"smash_egg_id": id},
                        dataType: "json",
                        success: function (data) {
                            if (data["code"] > 0) {
                                utilAdmin.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                            } else {
                                utilAdmin.message(data['message']);
                            }
                        }
                    })
                })
        })

        $('#smash_egg_list').on('click', '.btn-operation', function () {
            var type = $(this).attr('data-type');
            var id = $(this).attr('data-id');
            switch (type) {
                case 'edit':
                    location.href = __URL('ADDONS_ADMIN_MAINupdateSmashegg&smash_egg_id=' + id);
                    break;
                case 'info':
                    location.href = __URL('ADDONS_ADMIN_MAINsmasheggDetail&smash_egg_id=' + id);
                    break;
                case 'history':
                    location.href = __URL('ADDONS_ADMIN_MAINhistorySmashegg&smash_egg_id=' + id);
                    break;
            }
        })

        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $smasheggListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "search_text": $("#search_text").val(),
                    "state": $("#state").val(),
                },
                success: function (data) {
                    html ='';
                    html += '<tr><td class="h-200" colspan="7">暂无符合条件的数据记录</td></tr>';
                    if(tpl('shop_curr_list', data)){
                        $("#smash_egg_list").html(tpl('shop_curr_list', data));
                        $('#page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                    }else{
                        $("#smash_egg_list").html(html);
                    }
                    $("#num-whole").html('全部<br>('+data.count.whole+')');
                    $("#num-start").html('活动中<br>('+data.count.start+')');
                    $("#num-stay").html('待开始<br>('+data.count.stay+')');
                    $("#num-end").html('已结束<br>('+data.count.end+')');
					util.copy();
                }
            });
        }
        
        $("#search").on('click', function () {
        	LoadingInfo(1);
        });
        
        $('#smash_egg_tab').on('click', '.flex-auto-center', function () {
        	$('#state').val($(this).data('state'));
        	LoadingInfo(1);
        })
    })
</script>

