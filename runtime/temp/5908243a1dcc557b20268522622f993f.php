<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/www/wwwroot/www.tuandr.com/addons/miniprogram/template/platform/miniProgramSetting.html";i:1587970152;}*/ ?>

<ul class="nav nav-tabs v-nav-tabs add_tab1" role="tablist">
    <li role="presentation" class="active">
        <a href="#base_info" aria-controls="base_info" role="tab" data-toggle="tab" class="flex-auto-center"
           aria-expanded="false">基本信息</a>
    </li>
    <li role="presentation">
        <a href="#pay_info" aria-controls="pay_info" role="tab" data-toggle="tab" class="flex-auto-center"
           aria-expanded="false">支付信息</a>
    </li>
    <li role="presentation">
        <a href="#tem_info" aria-controls="tem_info" role="tab" data-toggle="tab" class="flex-auto-center"
           aria-expanded="false">订阅消息</a>
    </li>
</ul>
<div class="tab-content pt-15">
    <div class="tab-pane fade tab-1 active in" id="base_info">
        <form class="form-horizontal form-validate-1 widthFixedForm">
            <div class="form-heading">基本信息</div>
            <div class="form-group">
                <label class="col-md-2 control-label">小程序名称</label>
                <div class="col-md-5">
                    <p class="form-control-static">
                        <span><?php echo $base_info['nick_name']; ?></span><a href="<?php echo $auth_url; ?>" class="text-primary pl-15">重新授权</a>
                        <a href="javascript:void(0);" class="text-primary pl-15" id="refresh_base">刷新基本信息</a>
                        <a href="javascript:void(0);" class="text-primary pl-15" id="refresh_domain">刷新服务器域名</a>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">小程序头像</label>
                <div class="col-md-5">
                    <img src="<?php echo $base_info['head_img']; ?>" width="60" height="60">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">微信认证</label>
                <div class="col-md-5">
                    <?php switch($base_info['real_name_status']): case "0": ?><p class="form-control-static">已认证</p><?php break; ?>
<!--                    <?php case "1": ?><p class="form-control-static">未认证</p><?php break; ?>-->
<!--                    <?php case "3": ?><p class="form-control-static">实名验证失败</p><?php break; ?>-->
                    <?php default: ?><p class="form-control-static">未认证</p>
                    <?php endswitch; ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">服务类目</label>
                <div class="col-md-8">
                    <select name="" class="form-control" id="category">
                        <?php if(is_array($base_info['category_array']) || $base_info['category_array'] instanceof \think\Collection || $base_info['category_array'] instanceof \think\Paginator): $i = 0; $__LIST__ = $base_info['category_array'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option class="form-control-static" value="<?php echo $vo['second_id']; ?>" name="<?php echo $vo['second_id']; ?>">
                            <?php echo $vo['first_class']; ?> -> <?php echo $vo['second_class']; ?>
                        </option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <div class="mb-0 help-block">小程序将以当前选中类目发布，如果找不到想要的服务类目，请先到微信公众平台 “基本设置”中添加服务类目，再回到此页面。</div>
                </div>
<!--                todo... 调用接口刷新返回-->
<!--                <div class="col-md-2" style="width: 100px;margin-top: 8px;"><a href="javascript:void(0);" class="text-primary" id="refresh">刷新类目</a></div>-->
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">小程序码</label>
                <div class="col-md-5">
                    <img src="<?php echo __IMG($sunCodeUrl); ?>" width="100" height="100">
                    <a href="<?php echo $downSunCodeUrl; ?>?auth_id=<?php echo $mp_info['auth_id']; ?>" class="text-primary pl-15">下载太阳码</a>
                    
                </div>
            </div>

            <div class="form-heading">开发者信息</div>
            <div class="form-group">
                <label class="col-md-2 control-label">AppID</label>
                <div class="col-md-5">
                    <p class="form-control-static"><?php echo $base_info['authorizer_appid']; ?></p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>AppSecret</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="app_secret" name="app_secret" placeholder="请务必填写！" value="<?php echo $base_info['authorizer_secret']; ?>">
                 </div>
            </div>

            <div class="form-heading">运营情况</div>
            <div class="form-group">
                <label class="col-md-2 control-label">小程序商城</label>
                <div class="col-md-5">
                    <div class="switch-inline">
                        <input type="checkbox" name="is_mini_program" id="is_mini_program" <?php if($base_info['is_use']==1): ?>checked<?php endif; ?>>
                        <label for="is_mini_program" class=""></label>
                    </div>
                </div>
            </div>
            <div class="form-group <?php if($base_info['is_use']==1): ?>hide<?php endif; ?>" id="shop_close_reason">
                <label class="col-md-2 control-label">商城关闭原因</label>
                <div class="col-md-5">
                    <textarea class="form-control"  rows="4" id="close_reason" name="close_reason" ></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary save" type="submit" name="save">保存</button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane fade tab-2" id="pay_info">
        <p class="small-muted form-control-static">需要使用微信支付的小程序（如电商类）必须配置微信支付，其他小程序可不配置。
            填写的微信支付商户号和小程序账号，必须是同一个主体、同一家公司</p>
        <form class="form-horizontal pt-15 form-validate-2 widthFixedForm">
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="standard" >
                    <table class="table v-table table-auto-center">
                        <thead>
                        <tr>
                            <th>支付方式</th>
                            <th>状态</th>
                            <th class="col-md-2 pr-14 operationLeft">操作</th>
                        </tr>
                        </thead>
                        <tbody id="pay_list">

                        </tbody>
                    </table>
                </div>
                <div class="form-group"></div>
                <div class="form-group">
                    <label class="col-md-2 control-label"></label>
                </div>
            </div>

        </form>
    </div>
    <div class="tab-pane fade tab-3" id="tem_info">
        <ul class="nav nav-tabs v-nav-tabs" role="tablist">
            <?php if(is_array($template_list) || $template_list instanceof \think\Collection || $template_list instanceof \think\Paginator): $i = 0; $__LIST__ = $template_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li role="presentation" class="<?php if($i == 1): ?>active<?php endif; ?>">
                <a href="#<?php echo $vo['html_id']; ?>" aria-controls="<?php echo $vo['html_id']; ?>" data-type="<?php echo $vo['html_id']; ?>" role="tab"
                   data-toggle="tab" class="flex-auto-center"><?php echo $vo['template_name']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="tab-content pt-15" id="template-list">
            <?php if(is_array($template_list) || $template_list instanceof \think\Collection || $template_list instanceof \think\Paginator): $j = 0; $__LIST__ = $template_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($j % 2 );++$j;?>
            <div role="tabpanel" class="tab-pane fade in <?php if($j == 1): ?>active<?php endif; ?> template_id" id="<?php echo $vo['html_id']; ?>"  data-template-id="<?php echo $vo['template_id']; ?>">
                <div class="tNews-container flex flex-pack-center" style="width: 1322px;">
                    <div class="tNews-view">
                        <div class="tNews-title">微商来商城</div>
                        <div class="view-main">
                            <div class="tNews-notice">
                                <?php if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?>
                                <h4 class="tNews-notice-title"><?php echo $no['notice_title']; ?></h4>
                                <div class="tNews-notice-content fs-12">
                                    <p class="text-primary line-1-ellipsis pb-4"><?php echo $no['message']; ?></p>
                                    <br/>
                                    <?php if(is_array($no['detail']) || $no['detail'] instanceof \think\Collection || $no['detail'] instanceof \think\Paginator): $i = 0; $__LIST__ = $no['detail'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$de): $mod = ($i % 2 );++$i;?>
                                    <p class="line-1-ellipsis pb-4"><?php echo $de; ?></p>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                    <p class="text-primary"><?php echo $no['foot']; ?></p>
                                    <p class="text-primary"><?php echo $no['foot2']; ?></p>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="tNews-detail">详情 <span class="pull-right" style="padding-top: 2px"><i
                                        class="icon icon-right-arrow"></i></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-editor1 fs-12" style="width: 1000px;">
                        <div class="editor1-main" style="margin-top: 0px;">
                            <div class="editor1-arrow"></div>
                            <div class="editor1-inner">
                                <div class="form-editor1-title">使用场景：<?php echo $vo['editor_title']; ?></div>
                                <div class="form-group">
                                    <div class="col-sm-2 control-label">模版标题</div>
                                    <div class="col-sm-10 mt-6"><?php echo $vo['template_title']; ?></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 control-label"><span class="text-bright">*</span>模版ID</div>
                                    <div class="col-sm-10">
                                        <input class="form-control input-sm diy-bind"
                                               id="mp_template_id_<?php echo $vo['template_id']; ?>"
                                               <?php if($relation_list[$vo['template_id']]): ?> value="<?php echo $relation_list[$vo['template_id']]['mp_template_id']; ?>" <?php endif; ?>>
                                    </div>
                                </div>
                                <?php if($relation_list[$vo['template_id']]): if(is_array($relation_list[$vo['template_id']]["key"]) || $relation_list[$vo['template_id']]["key"] instanceof \think\Collection || $relation_list[$vo['template_id']]["key"] instanceof \think\Paginator): if( count($relation_list[$vo['template_id']]["key"])==0 ) : echo "" ;else: foreach($relation_list[$vo['template_id']]["key"] as $k=>$key): if($vo['template_id'] == 1): endif; ?>
                                    <div class="form-group" id="key_<?php echo $vo['template_id']; ?>_<?php echo $key['key_id']; ?>" data-key-id="<?php echo $key['key_id']; ?>" data-key-is-default="<?php echo $key['is_default']; ?>" data-template-id="<?php echo $vo['template_id']; ?>">
                                        <div class="col-sm-2 control-label">自定义键</div>
                                        <div class="col-xs-2">
                                            <input type="text" name="key_name" data-id="key_<?php echo $key['key_id']; ?>"  class="form-control"   value="<?php echo $key['name']; ?>" placeholder="请输入键名" required>
                                        </div>
                                        <div class="col-md-3"  style="padding-left: 0px">
                                            <input type="text"  name="key_value" class="form-control" value="<?php echo $key['value']; ?>" required placeholder="请输入键值变量名">
                                        </div>
                                        <div class="col-md-5" style="padding-left: 0px">
                                            <div class="input-group item">
                                                <input type="text" class="form-control"  name="key_content"  value="<?php echo $key['content']; ?>" data-ids="<?php echo $key['ids']; ?>" >
                                                <span class="input-group-btn"><a href="javascript:void(0);" class="btn btn-info link_set keyWord" >商城变量</a></span>
                                            </div>
                                        </div>
                                        <?php if(!$key['is_default']): ?>
                                        <div class="col-xs-1 control-label" style="padding-left: 0px;width: 30px;"><a href="javascript:void(0);" class="text-danger delete-area">删除</a></div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                <div class="form-group" data-id="<?php echo $vo['template_id']; ?>">
                                    <div class="col-sm-2 control-label"></div>
                                    <div class="col-sm-10 mt-6"><a href="javascript:void(0);" class="btn btn-primary add-key" data-template-id="<?php echo $vo['template_id']; ?>" >添加自定义键</a></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 control-label">状态</div>
                                    <div class="col-sm-10">
                                        <div class="switch-inline">
                                            <input type="checkbox" id="switch_<?php echo $vo['template_id']; ?>" name="state_<?php echo $vo['template_id']; ?>"
                                                   data-template-id="<?php echo $vo['template_id']; ?>"
                                                   class="J-switch"
                                                   <?php if($relation_list[$vo['template_id']]['status'] == 1): ?>checked<?php endif; ?>>
                                            <label for="switch_<?php echo $vo['template_id']; ?>" class=""></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" data-id="<?php echo $vo['template_id']; ?>">
                                <div class="col-sm-2 control-label"></div>
                                <div class="col-sm-10 mt-6 cen"><button class="btn btn-primary template_add col-sm-2" type="submit" data-template-id="<?php echo $vo['template_id']; ?>">保存</button></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
<input type="hidden" id="app_wx_appid" value="<?php echo $wx['appid']; ?>">
<input type="hidden" id="app_wx_mch_key" value="<?php echo $wx['mch_key']; ?>">
<input type="hidden" id="app_wx_mch_id" value="<?php echo $wx['mch_id']; ?>">
<input type="hidden" id="app_mir_mch_id" value="<?php echo $base_info['authorizer_appid']; ?>">


<script>
    var template_detail = <?php echo json_encode($relation_list); ?>;

    require(['util'], function (util) {
        $('body').on('click', '#wxpay_is_use', function () {
            if($(this).is(':checked')){
                var wx_mch_id = $("#app_wx_mch_id").val();
                if(wx_mch_id){
                    util.alert('检测到商城已配置商户号为：'+wx_mch_id+'的微信支付信息，如小程序微信支付商户号与其一致，可直接同步配置信息。', function () {
                        $("#APP_KEY").val($("#app_wx_appid").val());
                        $("#MCH_KEY").val($("#app_wx_mch_key").val());
                        $("#MCHID").val($("#app_wx_mch_id").val());
                    })
                }
            }
        });
		$('body').on('click', '#gppay_is_use', function () {
            if($(this).is(':checked')){
                var wx_mch_id = $("#app_mir_mch_id").val();
                if(wx_mch_id){
                    util.alert('是否使用商城小程序配置的Appid', function () {
                        $("#APPID").val($("#app_mir_mch_id").val());
                    })
                }
            }
        });
        $('body').on('click','.J-key',function(){
            var letters = 'abcdefghijklmnopqrstuvwxyz0123456789';
            var token = '';
            for(var i = 0; i < 32; i++) {
                var j = parseInt(Math.random() * (31 + 1));
                token += letters[j];
            }
            $('#MCH_KEY').val(token);
        })
		//GlobePay支付
        $('body').on('click','.gPay_set',function(){
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="gppay_is_use" ><label for="gppay_is_use" class=""></label><p class="p small-muted">没有GlobePay账号？<a class="text-primary" href="https://pay.globepay.co.jp" target="_blank">点击前往开通</a></p></div></div></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>Appid</label><div class="col-md-8"><input type="text" class="form-control" id="APPID" value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>Partnercode</label><div class="col-md-8"><input type="text" class="form-control" id="PARTNER_CODE" value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>Credentialcode</label><div class="col-md-8"><input type="text" class="form-control" id="CREDENTIAL_CODE" value=""></div></div>';
			html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>币种</label><div class="col-md-8" style="line-height:32px"><input type="radio" id="CURRENCY" value="JPY" checked name="CURRENCY" style="margin:0 0 5px 0"> JPY<input type="radio" id="CURRENCY" value="CNY" name="CURRENCY" style="margin:0 0 5px 15px"> CNY</div></div>';
            html += '</form>';
            loading();
            util.confirm('GlobePay配置',html,function(){
                if(this.$content.find('#gppay_is_use').is(':checked')){
                    var is_use =1;
                }
                var APPID = $("#APPID").val();
                var PARTNER_CODE = $("#PARTNER_CODE").val();
                var CREDENTIAL_CODE = $("#CREDENTIAL_CODE").val();
				var CURRENCY = $("input[name='CURRENCY']:checked").val();
                if(is_use){
                    if(APPID==''){
                        util.message('请填写小程序Appid');
                        this.$content.find('#APPID').focus();
                        return false;
                    }
                    if(PARTNER_CODE==''){
                        util.message('请填写GlobePay[PARTNER_CODE]');
                        this.$content.find('#PARTNER_CODE').focus();
                        return false;
                    }
                    if(CREDENTIAL_CODE==''){
                        util.message('请填写GlobePay[CREDENTIAL_CODE]');
                        this.$content.find('#CREDENTIAL_CODE').focus();
                        return false;
                    }
                }
                $.ajax({
                    type:"post",
                    url:"<?php echo $payGpConfigMirUrl; ?>",
                    data:{
                        'appid':APPID,
                        'partner_code':PARTNER_CODE,
                        'credential_code':CREDENTIAL_CODE,
						'currency':CURRENCY,
                        'is_use' : is_use
                    },
                    async:true,
                    success:function (data) {
                        if (data["code"] > 0) {
                            util.message( data["message"],'success',loading());
                        }else{
                            util.message( data["message"],'danger');
                        }
                    }
                });
            })
        });
        //微信支付
        $('body').on('click','.wPay_set',function(){
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="wxpay_is_use" ><label for="wxpay_is_use" class=""></label><p class="p small-muted">没有微信支付接口？<a class="text-primary" href="https://pay.weixin.qq.com/index.php/core/home/login?return_url=%2Findex.php%2Fcore%2Faccount" target="_blank">点击前往开通</a></p></div></div></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>AppID</label><div class="col-md-8"><input type="text" class="form-control" id="APP_KEY" value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>MCHID</label><div class="col-md-8"><input type="text" class="form-control" id="MCHID" value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>API秘钥</label><div class="col-md-8"><div class="input-group"><input id="MCH_KEY" value=""  class="form-control" type="text"><span class="input-group-btn"><a class="btn btn-primary J-key" href="javascript:void(0);">生成秘钥</a></span></div><p class="help-block">如已有密钥，可直接粘贴至此输入框，如没有，可生成密钥然后填写至微信商户平台</p></div></div>';
            html += '</form>';
            loading();
            util.confirm('微信支付配置',html,function(){
                if(this.$content.find('#wxpay_is_use').is(':checked')){
                    var is_use =1;
                }
                var appkey = $("#APP_KEY").val();
                var MCHID = $("#MCHID").val();
                var MCH_KEY = $("#MCH_KEY").val();
                if(is_use){
                    if(appkey==''){
                        util.message('请填写应用ID[AppID]');
                        this.$content.find('#appkey').focus();
                        return false;
                    }
                    if(MCHID==''){
                        util.message('请填写微信支付商户号[MCHID]');
                        this.$content.find('#MCHID').focus();
                        return false;
                    }
                    if(MCH_KEY==''){
                        util.message('请填写微信支付Api秘钥');
                        this.$content.find('#MCH_KEY').focus();
                        return false;
                    }
                }
                $.ajax({
                    type:"post",
                    url:"<?php echo $payWxConfigMirUrl; ?>",
                    data:{
                        'appkey':appkey,
                        'MCHID':MCHID,
                        'MCH_KEY':MCH_KEY,
                        'is_use' : is_use
                    },
                    async:true,
                    success:function (data) {
                        if (data["code"] > 0) {
                            util.message( data["message"],'success',loading());
                        }else{
                            util.message( data["message"],'danger');
                        }
                    }
                });
            })
        });
        //余额支付配置
        $('body').on('click','.bPay_set',function(){
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"> <div class="switch-inline"><input type="checkbox" id="bpay_is_use" ><label for="bpay_is_use" class=""></label></div></div></div>';
            html += '</form>';
            loading('payment');
            util.confirm('余额支付配置',html,function(){
                if(this.$content.find('#bpay_is_use').is(':checked')){
                    var is_use =1;

                }
                $.ajax({
                    type:"post",
                    url:"<?php echo $payBConfigMirUrl; ?>",//$payBConfigUrl
                    data:{
                        'is_use' : is_use
                    },
                    async:true,
                    success:function (data) {
                        if (data["code"] > 0) {
                            util.message( data["message"],'success',loading('payment'));
                        }else{
                            util.message( data["message"],'danger');
                        }
                    }
                });

            })
        })
        //货到付款支付配置
        $('body').on('click','.dPay_set',function(){
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"> <div class="switch-inline"><input type="checkbox" id="dpay_is_use" ><label for="dpay_is_use" class=""></label></div></div></div>';
            html += '</form>';
            loading('payment');
            util.confirm('货到付款支付配置',html,function(){
                if(this.$content.find('#dpay_is_use').is(':checked')){
                    var is_use =1;
                }
                $.ajax({
                    type:"post",
                    url:"<?php echo $payDConfigMirUrl; ?>",//$payDConfigUrl
                    data:{
                        'is_use' : is_use
                    },
                    async:true,
                    success:function (data) {
                        if (data["code"] > 0) {
                            util.message( data["message"],'success',loading('payment'));
                        }else{
                            util.message( data["message"],'danger');
                        }
                    }
                });

            })
        })
        //根据点击列表值修改支付方式是否启用
        $('#pay_list').on('click', '.payment_is_open', function(){
            var is_use = $(this).data('is_use');
            var id = $(this).data('id');
            $.ajax({
                type:"post",
                url:"<?php echo __URL('PLATFORM_MAIN/config/updateConfigIsuse'); ?>",
                data:{
                    'id' : id, 'is_use' : is_use
                },
                async:true,
                success:function (data) {
                    if (data["code"] > 0) {
                        util.message( data["message"],'success',loading('payment'));
                    }else{
                        util.message( data["message"],'danger');
                    }
                }
            })
        })
        // 开关小程序商城
       $("#is_mini_program").on("change",function(){
           if($(this).is(':checked')) {
               $(this).attr('checked', false);
               // console.log("<?php echo __URL('PLATFORM_MAIN/system/getAccountType'); ?>");return;
               //判断是否设置账号体系
               $.ajax({
                   'url':"<?php echo __URL('PLATFORM_MAIN/system/getAccountType'); ?>",
                   'type':'post',
                   'data':{},
                   success:function(data){
                       if(data.account_type === 0){
                           util.alert('商城还没有设置会员账号体系，请先设置好账号体系再开启商城。', function () {
                               window.open("<?php echo __URL('PLATFORM_MAIN/system/accountSystem'); ?>");
                               util.alert('是否已设置完成？', function(){
                                   $.ajax({
                                       'url':"<?php echo __URL('PLATFORM_MAIN/system/getAccountType'); ?>",
                                       'type':'post',
                                       'data':{},
                                       success:function(data){
                                           if(data.account_type === 0){
                                               $('#is_mini_program').attr('checked', false);
                                           }else{
                                               $('#is_mini_program').attr('checked', true);
                                               $("#shop_close_reason").addClass("hide");
                                           }
                                       }
                                   })
                               })
                           })
                       }else{
                           $('#is_mini_program').attr('checked', true);
                           $("#shop_close_reason").addClass("hide");
                       }
                   }

               })
           }else{
               $("#shop_close_reason").removeClass("hide");
           }
       });
        util.validate($('.form-validate-1'), function (form) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo $saveMiniProgramSettingUrl; ?>',
                data: {
                    'is_mini_program': $("input[name='is_mini_program']").is(':checked')? 1 : 0,
                    'second_id': $('#category option:selected').val(),
                    'authorizer_secret': $("input[name='app_secret']").val() ,
                    'close_reason': $("#close_reason").val(),
                },
                success: function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success');
                    } else {
                        $("#is_mini_program").attr("checked","checked");
                        util.message(data["message"], 'danger');
                    }
                }
            });
        })
        loading();
        function loading(){
            $.ajax({
                type:"post",
                url : "<?php echo $payConfigMirUrl; ?>",
                async : true,
                success : function(data) {
                        if(data['b_set']['is_use']==1){
                            $("#bpay_is_use").prop("checked", true);
                        }
                        if(data['d_set']['is_use']==1){
                            $("#dpay_is_use").prop("checked", true);
                        }
                        if(data['wx_set']['is_use']==1){
                            $("#wxpay_is_use").prop("checked", true);
                        }
						if(data['gp_set']['is_use']==1){
                            $("#gppay_is_use").prop("checked", true);
                        }
                        $("#APP_KEY").val(data['wx_set']['value']['appid']);
                        $("#MCH_KEY").val(data['wx_set']['value']['mch_key']);
                        $("#MCHID").val(data['wx_set']['value']['mchid']);
						$("#APPID").val(data['gp_set']['value']['appid']);
                        $("#PARTNER_CODE").val(data['gp_set']['value']['partner_code']);
                        $("#CREDENTIAL_CODE").val(data['gp_set']['value']['credential_code']);
						if(data['gp_set']['value']['currency'] == 'CNY'){
							$("input[name='CURRENCY']:eq(1)").attr("checked",'checked');
						}else{
							$("input[name='CURRENCY']:eq(0)").attr("checked",'checked');
						}
                        var html = '';
                        for(var i = 0; i < data['pay_list'].length; i++){
                            html+='<tr>';
                            html+='<td>';
                            html+='<div class="media">';
                            html+='<div class="media-left">';
                            html+='<img src="'+data['pay_list'][i]['logo']+'">';
                            html+='</div>';
                            html+='<div class="media-body text-left">'+data['pay_list'][i]['pay_name'];
                            html+='<p class="p small-muted">'+data['pay_list'][i]['desc']+'</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='</td>';
                            html+='<td>';
                            if(data['pay_list'][i]['is_use']==1){
                                html+='<span class="label label-success payment_is_open" data-id="'+data['pay_list'][i]['id']+'" data-is_use="0">开启</span>';
                            }else{
                                html+='<span class="label label-danger payment_is_open" data-id="'+data['pay_list'][i]['id']+'" data-is_use="1">关闭</span>';
                            }
                            html+='</td>';
                            html+='<td class="fs-0 operationLeft">';
                            if(data['pay_list'][i]['key']=='MPPAY'){
                                html+='<a href="javascript:void(0);" class="btn-operation wPay_set">配置</a>';
                            }
                            if(data['pay_list'][i]['key']=='BPAYMP'){
                                html+='<a href="javascript:void(0);" class="btn-operation bPay_set">配置</a>';
                            }
                            if(data['pay_list'][i]['key']=='DPAYMP'){
                                html+='<a href="javascript:void(0);" class="btn-operation dPay_set">配置</a>';
                            }
							if(data['pay_list'][i]['key']=='GPPAY'){
                                html+='<a href="javascript:void(0);" class="btn-operation gPay_set">配置</a>';
                            }
                            html += '</td>';
                            html += '</tr>';
                        }
                        $('#pay_list').html(html);


                }
            });
        }
        LoadingInfo();
        function LoadingInfo() {
            $.ajax({
                type: "post",
                url: "<?php echo $getMpSettingUrl; ?>",
                success: function (data) {
                    $("#close_reason").val(data['close_reason']);
                }
            });
        }

        // 启用/取消模板消息
        // $('#tem_info').on('change', '.J-switch', function () {
        //     var _this = $(this);
        //     var checked = $(this).prop('checked');
        //     // template_id 我们的模板id，mp_template_id小程序消息模板库的模板id
        //     var template_id = _this.data('template-id');
        //     if (checked) {
        //         $.ajax({
        //             url: '<?php echo $addMtRelationUrl; ?>',
        //             type: 'POST',
        //             data: {
        //                 'template_id': template_id
        //             },
        //             success: function (data) {
        //                 if (data.code > 0) {
        //                     $("#mp_template_id_" + template_id).val(data.data.mp_template_id);
        //                     util.message(data.message, 'success');
        //                 } else {
        //                     util.message(data.message);
        //                 }
        //             }
        //         })
        //     } else {
        //         var mp_template_id = $("#mp_template_id_" + template_id).val();
        //         $.ajax({
        //             url: '<?php echo $deleteMtRelationUrl; ?>',
        //             type: 'POST',
        //             data: {
        //                 'mp_template_id': mp_template_id
        //             },
        //             success: function (data) {
        //                 if (data.code > 0) {
        //                     $("#mp_template_id_" + template_id).val('');
        //                     util.message(data.message, 'success');
        //                 } else {
        //                     util.message(data.message);
        //                 }
        //             }
        //         })
        //     }
        // })

        // 刷新基本信息
        $("#refresh_base").on("click", function () {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url:"<?php echo $getNewMpBaseInfoUrl; ?>",
                success:function(result){
                    if (result['data'] == "") {
                        util.message("更新失败！", 'danger');return;
                    }
                    util.message(result.message, 'success');
                    window.location.reload();
                }});
        })
        // 刷新服务器域名
        $("#refresh_domain").on("click", function () {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url:"<?php echo $postDomainToMpUrl; ?>",
                success:function(result){
                    if (result.code < 0) {
                        util.message(result.message, 'danger');return;
                    }
                    util.message("刷新成功", 'success');
                    window.location.reload();
                }});
    })
        // 添加自定义键
        var new_index = 1;
        $(".add-key").click(function () {
            var template_id = $(this).data('template-id');/*暂时默认只有4个选项，以后可以做成动态的*/
            var html  = '<div class="form-group" id="key_'+ template_id +'_'+ new_index+'" data-key-id="new_'+new_index+'" data-template-id="'+template_id+'">' +
                '<div class="col-sm-2 control-label">自定义键</div>' +
                '<div class="col-xs-2">' +
                '<input type="text" name="key_name" data-id=""  class="form-control" required placeholder="请输入键名">' +
                '</div>' +
                '<div class="col-md-3"  style="padding-left: 0px">' +
                '<input type="text"  name="key_value" class="form-control"  required placeholder="请输入键值变量名">' +
                '</div>' +
                '<div class="col-md-5" style="padding-left: 0px">' +
                '<div class="input-group item">' +
                '<input type="text" class="form-control" name="key_content" data-ids="" >' +
                '<span class="input-group-btn"><a href="javascript:void(0);" class="btn btn-info link_set keyWord">商城变量</a></span>' +
                '</div>' +
                '</div>' +
                '<div class="col-xs-1 control-label" style="padding-left: 0px;width: 30px;" ><a href="javascript:void(0);" class="text-danger delete-area">删除</a></div>' +
                '</div>';
            $(this).parent().parent().before(html);
            new_index++;
        });
        // 商城变量
        $('body').on('click','.keyWord',function(){
            var _this = $(this);
            util.minSubMessageDialog(function(data){
                var elm = _this.parents('.input-group-btn').parents('.item').find('input');
                var value = $(elm).val() + '[' + data.key + '] ';
                elm.val(value);
                var ids = elm.data("ids");
                if (ids == null || ids == undefined || ids == ''){
                    elm.data("ids", data.id);
                } else {
                    elm.data("ids", ids + ',' + data.id);
                }
            })
        });
        // 删除
        $('body').on('click', '.delete-area', function () {
            $(this).parent().parent().remove();
        });
        // 保存模板
        $('#tem_info').on('click', '.template_add', function () {
            var template_id = $(this).data("template-id");
            var state = $("input[name=state_"+template_id+"]").is(":checked") ? 1: 0;
            var template_no = $("input[id=mp_template_id_"+template_id+"]").val();
            var new_template_detail = {};
            new_template_detail['template_id'] = template_id;
            new_template_detail['state'] = state;
            new_template_detail['template_no'] = template_no;
            new_template_detail['key'] = {};
            //循环开始
            $("div[id^=key_"+template_id+"]").each(function (i,e) {
                var curr_template_id = $(this).attr("data-key-id");
                var key_default = $(this).attr("data-key-is-default");
                var key_name = $(this).find("input[name=key_name]").val();
                var key_value = $(this).find("input[name=key_value]").val();
                var key_content = $(this).find("input[name=key_content]").val();
                var key_ids = $(this).find("input[name=key_content]").data('ids');
                new_template_detail['key'][curr_template_id] = {};
                new_template_detail['key'][curr_template_id]['key_id'] = curr_template_id;
                new_template_detail['key'][curr_template_id]['is_default'] = key_default ? key_default : 0;
                new_template_detail['key'][curr_template_id]['name'] = key_name;
                new_template_detail['key'][curr_template_id]['value'] = key_value;
                new_template_detail['key'][curr_template_id]['content'] = key_content;
                new_template_detail['key'][curr_template_id]['ids'] = key_ids
            });
console.log(new_template_detail);
            // 提交数据
            $.ajax({
                url: "<?php echo $addMtRelationKeyUrl; ?>",
                type: "post",
                dataType: 'json',
                data: {"data": JSON.stringify(new_template_detail)},
                success: function (res) {
                    if (parseInt(res.code)) {
                        util.message(res.message,"success", function () {
                            window.location.href =  __URL('ADDONS_MAINminiProgramSetting');
                        })
                    } else {
                        util.message(res.message, "danger");
                    }
                }
            });
        })
    })
</script>

