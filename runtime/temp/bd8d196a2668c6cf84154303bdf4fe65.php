<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/www/wwwroot/www.tuandr.com/addons/distribution/template/platform/basicSetting.html";i:1583811698;}*/ ?>

			<!-- page -->
			<ul class="nav nav-tabs v-nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="<?php echo __URL('ADDONS_MAINbasicSetting'); ?>"  class="flex-auto-center">基础设置</a></li>
				<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINsettlementSetting'); ?>"  class="flex-auto-center">结算设置</a></li>
				<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=2"  class="flex-auto-center">申请协议</a></li>
				<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=1"  class="flex-auto-center">文案样式</a></li>
				<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=3"  class="flex-auto-center">推送通知</a></li>
			</ul>

			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="base">
					<form class="form-horizontal form-validate  pt-15 widthFixedForm">
						<div class="form-group">
							<label class="col-md-2 control-label">商品分销</label>
							<div class="col-md-5">
								<div class="switch-inline">
									<input type="checkbox" name="distribution_status" id="distribution_status" <?php if($website['is_use'] == 1): ?>checked<?php endif; ?>>
									<label for="distribution_status" class=""></label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>分销模式</label>
							<div class="col-md-5">
								<select class="form-control" id="distribution_pattern" name="distribution_pattern" required >
									<option value="">请选择</option>
									<option value="1"  <?php if($website['distribution_pattern'] == 1): ?> selected="selected"<?php endif; ?>>一级分销</option>
									<option value="2"  <?php if($website['distribution_pattern'] == 2): ?> selected="selected"<?php endif; ?>>二级分销</option>
									<option value="3"  <?php if($website['distribution_pattern'] == 3): ?> selected="selected"<?php endif; ?>>三级分销</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">分销内购</label>
							<div class="col-md-5">
								<div class="switch-inline">
									<input type="checkbox" name="purchasetype" id="purchasetype" <?php if($website['purchase_type'] == 1): ?>checked<?php endif; ?>>
									<label for="purchasetype" class=""></label>
								</div>
								<div class="mb-0 help-block">开启分销内购，分销商自己购买商品，可享受一级佣金，上级享受二级佣金，上上级享受三级佣金。</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">店铺分销</label>
							<div class="col-md-5">
								<div class="switch-inline">
									<input type="checkbox" name="distribution_admin_status" id="distribution_admin_status" <?php if($website['distribution_admin_status'] == 1): ?>checked<?php endif; ?>>
									<label for="distribution_admin_status" class=""></label>
								</div>
								<div class="mb-0 help-block">开启后入驻店铺商品分销产生的佣金由店铺承担，开启前已发布的商品默认参与分销，请提醒入驻店铺编辑商品及时调整佣金比例。</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>成为分销商条件</label>
							<div class="col-md-5">
								<label class="radio-inline">
									<input type="radio" name="distributorcondition" required value="1" <?php if($website['distributor_condition'] == 1): ?>checked<?php endif; ?>> 满足所有勾选条件
								</label>
								<label class="radio-inline">
									<input type="radio" name="distributorcondition" required value="2" <?php if($website['distributor_condition'] == 2): ?>checked<?php endif; ?>> 满足勾选条件之一即可
								</label>
								<label class="radio-inline">
									<input type="radio" name="distributorcondition" required value="-1" <?php if($website['distributor_condition'] == -1): ?>checked<?php endif; ?>>填写资料申请成为分销商
								</label>
								<label class="radio-inline">
									<input type="radio" name="distributorcondition" required value="3" <?php if($website['distributor_condition'] == 3): ?>checked<?php endif; ?>>无条件
								</label>
									<div class="mb-0 help-block">若选择无条件，则会员点击"成为分销商"即可获得分销商身份。</div>
								</div>
						</div>
						<div class="form-group" id="iscondition">
							<label class="col-md-2 control-label"></label>
							<div class="col-md-8">
								<div class="form-additional" style="width: auto">
									<div class="form-group">
										<label class="col-md-4 control-label"><input type="checkbox" name="distributorconditions" value="2" > 消费金额达</label>
										<div class="col-md-7 control-group">
											<div class="input-group">
												<input type="number" class="form-control" min="0" name="pay_money" value="<?php if($website['pay_money']): ?><?php echo $website['pay_money']; endif; ?>" >
												<div class="input-group-addon">元</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label"><input type="checkbox" name="distributorconditions" value="3"> 订单数达</label>
										<div class="col-md-7 control-group">
											<div class="input-group">
												<input type="number" class="form-control" min="0" name="order_number" value="<?php if($website['order_number']): ?><?php echo $website['order_number']; endif; ?>">
												<div class="input-group-addon">单</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label form-control-static"><input type="checkbox" name="distributorconditions" value="4"> 购买商品，并完成订单</label>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label"><input type="checkbox" name="distributorconditions" value="5"> 购买指定商品</label>
										<div class="col-md-7 control-group">
											<div class="picture-list">
												<a href="javascript:;" class="plus-box search_goods <?php if($website['pic']): ?>close-box1<?php endif; ?>">
													<?php if($website['pic']): ?>
													<i class='icon icon-danger' title='删除'></i><img src="<?php echo __IMG($website['pic']); ?>" style='width:80px;height:80px;margin:0;'>
													<?php else: ?>
													<i class="icon icon-plus"></i>
													<?php endif; ?>
												 </a>
												 <input type="text" class="visibility" data-visi-type="singlePicture" name="picture-Logo">
											</div>
											<input type="hidden" name='pic_id' id="pic_id" value="">
											<input type="hidden" name="selectgoods_id" id="selectgoods_id" value="<?php echo $website['goods_id']; ?>">
											<div class="input-group selectid">
												<?php if($website['goods_id']): ?>指定商品：<?php echo $website['goods_name']; endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>成为分销商下线条件</label>
							<div class="col-md-8">
								<div>
								<label class="radio-inline">
									<input type="radio" name="lower_condition" value="1" required <?php if($website['lower_condition'] == 1): ?>checked<?php endif; ?>> 首次打开分享链接
								</label>
								<label class="radio-inline">
									<input type="radio" name="lower_condition" value="2" required <?php if($website['lower_condition'] == 2): ?>checked<?php endif; ?>> 购买商品，并付款
								</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">分销商自动审核</label>
							<div class="col-md-5">
								<div class="switch-inline">
									<input type="checkbox" name="distributorcheck" id="distributorcheck" <?php if($website['distributor_check'] == 1): ?>checked<?php endif; ?>>
									<label for="distributorcheck" class=""></label>
								</div>
                                <div class="mb-0 help-block">开启后无需手动审核分销商</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">分销商必须完善资料</label>
							<div class="col-md-5">
								<div class="switch-inline">
									<input type="checkbox" name="distributorDatum" id="distributorDatum" <?php if($website['distributor_datum'] == 1): ?>checked<?php endif; ?>>
									<label for="distributorDatum" class=""></label>
								</div>
								<div class="mb-0 help-block">开启后未完善资料的分销商在提现时必须完善资料。</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">是否开启跳级降级</label>
							<div class="col-md-5">
								<div class="switch-inline">
									<input type="checkbox" name="distributorgrade" id="distributorgrade" <?php if($website['distributor_grade'] == 1): ?>checked<?php endif; ?>>
									<label for="distributorgrade" class=""></label>
								</div>
								<div class="mb-0 help-block">开启后，分销商按照权重顺序跳级或跳降级，只要升级或降级条件满足则会一直执行。</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label"></label>
							<div class="col-md-8">
								<button class="btn btn-primary add" type="submit">保存</button>
								<a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- page end -->


<script>
    require(['util'],function(util){
    loading();
    function loading(){
    var distributor_conditions = "<?php echo $website['distributor_conditions']; ?>";
    distributor_conditions = distributor_conditions.split(',');
    for(var i = 0; i < distributor_conditions.length;i++){
        $('[name="distributorconditions"][value="'+distributor_conditions[i]+'"]').prop("checked", true);
     }
        var distributor_condition = "<?php echo $website['distributor_condition']; ?>";
        if(distributor_condition==-1 || distributor_condition==3){
            $("#iscondition").hide();
        }else{
            $("#iscondition").show();
        }
   }
        $("input[name='distributorconditions']").click(function () {
			
            if($(this).is(':checked')){
				var vals=$(this).val();
				if(vals!=5 || $("input[name='selectgoods_id']").val()==''){
					$(this).parent(".control-label").siblings(".control-group").find("input").attr("required",true);
			    }
            } else{
                $(this).parents(".form-group").removeClass('has-error');
                $(this).parents(".form-group").find('.help-block-error').html('');
                $(this).parent(".control-label").siblings(".control-group").find("input").removeAttr("required",true);
            }
        })
        $('body').on('click','.search_goods', function () {
            var url = "<?php echo __URL('PLATFORM_MAIN/goods/selectGoodsList'); ?>";
            util.confirm('选择商品','url:'+url, function () {
                var data = this.$content.find('.goods_val').val();
                var pic = $('#pic_id').val();
                $(".selectid").html('指定商品：'+data);
                html='';
                html += "<i class='icon icon-danger' title='删除'></i><img src="+__IMG(pic)+" style='width:100px;height:100px;margin:0;'>";
				$(".search_goods").find('.visibility').removeAttr("required");
				$(".search_goods").addClass('close-box1').removeClass('plus-box').removeClass('search_goods');
                $(".close-box1").html(html);
				$(".close-box1").siblings('.visibility').removeAttr("required");
            })
        })
        $("input[name='distributorcondition']").click(function () {
            if($(this).is(':checked') && $("input[name='distributorcondition']:checked").val()==-1){
                $("#iscondition").hide();
            }else if($(this).is(':checked') && $("input[name='distributorcondition']:checked").val()==3){
                $("#iscondition").hide();
            }else{
                $("#iscondition").show();
            }
        })
		function isInArray(arr,value){
			for(var i = 0; i < arr.length; i++){
				if(value === arr[i]){
					return true;
				}
			}
			return false;
		}
        util.validate($('.form-validate'),function(form){
			var distribution_status = $("input[name='distribution_status']").is(':checked')? 1 : 0;
			var distribution_admin_status = $("input[name='distribution_admin_status']").is(':checked')? 1 : 0;
            var distribution_pattern = $("#distribution_pattern").val();
            var purchasetype = $("input[name='purchasetype']").is(':checked')? 1 : 0;
            var distributorDatum = $("input[name='distributorDatum']").is(':checked')? 1 : 0;
            var distributorcondition = $("input[name='distributorcondition']:checked").val();
            var distributorconditions = $("input:checkbox[name='distributorconditions']:checked").map(function(index,elem) {
                return $(elem).val();
            }).get().join(',');
            if(distributorcondition>0 && distributorconditions=='' && distributorcondition<3){
                util.message('请填写成为分销商条件','danger');
                return false;
            }
            var pay_money = $("input[name='pay_money']").val();
            var order_number = $("input[name='order_number']").val();
            var distributorcheck = $("input[name='distributorcheck']").is(':checked')? 1 : 2;
            var distributorgrade = $("input[name='distributorgrade']").is(':checked')? 1 : 2;
			var arr=distributorconditions.split(',');
	
			if(isInArray(arr,"5")){
				var goods_id = $("input[name='selectgoods_id']").val();
			}else{
				var goods_id ='';
			}
            
            var lower_condition = $("input[name='lower_condition']:checked").val();
            $.ajax({
                type:"post",
                url:"<?php echo $basicSettingUrl; ?>",
                data:{
					'distribution_status':distribution_status,
					'distribution_admin_status':distribution_admin_status,
                    'distribution_pattern':distribution_pattern,
                    'purchase_type':purchasetype,
                    'distributor_datum':distributorDatum,
                    'distributor_condition': distributorcondition,
                    'distributor_conditions':distributorconditions,
                    'pay_money':pay_money,
                    'order_number':order_number,
                    'distributor_check':distributorcheck ,
                    'distributor_grade':distributorgrade,
                    'goods_id':goods_id,
                    'lower_condition':lower_condition
                },
                async:true,
                success:function (data) {
                    if (data['code']>0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINbasicSetting'); ?>");
                    }else if(data['code']==-3) {
                        util.message('该应用有未完成分销数据，暂时无法关闭，必须等分销结算完成才可以进行关闭操作！', 'danger', "<?php echo __URL('ADDONS_MAINbasicSetting'); ?>");
                    }else{
                        util.message(data["message"], 'danger');
                    }
                }
            });
        })
    })
</script>
