<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/www.tuandr.com/addons/shop/template/platform/shopOrderList.html";i:1586931648;}*/ ?>





        <!-- page -->
<form class="v-filter-container">
    <div class="filter-fields-wrap">
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label">订单编号</label>
                    <div class="v__controls">
                        <input type="text" id="order_no" class="v__control_input" placeholder="请输入订单编号" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">商品信息</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="goods_name" placeholder="商品名称/商品编号" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">快递单号</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="express_no" placeholder="请输入快递单号" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">会员信息</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="user" autocomplete="off" placeholder="手机号码/会员ID/用户名/昵称">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">支付方式</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="payment_type">
                            <option value="">全部</option>
                            <option value="1">微信</option>
                            <option value="2">支付宝</option>
                            <option value="3">银行卡</option>
                            <option value="5">余额支付</option>
                            <option value="16">eth支付</option>
                            <option value="17">eos支付</option>
                        </select>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">订单类型</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="order_type">
                            <option value="">全部</option>
                            <?php if(is_array($orderTypeList) || $orderTypeList instanceof \think\Collection || $orderTypeList instanceof \think\Paginator): $i = 0; $__LIST__ = $orderTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ot): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $ot['type_id']; ?>"><?php echo $ot['type_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">下单时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="orderTime">
                            <input type="text" class="v__control_input pr-30" id="orderTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="orderStartDate">
                            <input type="hidden" id="orderEndDate">
                        </label>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">付款时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="payTime">
                            <input type="text" class="v__control_input pr-30" id="payTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="payStartDate">
                            <input type="hidden" id="payEndDate">
                        </label>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">发货时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="deliveryTime">
                            <input type="text" class="v__control_input pr-30" id="deliveryTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="sendStartDate">
                            <input type="hidden" id="sendEndDate">
                        </label>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">完成时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="completeTime">
                            <input type="text" class="v__control_input pr-30" id="completeTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="finishStartDate">
                            <input type="hidden" id="finishEndDate">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label"></label>
                    <div class="v__controls">
                        <a class="btn btn-primary search" id="search"><i class="icon icon-search"></i> 搜索</a>
                        <a class="btn btn-success ml-15 dataExcel" id="data_excel">导出EXCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

        <div class="screen-title">
            <span class="text">订单列表</span>
        </div>
        <table class="table v-table table-auto-center mb-10">
            <thead>
            <tr>
                <!--<th width="20"><input type="checkbox"></th>-->
                <th class="col-md-3">商品</th>
                <th class="col-md-1">单价</th>
                <th class="col-md-1">数目</th>
                <th class="col-md-2">买家/收货人</th>
                <th class="col-md-1">订单状态</th>
                <th class="col-md-2 operationLeft">实收</th>
                <th class="col-md-2 pr-14 operationLeft">操作</th>
            </tr>
            </thead>
        </table>
        <div class="tables" id="list">

        </div>
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="page" class="pagination pull-right"></ul>
        </nav>


<script type="text/javascript">
    require(['util'], function (util) {
        util.initPage(LoadingInfo);
        // util.layDate("#startCreateDate");
        // util.layDate("#endCreateDate");
        // util.layDate("#startPayDate");
        // util.layDate("#endPayDate");
        // util.layDate("#startSendDate");
        // util.layDate("#endSendDate");
        // util.layDate("#startFinishDate");
        // util.layDate("#endFinishDate");
        util.layDate('#orderTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;
            if(value){
                $('#orderStartDate').val(date1);
                $('#orderEndDate').val(date2);
            }
            else{
                $('#orderStartDate').val('');
                $('#orderEndDate').val('');
            }
        });
        util.layDate('#payTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;
            if(value){
                $('#payStartDate').val(date1);
                $('#payEndDate').val(date2);
            }
            else{
                $('#payStartDate').val('');
                $('#payEndDate').val('');
            }
        });
        util.layDate('#deliveryTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;
            if(value){
                $('#sendStartDate').val(date1);
                $('#sendEndDate').val(date2);
            }
            else{
                $('#sendStartDate').val('');
                $('#sendEndDate').val('');
            }
        });
        util.layDate('#completeTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;
            if(value){
                $('#finishStartDate').val(date1);
                $('#finishEndDate').val(date2);
            }
            else{
                $('#finishStartDate').val('');
                $('#finishEndDate').val('');
            }
        });
        function LoadingInfo(page_index) {
            var order_no = $("#order_no").val();
            var start_create_date = $("#orderStartDate").val();
            var end_create_date = $("#orderEndDate").val();
            var start_pay_date = $("#payStartDate").val();
            var end_pay_date = $("#payEndDate").val();
            var start_send_date = $("#sendStartDate").val();
            var end_send_date = $("#sendEndDate").val();
            var start_finish_date = $("#finishStartDate").val();
            var end_finish_date = $("#finishEndDate").val();
            var user = $("#user").val();
            var express_no = $("#express_no").val();
            var goods_name = $("#goods_name").val();
            var order_status = $("#order_status").val();
            var payment_type = $("#payment_type").val();
            var order_type = $("#order_type").val();
            var url = "<?php echo $shopOrderListUrl; ?>";
            $.ajax({
                type: "post",
                url: url,
                async: true,
                data: {
                    "page_index": page_index,
                    "page_size": $("#showNumber").val(),
                    "order_no": order_no,
                    "order_status": order_status,
                    "start_create_date": start_create_date,
                    "end_create_date": end_create_date,
                    "start_pay_date": start_pay_date,
                    "end_pay_date": end_pay_date,
                    "start_send_date": start_send_date,
                    "end_send_date": end_send_date,
                    "start_finish_date": start_finish_date,
                    "end_finish_date": end_finish_date,
                    "user": user,
                    "express_no": express_no,
                    "goods_name": goods_name,
                    "payment_type": payment_type,
                    "order_type": order_type,
                    "website_id": "<?php echo $website_id; ?>"
                },
                success: function (data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        //alert(JSON.stringify(data["data"][1]['order_item_list'][0]["goods_sku_list"]));
                        for (var i = 0; i < data["data"].length; i++) {
                            var out_trade_no = data["data"][i]["out_trade_no"];//交易号
                            var shop_name = data["data"][i]["shop_name"];//店铺名
                            var order_id = data["data"][i]["order_id"];//订单id
                            var order_no = data["data"][i]["order_no"];//订单编号
                            var reciever_name = data["data"][i]['receiver_name']; //买家姓名
                            var receiver_mobile = data["data"][i]['receiver_mobile']; //买家电话
                            var create_time = timeStampTurnTime(data["data"][i]["create_time"]);//下单时间
                            var pic_cover_micro = data["data"][i]["order_item_list"][0]["picture"]['pic_cover_micro'];//商品图
                            var goods_id = data["data"][i]["order_item_list"][0]["goods_id"];//商品id
                            var goods_name = data["data"][i]["order_item_list"][0]["goods_name"];
                            var sku_name = data["data"][i]["order_item_list"][0]["sku_name"];//商品sku
                            var price = data["data"][i]["order_item_list"][0]["price"];//商品价格
                            var num = data["data"][i]["order_item_list"][0]["num"];//购买数量
                            var order_money = data["data"][i]["order_money"];//订单金额
                            var shipping_money = data["data"][i]["shipping_money"]-data["data"][i]["promotion_free_shipping"];//运费
                            var goods_code = data["data"][i]["order_item_list"][0]["code"];
                            var spec_info = data["data"][i]["order_item_list"][0]["spec"];
                            var shipping_type_name = data["data"][i]["shipping_type_name"];//配送方式
                            var order_type_name = data["data"][i]['order_type_name'];//订单类型
                            var order_type_color = data["data"][i]['order_type_color'];//订单类型颜色            
                            var commission = data["data"][i]["commission"];
                            var bonus = data["data"][i]["bonus"];
                            html += '<table class="table v-table table-auto-center mb-10"><tbody><tr>';
                            html += '<td colspan="7" class="text-left bg-f9"><input id="' + out_trade_no + '" type="hidden" value="' + order_id + '" name="sub" class="text-left bg-f9">';
                            html += '<span class="label label-soft mr-15-oList">' + shop_name + '</span><span class="mr-15-oList">订单编号：' + order_no + ' 交易号：' + out_trade_no + '</span><span class="mr-15-oList">下单时间：' + create_time + '</span>';
                            if (shipping_type_name) {
                                html += '<span class="mr-15-oList">配送方式：' + shipping_type_name + '</span>';
                            }
                            if (order_type_name) {
                                html += '<span class="mr-15-oList">订单类型：<span class="label" style="background:#fb6638">' + order_type_name + ' </span></span>';
                            }
                            html += '</td></tr>';
                            html += '<tr><td class="col-md-3">';
                            html += '<div class="media text-left">';
                            html += '<div class="media-left"><img src="' + __IMG(pic_cover_micro) + '" width="60" height="60"></div>';
                            html += '<div class="media-body break-word">';
                            html += '<div class="line-2-ellipsis">';
                            html += '<a href="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + goods_id) + '" target="_blank">' + goods_name + '</a>';
                            html += '</div>';
                            html += '<div class="small-muted line-2-ellipsis">';
                            $.each(spec_info,function (spec_k,spec_v) {
                                html += spec_v['spec_name'] + ':' + spec_v['spec_value_name'] + ' ';
                            })
                            html += '</div>';
                            // if (sku_name != null && sku_name != "") {
                            //     html += '<p class="specification" style="margin-bottom: 0px;"><span style="color:#8e8c8c;font-size:12px;">' + sku_name + '</span></p>';
                            // }
                            // if (goods_code != null && goods_code != "") {
                            //     html += '<p class="specification"><span style="color:#8e8c8c;font-size:12px;">编码&nbsp;&nbsp;' + goods_code + '</span></p></div>';
                            // }
                            html += '</div>';
                            html += '</div></td>';
                            var row = 1;//订单数量，用于设置跨行
                            if (data["data"][i]["order_item_list"].length != null) {
                                row = data["data"][i]["order_item_list"].length;
                            }

                            html += '<td class="col-md-1">￥'+ price +'</td>';
                            html += '<td class="col-md-1">' + num + '</td>';
                            if (row > 1) {
                                html += '<td  rowspan="'+ row +'" class="col-md-2 border-left">';
                            }
                            else{
                                html += '<td  rowspan="'+ row +'" class="col-md-2">';
                            }
                            if(data["data"][i]['shipping_type'] == '2'){
                                html += '<a href="' + __URL('PLATFORM_MAIN/member/memberDetail?member_id=' + data["data"][i]['buyer_id']) + '" class="text-primary block mt-04" target="_blank">' + data["data"][i]['buyer_name'] + '</a>' + data["data"][i]['user_name'] + '<br>' + data["data"][i]['user_tel'] + '';
                            }else{
                                html += '<a href="' + __URL('PLATFORM_MAIN/member/memberDetail?member_id=' + data["data"][i]['buyer_id']) + '" class="text-primary block mt-04" target="_blank">' + data["data"][i]['buyer_name'] + '</a>' + reciever_name + '<br>' + receiver_mobile + '';
                            }
                            html += '</td>';
                            html += '<td  rowspan="'+ row +'" class="col-md-1">';
                            // if(data["data"][i]["order_status"]=='3' || data["data"][i]["order_status"]=='4') {
                            //     html += '<span class="label label-success">' + data["data"][i]["status_name"] + '</span>';
                            // }else{
                            //     html += '<span class="label label-danger">' + data["data"][i]["status_name"] + '</span>';
                            // }
                            if(data["data"][i]["order_status"] == '0'){
                                html += '<span class="label label-red">' + data["data"][i]["status_name"] + '</span>';
                            }else if(data["data"][i]["order_status"] == '1'){
                                html += '<span class="label label-skyBlue">' + data["data"][i]["status_name"] + '</span>';
                            }else if(data["data"][i]["order_status"] == '2'){
                                html += '<span class="label label-orange">' + data["data"][i]["status_name"] + '</span>';
                            }else if(data["data"][i]["order_status"] == '3' || data["data"][i]["order_status"] == '4'){
                                html += '<span class="label label-green">' + data["data"][i]["status_name"] + '</span>';
                            }else if(data["data"][i]["order_status"] == '5'){
                                html += '<span class="label label-grey">' + data["data"][i]["status_name"] + '</span>';
                            }else{
                                html += '<span class="label label-orange2">' + data["data"][i]["status_name"] + '</span>';
                            }
                            
                            html += '</td>';
                            html += '<td class="text-right col-md-2" rowspan="' + row + '" >';
                            if(data["data"][i]['presell_id']){
                            	html += '定金：￥' + data["data"][i]['first_money'] + '<br> 尾款：￥' + data["data"][i]['final_money'] + '<br>';
                            }else{
                            	html += '商品总额：￥' + data["data"][i]['goods_money'] + '<br>';
                            }
                            if(data["data"][i]['deduction_money']>0){
                            	html += '积分抵扣：￥' + data["data"][i]['deduction_money'] + '<br>';
                            }
                            	html += '优惠：￥' + data["data"][i]['order_promotion_money'] + '<br>';
                           		html += '运费：￥' + shipping_money + '<br>';
                                if (data["data"][i]['invoice_tax'] > 0) {
                                    html += '税费：￥' + data["data"][i]['invoice_tax'] + '';
                                }
                            if(data["data"][i]['presell_id']){
                            	if(data["data"][i]['money_type']==1){
                            		html += '<br>实收金额：￥' + data["data"][i]['pay_money'] + '<br>';
                            	}else if(data["data"][i]['money_type']==2){
                            		html += '<br>实收金额：￥' + order_money + '<br>';
                            	}
                            }else{
                            	html += '<br>实收金额：￥' + order_money + '<br>';
                            }
                            html += '</td>';
                            html += '<td rowspan="'+ row +'" class="col-md-2 operationLeft">';
                            html += '<a href="'+__URL('PLATFORM_MAIN/order/orderdetail?order_id='+order_id)+'" class="btn-operation" target="_blank">详情</a>';
                            html += '</td>';
                            html += '</tr>';
                            //循环订单项
                            //前边已经加载过一次了，所以从第二次开始循环
                            for (var j = 1; j < data["data"][i]["order_item_list"].length; j++) {
                                var pic_cover_micro = data["data"][i]["order_item_list"][j]["picture"]['pic_cover_micro'];//商品图
                                var goods_id = data["data"][i]["order_item_list"][j]["goods_id"];//商品id
                                var goods_name = data["data"][i]["order_item_list"][j]["goods_name"];//商品名称
                                var sku_name = data["data"][i]["order_item_list"][j]["sku_name"];//sku名称
                                var price = data["data"][i]["order_item_list"][j]["price"];//价格
                                var num = data["data"][i]["order_item_list"][j]["num"];//购买数量
                                var spec_info = data["data"][i]["order_item_list"][j]["spec"];

                                var goods_code = data["data"][i]["order_item_list"][j]["code"];
                                html += '<tr><td class="col-md-3">';
                                html += '<div class="media text-left">';
                                html += '<div class="media-left"><img src="' + __IMG(pic_cover_micro) + '" width="60" height="60"></div>';
                                html += '<div class="media-body break-word">';
                                html += '<div class="line-2-ellipsis">';
                                html += '<a href="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + goods_id) + '" target="_blank">' + goods_name + '</a>';
                                html += '</div>';
                                html += '<div class="small-muted line-2-ellipsis">';
                                $.each(spec_info,function (spec_k,spec_v) {
                                    html += spec_v['spec_name'] + ':' + spec_v['spec_value_name'] + ' ';
                                })
                                html += '</div>';
                                html += '</div></div></td>';

                                html += '<td class="col-md-1">￥'+ price +'</td>';
                                html += '<td class="col-md-1">' + num + '</td>';
                                html += '</tr>';
                            }
                            if(data["data"][i]['commissionA']|| data["data"][i]['commissionB'] || data["data"][i]['commissionC'] || data["data"][i]['global_bonus'] || data["data"][i]['area_bonus'] || data["data"][i]['team_bonus'] || data["data"][i]['profitA']|| data["data"][i]['profitB'] || data["data"][i]['profitC']){
                                html += '<tr class="title-tr">';
                                    html += '<td colspan="7" class="text-left">';
                                    if (data["data"][i]['commissionA_id']) {
                                        if (data["data"][i]['commissionA']) {
                                            html += '<span class="label label-soft mr-15-oList">一级佣金：' + data["data"][i]['commissionA'] + '元</span>';
                                        }
                                        if (data["data"][i]['pointA']) {
                                            html += '<span class="label label-soft mr-15-oList">一级积分：' + data["data"][i]['pointA'] + '积分</span>';
                                        }
                                    }
                                    if (data["data"][i]['commissionB_id']) {
                                        if (data["data"][i]['commissionB']) {
                                            html += '<span class="label label-soft mr-15-oList">二级佣金：' + data["data"][i]['commissionB'] + '元</span>';
                                        }
                                        if (data["data"][i]['pointB']) {
                                            html += '<span class="label label-soft mr-15-oList">二级积分：' + data["data"][i]['pointB'] + '积分</span>';
                                        }
                                    }
                                    if (data["data"][i]['commissionC_id']) {
                                        if (data["data"][i]['commissionC']) {
                                            html += '<span class="label label-soft mr-15-oList">三级佣金：' + data["data"][i]['commissionC'] + '元</span>';
                                        }
                                        if (data["data"][i]['pointC']) {
                                            html += '<span class="label label-soft mr-15-oList">三级积分：' + data["data"][i]['pointC'] + '积分</span>';
                                        }
                                    }
                                    if (data["data"][i]['global_bonus']) {
                                        html += '<span class="label label-success mr-15-oList">全球分红：' + data["data"][i]['global_bonus'] + '元</span>';
                                    }
                                    if (data["data"][i]['area_bonus']) {
                                        html += '<span class="label label-success mr-15-oList">区域分红：' + data["data"][i]['area_bonus'] + '元</span>';
                                    }
                                    if (data["data"][i]['team_bonus']) {
                                        html += '<span class="label label-success mr-15-oList">团队分红：' + data["data"][i]['team_bonus'] + '元</span>';
                                    }
                                    if (data["data"][i]['profitA_id'] && data["data"][i]['profitA']) {
                                        html += '<span class="label label-soft mr-15-oList">一级收益：' + data["data"][i]['profitA'] + '元</span>';
                                    }
                                    if (data["data"][i]['profitB_id'] && data["data"][i]['profitB']) {
                                        html += '<span class="label label-soft mr-15-oList">二级收益：' + data["data"][i]['profitB'] + '元</span>';
                                    }
                                    if (data["data"][i]['profitC_id'] && data["data"][i]['profitC']) {
                                        html += '<span class="label label-soft mr-15-oList">三级收益：' + data["data"][i]['profitC'] + '元</span>';
                                    }

                                    html += '</td>';
                                html += '</tr>';
                            }
                        }
                        html +='</tbody></table>';
                    } else {
                        html += '<table class="table v-table table-auto-center mb-10"><tbody><tr align="center"><td colspan="7" class="h-200">暂无符合条件的数据记录</td></tr></tbody></table>';
                    }
                    
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#list").html(html);
                    util.tips();
                }
            });
        }

        $('#search').on('click',function(){
            util.initPage(LoadingInfo);
        });

        $('#data_excel').on('click',function () {
            dataExcel();
        })

        $("#search_text").keypress(function (e) {
            if (e.keyCode == 13) {
                LoadingInfo(1);
            }
        });

        function dataExcel(){
            var url='url:'+__URL(PLATFORMMAIN + '/order/dataExcel');
            util.confirm('订单导出',url,function(){
            	var ids = '';
	        	$(".excel-list .field-item").each(function(){
	            	var id = $(this).data('id');
	            	ids += id + ',';
	        	});
	            var order_no = $("#order_no").val();
	            var start_create_date = $("#orderStartDate").val();
	            var end_create_date = $("#orderEndDate").val();
	            var start_pay_date = $("#payStartDate").val();
	            var end_pay_date = $("#payEndDate").val();
	            var start_send_date = $("#sendStartDate").val();
	            var end_send_date = $("#sendEndDate").val();
	            var start_finish_date = $("#finishStartDate").val();
	            var end_finish_date = $("#finishEndDate").val();
	            var user = $("#user").val();
	            var express_no = $("#express_no").val();
	            var goods_name = $("#goods_name").val();
	            var payment_type = $("#payment_type").val();
	            var order_type = $("#order_type").val();
				if(ids.length==0){
					util.message('请添加模板字段');
					return false;
				}
	            window.location.href = __URL("PLATFORM_MAIN/order/orderDataExcel?" +
	                    "order_no=" + order_no +
	                    "&start_create_date=" + start_create_date +
	                    "&end_create_date=" + end_create_date +
	                    "&start_pay_date=" + start_pay_date +
	                    "&end_pay_date=" + end_pay_date +
	                    "&start_send_date=" + start_send_date +
	                    "&end_send_date=" + end_send_date +
	                    "&start_finish_date=" + start_finish_date +
	                    "&end_finish_date=" + end_finish_date +
	                    "&user=" + user +
	                    "&express_no=" + express_no +
	                    "&goods_name=" + goods_name +
	                    "&payment_type=" + payment_type +
	                    "&order_type=" + order_type +
	                    "&type=2" +
	                    "&ids=" + ids
	            );
            },'xlarge');
        }
    })
</script>

