<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/www.tuandr.com/addons/delivery/template/platform/batchPrint.html";i:1587970156;}*/ ?>

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
                    <label class="v__control-label">用户信息</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="user" placeholder="用户姓名/昵称/手机号码" autocomplete="off">
                    </div>
                </div>

                <div class="v__control-group">
                    <label class="v__control-label">订单状态</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="order_status"></select>
                    </div>
                </div>

                <div class="v__control-group">
                    <label class="v__control-label">快递单状态</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="express_order_status"></select>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">发货单状态</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="delivery_order_status"></select>
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
    <span class="text">订单列表</span>
</div>
<table class="table v-table table-auto-center" id="list"></table>
<input type="hidden" id="page_index">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>
<div class="mb-20 J-button hidden">
    <a class="btn btn-info J-form-print">打印电子面单</a>
    <a class="btn btn-primary J-express-print">打印快递单</a>
    <a class="btn btn-primary J-delivery-print">打印发货单</a>
    <a class="btn btn-info J-delivery">一键发货</a>
</div>



<script id="tpl_status" type="text/html">
    <%each data as item index%>
    <option value="<%item.status_id%>" <%if selected == item.status_id %>selected<%/if%> ><%item.status_name%></option>
    <%/each%>
</script>
<script id="tpl_input" type="text/html">
    <input type="text" class="<%input_class%>" id="<%id%>" value="<%value%>">
</script>
<script id="tpl_select" type="text/html">
    <select type="text" class="<%input_class%>" data-index="<%index%>" id="<%id%>"></select>
</script>
<script id="tpl_province" type="text/html">
    <%each data as item index%>
    <option value="<%index%>"><%item%></option>
    <%/each%>
</script>
<script id="tpl_city" type="text/html">
    <%each data as item index%>
    <option value="<%index%>"><%item%></option>
    <%/each%>
</script>
<script id="tpl_district" type="text/html">
    <%each data as item index%>
    <option value="<%index%>"><%item%></option>
    <%/each%>
</script>
<script src='PLATFORM_NEW_JS/CLodopfuncs.js'></script>
<script id="tpl_order_list" type="text/html">
    <thead>
    <tr>
        <th style="width: 50px;">
            <input type="checkbox" id="select_all">
        </th>
        <th class="text-left">
            <div class="inline-block mr-15">
                <span>订单数:<%order_num%></span>
            </div>
            <div class="inline-block">
                <span>订单总额:<%order_amount%></span>
            </div>
        </th>
        <th>单价/数量</th>
        <th>实付/支付方式</th>
        <th>订单状态</th>
        <th>打印状态</th>
    </tr>
    </thead>
    <%each data as item index%>
    <tbody>
    <tr class="bg-f9">
        <td>
            <input class="J-order-checkbox" data-order-id="<%item.order_id%>" type="checkbox">
        </td>
        <td colspan="5" class="text-left">
            <span class="mr-15-oList">订单号:<%item.order_no%></span>
            <span class="mr-15-oList">下单时间:<%timeStampTurnTime(item.create_time)%></span>
            <span class="mr-15-oList">配送方式:<%item.shipping_type_name%> </span>
            <span id="name_<%index%>" class="mr-15-oList">收件人:<%item.receiver_name%> </span>
            <span id="mobile_<%index%>" class="mr-15-oList">电话:<%item.receiver_mobile%> </span>
            <span id="address_<%index%>" class="mr-15-oList">收货地址:<%item.receiver_province_name%> <%item.receiver_city_name%> <%item.receiver_district_name%> <%item.receiver_address%> </span>
            <span class="mr-15-oList"><a href="javascript:;" class="text-primary J-edit"
                                   data-order-id="<%item.order_id%>" data-index="<%index%>">编辑</a> </span>
            <span class="mr-15-oList"><i class="icon icon-down-arrow J-expand" data-order-id="<%item.order_id%>"></i> </span>
        </td>
    </tr>
    <%each item.order_item_list as goods i%>
    <tr class="hidden" data-order-id="<%item.order_id%>">
        <td>
            <input class="J-order-goods-checkbox" data-order-id="<%item.order_id%>"
                   data-order-goods-id="<%goods.order_goods_id%>" type="checkbox">
        </td>
        <td>
            <div class="media text-left">
                <div class="media-left">
                    <img src="<%__IMG(goods.picture.pic_cover_micro)%>" width="60" height="60">
                </div>
                <div class="media-body max-w-300">
                    <div class="line-2-ellipsis">
                        <a href="<%__URLS(goods.order_goods_id)%>" target="_blank"><%goods.goods_name%></a>
                    </div>
                    <div class="small-muted line-2-ellipsis"><%goods.spec%></div>
                </div>
                <div>
        </td>
        <td>
            <div>￥<%goods.price%></div>
            <span>x<%goods.num%></span>
        </td>
        <%if i == 0%>
        <td rowspan="<%item.order_item_list.length%>"
        <%if item.order_item_list.length != 1%>class="border-left"<%/if%>>
        <div>￥<%item.order_money%></div>
        <label class="label label-info"><%item.pay_type_name%></label>
        </td>
        <td rowspan="<%item.order_item_list.length%>"
        <%if item.order_item_list.length != 1%>class="border-left"<%/if%>>
        <label class="label label-danger"><%item.status_name%></label>
        <a href="<%__URL(item.order_id)%>" class="text-primary block">订单详情</a>
        </td>
        <%/if%>
        <td
        <%if item.order_item_list.length != 1%>class="border-left"<%/if%>>
        <div class="<%if goods.express_print_num > 0%>bg-primary<%else%>bg-f5<%/if%>">快递单x<%goods.express_print_num%>
        </div>
        <div class="<%if goods.delivery_print_num > 0%>bg-primary<%else%>bg-f5<%/if%>">
            发货单x<%goods.delivery_print_num%>
        </div>
        </td>
    </tr>
    <%/each%>
    <tr class="hidden" data-order-id="<%item.order_id%>">
        <td colspan="6"><textarea data-order-id="<%item.order_id%>" data-index="<%index%>" class="form-control" name="memo" rows="4"><%item.order_memo%></textarea></td>
    </tr>
    </tbody>
    <%/each%>
    <%if data == '' || data.length == 0%>
    <tbody>
    <tr>
        <td colspan="6" class="text-center">暂无符合条件的订单</td>
    </tr>
    </tbody>
    <%/if%>
</script>
<script>
    require(['util', 'tpl', 'lodop'], function (util, tpl, lodop) {
        // var start_create_date = ''// 保存时间插件回调时间
        // var end_create_date = ''
        var order_list = [] // 保存修改的收货人信息

        orderStatus();
        tpl.helper("timeStampTurnTime", function (value) {
            return timeStampTurnTime(value)
        });
        tpl.helper("__URLS", function (goods_id) {
            return __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + goods_id)
        });
        tpl.helper("__URL", function (order_id) {
            return __URL('PLATFORM_MAIN/order/orderdetail?order_id=' + order_id)
        });
        tpl.helper("__IMG", function (src) {
            return __IMG(src)
        });
        // util.layDate('#orderCreateDate', true, function (value, startDate, endDate) {
        //     start_create_date = startDate.year + '-' + startDate.month + '-' + startDate.date;
        //     end_create_date = endDate.year + '-' + endDate.month + '-' + endDate.date;
        // });
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

        // 省市区
        var province_list = {}
        var city_list = {}
        var district_list = {}
        $.ajax({
            type: 'post',
            url: '<?php echo $areaUrl; ?>',
            async: false,
            success: function (data) {
                province_list = data.province
                city_list = data.city
                district_list = data.district
            }
        })

        $("#list").on('change', '#select_all', function () {
            var $this = $(this);
            $("#list").find("input[type='checkbox']").prop('checked', $this.prop('checked'))
        })

        $("#list").on("change", ".J-order-checkbox", function () {
            var $this = $(this);
            var order_id = $this.data('order-id');
            $("#list").find("input[type='checkbox'][data-order-id=" + order_id + "]").prop('checked', $this.prop('checked'))
        })

        $("#list").on("change", '.J-order-goods-checkbox', function () {
            var $this = $(this);
            var order_id = $this.data('order-id');
            var order_goods_check_num = $("#list").find(".J-order-goods-checkbox[data-order-id=" + order_id + "]:checked").length;
            if (order_goods_check_num == 0) {
                $("#list").find("input[type='checkbox'][data-order-id=" + order_id + "]").prop('checked', false)

                var order_checked_num = $("#list").find(".J-order-checkbox:checked").length;
                if (order_checked_num == 0) {
                    $("#select_all").prop('checked', false);
                }
            }
        })

        $("#list").on('click', '.J-edit', function () {
            var index = $(this).data('index')
            $("#name_" + index).html(tpl('tpl_input', {
                input_class: '',
                id: 'input_name_' + index,
                value: order_list[index]['receiver_name']
            }))
            $("#mobile_" + index).html(tpl('tpl_input', {
                input_class: '',
                id: 'input_mobile_' + index,
                value: order_list[index]['receiver_mobile']
            }))
            $("#address_" + index).html(
                tpl('tpl_select', {input_class: 'J-province', index: index, id: 'province_' + index}) +
                tpl('tpl_select', {input_class: 'J-city', index: index, id: 'city_' + index}) +
                tpl('tpl_select', {input_class: 'J-district', index: index, id: 'district_' + index}) +
                tpl('tpl_input', {
                    input_class: '',
                    id: 'input_address_' + index,
                    value: order_list[index]['receiver_address']
                })
            )
            province(index, order_list[index]['receiver_province'])
            city(index, order_list[index]['receiver_province'], order_list[index]['receiver_city'])
            district(index, order_list[index]['receiver_city'], order_list[index]['receiver_district'])
            $(this).removeClass('J-edit').addClass('J-save').html('保存');
        })

        $("#list").on('click', '.J-save', function () {
            var index = $(this).data('index')
            var order_id = $(this).data('order-id')
            var receiver_name = $("#input_name_" + index).val();
            var receiver_mobile = $("#input_mobile_" + index).val()
            var receiver_province_id = $("#province_" + index).val()
            var receiver_province_name = $("#province_" + index + " option:selected").html()
            var receiver_city_id = $("#city_" + index).val()
            var receiver_city_name = $("#city_" + index + " option:selected").html()
            var receiver_district_id = $("#district_" + index).val()
            var receiver_district_name = $("#district_" + index + " option:selected").html()
            var receiver_address = $("#input_address_" + index).val()
            $("#name_" + index).html('收件人:' + receiver_name)
            $("#mobile_" + index).html('电话:' + receiver_mobile)
            $("#address_" + index).html(
                "收货地址:" + receiver_province_name + " " + receiver_city_name + " " + receiver_district_name + " " + receiver_address
            )
            $(this).removeClass('J-save').addClass('J-edit').html('编辑');

            // console.log(order_list[index]['receiver_name'] != receiver_name,order_list[index]['receiver_name'],receiver_name)
            // console.log(order_list[index]['receiver_mobile'] != receiver_mobile,order_list[index]['receiver_mobile'],receiver_mobile)
            // console.log(order_list[index]['receiver_province'] != receiver_province_id,order_list[index]['receiver_province'],receiver_province_id)
            // console.log(order_list[index]['receiver_city'] != receiver_city_id,order_list[index]['receiver_city'],receiver_city_id)
            // console.log(order_list[index]['receiver_district'] != receiver_district_id,order_list[index]['receiver_district'],receiver_district_id)
            // console.log(order_list[index]['receiver_address'] != receiver_address,order_list[index]['receiver_address'],receiver_address)
            // return false;
            if (order_list[index]['receiver_name'] != receiver_name ||
                order_list[index]['receiver_mobile'] != receiver_mobile ||
                order_list[index]['receiver_province'] != receiver_province_id ||
                order_list[index]['receiver_city'] != receiver_city_id ||
                order_list[index]['receiver_district'] != receiver_district_id ||
                order_list[index]['receiver_address'] != receiver_address
            ) {
                // 保存数据
                order_list[index]['receiver_name'] = receiver_name;
                order_list[index]['receiver_mobile'] = receiver_mobile;
                order_list[index]['receiver_province'] = receiver_province_id;
                order_list[index]['receiver_city'] = receiver_city_id;
                order_list[index]['receiver_district'] = receiver_district_id;
                order_list[index]['receiver_address'] = receiver_address;

                syncReceiver([order_id], {
                    mobile: receiver_mobile,
                    province_id: receiver_province_id,
                    city_id: receiver_city_id,
                    district_id: receiver_district_id,
                    address: receiver_address,
                    name: receiver_name
                })
            }
        })

        $("#list").on('click', '.J-expand', function () {
            var order_id = $(this).data('order-id');
            $("tr[data-order-id='" + order_id + "'").removeClass('hidden')
            $(this).removeClass('J-expand').removeClass('icon-down-arrow').addClass('J-unexpand').addClass('icon-up-arrow')
        })

        $("#list").on('click', '.J-unexpand', function () {
            var order_id = $(this).data('order-id');
            $("tr[data-order-id='" + order_id + "'").addClass('hidden')
            $(this).removeClass('J-unexpand').removeClass('icon-up-arrow').addClass('J-expand').addClass('icon-down-arrow')
        })

        $("#list").on('blur', 'textarea[name=memo]', function () {
            var index = $(this).data('index')
            var order_id = $(this).data('order-id')
            var memo = $(this).val();
            if ($.trim(order_list[index]['order_memo']) != $.trim(memo)) {
                $.ajax({
                    url: "<?php echo __URL('PLATFORM_MAIN/order/addMemo'); ?>",
                    type: "post",
                    data: {
                        'memo': memo,
                        'order_id': order_id
                    },
                    success: function (data) {
                        if (data.code > 0) {
                            util.message('成功添加备注', 'success')
                        } else {
                            util.message(data.message)
                        }
                    }
                })
                order_list[index]['order_memo'] = memo
            }
        })

        function orderStatus() {
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/order/orderStatus'); ?>",
                data: {
                    'type': ['common', 'delivery_print', 'express_print']
                },
                success: function (data) {
                    $("#order_status").html(tpl('tpl_status', {data: data.common, selected: 1}));
                    $("#express_order_status").html(tpl('tpl_status', {data: data.express_print, selected: 0}));
                    $("#delivery_order_status").html(tpl('tpl_status', {data: data.delivery_print, selected: 0}));
                    util.initPage(LoadingInfo);
                }
            })
            $(".search").removeAttr('disabled')
        }

        $('.search').on('click', function () {
            util.initPage(LoadingInfo);
        });

        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            var order_no = $("#order_no").val();
            var order_status = $("#order_status").val();
            console.log(order_status)
            var user = $("#user").val();
            var express_no = $("#express_no").val();
            var goods_name = $("#goods_name").val();
            var delivery_order_status = $("#delivery_order_status").val();
            var express_order_status = $("#express_order_status").val();
            var start_create_date = $('#orderStartDate').val();
            var end_create_date = $('#orderEndDate').val();
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/order/orderlist'); ?>",
                async: true,
                data: {
                    "page_index": page_index,
                    "page_size": $("#showNumber").val(),
                    "order_no": order_no,
                    "order_status": order_status,
                    "start_create_date": start_create_date,
                    "end_create_date": end_create_date,
                    "user": user,
                    "express_no": express_no,
                    "goods_name": goods_name,
                    "delivery_order_status": delivery_order_status,
                    "express_order_status": express_order_status,
                    "order_amount": true,
                    "order_memo": true,
                    "shipping_type": 1,//只有商家
                },
                success: function (data) {
                    $('#list').html(tpl('tpl_order_list', {
                        data: data.data,
                        order_num: data['total_count'],
                        order_amount: data['order_amount']
                    }))
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    order_list = data.data
                    if (data['total_count'] == 0){
                        $(".J-button").addClass('hidden')
                    } else {
                        $(".J-button").removeClass('hidden')
                    }
                }
            });
        }

        function province(index, province_id) {
            $("#province_" + index).html(tpl('tpl_province', {data: province_list}))
            $("#province_" + index).val(province_id ? province_id : $("#province_" + index + " option:first").val())
        }

        function city(index, province_id, city_id) {
            if (province_id === undefined) {
                province_id = $("#province_" + index + " option:first").val();
            }
            $("#city_" + index).html(tpl('tpl_city', {data: city_list[province_id]}))
            $("#city_" + index).val(city_id ? city_id : $("#city_" + index + " option:first").val())
        }

        function district(index, city_id, district_id) {
            if (city_id === undefined) {
                city_id = $("#city_" + index + " option:first").val();
            }
            $("#district_" + index).html(tpl('tpl_district', {data: district_list[city_id]}))
            $("#district_" + index).val(district_id ? district_id : $("#district_" + index + " option:first").val())
        }

        function getSelectOrderGoods() {
            var order_goods_id_array = [];

            $('#list').find('.J-order-goods-checkbox:checked').each(function () {
                order_goods_id_array.push($(this).data('order-goods-id'));
            })
            return order_goods_id_array;
        }

        function getSelectOrder() {
            var order_id_array = [];
            $('#list').find('.J-order-goods-checkbox:checked').each(function () {
                var order_id = $(this).data('order-id');
                if ($.inArray(order_id, order_id_array) == -1) {
                    order_id_array.push(order_id);
                }
            })
            return order_id_array;
        }

        function orderData() {
            var order_goods_id_array = getSelectOrderGoods();
            if (order_goods_id_array) {
                var return_data = [];
                $('#list').find('.J-order-goods-checkbox:checked').each(function () {
                    order_goods_id_array.push($(this).data('order-goods-id'));
                })

                if (order_goods_id_array.length == 0) {
                    util.message('请至少选择一项');
                    return false;
                }

                $.ajax({
                    type: 'post',
                    async: false,
                    url: "<?php echo __URL('PLATFORM_MAIN/order/printOrderList'); ?>",
                    data: {
                        'order_goods_id_array': order_goods_id_array,
                    },
                    success: function (data) {
                        return_data = data;
                    }
                })
                return return_data;
            }
        }

        function senderInfo() {
            var return_data = [];
            $.ajax({
                type: 'post',
                async: false,
                url: "<?php echo $senderTemplateDetailUrl; ?>",
                data: {
                    'is_default': true,
                },
                success: function (data) {
                    return_data = data;
                }
            })
            return return_data;
        }

        function deliveryInfo() {
            var return_data = [];
            $.ajax({
                type: 'post',
                async: false,
                url: "<?php echo $deliveryTemplateDetailUrl; ?>",
                data: {
                    'is_default': true,
                },
                success: function (data) {
                    return_data = data;
                }
            })
            return return_data;
        }

        function expressInfo() {
            var return_data = [];
            $.ajax({
                type: 'post',
                async: false,
                url: "<?php echo $expressTemplateDetailUrl; ?>",
                data: {
                    'is_default': true,
                },
                success: function (data) {
                    return_data = data;
                }
            })
            return return_data;
        }
        function print(type) {
            var order_data = orderData();
            if (order_data === undefined || order_data === null || order_data === false) {
                return false;
            }
            var sender_data = senderInfo();
            if (type == 'express') {
                // 打印快递单
                var express_data = expressInfo()
                var template_data = express_data.template_data;
            } else {
                // 打印发货单
                var delivery_data = deliveryInfo();
                var template_data = delivery_data.template_data;
            }
            if (template_data === undefined || template_data === null){
                util.message('请先设置默认的模板')
                return false;
            }
            // 
            lodop.print_inita(0, 0, template_data.width + 'mm', template_data.height + 'mm', '模板打印');
            var print_status = true;
            // lodop.set_print_pagesize(1, template_data.width + 'mm', template_data.height + 'mm', '')
            // lodop.rect(0, 0, template_data.width + 'mm', template_data.height + 'mm', 0, 1)
            $.each(order_data, function (k_order, v_order) {
                if (template_data.items !== undefined){
                    lodop.NewPage();
                    $.each(template_data.items, function (k_item, v_item) {
                        var items = v_item.items
                        if (sender_data == '' &&
                            (
                                items.indexOf('sender_name') != -1 ||
                                items.indexOf('sender_mobile') != -1 ||
                                items.indexOf('sender_province') != -1 ||
                                items.indexOf('sender_city') != -1 ||
                                items.indexOf('sender_district') != -1 ||
                                items.indexOf('sender_address') != -1
                            )){
                            // 没有默认发货人模板 && 打印项目有发货人的信息
                            util.message('请先设置默认的发货人模板')
                            print_status = false
                            return false;
                        }
                        items = items.replace('consignee_name', v_order.receiver_name)
                        items = items.replace('consignee_mobile', v_order.receiver_mobile)
                        items = items.replace('consignee_province', v_order.receiver_province_name)
                        items = items.replace('consignee_city', v_order.receiver_city_name)
                        items = items.replace('consignee_district', v_order.receiver_district_name)
                        items = items.replace('consignee_address', v_order.receiver_address)
                        items = items.replace('consignee_nick_name', v_order.receiver_name)
                        items = items.replace('consignee_zip_code', v_order.receiver_zip_code)
                        items = items.replace('sender_name', sender_data.sender)
                        items = items.replace('sender_mobile', sender_data.mobile)
                        items = items.replace('sender_province', sender_data.province !== undefined ? sender_data.province.province_name : '')
                        items = items.replace('sender_city', sender_data.city !== undefined  ? sender_data.city.city_name : '')
                        items = items.replace('sender_district', sender_data.district !== undefined  ? sender_data.district.district_name : '')
                        items = items.replace('sender_address', sender_data.address)
                        items = items.replace('sender_sign', sender_data.sign)
                        items = items.replace('mall_name', '<?php echo $mall_name; ?>')
                        items = items.replace('delivery_date', util.timeStampTurnDate(new Date().getTime() / 1000))
                        var goods_detail = '';
                        $.each(v_order.goods_list, function (k_goods, v_goods) {
                            goods_detail += (v_goods.short_name ? v_goods.short_name : v_goods.goods_name) + ' x' + v_goods.num + '\n';
                        })
                        items = items.replace('goods_detail', goods_detail)

                        var text = v_item.item_pre + items + v_item.item_last
                        lodop.add_item_a(k_item, v_item.from_top + 'px', v_item.from_left + 'px', v_item.width, v_item.height, text)
                        if (v_item.item_size) {
                            lodop.set_print_style_a(0, 'FontSize', v_item.item_size)
                        }
                        if (v_item.item_font) {
                            lodop.set_print_style_a(0, 'FontName', v_item.item_font)
                        }
                        if (v_item.item_color) {
                            lodop.set_print_style_a(0, 'FontColor', v_item.item_color)
                        }
                        if (v_item.item_bold) {
                            lodop.set_print_style_a(0, 'Bold', 1)
                        }
                        if (v_item.item_align) {
                            if (v_item.item_align == 'center') {
                                lodop.set_print_style_a(0, 'Alignment', 2)
                            }
                            if (v_item.item_align == 'right') {
                                lodop.set_print_style_a(0, 'Alignment', 3)
                            }
                        }
                    });
                }
            });
            if (print_status){
                    lodop.set_show_mode();
                    lodop.preview();
                    lodop.print();
                }
        }

        function syncReceiver(order_id_array, receiver_info) {
            $.ajax({
                url: '<?php echo __URL("PLATFORM_MAIN/order/updateOrdersAddress"); ?>',
                type: 'post',
                data: {
                    order_id_array: order_id_array,
                    receiver_info: receiver_info
                },
                success: function (data) {
                    if (data.code > 0) {
                        util.message(data.message, 'success');
                    } else {
                        util.message(data.message);
                    }
                }
            })
        }

        function addPrintTimes(type) {
            var order_goods_id_array = getSelectOrderGoods()
            $.ajax({
                url: '<?php echo __URL("PLATFORM_MAIN/order/addPrintTimes"); ?>',
                type: 'post',
                data: {
                    type: type,
                    order_goods_id_array: order_goods_id_array
                },
                success: function (data) {
                }
            })
        }

        $('#list').on('change', '.J-province', function () {
            var index = $(this).data('index');
            city(index, $(this).val())
            district(index)
        })

        $('#list').on('change', '.J-city', function () {
            var index = $(this).data('index');
            district(index, $(this).val())
        })

        $(".J-form-print").on('click', function () {
            var order_goods_id_array = getSelectOrderGoods()
            if (order_goods_id_array.length == 0) {
                util.message('请至少选择一项');
                return false;
            }
            if (order_goods_id_array) {
                $.ajax({
                    type: 'post',
                    url: '<?php echo $formPrintUrl; ?>',
                    data: {
                        'order_goods_id_array': order_goods_id_array,
                    },
                    success: function (data) {
                        if(data.code=='-1'){
                            util.message(data.message);
                            return false;
                        }
                        $.each(data, function (k, v) {
                            if (v.result.Success && v.result.PrintTemplate !== undefined){
                                lodop.NewPage();
                                lodop.add_print_html(v.result.PrintTemplate);
                                
                            }
                        })
                        lodop.preview();
                        lodop.print();
                    }
                })
            }
        })

        $(".J-express-print").on('click', function () {
            print('express')
            addPrintTimes('express')
        })

        $(".J-delivery-print").on('click', function () {
            print('delivery')
            addPrintTimes('delivery')
        })

        $(".J-delivery").on('click', function () {
            var order_goods_id_array = getSelectOrderGoods();
            if (order_goods_id_array.length == 0) {
                util.message('请至少选择一项');
                return false;
            }
            var order_goods_id_string = order_goods_id_array.join(',');
            document.cookie = 'order_goods_id_string=' + order_goods_id_string + ';path=/'
            util.confirm('一键发货', 'url:<?php echo $orderDeliveryModal; ?>', function () {
                this.$content.find('.J-input').each(function (k, v) {
                    var order_id = $(this).data('order-id');
                    express_order_list[order_id]['express_no'] = $(this).val();
                })

                $.ajax({
                    url: '<?php echo $orderDelivery; ?>',
                    type: 'post',
                    data: {
                        'list': express_order_list
                    },
                    success: function (data) {
                        if (data.code > 0) {
                            util.message('成功发货', 'success')
                        } else {
                            util.message(data.message)
                        }
                    }
                })
            }, 'large')
        })
    })
</script>
