<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:35:"template/admin/Order/orderList.html";i:1587970148;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $second_menu['module_name']; ?> - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>团大人 - 让更多的人帮你卖货！<?php endif; ?></title>
    <link rel="stylesheet" href="__STATIC__/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="__STATIC__/css/common.css?t=1.1">
    <link rel="stylesheet" href="__STATIC__/lib/drag/layer.css">
    <link rel="stylesheet" href="ADMIN_CSS/shop.css?t=1.1">
    <link rel="shortcut icon" href="ADMIN_IMG/logo.png" type="image/x-icon" />

    <!--引入require-->
    <script>
        var PLATFORMJS = "PLATFORM_NEW_JS";
    </script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/jquery.min.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_LIB/require.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/config.js"></script>
</head>
<body>
<script>
	var PLATFORM_NAME = "<?php echo $title_name; ?>";
	var ADMINIMG = "ADMIN_IMG";//后台图片请求路径
	var ADMINMAIN = "ADMIN_MAIN";//后台请求路径
	var SHOPMAIN = "SHOP_MAIN";//PC端请求路径
	var APPMAIN = "APP_MAIN";//手机端请求路径
	var UPLOAD = "__UPLOAD__";//上传文件根目录
	var PAGESIZE = "<?php echo $pagesize; ?>";//分页显示页数
	var ROOT = "__ROOT__";//根目录
	var ADDONS = "__ADDONS__";
	var STATIC = "__STATIC__";
    var MAIN = "ADMIN_MAIN";//装修请求路径
    var PASSMAIN = "ADMIN_MAIN";
    var ADDONSADMINMAIN = "ADDONS_ADMIN_MAIN";
</script>

<!--<script src="ADMIN_JS/jquery.timers.js"></script>-->
<!--<link rel="stylesheet" href="__STATIC__/lib/bootstrap-daterangepicker-master/daterangepicker.css">-->

<input type="hidden" id="vslai_rewrite_model" value="<?php echo rewrite_model(); ?>">
<input type="hidden" id="vslai_url_model" value="<?php echo url_model(); ?>">
<input type="hidden" id="vslai_admin_model" value="<?php echo admin_model(); ?>">
<input type="hidden" id="realm_ip" value="<?php echo $web_info['realm_ip']; ?>">
<script>
function __URL(url){
	url = url.replace('SHOP_MAIN', '');
	url = url.replace('APP_MAIN', 'wap');
	url = url.replace('ADMIN_MAIN', $("#vslai_admin_model"));
	if(url == ''|| url == null){
		return 'SHOP_MAIN';
	}else{
		var str=url.substring(0, 1);
		if(str=='/' || str=="\\"){
			url=url.substring(1, url.length);
		}
		if($("#vslai_rewrite_model").val()==1 || $("#vslai_rewrite_model").val()==true){
			return 'SHOP_MAIN/'+url;
		}
		var action_array = url.split('?');
		//检测是否是pathinfo模式
		url_model = $("#vslai_url_model").val();
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
                url+=tag + action_array[i]+'&website_id=<?php echo $website_id; ?>';
            }else{
                url+=tag+'website_id=<?php echo $website_id; ?>';
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
    var realm_ip = $("#realm_ip").val();
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
    }
    return path;
}
</script>
<input id='page_index' type="hidden">
<input id='showNumber' type="hidden" value='<?php echo $pagesize; ?>'>
<div class="v-layout  <?php if(!$second_menu_list): ?> nosubnav <?php endif; ?>">
    <div class="v-sidebar">
        <div class="v-nav">
            
            <ul class="v-nav-list">
                <?php if(is_array($headlist) || $headlist instanceof \think\Collection || $headlist instanceof \think\Paginator): if( count($headlist)==0 ) : echo "" ;else: foreach($headlist as $key=>$per): if($per['icon_class']=='icon-application-color'): ?>
                <li><a href="<?php echo __URL('ADMIN_MAIN/'.$per['url']); ?>" class="item<?php if(strtoupper($per['module_id'])
                    == $headid): ?> active<?php endif; ?>" title=""><span class="icon-application-color"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>&nbsp; <?php echo $per['module_name']; ?></a></li>
                    <?php else: ?>

                <li><a href="<?php echo __URL('ADMIN_MAIN/'.$per['url']); ?>" class="item<?php if(strtoupper($per['module_id'])
                    == $headid): ?> active<?php endif; ?>" title=""><i class="icon <?php if($per['icon_class']): ?><?php echo $per['icon_class']; else: ?> icon-shop <?php endif; ?>"></i> <?php echo $per['module_name']; ?></a></li>
                     <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            
        </div>
        
        <div class="v-subnav">
            <!--<div class="v-subnav-title"><?php echo $frist_menu['module_name']; ?></div>-->
            <ul class="v-subnav-list">
                <?php if(is_array($leftlist) || $leftlist instanceof \think\Collection || $leftlist instanceof \think\Paginator): if( count($leftlist)==0 ) : echo "" ;else: foreach($leftlist as $key=>$leftitem): ?>
                <li><a href="<?php echo __URL('ADMIN_MAIN/'.$leftitem['url']); ?>" class="item<?php if(strtoupper($leftitem['module_id'])
                    == $second_menu_id): ?> active<?php endif; ?>"><?php echo $leftitem['module_name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        
    </div>
    
        <?php if($no_menu == '1'): else: ?>
        <div class="v-header">
            <div class="v-header-box">            
                <div class="v-header-title">
                     <span class="v-header-word"><?php echo $web_info['mall_name']; ?></span>
                </div>
                <div class="v-header-account">
                    <div class="user-menu fs-12">
                        <div class="inline-block">
                        <a href="<?php echo __URL('ADMIN_MAIN/index/preview'); ?>" class="previewIndex" target="_blank">预览</a>
                        </div>
                        <div class="inline-block newsTips shortcutBar">
                            <a href="javascript:void(0);" id="news-tips" class="dker clear-cache" style="position: relative;" >
                                <span><i class="icon icon-message3"></i></span> 
                                <span class="badge pa tip0"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="news-tips">
                                <ul class="newsTips_ul">
                                    <li class="no_count hide">暂无待办信息</li>
                                    <li class="dai_count hide"><a href="<?php echo __URL('ADMIN_MAIN/order/orderlist'); ?>?order_status=1" class="flex flex-pack-justify"><div>待发货订单</div><div class="text-red tip2"></div></a></li>
                                    <li class="after_count hide"><a href="<?php echo __URL('ADMIN_MAIN/order/afterorderlist'); ?>" class="flex flex-pack-justify"><div>售后订单</div><div class="text-red tip3"></div></a></li>
                                </ul>

                            </div>

                        </div>

                        <div class="layout-user inline-block">
                            <div class="ivu-dropdown">
                                <div class="ivu-dropdown-rel">
                                    <a href="javascript:void(0)" class="text-primary"><img src="/public/platform/images/index/22.png" class="avatar">
                                        <?php if($user_info['user_name']): ?><?php echo $user_info['user_name']; else: ?><?php echo $user_info['user_tel']; endif; ?>
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
                                                    <p class="names"><?php if($user_info['user_name']): ?><?php echo $user_info['user_name']; else: ?><?php echo $user_info['user_tel']; endif; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="operations flex">
                                            <a href="javascript:void(0)" target="_blank"><i class="icon icon-list mr-10"></i>工单管理</a>
                                            <a href="javascript:void(0);" class="updatePass" data-toggle="modal" data-target="#password_modal"><i class="icon icon-password3 mr-10"></i>修改密码</a>
                                        </div>
                                        <div class="operations flex">
                                            <a href="javascript:void(0);" class="delcache"><i class="icon icon-clear mr-10"></i>清除缓存</a>
                                            <a href="<?php echo __URL('ADMIN_MAIN/login/logout'); ?>?website_id=<?php echo $website_id; ?>"><i class="icon icon-logout-l mr-10"></i>退出登录</a>
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
            <?php if($second_menu['desc']): ?>
            <div class="alert alert-tips alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <?php echo $second_menu['desc']; if($second_menu['jump']): ?>&nbsp;&nbsp;<a href="<?php echo $second_menu['jump']; ?>" class="checkDes">查看详情</a><?php endif; ?>
            </div>
            <?php endif; ?>
            
<input type="hidden" id="order_id"/>
<input type="hidden" id="order_goods_id"/>

<form class="v-filter-container">
    <div class="filter-fields-wrap">
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label">订单编号</label>
                    <div class="v__controls">
                        <input type="text" id="order_no" class="v__control_input" placeholder="请输入订单编号" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">商品信息</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="goods_name" placeholder="商品名称/商品编号" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">快递单号</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="express_no" placeholder="请输入快递单号" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">会员信息</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="user" autocomplete="off" placeholder="手机号码/会员ID/用户名/昵称">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">支付方式</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="payment_type">
                            <option value="">全部</option>
                            <option value="1">微信</option>
                            <option value="2">支付宝</option>
                            <option value="3">银行卡</option>
                            <option value="5">余额支付</option>
                            <?php if(($blockchainStatus)): ?>
                            <option value="16">eth支付</option>
                            <option value="17">eos支付</option>
                            <?php endif; ?>
							<option value="4">货到付款</option>
                        </select>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">订单类型</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="order_type">
                            <option value="">全部</option>
                            <?php if(is_array($orderTypeList) || $orderTypeList instanceof \think\Collection || $orderTypeList instanceof \think\Paginator): $i = 0; $__LIST__ = $orderTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ot): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $ot['type_id']; ?>"><?php echo $ot['type_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">下单时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="orderTime">
                            <input type="text" class="v__control_input pr-30" id="orderTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="orderStartDate">
                            <input type="hidden" id="orderEndDate">
                        </label>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">付款时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="payTime">
                            <input type="text" class="v__control_input pr-30" id="payTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="payStartDate">
                            <input type="hidden" id="payEndDate">
                        </label>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">发货时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="deliveryTime">
                            <input type="text" class="v__control_input pr-30" id="deliveryTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="sendStartDate">
                            <input type="hidden" id="sendEndDate">
                        </label>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">完成时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="completeTime">
                            <input type="text" class="v__control_input pr-30" id="completeTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="finishStartDate">
                            <input type="hidden" id="finishEndDate">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label"></label>
                    <div class="v__controls">
                        <a class="btn btn-primary search"><i class="icon icon-search"></i> 搜索</a>
                        <a class="btn btn-success ml-15 dataExcel">导出EXCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="screen-title"><span class="text">订单列表</span></div>
<ul class="nav nav-tabs v-nav-tabs fs-12">
            <li role="presentation" <?php if($status=='9'): ?> class="active" <?php endif; ?>>
            <a href="<?php echo __URL('ADMIN_MAIN/order/orderlist'); ?>" class="flex-auto-center">全部<br><span
                    class='order-count J-all'></span></a>
            </li>
            <li role="presentation" <?php if($status=='0'): ?> class="active" <?php endif; ?>>
            <a href="<?php echo __URL('ADMIN_MAIN/order/orderlist','order_status=0'); ?>" class="flex-auto-center">待付款<br><span
                    class='order-count J-nopay'></span></a>
            </li>

            <li role="presentation" <?php if($status=='1'): ?> class="active" <?php endif; ?>>
            <a href="<?php echo __URL('ADMIN_MAIN/order/orderlist','order_status=1'); ?>" class="flex-auto-center">待发货<br><span
                    class='order-count J-pay'></span></a>
            </li>
            <li role="presentation" <?php if($status=='2'): ?> class="active" <?php endif; ?>>
            <a href="<?php echo __URL('ADMIN_MAIN/order/orderlist','order_status=2'); ?>" class="flex-auto-center">待收货<br><span
                    class='order-count J-forgoods'></span></a>
            </li>
            <li role="presentation" <?php if($status=='3'): ?> class="active" <?php endif; ?>>
            <a href="<?php echo __URL('ADMIN_MAIN/order/orderlist','order_status=3'); ?>" class="flex-auto-center">已收货<br><span
                    class='order-count J-havegoods'></span></a>
            </li>
            <li role="presentation" <?php if($status=='4'): ?> class="active" <?php endif; ?>>
            <a href="<?php echo __URL('ADMIN_MAIN/order/orderlist','order_status=4'); ?>" class="flex-auto-center">已完成<br><span
                    class='order-count J-finish'></span></a>
            </li>
            <li role="presentation" <?php if($status=='5'): ?> class="active" <?php endif; ?>>
            <a href="<?php echo __URL('ADMIN_MAIN/order/orderlist','order_status=5'); ?>" class="flex-auto-center">已关闭<br><span
                    class='order-count J-close'></span></a>
            </li>
            <?php if(($blockchainStatus)): ?>
            <li role="presentation" <?php if($status=='6'): ?> class="active" <?php endif; ?>>
            <a href="<?php echo __URL('ADMIN_MAIN/order/orderlist','order_status=6'); ?>" class="flex-auto-center">链上处理中<br><span
                    class='order-count J-chuli'></span></a>
            </li>
            <?php endif; ?>
        </ul>

            <!--表格-->
            <table class="table table-hover v-table mb-10">
                <thead>
                <tr>
                    <th class="col-md-3">商品</th>
                    <th class="col-md-1">单价</th>
                    <th class="col-md-1">数量</th>
                    <th class="col-md-2">买家/收货人</th>
                    <th class="col-md-1">订单状态</th>
                    <th class="col-md-2 operationLeft">实收</th>
                    <th class="col-md-2 pr-14 operationLeft">操作</th>
                </tr>
                </thead>
            </table>
            <div class="tables ol_tbody" id="list">

            </div>
            <div class="page clearfix">
                <div class="M-box3 m-style fr">
                </div>
            </div>

<!-- page end -->

<!-- 确定付款模态框（Modal） -->
<div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_pay" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel_pay">确定付款</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label for="modal_payment_type" class="col-sm-3 control-label">支付方式</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="modal_payment_type">
                                <!--<option value="">全部</option>-->
                                <option value="1">微信</option>
                                <option value="2">支付宝</option>
                                <option value="3">银行卡</option>
                                <option value="5">余额支付</option>
                                <?php if(($blockchainStatus)): ?>
                                <option value="16">eth支付</option>
                                <option value="17">eos支付</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">备注</label>
                        <div class="col-sm-6">
                            <textarea class="form-control ta_resize" rows="8" id="pay_seller_memo"
                                      placeholder="备注"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add1" data-dismiss="modal">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->

<!-- 订单改价模态框（Modal） -->
<div class="modal fade" id="adjust_price" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_price"
     aria-hidden="true">
    <div class="modal-dialog ePriceModel">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel_price">订单改价</h4>
            </div>
            <div class="modal-body">
                <!--表格-->
                <table class="table table-hover v-table">
                    <thead>
                    <tr>
                        <th>商品</th>
                        <th>价格</th>
                        <th>数量</th>
                        <th>涨/降价</th>
                    </tr>
                    </thead>
                    <tbody id="adjust_price_modal">
                    </tbody>
                </table>
                <p class="pb10">运费：<span><input type="text" id="adjust_shipping_fee_modal" class="J-edit-freight"></span><a
                        href="javascript:;" class="blue add2">免运费</a></p>
                <p class="pb10" id="adjust_order_amount"></p>
                <p class="pb10 gray">订单实收 = (单价 + 涨/降价) * 数目 + 运费</p>
                <p><textarea class="form-control ta_resize" rows="8" id="modal_memo" placeholder="备注"></textarea></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add3" data-dismiss="modal">确定改价</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- /.modal -->

<!-- 备注模态框（Modal） -->
<div class="modal fade" id="seller_memo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_memo"
     aria-hidden="true">
    <div class="modal-dialog" style="width:500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel_memo">订单备注</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label for="memo" class="col-sm-3 control-label">备注</label>
                        <div class="col-sm-6">
                            <textarea class="form-control ta_resize" rows="8" id="memo" placeholder="备注"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add4" data-dismiss="modal">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->

<!-- 发货模态框（Modal） -->
<div class="modal fade" id="delivery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-delivery"
     aria-hidden="true">
    <div class="modal-dialog" style="width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel-delivery">商品发货</h4>
            </div>
            <div class="modal-body" style="height: 400px;overflow-y: scroll;">
                <!--表格-->
                <table class="table table-hover v-table ol-dialog-tb aa fs-12">
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="selectAll" class="ml5 decorate" checked></th>
                        <th>商品</th>
                        <th>数量</th>
                        <th>物流单号</th>
                        <th>状态</th>

                    </tr>
                    </thead>
                    <tbody class="trs tbodys" id="delivery_goods_list">

                    </tbody>
                </table>

                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">收货信息</label>
                        <div class="col-sm-6">
                            <p class="form-control-static" id="receiver_info"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">快递公司</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="" id="delivery_express_company"></select>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="delivery_express_no" class="col-sm-2 control-label">快递单号</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="delivery_express_no" placeholder="请输入单号">
                            <p class="form-control-static" style="color: #ccc">*发货后24小时内可以修改一次快递信息 </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">备注</label>
                        <div class="col-sm-6">
                            <textarea class="form-control ta_resize" rows="4" id="delivery_seller_memo"
                                      placeholder="备注"></textarea>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add6" data-dismiss="modal">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->

<!-- 修改物流信息模态框（Modal） -->
<div class="modal fade" id="update_shipping" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">商品发货</h4>
            </div>
            <div class="modal-body" style="height: 400px;overflow-y: scroll;">
                <ul class="parcel clearfix" id="shipping_package">
                </ul>
                <!--表格-->
                <table class="table v-table ol-dialog-tb">
                    <thead>
                    <tr>
                        <th></th>
                        <th>商品</th>
                        <th>数量</th>
                        <th>物流单号</th>
                        <th>状态</th>

                    </tr>
                    </thead>
                    <tbody class="trs tbodys" id="shipping_goods_list">
                    </tbody>
                </table>

                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">收货信息</label>
                        <div class="col-sm-6">
                            <p class="form-control-static" id="shipping_receiver_info"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">快递公司</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="shipping_express_company">
                            </select>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="update_shipping_express_no" class="col-sm-2 control-label">快递单号</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="update_shipping_express_no" placeholder="请输入单号">
                            <p class="form-control-static" style="color: #ccc">*发货后24小时内可以修改一次快递信息 </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">备注</label>
                        <div class="col-sm-6">
                            <textarea class="form-control ta_resize" rows="4" id="update_shipping_seller_memo"
                                      placeholder="备注"></textarea>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add8" data-dismiss="modal">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->

<!-- 修改收货人地址模态框（Modal） -->
<div class="modal fade" id="update_address" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_delivery"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel_delivery">收货人信息</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="receiver_name" class="col-sm-3 control-label">收货人</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="receiver_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_mobile" class="col-sm-3 control-label">手机号码</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="receiver_mobile">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_province" class="col-sm-3 control-label">省</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="receiver_province"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_city" class="col-sm-3 control-label">市</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="receiver_city"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_district" class="col-sm-3 control-label">区</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="receiver_district"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_address" class="col-sm-3 control-label">收货地址</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="receiver_address">
                        </div>
                    </div>
                </form>
            </div>
            <input type="hidden" id="province_id">
            <input type="hidden" id="city_id">
            <input type="hidden" id="district_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add7" data-dismiss="modal">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->

<!-- 处理回寄模态框（Modal） -->
<div class="modal fade" id="confirm_receipt" tabindex="-1" role="dialog" aria-labelledby="myModalLabelReceipt"
     aria-hidden="true">
    <div class="modal-dialog" style="width:550px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelReceipt">订单备注</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">

                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">处理结果</label>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                                <input type="radio" name="dealResult" id="confirm" value="0" checked> 确认签收
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="dealResult" id="refuse" value="1"> 拒绝签收
                            </label>
                        </div>
                    </div>

                    <div class="form-group isBlock hide">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">拒绝原因</label>
                        <div class="col-sm-6">
                            <textarea class="form-control ta_resize" rows="4" id="refuse_receipt_reason"
                                      placeholder="原因"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add9" data-dismiss="modal">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->

<!-- 处理退货申请模态框（Modal） -->
<div class="modal fade" id="judge_return" tabindex="-1" role="dialog" aria-labelledby="myModalLabelJudgeReturn"
     aria-hidden="true">
    <div class="modal-dialog" style="width:750px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelJudgeReturn">处理退货申请</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">售后类型</label>
                        <div class="col-sm-7">
                            <p class="form-control-static">退款</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">处理结果</label>
                        <div class="col-sm-7">
                            <label class="radio-inline">
                                <input type="radio" name="goodsReturn" id="return_agree" value="1" checked> 同意退货
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="goodsReturn" id="return_disagree" value="0"> 拒绝退货
                            </label>
                        </div>
                    </div>

                    <div class="form-group returnAddress">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">退货地址</label>
                        <div class="col-sm-7" style="padding-top: 8px">
							<select class="form-control" id="address_return"><option value="0">请选择地址</option></select>
							<p class="help-block">没有退货地址？前往系统》商城配置》商家地址添加</p>
                        </div>
                    </div>

                    <div class="form-group reason hide">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">拒绝原因</label>
                        <div class="col-sm-7">
                            <textarea class="form-control ta_resize" rows="4" id="reject_return_reason"
                                      placeholder="原因"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add11" data-dismiss="modal">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->


        </div>
        <div class="copyrights"><a href="http://q.url.cn/s/EPvXzVm" target="_blank" class="text-primary">在线客服</a> | <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>Copyright©2012-2019  All Rights Reserved 网站备案号：粤ICP备14084496号<?php endif; ?></div>
    </div>
</div>

<!--修改密码弹出框 -->
<div id="password_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>修改密码</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pwd0"><span class="red">*</span>原密码</label>
                        <div class="col-sm-5">
                            <input type="password" id="pwd0" placeholder="请输入原密码" class="form-control"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pwd1"><span class="red">*</span>新密码</label>
                        <div class="col-sm-5">
                            <input type="password" id="pwd1" placeholder="请输入新密码" class="form-control"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pwd2"><span class="red">*</span>再次输入密码</label>
                        <div class="col-sm-5">
                            <input type="password" id="pwd2" placeholder="请输入确认密码" class="form-control"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div style="text-align: center; height: 20px;" id="show"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary submitPassword" style="display:inline-block;">保存</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>
<script>
require(['utilAdmin'], function (utilAdmin) {
    function loading(){
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/index/getOrderCount'); ?>",
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
            }
        });
    }
    loading();
    // ie浏览器判断
    function isIE() {
        if (!!window.ActiveXObject || "ActiveXObject" in window){
            location.href="<?php echo __URL('ADMIN_MAIN/login/versionLow'); ?>&website_id="+$('#website_id').val();
        }
     }
     isIE();

    $(".newsTips").hover(function(){
        $(this).addClass("open");
    },function(){
        $(this).removeClass("open");
    });

    /**
     * 清理缓存
     */
    function delcache() {
        $.ajax({
            url: __URL(ADMINMAIN + "/system/deletecache"),
            type: "post",
            data: {},
            dataType: "json",
            success: function (data) {
                if (data) {
                    utilAdmin.message("缓存更新成功！",'success',location.reload());
                } else {
                    utilAdmin.message("更新失败，请检查文件权限！", 'danger');
                }
            }
        });
    }
    /**
     * 修改密码
     */
    function submitPassword() {
        var pwd0 = $("#pwd0").val();
        var pwd1 = $("#pwd1").val();
        var pwd2 = $("#pwd2").val();
        if (pwd0 == '') {
            $("#pwd0").focus();
            // $("#pwd0").siblings("span").html("原密码不能为空");
            utilAdmin.message('原密码不能为空');
            return;
            
        } 
        if (pwd1 == '') {
            $("#pwd1").focus();
            utilAdmin.message("密码不能为空");
            return;
        } else if ($("#pwd1").val().length < 6) {
            $("#pwd1").focus();
            utilAdmin.message("密码不能少于6位数");
            return;
        } else {
            $("#pwd1").siblings("span").html("");
        }
        if (pwd2 == '') {
            $("#pwd2").focus();
            utilAdmin.message("密码不能为空");
            return;
        } else if ($("#pwd2").val().length < 6) {
            $("#pwd2").focus();
            utilAdmin.message("密码不能少于6位数");
            return;
        } else {
            $("#pwd2").siblings("span").html("");
        }
        if (pwd1 != pwd2) {
            $("#pwd2").focus();
            utilAdmin.message("两次密码输入不一样，请重新输入");
            return;
        }
        $.ajax({
            url : __URL(PASSMAIN+"/index/modifypassword"),
            type : "post",
            data : {
                "old_pass" : $("#pwd0").val(),
                "new_pass" : $("#pwd1").val()
            },
            dataType : "json",
            success : function(data) {
                if (data['code'] > 0) {
                                utilAdmin.message("密码修改成功！","success", function () {
                                    location.href= __URL(PASSMAIN+"/login/logout");
                                });
                } else {
                                utilAdmin.message(data['message'],"danger");
                                return false;
                }
            }
        });
    }
    $('body').on('click','.delcache',function(){
        delcache();
    })
    $('body').on('click','.submitPassword',function(){
        submitPassword();
    })

//指定要操作的元素的click事件停止传播—定义属性值data-stopPropagation的元素点击时停止传播事件
    $("body").on('click','[data-stopPropagation]',function (e) {
        e.stopPropagation();
    });
    $("#firstpane .menu_body:eq(0)").show();
    $("#firstpane p.menu_head").click(function() {
      if ($(this).hasClass("current")) {
        $(this).removeClass("current");
        $(this)
          .nextAll("div.menu_body")
          .eq(0)
          .slideToggle(300)
          .slideUp("slow");
      } else {
        $(this)
          .addClass("current")
          .next("div.menu_body")
          .slideToggle(300)
          .siblings("div.menu_body")
          .slideUp("slow");
        $(this)
          .siblings()
          .removeClass("current");
      }
    });

})
</script>

<script>
    require(['utilAdmin', 'util', 'tpl'], function (utilAdmin, util, tpl) {
        $(function () {
        util.layDate('#orderTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;

            if(value){
                $('#orderStartDate').val(date1);
                $('#orderEndDate').val(date2);
            }
            else{
                $('#orderStartDate').val('');
                $('#orderEndDate').val('');
            }

        });
        util.layDate('#payTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;
            if(value){
                $('#payStartDate').val(date1);
                $('#payEndDate').val(date2);
            }
            else{
                $('#payStartDate').val('');
                $('#payEndDate').val('');
            }

        });
        util.layDate('#deliveryTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;
            if(value){
                $('#sendStartDate').val(date1);
                $('#sendEndDate').val(date2);
            }
            else{
                $('#sendStartDate').val('');
                $('#sendEndDate').val('');
            }
            
        });
        util.layDate('#completeTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;
            if(value){
                $('#finishStartDate').val(date1);
                $('#finishEndDate').val(date2);
            }
            else{
                $('#finishStartDate').val('');
                $('#finishEndDate').val('');
            }
        });
            LoadingInfo(1);

        $("body").on('click', "a[data-target]", function () {
            if ($(this).attr('data-order-id') > 0 && $(this).attr('data-order-goods-id') > 0) {
                var order_id = $(this).attr('data-order-id');
                var order_goods_id = $(this).attr('data-order-goods-id');
                $("#order_id").val(order_id);
                $("#order_goods_id").val(order_goods_id);
            } else {
                var order_id = $(this).attr('data-order-id');
                $("#order_id").val(order_id);
            }
            var data_target = $(this).attr('data-target');

            //如果是修改物流信息或者发货就加载订单物流信息
            if (data_target == '#delivery' || data_target == '#update_shipping') {
                getOrderDelivery(data_target);
            }
            //如果是修改价格则加载商品信息
            if (data_target == '#adjust_price') {
                modifyPrice();
            }
            //修改收货人地址
            if (data_target =='#update_address'){
                getReceiverAddress(order_id);
            }

            if (data_target == '#judge_return') {
                getShopReturnSet();
            }

            if (data_target == '#delete_order') {
                deleteOrder();
            }

            if (data_target == '#logistics') {
                var obj = $(this)
                obj.removeAttr('data-target')
                util.confirm('物流跟踪', 'url:' + __URL(ADMINMAIN + '/order/logisticsModal?order_id=' + order_id, function () {}))
                obj.attr('data-target', '#logistics')
            }
        })


        $("#receiver_province").on('change', function () {
            $("#receiver_city option").remove();
            $("#receiver_district option").remove();
            getCity($(this).val());
        })

        $("#receiver_city").on('change', function () {
            $("#receiver_district option").remove();
            getDistrict($(this).val());
        })

        $("#adjust_price").on('change', ".J-edit-price, .J-edit-freight", function () {
            buildAdjustPriceData($(this));
            showAdjustPrice();
        })

        $(".parcel").on("click", "li", function () {
            $(this).addClass("active").siblings().removeClass("active");
            switchPackageData($(this).attr('data-id'));
        })

        // 发货modal全选操作
        $("input[name=selectAll]").on('change',function () {
            var checked = $(this).prop('checked');
            $('#delivery_goods_list').find("input[name='select_goods'][value='0']").not(":disabled").prop("checked",checked);
        })

        //退货申请modal
        $("#judge_return input[name=goodsReturn]").on('change', function () {
            if ($("#return_agree").prop('checked')) {
                $(".returnAddress").removeClass('hide');
                $(".reason").addClass('hide');
            } else {
                $(".returnAddress").addClass('hide');
                $(".reason").removeClass('hide');
            }
        })

        //处理回寄modal
        $("#confirm_receipt input[name=dealResult]").on('change', function () {
            if ($("#confirm").prop('checked')) {
                $(".isBlock").addClass('hide');
            } else {
                $(".isBlock").removeClass('hide');
            }
        })
    })

      function deleteOrder() {
          //删除订单
          var order_id = $("#order_id").val();
          utilAdmin.alert('确认删除此订单吗 ？', function () {
              $.ajax({
                  type: "post",
                  url: "<?php echo __URL('ADMIN_MAIN/order/deleteOrder'); ?>",
                  async: true,
                  data: {
                      "order_id": order_id,
                  },
                  success: function (data) {
                      if (data["code"] > 0) {
                          util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                      } else {
                          util.message(data["message"], 'danger', LoadingInfo($('#page_index').val()));
                      }
                  }
              })
          })
      }

    //获取店铺退货地址
    function getShopReturnSet() {
        $.ajax({
            type: "POST",
            url: "<?php echo __URL('ADMIN_MAIN/config/getShopReturnList'); ?>",
            success: function (data) {
                var html = '';
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="'+ data[i].return_id +'" >'+ data[i].consigner +' '+ data[i].province_name+data[i].city_name+data[i].dictrict_name +' '+ data[i].address +'</option>';
                    }
                    $("#address_return").html(html);
                }
            }
        });
    }

    function LoadingInfo(page_index) {
        $("#page_index").val(page_index);
            var order_no = $("#order_no").val();
            var start_create_date = $("#orderStartDate").val();
            var end_create_date = $("#orderEndDate").val();
            var start_pay_date = $("#payStartDate").val();
            var end_pay_date = $("#payEndDate").val();
            var start_send_date = $("#sendStartDate").val();
            var end_send_date = $("#sendEndDate").val();
            var start_finish_date = $("#finishStartDate").val();
            var end_finish_date = $("#finishEndDate").val();
            var user = $("#user").val();
            var express_no = $("#express_no").val();
            var goods_name = $("#goods_name").val();
            if (<?php echo $status; ?> != null && <?php echo $status; ?> != '9') {
                var order_status = <?php echo $status; ?>;
            } else {
                var order_status = $("#order_status").val();
            }
            var payment_type = $("#payment_type").val();
            var order_type = $("#order_type").val();
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/order/orderlist'); ?>",
                async: true,
                data: {
                    "page_index": page_index,
                    "page_size": $("#showNumber").val(),
                    "order_no": order_no,
                    "order_status": order_status,
                    "start_create_date": start_create_date,
                    "end_create_date": end_create_date,
                    "start_pay_date": start_pay_date,
                    "end_pay_date": end_pay_date,
                    "start_send_date": start_send_date,
                    "end_send_date": end_send_date,
                    "start_finish_date": start_finish_date,
                    "end_finish_date": end_finish_date,
                    "user": user,
                    "express_no": express_no,
                    "goods_name": goods_name,
                    "payment_type": payment_type,
                    "order_type": order_type
                },
            success: function (data) {
                getordercount();
                //alert(JSON.stringify(data["data"][1]['order_item_list']));
                var html = '';
                if (data['data'].length == 0) {
                    html += '<table class="table v-table table-auto-center mb-10"><tbody><tr align="center"><td class="h-200" colspan="7">暂无符合条件的数据记录</td></tr></tbody></table>';
                    $(".ol_tbody").html(html);
                    return true;
                }
                //alert(JSON.stringify(data["data"][1]['order_item_list'][0]["goods_sku_list"]));
                $.each(data['data'], function (k_order, v_order) {
                    var shipping_type_name = v_order['shipping_type_name'];//配送方式
                    var order_type_name = v_order['order_type_name'];//订单类型
                    var order_type_color = v_order['order_type_color'];//订单类型颜色
                    var order_id = v_order['order_id'];//订单id
                    var order_no = v_order['order_no'];//订单编号
                    var create_time = utilAdmin.timeStampTurnTime(v_order['create_time']);//下单时间
                    var order_money = v_order['order_money'];//订单金额
                    var shipping_money = v_order['shipping_money'] - v_order['promotion_free_shipping'];//运费
                    var shipping_money = v_order['shipping_money'];//运费
                    var order_status = v_order['order_status'];
                    var status_name = v_order['status_name'];
                    var receiver_name = v_order['receiver_name']; //买家姓名
                    var receiver_mobile = v_order['receiver_mobile']; //买家电话

                    html += '<table class="table v-table table-auto-center mb-10"><tbody><tr>';
                    html += '<td colspan="7" class="tr_1st">';
                    html += '<span style="padding-right: 30px">订单编号：' + order_no + '</span><span style="padding-right: 30px">下单时间：' + create_time + '</span>';
                    if (shipping_type_name) {
                        html += '<span style="padding-right: 30px">配送方式：' + shipping_type_name + '</span>';
                    }
                    if (order_type_name) {
                        html += '<span style="padding-right: 30px">订单类型：<span class="label" style="background:#fb6638">' + order_type_name + ' </span> </span>';
                    }
                    html += '</td></tr>';

                    var buyer_info = false;
                    var row = v_order["order_item_list"].length;
                    var refund_require_money = 0;
                    var refund_deduction_point = 0;
                    $.each(v_order['order_item_list'], function (k_order_goods, v_order_goods) {
                        refund_require_money = refund_require_money + Number(v_order_goods['refund_require_money']);//总退款金额
                      	//总退款积分
                        if((v_order['shipping_status']==1 || v_order['shipping_status']==2 || v_order['shipping_status']==3) && v_order_goods['deduction_freight_point']>0){
                            refund_deduction_point = refund_deduction_point + Number(v_order_goods['deduction_point']) - Number(v_order_goods['deduction_freight_point']);
                        }else{
                            refund_deduction_point = refund_deduction_point + Number(v_order_goods['deduction_point']);
                        }
                    })
                    $.each(v_order['order_item_list'], function (k_order_goods, v_order_goods) {
                        var order_goods_id = v_order_goods['order_goods_id'];
                        var pic_cover_micro = v_order_goods["picture"]['pic_cover_mid'];//商品图
                        var goods_id = v_order_goods["goods_id"];//商品id
                        var goods_name = v_order_goods["goods_name"];
                        var price = v_order_goods["price"];//商品价格
                        var num = v_order_goods["num"];//购买数量
                        var spec_info = v_order_goods["spec"];
                        var new_refund_operation = v_order_goods['new_refund_operation'];
                        var operation = v_order['operation'];
                        var promotion_status = v_order['promotion_status'];// 标识售后订单是否整单进行售后
                        if((v_order['shipping_status']==1 || v_order['shipping_status']==2 || v_order['shipping_status']==3) && v_order_goods['deduction_freight_point']>0){
                        	var deduction_point = v_order_goods['deduction_point'] - v_order_goods['deduction_freight_point'];
                        }else{
                        	var deduction_point = v_order_goods['deduction_point'];
                        }
                        html += '<tr><td class="col-md-3">';
                        html += '<div class="media text-left">';
                        html += '<div class="media-left"><p><img src="' + __IMG(pic_cover_micro) + '" style="width:60px;height:60px;"></p></div>';
                        html += '<div class="media-body break-word"><div class="line-2-ellipsis"><a class="tdTitles" href="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + goods_id) + '&website_id=<?php echo $website_id; ?>" target="_blank">' + goods_name + '</a></div>';
                        html += '<div class="small-muted line-2-ellipsis"> ';
                        $.each(spec_info, function (spec_k, spec_v) {
                            html += spec_v['spec_name'] + ':' + spec_v['spec_value_name'] + ' ';
                        })
                        html += '</div>';
                        if (v_order_goods['refund_status'] != 0 && promotion_status != 1) {
                            //退款
                            $.each(new_refund_operation, function (k_op, v_op) {
                                html += '<a class="text-primary block ' + v_op["no"] + '" href="javascript:void(0);" data-order-id="' + order_id + '" data-order-goods-id="' + order_goods_id + '"  data-refund_require_money="' + v_order_goods['refund_require_money'] + '" data-refund_deduction_point="' + deduction_point + '" data-toggle="modal" data-target="#' + v_op["no"] + '">' + v_op['name'] + '</a>';
                            })
                        }
                        html += '</div></div>';
                        html += '</td>';
                        html += '<td class="col-md-1">￥' + price + '</td>';
                        html += '<td class="col-md-1">' + num + '件</td>';
                        if (buyer_info == false) {
                            if (row > 1) {
                                html += '<td rowspan="' + row + '" class="border-left col-md-2">';
                            } else {
                                html += '<td rowspan="' + row + '" class="col-md-2">';
                            }
                            if(v_order['shipping_type'] == '2'){
                                html += '' + v_order['buyer_name'] + '<br>' + v_order['user_name'] + '<br>' + v_order['user_tel'] + '';
                            }else{
                                html += '' + v_order['buyer_name'] + '<br>' + receiver_name + '<br>' + receiver_mobile + '';
                            }
                            html += '</td>';
                            switch (order_status) {
                                case 0:
                                    html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-red">' + status_name + '</span></p>';
                                    break;
                                case 3:
                                    html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-green">' + status_name + '</span></p>';
                                    break;
                                case 1:
                                    html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-skyBlue">' + status_name + '</span></p>';
                                    break;
                                case -1:
                                    html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-orange2">' + status_name + '</span></p>';
                                    break;
                                case 5:
                                    html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-grey">' + status_name + '</span></p>';
                                    break;
                                case 2:
                                    html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-orange">' + status_name + '</span></p>';
                                    break;
                                case 6:
                                    html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-orange2">' + status_name + '</span></p>';
                                    break;
                                case 4:
                                    html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-green">' + status_name + '</span></p>';
                                    break;
                            }
                            html += '<p><a href="' + __URL('ADMIN_MAIN/order/orderdetail?order_id=' + order_id) + '" class="text-primary">订单详情</a></p></td>';
                            html += '<td class="text-right col-md-2" rowspan="' + row + '" >';
                            if(v_order['presell_id']){
                            	html += '定金：￥' + v_order['first_money'] + '<br> 尾款：￥' + v_order['final_money'] + '<br>';
                            }else{
                            	html += '商品总额：￥' + v_order['goods_money'] + '<br>';
                            }
                            if(v_order['deduction_money']>0){
                            	html += '积分抵扣：￥' + v_order['deduction_money'] + '<br>';
                            }
                            	html += '优惠：￥' + v_order['order_promotion_money'] + '<br>';
                           		html += '运费：￥' + shipping_money + '<br>';
                            if (v_order['invoice_tax'] > 0) {
                                html += '税费：￥' + v_order['invoice_tax'] + '';
                            }
                            if(v_order['presell_id']){
                            	if(v_order['money_type']==1){
                            		html += '<br>实收金额：￥' + v_order['pay_money'] + '<br>';
                            	}else if(v_order['money_type']==2){
                            		html += '<br>实收金额：￥' + order_money + '<br>';
                            	}
                            }else{
                            	html += '<br>实收金额：￥' + order_money + '<br>';
                            }
                            html += '</td>';
                            html += '<td rowspan="' + row + '" class="col-md-2 fs-0 operationLeft">';
                            $.each(operation, function (k_status, v_status) {
                                if(v_order['order_status']==5 && v_status["no"]=='delete_order'){
                                    html += '<a class="btn-operation text-red1 ' + v_status["no"] + '" href="javascript:void(0);" data-order-id="' + order_id + '" data-toggle="modal" data-target="#' + v_status["no"] + '" data-refund_require_money="' + refund_require_money + '" data-refund_deduction_point="' + refund_deduction_point + '">' + v_status['name'] + '</a>';
                                }else{
                                    html += '<a class="btn-operation ' + v_status["no"] + '" href="javascript:void(0);" data-order-id="' + order_id + '" data-toggle="modal" data-target="#' + v_status["no"] + '" data-refund_require_money="' + refund_require_money + '" data-refund_deduction_point="' + refund_deduction_point + '" >' + v_status['name'] + '</a>';
                                }
                                
                            })
                            html += '</td>';
                            html += '</td></tr>';
                            buyer_info = true;
                        }// end buyer_info
                    })// end order_goods each
                    if(v_order['commissionA']|| v_order['commissionB'] || v_order['commissionC'] || v_order['global_bonus'] || v_order['area_bonus'] || v_order['team_bonus'] || v_order['profitA']|| v_order['profitB'] || v_order['profitC']){
                            html += '<tr class="title-tr">';
                                html += '<td colspan="7" class="text-left">';
                                if (v_order['commissionA_id']) {
                                    if(v_order['commissionA']){
                                        html += '<span class="label label-soft mr-15-oList">一级佣金：' + v_order['commissionA'] + '元</span>';
                                    }
                                    if(v_order['pointA']){
                                        html += '<span class="label label-soft mr-15-oList">一级积分：' + v_order['pointA'] + '积分</span>';
                                    }
                                }
                                if (v_order['commissionB_id']) {
                                    if(v_order['commissionB']){
                                        html += '<span class="label label-soft mr-15-oList">二级佣金：' + v_order['commissionB'] + '元</span>';
                                    }
                                    if(v_order['pointB']){
                                        html += '<span class="label label-soft mr-15-oList">二级积分：' + v_order['pointB'] + '积分</span>';
                                    }
                                }
                                if (v_order['commissionC_id']) {
                                    if(v_order['commissionC']){
                                        html += '<span class="label label-soft mr-15-oList">三级佣金：' + v_order['commissionC'] + '元</span>';
                                    }
                                    if(v_order['pointC']){
                                        html += '<span class="label label-soft mr-15-oList">三级积分：' + v_order['pointC'] + '积分</span>';
                                    }
                                }
                                if (v_order['global_bonus']) {
                                    html += '<span class="label label-success mr-15-oList">全球分红：' + v_order['global_bonus'] + '元</span>';
                                }
                                if (v_order['area_bonus']) {
                                    html += '<span class="label label-success mr-15-oList">区域分红：' + v_order['area_bonus'] + '元</span>';
                                }
                                if (v_order['team_bonus']) {
                                    html += '<span class="label label-success mr-15-oList">团队分红：' + v_order['team_bonus'] + '元</span>';
                                }
                                if (v_order['profitA_id'] && v_order['profitA']) {
                                    html += '<span class="label label-soft mr-15-oList">一级收益：' + v_order['profitA'] + '元</span>';
                                }
                                if (v_order['profitB_id'] && v_order['profitB']) {
                                    html += '<span class="label label-soft mr-15-oList">二级收益：' + v_order['profitB'] + '元</span>';
                                }
                                if (v_order['profitC_id'] && v_order['profitC']) {
                                    html += '<span class="label label-soft mr-15-oList">三级收益：' + v_order['profitC'] + '元</span>';
                                }
                                html += '</td>';
                            html += '</tr>';
                        }
                    html +='</tbody></table>';
                })// end data.data each
                $(".ol_tbody").html(html);
                utilAdmin.tips();
                utilAdmin.page('.M-box3', data['total_count'], data["page_count"], page_index, LoadingInfo);
            }
        });
    }
    //获取商品各种状态的数量
        function getordercount() {
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/order/getordercount'); ?>",
                success: function (data) {
                    $('.J-all').html('(' + data.all + ')');
                    $('.J-nopay').html('(' + data.daifukuan + ')');
                    $('.J-pay').html('(' + data.daifahuo + ')');
                    $('.J-group').html('(' + data.group + ')');
                    $('.J-forgoods').html('(' + data.yifahuo + ')');
                    $('.J-havegoods').html('(' + data.yishouhuo + ')');
                    $('.J-finish').html('(' + data.yiwancheng + ')');
                    $('.J-close').html('(' + data.yiguanbi + ')');
                    $('.J-store').html('(' + data.daiquhuo + ')');
                    $('.J-chuli').html('(' + data.chuli + ')');
                }
            });
        }

    //订单数据导出
    function dataExcel() {
        var url='url:'+__URL('ADMIN_MAIN/order/dataExcel');
        util.confirm('订单导出',url,function(){
        	var ids = '';
        	$(".excel-list .field-item").each(function(){
            	var id = $(this).data('id');
            	ids += id + ',';
        	});
            var start_date = $("#orderStartDate").val();
            var end_date = $("#orderEndDate").val();
            var pay_start_date = $("#payStartDate").val();
            var pay_end_date = $("#payEndDate").val();
            var consign_start_date = $("#sendEndDate").val();
            var consign_end_date = $("#sendStartDate").val();
            var finish_start_date = $("#finishStartDate").val();
            var finish_end_date = $("#finishEndDate").val();
            var user_info = $("#user_info").val();
            var order_no = $("#order_no").val();
            var order_status = $("#order_status").val();
            var payment_type = $("#payment_type").val();
            var express_no = $("#express_no").val();
            var goods_name = $("#goods_name").val();
			if(ids.length==0){
				util.message('请添加模板字段');
				return false;
			}
            window.location.href = __URL("ADMIN_MAIN/order/orderDataExcel" +
                "?start_date=" + start_date +
                "&end_date=" + end_date +
                "&pay_start_date=" + pay_start_date +
                "&pay_end_date=" + pay_end_date +
                "&consign_start_date=" + consign_start_date +
                "&consign_end_date=" + consign_end_date +
                "&finish_start_date=" + finish_start_date +
                "&finish_end_date=" + finish_end_date +
                "&user_info=" + user_info +
                "&order_no=" + order_no +
                "&order_status=" + order_status +
                "&payment_type=" + payment_type +
                "&express_no=" + express_no +
                "&goods_name=" + goods_name +
                "&ids=" + ids
            );
        },'xlarge');
    }

    //获取省份信息
    function getProvince(select_province_id) {
        var province_obj = $("#receiver_province")[0];
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/getProvince'); ?>",
            dataType: "json",
            success: function (data) {
                if (data != null && data.length > 0) {
                    $.each(data, function (k, v) {
                        if (select_province_id == v.province_id) {
                            var opt = new Option(v.province_name, v.province_id, false, true);
                        } else {
                            var opt = new Option(v.province_name, v.province_id);
                        }
                        province_obj.options.add(opt);
                    })
                }
            }
        });
    }

    //获取城市信息
    function getCity(province_id, select_city_id) {
        var city_obj = $("#receiver_city")[0];
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/getCity'); ?>",
            data: {'province_id': province_id},
            dataType: "json",
            success: function (data) {
                if (data != null && data.length > 0) {
                    $.each(data, function (k, v) {
                        if (select_city_id == v.city_id) {
                            var opt = new Option(v.city_name, v.city_id, false, true);
                        } else {
                            var opt = new Option(v.city_name, v.city_id);
                        }
                        city_obj.options.add(opt);
                    })
                }
            }
        });
    }

    //获取地区信息
    function getDistrict(city_id, select_district_id) {
        var district_obj = $("#receiver_district")[0];
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/getDistrict'); ?>",
            data: {'city_id': city_id},
            dataType: "json",
            success: function (data) {
                if (data != null && data.length > 0) {
                    $.each(data, function (k, v) {
                        if (select_district_id == v.district_id) {
                            var opt = new Option(v.district_name, v.district_id, false, true);
                        } else {
                            var opt = new Option(v.district_name, v.district_id);
                        }
                        district_obj.options.add(opt);
                    })
                }
            }
        });
    }

    //提交修改的收货地址
    function updateAddressSubmit() {
        var receiver_name = $("#receiver_name").val();
        var receiver_mobile = $("#receiver_mobile").val();
        var receiver_province = $("#receiver_province").val();
        var receiver_city = $("#receiver_city").val();
        var receiver_district = $("#receiver_district").val();
        var address_detail = $("#receiver_address").val();
        var order_id = $("#order_id").val();
        if (receiver_name == '') {
            utilAdmin.message("请填写收货人姓名");
            $("#receiver_name").focus();
            return false;
        }
        if (!(/^1(3|4|5|7|8)\d{9}$/.test(receiver_mobile))) {
            utilAdmin.message("请填写正确格式的手机号");
            $("#receiver_mobile").focus();
            return false;
        }
        if (receiver_province <= 0) {
            utilAdmin.message("请选择省");
            return false;
        }
        if (receiver_city <= 0) {
            utilAdmin.message("请选择市");
            return false;
        }

        if ($("#seleAreaFouth option").length > 1) {
            if (receiver_district <= 0) {
                utilAdmin.message("请选择区/县");
                return false;
            }
        }
        if (address_detail == '') {
            utilAdmin.message("请填写详细收货地址");
            return false;
        }

        $.ajax({
            type: 'post',
            url: "<?php echo __URL('ADMIN_MAIN/order/updateOrderAddress'); ?>",
            data: {
                "order_id": order_id,
                "receiver_name": receiver_name,
                "receiver_mobile": receiver_mobile,
                "seleAreaNext": receiver_province,
                "seleAreaThird": receiver_city,
                "seleAreaFouth": receiver_district,
                "address_detail": address_detail
            },
            success: function (data) {
                if (data.code > 0) {
                    utilAdmin.message("修改收货地址成功", "success");
                } else {
                    utilAdmin.message("修改收货地址失败", "danger");
                }
            }
        });
    }

    //修改备注
    function addMemoAjax() {
        var order_id = $("#order_id").val();
        var memo = $("#memo").val();
        if (memo == '') {
            $(".error").css("display", "block");
            return false;
        }
        $.ajax({
            url: "<?php echo __URL('ADMIN_MAIN/order/addmemo'); ?>",
            data: {"order_id": order_id, "memo": memo},
            type: "post",
            success: function (data) {
                if (data["code"] > 0) {
                    utilAdmin.message(data["message"], "success", function () {
                        LoadingInfo($("#page_index").val());
                    });
                } else {
                    utilAdmin.message(data["message"], "danger");
                }
            }
        });
    }

    //订单付款
    function orderOffLinePay() {
        var order_id = $("#order_id").val();
        var seller_memo = $("#pay_seller_memo").val();
        var payment_type = $("#modal_payment_type").val();

        utilAdmin.alert('是否确定买家已付款',function(){
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/order/orderofflinepay'); ?>",
                data: {
                    'order_id': order_id,
                    'payment_type': payment_type,
                    'seller_memo': seller_memo
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        utilAdmin.message(data["message"], "success", function () {
                            LoadingInfo($("#page_index").val());
                        });
                    } else {
                        utilAdmin.message(data["message"], "danger");
                    }
                }
            });
        })
    }

    //获取订单、物流信息
    function getOrderDelivery(data_target) {
        var order_id = $("#order_id").val();
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/orderdeliverydata'); ?>",
            data: {'order_id': order_id},
            success: function (data) {
                if (data_target == '#delivery') {
                    setDelivery(data);
                } else if (data_target == '#update_shipping') {
                    setUpdateShipping(data)
                }
            }
        });
    }

    //修改收货人信息
    //获取订单收货地址
    function getReceiverAddress(order_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo __URL('ADMIN_MAIN/order/getOrderUpdateAddress'); ?>",
            data: {"order_id": order_id},
            success: function (data) {
                $("#receiver_name").val(data['receiver_name']);
                $("#receiver_mobile").val(data['receiver_mobile']);
                $("#receiver_address").val(data['receiver_address']);
                $("#receiver_zip").val(data['receiver_zip']);
                var province_id = data['receiver_province'] > 0 ? data['receiver_province'] : -1;
                var city_id = data['receiver_city'] > 0 ? data['receiver_city'] : -1;
                var district_id = data['receiver_district'] > 0 ? data['receiver_district'] : -1;

                //if ($("#receiver_province option").length == 0) {
                    //$("#receiver_province option").remove();
                    getProvince(province_id);
                //}
                //if ($("#receiver_city option").length == 0) {
                    getCity(province_id, city_id);
                //}
                //if ($("#receiver_district option").length == 0) {
                    getDistrict(city_id, district_id);
                //}

                $("#province_id").val(province_id);
                $("#city_id").val(city_id);
                $("#district_id").val(district_id);
            }
        });
    }

    //发货modal数据填充
    function setDelivery(data) {
        var goods_list_html = '';
        $.each(data['order_goods_list'], function (k, goods) {
            goods_list_html += '<tr>';
            goods_list_html += '<td>';
            if (goods['shipping_status'] > 0 || goods['refund_status'] != 0) {
                goods_list_html += '<input class="decorate" type="checkbox" name="select_goods" value="' + goods['shipping_status'] + '" disabled>';
            } else {
                goods_list_html += '<input class="decorate" type="checkbox" id="' + goods['order_goods_id'] + '" value="' + goods['shipping_status'] + '" name="select_goods" checked>';
            }
            goods_list_html += '</td>';

            goods_list_html += '<td class="picword_td">';
            goods_list_html += '<div class="media text-left ">';

            goods_list_html +='<div class="media-left">';
            goods_list_html +='<p><img src="' + __IMG(goods['picture_info']['pic_cover_mid']) + '" style="width:40px;height:40px;"></p>';
            goods_list_html +='</div>';
            goods_list_html +='<div class="media-body max-w-300 ">';
            goods_list_html +='<div class="line-2-ellipsis line-title"><a href="' + __URL('SHOP_MAIN/goods/goodsinfo?goodsid=' + goods['goods_id'] + '&website_id=' + goods['website_id']) + '" target="_blank" class="a-goods-title">'+goods['goods_name']+' </a></div>';
            goods_list_html +='<div class="small-muted line-2-ellipsis">';
            $.each(goods['spec'],function (k,v) {
                goods_list_html += '<span>' + v.spec_name + ':' + v.spec_value_name + '</span> ';
            })
            goods_list_html +='</div>';
            goods_list_html +='</div>';

            goods_list_html +='</div>';
            goods_list_html += '</td>';

            goods_list_html += '<td>' + goods['num'] + '</td>';
            if (goods['shipping_status'] == 0 || goods['express_info']['express_company'] == undefined) {
                goods_list_html += '<td class="w20"></td>';
            } else {
                goods_list_html += '<td class="w20">' + goods['express_info']['express_no'] + '</td>';
            }
            if (goods['refund_status'] != 0){
                goods_list_html += '<td>' + goods['status_name'] + '</td>';
            } else {
                goods_list_html += '<td>' + goods['shipping_status_name'] + '</td>';
            }
            goods_list_html += '</tr>';

            $("#delivery_goods_list").html(goods_list_html);
            var receiver_info = '<span>' + data['order_info']['receiver_name'] + '</span> ' + '<span>' + data['order_info']['receiver_mobile'] + '</span> ' + '<span>' + data['order_info']['address'] + ' ' + data['order_info']['receiver_address'] + '</span>';
            $("#receiver_info").html(receiver_info);

            var co_html = '<option value="0">请选择物流公司</option>';
            $.each(data['express_company_list'], function (k, company) {
                if (company['is_enabled'] == '1') {
                    co_html += '<option value="' + company["co_id"] + '">' + company["company_name"] + '</option>';
                }
            })
            $("#delivery_express_company").html(co_html);
            $("#delivery_express_company").val(data['order_info']["shipping_company_id"]);
        })
    }

    // 提交发货数据
    function orderDeliverySubmit() {
        var order_id = $("#order_id").val();
        var order_goods_id_array = '';
        $("#delivery tbody input[name = 'select_goods'][value = 0]:checked").each(function (i) {
            if (0 == i) {
                order_goods_id_array = $(this).attr('id');
            } else {
                order_goods_id_array += ("," + $(this).attr('id'));
            }
        });
        if (order_goods_id_array == '') {
            utilAdmin.message("至少选择一个商品");
            return false;
        }
        var express_name = $("#delivery_express_company").find("option:selected").text();
        var shipping_type = 1;//有物流公司
        var express_company_id = $("#delivery_express_company").val();
        var express_no = $("#delivery_express_no").val();
        var reg = /^[0-9a-zA-Z]+$/
        if (!reg.test(express_no)) {
            utilAdmin.message("物流单号只能为数字字母组合");
            return false;
        }
        if (shipping_type == 1) {
            if (express_company_id == "0") {
                utilAdmin.message("请选择物流公司");
                return false;
            }
            if (express_no == "") {
                utilAdmin.message("请填写快递单号");
                $("#delivery_express_no").focus();
                return false;
            }
        }

        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/orderdelivery'); ?>",
            data: {
                'order_id': order_id,
                "order_goods_id_array": order_goods_id_array,
                "express_name": express_name,
                "shipping_type": shipping_type,
                "express_company_id": express_company_id,
                "express_no": express_no,
                'seller_memo': $("#delivery_seller_memo").val()
            },
            success: function (data) {
                if (data['code'] > 0) {
                    utilAdmin.message(data["message"], "success", function () {
                        LoadingInfo($("#page_index").val());
                    });
                } else {
                    utilAdmin.message(data["message"], "danger");
                }
            }
        });
    }

    //修改物流modal数据填充
    function setUpdateShipping(data) {
        window.package_list = {};
        window.order_info = data['order_info'];
        window.express_company_list = data['express_company_list'];
        var receiver_info = '<span>' + data['order_info']['receiver_name'] + '</span> ' + '<span>' + data['order_info']['receiver_mobile'] + '</span> ' + '<span>' + data['order_info']['address'] + ' ' + data['order_info']['receiver_address'] + '</span>';
        $("#shipping_receiver_info").html(receiver_info);
        var co_html = '<option value="0">请选择物流公司</option>';
        $.each(data['express_company_list'], function (k, company) {
            if (company['is_enabled'] == '1') {
                co_html += '<option value="' + company["co_id"] + '">' + company["company_name"] + '</option>';
            }
        })
        $("#shipping_express_company").html(co_html);

        var shipping_package = '';
        $.each(data['order_info']['goods_packet_list'], function (i, packet) {
            if (i === 0) {
                shipping_package += '<li class="active" data-id="' + packet['express_id'] + '">' + packet['packet_name'] + '</li>';
                $("#update_shipping_express_no").val(packet['express_code']);
                $("#shipping_express_company").val(packet['express_company_id']);
                var goods_list = '';
                $.each(packet['order_goods_list'], function (i, goods) {
                    goods_list += '<tr>';
                    goods_list += '<td></td>';
                    goods_list += '<td class="picword_td">';
                    // goods_list += '<div class="col-sm-3 pic_td">' + '<img src="' + __IMG(goods["picture_info"]['pic_cover_micro']) + '">' + '</div>';
                    // goods_list += '<div class="col-sm-9 word_td">';
                    // goods_list += '<p class="tdTitles">';
                    // goods_list += '<a href="' + __URL('SHOP_MAIN/goods/goodsinfo?goodsid=' + goods['goods_id'] + '&website_id=' + goods['website_id']) + '" target="_blank">';
                    // goods_list +=  goods['goods_name'] + '</a></p>';
                    // goods_list += '<p class="desc">';
                    // $.each(goods['spec'],function (k,v) {
                    //     goods_list += '<span>' + v.spec_name + ':' + v.spec_value_name + '</span> ';
                    // })
                    // goods_list += '</p>';
                    // goods_list += '</div>';
                    goods_list += '<div class="media text-left">';
                    goods_list += '<div class="media-left"><p><img src="' + __IMG(goods["picture_info"]['pic_cover_mid']) + '" style="width:60px;height:60px;"></p></div>';
                    goods_list += '<div class="media-body max-w-300"><div class="line-2-ellipsis"><a class="tdTitles" href="' + __URL('SHOP_MAIN/goods/goodsinfo?goodsid=' + goods['goods_id'] + '&website_id=' + goods['website_id']) + '" target="_blank">' + goods['goods_name'] + '</a></div>';
                    goods_list += '<div class="small-muted line-2-ellipsis"> ';
                    $.each(goods['spec'],function (k,v) {
                        goods_list += '<span>' + v.spec_name + ':' + v.spec_value_name + '</span> ';
                    })
                    goods_list += '</div>';
                    goods_list += '</div></div>';

                    goods_list += '</td>';
                    goods_list += '<td>' + goods['num'] + '</td>';
                    goods_list += '<td class="w20">' + goods['express_info']['express_no'] + '</td>';
                    goods_list += '<td>' + goods['shipping_status_name'] + '</td>';
                    goods_list += '</tr>';
                })
                $("#shipping_goods_list").html(goods_list);
            } else {
                shipping_package += '<li data-id="' + packet['express_id'] + '">' + packet['packet_name'] + '</li>';
            }
            package_list[packet['express_id']] = packet;
        })
        $("#shipping_package").html(shipping_package);
    }

    //切换包裹
    function switchPackageData(express_id) {
        var receiver_info = '<span>' + order_info['receiver_name'] + '</span> ' + '<span>' + order_info['receiver_mobile'] + '</span> ' + '<span>' + order_info['address'] + ' ' + order_info['receiver_address'] + '</span>';
        $("#shipping_receiver_info").html(receiver_info);
        var co_html = '<option value="0">请选择物流公司</option>';
        $.each(express_company_list, function (k, company) {
            if (company['is_enabled'] == '1') {
                co_html += '<option value="' + company["co_id"] + '">' + company["company_name"] + '</option>';
            }
        })
        $("#shipping_express_company").html(co_html);

        $("#update_shipping_express_no").val(package_list[express_id]['express_code']);
        $("#shipping_express_company").val(package_list[express_id]['express_company_id']);
        var goods_list = '<tr>';
        $.each(package_list[express_id]['order_goods_list'], function (i, goods) {
            goods_list += '<td></td>';
            goods_list += '<td class="picword_td">';
            // goods_list += '<div class="col-sm-3 pic_td">' + '<img src="' + __IMG(goods["picture_info"]['pic_cover_micro']) + '">' + '</div>';
            // goods_list += '<div class="col-sm-9 word_td">';
            // goods_list += '<p class="tdTitles">';
            // goods_list += '<a href="' + __URL('SHOP_MAIN/goods/goodsinfo?goodsid=' + goods['goods_id'] + '&website_id=' + goods['website_id']) + '" target="_blank">';
            // goods_list += goods['goods_name'] + '</a></p>';
            // goods_list += '<p class="desc">';
            // $.each(goods['spec'],function (k,v) {
            //     goods_list += '<span>' + v.spec_name + ':' + v.spec_value_name + '</span> ';
            // })
            // goods_list += '</p>';
            // goods_list += '</div>';
             goods_list += '<div class="media text-left">';
             goods_list += '<div class="media-left"><p><img src="' + __IMG(goods["picture_info"]['pic_cover_mid']) + '" style="width:60px;height:60px;"></p></div>';
             goods_list += '<div class="media-body max-w-300"><div class="line-2-ellipsis"><a class="tdTitles" href="' + __URL('SHOP_MAIN/goods/goodsinfo?goodsid=' + goods['goods_id'] + '&website_id=' + goods['website_id']) + '" target="_blank">' + goods['goods_name'] + '</a></div>';
             goods_list += '<div class="small-muted line-2-ellipsis"> ';
            $.each(goods['spec'],function (k,v) {
                goods_list += '<span>' + v.spec_name + ':' + v.spec_value_name + '</span> ';
            })
             goods_list += '</div>';
             goods_list += '</div></div>';

            goods_list += '</td>';
            goods_list += '<td>' + goods['num'] + '</td>';
            goods_list += '<td>' + goods['express_info']['express_no'] + '</td>';
            goods_list += '<td>' + goods['shipping_status_name'] + '</td>';
            goods_list += '</tr>';
        })
        $("#shipping_goods_list").html(goods_list);
    }

    // 提交修改的物流信息
    function updatePackageShippingInfo() {
        var order_id = $("#order_id").val();
        var id = $(".parcel").find(".active").attr('data-id');
        var express_name = $("#shipping_express_company").find("option:selected").text();
        var express_company = $("#shipping_express_company").find("option:selected").text();
        var express_company_id = $("#shipping_express_company").val();
        var express_no = $("#update_shipping_express_no").val();
        var reg = /^[0-9a-zA-Z]+$/
        if (!reg.test(express_no)) {
            utilAdmin.message("物流单号只能为数字字母组合");
            return false;
        }
        if (express_company_id == "0") {
            utilAdmin.message("请选择物流公司");
            return false;
        }
        if (express_no == "") {
            utilAdmin.message("请填写快递单号");
            $("#delivery_express_no").focus();
            return false;
        }

        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/updateOrderDelivery'); ?>",
            data: {
                'order_id' : order_id,
                'id' : id,
                'express_name': express_name,
                'express_company':express_company,
                'express_company_id': express_company_id,
                'express_no': express_no,
                'seller_memo': $("#update_shipping_seller_memo").val()
            },
            success: function (data) {
                if (data['code'] > 0) {
                    utilAdmin.message(data["message"], "success", function () {
                        LoadingInfo($("#page_index").val());
                    });
                } else {
                    utilAdmin.message(data["message"], "danger");
                }
            }
        });
    }

    //修改单价
    function modifyPrice() {
        window.order_equation_data = {};
        var order_id = $("#order_id").val();
        var str = "";
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/getordergoods'); ?>",
            data: {"order_id": order_id},
            dataType: "json",
            async: false,
            success: function (data) {
                var order_info = data[1];
                data = data[0];
                order_equation_data['shipping_money'] = order_info.shipping_money - order_info.promotion_free_shipping;
                order_equation_data['total_amount'] = parseFloat(order_info.pay_money) + parseFloat(order_info.user_platform_money);
                order_equation_data['goods'] = {};
                for (var i = 0; i < data.length; i++) {
                    //订单实收：(<span>1099.00</span> + <span>10.00</span>) * 1 + <span>0.00</span> = <span class="red" id="order_money">2109.00</span>
                    order_equation_data['goods'][data[i].sku_id] = [];
                    order_equation_data['goods'][data[i].sku_id]['actual_price'] = data[i].actual_price;
                    order_equation_data['goods'][data[i].sku_id]['num'] = data[i].num;
                    order_equation_data['goods'][data[i].sku_id]['sign'] = '+'
                    order_equation_data['goods'][data[i].sku_id]['adjust_price'] = 0;

                    str += "<tr data-sku-id=" + data[i].sku_id + ">";
                    str += "<td class='picword_td'>";
                    str += '<div class="media text-left">';
                    str += '<div class="media-left"><p><img src="' + __IMG(data[i]['picture_info']['pic_cover_mid']) + '" style="width:60px;height:60px;"></p></div>';
                    str += '<div class="media-body max-w-300"><div class="line-2-ellipsis"><p class="tdTitles">' + data[i].goods_name + '</p></div>';
                    str += '<div class="small-muted line-2-ellipsis"> ';
                     $.each(data[i]['spec'],function (k,v) {
                        str += v.spec_name + ':' + v.spec_value_name + ' ';
                    })
                    str += '</div>';
                    str += '</div></div>';

                    str += "</td>";
                    str += "<td>￥" + data[i].actual_price + "</td>";
                    str += "<td>" + data[i].num + "</td>";
                    str += "<td><input type='text' data-actual-price='" + data[i]['actual_price'] + "' class='J-edit-price' id='" + data[i]['order_goods_id'] + "'></td></tr>";
                }
                $("#adjust_price_modal").html(str);
                $("#adjust_shipping_fee_modal").val(order_info.shipping_money - order_info.promotion_free_shipping);
                showAdjustPrice();
                if (order_info.shipping_type == 2) {
                    // 自提不允许修改运费
                    $('.add2').prop('disabled', true)
                    $('#adjust_shipping_fee_modal').prop('disabled', true)
                } else {
                    $('.add2').removeAttr('disabled')
                    $('#adjust_shipping_fee_modal').removeAttr('disabled')
                }
            }
        });
    }

    //免运费
    function setFreeShippingFee() {
        $("#adjust_shipping_fee_modal").val(0);
        buildAdjustPriceData($(".J-edit-freight"));
        showAdjustPrice();
    }


    //更新价格数据
    function buildAdjustPriceData(obj) {
        if (obj.hasClass('J-edit-price')) {
            var sku_id = obj.parent().parent().attr('data-sku-id');
            var obj_adjust_price = obj.val();
            var actual_price = obj.data('actual-price');
            if (obj_adjust_price >= 0) {
                order_equation_data['goods'][sku_id]['sign'] = '+';
                order_equation_data['goods'][sku_id]['adjust_price'] = Math.abs(obj_adjust_price);
                //order_equation_data['total_amount'] += (order_equation_data['goods'][sku_id]['adjust_price'] * order_equation_data['goods'][sku_id]['num']);
            } else if (obj_adjust_price < 0) {
                if (Math.abs(obj_adjust_price) > actual_price){
                    obj.val(-actual_price);
                    obj_adjust_price = actual_price
                }
                order_equation_data['goods'][sku_id]['sign'] = '-';
                order_equation_data['goods'][sku_id]['adjust_price'] = Math.abs(obj_adjust_price);
                //order_equation_data['total_amount'] -= (order_equation_data['goods'][sku_id]['adjust_price'] * order_equation_data['goods'][sku_id]['num']);
            }
        } else if (obj.hasClass('J-edit-freight')) {
            var old_shipping_money = order_equation_data['shipping_money'];
            if (obj.val() < 0) {
                obj.val(0);
            }
            if (old_shipping_money >= 0) {
                order_equation_data['shipping_money'] = obj.val();
                order_equation_data['total_amount'] += order_equation_data['shipping_money'] - old_shipping_money;
            }
        }
        order_equation_data['total_amount'] = order_equation_data['shipping_money'] * 1;
        $.each(order_equation_data['goods'], function (sku_id, sku) {
            if (sku.sign == '+') {
                order_equation_data['total_amount'] += sku.actual_price * sku.num + sku.adjust_price * sku.num;
            } else if (sku.sign == '-') {
                order_equation_data['total_amount'] += sku.actual_price * sku.num - sku.adjust_price * sku.num;
            }
        });
    }

    //显示式子
    function showAdjustPrice() {
        var span_str = '';
        $.each(order_equation_data['goods'], function (sku_id, sku) {
            span_str += "(<span>" + sku.actual_price + "</span>";
            span_str += "<span>" + sku.sign + "</span>";
            span_str += "<span>" + sku.adjust_price + "</span>)";
            span_str += " * " + sku.num;
            span_str += " + ";
        })
        span_str += order_equation_data['shipping_money'];
        span_str += " = " + "<span>" + order_equation_data['total_amount'] + "</span>";
        $("#adjust_order_amount").html(span_str);
    }

    //保存修改的价格
    function updPrice() {
        var order_id = $("#order_id").val();
        var order_goods_id_adjust_array = '';
        var shipping_fee = $("#adjust_shipping_fee_modal").val();
        var memo = $("#modal_memo").val();
        $('.J-edit-price').each(function (i) {
            if (0 == i) {
                order_goods_id_adjust_array = $(this).attr('id') + ',' + $(this).val();
            } else {
                order_goods_id_adjust_array += ';' + $(this).attr('id') + ',' + $(this).val();
            }
        });
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/orderadjustmoney'); ?>",
            data: {
                "order_id": order_id,
                "order_goods_id_adjust_array": order_goods_id_adjust_array,
                "shipping_fee": shipping_fee,
                "memo": memo
            },
            dataType: "json",
            async: false,
            success: function (data) {
                if (data["code"] > 0) {
                    utilAdmin.message(data["message"], "success", function () {
                        LoadingInfo($("#page_index"));
                    });
                } else {
                    utilAdmin.message(data["message"],"danger");
                }
            }
        });
    }

    //同意退款操作
    function agreeRefund(order_id, order_goods_id,return_id=0) {
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/Order/orderGoodsRefundAgree'); ?>",
            async: true,
            data: {'order_id': order_id, "order_goods_id": order_goods_id,"return_id":return_id},
            success: function (data) {
                if (data['code'] > 0) {
                    utilAdmin.message(data["message"], "success", function () {
                        LoadingInfo($("#page_index").val());
                    });
                } else {
                    utilAdmin.message(data["message"], "danger");
                }
            }
        });
    }

    // 拒绝退款操作
    function refuseRefundType(order_id, order_goods_id, reason, type) {
        if (type == 1) {
            var refund_url = "<?php echo __URL('ADMIN_MAIN/order/ordergoodsrefuseonce'); ?>";
        } else {
            var refund_url = "<?php echo __URL('ADMIN_MAIN/order/ordergoodsrefuseforever'); ?>";
        }
        $.ajax({
            type: "post",
            url: refund_url,
            data: {
                'order_id': order_id,
                'order_goods_id': order_goods_id,
                'reason': reason
            },
            success: function (data) {
                if (data['code'] > 0) {
                    utilAdmin.message("已拒绝", "success", function () {
                        LoadingInfo($("#page_index").val());
                    });
                } else {
                    utilAdmin.message(data["message"], "danger");
                }
            }
        });
    }

    //退货申请操作(和退款申请一样的处理)
    function judgeReturn() {
        var order_id = $("#order_id").val();
        var order_goods_id = $("#order_goods_id").val();
        if ($("#return_agree").prop('checked')) {
        	var return_id = $("#address_return").val();
        	if(return_id==0){
				util.message('请选择退货地址');
				return false;
        	}
            agreeRefund(order_id, order_goods_id,return_id);
        } else {
            var reason = $("#reject_return_reason").val();
            refuseRefundType(order_id, order_goods_id, reason, 1)
        }
    }

    function judgeReceipt() {
        var order_id = $("#order_id").val();
        var order_goods_id = $("#order_goods_id").val();
        if ($("#confirm").prop('checked')) {
            agreeReturn(order_id, order_goods_id);
        } else {
            var reason = $("#refuse_receipt_reason").val();
            refuseRefundType(order_id, order_goods_id, reason, 1);
        }
    }

    // 确认签收
    function agreeReturn(order_id, order_goods_id) {
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/ordergoodsconfirmreceive'); ?>",
            data: {'order_id': order_id, "order_goods_id": order_goods_id},
            success: function (data) {
                if (data['code'] > 0) {
                    utilAdmin.message("已签收", "success", function () {
                        LoadingInfo($("#page_index").val());
                    });
                } else {
                    utilAdmin.message(data["message"], "danger");
                }
            }
        });
    }

    $('body').on('click','.add1',function(){
        orderOffLinePay();
    });
    $('body').on('click','.add2',function(){
        setFreeShippingFee();
    });
    $('body').on('click','.add3',function(){
        updPrice();
    });
    $('body').on('click','.add4',function(){
        addMemoAjax()
    });
    $('body').on('click','.add6',function(){
        orderDeliverySubmit()
    });
    $('body').on('click','.add7',function(){
        updateAddressSubmit()
    });
    $('body').on('click','.add8',function(){
        updatePackageShippingInfo()
    });
    $('body').on('click','.add9',function(){
        judgeReceipt()
    });
    $('body').on('click','.add11',function(){
         judgeReturn();
    });
    $('.search').on('click', function () {
         LoadingInfo(1)
    });
    $('.dataExcel').on('click',function(){
         dataExcel()
    });
    // 确认收货dialog
    $('body').on('click', '.getdelivery', function () {
        var order_id = $(this).attr('data-order-id');
        utilAdmin.alert('确认此订单已收货吗？', function () {
            $.ajax({
                url: "<?php echo __URL('ADMIN_MAIN/order/orderTakeDelivery'); ?>",
                data: {"order_id": order_id},
                type: "post",
                success: function (data) {
                    if (data.code > 0) {
                        utilAdmin.message(data["message"], "success", function () {
                            LoadingInfo($("#page_index").val());
                        });
                    } else {
                        utilAdmin.message(data["message"], "danger");
                    }
                }
            });
        })

    })

    function click(obj) {
        obj.find('input:radio[name=result]').on('click', function () {
            if ($(this).val() == 0) {
                obj.find('.reason').addClass('hide');
            } else {
                obj.find('.reason').removeClass('hide');
            }
        })
    }

    //审核退款
    $('#list').on('click', '.judge_refund', function () {
    	var refund_require_money = $(this).data('refund_require_money');
    	var refund_deduction_point = $(this).data('refund_deduction_point');
        var html = '<form class="form-horizontal padding-15">';
        html += '<div class="form-group"><label class="col-md-3 control-label">售后类型</label><div class="col-md-8"><p class="form-control-static">退款</p></div></div>';
        if(refund_require_money>0){
        	html += '<div class="form-group"><label class="col-md-3 control-label">退款金额</label><div class="col-md-8"><p class="form-control-static">￥'+ refund_require_money +'</p></div></div>';
        }
        if(refund_deduction_point>0){
            html += '<div class="form-group"><label class="col-md-3 control-label">退款积分</label><div class="col-md-8"><p class="form-control-static">'+ refund_deduction_point +'</p></div></div>';
        }
        html += '<div class="form-group"><label class="col-md-3 control-label">处理结果</label><div class="col-md-8"><label class="radio-inline"><input type="radio" name="result" value="0" /> 同意退款</label><label class="radio-inline"><input type="radio" name="result" value="1" /> 拒接退款</label></div></div>';
        html += '<div class="form-group reason hide"><label class="col-md-3 control-label">拒绝理由</label><div class="col-md-8"><textarea id="reason" class="form-control" rows="4"></textarea></div></div>';
        html += '</form>';
        var order_id = $(this).attr('data-order-id');
        var order_goods_id = $(this).attr('data-order-goods-id');
        util.confirm('审核退款', html, function () {
            if (this.$content.find('input:radio[name=result]').prop('checked')) {
                agreeRefund(order_id, order_goods_id);
            } else {
                var reason = this.$content.find("#reason").val();
                refuseRefundType(order_id, order_goods_id, reason, 1)
            }
        }, function () {
            click(this.$content)
        })

    })
    //审核打款
    $('#list').on('click','.confirm_refund', function () {
        var order_id = $(this).attr('data-order-id');
        var order_goods_id = $(this).attr('data-order-goods-id');
        var payment_type = $(this).attr('data-payment-type');
        var payment_type_presell = $(this).attr('data-payment-type-presell');
    	var refund_require_money = $(this).data('refund_require_money');
    	var refund_deduction_point = $(this).data('refund_deduction_point');
        var html = '<form class="form-horizontal padding-15">';
        html += '<div class="form-group"><label class="col-md-3 control-label">售后类型</label><div class="col-md-8"><p class="form-control-static">退款</p></div></div>';
        if(refund_require_money>0){
        	html += '<div class="form-group"><label class="col-md-3 control-label">退款金额</label><div class="col-md-8"><p class="form-control-static">￥'+ refund_require_money +'</p></div></div>';
        }
        if(refund_deduction_point>0){
            html += '<div class="form-group"><label class="col-md-3 control-label">退款积分</label><div class="col-md-8"><p class="form-control-static">'+ refund_deduction_point +'</p></div></div>';
        }
        html += '<div class="form-group"><label class="col-md-3 control-label">处理结果</label><div class="col-md-8"><label class="radio-inline"><input type="radio" name="result" value="0" /> 同意打款</label><label class="radio-inline"><input type="radio" name="result" value="1" /> 拒绝打款</label></div></div>';
        html += '<div class="form-group reason hide"><label class="col-md-3 control-label">拒绝理由</label><div class="col-md-8"><textarea id="reason" class="form-control" rows="4"></textarea></div></div>';
        html += '</form>';
        util.confirm('审核打款', html, function () {
            if (this.$content.find('input:radio[name=result]').prop('checked')) {
                // 执行确认
                orderGoodsConfirmRefund(order_id, order_goods_id);
            } else {
                var reason = this.$content.find("#reason").val();
                refuseRefundType(order_id, order_goods_id, reason, 1)
            }
        }, function () {
            click(this.$content)
        })
    })
    
    //确认退款
    function orderGoodsConfirmRefund(order_id, order_goods_id) {
        $.ajax({
            type: "post",
            url: __URL(ADMINMAIN + "/order/ordergoodsconfirmrefund"),
            data: {
                'order_id': order_id,
                "order_goods_id": order_goods_id
            },
            success: function (data) {
                if (data['code'] > 0) {
               	 utilAdmin.message(data["message"], "success", function () {
                        LoadingInfo($("#page_index").val());
                    });
                    tipCount();
                } else {
               	 utilAdmin.message(data['message'], "danger");
                }
            }
        });
    }
  })
</script>

</body>
</html>