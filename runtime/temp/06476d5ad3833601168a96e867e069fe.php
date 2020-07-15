<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:46:"template/platform/System/albumPictureList.html";i:1591330114;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
            

<input type="hidden" id="album_id" value="<?php echo $album_id; ?>" />
                <!-- page -->
                <div class="mb-10 flex flex-pack-justify">
                    <div class="">
                        <a class="btn btn-default">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="checkAll">全选
                            </label>
                        </a>
                        <button class="btn btn-default" id="checkInvert">反选</button>
                        <button class="btn btn-default batchOperate" operate-type="del">批量删除</button>
                        <button class="btn btn-default batchOperate" operate-type="change">移动素材</button>
                        <span class="btn btn-info btn-file fileupload">上传图片<input type="file" name="file_upload" multiple></span>
                        <span class="btn btn-info btn-file fileupload" data-is_video="1">上传视频<input type="file" name="file_upload"></span>
                    </div>
                    <div class="flex">
                        <div class="input-group search-input-group ml-10">
                            <input type="text" class="form-control" placeholder="素材名称" name="pic_name">
                            <span class="input-group-btn">
                                <a class="btn btn-primary search">搜索</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row picture" id="pictureList">

                </div>
                <!-- page end -->
                <input type="hidden" id="pageIndex">
                <nav aria-label="Page navigation" class="clearfix">
                    <ul id="page" class="pagination pull-right"></ul>
                </nav>

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
require(['util'],function(util){
    $(function(){

    $('.search').on('click',function(){
        util.initPage(LoadingInfo);
    });
    util.initPage(LoadingInfo);
    //加载信息
    function LoadingInfo(page_index) {
        var album_id = $("#album_id").val();
        var pic_name = $("input[name='pic_name']").val();
        $("#pageIndex").val(page_index);
        $.ajax({
            type: "post",
            url: "<?php echo __URL('PLATFORM_MAIN/system/albumPictureList'); ?>",
            async: true,
            data: {
                "page_index": page_index,
                "album_id": album_id,
                "pic_name": pic_name
            },
            success: function (data) {
                var html = '';
                if (data["data"].length > 0) {
                    for (var i = 0; i < data["data"].length; i++) {
                        html +='<div class="thumbnail">';
                        html +='<label class="img selectPic">';
                        html +='<input type="checkbox" value="' + data["data"][i]["pic_id"] + '" name="id[]" value="' + data["data"][i]["pic_id"] + '">';
                        if(data["data"][i]["is_wide"]){

                            html += '<video width="100%" height="100%" id="img_' + data["data"][i]["pic_id"] + '" src="' + __IMG(data["data"][i]["pic_cover"]) + '"></video>';
                        }else{
                            html += '<img id="img_' + data["data"][i]["pic_id"] + '" src="' + __IMG(data["data"][i]["pic_cover"] ? data["data"][i]["pic_cover"] : data["data"][i]["pic_cover_mid"]) + '">';
                        }
                        html +='</label>';
                        html +='<p class="name" id="pic_name"><span class="line-1-ellipsis pic_name">' + data["data"][i]["pic_name"] + '</span><i class="icon icon-edit editChange" title="修改名称"></i>';
                        html +='<input type="hidden" name="picid" value="' + data["data"][i]["pic_id"] + '">';
                        html += '<input class="editTextarea edit_name" value="'+data["data"][i]["pic_name"]+'" style="margin-left:6px;width: 140px;display: none"></p>';
                        html +='<div class="operation">';
                        if (!data["data"][i]["is_wide"]) {
                            html +='<a class="btn btn-sm btn-info btn-file fileupload" data-is_video="'+data["data"][i]["is_wide"]+'">替换上传<input type="file" name="file_upload"></a>';
                        }
                        html +='<a href="javascript:void(0);" class="btn btn-sm btn-default changePic" data-picid="1">移动素材</a>';
                        if(!data['data'][i]['is_wide']){
                            html +='<a href="javascript:void(0);" class="btn btn-sm btn-default cover">设为封面</a>';
                        }
                        html +='<a href="javascript:void(0);" class="btn btn-sm btn-default delPic" data-picid="' + data["data"][i]["pic_id"] + '">删除素材</a>';
                        html +='<a href="javascript:void(0);" class="btn btn-sm btn-default copy" data-clipboard-text="' + __IMG(data["data"][i]["pic_cover"]) + '">复制链接</a>';
                        html +='<input type="hidden" name="pic_id" value="' + data["data"][i]["pic_id"] + '">';
                        html +='</div>';
                        html +='</div>';
                    }
                    
                    util.copy();
                } else {
                    html += '<div class="empty-box">暂无符合条件的数据记录</div>';
                }
                $("#pictureList").html(html);

                $('#page').paginator('option', {
                    totalCounts: data['total_count']  // 动态修改总数
                });
            }
        });
    }

    //修改图片名
    $("body").on("click",'.editChange',function(){
        // $(this).parent().next().next().show();
        // $(this).prev().hide();
        // $(this).hide();
        $(this).siblings(".pic_name").hide();
        $(this).siblings(".edit_name").show();
        $(this).siblings(".edit_name").focus();

    });
    $("body").on("blur",".edit_name",function(){
        var id = $(this).prev().val();
        var name = $(this).val();

        $.ajax({
            type: "post",
            data:{
                "id":id,
                "name":name,
            },
            url: "<?php echo __URL('PLATFORM_MAIN/system/update_pic_name'); ?>",
            success: function (data) {
                if(data['code']>0){
                    util.message("修改成功","success",LoadingInfo($('#pageIndex').val()));
                    // $(this).hide();
                    // $(this).parent().find('.pic_name').html(name);
                    // $(this).parent().find('.pic_name').show();
                    // $(this).parent().find('.editChange').show();
                }else{
                    util.message(data['message'],"danger");
                }

            }
        })
        $(this).prev().html(name);
    })

    //全选
    $("#checkAll").on('click',function(){
        $("#pictureList input[type = 'checkbox']").prop("checked", this.checked);
    })
    //反选
    $("#checkInvert").on('click',function(){
        $("#pictureList input[type = 'checkbox']").each(function(){
            $(this).prop("checked",!$(this).prop("checked"));
        });
    })
    // 批量操作
    $('.batchOperate').on('click',function(){
        var type = $(this).attr('operate-type');
        var id = [];
        $("#pictureList input[type ='checkbox']").each(function(){
            if($(this).prop("checked")){
                id.push($(this).val())
            }
        })

        if(!util.isEmpty(id)){
            id = id.join(',');
            if(type=='del'){
                delPic(id)
            }
            if(type=='change'){
                util.confirm('移动素材', 'url:<?php echo __URL('PLATFORM_MAIN/system/move_pic'); ?>', function () {
                    var album_id = $("#album_list").val();
                    $.ajax({
                        type: "post",
                        url: "<?php echo __URL('PLATFORM_MAIN/system/modifyAlbumPictureClass'); ?>",
                        async: true,
                        data: {
                            "album_id":album_id,
                            "pic_id":id
                        },
                        success: function (data) {
                            if (data["code"] > 0) {
                                util.message(data["message"], 'success', LoadingInfo($('#pageIndex').val()));
                            } else {
                                util.message(data["message"], 'danger', LoadingInfo($('#pageIndex').val()));
                            }
                        }
                    })
                })
            }
        }else{
            util.message('请选择素材！')
        }


    })

    // 删除图片
    $('body').on('click','.delPic',function(){
        var id = $(this).data('picid');
        delPic(id)
    })

    function delPic(picid){
        util.alert('确定删除素材吗？',function(){
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/system/deletepicture'); ?>",
                data: {"pic_id_array": picid},
                dataType: "json",
                success: function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"],'success',LoadingInfo($('#pageIndex').val()));
                    } else {
                        util.message("素材使用中，无法删除!",'danger',LoadingInfo($('#pageIndex').val()));
                    }
                }
            });
        })
    }

        //设为封面
        $('body').on('click','.cover',function(){
            var pic_id = $(this).nextAll('input[name=pic_id]').val();
            util.alert('确定设为封面吗',function(){
                var album_id = $("#album_id").val();
                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('PLATFORM_MAIN/system/modifyalbumclasscover'); ?>",
                    data: {"pic_id": pic_id, "album_id": album_id},
                    dataType: "json",
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',LoadingInfo($('#pageIndex').val()));
                        } else {
                            util.message(data["message"],'danger',LoadingInfo($('#pageIndex').val()));
                        }
                    }
                });
            })
        })

        //移动图片
        $('body').on('click','.changePic',function () {
            var pic_id = $(this).nextAll('input[name=pic_id]').val();
            if(!pic_id){
                util.message('参数错误', 'danger');
                return;
            }
            util.confirm('移动素材', 'url:<?php echo __URL('PLATFORM_MAIN/system/move_pic'); ?>', function () {
                var album_id = $("#album_list").val();

                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('PLATFORM_MAIN/system/modifyAlbumPictureClass'); ?>",
                    async: true,
                    data: {
                        "album_id":album_id,
                        "pic_id":pic_id
                    },
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo($('#pageIndex').val()));
                        } else {
                            util.message(data["message"], 'danger', LoadingInfo($('#pageIndex').val()));
                        }
                    }
                })
            })
        })


        $('body').on('click','.fileupload',function(){
            var pic_id = $(this).nextAll('input[name=pic_id]').val();
            var is_video = $(this).data('is_video');
            //上传到相册
            if(pic_id=='undefined' || pic_id==''){
                var album_id = $("#album_id").val();
                
                var dataAlbum = {
                    "album_id" : album_id,
                    "type" : "1,2,3,4",
                    "file_type" : 0
                };
                if(is_video){
                    dataAlbum = {
                        "album_id" : album_id,
                        "type" : "",
                        "file_type" : 1
                    };
                }
                var path = "<?php echo __URL('PLATFORM_MAIN/upload/uploadFile'); ?>";
                util.fileupload(path,dataAlbum,function (data) {
                    if(data.state=='1') {
                        var id = data.file_id;
                        var html = '<img src="' + data.file_name + '" id="img_' + id + '">';
                        $('#img_'+id).html(html);
                        util.message(data.message, 'success',LoadingInfo($('#pageIndex').val()));
                    }else{
                        util.message(data.message, 'danger');
                    }
                })
            }else{
                var album_id = $("#album_id").val();
                var dataAlbum = {
                    "album_id" : album_id,
                    "type" : "1,2,3,4",
                    "file_type" : 0,
                    "pic_id" :pic_id
                };
                if(is_video){
                    dataAlbum = {
                        "album_id" : album_id,
                        "type" : "",
                        "file_type" : 1,
                        "pic_id" :pic_id
                    };
                }
                console.log(dataAlbum);
                var path = "<?php echo __URL('PLATFORM_MAIN/upload/uploadFile'); ?>";
                util.fileupload(path, dataAlbum, function (data) {
                    if(data.state=='1') {
                        var id = data.file_id;
                        var html = '<img src="' + data.file_name + '" id="img_' + id + '">';
                        $('#img_'+id).html(html);
                        util.message(data.message, 'success',LoadingInfo($('#pageIndex').val()));
                    }else{
                        util.message(data.message, 'danger');
                    }
                })
            }


        })


    })
})
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

