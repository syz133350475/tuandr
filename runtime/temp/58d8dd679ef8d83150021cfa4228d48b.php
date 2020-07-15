<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/www/wwwroot/www.tuandr.com/addons/shop/template/platform/shopGroup.html";i:1583811694;}*/ ?>





        <!-- page -->

        <div class="mb-20">
            <a href="<?php echo __URL('ADDONS_MAINaddShopGroup'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加分类</a>
        </div>

        <table class="table v-table table-auto-center">
            <thead>
                <tr>
                    <th>排序</th>
                    <th>分类名称</th>
                    <th>是否显示</th>
                    <th class="col-md-2 pr-14 operationLeft">操作</th>
                </tr>
            </thead>
            <tbody id="list">
                

            </tbody>
        </table>
    <input type="hidden" id="page_index">
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="page" class="pagination pull-right"></ul>
        </nav>
        <!-- page end -->
    </div>
</div>


<script>
require(['util'], function (util) {
        util.initPage(LoadingInfo);
        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            var search_text = $("#search_text").val();
            $.ajax({
                type: "post",
                url: "<?php echo $shopGroupListUrl; ?>",
                async: true,
                data: {
                    "page_index": page_index, "search_text": search_text, "website_id": '<?php echo $website_id; ?>'
                },
                success: function (data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            html += '<td><input type="number" class="form-control sort-form-control J-sort" min="0" value="'+data['data'][i]['group_sort']+'" data-id="' + data["data"][i]["shop_group_id"] + '" data-index="' + i + '" id="group_sort' + i + '"></td>';
                            html += '<td id="group_name' + i + '">' + data["data"][i]["group_name"] + '</td>';
                            if(data["data"][i]["is_visible"] === 1){
                                 html += '<td><a class="label label-success J-show" href="javascript:void(0);" data-id="' + data["data"][i]["shop_group_id"] + '" data-show="0" data-old_show="1">是</a></td>';
                            }else{
                                 html += '<td><a class="label label-danger J-show" href="javascript:void(0);" data-id="' + data["data"][i]["shop_group_id"] + '" data-show="1" data-old_show="0">否</a></td>';
                            }
                            html += '<td class="fs-0 operationLeft"><a class="btn-operation" href="'+ __URL('ADDONS_MAINupdateShopGroup&shop_group_id='+data['data'][i]['shop_group_id'])+'">编辑</a>';
                            html += '<a class="btn-operation J-delete text-red1" href="javascript:void(0);" data-id="' + data['data'][i]['shop_group_id'] + '">删除</a></td>';
                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td class="h-200" colspan="4">暂无符合条件的数据记录</td></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#list").html(html);
                    util.tips();
                }
            });
        }
        $('#list').on('click', '.J-delete', function () {
            var shop_group_id = $(this).data('id');
            $(".tooltip.fade.top.in").remove();
            util.alert('确定删除吗?', function () {
                $.ajax({
                    type : "post",
                    url : "<?php echo $delShopGroupUrl; ?>",
                    async : true,
                    data : {
                        "shop_group_id" : shop_group_id
                    },
                    success : function(data) {
                        if(data["code"] > 0 ){
                            util.message('操作成功', 'success', LoadingInfo($('#page_index').val()));
                        }else{
                            util.message(data["message"], 'danger');
                        }
                    }
                });
            });
        });
        $('#list').on('click','.J-show',function(){
            var shop_group_id = $(this).data('id');
            var is_visible = $(this).data('show');
            $.ajax({
                    type:"post",
                    url:"<?php echo $setIsvisibleUrl; ?>",
                    data:{'shop_group_id' : shop_group_id,'is_visible' : is_visible},
                    async:false,
                    success : function(data) {
                        if(data["code"] > 0 || data["code"] === 0){
                            util.message('操作成功','success',LoadingInfo($('#page_index').val()));
                        }else{
                            util.message(data["message"],'danger');
                        }
                    }
            });
        });
        $('#list').on('change','.J-sort',function(){
            var shop_group_id = $(this).data('id');
            var index = $(this).data('index');
            var group_name = $("#group_name"+index).html();
            var group_sort = $("#group_sort"+index).val();
            var is_visible = $('.J-show').data('old_show');
            $.ajax({
                type:"post",
                url:"<?php echo $updateShopGroupUrl; ?>",
                data:{'shop_group_id' : shop_group_id,'group_sort' : group_sort,'group_name' : group_name, 'is_visible': is_visible},
                async:true,
                success: function (data) {
                    if(data['code'] <= 0){
                        util.message(data["message"],'danger');
                    }else{
                        LoadingInfo(1);
                    }
                }
            });
        });
    });
</script>
