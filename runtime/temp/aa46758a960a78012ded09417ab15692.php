<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"/www/wwwroot/www.tuandr.com/addons/registermarketing/template/platform/registermarketing.html";i:1583811700;}*/ ?>

<!-- page -->
<form class="form-horizontal">
    <div class="screen-title">
        <span class="text">设置</span>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>是否启用</label>
        <div class="col-md-5">
            <div class="switch-inline">
                <input type="checkbox" name="is_use" id="is_use" <?php if($is_use == 1): ?> checked <?php endif; ?>>
                <label for="is_use" class=""></label>
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
        <label class="col-md-2 control-label">送积分</label>
        <div class="col-md-8">
        	<div class="input-group" style="width: 300px;">
	        	<input type="number" class="form-control" min="0" name="point" id="point">
				<div class="input-group-addon">积分</div>
				<div class="input-group-addon">
                	<label style="margin-bottom:0;"><input type="checkbox" name="is_distributor_point" id="is_distributor_point">  分销商推荐</label>
				</div>
			</div>
            <div class="help-block mb-0">勾选了分销商推荐后，只有分销商推荐进来的新会员才可获得此奖励</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">送成长值</label>
        <div class="col-md-8">
        	<div class="input-group" style="width: 300px;">
	        	<input type="number" class="form-control" min="0" name="growth_num" id="growth_num">
				<div class="input-group-addon">成长值</div>
				<div class="input-group-addon">
                	<label style="margin-bottom:0;"><input type="checkbox" name="is_distributor_growth" id="is_distributor_growth">  分销商推荐</label>
				</div>
			</div>
            <div class="help-block mb-0">勾选了分销商推荐后，只有分销商推荐进来的新会员才可获得此奖励</div>
        </div>
    </div>
	<?php if(($is_coupon_type)): ?>
    <div class="form-group">
        <label class="col-md-2 control-label">送优惠券</label>
        <div class="col-md-8" style="width: 740px;">
            <div class="transfer-box">
                <div class="item">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis">
                            <label><input type="checkbox" name="brandAllCheck" value="">未选中优惠券</label>
                        </div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请选择优惠券" id="search_text">
                            <i class="icon icon-custom-search" id="search"></i>
                        </div>
                    </div>
                    <div id="unselected" class="heights">
                    </div>
                </div>
                <div class="item">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis">已选中优惠券</div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请输入已选优惠券名称" id="search_text1">
                            <i class="icon icon-custom-search search_button" id="brand_search"></i>
                        </div>
                    </div>
                    <div id="selected" class="heights">
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php endif; if(($is_gift_voucher)): ?>
    <div class="form-group">
        <label class="col-md-2 control-label">送礼品券</label>
        <div class="col-md-8" style="width: 740px;">
            <div class="transfer-box">
                <div class="item">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis">
                            <label><input type="checkbox" name="specificationAllCheck" value="">未选中礼品券</label>
                        </div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请选择礼品券" id="gv_search_text">
                            <i class="icon icon-custom-search search_button" id="gv_search"></i>
                        </div>
                    </div>
                    <div id="gv_unselected" class="heights">
                    </div>
                </div>
                <div class="item">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis">已选中礼品券</div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请输入已选礼品券名称" id="gv_search_text1">
                            <i class="icon icon-custom-search search_button" id="brand_search"></i>
                        </div>
                    </div>
                    <div id="gv_selected" class="heights">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <a href="javascript:;" class="btn btn-primary" id="save">保存</a>
            <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
        </div>
    </div>
</form>
<!-- page end -->



<script>
    require(['util'], function (util) {
        // util.layDate('#start_time');
        // util.layDate('#end_time');
        var couponSelected=[];  //已选优惠券的集合
        var couponSelect=[];  //未选优惠券的集合
        var giftSelect=[];//未选礼品券的集合
        var giftSelected=[];//已选礼品券的集合

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
        // $("#search").on('click', function () {
        //     getCouponTypeList();
        // });
        // $("#gv_search").on('click', function () {
        //     getGiftVoucherList();
        // });

        $("#save").on('click', function () {
            saveRegisterMarketing();
        });

        $("#unselected").on("click", "input[name='unselected_coupon_type_id[]']", function () {
            add($(this).val(), 'selected_coupon_type_id[]', true, '#selected', $(this).parent().text());
            remove($(this).val(), 'unselected_coupon_type_id[]');
            // 已选优惠券数组增加
            var val=$(this).val();
            var obj={};
            obj.value = $(this).val();
            obj.name = $(this).parent().text();
            couponSelected.push(obj);
            //未选优惠券数组减少
            for(var i=0;i<couponSelect.length;i++){
                if(val==couponSelect[i].value){
                    couponSelect.splice(i,1);
                }
            }
			if($("#unselected label").length==0){
				$("#unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">没有可用的优惠券，前往<a href="<?php echo __URL("ADDONS_MAINaddCouponType"); ?>" class="text-primary addPrompt" data-type="coupontype" target="_blank">添加</a></label></div>');
			}
        });

        $("#gv_unselected").on("click", "input[name='unselected_gift_voucher_id[]']", function () {
            add($(this).val(), 'selected_gift_voucher_id[]', true, '#gv_selected', $(this).parent().text());
            remove($(this).val(), 'unselected_gift_voucher_id[]');
            // 已选礼品券数组增加
            var val=$(this).val();
            var obj={};
            obj.value = $(this).val();
            obj.name = $(this).parent().text();
            giftSelected.push(obj);
            //未选礼品券数组减少
            for(var i=0;i<giftSelect.length;i++){
                if(val==giftSelect[i].value){
                    giftSelect.splice(i,1);
                }
            }
			if($("#gv_unselected label").length==0){
				$("#gv_unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">没有可用的礼品券，前往<a href="<?php echo __URL("ADDONS_MAINaddGiftvoucher"); ?>" class="text-primary addPrompt" data-type="giftvoucher" target="_blank">添加</a></label></div>');
			}
        });

        $("#selected").on('click', "input[name='selected_coupon_type_id[]']", function () {
            if ($("#unselected label").hasClass("prompt")) {
                $("#unselected").empty();
            }
            add($(this).val(), 'unselected_coupon_type_id[]', false, '#unselected', $(this).parent().text());
            remove($(this).val(), 'selected_coupon_type_id[]');
            // 未选优惠券数组增加
            var val=$(this).val();
            var obj={};
            obj.value = $(this).val();
            obj.name = $(this).parent().text();
            couponSelect.push(obj);
            //已选优惠券数组减少
            for(var i=0;i<couponSelected.length;i++){
                if(val==couponSelected[i].value){
                    couponSelected.splice(i,1);
                }
            }

        });

        $("#gv_selected").on('click', "input[name='selected_gift_voucher_id[]']", function () {
            if ($("#gv_unselected label").hasClass("prompt")) {
                $("#gv_unselected").empty();
            }
            add($(this).val(), 'unselected_gift_voucher_id[]', false, '#gv_unselected', $(this).parent().text());
            remove($(this).val(), 'selected_gift_voucher_id[]');
            // 未选礼品券数组增加
            var val=$(this).val();
            var obj={};
            obj.value = $(this).val();
            obj.name = $(this).parent().text();
            giftSelect.push(obj);
            //已选礼品券数组减少
            for(var i=0;i<giftSelected.length;i++){
                if(val==giftSelected[i].value){
                    giftSelected.splice(i,1);
                }
            }
        });


        var info = <?php echo $register_marketing_info; ?>;
        if (typeof (info) == "object") {

            $("#start_time").val(util.timeStampTurnDate(info.start_time));
            $("#end_time").val(util.timeStampTurnDate(info.end_time));
            $("#effect_time").val(util.timeStampTurnDate(info.start_time)+' - '+util.timeStampTurnDate(info.end_time));
            $("#point").val(info.point);
            $("#growth_num").val(info.growth_num);
            if(info.is_distributor_point==1){
            	$("#is_distributor_point").prop("checked",true);
            }
            if(info.is_distributor_growth==1){
            	$("#is_distributor_growth").prop("checked",true);
            }
        }
        if ('<?php echo $coupon_type_status; ?>' == 1) {
            getCouponTypeList();
        }else{
        	$("#unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">优惠券应用未开启，前往<a href="<?php echo __URL("ADDONS_MAINcouponSetting"); ?>" class="text-primary openPrompt" data-type="coupontype" target="_blank">开启</a></label></div>');
        }
        if ('<?php echo $gift_voucher_status; ?>' == 1) {
            getGiftVoucherList();
        }else{
        	$("#gv_unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">礼品券应用未开启，前往<a href="<?php echo __URL("ADDONS_MAINgiftvoucherSetting"); ?>" class="text-primary openPrompt" data-type="giftvoucher" target="_blank">开启</a></label></div>');
        }
        
        $('body').on('click','.openPrompt',function(){
        	var type = $(this).data('type');
            util.alert('是否已设置完成？', function () {
            	if(type=='coupontype'){
            		getCouponTypeList();
            	}else if(type=='giftvoucher'){
            		getGiftVoucherList();
            	}
            })
        })
        
        $('body').on('click','.addPrompt',function(){
        	var type = $(this).data('type');
            util.alert('是否已添加完成？', function () {
            	if(type=='coupontype'){
            		getCouponTypeList();
            	}else if(type=='giftvoucher'){
            		getGiftVoucherList();
            	}
            })
        })

        function getCouponTypeList() {
            var excepted_coupon_type_id = [];
            // console.log($('body').find("input[name='selected_coupon_type_id[]']").length);
            $("#selected input[name='selected_coupon_type_id[]']").each(function () {
                excepted_coupon_type_id.push($(this).val());
            });
            //console.log(excepted_coupon_type_id);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo $getCouponTypeListUrl; ?>',
                data: {
                    'search_text': $("#search_text").val(),
                    'excepted_coupon_type_id': excepted_coupon_type_id,
                    'page_size': 0,
                    'not_expired': true
                },
                success: function (data) {
                    $("#unselected").empty();
                    if (data.total_count > 0 && data.addon_status.is_coupontype==1) {
                   		var coupontyp_data = [];
                   		if (typeof (info) == "object" && info.coupons && info.coupons.length > 0) {
       	                    $.each(data.data, function (k1, v1) {
       	                    	$.each(info.coupons, function (k2, v2) {
        	                    	if(v1.coupon_type_id==v2.coupon_type_id){
        	                    		coupontyp_data.push(v1.coupon_type_id);
        	                    	}
       	                    	})
       	                    })
                   		}
                           $.each(data.data, function (k, v) {
                           	if(coupontyp_data.indexOf(v.coupon_type_id)==-1){
                                   add(v.coupon_type_id, 'unselected_coupon_type_id[]', false, '#unselected', v.coupon_name);
                                   var obj ={};
                                   obj.value = v.coupon_type_id;
                                   obj.name = v.coupon_name;
                                   couponSelect.push(obj);
                           	}
                           })
                           getCouponTypeInfo();
                    }
                	if(data.code==-1005){
                		$("#unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">无法添加，优惠券应用未授权</label></div>');
                	}else if((data.total_count == 0 || couponSelect =='') && data.addon_status.is_coupontype==1){
                		$("#unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">没有可用的优惠券，前往<a href="<?php echo __URL("ADDONS_MAINaddCouponType"); ?>" class="text-primary addPrompt" data-type="coupontype" target="_blank">添加</a></label></div>');
                	}else if(data.addon_status.is_coupontype==0){
                		$("#unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">优惠券应用未开启，前往<a href="<?php echo __URL("ADDONS_MAINcouponSetting"); ?>" class="text-primary openPrompt" data-type="coupontype" target="_blank">开启</a></label></div>');
                	}
               }
            });
        }
        
        function getCouponTypeInfo(){
            var info = <?php echo $register_marketing_info; ?>;
            if (typeof (info) == "object" && info.coupons) {
                if (info.coupons.length > 0) {
                    $.each(info.coupons, function (k, v) {
                        add(v.coupon_type_id, 'selected_coupon_type_id[]', true, '#selected', v.coupon_name);
                        var obj ={};
                        obj.value = v.coupon_type_id;
                        obj.name = v.coupon_name;
                        couponSelected.push(obj);
                    })

                }
            }
        }

        function getGiftVoucherList() {
            var excepted_gift_voucher_id = [];
            $("#gv_selected input[name='selected_gift_voucher_id[]']").each(function () {
                excepted_gift_voucher_id.push($(this).val());
            });
            
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo $getGiftVoucherListUrl; ?>',
                data: {
                    'gv_search_text': $("#search_text").val(),
                    'excepted_gift_voucher_id': excepted_gift_voucher_id,
                    'page_size': 0,
                    'not_expired': true
                },
                success: function (data) {
                    $("#gv_unselected").empty();
                    if (data.total_count > 0 && data.addon_status.is_giftvoucher==1) {
                   		var giftvoucher_data = [];
                   		if (typeof (info) == "object" && info.gift_voucher && info.gift_voucher.length > 0) {
       	                    $.each(data.data, function (k1, v1) {
       	                    	$.each(info.gift_voucher, function (k2, v2) {
        	                    	if(v1.gift_voucher_id==v2.gift_voucher_id){
        	                    		giftvoucher_data.push(v1.gift_voucher_id);
        	                    	}
       	                    	})
       	                    })
                   		}
                           $.each(data.data, function (k, v) {
                           	if(giftvoucher_data.indexOf(v.gift_voucher_id)==-1){
                                   add(v.gift_voucher_id, 'unselected_gift_voucher_id[]', false, '#gv_unselected', v.giftvoucher_name);
                                   var obj ={};
                                   obj.value = v.gift_voucher_id;
                                   obj.name = v.giftvoucher_name;
                                   giftSelect.push(obj);
                           	}
                           })
                           getGiftVoucherInfo();
                    }
                   	if(data.code==-1005){
                   		$("#gv_unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">无法添加，礼品券应用未授权</label></div>');
                   	}else if((data.total_count == 0 || giftSelect =='') && data.addon_status.is_giftvoucher==1){
                   		$("#gv_unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">没有可用的礼品券，前往<a href="<?php echo __URL("ADDONS_MAINaddGiftvoucher"); ?>" class="text-primary addPrompt" data-type="giftvoucher" target="_blank">添加</a></label></div>');
                   	}else if(data.addon_status.is_giftvoucher==0){
                   		$("#gv_unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">礼品券应用未开启，前往<a href="<?php echo __URL("ADDONS_MAINgiftvoucherSetting"); ?>" class="text-primary openPrompt" data-type="giftvoucher" target="_blank">开启</a></label></div>');
                   	}
                }
            });
        }
        
        function getGiftVoucherInfo(){
            var info = <?php echo $register_marketing_info; ?>;
            if (typeof (info) == "object" && info.gift_voucher) {
                if (info.gift_voucher.length > 0) {
                    $.each(info.gift_voucher, function (k, v) {
                        add(v.gift_voucher_id, 'selected_gift_voucher_id[]', true, '#gv_selected', v.giftvoucher_name);
                        var obj ={};
                        obj.value = v.gift_voucher_id;
                        obj.name = v.giftvoucher_name;
                        giftSelected.push(obj);
                    })
                }
            }
        }

        function saveRegisterMarketing() {
            var start_time = $("#start_time").val()
            var end_time = $("#end_time").val()
            if (util.DateTurnTime(start_time) > util.DateTurnTime(end_time)) {
                $("#start_time").focus();
                util.message("开始时间不能大于结束时间");
                return;
            }
            var coupon_type_id = [];
            // $("input[name='selected_coupon_type_id[]']").each(function () {
            //     coupon_type_id.push($(this).val());
            // });
            for(var i=0;i<couponSelected.length;i++){
                coupon_type_id.push(couponSelected[i].value);
            }
            var gift_voucher_id = [];
            // $("input[name='selected_gift_voucher_id[]']").each(function () {
            //     gift_voucher_id.push($(this).val());
            // });
            for(var i=0;i<giftSelected.length;i++){
                gift_voucher_id.push(giftSelected[i].value);
            }

            var is_use = $("input[name='is_use']").is(':checked')? 1 : 0;
            var point = $("#point").val();
            if (point < 0 || point % 1 != 0){
            	$("#point").focus();
            	util.message("积分为正整数");
            	return;
            }
            var growth_num = $("#growth_num").val();
            if (growth_num < 0 || growth_num % 1 != 0){
            	$("#growth_num").focus();
            	util.message("成长值为正整数");
            	return;
            }
            var is_distributor_point =  $("input[name='is_distributor_point']").is(':checked')?1:0;
            var is_distributor_growth = $("input[name='is_distributor_growth']").is(':checked')?1:0;

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo $saveRegisterMarketingUrl; ?>',
                data: {
                    'start_time': start_time,
                    'end_time': end_time,
                    'point': point,
                    'growth_num': growth_num,
                    'is_distributor_point': is_distributor_point,
                    'is_distributor_growth': is_distributor_growth,
                    'is_use': is_use,
                    'coupon_type_id': coupon_type_id,
                    'gift_voucher_id': gift_voucher_id
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data['message'], 'success');
                    } else {
                    	util.message(data['message'], 'danger');
                    }
                }
            });
        }

        function add(value, to_name, checked, selected_id, label) {
            var tmp;
            if (checked) {
                tmp = '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="' + to_name + '" value="' + value + '" checked>' + label + '</label></div>'
            } else {
                tmp = '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="' + to_name + '" value="' + value + '">' + label + '</label></div>'
            }
            $(selected_id).append(tmp);
        }

        function remove(value, from_name) {
            //input->label->div
            $("input[name='" + from_name + "']input[value='" + value + "']").parent().parent().remove();
        }

        //优惠券列表全选
        $('input[name="brandAllCheck"]').on('change',function(){
            if($(this).is(':checked')) {
                $("input[name='unselected_coupon_type_id[]']").each(function(){
                    add($(this).val(), 'selected_coupon_type_id[]', true, '#selected', $(this).parent().text());
                    remove($(this).val(), 'unselected_coupon_type_id[]');
                    // 已选优惠券数组增加
                    var val=$(this).val();
                    var obj={};
                    obj.value = $(this).val();
                    obj.name = $(this).parent().text();
                    couponSelected.push(obj);
                    //未选优惠券数组减少
                    for(var i=0;i<couponSelect.length;i++){
                        if(val==couponSelect[i].value){
                            couponSelect.splice(i,1);
                        }
                    }

                });
                $("#unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">没有可用的优惠券，前往<a href="<?php echo __URL("ADDONS_MAINaddCouponType"); ?>" class="text-primary addPrompt" data-type="coupontype" target="_blank">添加</a></label></div>');
            }
            else{
                if ($("#unselected label").hasClass("prompt")) {
                    $("#unselected").empty();
                }
                $('input[name="selected_coupon_type_id[]"]').each(function(){
                    add($(this).val(), 'unselected_coupon_type_id[]', false, '#unselected', $(this).parent().text());
                    remove($(this).val(), 'selected_coupon_type_id[]');
                    // 未选优惠券数组增加
                    var val=$(this).val();
                    var obj={};
                    obj.value = $(this).val();
                    obj.name = $(this).parent().text();
                    couponSelect.push(obj);
                    //已选优惠券数组减少
                    for(var i=0;i<couponSelected.length;i++){
                        if(val==couponSelected[i].value){
                            couponSelected.splice(i,1);
                        }
                    }

                })

            }
        })

        // 送礼品券全选
        $('input[name="specificationAllCheck"]').on('change',function(){
            if($(this).is(':checked')) {
                 $("input[name='unselected_gift_voucher_id[]']").each(function(){
                    add($(this).val(), 'selected_gift_voucher_id[]', true, '#gv_selected', $(this).parent().text());
                    remove($(this).val(), 'unselected_gift_voucher_id[]');
                    // 已选礼品券数组增加
                    var val=$(this).val();
                    var obj={};
                    obj.value = $(this).val();
                    obj.name = $(this).parent().text();
                    giftSelected.push(obj);
                    //未选礼品券数组减少
                    for(var i=0;i<giftSelect.length;i++){
                        if(val==giftSelect[i].value){
                            giftSelect.splice(i,1);
                        }
                    }

                 })
                 $("#gv_unselected").html('<div style="margin-top:100px;text-align: center;"><label class="prompt">没有可用的礼品券，前往<a href="<?php echo __URL("ADDONS_MAINaddGiftvoucher"); ?>" class="text-primary addPrompt" data-type="giftvoucher" target="_blank">添加</a></label></div>');
            }
            else{
                if ($("#gv_unselected label").hasClass("prompt")) {
                    $("#gv_unselected").empty();
                }
                $("input[name='selected_gift_voucher_id[]']").each(function(){
                    add($(this).val(), 'unselected_gift_voucher_id[]', false, '#gv_unselected', $(this).parent().text());
                    remove($(this).val(), 'selected_gift_voucher_id[]');
                    // 未选礼品券数组增加
                    var val=$(this).val();
                    var obj={};
                    obj.value = $(this).val();
                    obj.name = $(this).parent().text();
                    giftSelect.push(obj);
                    //已选礼品券数组减少
                    for(var i=0;i<giftSelected.length;i++){
                        if(val==giftSelected[i].value){
                            giftSelected.splice(i,1);
                        }
                    }

                })

            }
        })

        // 未选中优惠券搜索
        $("#search_text").on('keyup',function(){
             var val=$(this).val();
             var html='';
             for(var i=0;i<couponSelect.length;i++){
                 var names = couponSelect[i].name;
                 if(names.indexOf(val)!=-1){
                      html += '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="unselected_coupon_type_id[]" value="'+couponSelect[i].value+'">'+couponSelect[i].name+'</label></div>';
                 }
             }
             $("#unselected").html(html);
             if(couponSelect.length>0){
                 $("input[name='brandAllCheck']").attr('checked',false);
             }
             else{
                 $("input[name='brandAllCheck']").attr('checked',true);
             }
        })

        //已选中优惠券搜索
        $("#search_text1").on('keyup',function(){
             var val=$(this).val();
             var html='';
             for(var i=0;i<couponSelected.length;i++){
                 var names = couponSelected[i].name;
                 if(names.indexOf(val)!=-1){
                     html+='<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="selected_coupon_type_id[]" value="'+couponSelected[i].value+'" checked>'+couponSelected[i].name+'</label></div>';
                 }
             }
             $("#selected").html(html);
        })

        // 未选中礼品券搜索
        $("#gv_search_text").on('keyup',function(){
             var val=$(this).val();
             var html='';
             for(var i=0;i<giftSelect.length;i++){
                 var names = giftSelect[i].name;
                 console.log(names);
                 if(names.indexOf(val)!=-1){
                      html += '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="unselected_gift_voucher_id[]" value="'+giftSelect[i].value+'">'+giftSelect[i].name+'</label></div>';
                     console.log(giftSelect);
                 }
             }
             $("#gv_unselected").html(html);
             if(giftSelect.length>0){
                 $("input[name='specificationAllCheck']").attr('checked',false);
             }
             else{
                 $("input[name='specificationAllCheck']").attr('checked',true);
             }
        })
        // 已选中礼品券搜索
        $("#gv_search_text1").on('keyup',function(){
             var val=$(this).val();
             var html='';
             for(var i=0;i<giftSelected.length;i++){
                 var names = giftSelected[i].name;
                 if(names.indexOf(val)!=-1){
                     html+='<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="selected_gift_voucher_id[]" value="'+giftSelected[i].value+'" checked>'+giftSelected[i].name+'</label></div>';
                 }
             }
             $("#gv_selected").html(html);
        })

    })


</script>
