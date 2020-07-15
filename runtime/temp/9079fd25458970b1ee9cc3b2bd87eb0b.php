<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/www/wwwroot/www.tuandr.com/addons/miniprogram/template/platform/miniProgramAuth.html";i:1583811700;}*/ ?>

<table class="table table-bordered text-center mini-program-manage">
    <tbody>
    <tr>
        <td>
            <div class="box">
                <div class="qr">
                    <div><i class="icon icon-mini-program" style="color: #00c700"></i></div>
                </div>
                <p>我已经注册小程序<br><span class="small-muted">小程序管理员扫码授权给微商来</span></p>
                <div>
                    <a href="<?php echo $auth_url; ?>" class="btn btn-primary">立即授权</a>
                </div>
            </div>
        </td>
        <td>
            <div class="box">
                <div class="qr">
                    <div><i class="icon icon-mini-program-o" style="color: #C2CFE0"></i></div>
                </div>
                <p>我还没有注册小程序<br><a href="http://kf.qq.com/faq/170109iQBJ3Q170109JbQfiu.html" class="text-primary" target="_blank">不懂如何申请小程序？</a></p>
                <div>
                    <a href="https://mp.weixin.qq.com/wxopen/waregister?action=step1" referrerpolicy="no-referrer" target="_blank" class="btn btn-success">去微信公众平台申请</a>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>
<div class="panel panel-default">
    <div class="form-heading">授权说明：</div>
    <div class="padding-15">
        <p class="p">1、 成功授权小程序后才能对小程序进行管理操作（预览、发布等操作）。</p>
        <p class="p">2、为保证所有功能的正常使用，授权时请保持默认选择，勾选所以权限，且小程序帐号没有授权给其他第三方平台。</p>
        <p class="p">3、小程序授权时，微信端会出现小程序与公众号的列表，请注意选择小程序。</p>
    </div>
</div>


<script>
    require(['util'], function (util) {

    })
</script>

