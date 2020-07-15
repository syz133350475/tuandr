<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:40:"template/platform/Config/shopConfig.html";i:1591330106;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $second_menu['module_name']; ?> - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>团大人 - 让更多的人帮你卖货！<?php endif; ?></title>
    <link rel="stylesheet" href="PLATFORM_NEW_LIB/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="PLATFORM_STATIC/css/common.css?t=1.2">
    <link rel="stylesheet" href="PLATFORM_NEW_CSS/platform.css?t=1.1">
    <link rel="shortcut icon" href="PLATFORM_IMG/logo.png" type="image/x-icon" />
    <script>
        var PLATFORMJS = "PLATFORM_NEW_JS";
    </script>
    <script type="text/javascript" src="PLATFORM_NEW_LIB/require.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/time_common.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/common.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/jquery.min.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/config.js"></script>
    <script>
    var PLATFORM_NAME = "<?php echo $title_name; ?>";
    var PLATFORMIMG = "PLATFORM_IMG";//后台图片请求路径
    var PLATFORMMAIN = "PLATFORM_MAIN";//后台请求路径
    var SHOPMAIN = "SHOP_MAIN";//PC端请求路径
    var APPMAIN = "APP_MAIN";//手机端请求路径
    var UPLOAD = "__UPLOAD__";//上传文件根目录
    var PAGESIZE = "<?php echo $pagesize; ?>";//分页显示页数
    var ROOT = "__ROOT__";//根目录
    var ADDONS = "__ADDONS__";
    var STATIC = "__STATIC__";
    var MAIN = "PLATFORM_MAIN";//装修请求路径
    var PASSMAIN = "PLATFORM_MAIN";
    var ADDONSMAIN = "ADDONS_MAIN";

</script>
    <input type="hidden" id="vslai_rewrite_model" value="<?php echo rewrite_model(); ?>">
<input type="hidden" id="vslai_url_model" value="<?php echo url_model(); ?>">
<input type="hidden" id="vslai_admin_model" value="<?php echo admin_model(); ?>">
<input type="hidden" id="vslai_platform_model" value="<?php echo platform_model(); ?>">
<input type="hidden" id="url_realm_ip" value="<?php echo $web_info['realm_ip']; ?>">
<script>
function __URL(url){
	url = url.replace('SHOP_MAIN', '');
	url = url.replace('APP_MAIN', 'wap');
	url = url.replace('ADMIN_MAIN', $("#vslai_admin_model"));
	url = url.replace('PLATFORM_MAIN', $("#vslai_platform_model"));
	if(url == ''|| url == null){
		return 'SHOP_MAIN'+'?website_id=<?php echo $website_id; ?>';
	}else{
		var str=url.substring(0, 1);
		if(str=='/' || str=="\\"){
			url=url.substring(1, url.length);
		}
		// if($("#vslai_rewrite_model").val()==1 || $("#vslai_rewrite_model").val()==true){
		// 	return 'SHOP_MAIN/'+url;
		// }
		var action_array = url.split('?');
		//检测是否是pathinfo模式
		var url_model = $("#vslai_url_model").val();
		if(url_model==1 || url_model==true){
			var base_url = 'SHOP_MAIN/'+action_array[0];
			var tag = '?';
		}else{
			var base_url = 'SHOP_MAIN?s=/'+ action_array[0];
			var tag = '&';
		}
                var url = base_url;
                for(var i=1;i<action_array.length;i++){
                    if(action_array[i] != '' && action_array[i] != null){
                        url+=tag + action_array[i];
                    }else{
                        url+=tag;
                    }
                }

		return url;

	}
}
function __URLS(url){
    if( $("#vslai_rewrite_model").val()){
        url = url.replace("/index.php","");
    }
    var index = url.lastIndexOf("//");
    str = url.substring(index+2,url.length);
    var index1 =  str.indexOf("/");
    str0 = url.substring(0,index+2);
    str1 = str.substring(0,index1);
    str2 = str.substring(index1,url.length);
    var realm_ip = $("#url_realm_ip").val();
    if(realm_ip){
        urls = str0+realm_ip+str2;
    }
    var str=urls.substring(0, 1);
    if(str=='/' || str=="\\"){
        urls=urls.substring(1, urls.length);
    }
    var action_array = urls.split('?');
        //检测是否是pathinfo模式
    var url_model = $("#vslai_url_model").val();
    if(url_model==1 || url_model==true){
        var base_url = action_array[0];
        var tag = '?';
    }else{
        var base_url =  action_array[0];
        var tag = '&';
    }
    var urls = base_url;

    return urls;
}
//处理图片路径
function __IMG(img_path){
	var path = "";
	if(img_path != undefined && img_path != ""){
		if(img_path.indexOf("http://") == -1 && img_path.indexOf("https://") == -1){
                    var url = document.domain;
                    var ishttps = 'https:' == document.location.protocol ? true: false;
                    if(ishttps){
                        url = 'https://' + url;
                   }else{
                        url = 'http://' + url;
                   }
                    
		    if(img_path.substr(0,1)=='/'){
                path = url + UPLOAD+img_path;
            }else{
                path = url + UPLOAD+"\/"+img_path;
            }
		}else{
			path = img_path;
		}
	}
	return path;
}
</script>
    

    <!--[if IE]>
	<script src='https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv-printshiv.min.js'></script><script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	< ![endif]-->
</head>
<body>
<div class="v-layout <?php if(!$second_menu_list): ?> nosubnav <?php endif; ?>">
    <div class="v-sidebar">
        <!--导航-->
        <div class="v-nav">
            <!--<a class="v-logo" href="/" title=""><img src="PLATFORM_STATIC/images/logo.png"></a>-->
            <ul class="v-nav-list">
                <?php if($nav_list): if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['data']['icon_class']=='icon-application-color' && !in_array($vo['data']['module_id'],$addons_sign_module)): ?>
                <li><a href="<?php echo __URL('PLATFORM_MAIN/'.$vo['data']['url']); ?>" class='item  <?php if($vo['data']['module_id'] == $headid): ?>active<?php endif; ?>' title=""><span class="icon-application-color"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>&nbsp;<?php echo $vo['data']['module_name']; ?></a></li>
                <?php else: ?>
                <li ><a href="<?php echo __URL('PLATFORM_MAIN/'.$vo['data']['url']); ?>" class='item <?php if($vo['data']['is_menu'] == 0): ?>hide<?php endif; if($vo['data']['module_id'] == $headid): ?> active <?php endif; ?>' title=""><i class="icon <?php if($vo['data']['icon_class']): ?><?php echo $vo['data']['icon_class']; else: ?> icon-home <?php endif; ?>"></i>&nbsp;<?php echo $vo['data']['module_name']; ?></a></li>
                 <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </div>
        
        <?php if($second_menu_list): ?>
        <div class="v-subnav">

            <?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!in_array($vo['data']['module_id'],$addons_sign_module)): if(!(empty($vo['sub_menu']) || (($vo['sub_menu'] instanceof \think\Collection || $vo['sub_menu'] instanceof \think\Paginator ) && $vo['sub_menu']->isEmpty()))): ?>
            <ul class="v-subnav-list <?php if($vo['data']['module_id'] == $headid): ?>block<?php else: ?>hide<?php endif; ?>" id="menu_<?php echo $vo['data']['module_id']; ?>" >
            <?php if(is_array($vo['sub_menu']) || $vo['sub_menu'] instanceof \think\Collection || $vo['sub_menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['sub_menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;if(!in_array($v1['module_id'],$addons_sign_module)): ?>
            <li>
                <a href="<?php echo __URL('PLATFORM_MAIN/'.$v1['url']); ?>"  <?php if(strtoupper($v1['method']) == strtoupper($action) || $v1['module_id'] == $pid): ?> class="item active"<?php else: ?> class="item"<?php endif; ?>> <?php echo $v1['module_name']; ?></a>
            </li>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <?php endif; ?>
        
    </div>
    
<?php if($no_menu == '1'): else: ?>
<div class="v-header">
        <div class="v-header-box">
            <?php if($second_menu['module_name']=='首页'): ?>
            <div class="v-header-title">
               <!-- <img src="<?php if($logo_config['opera_logo']): ?><?php echo $logo_config['opera_logo']; else: ?>PLATFORM_IMG/logo2.png<?php endif; ?>" class="v-header-img">-->
                <?php if($web_info['mall_name']): ?>
                <span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['mall_name']; ?></span>
                <?php else: ?><span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['title']; ?></span><?php endif; ?> 
                <span class="btn-version btn-primary versionPr" id="versionPr">
                    <?php echo $web_info['version']; ?>
                </span>
            </div>
            <?php else: ?>
            <div class="v-header-title">
                <!-- <img src="<?php if($logo_config['opera_logo']): ?><?php echo $logo_config['opera_logo']; else: ?>PLATFORM_IMG/logo2.png<?php endif; ?>" class="v-header-img">-->
                <?php if($web_info['mall_name']): ?>
                <span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['mall_name']; ?></span>
                <?php else: ?><span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['title']; ?></span><?php endif; ?> 
                <span class="btn-version btn-primary versionPr" id="versionPr">
                    <?php echo $web_info['version']; ?>
                 </span> 
                </div>
            <?php endif; ?>
            <div class="v-header-account">

                <div class="user-menu fs-12">



                    <div class="inline-block">
                        <a href="<?php echo __URL('PLATFORM_MAIN/index/preview'); ?>" class="previewIndex" target="_blank">预览</a>
                    </div>

                    <div class="inline-block newsTips shortcutBar">
                        <a href="javascript:void(0);" id="news-tips" class="dker clear-cache" style="position: relative">
                            <span><i class="icon icon-message3"></i></span> 
                            <span class="badge pa tip0"></span>
                        </a>
                        
                        <div class="dropdown-menu" aria-labelledby="news-tips">
                            <ul class="newsTips_ul">
                                <li class="no_count hide">暂无待办信息</li>
                                <li class="dai_count hide"><a href="<?php echo __URL('PLATFORM_MAIN/order/orderlist'); ?>?order_status=1" class="flex flex-pack-justify"><div>待发货订单</div><div class="text-red tip2"></div></a></li>
                                <li class="after_count hide"><a href="<?php echo __URL('PLATFORM_MAIN/order/afterorderlist'); ?>" class="flex flex-pack-justify"><div>售后订单</div><div class="text-red tip3"></div></a></li>
                                <li class="mail_count hide"><a href="<?php echo __URL('PLATFORM_MAIN/Mail/mailList'); ?>" class="flex flex-pack-justify"><div>站内信</div><div class="text-red tip4"></div></a></li>
                                <li class="cms_count hide"><a href="<?php echo __URL('PLATFORM_MAIN/Mail/cmsList'); ?>" class="flex flex-pack-justify"><div>公告</div><div class="text-red tip5"></div></a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="layout-user inline-block">
                        <div class="ivu-dropdown">
                            <div class="ivu-dropdown-rel">
                                <a href="javascript:void(0)" class="text-primary"><img src="/public/platform/images/index/22.png" class="avatar">
                                    <?php if($username): ?><?php echo $username; else: ?><?php echo $web_info['user_tel']; endif; ?>
                                    <span class="caret"></span>
                                </a>
                            </div>
                            <div class="dropdown-menu qqqq">
                                <div class="ivu-dropdown-menu user-dropdown">
                                    <div class="infos">
                                        <div class="row">
                                            <div class="col-md-3">
                                               <a class="avatar"><img src="/public/platform/images/index/22.png"></a>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="names"><?php if($username): ?><?php echo $username; else: ?><?php echo $web_info['user_tel']; endif; ?></p>
                                                <p class="names updateUser"><span id="updateUser"><?php if($web_info['title']): ?><?php echo $web_info['title']; else: ?>未设置公司名称<?php endif; ?></span> <a href="javascript:void(0);" class="text-primary" style="margin-left: 6px">修改</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="operations flex">
                                        <a href="<?php echo __URL('PLATFORM_MAIN/Addonslist/incrementOrderList'); ?>" target="_blank"><i class="icon icon-order1 mr-10"></i>订购列表</a>
                                        <?php if($auth_status): ?>
                                        <a href="<?php echo __URL('PLATFORM_MAIN/Auth/userlist'); ?>"><i class="icon icon-account3 mr-10"></i>子账号列表</a>
                                        <?php endif; ?>
                                        <a href="http://bbs.vslai.com.cn/plugin.php?id=workorder" target="_blank"><i class="icon icon-list mr-10"></i>工单管理</a>
                                        <a href="javascript:void(0);" class="updatePass"><i class="icon icon-password3 mr-10"></i>修改密码</a>
                                    </div>
                                    <div class="operations flex">
                                        <a href="javascript:void(0);" class="delcache"><i class="icon icon-clear mr-10"></i>清除缓存</a>
                                        <a href="<?php echo __URL('PLATFORM_MAIN/Login/logout'); ?>"><i class="icon icon-logout-l mr-10"></i>退出登录</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

    <div class="v-main">
        <div class="v-container">
            <?php if($second_menu['desc'] != ''): ?>
            <div class="alert alert-tips alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $second_menu['desc']; if($second_menu['jump'] != ''): ?>
                <a href="<?php echo $second_menu['jump']; ?>" class="alert-link" target="_blank">&nbsp;查看详情</a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            
		<!-- page -->
		<ul class="nav nav-tabs v-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#basic" aria-controls="basic"  data-type="basic" role="tab" data-toggle="tab" class="flex-auto-center">基本设置</a></li>
			<li role="presentation"><a href="#tradeset" aria-controls="tradeset" data-type="tradeset" role="tab" data-toggle="tab" class="flex-auto-center">交易设置</a></li>
			<li role="presentation"><a href="#withdrawalset" aria-controls="withdrawalset" data-type="withdrawalset" role="tab" data-toggle="tab" class="flex-auto-center">提现设置</a></li>
			<li role="presentation"><a href="#validate" aria-controls="validate" data-type="validate" role="tab" data-toggle="tab" class="flex-auto-center">验证码设置</a></li>
			<li role="presentation"><a href="#message" aria-controls="message" data-type="message" role="tab" data-toggle="tab" class="flex-auto-center">短信通知</a></li>
			<li role="presentation"><a href="#payment" aria-controls="payment" data-type="payment" role="tab" data-toggle="tab" class="flex-auto-center payment">支付方式</a></li>
			<li role="presentation"><a href="#returnsetting" aria-controls="returnsetting" data-type="returnsetting" role="tab" data-toggle="tab" class="flex-auto-center">商家地址</a></li>
			<li role="presentation"><a href="#storageconfig" aria-controls="storageconfig" data-type="storageconfig" role="tab" data-toggle="tab" class="flex-auto-center">素材存储</a></li>
			<li role="presentation"><a href="#redis" aria-controls="redis" data-type="redis" role="tab" data-toggle="tab" class="flex-auto-center">REDIS配置</a></li>
			<li role="presentation"><a href="#copystyle" aria-controls="copystyle" data-type="copystyle" role="tab" data-toggle="tab" class="flex-auto-center">文案样式</a></li>
			<li role="presentation"><a href="#wechat" aria-controls="wechat" data-type="wechat" role="tab" data-toggle="tab" class="flex-auto-center">微信开放平台</a></li>
		</ul>

		<div class="tab-content pt-15">
			<div role="tabpanel" class="tab-pane fade in active" id="basic" >
				<form class="form-horizontal form-validate1 widthFixedForm">
					<div class="screen-title2" data-id="t2">
						<span class="text">移动商城</span>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">移动商城</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" id="waptype">
								<label for="waptype" class=""></label>
							</div>
							<p class="help-block">关闭后微信端、WAP端商城无法使用</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">商城Logo</label>
						<div class="col-md-5">
							<div class="picture-list" id="wap_logo">

							</div>
							<p class="help-block">建议200 * 100，主要呈现在店铺街、店铺首页，支持JPG\GIF\PNG格式</p>
						</div>
					</div>
					<div class="wap_rule" style="display: none">
					<div class="form-group">
						<label class="col-md-2 control-label">注册页广告图</label>
						<div class="col-md-5">
							<div class="picture-list" id="wap_register_adv">

							</div>
							<p class="help-block">建议700 * 394，支持JPG\GIF\PNG格式</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">注册页广告图链接</label>
						<div class="col-md-5">
							<div class="input-group item">
							<input type="text" class="form-control item" id="wap_register_jump" value="">
							<span class="input-group-btn"><a href="javascript:void(0);" class="btn btn-default link_set">选择链接</a></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">登录页广告图</label>
						<div class="col-md-5">
							<div class="picture-list" id="wap_login_adv">

							</div>
							<p class="help-block">建议700 * 394，支持JPG\GIF\PNG格式</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">登录页广告图链接</label>
						<div class="col-md-5">
							<div class="input-group item">
							<input type="text" class="form-control" id="wap_login_jump" value="">
								<span class="input-group-btn"><a href="javascript:void(0);" class="btn btn-default link_set">选择链接</a></span>
							</div>
						</div>
					</div>
					<div class="form-group close_rule" style="display: none">
							<label class="col-md-2 control-label">商城关闭原因</label>
							<div class="col-md-5">
								<textarea class='form-control' rows="4" id="close_reason"></textarea>
							</div>
						</div>
					</div>
					<div class="screen-title2" data-id="t2">
						<span class="text">商城全局</span>
						<span class="text1">该栏目数据将全渠道同步。</span>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>商城名称</label>
						<div class="col-md-5">
							<input type="text" class="form-control" id="mall_name" value="" required autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">会员注册协议</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" id="reg_rule">
								<label for="reg_rule" class=""></label>
							</div>
						</div>
					</div>
					<div class="form-group reg_rule" style="display: none">
						<label class="col-md-2 control-label"></label>
						<input type="hidden" id="reg_id" value="">
						<div class="col-md-5" id="reg_message">
						</div>
						<!--<p class="help-block">需前往<a class="text-primary" href="<?php echo __URL('ADDONS_MAINquestionList'); ?>" target="_blank">帮助中心</a>发布</p>-->
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">会员购买协议</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" id="pur_rule">
								<label for="pur_rule" class=""></label>
							</div>
						</div>
					</div>
					<div class="form-group pur_rule" style="display: none">
						<label class="col-md-2 control-label"></label>
						<input type="hidden" id="pur_id" value="<?php echo $website['pur_id']; ?>">
						<div class="col-md-5" id="shop_message">
						</div>
						<!--<p class="help-block">需前往<a class="text-primary" href="<?php echo __URL('ADDONS_MAINquestionList'); ?>" target="_blank">帮助中心</a>发布</p>-->
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary basic_set" type="submit">保存</button>
						</div>
					</div>
				</form>
			</div>

			<div role="tabpanel" class="tab-pane fade" id="validate" >
				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-md-2 control-label">商城验证码是否开启</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" id="switch3" >
								<label for="switch3" class=""></label>
							</div>
							<p class="help-block">登录注册失败三次才会触发验证码！</p>
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<a class="btn btn-primary code_set" type="submit">保存</a>
						</div>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="message" >
				<div class="mb-20">
					<button class="btn btn-primary messageConfig">短信平台配置</button>
					<button class="btn btn-primary ml-15 emailConfig">邮箱账号配置</button>
				</div>
				<table class="table v-table table-auto-center">
					<thead>
					<tr>
						<th>模版名称</th>
						<th>通知人类型</th>
						<th>模版类型</th>
						<th>短信模版</th>
						<th>邮箱模版</th>
					</tr>
					</thead>
					<tbody id="list">

					</tbody>
				</table>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="payment" >
				<table class="table v-table table-auto-center">
					<thead>
					<tr>
						<th>支付方式</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
					</thead>
					<tbody id="pay_list">

					</tbody>
				</table>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tradeset">
				<form class="form-horizontal form-validate4 pt-15 widthFixedForm">
                    <div class="screen-title2" data-id="t2">
                        <span class="text">订单处理</span>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>订单自动关闭时间</label>
						<div class="col-md-5">
							<div class="input-group w-200">
							<input type="number" class="form-control" id="order_buy_close_time" name="order_buy_close_time" value="" min="1" required>
								<div class="input-group-addon">分</div>
							</div>
							<p class="help-block">订单超过设定时间自动关闭</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>自动收货时间</label>
						<div class="col-md-5">
							<div class="input-group w-200">
							<input type="number" class="form-control" id="order_auto_delivery"  name="order_auto_delivery" min="1" value="" required>
								<div class="input-group-addon">天</div>
							</div>
							<p class="help-block">订单超过设定时间自动收货</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>订单完成时间</label>
						<div class="col-md-5">
							<div class="input-group w-200">
                                <input type="number" class="form-control" id="order_delivery_complete_time"  name="order_delivery_complete_time" min="0" value="" required>
								<div class="input-group-addon">天</div>
							</div>
							<p class="help-block">收货后多长时间完成订单，订单完成后不能进行售后</p>
						</div>
                    </div>
                    <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span>自动评价</label>
                            <div class="col-md-5">
                                <div class="switch-inline">
                                <input type="checkbox" id="is_translation" name="is_translation">
                                <label for="is_translation" class=""></label>
                                </div>
                            </div>
                    </div>
                    <div class="translation_rule" style="display: none">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span>自动评价时间</label>
                            <div class="col-md-5">
                                <div class="input-group w-200">
                                    <input type="number" class="form-control number-form-control" name="translation_time" id="translation_time" value="" min="0" >
                                    <div class="input-group-addon">天</div>
                                </div>
                                <p class="help-block">订单完成后多长时间自动好评</p>
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-2 control-label">评价内容</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control " name="translation_text" id="translation_text" value="" >
                                    <p class="help-block">自动评价的内容，空则不显示评价内容</p>
                                </div>
                            </div>
                    </div>
                    <div class="screen-title2" data-id="t2">
                        <span class="text">返佣/抵扣</span>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>积分汇率</label>
						<div class="col-md-5">
							<div class="input-group w-200">
								<input type="number" class="form-control number-form-control" name="convert_rate" id="convert_rate" value="" min="1" required>
								<div class="input-group-addon">积分/元</div>
							</div>
							<p class="help-block">商城积分需要兑换人民币业务时则按该汇率计算，积分只会以整数扣除，如遇到除不尽的小数则积分向下取整方式扣除</p>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-2 control-label">购物返积分</label>
						<div class="col-md-5">
						<div class="switch-inline">
						<input type="checkbox" id="point" name="point">
						<label for="point" class=""></label>
						</div>
					</div>
					</div>
					<div class="point_rule" style="display: none">
					    <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span>积分计算方式</label>
                            <div class="col-md-5">
                                <select class="form-control w-200" id="integral_calculation" name="integral_calculation" min="0" required title=" ">
                                    <option value="-1" selected="selected">请选择</option>
                                    <option value="1">订单总价</option>
                                    <option value="2">商品总价</option>
                                    <option value="3">实际支付金额</option>
                                </select>
                            </div>
					</div>
					    <div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>购物返积分比例</label>
						<div class="col-md-5">
							<div class="input-group w-200">
							 <input type="number" class="form-control number-form-control" id="point_invoice_tax" name="point_invoice_tax" value="" min="0">
								<div class="input-group-addon">%</div>
							</div>
						</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>购物返积分节点</label>
							<div class="col-md-5">
								<select class="form-control w-200" id="shopping_back_points" name="shopping_back_points" min="0" required title=" ">
									<option value="-1" selected="selected">请选择</option>
									<option value="1">订单已完成</option>
									<option value="2">订单已收货</option>
									<option value="3">订单支付完成</option>
								</select>
								<p class="help-block mb-0">建议设置为订单完成，否则订单产生售后有可能导致积分不足扣除</p>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">积分抵扣</label>
						<div class="col-md-5">
							<div class="switch-inline">
							<input type="checkbox" id="point_deduction" name="point_deduction">
							<label for="point_deduction" class=""></label>
							</div>
						</div>
					</div>
					<div class="point_deduction_rule" style="display: none">
						<div class="form-group">
						    <label class="col-md-2 control-label"><span class="text-bright">*</span>抵扣计算方式</label>
							<div class="col-md-5">
                                <select class="form-control w-200" id="point_deduction_calculation" name="point_deduction_calculation" min="0" required title=" ">
                                    <option  value="-1" selected="selected">请选择</option>
                                    <option  value="1">订单总价</option>
                                    <option  value="2">商品总价</option>
                                    <option  value="3">商品实付金额</option>
                                </select>
							</div>
						</div>
					    <div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>积分最大抵扣</label>
							<div class="col-md-5">
								<div class="input-group w-200">
								 <input type="number" class="form-control number-form-control" name="point_deduction_max" id="point_deduction_max" value="" min="0" max="100">
									<div class="input-group-addon">%</div>
								</div>
								<p class="help-block">下单时积分最多抵扣多少，设置后所有商品均按该比例抵扣，0则不设置抵扣，可前往商品单独设置抵扣比例，设置抵扣优先级 “商品 > 商城配置”</p>
							</div>
						</div>
                    </div>
                    <div class="screen-title2" data-id="t2">
                            <span class="text">转账/兑换</span>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">余额转账</label>
                            <div class="col-md-5">
                                <div class="switch-inline">
                                <input type="checkbox" id="balance_transfer" name="balance_transfer">
                                <label for="balance_transfer" class=""></label>
                                </div>
                                <p class="help-block">开启后支持会员与会员之间的余额转账</p>
                            </div>
                        </div>
                        <div class="balance_transfer_rule" style="display: none">
                            <div class="form-group">
                                <label class="col-md-2 control-label">转账手续费</label>
                                <div class="col-md-5">
                                    <div class="switch-inline">
                                    <input type="checkbox" id="balance_transfer_charge" name="balance_transfer_charge">
                                    <label for="balance_transfer_charge" class=""></label>
                                    </div>
                                    <p class="help-block">开启后转账则需要收取手续费</p>
                                </div>
                            </div>
                            
                            <div class="balance_transfer_charge_rule" style="display: none">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">手续费类型</label>
                                    <div class="col-md-8" >
                                        <label class="radio-inline">
                                            <input type="radio" name="charge_type" class="charge_type" checked  value="1"> 比例收取
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="charge_type" class="charge_type" value="2"  > 固定收取
                                        </label>
                                    </div>
                                </div>
                                <div class="a" id="charge_input">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><span class="text-bright">*</span>手续费</label>
                                        <div class="col-md-5">
                                            <div class="input-group w-200">
                                                <input type="number" class="form-control number-form-control" name="charge_pares" id="charge_pares" value="" min="0" >
                                                <div class="input-group-addon">%</div>
                                            </div>
                                            <p class="help-block">转账时收取的手续费</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">最低手续费</label>
                                        <div class="col-md-5">
                                            <div class="input-group w-200">
                                                <input type="number" class="form-control number-form-control" name="charge_pares_min" id="charge_pares_min" value="" min="0" >
                                                <div class="input-group-addon">元</div>
                                            </div>
                                            <p class="help-block">当计算手续费少于最低手续费时将按最低手续费收取</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="a hide" id="charge_input1">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><span class="text-bright">*</span>手续费</label>
                                        <div class="col-md-5">
                                            <div class="input-group w-200">
                                                <input type="number" class="form-control number-form-control" name="charge_pares2" id="charge_pares2" value="" min="0" >
                                                <div class="input-group-addon">元</div>
                                            </div>
                                            <p class="help-block">转账时收取的手续费</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">余额积分转账</label>
                            <div class="col-md-5">
                                <div class="switch-inline">
                                <input type="checkbox" id="point_balance_transfer" name="balance_transfer">
                                <label for="point_balance_transfer" class=""></label>
                                </div>
                                <p class="help-block">开启后支持余额与积分之间的互换</p>
                            </div>
                        </div>
                        <div class="point_balance_transfer_rule" style="display: none">
                            <div class="form-group">
                                <label class="col-md-2 control-label">转账手续费</label>
                                <div class="col-md-5">
                                    <div class="switch-inline">
                                    <input type="checkbox" id="point_balance_transfer_charge" name="point_balance_transfer_charge">
                                    <label for="point_balance_transfer_charge" class=""></label>
                                    </div>
                                    <p class="help-block">开启后余额与积分兑换则需要收取手续费</p>
                                </div>
                            </div>
                            
                            <div class="point_balance_transfer_charge_rule" style="display: none">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">手续费类型</label>
                                    <div class="col-md-8" >
                                        <label class="radio-inline">
                                            <input type="radio" name="point_charge_type" class="point_charge_type" checked  value="1"> 比例收取
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="point_charge_type" class="point_charge_type" value="2"  > 固定收取
                                        </label>
                                    </div>
                                </div>
                                <div class="a" id="point_charge_input">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><span class="text-bright">*</span>手续费</label>
                                        <div class="col-md-5">
                                            <div class="input-group w-200">
                                                <input type="number" class="form-control number-form-control" name="point_charge_pares" id="point_charge_pares" value="" min="0" >
                                                <div class="input-group-addon">%</div>
                                            </div>
                                            <p class="help-block">转账时收取的手续费</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">最低手续费</label>
                                        <div class="col-md-5">
                                            <div class="input-group w-200">
                                                <input type="number" class="form-control number-form-control" name="point_charge_pares_min" id="point_charge_pares_min" value="" min="0" >
                                                <div class="input-group-addon">元</div>
                                            </div>
                                            <p class="help-block">当计算手续费少于最低手续费时将按最低手续费收取</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="a hide" id="point_charge_input1">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><span class="text-bright">*</span>手续费</label>
                                        <div class="col-md-5">
                                            <div class="input-group w-200">
                                                <input type="number" class="form-control number-form-control" name="point_charge_pares2" id="point_charge_pares2" value="" min="0" >
                                                <div class="input-group-addon">元</div>
                                            </div>
                                            <p class="help-block">转账时收取的手续费</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary add" type="submit">保存</button>
						</div>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="returnsetting">
				<div id="returnsetting_list">
					<div class="mb-10">
            			<a class="btn btn-primary" href="javascript:addressEdit(0);"><i class="icon icon-add1"></i> 添加模板</a>
        			</div>
        			<table class="table v-table table-auto-center">
			            <thead>
			                <tr>
			                    <th>发货人</th>
			                    <th>电话</th>
			                    <th>发货地址</th>
			                    <th>详细地址</th>
			                    <th>是否默认</th>
			                    <th class="col-md-2 pr-14 operationLeft">操作</th>
			                </tr>
			            </thead>
			            <tbody id="address_list">
			            </tbody>
			        </table>
				</div>
				<form class="form-horizontal form-validate5 pt-15 widthFixedForm hide" id="returnsetting_edit">
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>收货人</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="return_consigner" id="return_consigner" value="" required >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>联系方式</label>
						<div class="col-md-5">
							<input type="text" name="return_mobile" class="form-control" id="return_mobile"  value="" required>
						</div>
					</div>
					<div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>收货地区</label>
                        <div class="col-md-5">
                            <div class="area-form-group">
                                <select name="province" id="return_provinces"  class="form-control getProvince" min="0" required title=" ">
                                        <option value="-1">请选择省...</option>
                                </select>
                                <select name="city" id="return_cities"  class="form-control getSelCity" min="0" required title=" ">
                                        <option value="-1">请选择市...</option>
                                </select>
                                <select name="district" id="return_districts" class="form-control" min="0" required title=" ">
                                        <option value="-1">请选择区...</option>
                                </select>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>详细地址</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="return_address" id="return_address" value=""  required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">邮政编码</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="return_zip_code" id="return_zip_code" value="">
						</div>
					</div>
					<div class="form-group">
                        <label class="col-md-2 control-label">是否默认</label>
                        <div class="col-md-5">
                            <label class="radio-inline">
                                <input type="radio" name="return_is_default" value="1" id="return_is_default">是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="return_is_default" value="0" id="return_is_default2">否
                            </label>
                        </div>
                    </div>
					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary add" type="submit">保存</button>
							<a href="javascript:void(0);" class="btn btn-default address_return_list">返回</a>
						</div>
					</div>
					<input type="hidden" id="return_id" name="return_id" value="0">
					<input type="hidden" id="pid" name="pid" value="">
		            <input type="hidden" id="cid" name="cid" value="">
		            <input type="hidden" id="aid" name="aid" value="">
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="withdrawalset">
				<form class="form-horizontal form-validate6 pt-15 widthFixedForm">
					<div class="form-group">
						<label class="col-md-2 control-label">是否开启</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" id="switch" name="enable">
								<label for="switch" class=""></label>
							</div>
						</div>
					</div>
					<div class="withdraw_rule" style="display: none">
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>最低提现额度</label>
							<div class="col-md-5">
								<div class="input-group w-200">
									<input type="number" class="form-control" id="cash_min" value="" required>
									<div class="input-group-addon">元</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">提现自动审核</label>
							<div class="col-md-5">
								<div class="switch-inline">
									<input type="checkbox"  name="is_examine" id="is_examine" >
									<label for="is_examine" class=""></label>
								</div>
								<p class="help-block">开启后提现自动审核，关闭后需要人工操作审核</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">提现自动打款</label>
							<div class="col-md-5">
								<div class="switch-inline">
									<input type="checkbox"  name="make_money" id="make_money" >
									<label for="make_money" class=""></label>
								</div>
								<p class="help-block">开启后提现自动打款，关闭后需要人工操作打款</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>提现方式</label>
							<div class="col-md-5">
								<div>
									<label class="checkbox-inline">
										<input type="checkbox" name="withdrawals" class="withdrawals" value="3"> 支付宝
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="withdrawals" class="withdrawals" value="2"> 微信
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="withdrawals" class="withdrawals" value="4"> 银行卡(手动提现)
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="withdrawals" class="withdrawals" value="1"> 银行卡(自动提现)
									</label>
								</div>
								<p class="help-block">银行卡（自动提现）提现金额可自动转账至银行账户（需配置通联支付），银行卡（手动提现）提现金额需要手动转账无需配置任何东西</p>
							</div>
						</div>
						<?php if($shopStatus): ?>
						<div class="form-group">
							<label class="col-md-2 control-label">店铺提现手续费率</label>
							<div class="col-md-5">
								<div class="input-group w-200">
									<input type="number" class="form-control" id="poundage" value=""  >
									<div class="input-group-addon">%</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="form-group">
							<label class="col-md-2 control-label">会员提现手续费率</label>
							<div class="col-md-5">
								<div class="input-group w-200">
									<input type="number" class="form-control" id="member_poundage" value="" >
									<div class="input-group-addon">%</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">免手续费提现区间</label>
							<div class="col-md-5">
								<div class="input-group w-400">
									<input type="number" name="withdrawalsbegin" id="withdrawalsbegin" class="form-control number-form-control" step="0.1" min="0" value="">
									<div class="input-group-addon"> ~ </div>
									<input type="number" name="withdrawalsend" id="withdrawalsend" class="form-control number-form-control" step="0.1" min="0" value="">
									<div class="input-group-addon">元</div>
								</div>

							</div>
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary add" type="submit">保存</button>
						</div>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="storageconfig">
				<form class="form-horizontal form-validate7 pt-15">
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>存储方式</label>
						<div class="col-md-5">
							<label class="radio-inline">
								<input type="radio" name="storage_type"  value="1" checked> 本地
							</label>
							<label class="radio-inline">
								<input type="radio" name="storage_type"  value="2" > 阿里云
							</label>
						</div>
					</div>
					<div class="J-alioss" style="display: none">
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>accessKeyId</label>
							<div class="col-md-5">
								<input type="text" class="form-control" name="accessKeyId" id="accessKeyId" value=""  >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>accessKeySecret</label>
							<div class="col-md-5">
								<input type="text" name="accessKeySecret" class="form-control"  id="accessKeySecret"  value="" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>Bucket</label>
							<div class="col-md-5">
								<select id="Bucket" name="Bucket" class="form-control m-b">

								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>Url</label>
							<div class="col-md-5">
								<input type="text" class="form-control" name="seller_zipcode" id="AliossUrl" value="" >
							</div>
						</div>
					</div>

					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary" id="setAliossConfigAjax" type="submit">保存</button>
						</div>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="copystyle">
				<form class="form-horizontal form-validate10 pt-15 widthFixedForm">
					<div class="form-group">
							<label class="col-md-2 control-label">余额</label>
							<div class="col-md-5">
								<div class="input-group">
									<input type="text" class="form-control" id="balance_style" value="" placeholder="余额">
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-2 control-label">积分</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="point_style" value="" placeholder="积分">
							</div>
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary add" type="submit">保存</button>
						</div>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="redis">
				<form class="form-horizontal form-validate11 pt-15 widthFixedForm">
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>HOST</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="host" value="" placeholder="" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>PASSWORD</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="pass" value="" placeholder="" required>
							</div>
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary add" type="submit">保存</button>
						</div>
					</div>
				</form>
			</div>
                    <div role="tabpanel" class="tab-pane fade" id="wechat">
				<form class="form-horizontal form-validate12 pt-15 widthFixedForm">
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>AppID</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="open_appid" name="open_appid" value="" placeholder="" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>AppSecrect</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="open_secrect" name="open_secrect" value="" placeholder="" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>消息加解密Key</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="open_key" name="open_key" value="" placeholder="" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>消息验证Token</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control" id="open_token" name="open_token" value="" placeholder="" required>
							</div>
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary add" type="submit">保存</button>
						</div>
					</div>
				</form>
			</div>
		</div>
<input type="hidden" id="cert" value="">
<input type="hidden" id="certkey" value="">
<input type="hidden" id="tl_cert" value="">
<input type="hidden" id="tl_certkey" value="">
<input type="hidden" id="ssl" value="">
<input type="hidden" id="sslkey" value="">
<input type="hidden" id="default_ip" value="">
<input type="hidden" id="realm_ips" value="">
<input type="hidden" id="web_status" value="">
<input type="hidden" id="real_ip" value="<?php echo $real_ip; ?>">
<input type="hidden" id="jd_sms" value="<?php echo $jd_sms; ?>">
<input type="hidden" id="config_type" value="<?php echo $config_type; ?>">
<input type="hidden" id="wx_appid" value="<?php echo $appid; ?>">
<input type="hidden" id="mobile_type" value="<?php echo $web_info['mobile_type']; ?>">

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
    require(['util'],function(util){
        $('body').on('click','.withdrawals',function(){
            var message = $("input:checkbox[name='withdrawals']:checked").map(function(index,elem) {
                return $(elem).val();
            }).get().join(',');
			var type = $(this).val();
            var obj = $(this);
			if(message){
			  var with_type = message.split(',');
                var index = with_type.indexOf(type);
                if (index > -1) {
                    with_type.splice(index, 1);
                }
                if(type==1){
			      if(with_type.indexOf("4")>=0){
                      obj.removeAttr('checked');
                      util.message('只能选择一种银行卡提现方式','danger');
				  }
			  }
			  if(type==4){
				  if(with_type.indexOf("1")>=0){
                      obj.removeAttr('checked');
                      util.message('只能选择一种银行卡提现方式','danger');
				  }
			  }
			}
			$.ajax({
                    'url':"<?php echo __URL('PLATFORM_MAIN/config/sysConfig'); ?>",
                    'type':'post',
                    'data':{
                        'config_type':'payment'
                    },
                    success:function(data){
                        if(data['tl_set']['value']['tl_tw']==0 && type==1){
                            obj.removeAttr('checked');
							util.alert('商城还没有配置银行卡，请先配置。', function () {
								$('.payment').tab('show');
								loading('payment');
							})
                        }
                        if(type==2){
                            if(data['wx_set']['is_use'] == 0 || data['wx_set']['value']['wx_tw']==0){
                                obj.removeAttr('checked');
                                util.alert('商城还没有配置微信，请先配置。', function () {
                                    $('.payment').tab('show');
                                    loading('payment');
                                })
                            }
						}
                        if(type==3){
                            if(data['ali_set']['is_use'] == 0){
                                obj.removeAttr('checked');
                                util.alert('商城还没有配置支付宝，请先配置。', function () {
                                    $('.payment').tab('show');
                                    loading('payment');
                                })
                            }
						}
                    }
                })
        })
        // 选择链接
        $('.link_set').unbind('click').click(function(){
            var _this = $(this);
            var elm = _this.parents('.input-group-btn').parents('.item').find('input');
            util.linksDialog(function(data){
               var  real_ip = $("#real_ip").val();
                elm.val(real_ip+'/wap'+data.params);
            })
        })
        $('.v-nav-tabs').on('click',"li", function () {
            var config_type = $(this).children('a').data('type');
            loading(config_type);
        });
        loading('basic');
        function selectConfig() {
            var type = $('body').find("input[name='type']:checked").val();
            if(type=='2'){
                $('.J-jingdong').show();
                $('.J-aliyun').hide();
            }else{
                $('.J-aliyun').show();
                $('.J-jingdong').hide();
            }
        }
        function loading(config_type){
            if($("#config_type").val()){
                config_type = $("#config_type").val();
                if(config_type == 'payment'){
                    $('.payment').tab('show');
                }
            }
            $.ajax({
                type:"post",
                url : "<?php echo __URL('PLATFORM_MAIN/config/sysConfig'); ?>",
                async : true,
                data : {
                    "config_type" : config_type
                },
                success : function(data) {
                    if(config_type=='storageconfig'){
                        if(data['type']==1){
                            $("input[name='storage_type'][value='1']").prop('checked',true);
                            $('.J-alioss').hide();
						}else if(data['type']==2){
                            $("input[name='storage_type'][value='2']").prop('checked',true);
                            var html = '';
                            html += '<option value="0">请选择</option>';
                            for(var i=0;i<data['buckets'].length;i++){
                                html +='<option value="'+data["buckets"][i]["name"]+"@@"+data["buckets"][i]["location"] +'" ';
								 if(data["buckets"][i]["name"] == data["data"]["alioss"]["Bucket"] || data["data"]["alioss"]["Bucket"] == data["buckets"][i]["name"]+"@@"+data["buckets"][i]["location"]){
                                     html += 'selected';
								 }
                                                                 
                                html +=' data-buck="'+data["buckets"][i]["location"] +'">' + data["buckets"][i]["name"]+"@@"+data["bucket_datacenter"][data['buckets'][i]["location"]]+'</option>';
                            }
                            $("#Bucket").html(html);
                            $('.J-alioss').show();
                            $('#accessKeyId').val(data['data']['alioss']['Accesskey']);
                            $("#accessKeySecret").val(data['data']['alioss']['Secretkey']);
                            $("#AliossUrl").val(data['data']['alioss']['AliossUrl']);
						}
                    }
                    if(config_type=='basic'){
                        $("#close_reason").val(data['close_reason']);
                        if(data['reg_rule']==1){
                            $("#reg_rule").prop("checked", true);
                            $(".reg_rule").show();
                        }
                        if(data['pur_rule']==1){
                            $("#pur_rule").prop("checked", true);
                            $(".pur_rule").show();
                        }
                        $("#mall_name").val(data['mall_name']);
                        $("#reg_id").val(data['reg_id']);
                        $("#pur_id").val(data['pur_id']);
                        if(data['reg_id']){
                            var htmls='';
                            htmls+='<div class="input-group"><input type="text" class="form-control select_reg" placeholder="请选择文章"  value=" 已选择：'+data['reg_title']+' "  disabled>';
                            htmls+='<span class="input-group-btn"><a href="javascript:void(0);" class="btn btn-default reg_set">选择文章</a></span>';
                            htmls+='</div><p class="help-block mb-0">需前往<a class="text-primary" href="<?php echo __URL("ADDONS_MAINquestionList"); ?>" target="_blank">帮助中心</a>发布</p>';
                            $("#reg_message").html(htmls);
                        }else{
                            var htmls='';
                            htmls+='<div class="input-group"><input type="text" class="form-control select_reg" placeholder="请选择文章"  value=""  disabled>';
                            htmls+='<span class="input-group-btn"><a href="javascript:void(0);" class="btn btn-default reg_set">选择文章</a></span>';
                            htmls+='</div><p class="help-block mb-0">需前往<a class="text-primary" href="<?php echo __URL("ADDONS_MAINquestionList"); ?>" target="_blank">帮助中心</a>发布</p>';
                            $("#reg_message").html(htmls);
                        }
                        if(data['pur_id']){
                            var htmls='';
                            htmls+='<div class="input-group"><input type="text" class="form-control select_pur" placeholder="请选择文章"  value=" 已选择：'+data['pur_title']+' "  disabled>';
                            htmls+='<span class="input-group-btn"><a href="javascript:void(0);" class="btn btn-default pur_set">选择文章</a></span>';
                            htmls+='</div><p class="help-block">需前往<a class="text-primary" href="<?php echo __URL("ADDONS_MAINquestionList"); ?>" target="_blank">帮助中心</a>发布</p>';
                            $("#shop_message").html(htmls);
                        }else{
                            var htmls='';
                            htmls+='<div class="input-group"><input type="text" class="form-control select_pur" placeholder="请选择文章"  value=""  disabled>';
                            htmls+='<span class="input-group-btn"><a href="javascript:void(0);" class="btn btn-default pur_set">选择文章</a></span>';
                            htmls+='</div><p class="help-block">需前往<a class="text-primary" href="<?php echo __URL("ADDONS_MAINquestionList"); ?>" target="_blank">帮助中心</a>发布</p>';
                            $("#shop_message").html(htmls);
                        }
                        if(data['wap_status']==1){
                            $("#waptype").prop("checked", true);
                            $('.wap_rule').show();
                        }else{
                            $('.close_rule').show();
						}
                        if(data['wap_pop']==1){
                            $("#wap_pop").prop("checked", true);
                            $(".pop_rule").show();
                        }else{
                            $(".pop_rule").hide();
                        }
                        if(data['logo']){
                            $('#wap_logo').html('<a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="'+data['logo']+'"></a>');
                        }else{
                            $('#wap_logo').html('<a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>');
                        }
                        if(data['wap_register_adv']){
                            $('#wap_register_adv').html('<a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="'+data['wap_register_adv']+'"></a>');
                        }else{
                            $('#wap_register_adv').html('<a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>');
                        }
                        $("#wap_register_jump").val(data['wap_register_jump']);
                        if(data['wap_login_adv']){
                            $('#wap_login_adv').html('<a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="'+data['wap_login_adv']+'"></a>');
                        }else{
                            $('#wap_login_adv').html('<a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>');
                        }
                        $("#wap_login_jump").val(data['wap_login_jump']);
                        if(data['wap_pop_adv']){
                            $('#wap_pop_adv').html('<a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="'+data['wap_pop_adv']+'"></a>');
                        }else{
                            $('#wap_pop_adv').html('<a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>');
                        }
                        $("#wap_pop_jump").val(data['wap_pop_jump']);
                        $("#wap_pop_rule").val(data['wap_pop_rule']);
					}
                    if(config_type=='redis'){
                        $('#host').val(data['host']);
                        $("#pass").val(data['pass']);
                    }
                    if(config_type=='wechat'){
                        $('#open_appid').val(data['open_appid']);
                        $("#open_secrect").val(data['open_secrect']);
                        $("#open_key").val(data['open_key']);
                        $("#open_token").val(data['open_token']);
                    }
                    if(config_type=='copystyle'){
                        $('#point_style').val(data['point_style']);
                        $("#balance_style").val(data['balance_style']);
                    }
                    if(config_type=='validate'){
                        if(data['pc']==1){
                            $("#switch3").prop("checked", true);
                        }
                    }
                    if(config_type=='message'){
                        if (!data['mobile_message']['value']['user_type']){
                            $("input[name='type'][value='2']").prop('checked',true);
                        }
                        $("input[name='type'][value='"+data['mobile_message']['value']['user_type']+"']").prop('checked',true);
                        selectConfig();
                        $("input[name='type']").change(function(){
                            selectConfig();
                        });
                        if (data['mobile_message']['value']['international'] == '1'){
                            $("#international").prop("checked", true);
                            $(".J-int").show();
                            if ($("input[name='type']:checked").val()=='2'){
                                $(".J-aliint").show();
                            }
                            
                        }else{
                            $(".J-int").hide();
                            if ($("input[name='type']:checked").val()=='2'){
                                $(".J-aliint").hide();
                            }
                        }
                        $('#app_key').val(data['mobile_message']['value']['appKey']);
                        $('#secret_key').val(data['mobile_message']['value']['secretKey']);
                        $('#free_sign_name').val(data['mobile_message']['value']['freeSignName']);
                        $('#alarm_num').val(data['mobile_message']['value']['alarm_num']);
                        $('#alarm_mobile').val(data['mobile_message']['value']['alarm_mobile']);
                        $('#jd_sign_name').val(data['mobile_message']['value']['jd_sign_name']);
                        $('#int_sign_name').val(data['mobile_message']['value']['int_sign_name']);
                        $('.J-remain_num').html(data['count']);
                        if(data['mobile_message']['is_use']==1){
                            $("#mobile_is_use").prop("checked", true);
                            $('.J-sms').show();
                        }else{
                            $('.J-sms').hide();
                        }
                        if(data['email_message']['is_use']==1){
                            $("#email_is_use").prop("checked", true);
                            $('.J-email').show();
                        }else{
                            $('.J-email').hide();
                        }
                        $('#email_host').val(data['email_message']['value']['email_host']);
                        $('#email_addr').val(data['email_message']['value']['email_addr']);
                        $('#email_pass').val(data['email_message']['value']['email_pass']);
                        $('#email_id').val(data['email_message']['value']['email_id']);
                        html='';
                        for(var i = 0; i < data['template_type_list'].length; i++){
                        html+='<tr>';
                        html+='<td>'+data['template_type_list'][i]['template_name']+'</td>';
                            if(data['template_type_list'][i]['notify_type']=='user'){
                               html+='<td>会员</td>';
                            }else if(data['template_type_list'][i]['notify_type']=='assistant'){
                                html+='<td>门店员工</td>';
                            }else{
                               html+='<td>商户</td>';
                            }
                            if(data['template_type_list'][i]['sms_type']==1){
                                html+='<td>验证码</td>';
                            }else if(data['template_type_list'][i]['sms_type']==2){
                                html+='<td>短信通知</td>';
                            }
					    html+='<td>';
					    html+='<div class="checkbox">';
                            if(data['template_type_list'][i]['is_sms_enable']==1){
                                html+='<a href="javascript:void(0);" class="text-success message_is_open" data-is_enable="0" data-template_code="'+data['template_type_list'][i]['template_code']+'" data-name="'+data['template_type_list'][i]['template_name']+'" data-model="sms">已开启</a><br>';
                            }else{
                                html+='<a href="javascript:void(0);" class="text-danger message_is_open"  data-is_enable="1" data-template_code="'+data['template_type_list'][i]['template_code']+'" data-name="'+data['template_type_list'][i]['template_name']+'" data-model="sms">已关闭</a><br>';
                            }
					    html+='<a href="javascript:void(0);" class="text-primary vertical-top editMsg" data-type="'+data['template_type_list'][i]['notify_type']+'" data-code="'+data['template_type_list'][i]['template_code']+'" data-id="'+data['template_type_list'][i]['type_id']+'">编辑模板</a>';

					    html+='</div>';
					    html+='</td>';
					    html+='<td>';
					    html += '<div class="checkbox">';
							if (data['template_type_list'][i]['template_type'] == 'all' || data['template_type_list'][i]['template_type'] == 'email') {
								if (data['template_type_list'][i]['is_email_enable'] == 1) {
									html += '<a href="javascript:void(0);" class="text-success message_is_open" data-is_enable="0" data-template_code="' + data['template_type_list'][i]['template_code'] + '" data-name="' + data['template_type_list'][i]['template_name'] + '" data-model="email">已开启</a><br>';
								} else {
									html += '<a href="javascript:void(0);" class="text-danger message_is_open" data-is_enable="1" data-template_code="' + data['template_type_list'][i]['template_code'] + '" data-name="' + data['template_type_list'][i]['template_name'] + '" data-model="email">已关闭</a><br>';
								}
								html += '<a href="javascript:void(0);" class="text-primary vertical-top editEmail" data-type="' + data['template_type_list'][i]['notify_type'] + '" data-code="' + data['template_type_list'][i]['template_code'] + '" data-name="' + data['template_type_list'][i]['template_name'] + '" data-id="' + data['template_type_list'][i]['type_id'] + '">编辑模板</a>';
							} else {
								html += '--'
							}

					    html+='</div>';
					    html+='</td>';
					    html+='</tr>';
				        }
                        $('#list').html(html);
                    }
                    if(config_type=='payment'){
                        if(data['ali_set']['is_use']==1){
                            $("#alipay_is_use").prop("checked", true);
                            $('.J-alipay').show();
                        }else{
                            $('.J-alipay').hide();
                        }
                        $("#ali_partnerid").val(data['ali_set']['value']['ali_partnerid']);
                        $("#ali_seller").val(data['ali_set']['value']['ali_seller']);
                        $("#ali_key").val(data['ali_set']['value']['ali_key']);
                        $("#appid").val(data['ali_set']['value']['appid']);
                        $("#ali_wap_appid").val(data['ali_set']['value']['ali_wap_appid']);
                        $("#ali_app_appid").val(data['ali_set']['value']['ali_app_appid']);
                        $("#ali_public_key").val(data['ali_set']['value']['ali_public_key']);
                        $("#ali_private_key").val(data['ali_set']['value']['ali_private_key']);
                        if(data['wx_set']['is_use']==1){
                            $("#wxpay_is_use").prop("checked", true);
                            $('.J-wxpay').show();
                        }else{
                            $('.J-wxpay').hide();
                        }
                        if(data['wx_set']['value']['wx_tw']==1){
                            $("#wxtw_is_use").prop("checked", true);
                            $('.J-wxtw').show();
                        }else{
                            $('.J-wxtw').hide();
                        }
                        if(data['b_set']['is_use']==1){
                            $("#bpay_is_use").prop("checked", true);
                            $('.J-bpay').show();
                        }else{
                            $('.J-bpay').hide();
                        }
                        if(data['d_set']['is_use']==1){
                            $("#dpay_is_use").prop("checked", true);
                            $('.J-dpay').show();
                        }else{
                            $('.J-dpay').hide();
                        }
                        if(data['eth_set']['is_use']==1){
                            $("#ethpay_is_use").prop("checked", true);
                            $('.J-ethpay').show();
                        }else{
                            $('.J-ethpay').hide();
                        }
                        if(data['eos_set']['is_use']==1){
                            $("#eospay_is_use").prop("checked", true);
                            $('.J-eospay').show();
                        }else{
                            $('.J-eospay').hide();
                        }
                        if(data['tl_set']['is_use']==1){
                            $("#tlpay_is_use").prop("checked", true);
                            $('.J-tlpay').show();
                        }else{
                            $('.J-tlpay').hide();
                        }
                        if(data['tl_set']['value']['tl_tw']==1){
                            $("#tltw_is_use").prop("checked", true);
                            $('.J-tltw').show();
                        }else{
                            $('.J-tltw').hide();
                        }
						if(data['glopay_set']['is_use']==1){
                            $("#gppay_is_use").prop("checked", true);
                        }
						if(data['glopay_set']['value']['currency'] == 'CNY'){
							$("input[name='CURRENCY']:eq(1)").attr("checked",'checked');
						}else{
							$("input[name='CURRENCY']:eq(0)").attr("checked",'checked');
						}
                        $("#tl_cusid").val(data['tl_set']['value']['tl_cusid']);
                        $("#tl_key").val(data['tl_set']['value']['tl_key']);
                        $("#tl_appid").val(data['tl_set']['value']['tl_appid']);
                        $("#tl_username").val(data['tl_set']['value']['tl_username']);
                        $("#tl_id").val(data['tl_set']['value']['tl_id']);
                        $("#tl_password").val(data['tl_set']['value']['tl_password']);
                        $(".tl_cert").val(data['tl_set']['value']['tl_public']);
                        $(".tl_certkey").val(data['tl_set']['value']['tl_private']);
                        $("#tl_cert").val(data['tl_set']['value']['tl_public']);
                        $("#tl_certkey").val(data['tl_set']['value']['tl_private']);
                        $("#APP_KEY").val(data['wx_set']['value']['appid']);
                        $("#paySignKey").val(data['wx_set']['value']['mch_key']);
                        $("#MCHID").val(data['wx_set']['value']['mch_id']);
                        $(".cert").val(data['wx_set']['value']['cert']);
                        $(".certkey").val(data['wx_set']['value']['certkey']);
                        $("#cert").val(data['wx_set']['value']['cert']);
                        $("#certkey").val(data['wx_set']['value']['certkey']);
						$("#PARTNER_CODE").val(data['glopay_set']['value']['partner_code']);
                        $("#CREDENTIAL_CODE").val(data['glopay_set']['value']['credential_code']);
                        html='';
                        for(var i = 0; i < data['pay_list'].length; i++){
                            if(data['pay_list'][i]['key']=='ETHPAY' && <?php echo $blockchain; ?>==0){
                                continue;
							}
                            if(data['pay_list'][i]['key']=='EOSPAY' && <?php echo $blockchain; ?>==0){
                                continue;
                            }
                        html+='<tr>';
                        html+='<td>';
                        html+='<div class="media">';
                        html+='<div class="media-left">';
                        html+='<img src="'+data['pay_list'][i]['logo']+'">';
                        html+='</div>';
                        html+='<div class="media-body text-left">'+data['pay_list'][i]['pay_name'];
						if(data['pay_list'][i]["key"] == "TLPAY") {
							html += '  <a href="javascript:void(0);" class="text-primary pay_bankList" onclick="return false">支持银行</a>';
						}
                        html+='<p class="p small-muted">'+data['pay_list'][i]['desc']+'</p>';
                        html+='</div>';
                        html+='</div>';
                        html+='</td>';
                        html+='<td>';
                        if(data['pay_list'][i]['is_use']==1){
                            html+='<span class="label label-success payment_is_open" data-id="'+data['pay_list'][i]['id']+'" data-is_use="0" >开启</span>';
                        }else{
                            html+='<span class="label label-danger payment_is_open" data-id="'+data['pay_list'][i]['id']+'" data-is_use="1" data-key="'+data['pay_list'][i]['key']+'">关闭</span>';
                        }
                        html+='</td>';
                        html+='<td>';
                        if(data['pay_list'][i]['key']=='WPAY'){
							html+='<a href="javascript:void(0);" class="text-primary wPay_set" onclick="return false">配置</a>';
						}
						if(data['pay_list'][i]['key']=='ALIPAY'){
							html+='<a href="javascript:void(0);" class="text-primary aPay_set" onclick="return false">配置</a>';
						}
						if(data['pay_list'][i]['key']=='BPAY'){
							html+='<a href="javascript:void(0);" class="text-primary bPay_set" onclick="return false">配置</a>';
						}
						if(data['pay_list'][i]['key']=='DPAY'){
							html+='<a href="javascript:void(0);" class="text-primary dPay_set">配置</a>';
						}
                        if(data['pay_list'][i]['key']=='TLPAY'){
                            html+='<a href="javascript:void(0);" class="text-primary tlPay_set">配置</a>';
                        }
                        if(data['pay_list'][i]['key']=='ETHPAY'){
                             html+='<a href="javascript:void(0);" class="text-primary ethPay_set">配置</a>';
						}
						if(data['pay_list'][i]['key']=='EOSPAY'){
                             html+='<a href="javascript:void(0);" class="text-primary eosPay_set">配置</a>';
						}
						if(data['pay_list'][i]['key']=='GLOPAY'){
                             html+='<a href="javascript:void(0);" class="text-primary gloPay_set" onclick="return false">配置</a>';
						}
						
						html += '</td>';
                        html += '</tr>';
						}
						$('#pay_list').html(html);

                    }
                    if(config_type=='tradeset'){
						var has_express = data['has_express'];
						if(has_express == 0) {
							$(".has_express").removeAttr('checked');
						}
                        $('#order_buy_close_time').val(data['order_buy_close_time']);
                        $("#order_auto_delivery").val(data['order_auto_delivery']);
                        $("#point_invoice_tax").val(data['point_invoice_tax']);
                        if(data['is_point']==1){
                            $("#point").prop("checked", true);
                            $(".point_rule").show();
                            $("#integral_calculation").attr('required','required');
                            $("#shopping_back_points").attr('required','required');
                            $("#point_invoice_tax").attr('required','required');
                        }else{
                            $("#integral_calculation").removeAttr('required');
                            $("#shopping_back_points").removeAttr('required');
                            $("#point_invoice_tax").removeAttr('required');
                        }
                        if(data['is_point_deduction']==1){
                            $("#point_deduction").prop("checked", true);
                            $(".point_deduction_rule").show();
                            $("#point_deduction_calculation").attr('required','required');
                            $("#point_deduction_max").attr('required','required');
                        }else{
                            $("#point_deduction_calculation").removeAttr('required');
                            $("#point_deduction_max").removeAttr('required');
                        }
                        //自动评论设置
                        if(data['is_translation']==1){
                            $("#is_translation").prop("checked", true);
                            $(".translation_rule").show();
                            $("#translation_time").attr('required','required');
                        }else{
                            $("#translation_time").removeAttr('required','required');
                        }
                        $("#translation_time").val(data['translation_time']);
                        $("#translation_text").val(data['translation_text']);

                        $("#point_deduction_calculation").val(data['point_deduction_calculation']);
                        $("#point_deduction_max").val(data['point_deduction_max']);
                        $("#order_delivery_complete_time").val(data['order_delivery_complete_time']);
                        $("#shopping_back_points").val(data['shopping_back_points']);
                        $("#integral_calculation").val(data['integral_calculation']);
                        $("#convert_rate").val(data['convert_rate']);
                        //余额转账设置
                        if(data['is_transfer']==1){
                            //选中状态
                            $("#balance_transfer").prop("checked", true);
                            $('.balance_transfer_rule').show();
                        }else{
                            $('.balance_transfer_rule').hide();
                        }
                        if(data['is_transfer_charge']==1){
                            //选中状态
                            $("#balance_transfer_charge").prop("checked", true);
                            $('.balance_transfer_charge_rule').show();
                        }else{
                            $('.balance_transfer_charge_rule').hide();
                        }
                        if(data['charge_type']==1){
                            //选中状态
                            $("input[name=charge_type]:eq(0)").attr("checked", 'checked');
                            $("#charge_input").removeClass('hide');
                            $("#charge_input1").addClass('hide');
                        }else{
                            $("input[name=charge_type]:eq(1)").attr("checked", 'checked');
                            $("#charge_input").addClass('hide');
                            $("#charge_input1").removeClass('hide');
                        }
                        $("#charge_pares").val(data['charge_pares']);
                        $("#charge_pares_min").val(data['charge_pares_min']);
                        $("#charge_pares2").val(data['charge_pares2']);
                        //余额积分转账设置
                        if(data['is_point_transfer']==1){
                            //选中状态
                            $("#point_balance_transfer").prop("checked", true);
                            $('.point_balance_transfer_rule').show();
                        }else{
                            $('.point_balance_transfer_rule').hide();
                        }
                        if(data['is_point_transfer_charge']==1){
                            //选中状态
                            $("#point_balance_transfer_charge").prop("checked", true);
                            $('.point_balance_transfer_charge_rule').show();
                        }else{
                            $('.point_balance_transfer_charge_rule').hide();
                        }
                        if(data['point_charge_type']==1){
                            //选中状态
                            $("input[name=point_charge_type]:eq(0)").attr("checked", 'checked');
                            $("#point_charge_input").removeClass('hide');
                            $("#point_charge_input1").addClass('hide');
                        }else{
                            $("input[name=point_charge_type]:eq(1)").attr("checked", 'checked');
                            $("#point_charge_input").addClass('hide');
                            $("#point_charge_input1").removeClass('hide');
                        }
                        $("#point_charge_pares").val(data['point_charge_pares']);
                        $("#point_charge_pares_min").val(data['point_charge_pares_min']);
                        $("#point_charge_pares2").val(data['point_charge_pares2']);
                    }
                    if(config_type=='returnsetting'){
                        var html = '';
                        if (data.length > 0) {
                            for (var i = 0; i < data.length; i++) {
                                html += '<tr>';
                                html += '<td>' + data[i]["consigner"] + '</td>';
                                html += '<td>' + data[i]["mobile"] + '</td>';
                                html += '<td>' + data[i]["province_name"] + data[i]["city_name"] + data[i]["dictrict_name"] + '</td>';
                                html += '<td>' + data[i]["address"] + '</td>';
                                html += data[i]["is_default"]==1 ? '<td><span class="label label-success">是</span></td>' : '<td><span class="label label-danger">否</span></td>';
                                html += '<td class="operationLeft fs-0">';
                                html += '<a class="btn-operation" href="javascript:addressEdit(' + data[i]["return_id"] + ');">编辑</a>';
                                html += '<a class="btn-operation address_return_delete text-red1" href="javascript:void(0);" data-return_id="' + data[i]["return_id"] + '">删除</a>';
                                html += '</td>';
                                html += '</tr>';
                            }
                        } else {
                            html += '<tr><td class="h-200" colspan="6">暂无数据记录</td></tr>';
                        }
                        $("#address_list").html(html);
                    }
                    if(config_type=='withdrawalset'){
                        var withdraw_message = data['value']['withdraw_message'];
                        withdraw_message = withdraw_message.split(',');
                        for(var i = 0; i < withdraw_message.length;i++){
                            $('[name="withdrawals"][value="'+withdraw_message[i]+'"]').prop("checked", true);
                        }
                        $('#cash_min').val(data['value']['withdraw_cash_min']);
                        $("#poundage").val(data['value']['withdraw_poundage']);
                        $("#member_poundage").val(data['value']['member_withdraw_poundage']);
                        if(data['is_use']==1){
                            $("#switch").prop("checked", true);
                            $('.withdraw_rule').show();
                        }
                        if(data['value']['is_examine']==1){
                            $("#is_examine").prop("checked", true);
                        }
                        if(data['value']['make_money']==1){
                            $("#make_money").prop("checked", true);
                        }
                        $("#withdrawalsbegin").val(data['value']['withdrawals_begin']);
                        $("#withdrawalsend").val(data['value']['withdrawals_end']);
                    }
                    if(config_type=='copystyle'){
                        $('#point_style').val(data['point_style']);
                        $("#balance_style").val(data['balance_style']);
                    }
                }
            });
        }
	//余额转账设置 
        $('#balance_transfer').on('click', function () {
            if($(this).is(':checked')){
                $('.balance_transfer_rule').show();
            }else{
                $('.balance_transfer_rule').hide();
            }
        });
        $('#balance_transfer_charge').on('click', function () {
            if($(this).is(':checked')){
                $('.balance_transfer_charge_rule').show();
            }else{
                $('.balance_transfer_charge_rule').hide();
            }
        });
        $('input[name=charge_type]').click(function () {
            if ($(this).is(':checked') && $("input[name='charge_type']:checked").val() == 1) {
                $("#charge_input").removeClass('hide');
                $("#charge_input1").addClass('hide');
            }else if($(this).is(':checked') && $("input[name='charge_type']:checked").val() == 2){
                $("#charge_input").addClass('hide');
                $("#charge_input1").removeClass('hide');
            }
        })
        //余额积分转账
        $('#point_balance_transfer').on('click', function () {
            if($(this).is(':checked')){
                $('.point_balance_transfer_rule').show();
            }else{
                $('.point_balance_transfer_rule').hide();
            }
        });
        $('#point_balance_transfer_charge').on('click', function () {
            if($(this).is(':checked')){
                $('.point_balance_transfer_charge_rule').show();
            }else{
                $('.point_balance_transfer_charge_rule').hide();
            }
        });
        $('input[name=point_charge_type]').click(function () {
            if ($(this).is(':checked') && $("input[name='point_charge_type']:checked").val() == 1) {
                $("#point_charge_input").removeClass('hide');
                $("#point_charge_input1").addClass('hide');
            }else if($(this).is(':checked') && $("input[name='point_charge_type']:checked").val() == 2){
                $("#point_charge_input").addClass('hide');
                $("#point_charge_input1").removeClass('hide');
            }
        })
        //自动评论
        $('#is_translation').on('click', function () {
            if($(this).is(':checked')){
                $('.translation_rule').show();
                $("#translation_time").attr('required','required');
            }else{
                $('.translation_rule').hide();
                $("#translation_time").removeAttr('required');
            }
        });
        $("input[name='storage_type']").on('change',function(){
            var type = $("input[name='storage_type']:checked").val();
            if(type==='1'){
                $('.J-alioss').hide();
                $(".J-alioss input").removeAttr('required');
            }else{
                $('.J-alioss').show();
                $(".J-alioss input").attr('required','required');
            }
        });
        $('#accessKeySecret').on('change',function(){
            var Accesskey = $("#accessKeyId").val();
            var Secretkey = $("#accessKeySecret").val();
            if(!Accesskey){
                util.message('请填写accessKeyId', 'danger');
                return false;
            }
            if(!Secretkey){
                util.message('accessKeySecret', 'danger');
                return false;
            }
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/system/getBuckets'); ?>",
                async: true,
                data: {
                    "Accesskey": Accesskey,
                    'Secretkey': Secretkey
                },
                success: function (data) {
                    if(data['code']<=0){
                        util.message(data['message'],'danger');
                        return false;
                    }else{
                        var html='<option value="">请选择</option>';
                        if (data['data'].length > 0) {
                            for (var i = 0; i < data["data"].length; i++) {
                                html += '<option value="'+data['data'][i]['name']+'@@'+data['data'][i]['location']+'">'+data['data'][i]['loca_name']+'</option>';
                            }
                            $('#Bucket').html(html);
                        }
                    }
                }
            });
        });
        /**
         * 保存保存数据
         */
        util.validate($('.form-validate7'), function () {
            var Accesskey = $("#accessKeyId").val();
            var Secretkey = $("#accessKeySecret").val();
            var Bucket = $("#Bucket").val();
            var AliossUrl = $("#AliossUrl").val();
            var type = $("input[name='storage_type']:checked").val();
            var location = $("#Bucket option:selected").data('buck');
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/system/setstorageconfig'); ?>",
                async: true,
                data: {
                    "Accesskey": Accesskey,
                    'Secretkey': Secretkey,
                    "Bucket": Bucket,
                    "AliossUrl": AliossUrl,
                    "type": type,
                    "location": location
                },
                success: function (data) {
                    if (data['code'] > 0)
                    {
                        util.message(data["message"],'success',loading('storageconfig'));
                    } else {
                        util.message(data["message"], 'danger');
                        return false;
                    }
                }
            });
        });

       $('#waptype').on('click', function () {
            if($(this).is(':checked')){
                $(this).attr('checked', false);
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
                                                $('#waptype').attr('checked', false);
											}else{
                                                $('#waptype').attr('checked', true);
                                                $('.wap_rule').show();
                                                $('.close_rule').hide();
											}
										}
                                    })
								})
							})
						}else{
                            $('#waptype').attr('checked', true);
                            $('.wap_rule').show();
                            $('.close_rule').hide();
						}
					}

				})
            }else{
                $('.wap_rule').hide();
                $('.close_rule').show();
            }
        });
        $('#wap_pop').on('click', function () {
            if($(this).is(':checked')){
                $('.pop_rule').show();
			}else{
                $('.pop_rule').hide();
			}
        });
        $('#point_deduction').on('click', function () {
            if($(this).is(':checked')){
                $('.point_deduction_rule').show();
                $("#point_deduction_calculation").attr('required','required');
                $("#point_deduction_max").attr('required','required');
            }else{
                $('.point_deduction_rule').hide();
                $("#point_deduction_calculation").removeAttr('required');
                $("#point_deduction_max").removeAttr('required');
            }
        });
        $('#point').on('click', function () {
            if($(this).is(':checked')){
                $('.point_rule').show();
                $("#order_buy_close_time").attr('required','required');
                $("#order_auto_delivery").attr('required','required');
                $("#point_invoice_tax").attr('required','required');
                $("#integral_calculation").attr('required','required');
                $("#shopping_back_points").attr('required','required');
            }else{
                $('.point_rule').hide();
                $("#order_buy_close_time").removeAttr('required');
                $("#order_auto_delivery").removeAttr('required');
                $("#point_invoice_tax").removeAttr('required');
                $("#integral_calculation").removeAttr('required');
                $("#shopping_back_points").removeAttr('required');
            }
        });
        $('#reg_rule').on('click', function () {
            if($(this).is(':checked')){
                $('.reg_rule').show();
            }else{
                $('.reg_rule').hide();
            }
        });
        $('#pur_rule').on('click', function () {
            if($(this).is(':checked')){
                $('.pur_rule').show();
            }else{
                $('.pur_rule').hide();
            }
        });
        $('#switch').on('click', function () {
            if($(this).is(':checked')){
                $('.withdraw_rule').show();
            }else{
                $('.withdraw_rule').hide();
            }
        });
        $('body').on('click', '#mobile_is_use', function () {
            if($(this).is(':checked')){
                $('.J-sms').show();
            }else{
                $('.J-sms').hide();
            }
        });
        $('body').on('click', '#email_is_use', function () {
            if($(this).is(':checked')){
                $('.J-email').show();
            }else{
                $('.J-email').hide();
            }
        });
        $('body').on('click', '#alipay_is_use', function () {
            if($(this).is(':checked')){
                $('.J-alipay').show();
            }else{
                $('.J-alipay').hide();
            }
        });
        $('body').on('click', '#wxpay_is_use', function () {
            if($(this).is(':checked')){
                $('.J-wxpay').show();
            }else{
                $('.J-wxpay').hide();
            }
        });
        $('body').on('click', '#wxtw_is_use', function () {
            if($(this).is(':checked')){
                $('.J-wxtw').show();
            }else{
                $('.J-wxtw').hide();
            }
        });
        $('body').on('click', '#tlpay_is_use', function () {
            if($(this).is(':checked')){
                $('.J-tlpay').show();
				$('#tltw_is_use').click();
            }else{
                $('.J-tlpay').hide();
				$('#tltw_is_use').click();
            }
        });
        $('body').on('click', '#tltw_is_use', function () {
            if($(this).is(':checked')){
                $('.J-tltw').show();
            }else{
                $('.J-tltw').hide();
            }
        });
        $('body').on('click', '#bpay_is_use', function () {
            if($(this).is(':checked')){
                $('.J-bpay').show();
            }else{
                $('.J-bpay').hide();
            }
        });
        $('body').on('click','.reg_set', function () {
            var url = "<?php echo __URL('PLATFORM_MAIN/system/selectQuestionList'); ?>";
            util.confirm('选择文章','url:'+url, function () {
                var data = this.$content.find('.cms_val').val();
                var id = this.$content.find('.selectCms_id').val();
                $("#reg_id").val(id);
                $(".select_reg").val('指定文章：'+data);
            });
        });
        $('body').on('click','.pur_set', function () {
            var url = "<?php echo __URL('PLATFORM_MAIN/system/selectQuestionList'); ?>";
            util.confirm('选择文章','url:'+url, function () {
                var data = this.$content.find('.cms_val').val();
                var id = this.$content.find('.selectCms_id').val();
                $("#pur_id").val(id);
                $(".select_pur").val('指定文章：'+data);
            });
        });

        //提现设置
        util.validate($('.form-validate6'),function(form){
            if($('#switch').is(':checked')){
                var is_use =1;
            }
            if($('#is_examine').is(':checked')){
                is_examine =1;
            }else{
                is_examine =2;
			}
            if($('#make_money').is(':checked')){
                 make_moneys =1;
            }else{
                 make_moneys =2;
            }
            var withdrawals_begin = $("input[name='withdrawalsbegin']").val();
            var withdrawals_end = $("input[name='withdrawalsend']").val();
            var cash_min = $("#cash_min").val();
            var poundage = $("#poundage").val();
            var member_poundage = $("#member_poundage").val();
            var message = $("input:checkbox[name='withdrawals']:checked").map(function(index,elem) {
                return $(elem).val();
            }).get().join(',');
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/config/memberWithdrawSetting'); ?>",
                data : {
                    'cash_min' : cash_min,
                    'member_poundage' : member_poundage,
                    'poundage' : poundage,
                    'is_use' : is_use,
                    'make_money' : make_moneys,
                    'is_examine' : is_examine,
                    'message' : message,
                    'withdrawals_begin' : withdrawals_begin,
                    'withdrawals_end' : withdrawals_end
                },
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success', loading('withdrawalset'));
                    } else {
                        util.message(data["message"],'danger')
                    }
                }
            });
        });
        //商家地址设置
        var flag5 = false;
        util.validate($('.form-validate5'),function(form){
        	var return_id = $("#return_id").val();
            var consigner = $("#return_consigner").val();
            var mobile = $("#return_mobile").val();
            var province = $("#return_provinces").val();
            var city = $("#return_cities").val();
            var district = $("#return_districts").val();
            var address = $("#return_address").val();
            var zip_code = $("#return_zip_code").val();
            var is_default = $('input[name=return_is_default]:checked').val();
            if(flag5){
                return false;
            }
            flag5 = true;
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/config/returnSetting'); ?>",
                data: {
                	'return_id' : return_id,
                	'consigner' : consigner,
                    'mobile' : mobile,
                    'province' : province,
                    'city': city,
                    'district' : district,
                    'address': address,
                    'zip_code': zip_code,
                    'is_default' : is_default
                },
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success', function () {
                        	loading('returnsetting');
                        	$('#returnsetting_list').removeClass('hide');
                        	$('#returnsetting_edit').addClass('hide');
                        	flag5 = false;
   	                 	});
                    } else {
                        util.message(data["message"],'danger', function () {
                        	flag5 = false;
   	                 	});
                    }
                }
            });
        });
        //交易设置
        util.validate($('.form-validate4'),function(form){
			var has_express = $("input:checkbox[name='has_express']:checked").val() ? $("input:checkbox[name='has_express']:checked").val() : 0;
            var order_delivery_complete_time = $('#order_delivery_complete_time').val();//订单自动完成时间
            var order_buy_close_time = $('#order_buy_close_time').val();//订单自动关闭时间
            var order_auto_delivery = $("#order_auto_delivery").val();//自动收货时间
            var shopping_back_points = $("#shopping_back_points").val();//购物返积分节点
            var point_invoice_tax = $("#point_invoice_tax").val();//购物返积分比率
            var integral_calculation = $("#integral_calculation").val();//积分计算方式
            var convert_rate = $("#convert_rate").val();//积分折扣
            
            var point_deduction_calculation = $("#point_deduction_calculation").val();//积分折扣计算方式
            var point_deduction_max = $("#point_deduction_max").val();//积分最大抵扣
            if($("#point").is(":checked")){  
                var  is_point =1;//开启购物返积分
            }
            if($("#point_deduction").is(":checked")){
                var is_point_deduction = 1;//开启积分抵扣
            }else{
            	var is_point_deduction = 0;
            }
            //获取自动评论设置
            if($("#is_translation").is(":checked")){
                var is_translation = 1;//开启自动评论
            }else{
            	var is_translation = 0;
            }
            var translation_time = $("#translation_time").val();//自动评论节点
            var translation_text = $("#translation_text").val();//自动评论节点
            //获取余额转账设置
            if($("#balance_transfer").is(":checked")){
                var is_transfer = 1;//开启余额转账
            }else{
            	var is_transfer = 0;
            }
            if($("#balance_transfer_charge").is(":checked")){
                var is_transfer_charge = 1;//开启余额转账手续费
            }else{
            	var is_transfer_charge = 0;
            }
            var charge_type = $("input[name='charge_type']:checked").val()//手续费类型
            var charge_pares = $("#charge_pares").val()//手续费比例
            var charge_pares_min = $("#charge_pares_min").val()//手续费最低
            var charge_pares2 = $("#charge_pares2").val()//手续费固定
            //获取余额积分转账设置
            if($("#point_balance_transfer").is(":checked")){
                var is_point_transfer = 1;//开启余额转账
            }else{
            	var is_point_transfer = 0;
            }
            if($("#point_balance_transfer_charge").is(":checked")){
                var is_point_transfer_charge = 1;//开启余额转账手续费
            }else{
            	var is_point_transfer_charge = 0;
            }
            var point_charge_type = $("input[name='point_charge_type']:checked").val()//手续费类型
            var point_charge_pares = $("#point_charge_pares").val()//手续费比例
            var point_charge_pares_min = $("#point_charge_pares_min").val()//手续费最低
            var point_charge_pares2 = $("#point_charge_pares2").val()//手续费固定
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/config/shopSet'); ?>",
                data: {
					"has_express": has_express,
                    "order_delivery_complete_time": order_delivery_complete_time,
                    "order_buy_close_time": order_buy_close_time,
                    "order_auto_delivery": order_auto_delivery,
                    "convert_rate": convert_rate,
                    "shopping_back_points": shopping_back_points,
                    "is_point": is_point,
                    "integral_calculation": integral_calculation,
                    "point_invoice_tax": point_invoice_tax,
                    "is_point_deduction": is_point_deduction,
                    "point_deduction_calculation": point_deduction_calculation,
                    "point_deduction_max": point_deduction_max,
                    "is_translation": is_translation,
                    "translation_time": translation_time,
                    "translation_text": translation_text,
                    
                    "is_transfer": is_transfer,
                    "is_transfer_charge": is_transfer_charge,
                    "charge_type": charge_type,
                    "charge_pares": charge_pares,
                    "charge_pares_min": charge_pares_min,
                    "charge_pares2": charge_pares2, 

                    "is_point_transfer": is_point_transfer,
                    "is_point_transfer_charge": is_point_transfer_charge,
                    "point_charge_type": point_charge_type,
                    "point_charge_pares": point_charge_pares,
                    "point_charge_pares_min": point_charge_pares_min,
                    "point_charge_pares2": point_charge_pares2,
                },
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success', loading('tradeset'));
                    } else {
                        util.message(data["message"],'danger')
                    }
                }
            });
        });
        //基本设置
        util.validate($('.form-validate1'),function(form){
            var reg_id = $("#reg_id").val();
            var pur_id = $("#pur_id").val();
            if($("#waptype").is(":checked")){
                var wap_status = 1;
            }else{
                var wap_status = 0;
            }
            if($("#wap_pop").is(":checked")){
                var wap_pop = 1;
            }
            if($("#reg_rule").is(":checked")){
                var reg_rule = 1;
            }
            if($("#pur_rule").is(":checked")){
                var pur_rule = 1;
            }
            var wap_logo = $("#wap_logo").find('img').attr('src');
            var wap_register_adv = $("#wap_register_adv").find('img').attr('src');
            var wap_register_jump = $("#wap_register_jump").val();
            var wap_login_adv = $("#wap_login_adv").find('img').attr('src');
            var wap_login_jump = $("#wap_login_jump").val();
            var wap_pop_adv = $("#wap_pop_adv").find('img').attr('src');
            var wap_pop_jump = $("#wap_pop_jump").val();
            var wap_pop_rule = $("#wap_pop_rule").val();
            var mall_name = $("#mall_name").val();
            var close_reason = $("#close_reason").val();
            $.ajax({
                type:"post",
                url : "<?php echo __URL('PLATFORM_MAIN/config/webConfig'); ?>",
                async : true,
                data : {
                    'mall_name':mall_name,
                    'logo':wap_logo,
                    'reg_id':reg_id,
                    'pur_id':pur_id,
                    'reg_rule':reg_rule,
                    'pur_rule':pur_rule,
                    'close_reason':close_reason,
                    'wap_status' : wap_status,
                    'wap_register_adv' : wap_register_adv,
                    'wap_register_jump' : wap_register_jump,
                    'wap_login_adv' : wap_login_adv,
                    'wap_login_jump' : wap_login_jump,
                    'wap_pop' : wap_pop,
                    'wap_pop_adv' : wap_pop_adv,
                    'wap_pop_jump' : wap_pop_jump,
                    'wap_pop_rule' : wap_pop_rule
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',loading('basic'));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        });

        //验证码设置
        $('.code_set').on('click',function(){
            if($("#switch3").is(":checked")){
                var pcCode = 1;
            }else{
                var pcCode = 0;
            }
            $.ajax({
                type:"post",
                url:"<?php echo __URL('PLATFORM_MAIN/config/codeConfig'); ?>",
                data:{
                    'pcCode' : pcCode
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',loading('validate'));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        });
        //短信配置
        $('.messageConfig').on('click',function(){
            var jd_sms = $('#jd_sms').val();
            var mobile_type = $('#mobile_type').val();
            var html = '<form class="form-horizontal padding-15" id="messageConfig">';
            html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="mobile_is_use"><label for="mobile_is_use" class=""></label></div></div></div>';
            html += '<div class="J-sms" style="display:none;">';
        html += '<div class="form-group"><label class="col-md-3 control-label">短信平台</label><div class="col-md-8">';
            if(jd_sms > 0){
                html+='<label class="radio-inline"><input type="radio" name="type" value="2">团大人短信</label>';
            }
            html+='<label class="radio-inline"><input type="radio" name="type" value="1">阿里云</label><label class="radio-inline"><input type="radio" name="type" value="3">阿里大于</label><p class="help-block mb-0">团大人短信平台充值短信即可使用，阿里云与阿里大于短信平台需要前往阿里云注册账号并购买短信业务。</p></div></div>';
            html += '<div class="J-jingdong">';
            html += '<div class="form-group"><label class="col-md-3 control-label">剩余数量</label><div class="col-md-8"><div class="input-group"><span class="J-remain_num" style="line-height:30px;color:red">0</span><span class="input-group-btn"><a href="' + __URL('PLATFORM_MAIN/Addonslist/topUpBalance') + '" target="_blank" class="btn btn-default">充值</a></span></div><p class="help-block mb-0">短信剩余可发送数量</p></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>短信签名</label><div class="col-md-8"><input type="text" class="form-control" id="jd_sign_name" maxlength="8" value=""><div class="mb-0 help-block">请输入长度2-8位的短信签名，不允许纯数字、标点符号、空格与带测试字样，一般签名使用“公司名称”、“品牌名称”、“商城名称”等</div></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>短信警报数量</label><div class="col-md-8"><input type="text" class="form-control" id="alarm_num" value=""><p class="help-block">0或空则不警报</p></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>警报通知手机</label><div class="col-md-8"><input type="text" class="form-control" id="alarm_mobile" value=""><p class="help-block">当短信数量到达警报数时，系统会给该手机发送一条通知短信。</p></div></div>';   
    
        html+='</div>';    
           
            html += '<div class="form-group J-aliyun J-aliint"><label class="col-md-3 control-label"><span class="text-bright">*</span>accessKeyId</label><div class="col-md-8"><input type="text" class="form-control" id="app_key" value=""></div></div>';
            html += '<div class="form-group J-aliyun J-aliint"><label class="col-md-3 control-label"><span class="text-bright">*</span>accessKeySecret</label><div class="col-md-8"><input type="text" class="form-control" id="secret_key" value=""></div></div>';
            html += '<div class="form-group J-aliyun"><label class="col-md-3 control-label"><span class="text-bright">*</span>短信签名</label><div class="col-md-8"><input type="text" class="form-control" id="free_sign_name" value="" ></div></div>';
        if(mobile_type){
                html += '<div class="form-group"><label class="col-md-3 control-label">国际短信</label><div class="col-md-5"><div class="switch-inline"><input type="checkbox" id="international"><label for="international" class=""></label></div><p class="help-block">选择“国际手机号码”账号体系的客户需要配置国际短信，目前国际短信暂时只支持阿里云短息，下方配置为阿里云短信的配置。</p></div></div>';

                html += '<div class="form-group J-int"><label class="col-md-3 control-label"><span class="text-bright">*</span>国际短信签名</label><div class="col-md-8"><input type="text" class="form-control" id="int_sign_name" value="" ></div></div>';
            }      
        html += '</div>';
            
            html += '</form>';
            loading('message');
            
            util.confirm('短信配置',html,function(){
                if(this.$content.find('#mobile_is_use').is(':checked')){
                    var is_use =1;
                }
                var international = 0;
                if(this.$content.find('#international').is(':checked')){
                    international =1;
                }
                var user_type = this.$content.find("input[name='type']:checked").val();
                var app_key = this.$content.find('#app_key').val();
                var secret_key = this.$content.find('#secret_key').val();
                var free_sign_name = this.$content.find('#free_sign_name').val();
                var alarm_num = this.$content.find('#alarm_num').val();
                var alarm_mobile = this.$content.find('#alarm_mobile').val();
                var jd_sign_name = this.$content.find('#jd_sign_name').val();
                var int_sign_name = this.$content.find('#int_sign_name').val();

                if(is_use == 1){
                if(user_type !== '2'){
                    if(app_key==''){
                        util.message('请填写accessKeyId','danger');
                        this.$content.find('#app_key').focus();
                        return false;
                                    }
                    if(secret_key==''){
                        util.message('请填写accessKeySecret','danger');
                        this.$content.find('#secret_key').focus();
                        return false;
                    }
                    if(free_sign_name==''){
                        util.message('请填写短信签名','danger');
                        this.$content.find('#free_sign_name').focus();
                        return false;
                    }

                    var reg1=/^\d{1,}$/;
                    if(reg1.test(free_sign_name)){
                        util.message('短信签名不能为纯数字','danger');
                        this.$content.find('#jd_sign_name').focus();
                        return false;
                    }
                    var reg2=/[\u3002|\uff1f|\uff01|\uff0c|\u3001|\uff1b|\uff1a|\u201c|\u201d|\u2018|\u2019|\uff08|\uff09|\u300a|\u300b|\u3008|\u3009|\u3010|\u3011|\u300e|\u300f|\u300c|\u300d|\ufe43|\ufe44|\u3014|\u3015|\u2026|\u2014|\uff5e|\ufe4f|\uffe5]/;
                    var reg3=/[\x21-\x2f\x3a-\x40\x5b-\x60\x7B-\x7F]/;
                    if(reg2.test(free_sign_name) || reg3.test(free_sign_name) ||free_sign_name.indexOf("·")>=0){
                        util.message('短信签名不能有标点符号','danger');
                        this.$content.find('#jd_sign_name').focus();
                        return false;
                    }
                    if(free_sign_name.indexOf(" ")>=0){
                        util.message('短信签名不能有空格','danger');
                        this.$content.find('#jd_sign_name').focus();
                        return false;
                    }
                    if(free_sign_name.length<2 || free_sign_name.length >12){
                        util.message('短信签名长度为2-12位','danger');
                        this.$content.find('#jd_sign_name').focus();
                        return false;
                    }
                    if(free_sign_name.indexOf("测试")>=0){
                        util.message('短信签名不能带有“测试”字样','danger');
                        this.$content.find('#jd_sign_name').focus();
                        return false;
                    }



                }else{
                    if(jd_sign_name==''){
                        util.message('请填写短信签名','danger');
                        this.$content.find('#jd_sign_name').focus();
                        return false;
                    }
                    var reg1=/^\d{1,}$/;
                    if(reg1.test(jd_sign_name)){
                        util.message('短信签名不能为纯数字','danger');
                        this.$content.find('#jd_sign_name').focus();
                        return false;
                    }
                    var reg2=/[\u3002|\uff1f|\uff01|\uff0c|\u3001|\uff1b|\uff1a|\u201c|\u201d|\u2018|\u2019|\uff08|\uff09|\u300a|\u300b|\u3008|\u3009|\u3010|\u3011|\u300e|\u300f|\u300c|\u300d|\ufe43|\ufe44|\u3014|\u3015|\u2026|\u2014|\uff5e|\ufe4f|\uffe5]/;
                    var reg3=/[\x21-\x2f\x3a-\x40\x5b-\x60\x7B-\x7F]/;
                    if(reg2.test(jd_sign_name) || reg3.test(jd_sign_name) ||jd_sign_name.indexOf("·")>=0){
                        util.message('短信签名不能有标点符号','danger');
                        this.$content.find('#jd_sign_name').focus();
                        return false;
                    }
                    if(jd_sign_name.indexOf(" ")>=0){
                        util.message('短信签名不能有空格','danger');
                        this.$content.find('#jd_sign_name').focus();
                        return false;
                    }
                    if(jd_sign_name.length<2 || jd_sign_name.length >12){
                        util.message('短信签名长度为2-12位','danger');
                        this.$content.find('#jd_sign_name').focus();
                        return false;
                    }
                    if(jd_sign_name.indexOf("测试")>=0){
                        util.message('短信签名不能带有“测试”字样','danger');
                        this.$content.find('#jd_sign_name').focus();
                        return false;
                    }


                    if(alarm_num==''){
                        util.message('请填写短信警报数量','danger');
                        this.$content.find('#alarm_num').focus();
                        return false;
                                    }
                    if(alarm_mobile==''){
                        util.message('请填写警报通知手机','danger');
                        this.$content.find('#alarm_mobile').focus();
                        return false;
                    }
                    if(international == '1' && app_key==''){
                        util.message('请填写accessKeyId','danger');
                        this.$content.find('#app_key').focus();
                        return false;
                    }
                    if(international == '1' && secret_key==''){
                        util.message('请填写accessKeySecret','danger');
                        this.$content.find('#secret_key').focus();
                        return false;
                    }
                    
                }
                if(international == '1' && int_sign_name==''){
                    util.message('请填写国际短信签名','danger');
                    this.$content.find('#int_sign_name').focus();
                    return false;
                }
            }

                $.ajax({
                    type:"post",
                    url:"<?php echo __URL('PLATFORM_MAIN/config/setMobileMessage'); ?>",
                    data:{
                        'is_use':is_use,
                        'app_key':app_key,
                        'secret_key':secret_key,
                        'free_sign_name':free_sign_name,
                        'user_type':user_type,
                        'alarm_num':alarm_num,
                        'alarm_mobile':alarm_mobile,
                        'jd_sign_name':jd_sign_name,
                        'international':international,
                        'int_sign_name':int_sign_name
                    },
                    async:true,
                    success:function (data) {
                        if (data["code"] > 0) {
                            util.message( data["message"],'success',loading('message'));
                        }else{
                            util.message( data["message"],'danger');
                        }
                    }
                });

            })
        })
        //邮箱配置
        $('.emailConfig').on('click',function(){
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="email_is_use" ><label for="email_is_use" class=""></label></div></div></div>';
            html+= '<div class="J-email" style="display:none;">';    
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>发信人邮件地址</label><div class="col-md-8"><input type="text" class="form-control" id="email_addr" value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>SMTP 服务器</label><div class="col-md-8"><input type="text" class="form-control" id="email_host" value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>SMTP 身份验证用户名</label><div class="col-md-8"><input type="text" class="form-control" id="email_id" value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>SMTP 身份验证码</label><div class="col-md-8"><input type="text" class="form-control" id="email_pass" value=""></div></div>';
            html+='</div>';    
            html += '</form>';
            loading('message');
            util.confirm('邮箱配置',html,function(){
                if(this.$content.find('#email_is_use').is(':checked')){
                    var is_use =1;
                }
                var email_host = this.$content.find('#email_host').val();
                var email_addr = this.$content.find('#email_addr').val();
                var email_pass = this.$content.find('#email_pass').val();
                var email_id = this.$content.find('#email_id').val();
                if(is_use == 1){
                    if(email_host==''){
                        util.message('请填写SMTP 服务器','danger');
                        this.$content.find('#email_host').focus();
                        return false;
                    }
                    if(email_addr==''){
                        util.message('请填写发信人邮件地址','danger');
                        this.$content.find('#email_addr').focus();
                        return false;
                    }
                    if(email_pass==''){
                        util.message('请填写SMTP 身份验证用户名','danger');
                        this.$content.find('#email_pass').focus();
                        return false;
                    }
                    if(email_id==''){
                        util.message('SMTP 身份验证码','danger');
                        this.$content.find('#email_id').focus();
                        return false;
                    }
                }
                $.ajax({
                    type:"post",
                    url:"<?php echo __URL('PLATFORM_MAIN/config/setEmailMessage'); ?>",
                    data:{
                        'is_use':is_use,
                        'email_host':email_host,
                        'email_addr':email_addr,
                        'email_id':email_id,
                        'email_pass':email_pass
                    },
                    async:true,
                    success:function (data) {
                        if (data["code"] > 0) {
                            util.message( data["message"],'success',loading('message'));
                        }else{
                            util.message( data["message"],'danger');
                        }
                    }
                });
            })
        })
        //编辑短信模板
        $('body').on('click','.editMsg',function(event){
            var id = $(this).data('id');
            var notify_type = $(this).data('type');
            var template_code = $(this).data('code');
            $.ajax({
                type:"post",
                url:"<?php echo __URL('PLATFORM_MAIN/config/notifySmsTemplate'); ?>",
                data:{
                    'id':id,
					'notify_type':notify_type,
					'template_code':template_code
                },
                async:true,
                success:function (data) {
                    var name = data['template_name'];
                    var list = data['list'];
                    var html = '<form class="form-horizontal padding-15" id="">';
                    html += '<input type="hidden" id="notify_type" value="'+notify_type+'">';
                    html += '<input type="hidden" id="template_code" value="'+template_code+'">';
                    if(data['is_enable']==1){
                        html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="sms_is_enable" checked ><label for="sms_is_enable" class=""></label></div>';
                    }else{
                        html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="sms_is_enable" ><label for="sms_is_enable" class=""></label></div>';
                    }
                    html += '</div></div>';
                    if(data['message'] != '2'){
                        html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>模版ID</label><div class="col-md-8"><input type="text" class="form-control" id="template_title" value="'+data['template_title']+'" ></div></div>';
                    }
                    if(data['international'] == '1'){
                        html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>国际短信模版ID</label><div class="col-md-8"><input type="text" class="form-control" id="int_template_title" value="'+data['int_template_title']+'" ></div></div>';
                    }
                    // html += '<div class="form-group"><label class="col-md-3 control-label">可用变量</label><div class="col-md-8">' ;
                    // for (var i = 0; i < list.length; i++) {
                    //     if(i+1==list.length){
                    //         html += list[i]['item_name'] +':'+list[i]['replace_name'];
                    //     }else{
                    //         html += list[i]['item_name'] +':'+list[i]['replace_name']+'，';
                    //     }
                        
                    // }
                    // html +=	'</div></div>';
                    html += '<div class="form-group">'+
                    '<label class="col-md-3 control-label"><span class="text-bright"></span>示例</label>'+
                    '<div class="col-md-8">'+
                    '<div class="flex">'+
                    '<textarea disabled class="form-control bbrr0" rows="8" id="template_content">'+data['sample']+'</textarea>'+
                    '<div class="variate-choice"><p>可选变量</p><div class="variate-choice-item">';
                    for (var i = 0; i < list.length; i++) {
                        html += '<a class="text-primary block variate-choice-code" href="javascript:void(0);" data-code="'+list[i]['replace_name']+'">['+list[i]['item_name']+']</a>';
                    }
                    // '<a class="text-primary block" href="javascript:void(0);">[昵称]</a>'+
                    
                     html += '</div></div></div></div></div>';

                    
                    html += '</form>';
                    util.confirm(name+"短信模版",html,function(){
                        if(this.$content.find('#sms_is_enable').is(':checked')){
                            var is_enable =1;
                        }
                        var template_code = this.$content.find('#template_code').val();
                        var notify_type = this.$content.find('#notify_type').val();
                        var template_title = this.$content.find('#template_title').val();
                        var int_template_title = this.$content.find('#int_template_title').val();
                        var notification_mode = this.$content.find('#notification_mode').val();
                        var template_content = this.$content.find('#template_content').val();
                        if(template_title==''){
                            util.message('请填写模版ID','danger');
                            this.$content.find('#template_title').focus();
                            return false;
                        }
                        $.ajax({
                            type:"post",
                            url:"<?php echo __URL('PLATFORM_MAIN/config/updateNotifyTemplate'); ?>",
                            data:{
                                'type':'sms',
                                'template_code':template_code,
                                'notify_type':notify_type,
                                'is_enable':is_enable,
                                'template_title':template_title,
                                'int_template_title':int_template_title,
                                'notification_mode':notification_mode,
                                'template_content':template_content
                            },
                            async:true,
                            success:function (data) {
                                if (data["code"] > 0) {
                                    util.message( data["message"],'success',loading('message'));
                                }else{
                                    util.message( data["message"],'danger');
                                }
                            }
                        });

                    },'large')
                }
            });
        })
        //编辑邮箱模板
        $('body').on('click','.editEmail',function(){
            var id = $(this).data('id');
            var notify_type = $(this).data('type');
            var template_code = $(this).data('code');
            $.ajax({
                type:"post",
                url:"<?php echo __URL('PLATFORM_MAIN/config/notifyEmailTemplate'); ?>",
                data:{
                    'id':id,
                    'notify_type':notify_type,
                    'template_code':template_code
                },
                async:true,
                success:function (data) {
                    var name = data['template_name'];
                    var list = data['list'];
                    var html = '<form class="form-horizontal padding-15" id="">';
                    html += '<input type="hidden" id="email_notify_type" value="'+notify_type+'">';
                    html += '<input type="hidden" id="email_template_code" value="'+template_code+'">';
                    html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>标题</label><div class="col-md-8"><input type="text" class="form-control" id="email_template_title" value="'+data['template_title']+'"></div></div>';
                    if(notify_type=='business'){
                        html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>通知人邮箱</label><div class="col-md-8"><input type="text" class="form-control" id="email_notification_mode" value="'+data['notification_mode']+'" ></div></div>';
                        html += '<div class="form-group"><label class="col-md-3 control-label"></label><div class="col-md-8">' ;
                        html += '多个邮箱之间用英文逗号“,”隔开';
                        html +=	'</div></div>';
                    }
                    // html += '<div class="form-group"><label class="col-md-3 control-label">可用变量</label><div class="col-md-8">' ;
                    // for (var i = 0; i < list.length; i++) {
                    //     if(i+1==list.length){
                    //         html += list[i]['item_name'] +':'+list[i]['replace_name'];
                    //     }else{
                    //         html += list[i]['item_name'] +':'+list[i]['replace_name']+'，';
                    //     }
                    // }
                    // html +=	'</div></div>';
                    //html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>内容</label><div class="col-md-8"><textarea class="form-control" rows="4" id="email_template_content">'+data['template_content']+'</textarea></div></div>';
                    html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>内容</label>'+
                    '<div class="col-md-8">'+
                    '<div class="flex">'+
                    '<div style="width:580px;" id="email_template_content_'+id+'" data-content=' + '\'' + data['template_content'] + '\'' + '></div>'+
                    '<div class="variate-choice"><p>可选变量</p><div class="variate-choice-item">';
                    for (var i = 0; i < list.length; i++) {
                    html += '<a class="text-primary block copy variate-choice-email" href="javascript:void(0);" data-clipboard-text="'+list[i]['replace_name']+'">'+ list[i]['item_name'] +'</a>';
                    }
                    util.copy();
                    html += '</div></div>'+
                    '</div></div></div>';
                    if(data['is_enable']==1){
                        html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="email_is_enable" checked ><label for="email_is_enable" class=""></label></div></div></div>';
                    }else{
                        html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="email_is_enable" ><label for="email_is_enable" class=""></label></div></div></div>';
                    }
                    html += '</form>';
                    util.confirm(name+"邮箱模版",html,function(){
                        if(this.$content.find('#email_is_enable').is(':checked')){
                            var is_enable =1;
                        }
                        var template_code = this.$content.find('#email_template_code').val();
                        var notify_type = this.$content.find('#email_notify_type').val();
                        var template_title = this.$content.find('#email_template_title').val();
                        var template_content = this.$content.find('#email_template_content_'+id).data('content');
                        var email_notification_mode = this.$content.find('#email_notification_mode').val();
                        if(template_title==''){
                            util.message('请填写标题','danger');
                            this.$content.find('#email_template_title').focus();
                            return false;
                        }
                        if(template_content==''){
                            util.message('请填写邮箱内容','danger');
                            this.$content.find('#email_template_content' + id).focus();
                            return false;
                        }
                        $.ajax({
                            type:"post",
                            url:"<?php echo __URL('PLATFORM_MAIN/config/updateNotifyTemplate'); ?>",
                            data:{
                                'type':'email',
                                'template_code':template_code,
                                'notify_type':notify_type,
                                'is_enable':is_enable,
                                'notification_mode':email_notification_mode,
                                'template_title':template_title,
                                'template_content':template_content
                            },
                            async:true,
                            success:function (data) {
                                if (data["code"] > 0) {
                                    util.message( data["message"],'success',loading('message'));
                                }else{
                                    util.message( data["message"],'danger');
                                }
                            }
                        });

                    },'xlarge',function(){
                        util.ueditor('email_template_content_'+id)
					})
                }
            });

        })
        //支付宝配置
        $('body').on('click','.aPay_set',function(){
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="alipay_is_use" ><label for="alipay_is_use" class=""></label></div></div></div>';
            html += '<div class="J-alipay" style="display:none;">';    
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>支付宝账号</label><div class="col-md-8"><input type="text" class="form-control" id="ali_seller" required value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>合作者身份PID</label><div class="col-md-8"><input type="text" class="form-control" id="ali_partnerid" required value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>安全校验码KEY</label><div class="col-md-8"><input type="text" class="form-control" id="ali_key" required value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>APPID</label><div class="col-md-8"><input type="text" class="form-control" id="appid" required value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>支付宝公钥</label><div class="col-md-8"><textarea class="form-control" rows="4" id="ali_public_key"></textarea></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>商户应用私钥</label><div class="col-md-8"><textarea class="form-control" rows="4" id="ali_private_key"></textarea></div></div>';
            html += '</div>';
            html += '</form>';
            loading('payment');
            util.confirm('支付宝配置',html,function(){
                if(this.$content.find('#alipay_is_use').is(':checked')){
                    var is_use =1;
                }
                var ali_partnerid = $("#ali_partnerid").val();
                var ali_seller = $("#ali_seller").val();
                var ali_key = $("#ali_key").val();
                var appid = $("#appid").val();
                var ali_public_key = $("#ali_public_key").val();
                var ali_private_key = $("#ali_private_key").val();
                if(is_use){
                if(ali_partnerid==''){
                    util.message('请填写合作者身份ID');
                    this.$content.find('#ali_partnerid').focus();
                    return false;
                }
                if(ali_seller==''){
                    util.message('请填写支付宝账号');
                    this.$content.find('#ali_seller').focus();
                    return false;
                }
                if(ali_key==''){
                    util.message('请填写安全校验码');
                    this.$content.find('#ali_key').focus();
                    return false;
                }
                if(appid==''){
                    util.message('请填写APPID');
                    this.$content.find('#appid').focus();
                    return false;
                }
                if(ali_public_key==''){
                    util.message('请填写支付宝公钥');
                    this.$content.find('#ali_public_key').focus();
                    return false;
                }
                if(ali_private_key==''){
                    util.message('请填写商户私钥');
                    this.$content.find('#ali_private_key').focus();
                    return false;
                }
            }
                $.ajax({
                    type:"post",
                    url:"<?php echo __URL('PLATFORM_MAIN/config/payAliConfig'); ?>",
                    data:{
                        'ali_partnerid':ali_partnerid,
                        'ali_seller':ali_seller,
                        'ali_key':ali_key,
                        'appid':appid,
                        'ali_public_key':ali_public_key,
                        'ali_private_key':ali_private_key,
                        'is_use':is_use
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

            },'large')
        })
		//GlobePay支付
        $('body').on('click','.gloPay_set',function(){
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="gppay_is_use" ><label for="gppay_is_use" class=""></label><p class="p small-muted">没有GlobePay账号？<a class="text-primary" href="https://pay.globepay.co.jp" target="_blank">点击前往开通</a></p></div></div></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>Partnercode</label><div class="col-md-8"><input type="text" class="form-control" id="PARTNER_CODE" value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>Credentialcode</label><div class="col-md-8"><input type="text" class="form-control" id="CREDENTIAL_CODE" value=""></div></div>';
			html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>币种</label><div class="col-md-8" style="line-height:32px"><input type="radio" id="CURRENCY" value="JPY" checked name="CURRENCY" style="margin:0 0 5px 0"> JPY<input type="radio" id="CURRENCY" value="CNY" name="CURRENCY" style="margin:0 0 5px 15px"> CNY</div></div>';
            html += '</form>';
            loading('payment');
            util.confirm('GlobePay配置',html,function(){
                if(this.$content.find('#gppay_is_use').is(':checked')){
                    var is_use =1;
                }
                var PARTNER_CODE = $("#PARTNER_CODE").val();
                var CREDENTIAL_CODE = $("#CREDENTIAL_CODE").val();
				var CURRENCY = $("input[name='CURRENCY']:checked").val();
                if(is_use){
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
                    url:"<?php echo __URL('PLATFORM_MAIN/config/glopayConfig'); ?>",
                    data:{
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
        //微信配置
        $('body').on('click','.wPay_set',function(){
            var html = '<form class="form-horizontal padding-15" style="padding:15px 35px" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">微信支付</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="wxpay_is_use" ><label for="wxpay_is_use" class=""></label><p class="p small-muted">没有微信支付接口？<a class="text-primary" href="https://pay.weixin.qq.com/index.php/core/home/login?return_url=%2Findex.php%2Fcore%2Faccount" target="_blank">点击前往开通</a></p></div></div></div></div>';
			html += '<div class="J-wxpay" style="display:none;">';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>AppID</label><div class="col-md-8"><div class="input-group"><input type="text" class="form-control" id="APP_KEY" value=""><span class="input-group-btn"><a class="btn btn-primary J-appid" href="javascript:void(0);">获取AppID</a></span></div><p class="help-block">如商城已对接公众号可直接获取AppID</p></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>MCHID</label><div class="col-md-8"><div class=""><input type="text" class="form-control" id="MCHID" value=""></div><p class="help-block">微信支付商户号，该商户号需要与上述公众号关联</p></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>API秘钥</label><div class="col-md-8"><div class="input-group"><input id="paySignKey" value=""  class="form-control" type="text"><span class="input-group-btn"><a class="btn btn-primary J-key" href="javascript:void(0);">生成秘钥</a></span></div><p class="help-block">如已有密钥，可直接粘贴至此输入框，如没有，可生成密钥然后填写至微信商户平台</p></div></div>';
            if("<?php echo $realm_ip; ?>"){
                html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>公众号支付授权目录</label><div class="col-md-8"><div class="input-group"><span class="input-group-btn"><select class="form-control" style="width:92px"><option value="-1"><?php echo $http; ?><option><select></span><input style="opacity: 0;position: absolute; z-index: -11;" type="text" class="form-control" id="call_payback_url1" value="<?php echo $call_payback_url1; ?>" ><input class="form-control" value="<?php echo $call_payback_url1; ?>" disabled="true" type="text"><span class="input-group-btn copy8"><a href="javascript:void(0);" class="btn btn-default">复制</a></span></div><div class="mb-0 help-block">支付授权目录请选择"<?php echo $http; ?>"</div></div></div>';
                html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>H5支付域名</label><div class="col-md-8"><div class="input-group"><input style="opacity: 0;position: absolute; z-index: -11;" type="text" class="form-control" id="realm_ip_h5" value="<?php echo $realm_ip; ?>" ><input class="form-control" value="<?php echo $realm_ip; ?>" disabled="true" type="text"><span class="input-group-btn copy9"><a href="javascript:void(0);" class="btn btn-default">复制</a></span></div><div class="help-block mb-0">商户平台》产品中心》开发配置，务必把支付域名和授权目录都填上</div></div></div>';
			}else{
                html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>公众号支付授权目录</label><div class="col-md-8"><div class="input-group"><span class="input-group-btn"><select class="form-control" style="width:92px"><option value="-1"><?php echo $http; ?><option><select></span><input style="opacity: 0;position: absolute; z-index: -11;" type="text" class="form-control" id="call_payback_url2" value="<?php echo $call_payback_url2; ?>"><input class="form-control" value="<?php echo $call_payback_url2; ?>" disabled="true" type="text"><span class="input-group-btn copy10"><a href="javascript:void(0);" class="btn btn-default">复制</a></span></div><div class="mb-0 help-block">支付授权目录请选择"<?php echo $http; ?>"</div></div></div>';
                html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>H5支付域名</label><div class="col-md-8"><div class="input-group"><input style="opacity: 0;position: absolute; z-index: -11;" type="text" class="form-control" id="realm_two_ip_h5" value="<?php echo $realm_two_ip; ?>"><input class="form-control" value="<?php echo $realm_two_ip; ?>" disabled="true" type="text"><span class="input-group-btn copy11"><a href="javascript:void(0);" class="btn btn-default">复制</a></span></div><div class="help-block mb-0">商户平台》产品中心》开发配置，务必把支付域名和授权目录都填上</div></div></div>';
			}
            html += '<div class="form-group"><label class="col-md-3 control-label">微信提现</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="wxtw_is_use"><label for="wxtw_is_use" class=""></label></div><p class="help-block"><a class="text-primary" href="https://pay.weixin.qq.com/index.php/core/home/login?return_url=%2Findex.php%2Fcore%2Faccount" target="_blank">微信商户平台</a> 》账号中心 》API安全 》API证书 下载证书</p></div></div>';
            html += '<div class="J-wxtw" style="display:none;">';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>apiclient_cert证书</label><div class="col-md-8"><div class="input-group"><input class="cert form-control" disabled type="text"> <span class="input-group-btn"><button class="btn btn-info btn-file J-btnwx">上传文件<input id="fileupload" class="fileuploads" type="file" name="file_upload" multiple></button></span></div></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>apiclient_key证书</label><div class="col-md-8"><div class="input-group"><input class="certkey form-control" disabled type="text"><span class="input-group-btn"><button class="btn btn-info btn-file J-btnwx">上传文件<input id="fileupload" class="fileuploads" type="file" name="file_upload" multiple></button></span></div></div></div>';
            html += '</div></div>';
            html += '</div>';
            html += '</form>';
            loading('payment');
            util.confirm('微信支付配置',html,function(){
                if(this.$content.find('#wxpay_is_use').is(':checked')){
                    var is_use =1;
                }
                if(this.$content.find('#wxtw_is_use').is(':checked')){
                    var wx_tw =1;
                }
                var appkey = $("#APP_KEY").val();
                var paySignKey = $("#paySignKey").val();
                var MCHID = $("#MCHID").val();
                var cert = $("#cert").val();
                var certkey = $("#certkey").val();
                if(is_use == 1){
                    if(appkey==''){
                        util.message('请填写应用ID[AppID]');
                        this.$content.find('#appkey').focus();
                        return false;
                    }
                    if(paySignKey==''){
                        util.message('请填写API秘钥');
                        this.$content.find('#paySignKey').focus();
                        return false;
                    }
                    if(MCHID==''){
                        util.message('请填写微信支付商户号[MCHID]');
                        this.$content.find('#MCHID').focus();
                        return false;
                    }
                }
                if(wx_tw ==1){
                    if(cert==''){
                        util.message('请上传数字证书[pem]');
                        return false;
                    }
                    if(certkey==''){
                        util.message('请上传数字证书秘钥[pem]');
                        return false;
                    }
				}
                $.ajax({
                    type:"post",
                    url:"<?php echo __URL('PLATFORM_MAIN/config/payConfig'); ?>",
                    data:{
                        'appkey':appkey,
                        'paySignKey':paySignKey,
                        'MCHID':MCHID,
                        'is_use' : is_use,
                        'certkey':certkey,
                        'cert':cert,
                        'wx_tw':wx_tw
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

            },'large')
        });
        //通联配置
        $('body').on('click','.tlPay_set',function(){
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">启用通联支付</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="tlpay_is_use" ><label for="tlpay_is_use" class=""></label></div><p class="help-block">通联支付分为<a class="text-primary" href="https://vsp.allinpay.com/login" target="_blank">收银宝</a>与<a class="text-primary" href="https://vsp.allinpay.com/login" target="_blank">通联通</a>，收银宝处理银行卡支付业务，通联通处理银行卡提现业务</p></div></div>';
            html += '<div class="J-tlpay" style="display:none;">';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>收银宝商户号</label><div class="col-md-8"><input type="text" class="form-control" id="tl_cusid" required value=""><p class="help-block">通联支付收银宝的商户号。<a class="text-primary" href="https://vsp.allinpay.com/login" target="_blank">前往查询</a></p></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>收款账户APPID</label><div class="col-md-8"><input type="text" class="form-control" id="tl_appid" required value=""><p class="help-block"><a class="text-primary" href="https://vsp.allinpay.com/login" target="_blank">通联收银宝</a>->设置->对接配置查看。</p></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>收款账户MD5密钥</label><div class="col-md-8"><input type="text" class="form-control" id="tl_key" required value=""><p class="help-block"><a class="text-primary" href="https://vsp.allinpay.com/login" target="_blank">通联收银宝</a>->设置->对接配置查看。</p></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label">银行卡提现</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="tltw_is_use" ><label for="tltw_is_use" class=""></label></div><p class="help-block">银行卡提现业务由通联支付的通联通处理</p></div></div>';
            html += '<div class="J-tltw" >';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>通联通商户号</label><div class="col-md-8"><input type="text" class="form-control" id="tl_id" required value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>用户名</label><div class="col-md-8"><input type="text" class="form-control" id="tl_username" required value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>密码</label><div class="col-md-8"><input type="text" class="form-control" id="tl_password" required value=""></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>数字证书[cer文件]</label><div class="col-md-8"><div class="input-group"><input class="tl_cert form-control" disabled type="text"> <span class="input-group-btn"><button class="btn btn-info btn-file J-btntl">上传文件<input id="fileupload" class="fileuploads" type="file" name="file_upload" multiple></button></span></div><p class="help-block">文件类型会被转换为pem</p></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>证书秘钥[p12文件]</label><div class="col-md-8"><div class="input-group"><input class="tl_certkey form-control" disabled type="text"> <span class="input-group-btn"><button class="btn btn-info btn-file J-btntl">上传文件<input id="fileupload" class="fileuploads" type="file" name="file_upload" multiple></button></span></div><p class="help-block">文件类型会被转换为pem</p></div></div>';
            html += '</div>';
            html += '</div>';
            html += '</form>';
            loading('payment');
            util.confirm('通联配置',html,function(){
                if(this.$content.find('#tlpay_is_use').is(':checked')){
                    var is_use =1;
                }
                if(this.$content.find('#tltw_is_use').is(':checked')){
                    var tl_tw =1;
                }
                var tl_cusid = $("#tl_cusid").val();
                var tl_key = $("#tl_key").val();
                var tl_appid = $("#tl_appid").val();
                var tl_id = $("#tl_id").val();
                var tl_username = $("#tl_username").val();
                var tl_password = $("#tl_password").val();
                var tl_public = $("#tl_cert").val();
                var tl_private = $("#tl_certkey").val();
                if(is_use){
                    if(tl_cusid==''){
                        util.message('请填写收银宝商户号');
                        this.$content.find('#ali_partnerid').focus();
                        return false;
                    }
                    if(tl_appid==''){
                        util.message('请填写收银宝APPID');
                        this.$content.find('#appid').focus();
                        return false;
                    }
                    if(tl_key==''){
                        util.message('请填写收款账户MD5密钥');
                        this.$content.find('#ali_key').focus();
                        return false;
                    }
                }
                if(tl_tw){
                    if(tl_id==''){
                        util.message('请填写通联通商户号');
                        this.$content.find('#tl_id').focus();
                        return false;
                    }
                    if(tl_username==''){
                        util.message('请填写用户名');
                        this.$content.find('#tl_username').focus();
                        return false;
                    }
                    if(tl_password==''){
                        util.message('请填写用户名密码');
                        this.$content.find('#tl_password').focus();
                        return false;
                    }
                    if(tl_public==''){
                        util.message('请上传数字证书');
                        this.$content.find('#tl_cert').focus();
                        return false;
                    }
                    if(tl_private==''){
                        util.message('请上传证书秘钥');
                        this.$content.find('#tl_certkey').focus();
                        return false;
                    }
				}
                $.ajax({
                    type:"post",
                    url:"<?php echo __URL('PLATFORM_MAIN/config/tlPayConfig'); ?>",
                    data:{
                        'tl_cusid':tl_cusid,
                        'tl_key':tl_key,
                        'tl_appid':tl_appid,
                        'tl_id':tl_id,
                        'tl_username':tl_username,
                        'tl_password':tl_password,
                        'tl_public':tl_public,
                        'tl_private':tl_private,
                        'is_use':is_use,
                        'tl_tw':tl_tw
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

            },'large')
        })
        $('body').on('click','.J-key',function(){
            var letters = 'abcdefghijklmnopqrstuvwxyz0123456789';
            var token = '';
            for(var i = 0; i < 32; i++) {
                var j = parseInt(Math.random() * (31 + 1));
                token += letters[j];
            }
            $('#paySignKey').val(token);
		})
        $('body').on('click','.J-appid',function(){
            $('#APP_KEY').val($("#wx_appid").val());
        })
        util.copy2('.copy8','call_payback_url1');
        util.copy2('.copy9','realm_ip_h5');
        util.copy2('.copy10','call_payback_url2');
        util.copy2('.copy11','realm_two_ip_h5');
        $('body').on('click','.J-btnwx',function(){
               var _this=$(this);
               var certpem = $("#cert").val();
               var certkeypem = $("#certkey").val();
               var cert =  _this.parent().siblings().hasClass("cert");
               var certkey =  _this.parent().siblings().hasClass("certkey");
               if(cert){
                    var path = "<?php echo __URL('PLATFORM_MAIN/upload/uploadFiles'); ?>"+'?cert='+certpem+'&certtype=1';
			   }
				if(certkey){
					var path = "<?php echo __URL('PLATFORM_MAIN/upload/uploadFiles'); ?>"+'?certkey='+certkeypem+'&certtype=2';
				}
                util.attachmentUpload(path,function (file_url) {
                    if(file_url.state == '1'){
                       if(file_url.certtype == '1'){
                           $(".cert").val(file_url.filename)
                           $("#cert").val(file_url.filesrc)
					   }
                        if(file_url.certtype == '2'){
                            $(".certkey").val(file_url.filename)
                            $("#certkey").val(file_url.filesrc)
                        }
                    }
                })
        })
        $('body').on('click','.J-btntl',function(){
            var tl_password = $("#tl_password").val();
            if(tl_password){
                var _this=$(this);
                var tlcertpem = $("#tl_cert").val();
                var tlcertkeypem = $("#tl_certkey").val();
                var tl_cert =  _this.parent().siblings().hasClass("tl_cert");
                var tl_certkey =  _this.parent().siblings().hasClass("tl_certkey");
                if(tl_cert){
                    var path = "<?php echo __URL('PLATFORM_MAIN/upload/uploadTlFiles'); ?>"+'?cert='+tlcertpem+'&certtype=1&tl_password='+tl_password;
                }
                if(tl_certkey){
                    var path = "<?php echo __URL('PLATFORM_MAIN/upload/uploadTlFiles'); ?>"+'?certkey='+tlcertkeypem+'&certtype=2&tl_password='+tl_password;
                }
                util.attachmentUpload(path,function (file_url) {
                    if(file_url.state == '1'){
                        if(file_url.certtype == '1'){
                            $(".tl_cert").val(file_url.filename)
                            $("#tl_cert").val(file_url.filesrc)
                        }
                        if(file_url.certtype == '2'){
                            $(".tl_certkey").val(file_url.filename)
                            $("#tl_certkey").val(file_url.filesrc)
                        }
                    }
                })
			}else{
                util.message('请填写用户密码');
                $('#tl_password').focus();
                return false;
			}

        })
        $('body').on('click','.J-btnssl',function(){
               var _this=$(this);
               var sslpem = $("#ssl").val();
               var realm_ip = $("#realm_ip").val();
               var realm_two_ip = $('#realm_two_ip').val();
               var sslkeypem = $("#sslkey").val();
               var ssl =  _this.parent().siblings().hasClass("ssl");
               var sslkey =  _this.parent().siblings().hasClass("sslkey");
               if(!realm_ip){
                    util.message('请填写域名地址');
                    $('#realm_ip').focus();
                    return false;
               }
               if(ssl){
                    var path = "<?php echo __URL('PLATFORM_MAIN/upload/uploadSsl'); ?>"+'?ssl='+sslpem+'&certtype=1&realm_ip='+realm_ip+'&realm_two_ip='+realm_two_ip;
                }
                if(sslkey){
                        var path = "<?php echo __URL('PLATFORM_MAIN/upload/uploadSsl'); ?>"+'?sslkey='+sslkeypem+'&certtype=2&realm_ip='+realm_ip+'&realm_two_ip='+realm_two_ip;
                }
                util.attachmentUpload(path,function (file_url) {
                    if(file_url.state == '1'){
                       if(file_url.certtype == '1'){
                           $(".ssl").val(file_url.filename);
                           $("#ssl").val(file_url.filesrc);
					   }
                        if(file_url.certtype == '2'){
                            $(".sslkey").val(file_url.filename);
                            $("#sslkey").val(file_url.filesrc);
                        }
                    }
                });
        });
        //文案设置
        util.validate($('.form-validate10'),function(form){
            var balance_style = $('#balance_style').val();
            if(balance_style==''){
                balance_style = '余额';
            }
            var point_style = $("#point_style").val();
            if(point_style==''){
                point_style = '积分';
            }
            $.ajax({
                type:"post",
                url : "<?php echo __URL('PLATFORM_MAIN/config/styleConfig'); ?>",
                async : true,
                data : {
                    "balance_style" : balance_style,
                    "point_style" : point_style
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',loading('copystyle'));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        });

        function getBankList() {
			$.ajax({
				type: "get",
				url: "<?php echo __URL('PLATFORM_MAIN/config/getBankList'); ?>",
				async: true,
				success: function (data) {
					if (data['code'] == 1) {
						if (data['data'].length > 0) {
							var html = '';
							data['data'].forEach((item, index) => {
								html += '<div class="bankList" style="border-bottom: 1px solid #eee;padding-bottom: 5px;margin-bottom: 5px;">';
								html += '<img src="'+ item.bank_iocn +'" style="width:40px;height: 40px;">' +
										'<span style="margin-left: 11px;font-size: 14px;">'+ item.bank_short_name +'</span>';
								html += '</div>';
							})
							$("#bankList-group").append(html);
						}
					}
				}
			})
		}
		//银行卡列表
		$('body').on('click','.pay_bankList',function(){
			var html = '<div class="bankList-group" id="bankList-group">';
			html += '</div>';
			getBankList();
			util.confirm('支持银行',html,function(){
			})
		})

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
                    url:"<?php echo __URL('PLATFORM_MAIN/config/bPayConfig'); ?>",
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

            },'large')
        })
        //货到付款配置
        $('body').on('click','.dPay_set',function(){
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"><div class="switch-inline"><input type="checkbox" id="dpay_is_use" <?php if($d_set['is_use'] == 1): ?>checked<?php endif; ?>><label for="dpay_is_use" class=""></label></div></div></div>';
            html += '</form>';
            loading('payment');
            util.confirm('货到付款配置',html,function(){
                if(this.$content.find('#dpay_is_use').is(':checked')){
                    var is_use =1;
                }
                $.ajax({
                    type:"post",
                    url:"<?php echo __URL('PLATFORM_MAIN/config/dPayConfig'); ?>",
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
        //eth付款配置
        $('body').on('click','.ethPay_set',function(){
            $.ajax({
                'url':"<?php echo __URL('PLATFORM_MAIN/system/getCoinConfig'); ?>",
                'type':'post',
                'data':{},
                success:function(data){
                    if(data.eth_status == 0){
                        util.alert('商城还没有配置eth钱包，请先配置。', function () {
                            window.open("<?php echo __URL('ADDONS_MAINblockChainBasicSetting'); ?>");
                            util.alert('是否已配置完成？', function(){
                                $.ajax({
                                    'url':"<?php echo __URL('PLATFORM_MAIN/system/getCoinConfig'); ?>",
                                    'type':'post',
                                    'data':{},
                                    success:function(data){
                                        if(data.eth_status == 1){
                                            var html = '<form class="form-horizontal padding-15" id="">';
                                            html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"> <div class="switch-inline"><input type="checkbox" id="ethpay_is_use" ><label for="ethpay_is_use" class=""></label></div></div></div>';
                                            html += '</form>';
                                            loading('payment');
                                            util.confirm('eth支付配置',html,function(){
                                                if(this.$content.find('#ethpay_is_use').is(':checked')){
                                                    var is_use =1;
                                                }
                                                $.ajax({
                                                    type:"post",
                                                    url:"<?php echo __URL('PLATFORM_MAIN/config/ethPayConfig'); ?>",
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

                                            },'large')
                                        }else{
                                            util.message('eth未完成配置','danger');
                                            return false;
                                        }
                                    }
                                })
                            })
                        })
                    }else{
                        var html = '<form class="form-horizontal padding-15" id="">';
                        html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"> <div class="switch-inline"><input type="checkbox" id="ethpay_is_use" ><label for="ethpay_is_use" class=""></label></div></div></div>';
                        html += '</form>';
                        loading('payment');
                        util.confirm('eth支付配置',html,function(){
                            if(this.$content.find('#ethpay_is_use').is(':checked')){
                                var is_use =1;
                            }
                            $.ajax({
                                type:"post",
                                url:"<?php echo __URL('PLATFORM_MAIN/config/ethPayConfig'); ?>",
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

                        },'large')
                    }
                }
            })
        })
        //eos付款配置
        $('body').on('click','.eosPay_set',function(){
            $.ajax({
                'url':"<?php echo __URL('PLATFORM_MAIN/system/getCoinConfig'); ?>",
                'type':'post',
                'data':{},
                success:function(data){
                    if(data.eos_status == 0){
                        util.alert('商城还没有配置eos钱包，请先配置。', function () {
                            window.open("<?php echo __URL('ADDONS_MAINblockChainBasicSetting'); ?>");
                            util.alert('是否已配置完成？', function(){
                                $.ajax({
                                    'url':"<?php echo __URL('PLATFORM_MAIN/system/getCoinConfig'); ?>",
                                    'type':'post',
                                    'data':{},
                                    success:function(data){
                                        if(data.eos_status == 1){
                                            var html = '<form class="form-horizontal padding-15" id="">';
                                            html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"> <div class="switch-inline"><input type="checkbox" id="eospay_is_use" ><label for="eospay_is_use" class=""></label></div></div></div>';
                                            html += '</form>';
                                            loading('payment');
                                            util.confirm('eos支付配置',html,function(){
                                                if(this.$content.find('#eospay_is_use').is(':checked')){
                                                    var is_use =1;
                                                }
                                                $.ajax({
                                                    type:"post",
                                                    url:"<?php echo __URL('PLATFORM_MAIN/config/eosPayConfig'); ?>",
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

                                            },'large')
                                        }else{
                                            util.message('eos未完成配置','danger');
                                            return false;
                                        }
                                    }
                                })
                            })
                        })
                    }else{
                        var html = '<form class="form-horizontal padding-15" id="">';
                        html += '<div class="form-group"><label class="col-md-3 control-label">是否启用</label><div class="col-md-8"> <div class="switch-inline"><input type="checkbox" id="eospay_is_use" ><label for="eospay_is_use" class=""></label></div></div></div>';
                        html += '</form>';
                        loading('payment');
                        util.confirm('eos支付配置',html,function(){
                            if(this.$content.find('#eospay_is_use').is(':checked')){
                                var is_use =1;
                            }
                            $.ajax({
                                type:"post",
                                url:"<?php echo __URL('PLATFORM_MAIN/config/eosPayConfig'); ?>",
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

                        },'large')
					}
                }
            })
        })
		$('#list').on('click', '.message_is_open', function(){
			var model = $(this).data('model');
			var template_code = $(this).data('template_code');
			var name = $(this).data('name');
			if(model == 'sms'){
			    var is_enable = $(this).data('is_enable');
			}else{
                var is_enable = $(this).data('is_enable');
			}
			$.ajax({
				type:"post",
				url:"<?php echo __URL('PLATFORM_MAIN/config/updateNoticeTemplateEnable'); ?>",
				data:{
					'model' : model, 'template_code' : template_code, 'is_enable' : is_enable
				},
				async:true,
				success:function (data) {
					if (data["code"] > 0) {
						util.message( data["message"],'success',loading('message'));
					}else{
						util.message( data["message"],'danger');
					}
				}
			})
		})
		//根据点击列表值修改支付方式是否启用
		$('#pay_list').on('click', '.payment_is_open', function(){
			var is_use = $(this).data('is_use');
			var id = $(this).data('id');
            var key = $(this).data('key');
            if(is_use==1 && key=='ETHPAY'){
                $.ajax({
                    'url':"<?php echo __URL('PLATFORM_MAIN/system/getCoinConfig'); ?>",
                    'type':'post',
                    'data':{},
                    success:function(data){
                        if(data.eth_status == 0){
                            util.alert('商城还没有配置eth钱包，请先配置。', function () {
                                window.open("<?php echo __URL('ADDONS_MAINblockChainBasicSetting'); ?>");
                                util.alert('是否已配置完成？', function(){
                                    $.ajax({
                                        'url':"<?php echo __URL('PLATFORM_MAIN/system/getCoinConfig'); ?>",
                                        'type':'post',
                                        'data':{},
                                        success:function(data){
                                            if(data.eth_status == 1){
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
                                            }else{
                                                util.message('eth未完成配置','danger');
                                                return false;
                                            }
                                        }
                                    })
                                })
                            })
                        }else{
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
                        }
                    }
                })
			} else if(is_use==1 && key=='EOSPAY'){
                $.ajax({
                    'url':"<?php echo __URL('PLATFORM_MAIN/system/getCoinConfig'); ?>",
                    'type':'post',
                    'data':{},
                    success:function(data){
                        if(data.eos_status == 0){
                            util.alert('商城还没有配置eos钱包，请先配置。', function () {
                                window.open("<?php echo __URL('ADDONS_MAINblockChainBasicSetting'); ?>");
                                util.alert('是否已配置完成？', function(){
                                    $.ajax({
                                        'url':"<?php echo __URL('PLATFORM_MAIN/system/getCoinConfig'); ?>",
                                        'type':'post',
                                        'data':{},
                                        success:function(data){
                                            if(data.eos_status == 1){
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
                                            }else{
                                                util.message('eos未完成配置','danger');
                                                return false;
                                            }
                                        }
                                    })
                                })
                            })
                        }else{
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
                        }
                    }
                })
			}else{
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
			}
		})

        $('body').on('click','.copy',function(){
            util.copy1();
        })
        //文案设置
        util.validate($('.form-validate10'),function(form){
            var balance_style = $('#balance_style').val();
            if(balance_style==''){
                balance_style = '余额';
            }
            var point_style = $("#point_style").val();
            if(point_style==''){
                point_style = '积分';
            }
            $.ajax({
                type:"post",
                url : "<?php echo __URL('PLATFORM_MAIN/config/styleConfig'); ?>",
                async : true,
                data : {
                    "balance_style" : balance_style,
                    "point_style" : point_style
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',loading('copystyle'));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        });
        //redis设置
        util.validate($('.form-validate11'),function(form){
            var host = $('#host').val();
            var pass = $("#pass").val();
            $.ajax({
                type:"post",
                url : "<?php echo __URL('PLATFORM_MAIN/config/redisConfig'); ?>",
                async : true,
                data : {
                    "host" : host,
                    "pass" : pass
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',loading('redis'));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        });
        //微信开放平台设置
        util.validate($('.form-validate12'),function(form){
            var open_appid = $('#open_appid').val();
            var open_secrect = $("#open_secrect").val();
            var open_key = $("#open_key").val();
            var open_token = $("#open_token").val();
            $.ajax({
                type:"post",
                url : "<?php echo __URL('PLATFORM_MAIN/config/wechatOpenConfig'); ?>",
                async : true,
                data : {
                    "open_appid" : open_appid,
                    "open_secrect" : open_secrect,
                    "open_key" : open_key,
                    "open_token" : open_token
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',loading('wechat'));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        });
		//返回地址
        $('body').on('click','.address_return_list',function(){
        	$('#returnsetting_list').removeClass('hide');
        	$('#returnsetting_edit').addClass('hide');
        });
        //删除地址
        $('body').on('click','.address_return_delete',function(){
        	var return_id = $(this).data('return_id');
             util.alert('确定删除该地址？', function(){
                 $.ajax({
                     type:"post",
                     url:"<?php echo __URL('PLATFORM_MAIN/config/returnDelete'); ?>",
                     data:{"return_id" : return_id},
                     async:true,
                     success:function (data) {
                         if (data["code"] > 0) {
                             util.message(data["message"],'success', function () {
                             	loading('returnsetting');
         	                });
                         } else {
                             util.message(data["message"],'danger');
                         }
                     }
                 });
             });
        });
        $('body').on('click', '#international', function () {
            var user_type = $(this).parents('#messageConfig').find("input[name='type']:checked").val();

            if($(this).is(':checked')){
                if(user_type == '2'){
                    $('.J-aliint').show();
                }
                $('.J-int').show();
            }else{
                if(user_type == '2'){
                    $('.J-aliint').hide();
                }
                $('.J-int').hide();
            }
        });
    });
    //编辑地址
    function addressEdit(id){
    	$("#return_id").val('0');
        $("#return_consigner").val('');
        $("#return_mobile").val('');
        $("#return_provinces").val('-1');
        $("#return_cities").val('-1');
        $("#return_districts").val('-1');
        $("#return_address").val('');
        $("#return_zip_code").val('');
        $('#pid').val('-1');
        $('#cid').val('-1');
        $('#aid').val('-1');
        $("#return_is_default").removeAttr('checked');
        $("#return_is_default2").removeAttr('checked');
    	if(id>0){
            $.ajax({
                type:"post",
                url:"<?php echo __URL('PLATFORM_MAIN/config/getShopReturn'); ?>",
                data:{"return_id" : id},
                async:true,
                success:function (data) {
                    if (data) {
                    	$("#return_id").val(data.return_id);
                        $("#return_consigner").val(data.consigner);
                        $("#return_mobile").val(data.mobile);
                        $("#return_provinces").val(data.province);
                        $("#return_cities").val(data.city);
                        $("#return_districts").val(data.district);
                        $("#pid").val(data.province);
                        $("#cid").val(data.city);
                        $("#aid").val(data.district);
                        $("#return_address").val(data.address);
                        $("#return_zip_code").val(data.zip_code);
                        if(data.is_default==1){
                        	$("#return_is_default").prop('checked','true');
                        }else{
                        	$("#return_is_default2").prop('checked','true');
                        }
                        getAddress();
                    }
                }
            });
    	}else{
    		$("#return_is_default2").prop('checked','true');
    		getAddress();
    	}
    	$('#returnsetting_list').addClass('hide');
    	$('#returnsetting_edit').removeClass('hide');
    }
    function getAddress(){
        var pid=0,cid=0,aid=0;
        initProvince("#return_provinces");
        function initProvince(obj){
            pid = $('#pid').val();
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/order/getProvince'); ?>",
                dataType : "json",
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "";
                        for (var i = 0; i < data.length; i++) {
                            if(pid == data[i].province_id){
                                str += '<option selected value="'+data[i].province_id+'">'+data[i].province_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].province_id+'">'+data[i].province_name+'</option>';
                            }
                        }
                        $(obj).append(str);
                    }
                }
            });
        }
        getProvince();
        //选择省份弹出市区
        $('.getProvince').on('change', function () {
            var id = $('#return_provinces').val();
            if(id==-1){
                id = pid;
            }
            cid = $('#cid').val();
            $.ajax({
                type : "post",
                url :"<?php echo __URL('PLATFORM_MAIN/order/getCity'); ?>",
                dataType : "json",
                data : {
                    "province_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择市</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(cid == data[i].city_id) {
                                str += '<option selected value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }else{
                                str += '<option  value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }
                        }
                        $('#return_cities').html(str);
                    }
                }
            });
        })
        function getProvince() {
            var id = $('#return_provinces').val();
            if(id==-1){
                id = pid;
            }
            cid = $('#cid').val();
            $.ajax({
                type : "post",
                url :"<?php echo __URL('PLATFORM_MAIN/order/getCity'); ?>",
                dataType : "json",
                data : {
                    "province_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择市</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(cid == data[i].city_id) {
                                str += '<option selected value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }else{
                                str += '<option  value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }
                        }
                        $('#return_cities').html(str);
                    }
                }
            });
        };
        getSelCity();
        //选择市区弹出区域
        $('.getSelCity').on('change', function () {
            var id = $('#return_cities').val();
            aid = $('#aid').val();
            if(id==-1){
                id = cid;
            }
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/order/getDistrict'); ?>",
                dataType : "json",
                data : {
                    "city_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择区</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(aid==data[i].district_id){
                                str += '<option selected value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }

                        }
                        $('#return_districts').html(str);
                    }
                }
            });
        })
        function getSelCity() {
            var id = $('#return_cities').val();
            aid = $('#aid').val();
            if(id==-1){
                id = cid;
            }
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/order/getDistrict'); ?>",
                dataType : "json",
                data : {
                    "city_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择区</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(aid==data[i].district_id){
                                str += '<option selected value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }

                        }
                        $('#return_districts').html(str);
                    }
                }
            });
        }

    }
</script>

    <script>
        require(['util','kefu'],function(util,kefu){
          // ie浏览器判断
            function isIE() {
                if (!!window.ActiveXObject || "ActiveXObject" in window){
                    location.href=__URL(PLATFORMMAIN+'/login/versionLow');
                }else{
                    
                }
            }
            isIE();

            $(".newsTips").hover(function(){
                $(this).addClass("open");
            },function(){
                $(this).removeClass("open");
            });


            // 修改密码
            $('.updatePass').on('click',function(){
                    var html = '<form class="form-horizontal padding-15" id="">';
                    html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>原密码</label><div class="col-md-8"><input type="password" id="pass" class="form-control"  /></div></div>';
                    html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>新密码</label><div class="col-md-8"><input type="password" id="pass_new" class="form-control"  /></div></div>';
                    html +='<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>确认密码</label><div class="col-md-8"><input type="password" id="pass_new_real" class="form-control"  /></div></div>';
                    html += '</form>';
                    util.confirm('修改密码',html,function(){
                        var pass = this.$content.find('#pass').val();
                        var pass_new = this.$content.find('#pass_new').val();
                        var pass_new_real = this.$content.find('#pass_new_real').val();
                        if(pass==''){
                            util.message('原密码不能为空','danger');
                            this.$content.find('#pass').focus();
                            return false;
                        }
                        if(pass_new==''){
                            util.message('新密码不能为空','danger');
                            this.$content.find('#pass_new').focus();
                            return false;
                        }
                        if(pass_new_real==''){
                            util.message('确认密码不能为空','danger');
                            this.$content.find('#pass_new_real').focus();
                            return false;
                        }
                        if(pass_new!=pass_new_real){
                            util.message('新密码和确认密码不一致','danger');
                            this.$content.find('#pass_new_real').focus();
                            return false;
                        }
                        $.ajax({
                            type : "post",
                            url : "<?php echo __URL('PLATFORM_MAIN/Auth/resetUserPassword'); ?>",
                            data : {
                                "pass" : pass,
                                "pass_new" : pass_new
                            },
                            success : function(data) {
                                if (data["code"] > 0) {
                                    util.message(data["message"],'success');
                                }else{
                                    util.message(data["message"],'danger');
                                }
                            }
                        });
                    })
                })
            // 个人信息
            $('.updateUser').on('click',function(){
                var html = '<form class="form-horizontal padding-15" id="">';
                if("<?php echo $user_info['is_system']; ?>" == "1"){
                    html += '<div class="form-group"><label class="col-md-3 control-label">公司名称</label><div class="col-md-8"><input type="text" id="user_name" class="form-control" value="<?php echo $web_info['title']; ?>" /></div></div>';
                }else{
                    html += '<div class="form-group"><label class="col-md-3 control-label">公司名称</label><div class="col-md-8"><?php echo $web_info['title']; ?></div></div>';
                }
                html += '</form>';
                util.confirm('账号信息',html,function(){
                        var user_name = this.$content.find('#user_name').val();
                        if(user_name==''){
                            util.message('公司名称不能为空','danger');
                            this.$content.find('#user_name').focus();
                            return false;
                        }
                        $.ajax({
                            type : "post",
                            url : "<?php echo __URL('PLATFORM_MAIN/Auth/modifyUserName'); ?>",
                            data : {
                                "user_name" : user_name
                            },
                            success : function(data) {
                                if (data["code"] > 0) {
                                    $('#updateUser').html(user_name);
                                    util.message(data["message"],'success');
                                }else{
                                    util.message(data["message"],'danger');
                                }
                            }
                        });
                })
            })
            $('.delcache').click(function (e) {
                $.ajax({
                    url : __URL(PLATFORMMAIN+"/System/deleteCache"),
                    type : "post",
                    data : {},
                    success : function(data) {
                        if (data) {
                            util.message('缓存更新成功', 'success',location.reload());
                        } else {
                            util.message('缓存更新失败', 'danger');
                        }
                    }
                });
            })
        })
        function loading(){
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/index/tipCount'); ?>",
                async: true,
                success: function (data) {
                    var total_tips=data['total_tips']>100?"99+":data['total_tips'];
                    $(".tip0").html(total_tips);
                    if(data['total_tips']>0){
                        $(".no_count").addClass('hide');
                    }else{
                        $(".no_count").removeClass('hide');
                    }
                    if(data['daifahuo']>0){
                        $(".dai_count").removeClass('hide');
                        $(".tip2").html(data['daifahuo']);
                    }
                    if(data['tuikuanzhong']>0){
                        $(".after_count").removeClass('hide');
                        $(".tip3").html(data['tuikuanzhong']);
                    }
                    if(data['unread']>0){
                        $(".mail_count").removeClass('hide');
                        $(".tip4").html(data['unread']);
                    }
                    if(data['uncms']){
                        $(".cms_count").removeClass('hide');
                        $(".tip5").html(data['uncms']);
                    }
                }
            });
        }
        loading();
    </script>
    

</body>
</html>

