<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/www/wwwroot/www.tuandr.com/addons/thingcircle/template/platform/thingcircleSetting.html";i:1583811702;}*/ ?>

			<!-- page -->
            <ul class="nav nav-tabs v-nav-tabs add_tab1" role="tablist">
                <li role="presentation" class="active"><a href="#thingcircle_setting" aria-controls="thingcircle_setting" role="tab" data-toggle="tab" class="flex-auto-center">基础设置</a></li>
                <li role="presentation"><a href="#sign_setting" aria-controls="sign_setting" role="tab" data-toggle="tab" class="flex-auto-center">腾讯云密钥</a></li>
                <li role="presentation"><a href="#reward_setting" aria-controls="reward_setting" role="tab" data-toggle="tab" class="flex-auto-center">奖励设置</a></li>
                <li role="presentation"><a href="#share_setting" aria-controls="share_setting" role="tab" data-toggle="tab" class="flex-auto-center">分享设置</a></li>
                
            </ul>
            <form class="form-horizontal pt-15 form-validate widthFixedForm">
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active tab-1" id="thingcircle_setting" >
                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span>好物圈</label>
                            <div class="col-md-5">
                                <div class="switch-inline">
                                    <input type="checkbox" id="is_use" name="is_use" <?php if($info['is_use'] == 1): ?> checked <?php endif; ?>>
                                    <label for="is_use" class=""></label>
                                </div>
                            </div>
                        </div>
                       	<div class="form-group">
                        	<label class="col-md-2 control-label"><span class="text-bright">*</span>选择圈主</label>
	                        <div class="col-md-5">
	                            <p class="form-control-static"><a href="javascript:void(0);" class="btn btn-primary choice_user" >选择会员</a></p>
	                            <p class="help-block">请选择一位商城会员成为平台的圈主，平台发布的干货将关联至该会员，没有会员？<a href="<?php echo __URL('PLATFORM_MAIN/member/addUsers'); ?>" class="text-primary"  target="_blank">点击前往添加</a></p>
	                            <div class="showUser media text-left <?php if((!$info['uid'])): ?>hide<?php endif; ?>">
	                                <div class="media-left"><img id="actar" src="<?php if(($user_info['user_headimg'])): ?><?php echo $user_info['user_headimg']; else: ?>/public/static/images/headimg.png<?php endif; ?>" style="max-width:none;width:60px;height:60px;"></div>
	                                <div class="media-body break-word">
	                                    <div class="line-2-ellipsis nick_name"><?php if(($user_info['user_name'])): ?><?php echo $user_info['user_name']; elseif(($user_info['nick_name'])): ?><?php echo $user_info['nick_name']; endif; ?></div>
	                                    <div class="line-1-ellipsis text-danger mobile"><?php echo $user_info['user_tel']; ?></div>
	                                    <div class="line-1-ellipsis text-danger mobiletxt"></div>
	                                    <div class="line-1-ellipsis text-danger uid " hidden><?php echo $user_info['uid']; ?></div>
	                                    <div class="line-1-ellipsis text-danger pass" hidden><?php echo $user_info['user_password']; ?></div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
		                <div class="form-group hide addiphone">
	                        <label class="col-md-2 control-label"><span class="text-bright">*</span>手机号码</label>
	                        <div class="col-md-5">
	                            <input type="number" class="form-control" id="iphone" name="iphone">
	                        </div>
	                    </div>
	                    <div class="form-group hide addpassword">
	                        <label class="col-md-2 control-label"><span class="text-bright">*</span>密码</label>
	                        <div class="col-md-5">
	                            <input type="number" class="form-control" id="password" name="password"> 
	                        </div>
	                    </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span>展示方式</label>
                            <div class="col-md-8">
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="display_model" value="0" required <?php if($info['display_model'] == 0): ?>checked<?php endif; ?>> 一列信息流
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="display_model" value="1" required <?php if($info['display_model'] == 1): ?>checked<?php endif; ?>> 两列瀑布流
                                    </label>
                                    <div class="mb-0 help-block">前端干货的展示方式，一列信息流展示方式为朋友圈风格，两列瀑布流展示方式为小红书风格。</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span>话题级别</label>
                            <div class="col-md-8">
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="topic_state" value="0" required <?php if($info['topic_state'] == 0): ?>checked<?php endif; ?>> 一级话题
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="topic_state" value="1" required <?php if($info['topic_state'] == 1): ?>checked<?php endif; ?>> 二级话题
                                    </label>
                                    <div class="mb-0 help-block">好物圈正式使用后不建议随便切换。</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span>干货排序</label>
                            <div class="col-md-5">
                                <select id="thing_sort" name="thing_sort" class="form-control" required title="请选择">
                                    <option value="0" <?php if($info['thing_sort'] == 0): ?> selected="selected"<?php endif; ?>>按点赞数降序</option>
                                    <option value="1" <?php if($info['thing_sort'] == 1): ?> selected="selected"<?php endif; ?>>按点赞数升序</option>
                                    <option value="2" <?php if($info['thing_sort'] == 2): ?> selected="selected"<?php endif; ?>>按点发布时间降序</option>
                                    <option value="3" <?php if($info['thing_sort'] == 3): ?> selected="selected"<?php endif; ?>>按点发布时间升序</option>
                                </select>
                                <div class="mb-0 help-block">干货列表将以设置好的方式进行展示</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span>评论排序</label>
                            <div class="col-md-5">
                                <select id="comment_sort" name="comment_sort" class="form-control" required title="请选择">
                                    <option value="0" <?php if($info['comment_sort'] == 0): ?> selected="selected"<?php endif; ?>>按点赞数降序</option>
                                    <option value="1" <?php if($info['comment_sort'] == 1): ?> selected="selected"<?php endif; ?>>按点赞数升序</option>
                                    <option value="2" <?php if($info['comment_sort'] == 2): ?> selected="selected"<?php endif; ?>>按点发布时间降序</option>
                                    <option value="3" <?php if($info['comment_sort'] == 3): ?> selected="selected"<?php endif; ?>>按点发布时间升序</option>
                                </select>
                                <div class="mb-0 help-block">评论列表将以设置好的方式进行展示</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span>推荐商品</label>
                            <div class="col-md-5">
                                <div class="switch-inline">
                                    <input type="checkbox" id="recommend_goods" name="recommend_goods" <?php if($info['recommend_goods'] == 1): ?> checked <?php endif; ?>>
                                    <label for="recommend_goods" class=""></label>
                                    <div class="mb-0 help-block">开启后，会员发布干货时可挑选购买过的商品进行推荐，后端卖家不受影响</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in tab-2" id="reward_setting">
                        <div class="form-group">
                            <div class="col-md-10">
                                <div class="form-table-group" style="width: auto">
                                    <table class="table table-bordered table-auto-center table_rule">
                                        <tr>
                                            <td class="w-300">条件</td>
                                            <td >奖励</td>
                                        </tr>
                                        <tr class="rule_set">
                                            <td><label class="control-label"><input type="checkbox" name="release_thing" value="<?php echo $info['release_thing']; ?>" <?php if($info['release_thing'] == 1): ?> checked="checked" <?php endif; ?>>发布干货</label></td>
                                            <td ><div class="form-additional rule-list">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送积分</label>
                                                    <div class="col-md-7 control-group">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control point" min="0" mustnum="true" name="release_point" id="release_point" value="<?php echo $info['release_point']; ?>">
                                                            <div class="input-group-addon">个</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">增加成长值</label>
                                                    <div class="col-md-7 control-group">
                                                        <input type="number" class="form-control release_growth_num" min="0" name="release_growth_num" id="release_growth_num" value="<?php echo $info['release_growth_num']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送礼品券</label>
                                                    <div class="col-md-7 control-group">
                                                        <select class="form-control release_gift_voucher_id" name="release_gift_voucher_id" id="release_gift_voucher_id" required="" aria-required="true" aria-describedby="release_gift_voucher-error" aria-invalid="false">
                                                            <option value="0">请选择礼品券</option>
                                                            <?php if(is_array($prize['giftvoucher']['list']) || $prize['giftvoucher']['list'] instanceof \think\Collection || $prize['giftvoucher']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prize['giftvoucher']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gi): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $gi['gift_voucher_id']; ?>" <?php if(($info['release_gift_voucher_id']==$gi['gift_voucher_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $gi['giftvoucher_name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select><span id="release_gift_voucher-error" class="help-block-error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送优惠券</label>
                                                    <div class="col-md-7 control-group">
                                                        <select class="form-control release_coupon_type_id" name="release_coupon_type_id" id="release_coupon_type_id" required="" aria-required="true" aria-describedby="release_coupon_type-error" aria-invalid="false">
                                                            <option value="0">请选择优惠券</option>
                                                            <?php if(is_array($prize['coupontype']['list']) || $prize['coupontype']['list'] instanceof \think\Collection || $prize['coupontype']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prize['coupontype']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $co['coupon_type_id']; ?>" <?php if(($info['release_coupon_type_id']==$co['coupon_type_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $co['coupon_name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select><span id="release_coupon_type-error" class="help-block-error"></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" class="rule_id" name="rule_id" value="<?php if(($info['rule_id'])): ?><?php echo $info['rule_id']; else: ?>0<?php endif; ?>" autocomplete="off">
                                                <input type="hidden" class="days" name="sort" value="0" autocomplete="off"></td>
                                        </tr>
                                        <tr class="rule_set">
                                            <td>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"><input type="checkbox" name="release_num" value="<?php echo $info['release_num']; ?>" <?php if($info['release_num'] == 1): ?> checked="checked" <?php endif; ?>>累积发布</label>
                                                    <div class="col-md-7 control-group">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control point" min="0" mustnum="true" name="release_nums" id="release_nums" value="<?php echo $info['release_nums']; ?>">
                                                            <div class="input-group-addon">个干货</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td ><div class="form-additional rule-list">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送积分</label>
                                                    <div class="col-md-7 control-group">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control point" min="0" mustnum="true" name="release_num_point" id="release_num_point" value="<?php echo $info['release_num_point']; ?>" >
                                                            <div class="input-group-addon">个</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">增加成长值</label>
                                                    <div class="col-md-7 control-group">
                                                        <input type="number" class="form-control growth_num" min="0" name="release_num_growth_num" id="release_num_growth_num" value="<?php echo $info['release_num_growth_num']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送礼品券</label>
                                                    <div class="col-md-7 control-group">
                                                        <select class="form-control release_num_gift_voucher_id" name="release_num_gift_voucher_id" id="release_num_gift_voucher_id" required="" aria-required="true" aria-describedby="release_num_gift_voucher-error" aria-invalid="false">
                                                            <option value="0">请选择礼品券</option>
                                                            <?php if(is_array($prize['giftvoucher']['list']) || $prize['giftvoucher']['list'] instanceof \think\Collection || $prize['giftvoucher']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prize['giftvoucher']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gi): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $gi['gift_voucher_id']; ?>" <?php if(($info['release_num_gift_voucher_id']==$gi['gift_voucher_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $gi['giftvoucher_name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select><span id="release_num_gift_voucher-error" class="help-block-error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送优惠券</label>
                                                    <div class="col-md-7 control-group">
                                                        <select class="form-control release_num_coupon_type_id" name="release_num_coupon_type_id" id="release_num_coupon_type_id" required="" aria-required="true" aria-describedby="coupon_type-error" aria-invalid="false">
                                                            <option value="0">请选择优惠券</option>
                                                            <?php if(is_array($prize['coupontype']['list']) || $prize['coupontype']['list'] instanceof \think\Collection || $prize['coupontype']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prize['coupontype']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $co['coupon_type_id']; ?>" <?php if(($info['release_num_coupon_type_id']==$co['coupon_type_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $co['coupon_name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select><span id="coupon_type-error" class="help-block-error"></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" class="rule_id" name="rule_id" value="<?php if(($info['rule_id'])): ?><?php echo $info['rule_id']; else: ?>0<?php endif; ?>" autocomplete="off">
                                                <input type="hidden" class="days" name="sort" value="0" autocomplete="off"></td>
                                        </tr>
                                        <tr class="rule_set">
                                            <td><label class="control-label"><input type="checkbox" name="like_thing" value="<?php echo $info['like_thing']; ?>" <?php if($info['like_thing'] == 1): ?> checked="checked" <?php endif; ?>>点赞干货</label></td>
                                            <td ><div class="form-additional rule-list">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送积分</label>
                                                    <div class="col-md-7 control-group">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control like_point" min="0" mustnum="true" name="like_point" id="like_point" value="<?php echo $info['like_point']; ?>">
                                                            <div class="input-group-addon">个</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">增加成长值</label>
                                                    <div class="col-md-7 control-group">
                                                        <input type="number" class="form-control like_growth_num" min="0" name="like_growth_num" id="like_growth_num" value="<?php echo $info['like_growth_num']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送礼品券</label>
                                                    <div class="col-md-7 control-group">
                                                        <select class="form-control like_gift_voucher_id" name="like_gift_voucher_id" id="like_gift_voucher_id" required="" aria-required="true" aria-describedby="like_gift_voucher-error" aria-invalid="false">
                                                            <option value="0">请选择礼品券</option>
                                                            <?php if(is_array($prize['giftvoucher']['list']) || $prize['giftvoucher']['list'] instanceof \think\Collection || $prize['giftvoucher']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prize['giftvoucher']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gi): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $gi['gift_voucher_id']; ?>" <?php if(($info['like_gift_voucher_id']==$gi['gift_voucher_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $gi['giftvoucher_name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select><span id="like_gift_voucher-error" class="help-block-error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送优惠券</label>
                                                    <div class="col-md-7 control-group">
                                                        <select class="form-control like_coupon_type_id" name="like_coupon_type_id" id="like_coupon_type_id" required="" aria-required="true" aria-describedby="like_coupon_type-error" aria-invalid="false">
                                                            <option value="0">请选择优惠券</option>
                                                            <?php if(is_array($prize['coupontype']['list']) || $prize['coupontype']['list'] instanceof \think\Collection || $prize['coupontype']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prize['coupontype']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $co['coupon_type_id']; ?>" <?php if(($info['like_coupon_type_id']==$co['coupon_type_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $co['coupon_name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select><span id="like_coupon_type-error" class="help-block-error"></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" class="rule_id" name="rule_id" value="<?php if(($info['rule_id'])): ?><?php echo $info['rule_id']; else: ?>0<?php endif; ?>" autocomplete="off">
                                                <input type="hidden" class="days" name="sort" value="0" autocomplete="off"></td>
                                        </tr>
                                        <tr class="rule_set">
                                            <td><label class="control-label"><input type="checkbox" name="relay_thing" value="<?php echo $info['relay_thing']; ?>" <?php if($info['relay_thing'] == 1): ?> checked="checked" <?php endif; ?>>转发干货</label></td>
                                            <td ><div class="form-additional rule-list">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送积分</label>
                                                    <div class="col-md-7 control-group">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control relay_point" min="0" mustnum="true" name="relay_point" id="relay_point" value="<?php echo $info['relay_point']; ?>">
                                                            <div class="input-group-addon">个</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">增加成长值</label>
                                                    <div class="col-md-7 control-group">
                                                        <input type="number" class="form-control relay_growth_num" min="0" name="relay_growth_num" id="relay_growth_num" value="<?php echo $info['relay_growth_num']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送礼品券</label>
                                                    <div class="col-md-7 control-group">
                                                        <select class="form-control relay_gift_voucher_id" name="relay_gift_voucher_id" id="relay_gift_voucher_id" required="" aria-required="true" aria-describedby="relay_gift_voucher-error" aria-invalid="false">
                                                            <option value="0">请选择礼品券</option>
                                                            <?php if(is_array($prize['giftvoucher']['list']) || $prize['giftvoucher']['list'] instanceof \think\Collection || $prize['giftvoucher']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prize['giftvoucher']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gi): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $gi['gift_voucher_id']; ?>" <?php if(($info['relay_gift_voucher_id']==$gi['gift_voucher_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $gi['giftvoucher_name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select><span id="relay_gift_voucher-error" class="help-block-error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送优惠券</label>
                                                    <div class="col-md-7 control-group">
                                                        <select class="form-control relay_coupon_type_id" name="relay_coupon_type_id" id="relay_coupon_type_id" required="" aria-required="true" aria-describedby="relay_coupon_type-error" aria-invalid="false">
                                                            <option value="0">请选择优惠券</option>
                                                            <?php if(is_array($prize['coupontype']['list']) || $prize['coupontype']['list'] instanceof \think\Collection || $prize['coupontype']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prize['coupontype']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $co['coupon_type_id']; ?>" <?php if(($info['relay_coupon_type_id']==$co['coupon_type_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $co['coupon_name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select><span id="relay_coupon_type-error" class="help-block-error"></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" class="rule_id" name="rule_id" value="<?php if(($info['rule_id'])): ?><?php echo $info['rule_id']; else: ?>0<?php endif; ?>" autocomplete="off">
                                                <input type="hidden" class="days" name="sort" value="0" autocomplete="off"></td>
                                        </tr>
                                        <tr class="rule_set">
                                            <td>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"><input type="checkbox" name="thing_likes" value="<?php echo $info['thing_likes']; ?>" <?php if($info['thing_likes'] == 1): ?> checked="checked" <?php endif; ?>>干货达到</label>
                                                    <div class="col-md-7 control-group">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control point" min="0" mustnum="true" name="thing_likes_num" id="thing_likes_num" value="<?php echo $info['thing_likes_num']; ?>">
                                                            <div class="input-group-addon">个赞</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td ><div class="form-additional rule-list">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送积分</label>
                                                    <div class="col-md-7 control-group">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control thing_likes_point" min="0" mustnum="true" name="thing_likes_point" id="thing_likes_point" value="<?php echo $info['thing_likes_point']; ?>">
                                                            <div class="input-group-addon">个</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">增加成长值</label>
                                                    <div class="col-md-7 control-group">
                                                        <input type="number" class="form-control thing_likes_growth_num" min="0" name="thing_likes_growth_num" id="thing_likes_growth_num" value="<?php echo $info['thing_likes_growth_num']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送礼品券</label>
                                                    <div class="col-md-7 control-group">
                                                        <select class="form-control thing_likes_gift_voucher_id" name="thing_likes_gift_voucher_id" id="gthing_likes_ift_voucher_id" required="" aria-required="true" aria-describedby="thing_likes_gift_voucher-error" aria-invalid="false">
                                                            <option value="0">请选择礼品券</option>
                                                            <?php if(is_array($prize['giftvoucher']['list']) || $prize['giftvoucher']['list'] instanceof \think\Collection || $prize['giftvoucher']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prize['giftvoucher']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gi): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $gi['gift_voucher_id']; ?>" <?php if(($info['thing_likes_gift_voucher_id']==$gi['gift_voucher_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $gi['giftvoucher_name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select><span id="thing_likes_gift_voucher-error" class="help-block-error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">送优惠券</label>
                                                    <div class="col-md-7 control-group">
                                                        <select class="form-control thing_likes_coupon_type_id" name="thing_likes_coupon_type_id" id="thing_likes_coupon_type_id" required="" aria-required="true" aria-describedby="thing_likes_coupon_type-error" aria-invalid="false">
                                                            <option value="0">请选择优惠券</option>
                                                            <?php if(is_array($prize['coupontype']['list']) || $prize['coupontype']['list'] instanceof \think\Collection || $prize['coupontype']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prize['coupontype']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $co['coupon_type_id']; ?>" <?php if(($info['thing_likes_coupon_type_id']==$co['coupon_type_id'])): ?>selected = "selected"<?php endif; ?>><?php echo $co['coupon_name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select><span id="thing_likes_coupon_type-error" class="help-block-error"></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" class="rule_id" name="rule_id" value="<?php if(($info['rule_id'])): ?><?php echo $info['rule_id']; else: ?>0<?php endif; ?>" autocomplete="off">
                                                <input type="hidden" class="days" name="sort" value="0" autocomplete="off"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in tab-3" id="share_setting">
                        <div class="form-group">
                            <div>
                                <label class="col-md-2 control-label">干货详情分享标题</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php if($info['thing_title']): ?><?php echo $info['thing_title']; endif; ?>" id="thing_title" placeholder="" name="thing_title">
                                    <p class="help-block mb-0">可用变量，文章标题：${title},默认分享标题为干货标题。</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label class="col-md-2 control-label">干货详情分享描述</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php if($info['thing_describe']): ?><?php echo $info['thing_describe']; endif; ?>" id="thing_describe" placeholder="" name="thing_describe">
                                    <p class="help-block mb-0">微信链接分享卡片描述内容</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">干货详情分享图片</label>
                            <div class="col-md-5">
                                <div class="picture-list" id="thing_pic"></div>
                                <p class="help-block mb-0">建议尺寸750*312像素，每张不大于1MB，支持JPG\GIF\PNG格式</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label class="col-md-2 control-label">其他页面分享标题</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php if($info['other_title']): ?><?php echo $info['other_title']; endif; ?>" id="other_title" placeholder="" name="other_title">
                                    <p class="help-block mb-0">微信链接分享卡片标题名称</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label class="col-md-2 control-label">其他页面分享描述</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php if($info['other_describe']): ?><?php echo $info['other_describe']; endif; ?>" id="other_describe" placeholder="" name="other_describe">
                                    <p class="help-block mb-0">微信链接分享卡片描述内容</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">其他页面分享图片</label>
                            <div class="col-md-5">
                                <div class="picture-list" id="other_pic"></div>
                                <p class="help-block mb-0">建议尺寸750*312像素，每张不大于1MB，支持JPG\GIF\PNG格式</p>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in tab-4" id="sign_setting">
                        <div class="form-group">
                            <div>
                                <label class="col-md-2 control-label">SecretId</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php if($info['secret_id']): ?><?php echo $info['secret_id']; endif; ?>" id="secret_id" placeholder="" name="secret_id">
                                    <p class="help-block mb-0"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label class="col-md-2 control-label">SecretKey</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php if($info['secret_key']): ?><?php echo $info['secret_key']; endif; ?>" id="secret_key" placeholder="" name="secret_key">
                                    <p class="help-block mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-8">
                            <button class="btn btn-primary add" type="submit">保存</button>
                            <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                        </div>
                    </div>
                </div>
            </form>
			<!-- page end -->


<script>
    require(['util'],function(util){
        loading();
        function loading(){
            var thing_pic = "<?php echo $info['thing_pic']; ?>";
            var other_pic = "<?php echo $info['other_pic']; ?>";
            if (thing_pic) {
                $('#thing_pic').html('<a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="' + thing_pic + '"></a>');
            } else {
                $('#thing_pic').html('<a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>');
            }
            if (other_pic) {
                $('#other_pic').html('<a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="' + other_pic + '"></a>');
            } else {
                $('#other_pic').html('<a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>');
            }
        }
        util.validate($('.form-validate'), function (form) {
            //var circle_state = $("input[name='circle_state']:checked").val();
            var is_use = $("input[name='is_use']").is(':checked')? 1 : 0;
            var display_model = $("input[name='display_model']:checked").val();
            var topic_state = $("input[name='topic_state']:checked").val();
            var thing_sort = $("#thing_sort").val();
            var comment_sort = $("#comment_sort").val();
            //var recommend_goods = $("input[name='recommend_goods']:checked").val();
            var recommend_goods = $("input[name='recommend_goods']").is(':checked')? 1 : 0;

            var release_thing = $("input[name='release_thing']").is(':checked')? 1 : 0;
            var release_point = $("input[name='release_point']").val();
            var release_growth_num = $("input[name='release_growth_num']").val();
            var release_gift_voucher_id = $("#release_gift_voucher_id").val();
            var release_coupon_type_id = $("#release_coupon_type_id").val();

            var release_num = $("input[name='release_num']").is(':checked')? 1 : 0;
            var release_nums = $("input[name='release_nums']").val();
            var release_num_point = $("input[name='release_num_point']").val();
            var release_num_growth_num = $("input[name='release_num_growth_num']").val();
            var release_num_gift_voucher_id = $("#release_num_gift_voucher_id").val();
            var release_num_coupon_type_id = $("#release_num_coupon_type_id").val();

            var like_thing = $("input[name='like_thing']").is(':checked')? 1 : 0;
            var like_point = $("input[name='like_point']").val();
            var like_growth_num = $("input[name='like_growth_num']").val();
            var like_gift_voucher_id = $("#like_gift_voucher_id").val();
            var like_coupon_type_id = $("#like_coupon_type_id").val();

            var relay_thing = $("input[name='relay_thing']").is(':checked')? 1 : 0;
            var relay_point = $("input[name='relay_point']").val();
            var relay_growth_num = $("input[name='relay_growth_num']").val();
            var relay_gift_voucher_id = $("#relay_gift_voucher_id").val();
            var relay_coupon_type_id = $("#relay_coupon_type_id").val();

            var thing_likes = $("input[name='thing_likes']").is(':checked')? 1 : 0;
            var thing_likes_num = $("input[name='thing_likes_num']").val();
            var thing_likes_point = $("input[name='thing_likes_point']").val();
            var thing_likes_growth_num = $("input[name='thing_likes_growth_num']").val();
            var thing_likes_gift_voucher_id = $("#thing_likes_gift_voucher_id").val();
            var thing_likes_coupon_type_id = $("#thing_likes_coupon_type_id").val();

            var thing_title = $("input[name='thing_title']").val();
            var thing_describe = $("input[name='thing_describe']").val();
            var thing_pic = $("#thing_pic").find('img').attr('src');
            var other_title = $("input[name='other_title']").val();
            var other_describe = $("input[name='other_describe']").val();
            var other_pic = $("#other_pic").find('img').attr('src');

            var mobile = $(".mobile").html();
            var pass = $(".pass").html();
            var uid = $(".uid").html();
            if(uid == ''){
                util.message('请选择会员','info');
                return false;
            }
            var user_account = $("#iphone").val();
            if(mobile == ''){
                var myreg = /^[1][3,4,5,7,8][0-9]{9}$/;
                if (!myreg.test(user_account)) {
                    util.message('请输入正确的手机号码','info');
                    return false;
                }
            }
            var user_pwd = $("#password").val();
            if(pass == ''){
                var patrn=/^(\w){6,20}$/; 
                if (!patrn.exec(user_pwd)){
                    util.message('密码只能由6-20个字母、数字、下划线组成','info');
                    return false;
                }
            }
            var secret_id = $("input[name='secret_id']").val();
            var secret_key = $("input[name='secret_key']").val();
            $.ajax({
                type:"post",
                url:"<?php echo $thingcircleSettingUrl; ?>",
                data:{
                    'secret_id':secret_id,
                    'secret_key':secret_key,
                    'is_use':is_use,
                    'display_model':display_model,
                    'topic_state':topic_state,
                    'thing_sort':thing_sort,
                    'comment_sort':comment_sort,
                    'recommend_goods':recommend_goods,
                    //---------------------------------
                    'release_thing': release_thing,
                    'release_point':release_point,
                    'release_growth_num':release_growth_num,
                    'release_gift_voucher_id':release_gift_voucher_id,
                    'release_coupon_type_id':release_coupon_type_id ,

                    'release_num': release_num,
                    'release_nums':release_nums,
                    'release_num_point':release_num_point,
                    'release_num_growth_num':release_num_growth_num,
                    'release_num_gift_voucher_id':release_num_gift_voucher_id ,
                    'release_num_coupon_type_id': release_num_coupon_type_id,
                    'like_thing':like_thing,
                    'like_point':like_point,
                    'like_growth_num':like_growth_num,
                    'like_gift_voucher_id':like_gift_voucher_id ,
                    'like_coupon_type_id': like_coupon_type_id,
                    'relay_thing':relay_thing,
                    'relay_point':relay_point,
                    'relay_growth_num':relay_growth_num,
                    'relay_gift_voucher_id':relay_gift_voucher_id ,
                    'relay_coupon_type_id': relay_coupon_type_id,
                    'thing_likes':thing_likes,
                    'thing_likes_num':thing_likes_num,
                    'thing_likes_point':thing_likes_point,
                    'thing_likes_growth_num':thing_likes_growth_num ,
                    'thing_likes_gift_voucher_id': thing_likes_gift_voucher_id,
                    'thing_likes_coupon_type_id':thing_likes_coupon_type_id,
                    //------------------------------
                    'thing_title':thing_title,
                    'thing_describe':thing_describe,
                    'thing_pic':thing_pic,
                    'other_title':other_title,
                    'other_describe':other_describe,
                    'other_pic':other_pic,
                    'uid':uid,
                    'user_tel':user_account,
                    'user_password':user_pwd,
                },
                async:true,
                success:function (data) {
                    if (data['code']>0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINbaseSetting'); ?>");
                    }else{
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
        $('body').on('click', '[data-toggle="selectUrl"]', function () {
            var _this = $(this);
            // var curlId = _this.data('input');
            var elm = _this.data('id');
            util.linksDialogPc(function (data) {
                $('#' + elm).val(data.params).change();
            });
        });
        // 选择会员
        $('body').on('click','.choice_user',function(){
            var url= __URL(PLATFORMMAIN + '/system/updateReferee2');
            util.confirm('选择会员','url:'+url,function(){
                var uid = this.$content.find('#referee_id').val();
                var urls = __URL(PLATFORMMAIN + '/member/getUser');
                if(uid){
                    $.ajax({
                        type : "post",
                        url : urls,
                        data : {
                            'uid':uid,
                        },
                        success : function(data) {
                            if(data.data.user.user_headimg){
                                $('#actar').attr("src",data.data.user.user_headimg);
                            }else{
                            	$('#actar').attr("src","/public/static/images/headimg.png");
                            }
                            if(data.data.user.user_name){
                                $('.nick_name').html(data.data.user.user_name);
                            }else if(data.data.user.nick_name){
                                $('.nick_name').html(data.data.user.nick_name);
                            }else{
                            	$('.nick_name').html("");
                            }
                            
                            $('.uid').html(data.data.user.uid);
                            if(data.data.user.user_tel && data.data.user.user_password){
                                $('.mobile').html(data.data.user.user_tel);
                                $('.pass').html(data.data.user.user_password);
                                $('.mobiletxt').html("");
                                
                                $('.addiphone').addClass('hide');
                                $("#iphone").removeAttr('required');
                                $('.addpassword').addClass('hide');
                                $("#password").removeAttr('required');
                            }else if(!data.data.user.user_tel && !data.data.user.user_password){
                                $('.mobiletxt').html("该会员未关联手机号码与密码，请补充信息");
                                $('.mobile').html("");
                                $('.pass').html("");
                                
                                $('.addiphone').removeClass('hide');
                                $("#iphone").attr('required', 'required');
                                $('.addpassword').removeClass('hide');
                                $("#password").attr('required', 'required');
                            }else if(!data.data.user.user_tel && data.data.user.user_password){
                                $('.mobiletxt').html("该会员未关联手机号码，请补充信息");
                                $('.mobile').html("");
                                $('.pass').html(data.data.user.user_password);
                                
                                $('.addiphone').removeClass('hide');
                                $("#iphone").attr('required', 'required');
                                $('.addpassword').addClass('hide');
                                $("#password").removeAttr('required');
                            }else if(data.data.user.user_tel && !data.data.user.user_password){
                                $('.mobiletxt').html("该会员未添加密码，请补充信息");
                                $('.mobile').html(data.data.user.user_tel);
                                $('.pass').html("");
                                
                                $('.addiphone').addClass('hide');
                                $("#iphone").removeAttr('required');
                                $('.addpassword').removeClass('hide');
                                $("#password").attr('required', 'required');
                            }
                            $('.showUser').removeClass('hide');
                        }
                    });
                }
            },'large')
        });
    })
</script>
