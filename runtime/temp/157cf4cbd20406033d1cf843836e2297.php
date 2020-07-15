<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"/www/wwwroot/www.tuandr.com/addons/distribution/template/platform/distributorLevelList.html";i:1583811698;}*/ ?>

			<!-- page -->

			<div class="mb-20">
				<a href="<?php echo __URL('ADDONS_MAINaddDistributorLevel'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加等级</a>
			</div>

			<table class="table v-table table-auto-center">
				<thead>
				<tr>
					<th>等级名称</th>
					<?php if($website['distribution_pattern']>=1): ?>
					<th>一级返佣</th>
					<?php endif; if($website['distribution_pattern']>=2): ?>
					<th>二级返佣</th>
					<?php endif; if($website['distribution_pattern']>=3): ?>
					<th>三级返佣</th>
					<?php endif; ?>
					<th>升级条件</th>
					<th>降级条件</th>
					<th>权重</th>
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
			<!-- page end -->
<input type="hidden" id="pattern" value="<?php if($website['distribution_pattern']): ?><?php echo $website['distribution_pattern']; else: ?>0<?php endif; ?>">


<script>
    require(['util'],function(util){
        util.initPage(getList);
        var pattern = $('#pattern').val();
        function isInArray(arr,value){
            for(var i = 0; i < arr.length; i++){
                if(value === arr[i]){
                    return true;
                }
            }
            return false;
        }
        function getList(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type : "post",
                url : "<?php echo $distributorLevelListUrl; ?>",
                async : true,
                data : {
                    "page_index" : page_index, "website_id":<?php echo $website_id; ?>
                },
                success : function(data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            html += '<td>' + data["data"][i]["level_name"] + '</td>';
                            if (pattern>=1){
                                if(data["data"][i]["recommend_type"]==1){
                                    html += '<td>' + data["data"][i]["commission1"] + '%佣金<br>' + data["data"][i]["commission_point1"] + '%积分</td>';
								}else{
                                    html += '<td>' + data["data"][i]["commission11"] + '元佣金<br>' + data["data"][i]["commission_point11"] + '积分</td>';
								}
							}
                            if(pattern>=2){
                                if(data["data"][i]["recommend_type"]==1){
                                    html += '<td>' + data["data"][i]["commission2"] + '%佣金<br>' + data["data"][i]["commission_point2"] + '%积分</td>';
                                }else{
                                    html += '<td>' + data["data"][i]["commission22"] + '元佣金<br>' + data["data"][i]["commission_point22"] + '积分</td>';
                                }
							}
                            if(pattern>=3){
                                if(data["data"][i]["recommend_type"]==1){
                                    html += '<td>' + data["data"][i]["commission3"] + '%佣金<br>' + data["data"][i]["commission_point3"] + '%积分</td>';
                                }else{
                                    html += '<td>' + data["data"][i]["commission33"] + '元佣金<br>' + data["data"][i]["commission_point33"] + '积分</td>';
                                }
                            }
                            html += '<td>';
                            if(data["data"][i]["upgradetype"]==1){
                                var arr = data["data"][i]["upgradeconditions"].split(',');
                                if(data["data"][i]["number1"]>0 && isInArray(arr,"7")){
                                    html += '一级分销商达'+data["data"][i]["number1"]+'人<br>';
                                }
                                if(data["data"][i]["number2"]>0 && isInArray(arr,"8")){
                                    html += '二级分销商达'+data["data"][i]["number2"]+'人<br>';
                                }
                                if(data["data"][i]["number3"]>0 && isInArray(arr,"9")){
                                    html += '三级分销商达'+data["data"][i]["number3"]+'人<br>';
                                }
                                if(data["data"][i]["number4"]>0 && isInArray(arr,"10")){
                                    html += '团队人数达'+data["data"][i]["number4"]+'人<br>';
                                }
                                if(data["data"][i]["number5"]>0 && isInArray(arr,"11")){
                                    html += '下线人数达'+data["data"][i]["number5"]+'人<br>';
                                }
                                if(data["data"][i]["level_number"]>0 && isInArray(arr,"12")){
                                    html += '指定等级'+data["data"][i]["upgrade_level_name"]+'达'+data["data"][i]["level_number"]+'人<br>';
                                }
                                if(data["data"][i]["offline_number"]>0 && isInArray(arr,"1")){
                                    html += '下线总人数达'+data["data"][i]["offline_number"]+'人<br>';
                                }
                                if(data["data"][i]["order_money"]>0 && isInArray(arr,"2")){
                                    html += '分销订单金额满'+data["data"][i]["order_money"]+'元<br>';
                                }
                                if(data["data"][i]["order_number"]>0 && isInArray(arr,"3")){
                                    html += '分销订单数'+data["data"][i]["order_number"]+'单<br>';
                                }
                                if(data["data"][i]["selforder_money"]>0 && isInArray(arr,"4")){
                                    html += '内购订单金额满'+data["data"][i]["selforder_money"]+'元<br>';
                                }
                                if(data["data"][i]["selforder_number"]>0 && isInArray(arr,"5")){
                                    html += '内购订单数'+data["data"][i]["selforder_number"]+'单<br>';
                                }
                                if(data["data"][i]["goods_id"] && isInArray(arr,"6")){
                                    html += '购买指定商品'+data["data"][i]["goods_name"]+'<br>';
                                }
                            }else{
                                html += '无';
                            }
                            html += '</td>';
                            html += '<td>';
                            if(data["data"][i]["downgradetype"]==1){
                                var arr1 = data["data"][i]["downgradeconditions"].split(',');
                                if(data["data"][i]["team_number"]>0 && isInArray(arr1,"1")){
                                    html += '距上次升级'+data["data"][i]["team_number_day"]+'天内团队订单量少于'+data["data"][i]["team_number"]+'个<br>';
                                }
                                if(data["data"][i]["team_money"]>0 && isInArray(arr1,"2")){
                                    html += '距上次升级'+data["data"][i]["team_money_day"]+'天内团队订单金额少于'+data["data"][i]["team_money"]+'元<br>';
                                }
                                if(data["data"][i]["self_money"]>0 && isInArray(arr1,"3")){
                                    html += '距上次升级'+data["data"][i]["self_money_day"]+'天内内购订单金额少于'+data["data"][i]["self_money"]+'元<br>';
                                }
                            }else{
                                html += '无';
                            }
                            html += '</td>';
                            html += '<td>' + data["data"][i]["weight"] + '</td>';
                            if(data["data"][i]["is_default"]==1){
                                html += '<td class="operationLeft"><a class="btn-operation"  href="'+ __URL('ADDONS_MAINupdateDistributorLevel&id='+ data['data'][i]['id'])+'">编辑</a>';
                            }else{
                                html += '<td class="operationLeft"><a class="btn-operation"  href="'+ __URL('ADDONS_MAINupdateDistributorLevel&id='+ data['data'][i]['id'])+'">编辑</a>';
                                html +=	'<a class="btn-operation del text-red1" href="javascript:;" data-id="'+ data['data'][i]['id']+'" >删除</a></td>';
                            }

                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td class="h-200" colspan="7">暂无符合条件的数据记录</td></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#list").html(html);del();
                }
            });
        }
        function del(){
            $('.del').on('click',function(){
                var id = $(this).data('id');
                util.alert('确定删除该等级？',function(){
                    $.ajax({
                        type : "post",
                        url : "<?php echo $deleteDistributorLevelUrl; ?>",
                        data : {
                            'id' : id
                        },
                        async : true,
                        success : function(data) {
                            if (data['code'] > 0) {
                                util.message(data["message"], 'success', getList($("#page_index").val()));
                            } else {
                                util.message(data["message"], 'danger', getList($("#page_index").val()));
                            }
                        }
                    });
                })
            })
		}

    })
</script>
