<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/www.tuandr.com/addons/wheelsurf/template/admin/updateWheelsurf.html";i:1583811696;}*/ ?>

        <!-- page -->
        <form class="form-horizontal form-validate widthFixedForm">
            <div class="screen-title">
                <span class="text">规则设置</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>活动名称</label>
                <div class="col-md-5">
                    <input type="text" id="wheelsurf_name" class="form-control" name="wheelsurf_name" required value="<?php echo $info['wheelsurf_name']; ?>">
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
                <label class="col-md-2 control-label"><span class="text-bright">*</span>参与次数</label>
                <div class="col-md-5">
                    <div class="input-group w-200">
                    	<div class="input-group-addon">每人每天限</div>
                        <input type="number" id="max_partake_daily" name="max_partake_daily" class="form-control" required min="0" value="<?php echo $info['max_partake_daily']; ?>">
                        <div class="input-group-addon">次</div>
                    </div>
					<div class="mb-0 help-block">0代表不限制</div>
                </div>
            </div>
   
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-5">
                    <div class="input-group w-200">
                    	<div class="input-group-addon">每人最多限</div>
                        <input type="number" id="max_partake" class="form-control" name="max_partake" required min="0" value="<?php echo $info['max_partake']; ?>">
                        <div class="input-group-addon">次</div>
                    </div>
					<div class="mb-0 help-block">0代表不限制</div>
                </div>   
            </div>
            <!--
           <div class="form-group">
                <label class="col-md-2 control-label">消费积分</label>
                <div class="col-md-5">
                    <div class="input-group w-200">
                        <input type="number" id="point" class="form-control" name="point" min="0" value="<?php echo $info['point']; ?>">
                        <div class="input-group-addon">积分/次</div>
                    </div>
                </div>
            </div>
          	-->
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>活动说明</label>
                <div class="col-md-5">
                    <textarea id="desc" class="form-control" name="desc" rows="4" required><?php echo $info['desc']; ?></textarea>
                </div>
            </div>
            
   			<div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>轮盘奖项</label>
                <div class="col-md-5">
                    <label class="radio-inline">
                      <input type="radio" class="term_num term_num6" name="term_num" value="6" <?php if(($info['wheelsurf_id']>0)): ?>disabled<?php endif; if(($info['term_num']==6 || !$info['term_num'])): ?> checked<?php endif; ?> aria-invalid="false">6个奖项
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="term_num" name="term_num" value="8" <?php if(($info['wheelsurf_id']>0)): ?>disabled<?php endif; if(($info['term_num']==8)): ?> checked<?php endif; ?> aria-invalid="false">8个奖项
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="term_num" name="term_num" value="10" <?php if(($info['wheelsurf_id']>0)): ?>disabled<?php endif; if(($info['term_num']==10)): ?> checked<?php endif; ?> aria-invalid="false">10个奖项
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="term_num" name="term_num" value="12" <?php if(($info['wheelsurf_id']>0)): ?>disabled<?php endif; if(($info['term_num']==12)): ?> checked<?php endif; ?> aria-invalid="false">12个奖项
                    </label>
					<div class="mb-0 help-block">活动发布后不能编辑，谨慎选择</div>
                </div>
                
            </div>
            
	        <div class="form-group">
		        <label class="col-md-2 control-label">轮盘背景图片</label>
		        <div class="col-md-8">
					<div class="picture-list" id="background_pic">
						<?php if(($info['background_pic'])): ?>
						<a href="javascript:void(0);" class="close-box">
							<i class="icon icon-danger" style="margin-right:10px;" title="删除"></i>
							<img src="<?php echo $info['background_pic']; ?>">
						</a>
						<?php else: ?>
						<a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
						<?php endif; ?>
					</div>
			        <p class="mb-0 help-block">建议500*500PNG格式图片，不上传则用系统默认</p>
		        </div>
	        </div>
            
           <div class="form-group">
		        <label class="col-md-2 control-label">指针图片</label>
		        <div class="col-md-8">
					<div class="picture-list" id="pointer_pic">
						<?php if(($info['pointer_pic'])): ?>
						<a href="javascript:void(0);" class="close-box">
							<i class="icon icon-danger" style="margin-right:10px;" title="删除"></i>
							<img src="<?php echo $info['pointer_pic']; ?>">
						</a>
						<?php else: ?>
						<a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
						<?php endif; ?>
					</div>
			        <p class="mb-0 help-block">建议500*500PNG格式图片，不上传则用系统默认</p>
		        </div>
	        </div>

            <div class="screen-title">
                <span class="text">奖品设置</span>
            </div>
            <div class="form-group">
            	<div class="col-md-12">
		            <ul id="ul-prize" class="nav nav-tabs v-nav-tabs add_tab1" role="tablist">
		            	<?php if(is_array($info['prize']) || $info['prize'] instanceof \think\Collection || $info['prize'] instanceof \think\Paginator): $k = 0; $__LIST__ = $info['prize'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($k % 2 );++$k;?>
	                	<li role="presentation" id="li-prize_<?php echo $k; ?>" class="<?php if(($k==1)): ?>active<?php endif; ?> li-prize"><a href="#prize_<?php echo $k; ?>" role="tab" data-toggle="tab" class="flex-auto-center"><?php echo $li['term_name']; ?></a></li>
	                	<?php endforeach; endif; else: echo "" ;endif; ?>
	                </ul>
		            <div id="tab-prize" class="tab-content">
		            <?php if(is_array($info['prize']) || $info['prize'] instanceof \think\Collection || $info['prize'] instanceof \think\Paginator): $sort = 0; $__LIST__ = $info['prize'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prize): $mod = ($sort % 2 );++$sort;?>
	            	<div role="tabpanel" class="tab-<?php echo $sort; ?> info-prize tab-pane fade <?php if(($sort==1)): ?>active in<?php endif; ?>" id="prize_<?php echo $sort; ?>" data-sort="<?php echo $sort; ?>">
			         	<div class="form-group">
				            <label class="col-md-2 control-label"><span class="text-bright">*</span>奖项名称</label>
				            <div class="col-md-5">
				                <input type="text" class="form-control term_name" name="term_name<?php echo $sort; ?>" required value="<?php echo $prize['term_name']; ?>"  oninput="wordsChange(this.value,<?php echo $sort; ?>)">
								<div class="mb-0 help-block">例：一等奖、二等奖、参与奖</div>
				            </div>
				            
			        	</div>
			        	
			        	<div class="form-group">
	                        <label class="col-md-2 control-label"><span class="text-bright">*</span>奖品类型</label>
	                        <div class="col-md-6">
	                        	<label class="radio-inline">
	                              <input type="radio" name="prize_type<?php echo $sort; ?>" value="0" <?php if(($prize['prize_type']==0)): ?>checked<?php endif; ?> aria-invalid="false" onclick="optionType(this.value,<?php echo $sort; ?>)">未中奖
	                            </label>
	                            <label class="radio-inline">
	                              <input type="radio" name="prize_type<?php echo $sort; ?>" value="5" <?php if(($prize['prize_type']==5)): ?>checked<?php endif; ?> aria-invalid="false" onclick="optionType(this.value,<?php echo $sort; ?>)">商品
	                            </label>
	                            <?php if(($setup['coupontype']['is_state']==1)): ?>
	                            <label class="radio-inline">
	                              <input type="radio" name="prize_type<?php echo $sort; ?>" value="3" <?php if(($prize['prize_type']==3)): ?>checked<?php endif; ?> aria-invalid="false" onclick="optionType(this.value,<?php echo $sort; ?>)" <?php if(($setup['coupontype']['is_use']==0)): ?>class="disabled"<?php endif; ?>>优惠券
	                            </label>
	                            <?php endif; if(($setup['giftvoucher']['is_state']==1)): ?>
	                            <label class="radio-inline">
	                              <input type="radio" name="prize_type<?php echo $sort; ?>" value="4" <?php if(($prize['prize_type']==4)): ?>checked<?php endif; ?> aria-invalid="false" onclick="optionType(this.value,<?php echo $sort; ?>)" <?php if(($setup['giftvoucher']['is_use']==0)): ?>class="disabled"<?php endif; ?>>礼品券
	                            </label>
	                            <?php endif; if(($setup['gift']['is_state']==1)): ?>
	                            <label class="radio-inline">
	                              <input type="radio" name="prize_type<?php echo $sort; ?>" value="6" <?php if(($prize['prize_type']==6)): ?>checked<?php endif; ?> aria-invalid="false" onclick="optionType(this.value,<?php echo $sort; ?>)" <?php if(($setup['gift']['is_use']==0)): ?>class="disabled"<?php endif; ?>>赠品
	                            </label>
	                            <?php endif; ?>
	                            <input type="hidden" name="prize_type" value="<?php echo $prize['prize_type']; ?>" class="prize_type" id="prize_type<?php echo $sort; ?>" autocomplete="off">
	                        </div>
	                    </div>
	                    
	                    <div class="form-group">
				            <label class="col-md-2 control-label"><span class="text-bright">*</span>奖品名称</label>
				            <div class="col-md-5">
				                <input type="text" class="form-control prize_name" name="prize_name<?php echo $sort; ?>" required value="<?php echo $prize['prize_name']; ?>">
				            </div>
			        	</div>
			        	
					    <div class="form-group">
			                <label class="col-md-2 control-label"><span class="text-bright">*</span>奖品数量</label>
			                <div class="col-md-5">
			                    <div class="input-group w-200">
			                        <input type="number" name="num<?php echo $sort; ?>" class="form-control num" required min="0" value="<?php echo $prize['num']; ?>">
			                        <div class="input-group-addon">件</div>
			                    </div>
								<div class="mb-0 help-block">
									<span id="tips_<?php echo $sort; ?>"><?php if(($prize['prize_type']==3 || $prize['prize_type']==4 || $prize['prize_type']==5 || $prize['prize_type']==6)): ?>请保证<?php if(($prize['prize_type']==3)): ?>优惠券<?php endif; if(($prize['prize_type']==4)): ?>优惠券<?php endif; if(($prize['prize_type']==5)): ?>商品<?php endif; if(($prize['prize_type']==6)): ?>赠品<?php endif; ?>剩余库存与奖品数量一致，否则可能导致领奖失败，<?php endif; ?></span>
									奖品为0时则不会抽中该奖项
								</div>
			                </div>
			                
			            </div>
			            
			            <div class="form-group">
			                <label class="col-md-2 control-label"><span class="text-bright">*</span>中奖概率</label>
			                <div class="col-md-5">
			                    <div class="input-group w-200">
			                        <input type="number" name="probability<?php echo $sort; ?>" class="form-control probability" required min="0" value="<?php echo $prize['probability']; ?>">
			                        <div class="input-group-addon">%</div>
			                    </div>
								<div class="mb-0 help-block">奖项累计中奖概率不能大于100%</div>
			                </div>
			                
			            </div>
			            <div class="form-group" id="prize-type_<?php echo $sort; ?>">
			                <?php if(($prize['prize_type']==3)): ?>
			            	<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送优惠券</label>
                			<div class="col-md-5">
	                			<select class="form-control w-200" name="seckill_name<?php echo $sort; ?>" id="seckill_name" required onchange="typeId(this.value,<?php echo $sort; ?>)">
	                				<?php if(is_array($info['coupon']) || $info['coupon'] instanceof \think\Collection || $info['coupon'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['coupon'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$coupon): $mod = ($i % 2 );++$i;?>
	                				<option value="<?php echo $coupon['coupon_type_id']; ?>" <?php if(($coupon['coupon_type_id']==$prize['prize_type_id'])): ?>selected = "selected"<?php endif; ?> ><?php echo $coupon['coupon_name']; ?></option>
	                				<?php endforeach; endif; else: echo "" ;endif; ?>
	                			</select>
                			</div>
                			<?php endif; if(($prize['prize_type']==4)): ?>
			            	<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送礼品券</label>
                			<div class="col-md-5">
	                			<select class="form-control w-200" name="seckill_name<?php echo $sort; ?>" id="seckill_name" required onchange="typeId(this.value,<?php echo $sort; ?>)">
	                				<?php if(is_array($info['giftvoucher']) || $info['giftvoucher'] instanceof \think\Collection || $info['giftvoucher'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['giftvoucher'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$giftvoucher): $mod = ($i % 2 );++$i;?>
	                				<option value="<?php echo $giftvoucher['gift_voucher_id']; ?>" <?php if(($giftvoucher['gift_voucher_id']==$prize['prize_type_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $giftvoucher['giftvoucher_name']; ?></option>
	                				<?php endforeach; endif; else: echo "" ;endif; ?>
	                			</select>
	                			
                			</div>
                			<?php endif; if(($prize['prize_type']==5)): ?>
                			<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送商品</label>
							<div class="col-md-3">
								<div class="btn btn-primary-diy" onclick="loadList(5,<?php echo $sort; ?>)">点击选择</div>
								<div id="goods_info_<?php echo $sort; ?>" class="media text-left">
					    			<div class="media-left goods-img"><img src="<?php echo $prize['goods']['pic_cover']; ?>" width="60" height="60"></div>
					    			<div class="media-body max-w-300"><div class="line-2-ellipsis goods-name"><?php echo $prize['goods']['goods_name']; ?></div><div class="line-1-ellipsis text-danger strong goods-price"><?php echo $prize['goods']['price']; ?></div></div>
		    					</div>
							</div>
                			<?php endif; if(($prize['prize_type']==6)): ?>
                			<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送赠品</label>
							<div class="col-md-3">
								<div class="btn btn-primary-diy" onclick="loadList(6,<?php echo $sort; ?>)">点击选择</div>
					            <div id="gift_info_<?php echo $sort; ?>" class="media text-left">
						    		<div class="media-left gift-img"><img src="<?php echo $prize['gift']['pic_cover']; ?>" width="60" height="60"></div>
						    		<div class="media-body max-w-300"><div class="line-2-ellipsis gift-name"><?php echo $prize['gift']['gift_name']; ?></div><div class="line-1-ellipsis text-danger strong gift-price"><?php echo $prize['gift']['price']; ?></div></div>
					    		</div>
							</div>
                			<?php endif; ?>
			            </div>
			            
			            <input type="hidden" name="prize_type_id" value="<?php echo $prize['prize_type_id']; ?>" class="prize_type_id" id="prize_type_id<?php echo $sort; ?>" autocomplete="off">
				        <div class="form-group">
					        <label class="col-md-2 control-label">奖品图片</label>
					        <div class="col-md-8">
								<div class="picture-list">
									<?php if(($prize['prize_pic'])): ?>
									<a href="javascript:void(0);" class="close-box">
										<i class="icon icon-danger" style="margin-right:10px;" title="删除"></i>
										<img src="<?php echo $prize['prize_pic']; ?>">
									</a>
									<?php else: ?>
									<a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
									<?php endif; ?>
								</div>
						        <p class="help-block mb-0">建议100*100PNG格式图片，不传则用系统默认图</p>
					        </div>
				        </div>
				        
					    <div class="form-group">
			                <label class="col-md-2 control-label"><span class="text-bright">*</span>奖品过期时间</label>
							<div class="col-md-8">
								<div class="v-datetime-input-control">
									<label for="expire_time<?php echo $sort; ?>">
										<input type="text" class="form-control expire_time" id="expire_time<?php echo $sort; ?>" placeholder="过期时间" value="<?php echo date('Y-m-d',$prize['expire_time']) ?>" autocomplete="off" name="expire_time<?php echo $sort; ?>" required>
										<i class="icon icon-calendar"></i>
									</label>
								</div>

								<div class="mb-0 help-block">超出时间未领取则不能领取,开始时间点为选中日期的0:00:00</div>
							</div>

			            </div>
			            <input type="hidden" name="prize_id" value="<?php echo $prize['prize_id']; ?>" class="prize_id" autocomplete="off"/>
	             	</div>
	             	<?php endforeach; endif; else: echo "" ;endif; ?>
	             	</div>
                </div>
            </div>
            
            <div class="form-group"></div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary" type="submit"><?php if(($info['wheelsurf_id']>0)): ?>修改<?php else: ?>添加<?php endif; ?></button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
            <input type="hidden" id="wheelsurf_id" name="wheelsurf_id" value="<?php echo $info['wheelsurf_id']; ?>" autocomplete="off"/>
        </form>

        <!-- page end -->


<script>
	var is_use = {
   		coupontype:<?php echo $setup['coupontype']['is_use']; ?>,	
   		giftvoucher:<?php echo $setup['giftvoucher']['is_use']; ?>,
   		gift:<?php echo $setup['gift']['is_use']; ?>
    }
	var is_state = {
   		coupontype:<?php echo $setup['coupontype']['is_state']; ?>,	
   		giftvoucher:<?php echo $setup['giftvoucher']['is_state']; ?>,
   		gift:<?php echo $setup['gift']['is_state']; ?>
	}
    require(['utilAdmin'], function (utilAdmin) {
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

        //添加奖项
        $('.term_num').click(function () {
        	var term_num = $(this).val();
			var li = '';
            for (var l=1;l<=term_num;l++){
    			li += '<li role="presentation" id="li-prize_'+l+'" class="li-prize"><a href="#prize_'+l+'" role="tab" data-toggle="tab" class="flex-auto-center">奖项'+l+'</a></li>';
            }
			var html = '';
			for (var i=1;i<=term_num;i++){
				html += '<div role="tabpanel" class="tab-'+i+' info-prize tab-pane fade" id="prize_'+i+'" data-sort="'+i+'">';
				html += '<div class="form-group">';
				html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>奖项名称</label>';
				html += '<div class="col-md-5"><input type="text" class="form-control term_name" name="term_name'+i+'" required value="奖项'+i+'" oninput="wordsChange(this.value,'+i+')"><div class="mb-0 help-block">例：一等奖、二等奖、参与奖</div></div>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>奖品类型</label>';
				html += '<div class="col-md-6">';
				html += '<label class="radio-inline"><input type="radio" name="prize_type'+i+'" value="0" checked="" aria-invalid="false" onclick="optionType(this.value,'+i+')">未中奖</label>';
				html += '<label class="radio-inline"><input type="radio" name="prize_type'+i+'" value="5" aria-invalid="false" onclick="optionType(this.value,'+i+')">商品</label>';
				if(is_state.coupontype==1){
					var disabled_html = '';
					if(is_use.coupontype==0)disabled_html = 'class="disabled"';
					html += '<label class="radio-inline"><input type="radio" name="prize_type'+i+'" value="3" aria-invalid="false" onclick="optionType(this.value,'+i+')" '+disabled_html+'>优惠券</label>';
				}
				if(is_state.giftvoucher==1){
					var disabled_html = '';
					if(is_use.giftvoucher==0)disabled_html = 'class="disabled"';
					html += '<label class="radio-inline"><input type="radio" name="prize_type'+i+'" value="4" aria-invalid="false" onclick="optionType(this.value,'+i+')" '+disabled_html+'>礼品券</label>';
				}
				if(is_state.gift==1){
					var disabled_html = '';
					if(is_use.gift==0)disabled_html = 'class="disabled"';
					html += '<label class="radio-inline"><input type="radio" name="prize_type'+i+'" value="6" aria-invalid="false" onclick="optionType(this.value,'+i+')" '+disabled_html+'>赠品</label>';
				}
				html += '<input type="hidden" name="prize_type" value="0" class="prize_type" id="prize_type'+i+'" autocomplete="off"></div></div>';
				html += '<div class="form-group">';
				html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>奖品名称</label>';
		        html += '<div class="col-md-5"><input type="text" class="form-control prize_name" name="prize_name'+i+'" required value=""></div>';
		        html += '</div>';
		        html += '<div class="form-group">';
		        html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>奖品数量</label>';
		        html += '<div class="col-md-5"><div class="input-group w-200"><input type="number" name="num'+i+'" class="form-control num" required min="0" value=""><div class="input-group-addon">件</div></div><div class="mb-0 help-block"><span id="tips_'+i+'"></span>奖品为0时则不会抽中该奖项</div></div>';
		        html += '</div>';
		        html += '<div class="form-group">';
		        html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>中奖概率</label>';
		        html += '<div class="col-md-5"><div class="input-group w-200"><input type="number" name="probability'+i+'" class="form-control probability" required min="0"><div class="input-group-addon">%</div></div><div class="mb-0 help-block">奖项累计中奖概率不能大于100%</div></div>';

		        html += '</div><input type="hidden" name="prize_type_id" value="0" class="prize_type_id" id="prize_type_id'+i+'" autocomplete="off">';
		        html += '<div class="form-group" id="prize-type_'+i+'"></div>';
		        html += '<div class="form-group">';
		        html += '<label class="col-md-2 control-label">奖品图片</label>';
		        html += '<div class="col-md-8">';
		        html += '<div class="picture-list"><a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a></div>';
		        html += '<p class="help-block mb-0">建议100*100PNG格式图片，不传则用系统默认图</p></div>';
		        html += '</div>';
		        html += '<div class="form-group">';
		        html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>奖品过期时间</label>';
		        html += '<div class="col-md-5">';
				html += '<div class="v-datetime-input-control"><label for="expire_time_'+i+'">';
				html += '<input type="text" class="form-control expire_time" id="expire_time_'+i+'" placeholder="过期时间" value="" autocomplete="off" name="expire_time'+i+'" required>';
				html += '<i class="icon icon-calendar"></i></label>';
				html += '</div><div class="mb-0 help-block">超出时间未领取则不能领取,开始时间点为选中日期的0:00:00</div>';
	            html += '</div>';
	            // html += '';
	            html += '</div><input type="hidden" name="prize_id" value="0" class="prize_id" autocomplete="off"/></div>';
	            utilAdmin.layDate("#expire_time_"+i,false,function(){
					$("#expire_time_"+i).parents('.form-group').removeClass('has-error');
				});
			}
            $('#ul-prize').html(li);
            $('#tab-prize').html(html);
            $('.li-prize').removeClass('active');
            $('.tab-pane').removeClass('active in');
            $('#li-prize_1').addClass('active');
            $('#prize_1').addClass('active in');
        });
        var wheelsurf_id = $("#wheelsurf_id").val();
        if(wheelsurf_id>0){
        	var url = "<?php echo $updateWheelsurfUrl; ?>";
        	var prizeNum = parseInt("<?php echo $info['prizeNum']; ?>")+1;
        	for (var p=1;p<prizeNum;p++){
        		utilAdmin.layDate("#expire_time"+p,false,function(){
					$("#expire_time"+p).parents('.form-group').removeClass('has-error');
				});
        	}
        }else{
        	var url = "<?php echo $addWheelsurfUrl; ?>";
        	$('.term_num6.term_num').click();
        }

        //提交数据
        var flag = false;
        utilAdmin.validate2($('.form-validate'), function (form) {
        	var wheelsurf_id = $("#wheelsurf_id").val();
            var wheelsurf_name = $("#wheelsurf_name").val();
            var start_time = $("#start_time").val();
            var end_time = $("#end_time").val();
            var max_partake_daily = parseInt($("#max_partake_daily").val());
            var max_partake = parseInt($("#max_partake").val());
            var point = $("#point").val();
            var desc = $("#desc").val();
            var term_num = $("input[name='term_num']:checked").val();
            var background_pic = $("#background_pic img").attr('src');
            var pointer_pic = $("#pointer_pic img").attr('src');
            if (flag)return;
            if (utilAdmin.DateTurnTime(start_time) > utilAdmin.DateTurnTime(end_time)){
                utilAdmin.message('活动开始时间必须大于活动结束时间！', 'info', function () {
                    $('#start_time').focus();
                });
                return false;
            }
            if (max_partake < max_partake_daily && max_partake!=0){
                utilAdmin.message('每人每天限次数必须小于每人最多限次数！', 'info', function () {
                    $('#max_partake_daily').focus();
                });
                return false;
            }
        	var data = {};
        	var probability = 0;
        	var state = 1;
        	var sorts = '';
        	$(".info-prize").each(function(){
            	var sort = $(this).data('sort');
            	sorts += sort + ',';
            	data['prize_id'+sort] = $(this).find('.prize_id').val();
            	data['term_name'+sort] = $(this).find('.term_name').val();
            	data['prize_type'+sort] = $(this).find('.prize_type').val();
            	data['prize_name'+sort] = $(this).find('.prize_name').val();
            	data['num'+sort] = parseInt($(this).find('.num').val());
            	data['probability'+sort] = parseFloat($(this).find('.probability').val());
            	data['prize_type_id'+sort] = $(this).find('.prize_type_id').val();
            	data['prize_money'+sort] = $(this).find('.prize_money').val();
            	data['prize_point'+sort] = $(this).find('.prize_point').val();
            	data['prize_pic'+sort] = $(this).find('.picture-list img').attr('src');
            	data['expire_time'+sort] = $(this).find('.expire_time').val();
            	data['sort'+sort] = sort;
            	probability += data['probability'+sort];
            	if(data['prize_type_id'+sort]==0 && data['prize_type'+sort]==3){
            		utilAdmin.message(data['term_name'+sort]+'请选择优惠券');
            		state = 0;
            	}
            	if(data['prize_type_id'+sort]==0 && data['prize_type'+sort]==4){
            		utilAdmin.message(data['term_name'+sort]+'请选择礼品券');
            		state = 0;
            	}
            	if(data['prize_type_id'+sort]==0 && data['prize_type'+sort]==5){
            		utilAdmin.message(data['term_name'+sort]+'请选择商品');
            		state = 0;
            	}
            	if(data['prize_type_id'+sort]==0 && data['prize_type'+sort]==6){
            		util.message(data['term_name'+sort]+'请选择赠品');
            		state = 0;
            	}
                if (utilAdmin.DateTurnTime(data['expire_time'+sort]) <= utilAdmin.DateTurnTime(end_time)){
                	utilAdmin.message(data['term_name'+sort]+'奖品过期时间必须大于活动结束时间');
                	state = 0;
                }
        	});
        	if(state == 0)return;
        	if(!sorts){
            	utilAdmin.message('请添加奖项');
                return false;
        	}
        	if(probability>100){
            	utilAdmin.message('奖项累计中奖概率不能大于100%');
                return false;
        	}
            flag = true;
        	data.wheelsurf_id = wheelsurf_id;
        	data.wheelsurf_name = wheelsurf_name;
        	data.start_time = start_time;
        	data.end_time = end_time;
        	data.max_partake_daily = max_partake_daily;
        	data.max_partake = max_partake;
        	data.point = point;
        	data.desc = desc;
        	data.term_num = term_num;
        	data.background_pic = background_pic;
        	data.pointer_pic = pointer_pic;
        	data.sorts = sorts.substr(0, sorts.length - 1);
            $.ajax({
                type: "post",
                url: url,
                data: data,
                success: function (data) {
                    if (data["code"] > 0) {
                        utilAdmin.message(data["message"], 'success',function(){
                        	window.location.href="<?php echo __URL('ADDONS_ADMIN_MAINwheelsurfList'); ?>";
                        });
                    } else {
                        utilAdmin.message(data["message"], 'danger');
                    }
                }
            });
        });
    })
    //改变文字
    function wordsChange(value,sort){
    	$('#li-prize_'+sort+' a').html(value);
    }
    //选项
    function optionType(value,sort){
    	var html = '';
    	var tips = '';
    	typeId(0,sort);
		$("#goods_info_"+sort).remove();
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
                		html += '<select class="form-control w-200" name="seckill_name'+sort+'" id="seckill_name" required onchange="typeId(this.value,'+sort+')">';
                		if(data.length>0){
                			for (var c=0;c<data.length;c++){
                				if(c==0)typeId(data[c].coupon_type_id,sort);
                				html += '<option value="'+data[c].coupon_type_id+'">'+data[c].coupon_name+'</option>';
                			}
                		}else{
                			html += '<option value="0">请添加优惠券</option>';
                		}
                		html += '</select></div>';
                		tips = '请保证优惠券剩余库存与奖品数量一致，否则可能导致领奖失败，';
                		$('input[value="'+ value +'"]').removeClass('disabled');
                	}else if(value==3 && code==0){
                		$('input[value="'+ value +'"]').addClass('disabled');
                		require(['utilAdmin'], function (utilAdmin) {
                		utilAdmin.alert('<div style="margin-top:5px;"><label>商城优惠券应用未开启，请联系商城管理员开启</label></div>', function () {})
                		})
                	}
                	if(value==4 && code==1){
                		html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送礼品券</label>';
                		html += '<div class="col-md-5">';
                		html += '<select class="form-control w-200" name="seckill_name'+sort+'" id="seckill_name" required onchange="typeId(this.value,'+sort+')">';
                		if(data.length>0){
                			for (var g=0;g<data.length;g++){
                				if(g==0)typeId(data[g].gift_voucher_id,sort);
                				html += '<option value="'+data[g].gift_voucher_id+'">'+data[g].giftvoucher_name+'</option>';
                			}
                		}else{
                			html += '<option value="0">请选择礼品券</option>';
                		}
                		html += '</select></div>';
                		tips = '请保证礼品券剩余库存与奖品数量一致，否则可能导致领奖失败，';
                		$('input[value="'+ value +'"]').removeClass('disabled');
                	}else if(value==4 && code==0){
                		$('input[value="'+ value +'"]').addClass('disabled');
                		require(['utilAdmin'], function (utilAdmin) {
                		utilAdmin.alert('<div style="margin-top:5px;"><label>商城礼品券应用未开启，请联系商城管理员开启</label></div>', function () {})
                		})
                	}
                	if(!$("#prize-type_"+sort).html() && code==1)$("#prize-type_"+sort).html(html);
                	$("#tips_"+sort).html(tips);
                }
            });
    	}else if(value==5){
    		html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送商品</label>';
    		html += '<div class="col-md-3">';
    		html += '<div class="btn btn-primary-diy" onclick="loadList(5,'+sort+')">点击选择</div>';
   			html += '<div id="goods_info_'+sort+'" class="media text-left hidden">';
   			html += '<div class="media-left goods-img"><img src="http://iph.href.lu/60x60" width="60" height="60"></div>';
   			html += '<div class="media-body max-w-300"><div class="line-2-ellipsis goods-name"></div><div class="line-1-ellipsis text-danger strong goods-price"></div></div>';
   			html += '</div>';
    		html += '</div>';
       		tips = '请保证商品剩余库存与奖品数量一致，否则可能导致领奖失败，';
    	}else if(value==6 && setup.gift==1){
    		html += '<label class="col-md-2 control-label"><span class="text-bright">*</span>赠送赠品</label>';
    		html += '<div class="col-md-3">';
    		html += '<div class="btn btn-primary-diy" onclick="loadList(6,'+sort+')">点击选择</div>';
   			html += '<div id="gift_info_'+sort+'" class="media text-left hidden">';
   			html += '<div class="media-left gift-img"><img src="http://iph.href.lu/60x60" width="60" height="60"></div>';
   			html += '<div class="media-body max-w-300"><div class="line-2-ellipsis gift-name"></div><div class="line-1-ellipsis text-danger strong gift-price"></div></div>';
   			html += '</div>';
    		html += '</div>';
			tips = '请保证赠品剩余库存与奖品数量一致，否则可能导致领奖失败，';
    	}
    	$("#prize_type"+sort).val(value);
    	$("#prize-type_"+sort).html(html);
    	$("#tips_"+sort).html(tips);
    }
    function typeId(id,sort){
    	$("#prize_type_id"+sort).val(id);
    }
    //加载列表
    function loadList(type,sort){
    	if(type==5){
    		title = '选择商品';
    	}else{
    		title = '选择赠品';
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

