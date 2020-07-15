<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:31:"template/admin/Login/login.html";i:1591322839;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录页面 - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>团大人 - 让更多的人帮你卖货！<?php endif; ?></title>
    <link rel="stylesheet" href="__STATIC__/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="__STATIC__/css/common.css">
    <link rel="stylesheet" href="ADMIN_CSS/shop.css">
    <link rel="stylesheet" href="PLATFORM_NEW_CSS/jquery.slider.css">
    <link rel="stylesheet" href="__STATIC__/lib/drag/layer.css">
    <style>
        /*以下css仅针对本页面*/
        html,
        body {
            height: 100%;
        }

        body {
            background: url("ADMIN_IMG/bg.jpg") top center no-repeat;
            background-size: cover;
            position: relative;
        }


        .fl {
            float: left;
        }

        #slider1{
            margin-left: 48px;
            margin-bottom: 20px;
        }
        .login-box{
            width: 400px;
        }
        .login-box .login-right{
            width: 400px;
            padding-left: 0;
            text-align: center;
        }
        .logos{
            text-align: center;
            margin-top: 20px;
        }
        .login-box .login-right .title{
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .login-box .login-right dl{
            margin: 0 auto 20px;
            border-radius: 4px;
        }
        .login-right .submit{
            margin-right:0; 
        }
        .login-box .tips {
            width: 300px;
            margin: 10px 0 10px 50px;
            /* color: #fff; */
        }
        .fr {
            float: right;
        }
    </style>
</head>

<body onkeydown="keyLogin();">
<div class="login-box" style="background-color: #fff">
    <!--<div class="login-left">
        <div class="img"><img src="ADMIN_IMG/logo.png" alt=""></div>
    </div>-->
    <div class="logos" ><img src="<?php if($logo_config['admin_logo']): ?><?php echo $logo_config['admin_logo']; else: ?>ADMIN_IMG/logo.png<?php endif; ?>" alt="" width="68" height="70"></div>
    <div class="login-right">
        <form action="">
            <h3 class="title">系统管理中心</h3>

            <dl class="clearfix">
                <dt class="userName fl"><img src="PLATFORM_STATIC/login_register/L-account.png" alt=""></dt>
                <dd class="userName-ipt fl"><input type="text" class="inputs" autocomplete="off"  id="username"></dd>
            </dl>
            <dl class="clearfix">
                <dt class="userName fl"><img src="PLATFORM_STATIC/login_register/L-pwd.png" alt=""></dt>
                <dd class="userName-ipt fl"><input type="password" class="inputs" id="password" autocomplete="off"></dd>
            </dl>
            <div style="margin: 0 auto;">
                <div id="slider1"></div>
            </div>
            <div class="submits">
                <input type="button"  onclick="login()" value="立即登录" class="submit" disabled="disabled">
            </div>
            <div class="tips clearfix">
                <div class="fr"><a href="<?php echo __URL('ADMIN_MAIN/login/retrievePwd?website_id='.$website_id); ?>" class="blue">忘记密码</a></div>
            </div>
        </form>
    </div>
</div>
<input type="hidden" id="website_id" value="<?php echo $website_id; ?>">
<script type="text/javascript" src="__STATIC__/lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/slideunlock/jquery.slideunlock.js"></script>
<script type="text/javascript" src="__STATIC__/lib/slideunlock/jquery.slider.min.js"></script>
<script type="text/javascript" src=""></script>
<script src="__STATIC__/lib/drag/layer.js"></script>
<script>
    // pc端移动端判断
    (function () {
        var url = location.href;
        // replace www.test.com with your domain
        if (navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i)) {
            location.href = "<?php echo __URL('ADMIN_MAIN/login/loginMobile'); ?>&website_id="+$('#website_id').val();
        }
    })();
        
              // ie浏览器判断
    function isIE() {
        if (!!window.ActiveXObject || "ActiveXObject" in window){
            location.href="<?php echo __URL('ADMIN_MAIN/login/versionLow'); ?>&website_id="+$('#website_id').val();
        }
     }
     isIE();

function keyLogin(){
    if (event.keyCode==13 && $('.submit').hasClass('okSubmit')){
        //回车键的键值为13
        $(".submit").click(); //调用登录按钮的登录事件
    }   
}
$("#slider1").slider({
    width: 300, // width
    height: 40, // height
    fontSize: 14,
    callback: function (result) {
        if(result){
            $(".submit").addClass("okSubmit").removeAttr("disabled");
        }
    }
});
document.onkeypress = function(event) {
    if($(".submit").attr("disabled")==='disabled'){
        return;
    }
    var iKeyCode = -1;
    if (arguments[0]) {
            iKeyCode = arguments[0].which;
    } else {
            iKeyCode = event.keyCode;
    }
    if (iKeyCode == 13) {
            // 登录
            $(".submit").click();
    }
};
function login() {
    ClearCookie();
    var username = $("#username").val();
    if (username == '') {
        layer.msg('用户名不能为空', {time: 1000}, function () {
            $("#username").focus();
        });
        return false;
    }
    var password = $("#password").val();
    if (password == '') {
        layer.msg('密码不能为空', {time: 1000}, function () {
            $("#password").focus();
        });
        return false;
    }
    $.ajax({
        type: "post",
        url: "<?php echo __URL('ADMIN_MAIN/login/login'); ?>",
        data: {
            'userName': username,
            'website_id': $('#website_id').val(),
            'password': password
        },
        success: function (data) {
            if (data["code"] > 0) {
                $(".submit").attr("disabled", "disabled");
                window.location.href = "<?php echo __URL('ADMIN_MAIN/index/index'); ?>";
                return true;
            }else if(data["code"] == -1001){
                layer.msg('商城已过期，请联系商家', {time: 3000});
                return false;
            }else if(data["code"] == -3000){
                layer.msg('无权限访问，请检查当前访问链接', {time: 3000});
                return false;
            } else {
                layer.msg('用户名或密码错误', {time: 1000});
                return false;

            }
        }
    });
}
function ClearCookie() {
    var expires = new Date();
    expires.setTime(expires.getTime() - 1000);
    document.cookie = "appCode='';path=/;expires=" + expires.toGMTString() + "";
    document.cookie = "roleID='';path=/;expires=" + expires.toGMTString() + "";
    document.cookie = "parentMenuID='';path=/;expires=" + expires.toGMTString() + "";
    document.cookie = "currentMenuName='';path=/;expires=" + expires.toGMTString() + "";
}
</script>
</body>
</html>