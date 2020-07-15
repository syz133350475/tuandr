<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"/www/wwwroot/www.tuandr.com/addons/distribution/template/platform/updateDistributorLevel.html";i:1583811698;}*/ ?>


		<!-- page -->
		<form class="form-horizontal form-validate pt-15 widthFixedForm">
			<div class="form-group">
				<label class="col-md-2 control-label"><span class="text-bright">*</span>等级名称</label>
				<div class="col-md-5">
					<input type="text" class="form-control" name="level_name" value="<?php if($list['level_name']): ?><?php echo $list['level_name']; endif; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">返佣类型</label>
				<div class="col-md-5">
					<div>
						<label class="radio-inline">
							<input type="radio" class="recommendtype" value="1"  <?php if($list['recommend_type']==1): ?>checked<?php endif; ?> name="recommendtype"> 按比例返佣
						</label>
						<label class="radio-inline">
							<input type="radio" class="recommendtype" value="2" <?php if($list['recommend_type']==2): ?>checked<?php endif; ?> name="recommendtype"> 按固定返佣
						</label>
					</div>
				</div>
			</div>
			<div class="return_commission1"  <?php if($list['recommend_type']!=1): ?>style="display: none"<?php endif; ?>>
				<?php if($website['distribution_pattern']>=1): ?>
				<div class="form-group">
					<label class="col-md-2 control-label">一级返佣</label>
					<div class="col-md-5">
						<div class="input-group">
							<input type="number" class="form-control" min="0" max=100 name="commission1" value="<?php if($list['commission1']): ?><?php echo $list['commission1']; endif; ?>">
							<div class="input-group-addon">%佣金</div>
							<input type="number" class="form-control" min="0" max=100 name="commission_point1" value="<?php if($list['commission_point1']): ?><?php echo $list['commission_point1']; endif; ?>">
							<div class="input-group-addon">%积分</div>
						</div>
					</div>
				</div>
				<?php endif; if($website['distribution_pattern']>=2): ?>
				<div class="form-group">
					<label class="col-md-2 control-label">二级返佣</label>
					<div class="col-md-5">
						<div class="input-group">
							<input type="number" class="form-control" min="0" max=100 name="commission2" value="<?php if($list['commission2']): ?><?php echo $list['commission2']; endif; ?>">
							<div class="input-group-addon">%佣金</div>
							<input type="number" class="form-control" min="0" max=100 name="commission_point2" value="<?php if($list['commission_point2']): ?><?php echo $list['commission_point2']; endif; ?>">
							<div class="input-group-addon">%积分</div>
						</div>
					</div>
				</div>
				<?php endif; if($website['distribution_pattern']>=3): ?>
				<div class="form-group">
					<label class="col-md-2 control-label">三级返佣</label>
					<div class="col-md-5">
						<div class="input-group">
							<input type="number" class="form-control" min="0" max=100 name="commission3" value="<?php if($list['commission3']): ?><?php echo $list['commission3']; endif; ?>">
							<div class="input-group-addon">%佣金</div>
							<input type="number" class="form-control" min="0" max=100 name="commission_point3" value="<?php if($list['commission_point3']): ?><?php echo $list['commission_point3']; endif; ?>">
							<div class="input-group-addon">%积分</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="return_commission2"  <?php if($list['recommend_type']!=2): ?>style="display: none"<?php endif; ?>>
				<?php if($website['distribution_pattern']>=1): ?>
				<div class="form-group">
					<label class="col-md-2 control-label">一级返佣</label>
					<div class="col-md-5">
						<div class="input-group">
							<input type="number" class="form-control" min="0" name="commission11" value="<?php if($list['commission11']): ?><?php echo $list['commission11']; endif; ?>">
							<div class="input-group-addon">元佣金</div>
							<input type="number" class="form-control" min="0" name="commission_point11" value="<?php if($list['commission_point11']): ?><?php echo $list['commission_point11']; endif; ?>">
							<div class="input-group-addon">积分</div>
						</div>
					</div>
				</div>
				<?php endif; if($website['distribution_pattern']>=2): ?>
				<div class="form-group">
					<label class="col-md-2 control-label">二级返佣</label>
					<div class="col-md-5">
						<div class="input-group">
							<input type="number" class="form-control" min="0" name="commission22" value="<?php if($list['commission22']): ?><?php echo $list['commission22']; endif; ?>">
							<div class="input-group-addon">元佣金</div>
							<input type="number" class="form-control" min="0" name="commission_point22" value="<?php if($list['commission_point22']): ?><?php echo $list['commission_point22']; endif; ?>">
							<div class="input-group-addon">积分</div>
						</div>
					</div>
				</div>
				<?php endif; if($website['distribution_pattern']>=3): ?>
				<div class="form-group">
					<label class="col-md-2 control-label">三级返佣</label>
					<div class="col-md-5">
						<div class="input-group">
							<input type="number" class="form-control" min="0" name="commission33" value="<?php if($list['commission33']): ?><?php echo $list['commission33']; endif; ?>">
							<div class="input-group-addon">元佣金</div>
							<input type="number" class="form-control" min="0" name="commission_point33" value="<?php if($list['commission_point33']): ?><?php echo $list['commission_point33']; endif; ?>">
							<div class="input-group-addon">积分</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"></label>
				<div class="col-md-5">
					<div class="mb-0 help-block">分销商下线购买商品后获得的分销返佣</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">复购返佣</label>
				<div class="col-md-5">
					<div class="switch-inline">
						<input type="checkbox" id="buyagain-switch" value="1" name="buyagain" <?php if($list['buyagain'] == 1): ?>checked<?php endif; ?>>
						<label for="buyagain-switch"></label>
					</div>
					<div class="mb-0 help-block">开启后分销商下线再次购买商城商品时则按照复购返佣规则计算佣金</div>
				</div>
			</div>
			<div class="buyagain_commission" <?php if($list['buyagain'] != 1): ?>style="display: none"<?php endif; ?>>
				<div class="form-group">
					<label class="col-md-2 control-label">返佣类型</label>
					<div class="col-md-5">
						<div>
							<label class="radio-inline">
								<input type="radio" class="recommendtype" value="1" <?php if($list['buyagain_recommendtype']==1): ?>checked<?php endif; ?> name="buyagain_recommendtype"> 按比例返佣
							</label>
							<label class="radio-inline">
								<input type="radio" class="recommendtype" value="2" <?php if($list['buyagain_recommendtype']==2): ?>checked<?php endif; ?> name="buyagain_recommendtype"> 按固定返佣
							</label>
						</div>
					</div>
				</div>
				<div class="buyagain_return_commission1" <?php if($list['buyagain_recommendtype']!=1): ?>style="display: none"<?php endif; ?>>
					<?php if($website['distribution_pattern']>=1): ?>
					<div class="form-group">
						<label class="col-md-2 control-label">一级返佣</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="number" class="form-control" min="0" max=100 name="buyagain_commission1" value="<?php if($list['buyagain_commission1']): ?><?php echo $list['buyagain_commission1']; endif; ?>">
								<div class="input-group-addon">%佣金</div>
								<input type="number" class="form-control" min="0" max=100 name="buyagain_commission_point1" value="<?php if($list['buyagain_commission_point1']): ?><?php echo $list['buyagain_commission_point1']; endif; ?>">
								<div class="input-group-addon">%积分</div>
							</div>
						</div>
					</div>
					<?php endif; if($website['distribution_pattern']>=2): ?>
					<div class="form-group">
						<label class="col-md-2 control-label">二级返佣</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="number" class="form-control" min="0" max=100 name="buyagain_commission2" value="<?php if($list['buyagain_commission2']): ?><?php echo $list['buyagain_commission2']; endif; ?>">
								<div class="input-group-addon">%佣金</div>
								<input type="number" class="form-control" min="0" max=100 name="buyagain_commission_point2" value="<?php if($list['buyagain_commission_point2']): ?><?php echo $list['buyagain_commission_point2']; endif; ?>">
								<div class="input-group-addon">%积分</div>
							</div>
						</div>
					</div>
					<?php endif; if($website['distribution_pattern']>=3): ?>
					<div class="form-group">
						<label class="col-md-2 control-label">三级返佣</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="number" class="form-control" min="0" max=100 name="buyagain_commission3" value="<?php if($list['buyagain_commission3']): ?><?php echo $list['buyagain_commission3']; endif; ?>">
								<div class="input-group-addon">%佣金</div>
								<input type="number" class="form-control" min="0" max=100 name="buyagain_commission_point3" value="<?php if($list['buyagain_commission_point3']): ?><?php echo $list['buyagain_commission_point3']; endif; ?>">
								<div class="input-group-addon">%积分</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<div class="buyagain_return_commission2"  <?php if($list['buyagain_recommendtype']!=2): ?>style="display: none"<?php endif; ?>>
					<?php if($website['distribution_pattern']>=1): ?>
					<div class="form-group">
						<label class="col-md-2 control-label">一级返佣</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="number" class="form-control" min="0" name="buyagain_commission11" value="<?php if($list['buyagain_commission11']): ?><?php echo $list['buyagain_commission11']; endif; ?>">
								<div class="input-group-addon">元佣金</div>
								<input type="number" class="form-control" min="0" name="buyagain_commission_point11" value="<?php if($list['buyagain_commission_point11']): ?><?php echo $list['buyagain_commission_point11']; endif; ?>">
								<div class="input-group-addon">积分</div>
							</div>
						</div>
					</div>
					<?php endif; if($website['distribution_pattern']>=2): ?>
					<div class="form-group">
						<label class="col-md-2 control-label">二级返佣</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="number" class="form-control" min="0" name="buyagain_commission22" value="<?php if($list['buyagain_commission22']): ?><?php echo $list['buyagain_commission22']; endif; ?>">
								<div class="input-group-addon">元佣金</div>
								<input type="number" class="form-control" min="0" name="buyagain_commission_point22" value="<?php if($list['buyagain_commission_point22']): ?><?php echo $list['buyagain_commission_point22']; endif; ?>">
								<div class="input-group-addon">积分</div>
							</div>
						</div>
					</div>
					<?php endif; if($website['distribution_pattern']>=3): ?>
					<div class="form-group">
						<label class="col-md-2 control-label">三级返佣</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="number" class="form-control" min="0" name="buyagain_commission33" value="<?php if($list['buyagain_commission33']): ?><?php echo $list['buyagain_commission33']; endif; ?>">
								<div class="input-group-addon">元佣金</div>
								<input type="number" class="form-control" min="0" name="buyagain_commission_point33" value="<?php if($list['buyagain_commission_point33']): ?><?php echo $list['buyagain_commission_point33']; endif; ?>">
								<div class="input-group-addon">积分</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php if($website['distribution_pattern']>=1): ?>
			<div class="form-group">
				<label class="col-md-2 control-label">一级推荐奖</label>
				<div class="col-md-5">
					<div class="input-group">
						<input type="number" class="form-control" min="0" name="recommend1" value="<?php if($list['recommend1']): ?><?php echo $list['recommend1']; endif; ?>">
						<div class="input-group-addon">元佣金</div>
						<input type="number" class="form-control" min="0" name="recommend_point1" value="<?php if($list['recommend_point1']): ?><?php echo $list['recommend_point1']; endif; ?>">
						<div class="input-group-addon">积分</div>
					</div>
				</div>
			</div>
			<?php endif; if($website['distribution_pattern']>=2): ?>
			<div class="form-group">
				<label class="col-md-2 control-label">二级推荐奖</label>
				<div class="col-md-5">
					<div class="input-group">
						<input type="number" class="form-control" min="0" name="recommend2" value="<?php if($list['recommend2']): ?><?php echo $list['recommend2']; endif; ?>">
						<div class="input-group-addon">元佣金</div>
						<input type="number" class="form-control" min="0" name="recommend_point2" value="<?php if($list['recommend_point2']): ?><?php echo $list['recommend_point2']; endif; ?>">
						<div class="input-group-addon">积分</div>
					</div>
				</div>
			</div>
			<?php endif; if($website['distribution_pattern']>=3): ?>
			<div class="form-group">
				<label class="col-md-2 control-label">三级推荐奖</label>
				<div class="col-md-5">
					<div class="input-group">
						<input type="number" class="form-control" min="0" name="recommend3" value="<?php if($list['recommend3']): ?><?php echo $list['recommend3']; endif; ?>">
						<div class="input-group-addon">元佣金</div>
						<input type="number" class="form-control" min="0" name="recommend_point3" value="<?php if($list['recommend_point3']): ?><?php echo $list['recommend_point3']; endif; ?>">
						<div class="input-group-addon">积分</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="form-group">
				<label class="col-md-2 control-label"></label>
				<div class="col-md-5">
					<div class="mb-0 help-block">分销商升级后，上级可获得推荐奖。0或空则不发放。</div>
				</div>
			</div>
			<?php if($list['is_default']!=1): ?>
			<div class="form-group">
				<label class="col-md-2 control-label">自动升级</label>
				<div class="col-md-5">
					<div class="switch-inline">
						<input type="checkbox" id="upgrade-switch" value="1" name="upgradetype" <?php if($list['upgradetype'] == 1): ?>checked<?php endif; ?>>
						<label for="upgrade-switch"></label>
					</div>
					<div class="mb-0 help-block">开启后满足一定条件自动升级，关闭后则该等级不会自动升级。</div>
				</div>
			</div>
			<div id="isupgrade" class="<?php if($list['upgradetype'] != 1): ?>hide<?php endif; ?>">
				<div class="form-group">
					<label class="col-md-2 control-label">升级条件</label>
					<div class="col-md-5">
						<div>
						<label class="radio-inline">
							<input type="radio" value="1" name="upgradecondition" <?php if($list['upgrade_condition'] == 1): ?>checked<?php endif; ?>> 满足所有勾选条件
						</label>
						<label class="radio-inline">
							<input type="radio" value="2" name="upgradecondition" <?php if($list['upgrade_condition'] == 2): ?>checked<?php endif; ?>> 满足勾选条件之一即可
						</label>
						</div>
					</div>
				</div>
				<div class="form-group" id="upgrade-condition">
					<label class="col-md-2 control-label"></label>
					<div class="col-md-8">
						<div class="form-additional" style="width: auto">
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="7"> 一级分销商达</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="number1" value="<?php if($list['number1']): ?><?php echo $list['number1']; endif; ?>">
										<div class="input-group-addon">人</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="8"> 二级分销商达</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="number2" value="<?php if($list['number2']): ?><?php echo $list['number2']; endif; ?>">
										<div class="input-group-addon">人</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="9"> 三级分销商达</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="number3" value="<?php if($list['number3']): ?><?php echo $list['number3']; endif; ?>">
										<div class="input-group-addon">人</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="10"> 团队人数达</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="number4" value="<?php if($list['number4']): ?><?php echo $list['number4']; endif; ?>">
										<div class="input-group-addon">人(分销商)</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="11"> 下线客户数达</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="number5" value="<?php if($list['number5']): ?><?php echo $list['number5']; endif; ?>">
										<div class="input-group-addon">人(非分销商)</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="1"> 下线总人数达</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="offline_number" value="<?php if($list['offline_number']): ?><?php echo $list['offline_number']; endif; ?>">
										<div class="input-group-addon">人(分销商+非分销商)</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="12"> 指定推荐等级</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<select class="form-control upgrade_level" style="min-width: 130px" name="upgrade_level">
											<?php foreach($level_info as $v): ?>
											<option value="<?php echo $v['id']; ?>" <?php if($list['upgrade_level']==$v['id']): ?>selected<?php endif; ?>><?php echo $v['level_name']; ?></option>
											<?php endforeach; ?>
										</select>
										<div class="input-group-addon">达</div>
										<input type="number" class="form-control" min="0" name="level_number" value="<?php if($list['level_number']): ?><?php echo $list['level_number']; endif; ?>">
										<div class="input-group-addon">人</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="2"> 分销订单金额达</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="order_money" value="<?php if($list['order_money']): ?><?php echo $list['order_money']; endif; ?>">
										<div class="input-group-addon">元</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="3"> 分销订单达</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="order_number" value="<?php if($list['order_number']): ?><?php echo $list['order_number']; endif; ?>">
										<div class="input-group-addon">单</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="4"> 内购订单金额达</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="selforder_money" value="<?php if($list['selforder_money']): ?><?php echo $list['selforder_money']; endif; ?>">
										<div class="input-group-addon">元</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="5"> 内购订单达</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="selforder_number" value="<?php if($list['selforder_number']): ?><?php echo $list['selforder_number']; endif; ?>">
										<div class="input-group-addon">单</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="upgradeconditions" value="6"> 购买指定商品</label>
								<div class="col-md-7 control-group">
									<div class="picture-list">
										<a href="javascript:;" class="<?php if($list['pic']): ?>close-box1<?php else: ?>plus-box search_goods<?php endif; ?>">
											<?php if($list['pic']): ?>
											<i class='icon icon-danger' title='删除'></i><img src="<?php echo __IMG($list['pic']); ?>" style='width:80px;height:80px;margin:0;'>
											<?php else: ?>
											<i class="icon icon-plus"></i>
											<?php endif; ?>
										</a>
										<input type="text" class="visibility" data-visi-type="singlePicture" name="picture-Logo">
									</div>
									<input type="hidden" name='pic_id' id="pic_id" value="">
									<input type="hidden" name='selectgoods_id' id="selectgoods_id" value="<?php echo $list['goods_id']; ?>">
									<div class="input-group selectid">
										<?php if(($list['goods_id'])): ?>指定商品：<?php echo $list['goods_name']; endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">自动降级</label>
				<div class="col-md-5">
					<div class="switch-inline">
						<input type="checkbox" id="downgrade-switch" value="1" name="downgradetype" <?php if($list['downgradetype'] == 1): ?>checked<?php endif; ?>>
						<label for="downgrade-switch"></label>
					</div>
					<div class="mb-0 help-block">开启后不满足指定条件自动降级，关闭后则该等级不会自动降级。</div>
				</div>
			</div>
			<div id="isdowngrade" class="<?php if($list['downgradetype'] != 1): ?>hide<?php endif; ?>">
				<div class="form-group">
					<label class="col-md-2 control-label">降级条件</label>
					<div class="col-md-5">
						<div>
						<label class="radio-inline">
							<input type="radio"  value="1" name="downgradecondition" <?php if($list['downgrade_condition'] == 1): ?>checked<?php endif; ?>> 满足所有勾选条件
						</label>
						<label class="radio-inline">
							<input type="radio"  value="2" name="downgradecondition" <?php if($list['downgrade_condition'] == 2): ?>checked<?php endif; ?>> 满足勾选条件之一即可
						</label>
						</div>
					</div>
				</div>
				<div class="form-group" id="downgrade-condition">
					<label class="col-md-2 control-label"></label>
					<div class="col-md-8">
						<div class="form-additional" style="width: auto">
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="downgradeconditions" value="1"> 团队订单量</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="team_number_day" value="<?php if($list['team_number_day']): ?><?php echo $list['team_number_day']; endif; ?>">
										<div class="input-group-addon">天内，少于</div>
										<input type="number" class="form-control" min="0" name="team_number" value="<?php if($list['team_number']): ?><?php echo $list['team_number']; endif; ?>" >
										<div class="input-group-addon">单</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="downgradeconditions" value="2"> 团队订单金额</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="team_money_day" value="<?php if($list['team_money_day']): ?><?php echo $list['team_money_day']; endif; ?>">
										<div class="input-group-addon">天内，少于</div>
										<input type="number" class="form-control" min="0" name="team_money" value="<?php if($list['team_number']): ?><?php echo $list['team_money']; endif; ?>">
										<div class="input-group-addon">元</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><input type="checkbox" name="downgradeconditions" value="3"> 内购订单金额</label>
								<div class="col-md-7 control-group">
									<div class="input-group">
										<input type="number" class="form-control" min="0" name="self_money_day" value="<?php if($list['self_money_day']): ?><?php echo $list['self_money_day']; endif; ?>">
										<div class="input-group-addon">天内，少于</div>
										<input type="number" class="form-control" min="0" name="self_money" value="<?php if($list['self_money']): ?><?php echo $list['self_money']; endif; ?>">
										<div class="input-group-addon">元</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="hidden" id="weight"  value="<?php echo $list['weight']; ?>">
				<label class="col-md-2 control-label"><span class="text-bright">*</span>权重</label>
				<div class="col-md-5">
					<input type="number" class="form-control" name="weight" value="<?php if($list['weight']): ?><?php echo $list['weight']; endif; ?>" required>
					<div class="mb-0 help-block">等级权重，数字不能重复，数字越大等级越高。按设置的权重大小从低到高进行升级。</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="form-group"></div>
			<div class="form-group">
				<label class="col-md-2 control-label"></label>
				<div class="col-md-8">
					<button class="btn btn-primary update" type="submit" >修改</button>
					<a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
				</div>
			</div>
		</form>


<input type="hidden" id="level_id" value="<?php echo $list['id']; ?>">
		<input type="hidden" value="<?php echo $level_weight; ?>" id="level_weight" name="level_weight">
		<!-- page end -->


<script>
    require(['util'],function(util) {
		// 复购返佣设置 buyagain
		$("#buyagain-switch").change(function () {
            var buyagain = $("input[name='buyagain']:checked").val();
			if(buyagain == 1){
				$('.buyagain_commission').show();
			}else{
				$('.buyagain_commission').hide();
			}
        })
		$("input[name='buyagain_recommendtype']").click(function () {
            if($(this).is(':checked') && $("input[name='buyagain_recommendtype']:checked").val()==1){
                $(".buyagain_return_commission1").show();
                $(".buyagain_return_commission2").hide();
            }else if($(this).is(':checked') && $("input[name='buyagain_recommendtype']:checked").val()==2){
                $(".buyagain_return_commission2").show();
                $(".buyagain_return_commission1").hide();
            }
        })
        $("input[name='recommendtype']").click(function () {
            if($(this).is(':checked') && $("input[name='recommendtype']:checked").val()==1){
                $(".return_commission1").show();
                $(".return_commission2").hide();
            }else if($(this).is(':checked') && $("input[name='recommendtype']:checked").val()==2){
                $(".return_commission2").show();
                $(".return_commission1").hide();
            }
        })
         loading();
         function loading() {
            var upgradeconditions = "<?php echo $list['upgradeconditions']; ?>";
            upgradeconditions = upgradeconditions.split(',');
            for (var i = 0; i < upgradeconditions.length; i++) {
                $('[name="upgradeconditions"][value="' + upgradeconditions[i] + '"]').prop("checked", true);
                if(upgradeconditions[i]!="6"){
                    $('[name="upgradeconditions"][value="' + upgradeconditions[i] + '"]').parent(".control-label").siblings(".control-group").find("input").attr("required",true);
				}
            }
            var downgradeconditions = "<?php echo $list['downgradeconditions']; ?>";
            downgradeconditions = downgradeconditions.split(',');
            for (var i = 0; i < downgradeconditions.length; i++) {
                $('[name="downgradeconditions"][value="' + downgradeconditions[i] + '"]').prop("checked", true);
                $('[name="downgradeconditions"][value="' + downgradeconditions[i] + '"]').parent(".control-label").siblings(".control-group").find("input").attr("required",true);
            }
        }
        $("#upgrade-switch").change(function () {
            var upgradetype = $("input[name='upgradetype']:checked").val();
            if(upgradetype==1){
                $("input[name='upgradecondition']").attr("required",true);
				$("#isupgrade").removeClass("hide");
            }else{
                $("input[name='upgradecondition']").removeAttr("required",true);
				$("#isupgrade").addClass("hide");
            }
        })
        $("#downgrade-switch").change(function () {
            var downgradetype = $("input[name='downgradetype']:checked").val();
            if(downgradetype==1){
                $("input[name='downgradecondition']").attr("required",true);
				$("#isdowngrade").removeClass("hide");
            }else{
                $("input[name='downgradecondition']").removeAttr("required",true);
				$("#isdowngrade").addClass("hide");
            }
        })
        $("input[name='downgradeconditions']").click(function () {
            if($(this).is(':checked')){
                var vals=$(this).val();
                if(vals!=6 || $("input[name='selectgoods_id']").val()==''){
                    $(this).parent(".control-label").siblings(".control-group").find("input").attr("required",true);
                }
            } else{
                $(this).parents(".form-group").removeClass('has-error');
                $(this).parents(".form-group").find('.help-block-error').html('');
                $(this).parent(".control-label").siblings(".control-group").find("input").removeAttr("required",true);
            }
        })
        $("input[name='weight']").on('blur',function () {
            var weight = $("input[name='weight']").val();
            var arr = $("#level_weight").val();
            arr = arr.split(',');
            var default_weight = $("#weight").val();
            for(var i = 0; i < arr.length; i++){
                if(weight === arr[i] && default_weight != arr[i]){
                    util.message('该等级权重值已存在','danger');
                    $("input[name='weight']").val('');
                    return false;
                }
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
			//复购返佣设置
			var buyagain = $("input[name='buyagain']:checked").val();
			var buyagain_recommendtype = $("input[name='buyagain_recommendtype']:checked").val();
			var buyagain_commission_point1 = $("input[name='buyagain_commission_point1']").val();
            var buyagain_commission_point2 = $("input[name='buyagain_commission_point2']").val();
            var buyagain_commission_point3 = $("input[name='buyagain_commission_point3']").val();
            var buyagain_commission_point11 = $("input[name='buyagain_commission_point11']").val();
            var buyagain_commission_point22 = $("input[name='buyagain_commission_point22']").val();
            var buyagain_commission_point33 = $("input[name='buyagain_commission_point33']").val();

			var buyagain_commission1 = $("input[name='buyagain_commission1']").val();
            var buyagain_commission2 = $("input[name='buyagain_commission2']").val();
            var buyagain_commission3 = $("input[name='buyagain_commission3']").val();
            var buyagain_commission11 = $("input[name='buyagain_commission11']").val();
            var buyagain_commission22 = $("input[name='buyagain_commission22']").val();
            var buyagain_commission33 = $("input[name='buyagain_commission33']").val();
			//end
            var level_name = $("input[name='level_name']").val();
            var commission1 = $("input[name='commission1']").val();
            var commission2 = $("input[name='commission2']").val();
            var commission3 = $("input[name='commission3']").val();
            var commission11 = $("input[name='commission11']").val();
            var commission22 = $("input[name='commission22']").val();
            var commission33 = $("input[name='commission33']").val();
            var recommendtype = $("input[name='recommendtype']:checked").val();
            var upgrade_level = $(".upgrade_level").val();
            var level_number = $("input[name='level_number']").val();
            var commission_point1 = $("input[name='commission_point1']").val();
            var commission_point2 = $("input[name='commission_point2']").val();
            var commission_point3 = $("input[name='commission_point3']").val();
            var commission_point11 = $("input[name='commission_point11']").val();
            var commission_point22 = $("input[name='commission_point22']").val();
            var commission_point33 = $("input[name='commission_point33']").val();
            var recommend1 = $("input[name='recommend1']").val();
            var recommend2 = $("input[name='recommend2']").val();
            var recommend3 = $("input[name='recommend3']").val();
            var recommend_point1 = $("input[name='recommend_point1']").val();
            var recommend_point2 = $("input[name='recommend_point2']").val();
            var recommend_point3 = $("input[name='recommend_point3']").val();
            var upgradetype = $("input[name='upgradetype']:checked").val();
            var offline_number = $("input[name='offline_number']").val();
            var number3 = $("input[name='number3']").val();
            var number1 = $("input[name='number1']").val();
            var number2 = $("input[name='number2']").val();
            var number4 = $("input[name='number4']").val();
            var number5 = $("input[name='number5']").val();
            var order_money = $("input[name='order_money']").val();
            var order_number = $("input[name='order_number']").val();
            var selforder_money = $("input[name='selforder_money']").val();
            var selforder_number = $("input[name='selforder_number']").val();
            var downgradetype = $("input[name='downgradetype']:checked").val();
            var team_number = $("input[name='team_number']").val();
            var team_money = $("input[name='team_money']").val();
            var self_money = $("input[name='self_money']").val();
            var team_number_day = $("input[name='team_number_day']").val();
            var team_money_day = $("input[name='team_money_day']").val();
            var self_money_day = $("input[name='self_money_day']").val();
            var upgrade_condition = $("input[name='upgradecondition']:checked").val();
            var downgrade_condition = $("input[name='downgradecondition']:checked").val();
            var weight = $("input[name='weight']").val();
            var upgradeconditions = $("input:checkbox[name='upgradeconditions']:checked").map(function (index, elem) {
                return $(elem).val();
            }).get().join(',');
            var arr = upgradeconditions.split(',');
            if(isInArray(arr,"6")){
                var goods_id = $("input[name='selectgoods_id']").val();
            }else{
                var goods_id ='';
            }
            var downgradeconditions = $("input:checkbox[name='downgradeconditions']:checked").map(function (index, elem) {
                return $(elem).val();
            }).get().join(',');
            if(upgradetype==1 && upgradeconditions==''){
                util.message('请填写升级条件');
                return false;
            }
            if(downgradetype==1 && downgradeconditions==''){
                util.message('请填写降级条件');
                return false;
            }
            $('.update').attr({disabled: "disabled"}).html('提交中...');
            $.ajax({
                type: "post",
                url: "<?php echo $updateDistributorLevelUrl; ?>",
                data: {
					'buyagain': buyagain,
					'buyagain_recommendtype': buyagain_recommendtype,
					'buyagain_commission_point1': buyagain_commission_point1,
					'buyagain_commission_point2': buyagain_commission_point2,
					'buyagain_commission_point3': buyagain_commission_point3,
					'buyagain_commission_point11': buyagain_commission_point11,
					'buyagain_commission_point22': buyagain_commission_point22,
					'buyagain_commission_point33': buyagain_commission_point33,

					'buyagain_commission1': buyagain_commission1,
					'buyagain_commission2': buyagain_commission2,
					'buyagain_commission3': buyagain_commission3,
					'buyagain_commission11': buyagain_commission11,
					'buyagain_commission22': buyagain_commission22,
					'buyagain_commission33': buyagain_commission33,
                    'id':$("#level_id").val(),
                    'recommend_type': recommendtype,
                    'upgrade_level': upgrade_level,
                    'level_number': level_number,
                    'number1': number1,
                    'number2': number2,
                    'number3': number3,
                    'number4': number4,
                    'number5': number5,
                    'commission_point1': commission_point1,
                    'commission_point2': commission_point2,
                    'commission_point3': commission_point3,
                    'commission_point11': commission_point11,
                    'commission_point22': commission_point22,
                    'commission_point33': commission_point33,
                    'recommend1': recommend1,
                    'recommend2': recommend2,
                    'recommend3': recommend3,
                    'recommend_point1': recommend_point1,
                    'recommend_point2': recommend_point2,
                    'recommend_point3': recommend_point3,
                    'level_name': level_name,
                    'commission1': commission1,
                    'commission2': commission2,
                    'commission3': commission3,
                    'commission11': commission11,
                    'commission22': commission22,
                    'commission33': commission33,
                    'upgradetype': upgradetype,
                    'offline_number': offline_number,
                    'order_money': order_money,
                    'order_number': order_number,
                    'selforder_money': selforder_money,
                    'selforder_number': selforder_number,
                    'downgradetype': downgradetype,
                    'team_number': team_number,
                    'team_money': team_money,
                    'self_money': self_money,
                    'team_number_day': team_number_day,
                    'team_money_day': team_money_day,
                    'self_money_day': self_money_day,
                    'weight': weight,
                    'downgradeconditions': downgradeconditions,
                    'upgradeconditions': upgradeconditions,
                    'downgrade_condition': downgrade_condition,
                    'upgrade_condition': upgrade_condition,
                    'goods_id': goods_id
                },
                async: true,
                success: function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINdistributorLevelList'); ?>");
                    } else {
                        util.message(data["message"], 'danger');
                        $('.update').removeAttr('disabled').html('修改');
                    }
                }
            });

        })
        $('body').on('click','.search_goods', function () {
            var url = "<?php echo __URL('PLATFORM_MAIN/goods/selectGoodsList'); ?>";
            util.confirm('选择商品','url:'+url, function () {
                var data = this.$content.find('.goods_val').val();
                var pic = $('#pic_id').val();
                $(".selectid").html('指定商品：'+data);
                html='';
                html += "<i class='icon icon-danger' title='删除'></i><img src="+__IMG(pic)+" style='width:80px;height:80px;margin:0;'>";
                $(".search_goods").find('.visibility').removeAttr("required");
                $(".search_goods").addClass('close-box1').removeClass('plus-box').removeClass('search_goods');
                $(".close-box1").html(html);
                $(".close-box1").siblings('.visibility').removeAttr("required");
            },'large')

        })
    })
</script>

