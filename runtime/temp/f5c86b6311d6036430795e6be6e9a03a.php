<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"/www/wwwroot/www.tuandr.com/addons/distribution/template/platform/applicationAgreement.html";i:1583811698;}*/ ?>


		<!-- page -->
		<ul class="nav nav-tabs v-nav-tabs" role="tablist">
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINbasicSetting'); ?>"  class="flex-auto-center">基础设置</a></li>
			<li role="presentation" ><a href="<?php echo __URL('ADDONS_MAINsettlementSetting'); ?>"  class="flex-auto-center">结算设置</a></li>
			<li role="presentation" <?php if($type==2): ?>class="active"<?php endif; ?>><a href="<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=2"  class="flex-auto-center">申请协议</a></li>
			<li role="presentation" <?php if($type==1): ?>class="active"<?php endif; ?>><a href="<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=1"  class="flex-auto-center">文案样式</a></li>
			<li role="presentation" <?php if($type==3): ?>class="active"<?php endif; ?>><a href="<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=3"  class="flex-auto-center">推送通知</a></li>
		</ul>
		<div class="tab-content">
			<?php if($type==1): ?>
			<div role="tabpanel" class="tab-pane tab-pane fade in active" id="protocols">
				<form class="form-horizontal form-validate1 pt-15">
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>注册分销商海报图片</label>
						<div class="col-md-5">
							<div class="picture-list" id="Logo">
								<?php if($website['logo']): ?>
								<a href="javascript:;" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="<?php if($website['logo']): ?><?php echo __IMG($website['logo']); endif; ?>"></a>
								<?php else: ?>
								<a href="javascript:;" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
								<?php endif; ?>
							</div>
							<div class="mb-0 help-block">
								建议700 * 394，支持JPG\GIF\PNG格式
							</div>
						</div>
					</div>
					<div class="form-group distribution_rules">
						<label class="col-md-2 control-label">商品分销标识</label>
						<div class="col-md-8" >
							<div class="switch-inline">
								<input type="checkbox" name="distribution_label" id="distribution_label" <?php if($website['distribution_label']==1): ?>checked<?php endif; ?>>
								<label for="distribution_label" class=""></label>
							</div>
							<div class="mb-0 help-block">
								开启后分销商可在商品详情页查看商品的分销佣金情况。
							</div>
						</div>
					</div>
					<?php if($pc_set): ?>
					<div class="form-group">
						<label class="col-md-2 control-label">分销中心</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="distribution_name" placeholder="分销中心"  value="<?php if($website['distribution_name']): ?><?php echo $website['distribution_name']; else: ?>分销中心<?php endif; ?>" >
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="form-group">
						<label class="col-md-2 control-label">分销商名称</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="distributor_name" placeholder="分销商"  value="<?php if($website['distributor_name']): ?><?php echo $website['distributor_name']; else: ?>分销商<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">佣金</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="commission" placeholder="佣金"   value="<?php if($website['commission']): ?><?php echo $website['commission']; else: ?>佣金<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">分销佣金</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="distribution_commission"  placeholder="分销佣金" value="<?php if($website['distribution_commission']): ?><?php echo $website['distribution_commission']; else: ?>分销佣金<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">可提现佣金</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="withdrawable_commission"  placeholder="可提现佣金" value="<?php if($website['withdrawable_commission']): ?><?php echo $website['withdrawable_commission']; else: ?>可提现佣金<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">累积佣金</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="total_commission"  placeholder="累积佣金" value="<?php if($website['total_commission']): ?><?php echo $website['total_commission']; else: ?>累积佣金<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">已提现佣金</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="withdrawals_commission"  placeholder="已提现佣金" value="<?php if($website['withdrawals_commission']): ?><?php echo $website['withdrawals_commission']; else: ?>已提现佣金<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">冻结佣金</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="frozen_commission"  placeholder="冻结佣金" value="<?php if($website['frozen_commission']): ?><?php echo $website['frozen_commission']; else: ?>冻结佣金<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">提现中</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="withdrawal" placeholder="提现中"  value="<?php if($website['withdrawal']): ?><?php echo $website['withdrawal']; else: ?>提现中<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">佣金明细</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="commission_details"   placeholder="佣金明细" value="<?php if($website['commission_details']): ?><?php echo $website['commission_details']; else: ?>佣金明细<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">分销订单</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="distribution_order"  placeholder="分销订单" value="<?php if($website['distribution_order']): ?><?php echo $website['distribution_order']; else: ?>分销订单<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">我的团队</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="my_team" placeholder="我的团队"  value="<?php if($website['my_team']): ?><?php echo $website['my_team']; else: ?>我的团队<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">团队级别名称</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="team1" placeholder="一级"  value="<?php if($website['team1']): ?><?php echo $website['team1']; else: ?>一级<?php endif; ?>" >
							</div>
							<br>
							<div class="input-group">
								<input type="text" class="form-control" id="team2" placeholder="二级"  value="<?php if($website['team2']): ?><?php echo $website['team2']; else: ?>二级<?php endif; ?>" >
							</div>
							<br>
							<div class="input-group">
								<input type="text" class="form-control" id="team3" placeholder="三级"  value="<?php if($website['team3']): ?><?php echo $website['team3']; else: ?>三级<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">我的客户</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="my_customer" placeholder="我的客户"  value="<?php if($website['my_customer']): ?><?php echo $website['my_customer']; else: ?>我的客户<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">推广码</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="extension_code" placeholder="推广码"  value="<?php if($website['extension_code']): ?><?php echo $website['extension_code']; else: ?>推广码<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">分销小提示</label>
						<div class="col-md-5">
							<div class="input-group">
								<textarea class="form-control" cols="60" rows="5" id="distribution_tips"  placeholder="分销小提示：可以通过二维码、邀请链接或者邀请码发展下线客户，下线客户购买商品后你可以获得相应的佣金奖励"><?php if($website['distribution_tips']): ?><?php echo $website['distribution_tips']; else: ?>分销小提示：可以通过二维码、邀请链接或者邀请码发展下线客户，下线客户购买商品后你可以获得相应的佣金奖励<?php endif; ?></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">成为分销商</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="become_distributor"  placeholder="成为分销商" value="<?php if($website['become_distributor']): ?><?php echo $website['become_distributor']; else: ?>成为分销商<?php endif; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary" type="submit">保存</button>
							<a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
						</div>
					</div>
				</form>
			</div>
			<?php elseif($type==2): ?>
			<div role="tabpanel" class="tab-pane tab-pane fade in active" id="protocol">
				<form class="form-horizontal form-validate2 pt-15">
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>协议内容</label>
						<div class="col-md-8">
							<div id="UE-protocol" data-content='<?php if($website['content']): ?><?php echo $website['content']; endif; ?>' required></div>
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary" type="submit">保存</button>
							<a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
						</div>
					</div>
				</form>
			</div>
			<?php elseif($type==3): ?>
			<div class="tab-pane tab-pane fade in active" id="message"  >
				<table class="table v-table table-auto-center">
					<thead>
					<tr>
						<th>模版名称</th>
						<th>模版类型</th>
						<th>通知人</th>
						<th>模版状态</th>
						<th>模版</th>
					</tr>
					</thead>
					<tbody id="list">

					</tbody>
				</table>
			</div>
			<?php endif; ?>
		</div>
		<!-- page end -->


<script>
    require(['util','insertContent'],function(util){
        util.validate($('.form-validate1'),function(form){
            var Logo = $("#Logo").find('img').attr('src');
            if(Logo==''){
                util.message('注册分销商海报不能为空','danger');
                return false;
            }
            var distribution_label = $('#distribution_label').is(':checked')?1:2;
            var distribution_name = $('#distribution_name').val();
            if(distribution_name==''){
                distribution_name = '分销中心';
			}
            var distributor_name = $('#distributor_name').val();
            if(distributor_name==''){
                distributor_name= '分销商';
            }
            var distribution_commission = $('#distribution_commission').val();
            if(distribution_commission==''){
                distributor_name= '分销佣金';
            }
            var total_commission = $('#total_commission').val();
            if(total_commission==''){
                total_commission= '累积佣金';
            }
            var commission = $('#commission').val();
            if(commission==''){
                commission= '佣金';
            }
            var commission_details = $('#commission_details').val();
            if(commission_details==''){
                commission_details= '佣金明细';
            }
            var withdrawable_commission = $('#withdrawable_commission').val();
            if(withdrawable_commission==''){
                withdrawable_commission= '可提现佣金';
            }
            var withdrawal = $('#withdrawal').val();
            if(withdrawal==''){
                withdrawal= '提现中';
            }
            var withdrawals_commission = $('#withdrawals_commission').val();
            if(withdrawals_commission==''){
                withdrawals_commission= '已提现佣金';
            }
            var frozen_commission = $('#frozen_commission').val();
            if(frozen_commission==''){
                frozen_commission= '冻结佣金';
            }
            var distribution_order = $('#distribution_order').val();
            if(distribution_order==''){
                distribution_order= '分销订单';
            }
            var my_customer = $('#my_customer').val();
            if(my_customer==''){
                my_customer= '我的客户';
            }
            var my_team = $('#my_team').val();
            if(my_team==''){
                my_team= '我的团队';
            }
            var team1 = $('#team1').val();
            if(team1==''){
                team1= '一级';
            }
            var team2 = $('#team2').val();
            if(team2==''){
                team2= '二级';
            }
            var team3 = $('#team3').val();
            if(team3==''){
                team3= '三级';
            }
            var extension_code = $('#extension_code').val();
            if(extension_code==''){
                extension_code= '推广码';
            }
            var distribution_tips = $('#distribution_tips').val();
            if(distribution_tips==''){
                distribution_tips= '分销小提示：可以通过二维码、邀请链接或者邀请码发展下线客户，下线客户购买商品后你可以获得相应的佣金奖励。';
            }
            var become_distributor = $('#become_distributor').val();
            if(become_distributor==''){
                become_distributor= '成为分销商';
            }
            $.ajax({
                type:"post",
                url:"<?php echo $applicationAgreementUrl; ?>",
                data:{
                    'type':1,
                    'image':Logo,
                    'become_distributor':become_distributor,
                    'distribution_tips':distribution_tips,
                    'extension_code':extension_code,
                    'team3':team3,
                    'team2':team2,
                    'team1':team1,
                    'my_team':my_team,
                    'my_customer':my_customer,
                    'distribution_order':distribution_order,
                    'frozen_commission':frozen_commission,
                    'withdrawals_commission':withdrawals_commission,
                    'withdrawal':withdrawal,
                    'withdrawable_commission':withdrawable_commission,
                    'commission_details':commission_details,
                    'commission':commission,
                    'total_commission':total_commission,
                    'distribution_commission':distribution_commission,
                    'distributor_name':distributor_name,
                    'distribution_name':distribution_name,
                    'distribution_label':distribution_label
                },
                success:function(data){
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=1");
                    } else {
                        util.message(data["message"], 'danger', "<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=1");
                    }
                }
            });
        })
        util.validate($('.form-validate2'),function(form){
            var content = $('#UE-protocol').data('content');
            if(content==''){
                util.message('协议内容不能为空','danger');
                return false;
            }
            $.ajax({
                type:"post",
                url:"<?php echo $applicationAgreementUrl; ?>",
                data:{
                    'content':content,
                },
                success:function(data){
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>");
                    } else {
                        util.message(data["message"], 'danger', "<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>");
                    }
                }
            });
        })
		if(<?php echo $type; ?>==3){
            $.ajax({
                type:"post",
                url:"<?php echo $messagePushListUrl; ?>",
                success:function(data){
                   var html = '';
                    if(data){
                        for(var i = 0; i < data.length; i++){
                            html+='<tr>';
                            html+='<td>'+data[i]['template_title']+'</td>';
							html+='<td>微信客服消息</td>';
							html+='<td>分销商</td>';
                            html+='<td>';
                            html+='<div class="checkbox">';
                            if(data[i]['is_enable']==1){
                                html+='<a href="javascript:void(0);" class="text-success message_is_open">已开启</a><br>';
                            }else{
                                html+='<a href="javascript:void(0);" class="text-danger message_is_open" >已关闭</a><br>';
                            }
                            html+='</td>';
                            html+='<td>';
                            html+='<a href="javascript:void(0);" class="text-primary vertical-top editMsg" data-id="'+data[i]['template_id']+'">编辑模板</a>';
                            html+='</div>';
                            html+='</td>';
                            html+='</tr>';
                        }
                        $('#list').html(html);
					}
                }
            });
		}
        $('body').on('click','.variate-choice-code',function(){
            var code = $(this).data('code');
            var contents = $(this).parents('.variate-choice').siblings('#template_content');
            contents.insertContent(code);
        })
        function replaceMark(str){
            if(str){
                var index = str.indexOf(',');
                if(index>-1){
                    var f = str.substring(0,index);
                    var s = str.substring(index+1,str.length);
                    str = f + '\n' + s;
                    return replaceMark(str);
                }else{
                    return str;
                }
			}else{
                return '';
			}

        }
        //编辑短信模板
        $('body').on('click','.editMsg',function(event){
            var id = $(this).data('id');
            $.ajax({
                type:"post",
                url:"<?php echo $editMessageUrl; ?>",
                data:{
                    'id':id,
                },
                async:true,
                success:function (data) {
                    var name = data['template_title'];
                    strs = replaceMark(data['sample']);
                    var html = '<form class="form-horizontal padding-15" id="">';
                    if(data['is_enable']==1){
                        html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="sms_is_enable" checked ><label for="sms_is_enable" class=""></label></div>';
                    }else{
                        html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="sms_is_enable" ><label for="sms_is_enable" class=""></label></div>';
                    }
                    html += '</div></div>';
                    html += '<div class="form-group">'+
                        '<label class="col-md-3 control-label"><span class="text-bright">*</span>内容</label>'+
                        '<div class="col-md-8">'+
                        '<div class="flex">'+
                        '<textarea  class="form-control bbrr0" rows="8" id="template_content">'+data['template_content']+'</textarea>'+
						'<div class="variate-choice"><p>可选变量</p><div class="variate-choice-item">';
                    for (var i = 0; i < data['sign'].length; i++) {
                        html += '<a class="text-primary block variate-choice-code" href="javascript:void(0);" data-code="'+data['sign'][i]['replace_name']+'">['+data['sign'][i]['item_name']+']</a>';
                    }
                    html += '</div></div></div></div></div>';
                    html += '<div class="form-group">'+
                        '<label class="col-md-3 control-label"><span class="text-bright"></span>示例</label>'+
                        '<div class="col-md-8">'+
                        '<div class="flex">'+
                        '<textarea disabled class="form-control bbrr0" rows="8">' +strs+'</textarea>';
                    html += '</div></div></div></div>';
                    html += '</form>';
                    util.confirm(name+"模版",html,function(){
                        if(this.$content.find('#sms_is_enable').is(':checked')){
                            var is_enable =1;
                        }
                        var template_content = this.$content.find('#template_content').val();
                        if(template_content==''){
                            util.message('请填写模版内容','danger');
                            this.$content.find('#template_content').focus();
                            return false;
                        }
                        $.ajax({
                            type:"post",
                            url:"<?php echo $addMessageUrl; ?>",
                            data:{
                                'is_enable':is_enable,
								'id':id,
                                'template_content':template_content
                            },
                            async:true,
                            success:function (data) {
                                if (data["code"] > 0) {
                                    util.message( data["message"],'success',"<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=3");
                                }else{
                                    util.message( data["message"],'danger');
                                }
                            }
                        });

                    },'large')
                }
            });
        })
    })
</script>
