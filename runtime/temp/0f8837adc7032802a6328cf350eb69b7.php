<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/www/wwwroot/www.tuandr.com/addons/discount/template/platform/addDiscount.html";i:1583811702;}*/ ?>




<!-- page -->

<form class="form-horizontal form-validate widthFixedForm">
    <div class="screen-title">
        <span class="text">规则设置</span>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>适用范围</label>
        <div class="col-md-5">
            <label class="radio-inline">
                <input type="radio" name="range_type" value="1" checked> 自营店
            </label>
            <label class="radio-inline">
                <input type="radio" name="range_type" value="2"> 全平台
            </label>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>活动名称</label>
        <div class="col-md-5">
            <input type="text" class="form-control" id="mansong_name" required autocomplete="off">
        </div>
    </div>
    <div class="form-group" id="active_discount" style="display:none;">
        <label class="col-md-2 control-label">活动折扣</label>
        <div class="col-md-8">
            <div class="input-group">
                <input type="number" class="form-control" min="0" name="discount">
                <div class="input-group-addon">折</div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>生效时间</label>
        <div class="col-md-8">
            <div class="v-datetime-input-control">
                <label for="effect_time">
                    <input type="text" class="form-control" id="effect_time" placeholder="请选择时间" value="" autocomplete="off" name="effect_time" required>
                    <i class="icon icon-calendar"></i>
                    <input type="hidden" id="orderStartDate" name="orderStartDate">
                    <input type="hidden" id="orderEndDate" name="orderEndDate">
                </label>
            </div>
            <div class="help-block mb-0">开始时间点为选中日期的0:00:00，结束时间点为选中日期的23:59:59</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">活动说明</label>
        <div class="col-md-5">
            <textarea class="form-control resize_none" rows="4" name="remark"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>折扣类型</label>
        <div class="col-md-5">
            <label class="radio-inline">
                <input type="radio" name="discount_type" value="1" checked> 打折
            </label>
            <label class="radio-inline">
                <input type="radio" name="discount_type" value="2"> 固定价格
            </label>
        </div>
    </div>
    <div class="form-group" id="discount_condition">
        <label class="col-md-2 control-label">统一折扣</label>
        <div class="col-md-5">
            <div class="switch-inline">
                <input type="checkbox" name="uniform_discount_type" id="uniform_discount_type">
                <label for="uniform_discount_type" class=""></label>
            </div>
        </div>
    </div>
    <div class="form-group" id="discount_condition_num" style="display:none">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-2 control-group">
            <div class="input-group">
                <input type="number" class="form-control uniform_discount" min="0" name="uniform_discount" id="uniform_discount" value="<?php echo $info['uniform_discount']; ?>">
                <div class="input-group-addon">折</div>
            </div>
        </div>
    </div>
    <div class="form-group" id="integer_condition">
        <label class="col-md-2 control-label">小数取整</label>
        <div class="col-md-5">
            <div class="switch-inline">
                <input type="checkbox" name="integer_type" id="integer_type">
                <label for="integer_type" class=""></label>
                <div class="help-block mb-0">折扣后价格小数四舍五入取整，例：198.55取整后199.00，198.46取整后198.00</div>
            </div>
        </div>
    </div>
    <div class="form-group" id="price_condition" style="display:none">
        <label class="col-md-2 control-label">统一价格</label>
        <div class="col-md-5">
            <div class="switch-inline">
                <input type="checkbox" name="uniform_price_type" id="uniform_price_type">
                <label for="uniform_price_type" class=""></label>
            </div>
        </div>
    </div>
    <div class="form-group" id="price_condition_num" style="display:none">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-2 control-group">
            <div class="input-group">
                <input type="number" class="form-control uniform_price" min="0" name="uniform_price" id="uniform_price" value="<?php echo $info['uniform_price']; ?>">
                <div class="input-group-addon">元</div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>活动状态</label>
        <div class="col-md-5">
            <!--<label class="radio-inline">
                    <input type="radio" name="status" value="1" checked> 开启
            </label>
            <label class="radio-inline">
                    <input type="radio" name="status" value="3"> 关闭
            </label>-->
            <div class="switch-inline">
                <input type="checkbox" name="status" id="status" checked>
                <label for="status" class=""></label>
            </div>
        </div>
    </div>
    <!--<div class="form-group">
        <label class="col-md-2 control-label">优先级</label>
        <div class="col-md-8">
            <input type="number" class="form-control" min="0" name="level" id="level" placeholder="越大越优先" autocomplete="off">
            <div class="mb-0 help-block">当同时出现两档有效活动时，数字越大越优先</div>
        </div>
    </div>-->



    <div class="screen-title">
        <span class="text">活动商品</span>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>参加活动商品</label>
        <div class="col-md-5">
            <label class="radio-inline">
                <input type="radio" name="range" value="2" checked> 部分商品
            </label>
        </div>
    </div>
    <div class="form-group hidden" id="range_type">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-9">
            <div>
                <ul class="nav nav-tabs v-nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#list" aria-controls="list" role="tab" data-toggle="tab" class="flex-auto-center goods_list">商品列表</a></li>
                    <li role="presentation"><a href="#curr" aria-controls="curr" role="tab" data-toggle="tab" class="flex-auto-center select_goods_list">已选商品</a></li>
                    <div class="input-group search-input-group pull-right">
                        <input type="text" class="form-control" placeholder="商品名称" id="search_text">
                        <span class="input-group-btn"><a class="btn btn-primary search">搜索</a></span>
                    </div>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="list">
                        <table class="table v-table table-auto-center">
                            <thead>
                                <tr>
                                    <th class="col-md-4">商品信息</th>
                                    <th>库存</th>
                                    <th>店铺</th>
                                    <th>折扣/价格</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody id="goods_list">

                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="curr">
                        <table class="table v-table table-auto-center">
                            <thead>
                                <tr>
                                    <th class="col-md-4">商品信息</th>
                                    <th>库存</th>
                                    <th>店铺</th>
                                    <th>折扣/价格</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody id="seleted_goods_list">

                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" id="pageIndex">
                    <nav aria-label="Page navigation" class="clearfix">
                        <ul id="page" class="pagination pull-right"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button type="submit" class="btn btn-primary add" >添加</button>
            <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
        </div>
    </div>
</form>

<!-- page end -->




<script>
    require(['util'], function (util) {

        util.initPage(LoadingInfo);
        util.layDate('#effect_time', true, function (value, date, endDate) {
            var date1 = date.year + '-' + date.month + '-' + date.date;
            var date2 = endDate.year + '-' + endDate.month + '-' + endDate.date;
            if (value) {
                $('#orderStartDate').val(date1);
                $('#orderEndDate').val(date2);
                $('#effect_time').parents('.form-group').removeClass('has-error');
            } else {
                $('#orderStartDate').val('');
                $('#orderEndDate').val('');
            }
        });

        //定义临时数组储存商品ID
        var temp_id = <?php echo $seleted_goods; ?>;
        if (temp_id != null && temp_id != '') {

        } else {
            var temp_id = [];
        }
        //商品列表数据
        util.initPage(LoadingInfo);
        $('.search').on('click', function () {
            LoadingInfo(1);
        });

        //加载筛选数据
        function LoadingInfo(page_index) {
            var range_type = $('input[name="range_type"]:checked').val();
            var range = $("input[name='range']:checked").val();
            var dis_type = $("input[name='discount_type']:checked").val();
            if(dis_type == 2){
                var uniform = $("input[name='uniform_price_type']").is(':checked') ? 1 : 0;
            }else{
                var uniform = $("input[name='uniform_discount_type']").is(':checked') ? 1 : 0;
            }
            if (range == 2) {
                $("#active_discount").hide();
            } else {
                $("#active_discount").show();
            }
            var seleted_goods = temp_id;
            var search_text = $("#search_text").val();
            if ($("input[name='range_type']").val() == 0) {
                $("#turn-ul").show();
            } else {
                $("#turn-ul").hide();
            }
            $.ajax({
                type: "post",
                url: "<?php echo $getSerchGoodsList; ?>",
                data: {
                    "page_index": page_index,
                    "page_size": $("#showNumber").val(),
                    "search_text": search_text,
                    "shop_range_type": range_type,
                    "promotion_type": "discount"
                },
                success: function (data) {
                    var html = '';
                    $("#total_count_num").text(data["total_count"]);
                    $("#page_count_num").text(data["page_count"]);
                    $("#page_count").val(data["page_count"]);
                    $("#pageNumber a").remove();
                    if (data['data'].length > 0) {
                        $("#DiscountList").show();
                        for (var i = 0; i < data['data'].length; i++) {

                            html += '<tr id="html_' + data['data'][i]["goods_id"] + '" goodsid="' + data['data'][i]["goods_id"] + '">';
                            html += '<td>';
                            html += '<div class="media text-left">';
                            html += '<div class="media-left">';
                            html += '<div>';
                            if (data['data'][i]["picture_info"]['pic_cover']) {
                                html += '<img src="' + __IMG(data['data'][i]["picture_info"]['pic_cover']) + '" width="60" height="60"></div></th>';
                            } else {
                                html += '<img src="http://iph.href.lu/60x60" width="60" height="60"></div></th>';
                            }
                            html += '</div>';
                            html += '<div class="media-body max-w-300">';
                            html += '<div class="line-2-ellipsis">';
                            if (data['data'][i]['promotion_name']) {
                                html += '<span class="btn btn-sm btn-danger" style="padding:2px 5px">' + data['data'][i]['promotion_name'] + '</span>';
                            }
                            html += '<a href="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + data['data'][i]["goods_id"]) + '" target="_blank" class="new-window" title="' + data['data'][i]["goods_name"] + '">' + data['data'][i]["goods_name"] + '</a></div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</td>';
                            html += '<td>';
                            html += data['data'][i]["stock"];
                            html += '</td>';
                            html += '<td>';
                            html += data['data'][i]["shop_name"];
                            html += '</td>';
                            html += '<td>';
                            if (data['data'][i]['promotion_type'] > 0 && data['data'][i]['promotion_type'] < 6) {
                                html += '----';
                            } else {
                                if(dis_type == 2){
                                    if(uniform == 1){
                                        html += '<input type="number" name="goods_discount" value="" id="discount_' + data['data'][i]["goods_id"] + '" class="form-control number-form-control" disabled="false"> <span class="dis_type">元</span>';
                                    }else{
                                        html += '<input type="number" name="goods_discount" value="" id="discount_' + data['data'][i]["goods_id"] + '" class="form-control number-form-control"> <span class="dis_type">元</span>';
                                    }
                                }else{
                                    if(uniform == 1){
                                        html += '<input type="number" name="goods_discount" value="" id="discount_' + data['data'][i]["goods_id"] + '" class="form-control number-form-control" disabled="false"> <span class="dis_type">折</span>';
                                    }else{
                                        html += '<input type="number" name="goods_discount" value="" id="discount_' + data['data'][i]["goods_id"] + '" class="form-control number-form-control"> <span class="dis_type">折</span>';
                                    }
                                }
                            }

                            html += '</td>';
                            html += '<td>';
                            if (jQuery.inArray(data['data'][i]["goods_id"], seleted_goods) == "-1" && data['data'][i]['promotion_type'] == 0) {
                                html += '<a class="btn btn-default btn-sm btn-primary join" id="id_' + data['data'][i]["goods_id"] + '" href="javascript:;">参加活动</a>';
                                // }else if(data['data'][i]['promotion_type']>0 && data['data'][i]['promotion_type']!=4){
                            } else if (data['data'][i]['promotion_type'] > 0) {
                                html += '----';
                            } else {
                                html += '<a class="btn btn-default btn-sm cancle" id="id_' + data['data'][i]["goods_id"] + '" href="javascript:;">取消活动</a>';
                            }
                            html += '<input type="hidden" name="goods_id" value="' + data['data'][i]["goods_id"] + '">';
                            if(data['data'][i]['shop_id'] > 0){
                                html += '<input type="hidden" name="shop_id" value="' + data['data'][i]["shop_id"] + '">';
                            }
                            html += '</td>';
                            html += '</tr>';
                        }
                    } else {
                        html += '<tr align="center"><th colspan="5">暂无符合条件的数据记录</th></tr>';
                    }
                    $("#goods_list").html(html);
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                }
            });
        }

        //限时抢购类别
        $("input[name='discount_type']").change(function () {
            if($(this).is(':checked') && $("input[name='discount_type']:checked").val()==2){
                $("#discount_condition").hide();
                $("#uniform_discount_type").attr("checked",false);
                $("input[name='goods_discount']").attr('disabled',false);
                $("#integer_condition").hide();
                $("#price_condition").show();
                $("#discount_condition_num").hide();
                $(".dis_type").html("元");
            }else{
                $("#discount_condition").show();
                $("#integer_condition").show();
                $("#price_condition").hide();
                $("#uniform_price_type").attr("checked",false);
                $("input[name='goods_discount']").attr('disabled',false);
                $("#price_condition_num").hide();
                $(".dis_type").html("折");
            }
        });

        //统一是否开启
        $("input[name='uniform_discount_type']").click(function () {
            if($(this).is(':checked') ){
                $("#discount_condition_num").show();
                $("input[name='goods_discount']").val('');
                $("input[name='goods_discount']").attr('disabled',true);
            }else{
                $("#discount_condition_num").hide();
                $("input[name='goods_discount']").attr('disabled',false);
            }
        });
        $("input[name='uniform_price_type']").click(function () {
            if($(this).is(':checked') ){
                $("#price_condition_num").show();
                $("input[name='goods_discount']").val('');
                $("input[name='goods_discount']").attr('disabled',true);
            }else{
                $("#price_condition_num").hide();
                $("input[name='goods_discount']").attr('disabled',false);
            }
        });

        //限时折扣框显示
        $('body').on('change', 'input[name=range]', function () {
            var range = $(this).val();
            if (range == 2) {
                $("#active_discount").hide();
            } else {
                $("#active_discount").show();
            }
        })

        //自营全平台商品
        $('body').on('change', 'input[name=range_type]', function () {
            LoadingInfo(1);
        })

        $('body').on('change', 'input[name=goods_discount]', function () {
            var id = $(this).attr('id');
            $('[id^="' + id + '"]').val($(this).val());
        })

        //加入商品
        $('body').on('click', '.join', function () {
            var id = $(this).next($("input[name='goods_id']")).val();
            var shop_id = 0;
            var has_shop = $(this).parent().find($("input[name='shop_id']"));
            if(has_shop.length > 0){
                shop_id = parseInt($(this).parent().find($("input[name='shop_id']")).val());
            }
            var discount_value = $(this).parent().parent().find($('[id^="discount_' + id + '"]')).val();
            $(this).removeClass('join');
            var select = '<a class="btn btn-default btn-sm cancle" id="id_' + id + '" href="javascript:;">取消参加</a><input type="hidden" name="goods_id" id="' + id + '" value="' + id + '">';
            if(shop_id > 0){
                 select += '<input type="hidden" name="shop_id" value="' + shop_id + '">';
            }  
            $(this).parent().html(select);
              
            var html = $('#html_' + id).html();
            // var html = $(this).parent().parent().parent();
            $("#seleted_goods_list").append('<tr id="html_' + id + '" goodsid="' + id + '">' + html + '</tr>');
            $('[id^="discount_' + id + '"]').val(discount_value);
            temp_id.push(parseInt(id));
        })

        //取消参加
        $('body').on('click', '.cancle', function () {
            var id = $(this).next($("input[name='goods_id']")).val();
            $('#seleted_goods_list #html_' + id + '').remove();
            $('#id_' + id + '').removeClass('cancle');
            $('#id_' + id + '').addClass('join btn-primary');
            $('#id_' + id + '').html("参加活动");
            temp_id.splice($.inArray(parseInt(id), temp_id), 1);
        })
        function checkShop(){
            var range_type = $("input[name='range_type']:checked").val();
            if(range_type === '2'){
                return true;
            }
            var checkSelected = $('#seleted_goods_list').find('input[name=shop_id]');
            if(checkSelected.length === 0){
                return true;
            }
            return false;
        }
        // 添加规则
        var flag = false;
        util.validate($('.form-validate'), function (form) {
            if(checkShop() === true){
                return addDiscount();
            }else{
                return util.alert('当前活动的适用范围为“自营店”，已选商品中包含非自营店商品，是否移除该部分商品?', function(){
                    if($('#seleted_goods_list input[name=shop_id]').parents('tr').remove()){
                        addDiscount();
                    };
                });
            }
        })
        function addDiscount(){
            var range = $("input[name='range']:checked").val();
            var level = $("input[name='level']").val();
            var status = $("input[name='status']").is(':checked') ? 1 : 3;
            var remark = $("textarea[name='remark']").val();
            //new
            var discount_type = $("input[name='discount_type']:checked").val();
            var uniform_discount_type = $("input[name='uniform_discount_type']").is(':checked') ? 1 : 0;
            if(uniform_discount_type == 1){
                var uniform_discount = $("input[name='uniform_discount']").val();
            }else {
                var uniform_discount = null;
            }
            var integer_type = $("input[name='integer_type']").is(':checked') ? 1 : 0;
            var uniform_price_type = $("input[name='uniform_price_type']").is(':checked') ? 1 : 0;
            if(uniform_price_type == 1){
                var uniform_price = $("input[name='uniform_price']").val();
            }else {
                var uniform_price = null;
            }

            var mansong_name = $("#mansong_name").val();
            var start_time = $("#orderStartDate").val();
            var end_time = $("#orderEndDate").val();
            var discount = parseInt($("input[name='discount']").val());
            var range_type = $("input[type='radio'][name='range_type']:checked").val();
            if (range == 2) {
                discount = 10;
            }
            if (discount < 1 || discount > 10) {
                util.message('折扣必须为1-10');
                return false;
            }
            var obj = $("#seleted_goods_list tr");
            var goods_id_array = '';
            var check = true;
            if (range == 2) {
                obj.each(function (i) {
                    var dis = $("#seleted_goods_list #discount_" + obj.eq(i).attr("goodsid")).val() ? $("#seleted_goods_list #discount_" + obj.eq(i).attr("goodsid")).val() : '';
                    if(discount_type == 1){
                        if(uniform_discount_type == 1){
                            dis = uniform_discount;
                            if (dis < 1 || dis > 10) {
                                check = false;
                                return false;
                            }
                        }else {
                            if (dis < 1 || dis > 10) {
                                check = false;
                                return false;
                            }
                        }
                    }else{
                        if(uniform_price_type == 1){
                            dis = uniform_price;
                            if (dis < 0) {
                                check = false;
                                return false;
                            }
                        }else {
                            if (dis < 0) {
                                check = false;
                                return false;
                            }
                        }
                    }

                    goods_id_array += ',' + obj.eq(i).attr("goodsid") + ':' + dis;
                });
                goods_id_array = goods_id_array.substring(1);
            }
            if(discount_type == 1){
                if (check == false) {
                    util.message("请设置正确的商品折扣", 'danger');
                    return false;
                }
            }else {
                if (check == false) {
                    util.message("请设置正确的商品折扣价格", 'danger');
                    return false;
                }
            }

            if (goods_id_array == '' && range == 2) {
                util.message("未选择商品或未设置折扣", 'danger');
                return false;
            }
            if (flag) {
                return false;
            }
            flag = true;
            $.ajax({
                type: "post",
                url: "<?php echo $addDiscount; ?>",
                data: {
                    'discount_name': mansong_name,
                    'level': level,
                    'range': range,
                    'status': status,
                    'remark': remark,
                    //new
                    'discount_type': discount_type,
                    'uniform_discount_type': uniform_discount_type,
                    'uniform_discount': uniform_discount,
                    'integer_type': integer_type,
                    'uniform_price_type': uniform_price_type,
                    'uniform_price': uniform_price,

                    'start_time': start_time,
                    'end_time': end_time,
                    'range_type': range_type,
                    'discount': discount,
                    'goods_id_array': goods_id_array
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('PLATFORM_MAIN/Menu/addonmenu?addons=discountList'); ?>");
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        }

        if ($('input[name=type]').val() == '0') {
            $('#type0').show().siblings().hide();
        } else if ($('input[name=type]').val() == '1') {
            $('#type1').show().siblings().hide();
        } else if ($('input[name=type]').val() == '2') {
            $('#type2').show().siblings().hide();
        }
        $('input[name=type]').on('change', function () {
            $('#type' + $(this).val()).show().siblings().hide();
        })
        $('#range_type').removeClass('hidden');


        $('.goods_list').on('click', function () {
            $("#page").show();
        })
        $('.select_goods_list').on('click', function () {
            $("#page").hide();
        })

    })
</script>
