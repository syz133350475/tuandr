<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/www.tuandr.com/addons/paygift/template/admin/updatePaygift.html";i:1583811704;}*/ ?>

        <!-- page -->
        <form class="form-horizontal form-validate widthFixedForm">
            <div class="screen-title">
                <span class="text">规则设置</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>活动名称</label>
                <div class="col-md-5">
                    <input type="text" id="paygift_name" class="form-control" name="paygift_name" required value="<?php echo $info['paygift_name']; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>活动时间</label>
                <div class="col-md-8">
                    <div class="v-datetime-input-control">
                        <label for="effect_time">
                            <input type="text" class="form-control" id="effect_time" placeholder="请选择时间" value="<?php if($info['start_time']){ echo date('Y-m-d',$info['start_time']).' - '; echo date('Y-m-d',$info['end_time']);} ?>" autocomplete="off" name="effect_time" required>
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="start_time" name="start_time" value="<?php if($info['start_time']) echo date('Y-m-d',$info['start_time']) ?>">
                            <input type="hidden" id="end_time" name="end_time" value="<?php if($info['end_time'])echo date('Y-m-d',$info['end_time']) ?>">
                        </label>
                    </div>
                    <div class="help-block mb-0">开始时间点为选中日期的0:00:00，结束时间点为选中日期的23:59:59</div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-2 control-label"><span class="text-bright">*</span>消费方式</label>
                <div class="col-md-6">
                    <label class="radio-inline">
                      <input type="radio" name="modes" value="1" <?php if(($info['modes']==1 || !$info['modes'])): ?>checked<?php endif; ?> aria-invalid="false" onclick="optionMode(this.value)">购买一定金额的商品
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="modes" value="2" <?php if(($info['modes']==2)): ?>checked<?php endif; ?> aria-invalid="false" onclick="optionMode(this.value)">购买某一款商品
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-5" id="optionMode">
                	<?php if(($info['modes']==1 || !$info['modes'])): ?>
                    <div class="input-group w-300">
                    	<div class="input-group-addon">满</div>
                        <input type="number" id="modes_money" name="modes_money" class="form-control" required min="0" value="<?php echo $info['modes_money']; ?>">
                        <div class="input-group-addon">元，参与活动</div>
                    </div>
                    <?php else: ?>
                    <div class="btn btn-primary-diy" onclick="loadList(5,1)">点击选择</div>
                    <div id="goods_info_1" class="media text-left">
			    		<div class="media-left goods-img"><img src="<?php echo $info['modes_goods']['pic_cover']; ?>" width="60" height="60"></div>
			    		<div class="media-body max-w-300"><div class="line-2-ellipsis goods-name"><?php echo $info['modes_goods']['goods_name']; ?></div><div class="line-1-ellipsis text-danger strong goods-price"><?php echo $info['modes_goods']['price']; ?></div></div>
		    		</div>
		    		<input type="hidden" id="modes_id" name="modes_id" value="<?php echo $info['modes_id']; ?>" autocomplete="off"/>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>领奖节点</label>
                <div class="col-md-5">
                    <select name="grant_node" id="grant_node" class="form-control w-200" min="0" required title=" ">
                        <option value="-1">请选择领奖节点</option>
                        <option value="1" <?php if(($info['grant_node']==1)): ?>selected = "selected"<?php endif; ?>>支付成功</option>
                        <option value="2" <?php if(($info['grant_node']==2)): ?>selected = "selected"<?php endif; ?>>订单完成</option>
                    </select>
                    <div class="mb-0 help-block">会员领取奖品的节点，如果设为“支付成功”就可以领取，那么订单申请退款后已发放的奖品将不会退还</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">自动领奖</label>
                <div class="col-md-5">
                    <div class="switch-inline">
                        <input type="checkbox" name="grant_state" id="grant_state" <?php if(($info['grant_state']==1)): ?>checked<?php endif; ?>>
                        <label for="grant_state" class=""></label>
                    </div>
                    <div class="mb-0 help-block">只对虚拟奖品有效，开启后订单满足领奖节点将会自动发放到会员账号，无需手动通过“奖品中心”领取</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>优先级</label>
                <div class="col-md-5">
                    <input type="number" id="priority" name="priority" class="form-control w-200" min="0" value="<?php if(($info['priority'])): ?><?php echo $info['priority']; else: ?>0<?php endif; ?>">
                    <div class="mb-0 help-block">当同时出现两档有效活动时，数字越大越优先</div>
                </div>
                
            </div>
            
			<div class="form-group"></div>
            <div class="screen-title">
                <span class="text">奖品设置</span>
            </div>	        	
        	<div class="form-group">
            	<label class="col-md-2 control-label"><span class="text-bright">*</span>奖品类型</label>
                <div class="col-md-6">
                    <label class="radio-inline">
                      <input type="radio" name="prize_type" value="5" <?php if(($info['prize_type']==5)): ?>checked<?php endif; ?> aria-invalid="false" onclick="optionType(this.value)">商品
                    </label>
                    <?php if(($setup['coupontype']['is_state']==1)): ?>
                    <label class="radio-inline">
                      <input type="radio" name="prize_type" value="3" <?php if(($info['prize_type']==3)): ?>checked<?php endif; ?> aria-invalid="false" onclick="optionType(this.value)" <?php if(($setup['coupontype']['is_use']==0)): ?>class="disabled"<?php endif; ?>>优惠券
                    </label>
                    <?php endif; if(($setup['giftvoucher']['is_state']==1)): ?>
                    <label class="radio-inline">
                      <input type="radio" name="prize_type" value="4" <?php if(($info['prize_type']==4)): ?>checked<?php endif; ?> aria-invalid="false" onclick="optionType(this.value)" <?php if(($setup['giftvoucher']['is_use']==0)): ?>class="disabled"<?php endif; ?>>礼品券
                    </label>
                    <?php endif; if(($setup['gift']['is_state']==1)): ?>
                    <label class="radio-inline">
                      <input type="radio" name="prize_type" value="6" <?php if(($info['prize_type']==6)): ?>checked<?php endif; ?> aria-invalid="false" onclick="optionType(this.value)" <?php if(($setup['gift']['is_use']==0)): ?>class="disabled"<?php endif; ?>>赠品
                    </label>
                    <?php endif; ?>
                </div>
            </div>
                   
            <div class="form-group">
	            <label class="col-md-2 control-label"><span class="text-bright">*</span>奖品名称</label>
	            <div class="col-md-5">
	                <input type="text" id="prize_name" class="form-control" name="prize_name" required value="<?php echo $info['prize_name']; ?>">
	            </div>
	        </div>
	        	
		    <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>奖品数量</label>
                <div class="col-md-5">
                    <div class="input-group w-200">
                        <input type="number" id="prize_num" name="prize_num" class="form-control" required min="0" value="<?php echo $info['prize_num']; ?>">
                        <div class="input-group-addon">件</div>
                    </div>
                    <div class="mb-0 help-block">
                    	<span id="tips"><?php if(($info['prize_type']==3 || $info['prize_type']==4 || $info['prize_type']==5 || $info['prize_type']==6)): ?>请保证<?php if(($info['prize_type']==3)): ?>优惠券<?php endif; if(($info['prize_type']==4)): ?>优惠券<?php endif; if(($info['prize_type']==5)): ?>商品<?php endif; if(($info['prize_type']==6)): ?>赠品<?php endif; ?>剩余库存与奖品数量一致，否则可能导致领奖失败，<?php endif; ?></span>
						奖品为0时则不会发奖
                    </div>
                </div>
                
            </div>
            
            <div class="form-group" id="prize-type">
                <?php if(($info['prize_type']==3)): ?>
            	<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送优惠券</label>
       			<div class="col-md-5">
        			<select class="form-control w-200" name="seckill_name" id="seckill_name" required="" aria-required="true" aria-describedby="seckill_name-error" aria-invalid="false" onchange="typeId(this.value)">
        				<?php if(is_array($info['coupon']) || $info['coupon'] instanceof \think\Collection || $info['coupon'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['coupon'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$coupon): $mod = ($i % 2 );++$i;?>
        				<option value="<?php echo $coupon['coupon_type_id']; ?>" <?php if(($coupon['coupon_type_id']==$info['prize_type_id'])): ?>selected = "selected"<?php endif; ?> ><?php echo $coupon['coupon_name']; ?></option>
        				<?php endforeach; endif; else: echo "" ;endif; ?>
        			</select>
        			<span id="seckill_name-error" class="help-block-error"></span>
       			</div>
             	<?php endif; if(($info['prize_type']==4)): ?>
            	<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送礼品券</label>
       			<div class="col-md-5">
        			<select class="form-control w-200" name="seckill_name" id="seckill_name" required="" aria-required="true" aria-describedby="seckill_name-error" aria-invalid="false" onchange="typeId(this.value)">
        				<?php if(is_array($info['giftvoucher']) || $info['giftvoucher'] instanceof \think\Collection || $info['giftvoucher'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['giftvoucher'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$giftvoucher): $mod = ($i % 2 );++$i;?>
        				<option value="<?php echo $giftvoucher['gift_voucher_id']; ?>" <?php if(($giftvoucher['gift_voucher_id']==$info['prize_type_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $giftvoucher['giftvoucher_name']; ?></option>
        				<?php endforeach; endif; else: echo "" ;endif; ?>
        			</select>
        			<span id="seckill_name-error" class="help-block-error"></span>
       			</div>
       			<?php endif; if(($info['prize_type']==5)): ?>
       			<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送商品</label>
				<div class="col-md-3">
					<div class="btn btn-primary-diy" onclick="loadList(5,2)">点击选择</div>
					<div id="goods_info_2" class="media text-left">
		    			<div class="media-left goods-img"><img src="<?php echo $info['prize_goods']['pic_cover']; ?>" width="60" height="60"></div>
		    			<div class="media-body max-w-300"><div class="line-2-ellipsis goods-name"><?php echo $info['prize_goods']['goods_name']; ?></div><div class="line-1-ellipsis text-danger strong goods-price"><?php echo $info['prize_goods']['price']; ?></div></div>
		    		</div>
				</div>
             	<?php endif; if(($info['prize_type']==6)): ?>
       			<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送赠品</label>
				<div class="col-md-3">
					<div class="btn btn-primary-diy" onclick="loadList(6,0)">点击选择</div>
					<div id="gift_info" class="media text-left">
		    			<div class="media-left gift-img"><img src="<?php echo $info['prize_gift']['pic_cover']; ?>" width="60" height="60"></div>
		    			<div class="media-body max-w-300"><div class="line-2-ellipsis gift-name"><?php echo $info['prize_gift']['gift_name']; ?></div><div class="line-1-ellipsis text-danger strong gift-price"><?php echo $info['prize_gift']['price']; ?></div></div>
		    		</div>
				</div>
             	<?php endif; ?>
            </div>
	            
            <input type="hidden" name="prize_type_id" value="<?php echo $info['prize_type_id']; ?>" id="prize_type_id" class="prize_type_id" autocomplete="off">
	        <div class="form-group">
		        <label class="col-md-2 control-label">奖品图片</label>
		        <div class="col-md-8">
		        	<div class="">
				        <div id="prize_pic" class="picture-list">
				        	<?php if(($info['prize_pic'])): ?>
				        	<a href="javascript:void(0);" class="close-box">
				        		<i class="icon icon-danger" style="margin-right:10px;" title="删除"></i>
				        		<img src="<?php echo $info['prize_pic']; ?>">
				        	</a>
				        	<?php else: ?>
				        	<a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
				        	<?php endif; ?>
				        </div>
			        </div>
			        <p class="small-muted">建议100*100PNG格式图片，不传则用系统默认图</p>
		        </div>
	        </div>
		        
		    <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>奖品过期时间</label>
                <div class="col-md-5">
                    <div class="date-input-group">
                        <div class="date-input-control w-200" style="display: block;">
                            <input type="text" id="expire_time" class="form-control expire_time" placeholder="过期时间" value="<?php if($info['expire_time'])echo date('Y-m-d',$info['expire_time']) ?>" autocomplete="off" name="expire_time" required><i class="icon icon-calendar"></i>
                        </div>
                    </div>
                    <div class="mb-0 help-block">超出时间未领取则不能领取,开始时间点为选中日期的0:00:00</div>
                </div>
                
            </div>
            <input type="hidden" name="prize_id" value="<?php echo $info['prize_id']; ?>" class="prize_id" autocomplete="off"/>
            
            <div class="form-group"></div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary" type="submit"><?php if(($info['pay_gift_id']>0)): ?>修改<?php else: ?>添加<?php endif; ?></button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
            <input type="hidden" id="pay_gift_id" name="pay_gift_id" value="<?php echo $info['pay_gift_id']; ?>" autocomplete="off"/>
        </form>

        <!-- page end -->


<script>
	var setup = {
   		coupontype:<?php echo $setup['coupontype']['is_use']; ?>,	
   		giftvoucher:<?php echo $setup['giftvoucher']['is_use']; ?>,
   		gift:<?php echo $setup['gift']['is_use']; ?>
    }
    require(['utilAdmin'], function (utilAdmin) {
        utilAdmin.layDate("#expire_time");
        utilAdmin.layDate('#effect_time',true,function(value, date, endDate){
            date.month=date.month<10?'0'+date.month:date.month;
            date.date=date.date<10?'0'+date.date:date.date;
            endDate.month=endDate.month<10?'0'+endDate.month:endDate.month;
            endDate.date=endDate.date<10?'0'+endDate.date:endDate.date;
        	
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
        
        var pay_gift_id = $("#pay_gift_id").val();
        if(pay_gift_id>0){
        	var url = "<?php echo $updatePaygiftUrl; ?>";
        }else{
        	var url = "<?php echo $addPaygiftUrl; ?>";
        }

        //提交数据
        var flag = false;
        utilAdmin.validate($('.form-validate'), function (form) {
        	var pay_gift_id = $("#pay_gift_id").val();
            var paygift_name = $("#paygift_name").val();
            var start_time = $("#start_time").val();
            var end_time = $("#end_time").val();
            var modes = $("input[name='modes']:checked").val();
            var modes_id = $("#modes_id").val();
            var modes_money = $("#modes_money").val();
            var grant_node = $("#grant_node").val();
            var grant_state = ($("#grant_state").is(":checked"))?1:0;
            var priority = $("#priority").val();
            var prize_type = $("input[name='prize_type']:checked").val();
            var prize_name = $("#prize_name").val();
            var prize_type_id = $("#prize_type_id").val();
            var prize_num = $("#prize_num").val();
            var prize_pic = $("#prize_pic img").attr('src'); 
            var expire_time = $("#expire_time").val();
            if (flag)return;
            if (utilAdmin.DateTurnTime(start_time) > utilAdmin.DateTurnTime(end_time)){
                utilAdmin.message('活动开始时间必须大于活动结束时间！', 'info', function () {
                    $('#start_time').focus();
                });
                return false;
            }
        	if(prize_type_id==0 && prize_type==3){
        		utilAdmin.message('请选择优惠券');
        		return false;
        	}
        	if(prize_type_id==0 && prize_type==4){
        		utilAdmin.message('请选择礼品券');
        		return false;
        	}
        	if(prize_type_id==0 && prize_type==5){
        		utilAdmin.message('请选择商品');
        		return false;
        	}
        	if(prize_type_id==0 && prize_type==6){
        		utilAdmin.message('请选择赠品');
        		return false;
        	}
            if (utilAdmin.DateTurnTime(expire_time) <= utilAdmin.DateTurnTime(end_time)){
                utilAdmin.message('奖品过期时间必须大于活动结束时间！', 'info', function () {
                    $('#expire_time').focus();
                });
            	return false;
            }
            flag = true;
            var data = {};
        	data.pay_gift_id = pay_gift_id;
        	data.paygift_name = paygift_name;
        	data.start_time = start_time;
        	data.end_time = end_time;
        	data.modes = modes;
        	data.modes_id = modes_id;
        	data.modes_money = modes_money;
        	data.grant_node = grant_node;
        	data.grant_state = grant_state;
        	data.priority = priority;
        	data.prize_type = prize_type;
        	data.prize_name = prize_name;
        	data.prize_type_id = prize_type_id;
        	data.prize_num = prize_num;
        	data.prize_pic = prize_pic;
        	data.expire_time = expire_time;
            $.ajax({
                type: "post",
                url: url,
                data: data,
                success: function (data) {
                    if (data["code"] > 0) {
                        utilAdmin.message(data["message"], 'success',function(){
                            window.location.href="<?php echo __URL('ADDONS_ADMIN_MAINpaygiftList'); ?>";
                        });
                    } else {
                    	flag = false;
                        utilAdmin.message(data["message"], 'danger');
                    }
                }
            });
        });
    })
    //消费方式
    function optionMode(value){
   		html = '';
   		if(value==1){
   			html += '<div class="input-group w-300">';
   			html += '<div class="input-group-addon">满</div>';
   			html += '<input type="number" id="modes_money" name="modes_money" class="form-control" required min="0" value="">';
   			html += '<div class="input-group-addon">元，参与活动</div>';
   			html += '</div>';
   		}else{
   			html += '<div class="btn btn-primary-diy" onclick="loadList(5,1)">点击选择</div>';
   			html += '<div id="goods_info_1" class="media text-left hidden">';
   			html += '<div class="media-left goods-img"><img src="http://iph.href.lu/60x60" width="60" height="60"></div>';
   			html += '<div class="media-body max-w-300"><div class="line-2-ellipsis goods-name"></div><div class="line-1-ellipsis text-danger strong goods-price"></div></div>';
   			html += '</div><input type="hidden" id="modes_id" name="modes_id" value="0" autocomplete="off"/>';
   		}
   		$("#optionMode").html(html);
	}
    //选项
    function optionType(value){
    	var html = '';
    	var tips = '';
    	typeId(0);
		if(value==3 || value==4){
            $.ajax({
                type: "post",
                url: "<?php echo $prizeTypeUrl; ?>",
                data: {
                    'type': value
                },
                success: function (data) {
                	var code = data.code;
                	var data = data.data;
                	if(value==3 && code==1){
                		html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送优惠券</label>';
                		html += '<div class="col-md-5">';
                		html += '<select class="form-control w-200" name="seckill_name" id="seckill_name" required="" aria-required="true" aria-describedby="seckill_name-error" aria-invalid="false" onchange="typeId(this.value)">';
                		if(data.length>0){
                			for (var c=0;c<data.length;c++){
                				if(c==0)typeId(data[c].coupon_type_id);
                				html += '<option value="'+data[c].coupon_type_id+'">'+data[c].coupon_name+'</option>';
                			}
                		}else{
                			html += '<option value="0">请添加优惠券</option>';
                		}
                		html += '</select><span id="seckill_name-error" class="help-block-error"></span></div>';
                		tips = '请保证优惠券剩余库存与奖品数量一致，否则可能导致领奖失败，';
                		$('input[name="prize_type"][value="'+ value +'"]').removeClass('disabled');
                	}else if(value==3 && code==0){
                		$('input[name="prize_type"][value="'+ value +'"]').addClass('disabled');
                		require(['utilAdmin'], function (utilAdmin) {
                		utilAdmin.alert('<div style="margin-top:5px;"><label>商城优惠券应用未开启，请联系商城管理员开启</label></div>', function () {})
                		})
                	}
                	if(value==4 && code==1){
                		html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送礼品券</label>';
                		html += '<div class="col-md-5">';
                		html += '<select class="form-control w-200" name="seckill_name" id="seckill_name" required="" aria-required="true" aria-describedby="seckill_name-error" aria-invalid="false" onchange="typeId(this.value)">';
                		if(data.length>0){
                			for (var g=0;g<data.length;g++){
                				if(g==0)typeId(data[g].gift_voucher_id);
                				html += '<option value="'+data[g].gift_voucher_id+'">'+data[g].giftvoucher_name+'</option>';
                			}
                		}else{
                			html += '<option value="0">请选择礼品券</option>';
                		}
                		html += '</select><span id="seckill_name-error" class="help-block-error"></span></div>';
                		tips = '请保证礼品券剩余库存与奖品数量一致，否则可能导致领奖失败，';
                		$('input[name="prize_type"][value="'+ value +'"]').removeClass('disabled');
                	}else if(value==4 && code==0){
                		$('input[name="prize_type"][value="'+ value +'"]').addClass('disabled');
                		require(['utilAdmin'], function (utilAdmin) {
                		utilAdmin.alert('<div style="margin-top:5px;"><label>商城礼品券应用未开启，请联系商城管理员开启</label></div>', function () {})
                		})
                	}
                	if(!$("#prize-type").html() && code==1)$("#prize-type").html(html);
                	$("#tips").html(tips);
                }
            });
    	}else if(value==5){
    		html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送商品</label>';
    		html += '<div class="col-md-3">';
    		html += '<div class="btn btn-primary-diy" onclick="loadList(5,2)">点击选择</div>';
   			html += '<div id="goods_info_2" class="media text-left hidden">';
   			html += '<div class="media-left goods-img"><img src="http://iph.href.lu/60x60" width="60" height="60"></div>';
   			html += '<div class="media-body max-w-300"><div class="line-2-ellipsis goods-name"></div><div class="line-1-ellipsis text-danger strong goods-price"></div></div>';
   			html += '</div>';
    		html += '</div>';
    		tips = '请保证商品剩余库存与奖品数量一致，否则可能导致领奖失败，';
		}else if(value==6 && setup.gift==1){
			html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送赠品</label>';
			html += '<div class="col-md-3">';
			html += '<div class="btn btn-primary-diy" onclick="loadList(6,0)">点击选择</div>';
			html += '<div id="gift_info" class="media text-left hidden">';
			html += '<div class="media-left gift-img"><img src="http://iph.href.lu/60x60" width="60" height="60"></div>';
			html += '<div class="media-body max-w-300"><div class="line-2-ellipsis gift-name"></div><div class="line-1-ellipsis text-danger strong gift-price"></div></div>';
			html += '</div>';
			html += '</div>';
			tips = '请保证赠品剩余库存与奖品数量一致，否则可能导致领奖失败，';
		}
    	$("#prize-type").html(html);
    	$("#tips").html(tips);
    }
    function typeId(id){
    	$("#prize_type_id").val(id);
    }
    //选商品
    function loadList(type,sort){
    	if(type==6){
    		title = '选择赠品';
    	}else{
    		title = '选择商品';
    	}
        $.confirm({
            title: title,
            content: 'url:'+'<?php echo $prizeTypeUrl; ?>?type='+type+'&sort='+sort,
            animation: 'top',
            columnClass: 'large',
            closeAnimation: 'bottom',
            backgroundDismiss: true,
            animateFromElement: false,
            closeIcon: true,
            buttons: {
                confirm: {
                    text:'确定',
                    btnClass:'btn-primary',
                    action:function(){
                        var content = this.$content.find('#selectedData').data();
                        if(util.isEmpty(content)){
                            util.message('请'+title)
                            return false;
                        }
                        if(callback && callback !== undefined && typeof(callback) === 'function'){
                            callback(content);
                        }
                    }
                },
                cancel: {
                    text:'取消',
                    btnClass:'btn-default',
                    action:function(){
                        console.log('取消了')
                    }
                }
            }

        });
    }
</script>

