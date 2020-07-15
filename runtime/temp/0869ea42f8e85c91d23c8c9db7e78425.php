<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/www.tuandr.com/addons/shop/template/platform/shopApplyModal.html";i:1583811694;}*/ ?>
<form class="form-horizontal padding-15" role="form">
    <div class="form-group">
        <label for="shop_name" class="col-sm-3 control-label">店铺名称</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="shop_name" name="shop_name" value="<?php echo $result['shop_name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="shop_type" class="col-sm-3 control-label">店铺分类</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="shop_type" name="shop_type" value="<?php echo $result['shop_group_name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="apply_state" class="col-sm-3 control-label">处理结果</label>
        <div class="col-sm-8">
            <label class="radio-inline">
                <input type="radio" name="apply_state" value="2"  <?php if($result['apply_state'] != -1): ?> checked <?php endif; ?>> 审核通过
            </label>
            <label class="radio-inline">
                <input type="radio" name="apply_state" value="-1" <?php if($result['apply_state'] == -1): ?> checked <?php endif; ?>> 审核不通过
            </label>
        </div>
    </div>
    <div class="J-pass" <?php if($result['apply_state'] == -1): ?> style="display:none" <?php endif; ?>>
        <div class="form-group">
            <label for="shop_platform_commission_rate" class="col-sm-3 control-label">平台抽成</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <input type="number" class="form-control" min="0" id="shop_platform_commission_rate" name="shop_platform_commission_rate">
                    <div class="input-group-addon">%</div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="margin" class="col-sm-3 control-label">保证金</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <input type="number" class="form-control" min="0" id="margin" name="margin">
                    <div class="input-group-addon">元</div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="shop_audit" class="col-sm-3 control-label">审核入驻店商品</label>
            <div class="col-sm-8">
                <div class="switch-inline">
                    <input type="checkbox" id="shop_audit" name="shop_audit">
                           <label for="shop_audit" class=""></label>
                </div>
                <p class="help-block">开启后该商家发布的商品都需要平台审核才能上架</p>
            </div>
        </div>
    </div>
    <div class="J-unpass" <?php if($result['apply_state'] != -1): ?> style="display:none" <?php endif; ?>>
         <div class="form-group">
            <label for="refuse_reason" class="col-sm-3 control-label">拒绝原因</label>
            <div class="col-sm-8">
                <textarea class="form-control valid" rows="4" name="refuse_reason" id="refuse_reason" aria-invalid="false"><?php echo $result['refuse_reason']; ?></textarea>
            </div>
        </div>
    </div>
</form>
<script>
   $('input[name="apply_state"]').on('change',function(){
        var value=$(this).val();
        if(value==2){
            $('.J-pass').show();
            $('.J-unpass').hide();
        }else{
            $('.J-pass').hide();
            $('.J-unpass').show();
        }
    })
</script>