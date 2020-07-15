<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/www.tuandr.com/addons/fullcut/template/platform/addMansong.html";i:1583811694;}*/ ?>





                <!-- page -->

                <form class="form-horizontal form-validate widthFixedForm">
                    <div class="screen-title">
                        <span class="text">规则设置</span>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>适用范围</label>
                        <div class="col-md-5">
                            <label class="radio-inline">
                              <input type="radio"  name="range" value="1" checked="checked/"> 自营店
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="range" value="2"> 全平台
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>活动名称</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="mansong_name" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>优惠规则</label>
                        <div class="col-md-8">
                            <div class="form-table-group" style="width: auto">
                                <table class="table table-bordered table-auto-center table_rule">
                                    <tr>
                                        <td class="w-200">门槛</td>
                                        <td >优惠方式</td>
                                        <td>操作</td>
                                    </tr>
                                    
                                    <tr class="rule_set">
                                        <td>满<input type="number" id="price1" name="price" required class="form-control number-form-control ml-15 mr-15" min="0" autocomplete="off">元</td>
                                        <td>
                                        <div>
                                            <div class="form-group">
                                            <label class="col-md-3 control-label"><input class="discount_money" type="checkbox" id="discount1" name="discountChk" coupontype="reduce1"> 减金额</label>
                                            <div class="col-md-7 hidden" showcoupontype="reduce1" coupontype="reduce1">
                                                <div class="input-group w-200">
                                                <input type="number" class="form-control" min="0" name="discount" id="discount_input1">
                                                <div class="input-group-addon">元</div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-group"><label class="col-md-3 control-label"><input name="free_shipping" id="free_shipping1" type="checkbox"> 免邮</label></div>
                                            <div class="form-group">
                                            <label class="col-md-3 control-label"><input name="give_coupon" id="give_coupon1" type="checkbox"> 送优惠券</label>
                                            <div class="col-md-7 hidden" showcoupontype="giveconpon1">
                                                <select class="form-control select-form-control" id="give_coupon_select1">

                                                </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-md-3 control-label"><input name="give_gift" id="gift1" type="checkbox"> 送赠品</label>
                                            <div class="col-md-7 hidden" showcoupontype="gift1">
                                                <select class="form-control select-form-control" id="gift_select1">

                                                </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-md-3 control-label"><input name="give_giftvoucher" id="giftvoucher1" type="checkbox"> 送礼品券</label>
                                            <div class="col-md-7 hidden" showcoupontype="giftvoucher1">
                                                <select class="form-control select-form-control" id="giftvoucher_select1">

                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr class="last-tr">
                                        <td colspan="3" class="text-left">
                                            <a href="javascript:;" class="text-primary addRule">增加一个规则</a><span class="small-muted pl-15">最多增加五个</span>
                                        </td>
                                    </tr>
                                </table>
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
                                    <input type="hidden" id="start_time" name="start_time">
                                    <input type="hidden" id="end_time" name="end_time">
                                </label>
                            </div>
                            <div class="help-block mb-0">开始时间点为选中日期的0:00:00，结束时间点为选中日期的23:59:59</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">活动说明</label>
                        <div class="col-md-8">
                            <textarea class="form-control resize_none" rows="4" name="remark"></textarea>
                        </div>
                    </div>
                    <!--<div class="form-group">-->
                        <!--<label class="col-md-2 control-label">活动状态</label>-->
                        <!--<div class="col-md-5">-->
                            <!--<label class="radio-inline">-->
                              <!--<input type="radio" name="status" value="1" checked> 开启-->
                            <!--</label>-->
                            <!--<label class="radio-inline">-->
                              <!--<input type="radio" name="status" value="3"> 关闭-->
                            <!--</label>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="form-group">-->
                        <!--<label class="col-md-2 control-label"><span class="text-bright">*</span>活动状态</label>-->
                        <!--<div class="col-md-5">-->
                            <!--&lt;!&ndash;<label class="radio-inline">-->
                              <!--<input type="radio" name="status" value="1" checked> 开启-->
                            <!--</label>-->
                            <!--<label class="radio-inline">-->
                              <!--<input type="radio" name="status" value="3"> 关闭-->
                            <!--</label>&ndash;&gt;-->
                            <!--<div class="switch-inline">-->
                                <!--<input type="checkbox" id="status" checked >-->
                                <!--<label for="status" class=""></label>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <input type="hidden" name="status" value="0" checked>
                    <div class="form-group">
                        <label class="col-md-2 control-label">优先级</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control w-200" name="level" placeholder="越大越优先" value="0">
                        </div>
                    </div>

                    <div class="screen-title">
                        <span class="text">活动商品</span>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>参加活动商品</label>
                        <div class="col-md-5">
                            <label class="radio-inline">
                              <input type="radio" name="range_type" value="1" checked> 所有商品
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="range_type" value="0"> 部分商品
                            </label>
                        </div>
                    </div>
                    <div class="form-group hidden" id="activitygoods">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-9">
                            <div>
                                <ul class="nav nav-tabs v-nav-tabs" role="tablist">
                                    <li role="presentation" class="active goods_list"><a href="#list" aria-controls="list" role="tab" data-toggle="tab" class="flex-auto-center">商品列表</a></li>
                                    <li role="presentation" class="select_goods_list"><a href="#curr" aria-controls="curr" role="tab" data-toggle="tab" class="flex-auto-center">已选商品</a></li>
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
                                                    <th>商品信息</th>
                                                    <th>库存</th>
                                                    <th>店铺</th>
                                                    <th>操作</th>
                                                </tr>
                                            </thead>
                                            <tbody id="goods_list">

                                            </tbody>
                                        </table>
                                        <input type="hidden" id="pageIndex">
                                        <nav aria-label="Page navigation" class="clearfix">
                                            <ul id="page" class="pagination pull-right"></ul>
                                        </nav>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="curr">
                                        <table class="table v-table table-auto-center">
                                            <thead>
                                                <tr>
                                                    <th>商品信息</th>
                                                    <th>库存</th>
                                                    <th>店铺</th>
                                                    <th>操作</th>
                                                </tr>
                                            </thead>
                                            <tbody id="seleted_goods_list">


                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary submit" href="javascript:void(0)">添加</button>
                            <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                        </div>
                    </div>
                </form>

                <!-- page end -->




<script>
require(['util'],function(util){
    var addNum = '1';
    var range_type = ''

    util.layDate('#effect_time',true,function(value, date, endDate){
        var date1=date.year+'-'+date.month+'-'+date.date;
        var date2=endDate.year+'-'+endDate.month+'-'+endDate.date;
        if(value){
            $('#start_time').val(date1);
            $('#end_time').val(date2);
            $('#effect_time').parents('.form-group').removeClass('has-error');
        }
        else{
            $('#start_time').val('');
            $('#end_time').val('');
        }
    });
    $('body').on('change','.discount_money',function(){
        if($(this).prop('checked')){
            //$('div[showcoupontype='+$(this).attr('reduce')+']').removeClass('hidden')
            $(this).parent().next().removeClass('hidden')
            //$(this).removeClass('hidden')
        }else{
            //$('div[showcoupontype='+$(this).attr('reduce')+']').addClass('hidden')
            $(this).parent().next().addClass('hidden')
        }
    })


    //获取优惠券

    $('body').on('change','input[name="give_coupon"]',function(){
        if($(this).prop('checked')){
            $(this).parent().next().removeClass('hidden')
        }else{
            $(this).parent().next().addClass('hidden')
        }
    })

    $('body').on('change','input[name="give_gift"]',function(){
        if($(this).prop('checked')){
            $(this).parent().next().removeClass('hidden')
        }else{
            $(this).parent().next().addClass('hidden')
        }
    })

    $('body').on('change','input[name="give_giftvoucher"]',function(){
        if($(this).prop('checked')){
            $(this).parent().next().removeClass('hidden')
        }else{
            $(this).parent().next().addClass('hidden')
        }
    })
    // 添加规则
    var coupon_type_list = <?php echo !empty($coupon_type_list)?$coupon_type_list: "''"; ?>;
    var gift_list = <?php echo !empty($gift_list)?$gift_list: "''"; ?>;
    var giftvoucher_list = <?php echo !empty($giftvoucher_list)?$giftvoucher_list: "''"; ?>;
    var nums=1;
    if(coupon_type_list!='') {
        var html = '<option value="0">请选择优惠券</option>';
        var coupon_list = coupon_type_list.data;
        coupon_list.forEach(function(v,k){
            html +='<option value="'+v.coupon_type_id+'">'+v.coupon_name+'</option>';
        });
        $('#give_coupon_select1').html(html);
    }
    if(gift_list!='') {
        var html = '<option value="0">请选择赠品</option>';
        var coupon_list = gift_list.data;
        coupon_list.forEach(function(v,k){
            html +='<option value="'+v.promotion_gift_id+'">'+v.gift_name+'</option>';
        });
        $('#gift_select1').html(html);
    }
    if(giftvoucher_list!='') {
        var html = '<option value="0">请选择礼品券</option>';
        var g_list = giftvoucher_list.data;
        g_list.forEach(function(v,k){
            html +='<option value="'+v.gift_voucher_id+'">'+v.giftvoucher_name+'</option>';
        });
        $('#giftvoucher_select1').html(html);
    }
    $('.addRule').on('click',function(){
        var obj = $(".table_rule tbody .rule_set");
        // addNum = obj.length;
        // if(addNum==0){
        //     addNum = 1;
        // }
        // addNum++;
        if(obj.length>4){
            util.message('活动规则最多添加5个');
        }
        else{
            nums++;
            var html = '<tr class="rule_set">';
                html += '<td>满<input type="number" id="price'+nums+'" name="price" required class="form-control number-form-control ml-15 mr-15" min="0" autocomplete="off">元</td>';
                html +='<td>';
                html +='<div>';
                html +='<div class="form-group">';
                html +='<label class="col-md-3 control-label"><input class="discount_money" type="checkbox" id="discount'+nums+'" name="discountChk" coupontype="reduce'+nums+'"> 减金额</label>';
                html +='<div class="col-md-7 hidden" showcoupontype="reduce'+nums+'" coupontype="reduce'+nums+'">';
                html +='<div class="input-group w-200">';
                html +='<input type="number" class="form-control" min="0" name="discount" id="discount_input'+nums+'">';
                html +='<div class="input-group-addon">元</div>';
                html +='</div>';
                html +='</div>';
                html +='</div>';
                html +='<div class="form-group">';
                html +='<label class="col-md-3 control-label"><input name="free_shipping" id="free_shipping'+nums+'" type="checkbox"> 免邮</label>';
                html +='</div>';
                //优惠券
                if(<?php echo $couponStatus; ?>==1){
                html +='<div class="form-group">';
                html +='<label class="col-md-3 control-label"><input name="give_coupon" id="give_coupon'+nums+'" type="checkbox"> 送优惠券</label>';
                html +='<div class="col-md-7 hidden" showcoupontype="giveconpon'+nums+'">';
                html +='<select class="form-control select-form-control" id="give_coupon_select'+nums+'">';
                html +='<option value="0">请选择优惠券</option>';
                if(coupon_type_list!='') {
                    var coupon_list = coupon_type_list.data;
                    coupon_list.forEach(function(v,k){
                        html +='<option value="'+v.coupon_type_id+'">'+v.coupon_name+'</option>';
                    });
                }
                html +='</select>';
                html +='</div>';
                html +='</div>';
                }

                //赠品
                if(<?php echo $gift_status; ?>==1){
                    html +='<div class="form-group">';
                    html +='<label class="col-md-3 control-label"><input name="give_gift" id="gift'+nums+'" type="checkbox"> 送赠品</label>';
                    html +='<div class="col-md-7 hidden" showcoupontype="gift'+nums+'">';
                    html +='<select class="form-control select-form-control" id="gift_select'+nums+'">';
                    html +='<option value="0">请选择赠品</option>';
                    if(gift_list!='') {
                        var coupon_list = gift_list.data;
                        coupon_list.forEach(function(v,k){
                            html +='<option value="'+v.promotion_gift_id+'">'+v.gift_name+'</option>';
                        });
                    }
                    html +='</select>';
                    html +='</div>';
                    html +='</div>';
                }

                //礼品券
                if(<?php echo $giftvoucher_status; ?>==1){
                    html +='<div class="form-group">';
                    html +='<label class="col-md-3 control-label"><input name="give_giftvoucher" id="giftvoucher'+nums+'" type="checkbox"> 送礼品券</label>';
                    html +='<div class="col-md-7 hidden" showcoupontype="giftvoucher'+nums+'">';
                    html +='<select class="form-control select-form-control" id="giftvoucher_select'+nums+'">';
                    html +='<option value="0">请选择礼品券</option>';
                    if(giftvoucher_list!='') {
                        var g_list = giftvoucher_list.data;
                        g_list.forEach(function(v,k){
                            html +='<option value="'+v.gift_voucher_id+'">'+v.giftvoucher_name+'</option>';
                        });
                    }
                    html +='</select>';
                    html +='</div>';
                    html +='</div>';
                }
                html +='</div>';
                html +='</td>';
                html +='<td><a href="javascript:;" class="text-danger del">删除</a></td>';
                html +='</tr>';
                $('.last-tr').before(html);
        }

        
    })

    if($('input[name=type]').val() == '0'){
        $('#type0').show().siblings().hide();
    }else if($('input[name=type]').val() == '1'){
        $('#type1').show().siblings().hide();
    }else if($('input[name=type]').val() == '2'){
        $('#type2').show().siblings().hide();
    }
    $('input[name=type]').on('change',function(){
        $('#type'+$(this).val()).show().siblings().hide();
    })

    $('input[name=range_type]').on('change',function(){
        range_type = $(this).val()
        if($(this).val() == '0'){
            $('#activitygoods').removeClass('hidden');
        }else{
            $('#activitygoods').addClass('hidden');
        }
        
    })

    //删除规则
    $('body').on('click','.del',function(){
        $(this).parent().parent().remove();
    })


    //定义临时数组储存商品ID
    var temp_id = <?php echo $seleted_goods; ?>;
    if(temp_id!=null && temp_id!=''){

    }else{
        var temp_id = [];
    }
    //商品列表数据
    util.initPage(LoadingInfo);
    $('.search').on('click',function(){
        LoadingInfo(1);
    });

    function LoadingInfo(page_index) {
        var range = $('input[name="range"]:checked').val();
        var $goodsArr = new Array();
        var search_text = $("#search_text").val();
        if($("input[name='range_type']:checked").val() == 0){
            $('#range_type').removeClass('hidden');
        }else{
            $('#range_type').addClass('hidden');
        }
        var seleted_goods = temp_id;
        $.ajax({
            type : "post",
            url : "<?php echo __URL('PLATFORM_MAIN/goods/getserchgoodslist'); ?>",
            data : {
                "page_index" : page_index,
                "page_size" : $("#showNumber").val(),
                "search_text" : search_text,
                "shop_range_type":range
            },
            success : function(data) {
                var html = '';
                if (data['data'].length > 0) {
                    for (var i = 0; i < data['data'].length; i++) {

                        var curr = data['data'][i];
                        if(jQuery.inArray(curr["goods_id"], $goodsArr) == "-1"){
                            $goodsArr.push(curr["goods_id"]);
                        }else{
                            continue;
                        }

                        html+='<tr id="html_'+data['data'][i]["goods_id"]+'" goodsid="'+data['data'][i]["goods_id"]+'">';
                        html+='<td>';
                        html+='<div class="media text-left">';
                        html+='<div class="media-left">';
                        html +='<div>';
                        if(data['data'][i]["picture_info"]['pic_cover']){
                            html +='<img src="'+__IMG(data['data'][i]["picture_info"]['pic_cover'])+'" width="60" height="60"></div></th>';
                        }else{
                            html +='<img src="http://iph.href.lu/60x60" width="60" height="60"></div></th>';
                        }
                        html +='</div>';
                        html+='<div class="media-body max-w-300">';
                        html+='<div class="line-2-ellipsis"><a href="'+__URLS('SHOP_MAIN/goods/goodsinfo&goodsid='+data['data'][i]["goods_id"])+'" target="_blank" class="new-window" title="'+data['data'][i]["goods_name"]+'">'+data['data'][i]["goods_name"]+'</a></div>';
                        html+='</div>';
                        html+='</div>';
                        html+='</td>';
                        html+='<td>';
                        html+=data['data'][i]["stock"];
                        html+='</td>';
                        html+='<td>';
                        html+=data['data'][i]["shop_name"];
                        html+='</td>';
                        html+='<td>';
                        if(jQuery.inArray(curr["goods_id"], seleted_goods) == "-1"){
                            html +='<a href="javascript:;" class="btn btn-default btn-sm btn-primary join" >参加活动</a>';
                        }else{
                            html +='<a href="javascript:;" class="btn btn-default btn-sm cancle" id="id_'+data['data'][i]["goods_id"]+'">取消参加</a>';
                        }
                        html+='<input type="hidden" name="goods_id" id="'+data['data'][i]["goods_id"]+'" value="'+data['data'][i]["goods_id"]+'">';
                        if(data['data'][i]['shop_id'] > 0){
                            html += '<input type="hidden" name="shop_id" value="' + data['data'][i]["shop_id"] + '">';
                        }        
                        html+='</td>';
                        html+='</tr>';
                        //
                        // if (jQuery.inArray(curr["goods_id"], seleted_goods) != "-1") {
                        //     seleted_html = '<tr id="html_' + data['data'][i]["goods_id"] + '" goodsid="' + data['data'][i]["goods_id"] + '">' + html + '</tr>';
                        // }
                    }
                } else {
                    html += '<tr align="center"><th colspan="4">暂无符合条件的数据记录</th></tr>';
                }

                $("#goods_list").html(html);
                $('#page').paginator('option', {
                    totalCounts: data['total_count']  // 动态修改总数
                });
            }
        });

    }


    //自营全平台商品
    $('body').on('change','input[name=range]',function(){
        LoadingInfo(1);
    })

        //加入商品
        $('body').on('click','.join',function(){
            var id = $(this).next($("input[name='goods_id']")).val();
            var shop_id = 0;
            var has_shop = $(this).parent().find($("input[name='shop_id']"));
            if(has_shop.length > 0){
                shop_id = parseInt($(this).parent().find($("input[name='shop_id']")).val());
            }
            $(this).removeClass('join');
            var select = '<a class="btn btn-default btn-sm cancle" id="id_'+id+'" href="javascript:;">取消参加</a><input type="hidden" name="goods_id" value="'+id+'">';
            if(shop_id > 0){
                 select += '<input type="hidden" name="shop_id" value="' + shop_id + '">';
            } 
            $(this).parent().html(select);
            var html = $('#html_'+id).html();
            // var html = $(this).parent().parent().parent();
            $("#seleted_goods_list").append('<tr id="html_'+id+'" goodsid="'+id+'">'+html+'</tr>');
            temp_id.push(parseInt(id));
        })

        //取消参加
        $('body').on('click','.cancle',function(){
            var id = $(this).next($("input[name='goods_id']")).val();
            $('#seleted_goods_list #html_'+id+'').remove();
            $('#id_'+id+'').removeClass('cancle');
            $('#id_'+id+'').addClass('join btn-primary');
            $('#id_'+id+'').html("参加活动");
            temp_id.splice($.inArray(parseInt(id),temp_id), 1);
        })
        function checkShop(){
            var range = $("input[name='range']:checked").val();
            if(range === '2'){
                return true;
            }
            var checkSelected = $('#seleted_goods_list').find('input[name=shop_id]');
            if(checkSelected.length === 0){
                return true;
            }
            return false;
        }
        function addMansong(){
            if($(".table_rule tbody .rule_set").length>1){
                var type="2"
            }else{
                var type="1";
            }
            var range = $("input[name='range']:checked").val();
            var level = $("input[name='level']").val();
            // var status = $("input[name='status']:checked").val();
            // var status = $('#status').is(':checked')? 1 : 3;
            var status = 1;
            var remark = $("textarea[name='remark']").val();
            var mansong_name = $("input[name='mansong_name']").val();
            var start_time = $("#start_time").val();
            var end_time = $("#end_time").val();
            var range_type = $("input[name='range_type']:checked").val();
            if(mansong_name.length==0 || start_time.lenght==0 || end_time.length==0){
                util.message('请将信息填写完整',"danger");
                return false;
            }

            // //参与商品
            // var obj = $("#seleted_goods_list tr");
            // var goods_id_array = '';
            // obj.each(function(i){
            //     goods_id_array += ','+obj.eq(i).attr("goodsid");
            // });
            // goods_id_array = goods_id_array.substring(1);
            if(temp_id == '' && range_type == 0){
                util.message('请选择参加活动的商品',"danger");
                return false;
            }
            //多级活动规则
            var rule = '';
            var obj = $(".table_rule tbody .rule_set");
            if(obj.length==0){
                util.message('请至少设置一种规则',"danger");
                return false;
            }
            var num = 0;
            for(var i=0;i<obj.length;i++){
                //满减送价格
                num++;
                if(obj.eq(i).find('input[name="price"]').val() > 0){
                    var price = obj.eq(i).find('input[name="price"]').val();
                }else{
                    var price = 0;
                    util.message("请输入优惠门槛金额","danger");
                    return false;
                }
                //减现金
                if(obj.eq(i).find('input[name="discountChk"]').is(':checked') == true){
                    if(obj.eq(i).find('input[name="discount"]').val()==""){
                        util.message("请输入减免金额","danger");
                        obj.eq(i).find('input[name="discount"]').focus();
                        return false;
                    }
                    var discount = obj.eq(i).find('input[name="discount"]').val();
                }else{
                    var discount = 0;
                }
                //免邮
                if(obj.eq(i).find('input[name="free_shipping"]').is(':checked') == true){
                    var free_shipping = 1;
                }else{
                    var free_shipping = 0;
                }
                //送优惠券
                if($("#give_coupon"+num).is(':checked') == true){
                    var give_coupon = $("#give_coupon_select"+num).val();
                    if(give_coupon == 0){
                        util.message("请选择优惠券","danger");
                        $("#give_coupon_select"+num).focus();
                        return false;
                    }
                }else{
                    var give_coupon = 0;
                }
                //送赠品
                if($("#gift"+num).is(':checked') == true){
                    var give_gift = $("#gift_select"+num).val();
                    if(give_gift == 0){
                        util.message("请选择赠品","danger");
                        $("#gift_select"+num).focus();
                        return false;
                    }
                }else{
                    var give_gift = 0;
                }

                //送礼品券
                if($("#giftvoucher"+num).is(':checked') == true){
                    var give_giftvoucher = $("#giftvoucher_select"+num).val();
                    if(give_giftvoucher == 0){
                        util.message("请选择礼品券","danger");
                        $("#give_giftvoucher"+num).focus();
                        return false;
                    }
                }else{
                    var give_giftvoucher = 0;
                }

                // if(discount+free_shipping+give_coupon+give_gift+give_giftvoucher == 0){
                //     util.message('请至少选择一种优惠方式', 'danger');
                //     return false;
                // }
                rule += ';'+price+','+discount+','+free_shipping+','+give_coupon+','+give_gift+','+give_giftvoucher;

            }
            rule = rule.substring(1);
            if(flag){
                return false;
            }
            flag = true;
            var shop_id = <?php echo $shop_id; ?>;
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/Menu/addonmenu?addons=addFullCut'); ?>",
                data : {
                    'mansong_name' : mansong_name,
                    'level' : level,
                    'range' : range,
                    'status' : status,
                    'remark' : remark,
                    'start_time' : start_time,
                    'end_time' : end_time,
                    'range_type' : range_type,
                    'discount':discount,
                    'goods_id_array' : temp_id,
                    'rule':rule,
                    'type':type,
                    'shop_id':shop_id
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',"<?php echo __URL('PLATFORM_MAIN/Menu/addonmenu?addons=fullCutList'); ?>");
                    }else{
                        util.message(data['message'],'danger');
                        flag = false;
                    }
                }
            });
        }
        // 添加规则
        var flag = false;
        util.validate($('.form-validate'),function(form){
            if(checkShop() === true){
                return addMansong();
            }else{
                return util.alert('当前活动的适用范围为“自营店”，已选商品中包含非自营店商品，是否移除该部分商品?', function(){
                    $('#seleted_goods_list input[name=shop_id]').each(function(){
                        var gid = $(this).parents('tr').attr('goodsid');
                        temp_id.splice($.inArray(parseInt(gid),temp_id), 1);
                        $(this).parents('tr').remove();
                    });
                    addMansong();
                });
            }
        })
        $(".select_goods_list").on('click',function(){
            $(".clearfix").hide();
        })
        $(".goods_list").on('click',function(){
            $(".clearfix").show();
        })

})
</script>
