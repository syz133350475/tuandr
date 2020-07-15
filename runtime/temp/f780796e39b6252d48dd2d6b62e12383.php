<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/www/wwwroot/www.tuandr.com/addons/gift/template/admin/addGift.html";i:1583811696;}*/ ?>

<!-- page -->
<form class="form-horizontal form-validate pt-15 widthFixedForm">
    <input type="hidden" class="form-control"  id="gift_id" name="gift_id" value="<?php echo $gift_info['promotion_gift_id']; ?>">
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>赠品名称</label>
        <div class="col-md-5">
            <div class="input-group">
                <input type="text" class="form-control"  id="gift_name" name="gift_name" required value="<?php echo $gift_info['gift_name']; ?>">
                <span class="input-group-btn" id="selectGoods"><a href="javascript:void(0);" class="btn btn-info">商品列表导入</a></span>
            </div>
        </div>
        <!--<div class="col-md-3">
            <div  id="selectGoods" class="btn btn-primary-diy">商品列表导入</div>
        </div>-->
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>售价</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input type="text" class="form-control"  id="price" name="price" required value="<?php echo $gift_info['price']; ?>" autocomplete="off">
                <div class="input-group-addon">元</div>
            </div>
            <div class="help-block mb-0">赠品的价值，用于前端呈现</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>库存</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input type="text" class="form-control"  id="stock" name="stock" required value="<?php echo $gift_info['stock']; ?>" autocomplete="off">
                <div class="input-group-addon">件</div>
            </div>
            <div class="help-block mb-0">赠品剩余数量，数量为0时则停止赠送</div>
        </div>
    </div>
    <div class="form-group">
    <label class="col-md-2 control-label"><span class="text-bright">*</span>赠品图片</label>
    <div class="col-md-8">
        <div class="border-default padding-15">
            <div class="mb-20">
                <div class="picture-list">
                    <?php if(count($gift_info['img_temp_array']) > 0): foreach($gift_info["img_temp_array"]  as $vo): ?>
                    <a href="javascript:void(0);" id="goods_pic_list" style="margin-right:10px;">
                        <i class="icon icon-danger" style="right:-15px;" title="删除"></i>
                        <img src="<?php echo __IMG($vo['pic_cover']); ?>" />

                    </a>
                    <input type="hidden" name="upload_img_id" value="<?php echo $vo['pic_id']; ?>" />
                    <?php endforeach; endif; ?>
                    <a href="javascript:void(0);" class="plus-box" data-toggle="multiPicture"><i class="icon icon-plus"></i></a>
                </div>
            </div>
            <p class="small-muted">第一张为主图，最多上传5张，支持同时上传多张，建议700*700，支持JPG\GIF\PNG格式，最大不超过1M</p>
        </div>
        <input type="text" class="visibility" name="picture" data-visi-type="multiPicture">
    </div>
</div><!-- 图片 end -->
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>赠品详情</label>
        <div class="col-md-9 J-desc">
            <div id="UE-gift-content" data-content='<?php echo $gift_info['description']; ?>'></div>
        </div>
    </div>

    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-primary J-submit" type="submit"><?php if($gift_info): ?>保存<?php else: ?>添加<?php endif; ?></button>
            <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
        </div>
    </div>

</form>

<!-- page end -->


<script>
    require(['utilAdmin'], function (utilAdmin) {
    if($('.picture-list').find("input[name='upload_img_id']").length > 4){
        $('.picture-list').find(".plus-box").hide();
    }
    // 有图片则开启验证
    $('.picture-list').bind('DOMNodeInserted',function(e){
        if($(this).find("input").attr('name')=='upload_img_id'){
            $('.visibility').removeAttr('required');
            var lengths=$(this).find("input[name='upload_img_id']").length;
            if(lengths>4){
                $(this).find(".plus-box").fadeOut();
            }
        }
    });
     $('.picture-list').bind('DOMNodeRemoved',function(e){
         if($(this).find("input").attr('name')=='upload_img_id'){
            $('.visibility').attr('required','required');
            var lengths=$(this).find("input[name='upload_img_id']").length;
            if(lengths<5){
                $(this).find(".plus-box").show();
            }
         }
     });
        utilAdmin.validate($('.form-validate'), function (form) {
            var btnHtml = $('.J-submit').html();
            if($('.J-submit').attr('disabled')==='disabled'){
                return false;
            }
            var gift_id = $("#gift_id").val();
            var gift_name = $("#gift_name").val();
            var price = $("#price").val();
            var stock = $("#stock").val();
            var description = $('#UE-gift-content').data('content');
            var img_id =[];
            $("input[name='upload_img_id']").each(function(){
                img_id.push($(this).val());
            });
            var pic_length = $(".picture-list #goods_pic_list");
            var length = pic_length.size();
            if(length>5){
                utilAdmin.message("赠品图片不能超过5张");
                return false;
            }
            if(length<1){
                utilAdmin.message("请选择赠品图片");
                return false;
            }
            $('.J-submit').attr({disabled: "disabled"}).html('提交中...');
            $.ajax({
                type: "post",
                url: "<?php echo $addOrUpdateGiftUrl; ?>",
                data: {
                    'gift_id': gift_id,
                    'gift_name': gift_name,
                    'price': price,
                    'description': description,
                    'stock': stock,
                    'imageArray': img_id
                },
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        // utilAdmin.message(data["message"], 'success', "<?php echo __URL('ADDONS_ADMIN_MAINgiftList'); ?>");
                        utilAdmin.message(data["message"], 'success',function(){
                            window.location.href="<?php echo __URL('ADDONS_ADMIN_MAINgiftList'); ?>";
                        });
                    } else {
                        utilAdmin.message(data["message"], 'danger');
                        $('.J-submit').removeAttr('disabled').html(btnHtml);
                    }
                }

            });
        });
        $('#selectGoods').click(function () {
            utilAdmin.goodsDialog('url:'+'<?php echo $modalGiftGoodsList; ?>',function(data){
            });
        });
    });
</script>

