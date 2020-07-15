<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:28:"template/platform/modal.html";i:1583811744;}*/ ?>

<?php if($type=='install'): ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">关联分类</h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-sm-5 control-label">分类</label>
            <div class="col-sm-5">
                <select id="category_id" name="category_id" class="form-control">
                    <?php if(is_array($category_list) || $category_list instanceof \think\Collection || $category_list instanceof \think\Paginator): if( count($category_list)==0 ) : echo "" ;else: foreach($category_list as $key=>$vt): ?>
                    <option value="<?php echo $vt['category_id']; ?>"><?php echo $vt['category_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <input type="hidden" id="addon_name" value="<?php echo $addon_name; ?>">
    <button class="btn btn-primary J-ins" style="display:inline-block;">保存</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
</div>
<script>
require(['util'],function(util){
    $('.J-ins').click(function(){
        install();
    })
    //添加分组
    function install() {
        var addon_name = $("#addon_name").val();
        var category_id = $("#category_id").val();
        $.ajax({
            type: "post",
            url: "<?php echo __URL('PLATFORM_MAIN/versions/install'); ?>",
            data: {
                'addon_name': addon_name,
                'category_id': category_id
            },
            async: true,
            success: function (data) {
                if (data["code"] > 0) {
                    $("#install").modal('hide');
                    $.ajax({
                        url : __URL(PLATFORMMAIN+"/System/deleteCache"),
                        type : "post",
                        data : {},
                        success : function(data) {
                            if (data) {
                                util.message('操作成功', 'success',location.reload());
                            } 
                        }
                    });
                    util.message("操作成功！", 'success', function () {
                         if (typeof (LoadingInfo) == "function") {
                             LoadingInfo();
                         }
                     });
                } else {
                    util.message('操作失败','danger');
                    return false;
                }
            }
        });
    }
});
</script>
<?php endif; ?>
<script>
    $(".modal").on("hidden.bs.modal", function () {
        $(this).removeData("bs.modal");
        /*modal页面加载$()错误,由于移除缓存时加载到<span style="color:rgb(51,51,255);"><div class="modal-content"></div></span>未移除的数据，手动移除加载的内容*/
        $(this).find(".modal-content").children().remove();
    });
</script>
