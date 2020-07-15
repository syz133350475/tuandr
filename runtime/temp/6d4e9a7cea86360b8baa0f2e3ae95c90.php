<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/www.tuandr.com/addons/discount/template/platform/discountSetting.html";i:1583811702;}*/ ?>

        <!-- page -->
        <form class="form-horizontal pt-15 widthFixedForm">
            <div class="form-group">
                <label class="col-md-2 control-label">是否开启</label>
                <div class="col-md-5">
                    <div class="switch-inline">
                        <input type="checkbox" name="is_use" id="is_use" <?php if($is_use==1): ?>checked<?php endif; ?>>
                        <label for="is_use" class=""></label>
                    </div>
                    <div class="mb-0 help-block">关闭后，所有限时抢购的活动均不生效</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary save" id="save" type="button">保存</button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
        </form>

        <!-- page end -->


<script>
    require(['util'],function(util){
        $("#save").on("click",function () {
            $.ajax({
                type:'POST',
                dataType:'json',
                url:"<?php echo __URL('PLATFORM_MAIN/Menu/addonmenu&addons=discountSet'); ?>",
                data:{
                    'is_use':$("input[name='is_use']").is(':checked')? 1 : 0,
                },
                success:function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('PLATFORM_MAIN/Menu/addonmenu&addons=discountSet'); ?>");
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        })
    })
</script>

