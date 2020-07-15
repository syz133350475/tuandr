<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/www/wwwroot/www.tuandr.com/addons/presell/template/admin/addPresell.html";i:1583811696;}*/ ?>

<!-- page -->
<style>
    .form_time{margin-left:15px !important;}
    .red_font{color:#ff0000}
</style>
<form class="form-horizontal pt-15 form-validate widthFixedForm">
    <div class="screen-title">
        <span class="text">规则设置</span>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>活动标签</label>
        <div class="col-md-5">
            <input type="text" name="name" id="name" required maxlength="4" class="form-control w-200">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>预售类型</label>
        <div class="col-md-5">
            <label class="radio-inline">
                <input type="radio" name="type" value="2" checked> 定金+尾款
            </label>
        </div>
    </div>

    <div class="form-group ">
        <label class="col-md-2 control-label"><span class="red_font">*</span>预售时间</label>
        <div class="col-md-8">
            <div class="v-datetime-input-control">
                <label for="effect_time">
                    <input type="text" class="form-control" id="effect_time" placeholder="请选择时间" autocomplete="off" name="effect_time" required>
                    <i class="icon icon-calendar"></i>
                    <input type="hidden" id="start_time" name="start_time">
                    <input type="hidden" id="end_time" name="end_time">
                </label>
            </div>
            <div class="help-block mb-0">开始时间点为选中日期的0:00:00，结束时间点为选中日期的23:59:59</div>
        </div>

    </div>

    <div class="form-group" id="sele_goods">
        <label class="col-md-2 control-label"><span class="red_font">*</span>选择商品</label>
        <div class="col-md-3">
            <div  id="selectGoods" class="btn btn-primary-diy">点击选择</div>
        </div>
    </div>

    <div id="goods_info_box" class="form-group hidden">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-3">
            <div class="media text-left">
                <div class="media-left goods-img">
                    <img  src="http://iph.href.lu/60x60" onerror="this.src='http://iph.href.lu/60x60';" width="60" height="60">
                </div>
                <div class="media-body max-w-300">
                    <div class="line-2-ellipsis goods-text"></div>
                    <div class="line-1-ellipsis text-danger strong goods-price"></div>
                </div>
            </div>
            <input type="hidden" name="goods_id" id="goods_id" value="">
            <input type="hidden" name="sku_ids" id="sku_id" value="">
            <input type="hidden" name="presell_goods_id" id="presell_goods_id" value="">
        </div>
    </div>
    <div id="product_sku" class="hidden">
        <div class="form-group">
            <label class="col-md-2 control-label">活动库存 / 价格</label>
            <div class="col-md-9">
                <table class="table table-bordered table-auto-center v-separate" id="stock_table" name="stock_table" required style="display: table;">

                </table>
            </div>
        </div>
    </div>
    <div class="null_spec">
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>预售价</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input class="form-control" min="0.01" type="number" name="show_all_money" id="show_all_money" value="" required>
                <div class="input-group-addon">元</div>
            </div>
            <div class="help-block mb-0">预售活动价，预售金额分为定金+尾款的方式支付。</div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>定金</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input class="form-control" min="0.01" type="number" name="show_first_money" id="show_first_money" value="" required>
                <div class="input-group-addon">元</div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>预售库存</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input class="form-control" min="1" type="number" name="show_presell_num" id="show_presell_num" value="">
                <div class="input-group-addon">件</div>
            </div>
            <div class="help-block mb-0">商品预售数量，与普通商品库存相互独立。</div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">限购</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input class="form-control" min="0" type="number" name="show_max_buy" id="show_max_buy" value="">
                <div class="input-group-addon">件</div>
            </div>
            <div class="help-block mb-0">用户最多购买此商品数量限制。</div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">虚拟订购量</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input class="form-control" min="0" type="number" name="show_dummy_num" id="show_dummy_num" value="">
                <div class="input-group-addon">件</div>
            </div>
            <div class="help-block mb-0">活动开始后，前端订购量将会以实际订购量+虚拟订购量显示。</div>
        </div>
    </div>
    </div>
    <div class="form-group ">
        <label class="col-md-2 control-label"><span class="red_font">*</span>尾款支付时间</label>
        <div class="col-md-8">
            <div class="v-datetime-input-control">
                <label for="effect_time1">
                    <input type="text" class="form-control" id="effect_time1" placeholder="请选择时间" autocomplete="off" name="effect_time1" required>
                    <i class="icon icon-calendar"></i>
                    <input type="hidden" id="pay_start_time" name="pay_start_time">
                    <input type="hidden" id="pay_end_time" name="pay_end_time">
                </label>
            </div>
            <div class="help-block mb-0">开始时间点为选中日期的0:00:00，结束时间点为选中日期的23:59:59</div>
        </div>

    </div>

    <div class="form-group ">
        <label class="col-md-2 control-label"><span class="red_font">*</span>发货时间</label>
        <div class="col-md-8">
            <div class="v-datetime-input-control">
                <label for="send_goods_time">
                    <input type="text" class="form-control" id="send_goods_time" placeholder="请选择时间" autocomplete="off" name="send_goods_time" required>
                    <i class="icon icon-calendar"></i>
                </label>
            </div>
            <div class="help-block mb-0">开始时间点为选中日期的0:00:00</div>
        </div>

    </div>

    <!--<div class="form-group" style="display:none;">-->
        <!--<label class="col-md-2 control-label"><span class="red_font">*</span>预售状态</label>-->
        <!--<div class="col-md-5">-->
            <!--<label class="radio-inline">-->
                <!--<input type="radio" name="active_status" value="1" checked> 开启-->
            <!--</label>-->
        <!--</div>-->
    <!--</div>-->

    <div id="sub_val">
        <div class="form-group">
            <label class="col-md-2 control-label"></label>
            <div class="col-md-8">
                <button class="btn btn-primary-diy addPresell" type="submit" id="submit">添加</button>
                <a href="javascript:history.go(-1);" class="btn btn-default-diy">返回</a>
            </div>
        </div>
    </div>

</form>

<!-- page end -->


<script>
    require(['util'], function (util) {
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
        util.layDate('#effect_time1',true,function(value, date, endDate){
            var date1=date.year+'-'+date.month+'-'+date.date;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date;
            if(value){
                $('#pay_start_time').val(date1);
                $('#pay_end_time').val(date2);
                $('#effect_time1').parents('.form-group').removeClass('has-error');
            }
            else{
                $('#pay_start_time').val('');
                $('#pay_end_time').val('');
            }
        });

        util.layDate("#send_goods_time");

        //添加
        util.validate($('.form-validate'), function (form) {
            //判断商品是否选择了
            var goods_id = $('#goods_id').val();
            if(goods_id == ''){
                $('#sele_goods').addClass('has-error');
                var info = '<span id="group-error" class="help-block-error">请选择商品</span>';
                $('#selectGoods').after(info);
                return;
            }
            //同步数据
            var less_all_money =0;
            var less_first_money =0;
            var less_presell_num =0;
            var all_max_buy = 0;
            var all_vr_num = 0;
            var obj = $("#stock_table tbody tr");
            //var attr_array = $();
            if(obj.length>0 && !$('#product_sku').hasClass('hidden')) {
                obj.each(function (v,i) {
                    var all_money = $(this).find("input[name='all_money']").val();
                    var first_money = $(this).find("input[name='first_money']").val();
                    var presell_num = $(this).find("input[name='presell_num']").val();
                    var max_buy = parseInt($(this).find("input[name='max_buy']").val());
                    var vr_num = $(this).find("input[name='vr_num']").val();
                    // goods_id_array += ','+obj.eq(i).attr("goodsid")+':'+ dis;

                    //筛选规格最小的值
                    if(v==0){
                        less_all_money = all_money;
                        less_first_money = first_money;
                        less_presell_num = presell_num;
                        all_max_buy = max_buy;
                        all_vr_num = vr_num;
                    }
                    if(less_all_money<all_money && less_all_money!=0){
                        less_all_money = all_money;
                    }
                    if(first_money<less_first_money && less_first_money!=0){
                        less_first_money = first_money;
                    }

                    if(presell_num<less_presell_num && less_presell_num!=0){
                        less_presell_num = presell_num;
                    }
                    if(max_buy<all_max_buy && all_max_buy!=0){
                        all_max_buy = max_buy;
                    }
                    if(vr_num<all_vr_num && all_vr_num!=0){
                        all_vr_num = vr_num;
                    }
                });

                $("#show_all_money").val(less_all_money);
                $("#show_first_money").val(less_first_money);
                $("#show_presell_num").val(less_presell_num);
                $("#show_max_buy").val(all_max_buy);
                $("#show_dummy_num").val(all_vr_num);
            }

            var data = {};
            if($('#product_sku').hasClass('hidden')){
                var goods_info = {};
            }
            var name = $('#name').val();    //标签
            var start_time = $('#start_time').val();  //开始时间
            var end_time = $('#end_time').val();  //结束时间
            var pay_start_time = $('#pay_start_time').val();  //尾款支付时间
            var pay_end_time = $('#pay_end_time').val();  //尾款结束时间
            var send_goods_time = $('#send_goods_time').val();  //发货时间
            var active_status = $('input[name="active_status"]:checked').val();  //活动状态
            var all_money = $('#show_all_money').val();    //预售价
            var first_money = $('#show_first_money').val();    //定金
            var presell_num = $('#show_presell_num').val();    //预售库存
            var vr_num = $('#show_dummy_num').val();    //虚拟库存
            var max_buy = $('#show_max_buy').val();    //限购

            if(parseFloat(all_money)<=parseFloat(first_money)){
                util.message('预售价格必须大于定金', 'danger');
                return;
            }

            if(util.DateTurnTime(start_time) > util.DateTurnTime(end_time)){
                util.message('开始时间不能大于结束时间', 'danger');
                return;
            }

            if(util.DateTurnTime(pay_start_time) > util.DateTurnTime(pay_end_time)){
                util.message('尾款支付时间不能大于结束时间', 'danger');
                return;
            }

            if(util.DateTurnTime(pay_start_time) < util.DateTurnTime(start_time)){
                util.message('支付开始时间不能小于活动开始时间', 'danger');
                return;
            }
            if(util.DateTurnTime(pay_end_time) < util.DateTurnTime(end_time)){
                util.message('支付结束时间不能小于活动结束时间', 'danger');
                return;
            }


            if(util.DateTurnTime(send_goods_time) < util.DateTurnTime(pay_end_time)){
                util.message('发货时间不能小于支付时间', 'danger');
                return;
            }
            try{
                $('input[name="all_money"]').each(function(){
                    var val = $(this).val();
                    if(val==''){
                        throw '1';
                        return false;
                    }
                }); 
                $('input[name="first_money"]').each(function(){
                    var val = $(this).val();
                    if(val==''){
                        throw '2';
                        return false;
                    }
                }); 
                $('input[name="presell_num"]').each(function(){
                    var val = $(this).val();
                    if(val==''){
                        throw '3';
                        return false;
                    }
                }); 
                $('input[name="max_buy"]').each(function(){
                    var val = $(this).val();
                    if(val==''){
                        throw '4';
                        return false;
                    }
                }); 
                $('input[name="vr_num"]').each(function(){
                    var val = $(this).val();
                    if(val==''){
                        throw '5';
                        return false;
                    }
                }); 
            }
            catch(err){
                if(err=='1'){
                    util.message('请填写预售价','danger');
                    return false;
                }
                if(err=='2'){
                    util.message('请填写定金','danger');
                    return false;
                }
                if(err=='3'){
                    util.message('请填写预售库存','danger');
                    return false;
                }
                if(err=='4'){
                    util.message('请填写限购','danger');
                    return false;
                }
                if(err=='5'){
                    util.message('请填写虚拟订购量','danger');
                    return false;
                }
            }

            data.type = 2;
            data.goods_id = goods_id;
            data.name = name;
            data.start_time = start_time;
            data.end_time = end_time;
            data.pay_start_time = pay_start_time;
            data.pay_end_time = pay_end_time;
            data.send_goods_time = send_goods_time;
            data.active_status = active_status;
            data.allmoney = all_money;
            data.firstmoney = first_money;
            data.presellnum = presell_num;
            data.vrnum = vr_num;
            data.maxbuy = max_buy;
            //活动库存
            if($('#product_sku').hasClass('hidden')){
                var sku_id = $('#sku_id').val();
                var goods_id = $('#goods_id').val();

                data.sku_id = sku_id;
                data.goods_id = goods_id
                // data.goods_info = '';
                //无规格也需设置商品预售信息
                var sku_id = $("#sku_id").val();
                //console.log($(this).find("input[name='all_money']"));
                var all_money = $("input[name='show_all_money']").val();
                var first_money = $("input[name='show_first_money']").val();
                var presell_num = $("input[name='show_presell_num']").val();
                var max_buy = $("input[name='show_max_buy']").val();
                var vr_num = $("input[name='show_dummy_num']").val();
                var presell_goods_id = $("input[name='presell_goods_id']").val();
                sku_data = "§"+sku_id+","+all_money+","+first_money+","+presell_num+","+max_buy+","+vr_num+","+presell_goods_id;
                data.goods_info = sku_data;
            }else{
                //这里是有sku的区间，先获取当前商品有多少个sku_id
                var obj = $("#stock_table tbody tr");
                var goods_list = {};
                //  console.log(sku_obj);
                // console.log(all_money);
                var sku_data = '';
                    obj.each(function (i) {

                        var sku_id = $(this).find("input[name='sku_id']").val();
                        //console.log($(this).find("input[name='all_money']"));
                        var all_money = $(this).find("input[name='all_money']").val();
                        console.log(all_money);
                        var first_money = $(this).find("input[name='first_money']").val();
                        var presell_num = $(this).find("input[name='presell_num']").val();
                        var max_buy = $(this).find("input[name='max_buy']").val();
                        var vr_num = $(this).find("input[name='vr_num']").val();

                        // alert(all_money);
                        // goods_list[sku_id].all_money = all_money;
                        // // goods_list[sku_id].first_money = first_money;
                        // // goods_list[sku_id].presell_num = presell_num;
                        // // goods_list[sku_id].max_buy = max_buy;
                        // // goods_list[sku_id].vr_num = vr_num;
                        // console.log(goods_list);
                        if(parseInt(all_money)<=parseInt(first_money)){
                            util.message('预售价格必须大于定金', 'danger');
                            return false;
                        }
                        sku_data += "§"+sku_id+","+all_money+","+first_money+","+presell_num+","+max_buy+","+vr_num;

                    });
                    data.goods_info = sku_data;
            }
            $('.addPresell').attr({disabled: "disabled"}).html('提交中...');
            $.post('<?php echo __URL('admin/Menu/addonmenu?addons=addpresell'); ?>',
                data,
                function(res){
                    if (res["code"] > 0) {
                        util.message('添加成功', 'success', "<?php echo __URL('admin/Menu/addonmenu?addons=presellList'); ?>");
                    } else {
                        util.message(res["message"], 'danger');
                    }
                });
        })

        //选择商品
        $('#selectGoods').click(function () {
            util.goodsDialog('url:/admin/addons/execute/addons/presell/controller/Presell/action/presellGoodsList',function(data){
            });
        });
        // 批量设置
        $('#stock_table').on('click','.batchSet',function(){
            var batch_text = $(this).text();
            var batch_type = $(this).data('batch_type');
            var html = '<form class="form-horizontal padding-15">';
            html += '<div class="form-group"><label class="col-md-3 control-label">'+batch_text+'</label><div class="col-md-8">';
            html += '<input type="number" min="0" oninput="if(value.length>9)value=value.slice(0,9)" name="batch_'+batch_type+'" class="form-control">';
            html += '</div></div></form>';
            util.confirm('批量修改'+batch_text,html,function(){
                var val;
                var maxNum = 9999999.99;
                var currInput = $('#stock_table input[name="'+batch_type+'"]');
                val = this.$content.find('input[name="batch_'+batch_type+'"]').val();
                if(!val || val == ''){
                    util.message(batch_text+'不能为空');
                    return false;
                }else if(val > maxNum && batch_type !== 'goods_code'){
                    util.message('价格最大为 '+maxNum);
                    return false;
                }
                currInput.each(function(i,e){
                    e.value = val;
                });
            });

        });

    });
</script>

