<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"template/platform/Goods/brandDialog.html";i:1591330108;}*/ ?>
<form class="form-horizontal">
    <!--品牌-->
    <div class="form-group" style="margin-right: auto;margin-left: auto;">
        <div class="col-md-8" style="width: 720px">
            <div class="transfer-box">
                <div class="item">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis">
                            <label><input type="checkbox" name="brandAllCheck" value="">未选品牌</label>
                        </div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请输入品牌名称" id="brand_txt">
                            <i class="icon icon-custom-search search_button" id="brand_search"></i>
                        </div>
                    </div>
                    <div id="unbrand_id" class="heights">
                        <?php if(is_array($brand_array['data']) || $brand_array['data'] instanceof \think\Collection || $brand_array['data'] instanceof \think\Paginator): if( count($brand_array['data'])==0 ) : echo "" ;else: foreach($brand_array['data'] as $key=>$v): if(!in_array($v['brand_id'],$brand_id)): ?>
                        <div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_brandid" value="<?php echo $v['brand_id']; ?>" data_name="<?php echo $v['brand_name']; ?>" ><?php echo $v['brand_name']; ?></label></div>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="item">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis">已选品牌</div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请输入品牌名称" id="brand_txt_selected">
                            <i class="icon icon-custom-search"></i>
                        </div>
                    </div>
                    <div id="brand_id" class="heights">
                        <?php if(is_array($brand_array['data']) || $brand_array['data'] instanceof \think\Collection || $brand_array['data'] instanceof \think\Paginator): if( count($brand_array['data'])==0 ) : echo "" ;else: foreach($brand_array['data'] as $key=>$v): if(in_array($v['brand_id'],$brand_id)): ?>
                        <div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="select_brand[]" value="<?php echo $v['brand_id']; ?>" data_name="<?php echo $v['brand_name']; ?>" checked><?php echo $v['brand_name']; ?></label></div>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<input type="hidden" id="selectedData">
<script type="text/javascript">
    require(['util'], function (util) {
        var brandSelect=[];//未选品牌的集合
        var brandSelected=[];//已选品牌的集合
        //保存已选id
        function setSelected(){
            var brand_id_arr = [];
            for(var i=0;i<brandSelected.length;i++){
                brand_id_arr.push(brandSelected[i].value);
            }
            var brand_id=brand_id_arr.join(",");
            $('#selectedData').val(brand_id);
        }
        // 获取未选品牌数组
        $("input[name='un_brandid']").each(function(){
            var val = $(this).val();
            var name = $(this).attr('data_name');
            var obj ={};
            obj.value = val;
            obj.name = name;
            brandSelect.push(obj);
        });
        //获取已选品牌数组
        $("input[name='select_brand[]']").each(function(){
            var val = $(this).val();
            var name = $(this).attr('data_name');
            var obj ={};
            obj.value = val;
            obj.name = name;
            brandSelected.push(obj);
            setSelected();
        });
        //品牌
        $(".heights").on("click","input[name='un_brandid']",function () {
            $(this).parent().parent().remove();  //移动左边
            var val = $(this).val();
            var name = $(this).attr('data_name');
            var html = '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="select_brand[]" value="'+val+'" data_name="'+name+'" checked>'+name+'</label></div>';
            $("#brand_id").append(html);  //添加到右边
            // 已选品牌数组增加
            var obj={};
            obj.value = val;
            obj.name = name;
            brandSelected.push(obj);
            setSelected();
            //未选品牌数组减少
            for(var i=0;i<brandSelect.length;i++){
                if(val==brandSelect[i].value){
                    brandSelect.splice(i,1);
                }
            }

        });
        //取消
        $(".heights").on("click","input[name='select_brand[]']",function () {
            $(this).parent().parent().remove();  //移动左边
            var val = $(this).val();
            var name = $(this).attr('data_name');
            var html = '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_brandid" value="'+val+'" data_name="'+name+'">'+name+'</label></div>';
            $("#unbrand_id").append(html);  //添加到右边
            //已选品牌数组减少
            for(var i=0;i<brandSelected.length;i++){
                if(val==brandSelected[i].value){
                    brandSelected.splice(i,1);
                }
            }
            setSelected();
            // 未选品牌数组增加
            var obj={};
            obj.value = val;
            obj.name = name;
            brandSelect.push(obj);

        });
        // 品牌全选
        $('input[name="brandAllCheck"]').on('change',function(){
            if($(this).is(':checked')) {
                $('input[name="un_brandid"]').each(function(){
                    $(this).parent().parent().remove();  //移动左边
                    var val = $(this).val();
                    var name = $(this).attr('data_name');
                    var html = '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="select_brand[]" value="'+val+'" data_name="'+name+'" checked>'+name+'</label></div>';
                    $("#brand_id").append(html);  //添加到右边
                    // 已选品牌数组增加
                    var obj={};
                    obj.value = val;
                    obj.name = name;
                    brandSelected.push(obj);
                    setSelected();
                    //未选品牌数组减少
                    for(var i=0;i<brandSelect.length;i++){
                        if(val==brandSelect[i].value){
                            brandSelect.splice(i,1);
                        }
                    }

                })
            }
            else{
                $('input[name="select_brand[]"]').each(function(){
                    $(this).parent().parent().remove();  //移动左边
                    var val = $(this).val();
                    var name = $(this).attr('data_name');
                    var html = '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_brandid" value="'+val+'" data_name="'+name+'">'+name+'</label></div>';
                    $("#unbrand_id").append(html);  //添加到右边
                    //已选品牌数组减少
                    for(var i=0;i<brandSelected.length;i++){
                        if(val==brandSelected[i].value){
                            brandSelected.splice(i,1);
                        }
                    }
                    setSelected();
                    // 未选品牌数组增加
                    var obj={};
                    obj.value = val;
                    obj.name = name;
                    brandSelect.push(obj);

                })
            }
        });

        //  未选品牌搜索
        $("#brand_txt").on('keyup',function(){
             var val=$(this).val();
             var html='';
             for(var i=0;i<brandSelect.length;i++){
                 var names = brandSelect[i].name;
                 if(names.indexOf(val)!=-1){
                     html+='<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_brandid" value="'+brandSelect[i].value+'" data_name="'+brandSelect[i].name+'">'+brandSelect[i].name+'</label></div>';
                 }
             }
            //  if(html==''){
            //      html='搜索不到品牌';
            //  }
             $("#unbrand_id").html(html);
             if(brandSelect.length>0){
                 $("input[name='brandAllCheck']").attr('checked',false);
             }
             else{
                 $("input[name='brandAllCheck']").attr('checked',true);
             }
        })
        //  已选品牌搜索
        $("#brand_txt_selected").on('keyup',function(){
             var val=$(this).val();
             var html='';
             for(var i=0;i<brandSelected.length;i++){
                 var names = brandSelected[i].name;
                 if(names.indexOf(val)!=-1){
                     html+='<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="select_brand[]" value="'+brandSelected[i].value+'" data_name="'+brandSelected[i].name+'" checked>'+brandSelected[i].name+'</label></div>';
                 }
             }
            //  if(html==''){
            //      html='搜索不到品牌';
            //  }
             $("#brand_id").html(html);
        })

    });
</script>