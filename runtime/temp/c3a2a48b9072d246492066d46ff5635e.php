<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/www.tuandr.com/addons/wapport/template/platform/wapConfig.html";i:1583811704;}*/ ?>

<form class="form-horizontal pt-15 form-validate widthFixedForm wapconfig hide">
    <div class="form-group">
        <label class="col-md-2 control-label">商城链接</label>
        <div class="col-md-5">
            <div class="input-group item">
                <input type="text" class="form-control wap_url"  value="" disabled>
                <input style="opacity: 0;position: absolute; z-index: -11;" type="text" class="form-control" id="wap_url" value="" >
                <span class="input-group-btn copy8"><a href="javascript:void(0);" class="btn btn-default">复制链接</a></span>
            </div>
            <p class="help-block mb-0">请使用手机浏览器访问该链接，如果商城已对接微信公众号，在公众号访问该链接将会转换成公众号商城。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">商城二维码</label>
        <div class="col-md-5">
            <div class="picture-list">
                <div class="preview_code"><img id="web_qrcode" src="" alt="" width="100px" height="100px"></div>
            </div>
            <p class="help-block mb-0">（使用手机浏览器扫码）</p>
        </div>
    </div>
</form>
<form class="form-horizontal pt-15 form-validate widthFixedForm wapconfigs hide">
    <div class="form-group">
        <div class="col-md-5">
            <div class="input-group item">
           移动商城未开启，请前往<a class="text-primary" href="<?php echo __URL('PLATFORM_MAIN/config/sysconfig'); ?>">开启</a>
            </div>
            <p class="help-block mb-0">移动商城包含H5商城与公众号商城，使用前先把移动商城开启
            </p>
        </div>
    </div>
</form>


<script>
    require(['util'], function (util) {
        util.copy2('.copy8','wap_url');
        checkIsUse();
        function checkIsUse() {
            $.ajax({
                'url':"<?php echo __URL('PLATFORM_MAIN/system/getWapConfig'); ?>",
                'type':'post',
                'data':{},
                success:function(data){
                    if(data.wap_status == 0){
                        util.alert('商城还没有开启移动商城，请先开启移动商城。', function () {
                            window.open("<?php echo __URL('PLATFORM_MAIN/config/sysconfig'); ?>&type=payment");
                            util.alert('是否已设置完成？', function(){
                                $.ajax({
                                    'url':"<?php echo __URL('PLATFORM_MAIN/system/getWapConfig'); ?>",
                                    'type':'post',
                                    'data':{},
                                    success:function(data){
                                        if(data.wap_status == 1){
                                            $('.wapconfig').removeClass('hide');
                                            $('.wapconfigs').addClass('hide');
                                            $('.wap_url').val(data.wap_url);
                                            $('#wap_url').val(data.wap_url);
                                            $('#web_qrcode').attr("src","<?php echo __URL('PLATFORM_MAIN/index/getWapCode'); ?>");
                                        }else{
                                            $('.wapconfigs').removeClass('hide');
                                        }
                                    }
                                })
                            })
                        })
                    }else{
                        $('.wapconfig').removeClass('hide');
                        $('.wapconfigs').addClass('hide');
                        $('.wap_url').val(data.wap_url);
                        $('#wap_url').val(data.wap_url);
                        $('#web_qrcode').attr("src","<?php echo __URL('PLATFORM_MAIN/index/getWapCode'); ?>");
                    }
                }
            })
        }
    });
</script>

