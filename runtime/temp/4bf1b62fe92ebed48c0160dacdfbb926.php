<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/www/wwwroot/www.tuandr.com/addons/areabonus/template/platform/areaAgentList.html";i:1583811698;}*/ ?>

        <form class="v-filter-container">
            <div class="filter-fields-wrap">
                <div class="filter-item clearfix">
                    <div class="filter-item__field">
                        <div class="v__control-group">
                            <label class="v__control-label">代理商名称</label>
                            <div class="v__controls">
                                <input type="text" id="search_text" class="v__control_input" placeholder="代理商用户名/昵称" autocomplete="off">
                            </div>
                        </div>

                        <div class="v__control-group">
                            <label class="v__control-label">手机号</label>
                            <div class="v__controls">
                                <input type="text" id="iphone" class="v__control_input" autocomplete="off" placeholder="手机号">
                            </div>
                        </div>

                        <div class="v__control-group">
                            <label class="v__control-label">代理商等级</label>
                            <div class="v__controls">
                                <select class="v__control_input" id="level" >
                                    <option value="">请选择等级...</option>
                                    <?php if(is_array($agent_level) || $agent_level instanceof \think\Collection || $agent_level instanceof \think\Paginator): if( count($agent_level)==0 ) : echo "" ;else: foreach($agent_level as $key=>$value): ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['level_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
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
                                <a class="btn btn-primary search"><i class="icon icon-search"></i> 搜索</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

		<div class="screen-title">
			<span class="text">信息列表</span>
		</div>
		<ul class="nav nav-tabs v-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#all" aria-controls="all"  data-type="all" role="tab" data-toggle="tab" class="flex-auto-center alluser" data-id="5">全部<br><span class="all_count"></span></a></li>
			<li role="presentation"><a href="#audited" aria-controls="audited"  data-type="audited" role="tab" data-toggle="tab" class="flex-auto-center audited" data-id="2">已审核<br><span class="audited_count"></span></a></li>
			<li role="presentation"><a href="#pending" aria-controls="pending" data-type="pending" role="tab" data-toggle="tab" class="flex-auto-center pending" data-id="1">待审核<span class="pending_count"></span></a></li>
			<li role="presentation"><a href="#refused" aria-controls="refused" data-type="refused" role="tab" data-toggle="tab" class="flex-auto-center refused" data-id="-1">已拒绝<span class="refused_count"></span></a></li>
		</ul>
		<table class="table v-table table-auto-center">
			<thead>
			<tr>
				<th>代理商</th>
				<th>手机</th>
				<th>代理商等级/代理区域</th>
				<th>累积分红/已发放分红</th>
				<th>状态</th>
				<th class="col-md-2 pr-14 operationLeft">操作</th>
			</tr>
			</thead>
			<tbody id="list">




			</tbody>
		</table>
		<input type="hidden" id="page_index" value="">
		<nav aria-label="Page navigation" class="clearfix">
			<ul id="page" class="pagination pull-right"></ul>
		</nav>
<input type="hidden" id="merchant_expire" value="<?php echo $merchant_expire; ?>">
		<!-- page end -->


<script>
    require(['util'],function(util){
        util.initPage(getList(1,5));
        function getList(page_index,status){
            $("#page_index").val(page_index);
            var merchant_expire= $("#merchant_expire").val();
            var level = $("#level").val();
            var search_text = $("#search_text").val();
            var iphone = $("#iphone").val();
            $.ajax({
                type : "post",
                url : '<?php echo $areaAgentListUrl; ?>',
                async : true,
                data : {
                    "page_index" :page_index, "search_text" : search_text, "level_id" : level, "is_area_agent" : status,"iphone":iphone
                },
                success : function(data) {
                    var html = '';
                    
                    if (data["data"].length>0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            if(data['data'][i]["user_headimg"]){
                                html += '<td><img src="' + __IMG(data['data'][i]["user_headimg"]) + '" width="30" height="30">';
                            }else{
                                html += '<td><img src="/public/static/images/headimg.png" width="30" height="30">';
                            }
                            html += '<span class="block mt-04">' + data['data'][i]["user_name"] + '</span></td>';
                            html += '<td ><span class="block">' + data['data'][i]["mobile"] + '</span></td>';
                            html += '<td ><p class="p"><span class="block">' +data["data"][i]["level_name"] +'</span></p>';
                            for(var j=0;j<data["data"][i]["area_type"].length;j++){
                                html +=  '<p class="p"><span class="block">' +data["data"][i]["area_type"][j] +'(' +data["data"][i]["area_name"][j] +')</span></p>';
                            }
                            html += '</td>';
                            if(data["data"][i]['account']){
                                html += '<td><p class="p">';
                                html += '<span class="label label-success">累积：'+ data["data"][i]['account']["total_bonus"] +'元</span>';
                                html += '</p>';
                                html += '<span class="label label-danger">已发放：'+ data["data"][i]['account']["grant_bonus"] +'元</span></td>';
                            }else{
                                html += '<td><p class="p">';
                                html += '<span class="label label-success">累积：0.00元</span>';
                                html += '</p>';
                                html += '<span class="label label-danger">已发放：0.00元</span></td>';
                            }
                            if(merchant_expire==1){
                                html += '<td rowspan="7" class="col-md-2">';
                                html += '无权操作';
                                html += '</td>';
                            }else{
                                if(data["data"][i]['is_area_agent'] == 2){
                                    html += '<td><a href="javascript:;" class="label label-success">已审核</a></td>';
                                    if(merchant_expire==1){
                                        html += '<td><a href="javascript:;">无权操作</a></td>';
                                    }else{
                                        html += '<td class="operationLeft fs-0"><a class="btn-operation" href="'+__URL('ADDONS_MAINareaAgentInfo&agent_id='+ data['data'][i]['uid']) +'">详情</a>';
                                        html += '<a class="btn-operation" href="'+__URL('ADDONS_MAINareaAgentOrderList&agent_id='+ data['data'][i]['uid']) +'">订单</a>';
                                        html += '<a class="btn-operation del" href="javascript:;" data-id="'+ data['data'][i]['uid']+'">移除</a>';
                                        html += '</td>';
                                    }
                                }else if(data["data"][i]['is_area_agent'] == 1){
                                    html += '<td><a href="javascript:;" class="label label-danger">待审核</a></td>';
                                    if(merchant_expire==1){
                                        html += '<td><a href="javascript:;">无权操作</a></td>';
                                    }else{
                                        html += '<td class="operationLeft fs-0"><a href="javascript:;" class="btn-operation isexamine save" data-type=2 data-id="'+ data["data"][i]['uid']+'">通过</a><a href="javascript:void(0);" class="btn-operation isexamine save" data-type=-1 data-id="'+ data["data"][i]['uid']+'">拒绝</a></td>';
                                    }
                                }else if(data["data"][i]['is_area_agent'] == -1){
                                    html += '<td ><a href="javascript:;" class="label label-danger">审核不通过</a></td>';
                                    if(merchant_expire==1){
                                        html += '<td><a href="javascript:;">无权操作</a></td>';
                                    }else{
                                        html += '<td class="operationLeft fs-0"><a href="javascript:;" class="btn-operation isexamine save" data-type=2 data-id="'+ data["data"][i]['uid']+'">重新审核</a><a href="javascript:;" class="btn-operation text-red1 del" data-id="' + data['data'][i]['uid'] +'">删除</a></td>';
                                    }
                                }
                            }
                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td class="h-200" colspan="6">暂无符合条件的数据记录</td></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $('.all_count').html('('+data['count']+')');
                    $('.audited_count').html('('+data['count1']+')');
                    $('.pending_count').html('('+data['count2']+')');
                    $('.refused_count').html('('+data['count3']+')');
                    $("#list").html(html);
                }
            });
        }
        $('.search').on('click',function(){
            util.initPage(getList(1,5));
        });
        $('.alluser').on('click',function(){
            util.initPage(getList(1,5));
        });
        $('.audited').on('click',function(){
            util.initPage(getList(1,2));
        });
        $('.pending').on('click',function(){
            util.initPage(getList(1,1));
        });
        $('.refused').on('click',function(){
            util.initPage(getList(1,-1));
        });
        $('body').on('click','.del',function(){
            var uid = $(this).data('id');
            util.alert('是否移除代理商？',function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo $delAreaAgentUrl; ?>",
                    data:{'uid':uid},
                    async : true,
                    success : function(data) {
                        if(data["code"] > 0 ){
                            util.message(data["message"], 'success', getList($("#page_index").val(),5));
                        }else{
                            util.message(data["message"], 'danger');
                        }
                    }
                });
            })
        })
        $('body').on('click','.save',function(){
            var status = $(this).data('type');
            var uid = $(this).data('id');
            if(status==-1){
                util.alert('确定审核不通过？',function(){
                    $.ajax({
                        type : "post",
                        url : "<?php echo $setAreaAgentStatusUrl; ?>",
                        data:{'uid':uid,'status':status},
                        async : true,
                        success : function(data) {
                            if(data["code"] > 0 ){
                                util.message(data["message"], 'success', getList($("#page_index").val(),5));
                            }else{
                                util.message(data["message"], 'danger');
                            }
                        }
                    });
                })
            }else{
                util.alert('确定审核通过？',function(){
                    $.ajax({
                        type : "post",
                        url : "<?php echo $setAreaAgentStatusUrl; ?>",
                        data:{'uid':uid,'status':status},
                        async : true,
                        success : function(data) {
                            if(data["code"] > 0 ){
                                util.message(data["message"], 'success', getList($("#page_index").val(),5));
                            }else{
                                util.message(data["message"], 'danger');
                            }
                        }
                    });
                })
            }
        })
    })
</script>

