<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"/www/wwwroot/www.tuandr.com/addons/distribution/template/platform/distributionProfile.html";i:1583811698;}*/ ?>

			<!-- page -->
			<div class="flex-auto-center mb-20 bg-info text-center border-info">
				<div class="flex-1 padding-15">
					<h3 class="strong">分销商总数</h3>
					<p id="account_money"></p>
				</div>
				<div class="flex-1 padding-15">
					<h3 class="strong">今日新增分销商</h3>
					<p id="account_sum"></p>
				</div>
				<div class="flex-1 padding-15">
					<h3 class="strong">分销商佣金</h3>
					<p id="account_pay"></p>
				</div>
				<div class="flex-1 padding-15">
					<h3 class="strong">已提现佣金</h3>
					<p id="account_return"></p>
				</div>
			</div>
			<div class="h-500" id="situation"></div>
			<!-- page end -->
	
	
<script>
    require(['util'],function(util){
        getOrderCount();
        showCharts();
        //统计详情
        function getOrderCount(){
            $.ajax({
                type : "post",
                url : "<?php echo $distributionProfileUrl; ?>",
                async : true,
                data : {'website_id':<?php echo $website_id; ?>},
                success : function(data) {
                    $("#account_money").html(data.distributor_total);
                    $("#account_sum").html(data.distributor_today);
                    $("#account_pay").html(data.commission_total);
                    $("#account_return").html(data.withdrawals_total);
                }
            })
        }
        //显示统计图
        function  showCharts(){
            //type 走势图类型  1 数量
            $.ajax({
                type : "post",
                url : "<?php echo $distributionOrderProfileUrl; ?>",
                async : true,
                data : {'website_id':<?php echo $website_id; ?>},
                success : function(datas) {
                    var data = eval(datas);
                    var orderOption = {
                        title: {
                            text: '近七日分销订单走势'
                        },
                        tooltip: {
                            trigger: 'axis'
                        },
                        legend: {
                            data: data.ordertype
                        },
                        grid: {
                            left: '3%',
                            right: '4%',
                            bottom: '3%',
                            containLabel: true
                        },
                        // toolbox: {
                        //     feature: {
                        //         saveAsImage: {}
                        //     }
                        // },
                        xAxis: {
                            type: 'category',
                            boundaryGap: false,
                            data:  data.day
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: data.all
                    };
                    util.chart('situation',orderOption)
                }
            });
        }





    })
</script>

