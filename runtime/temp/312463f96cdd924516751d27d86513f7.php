<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:43:"template/platform/Goods/selectNumGoods.html";i:1583811746;}*/ ?>
<div class="goods-dialog">
    <ul class="nav nav-tabs v-nav-tabs pt-15" role="tablist">
        <li role="presentation" class="active"><a href="#list" aria-controls="list" role="tab" data-toggle="tab" class="flex-auto-center">商品列表</a></li>
        <div class="input-group search-input-group pull-right">
            <input type="text" class="form-control" placeholder="商品名称" name="goods_name" id="goods_name">
            <span class="input-group-btn"><a class="btn btn-primary search">搜索</a></span>
        </div>
    </ul>
    <div class="dialog-box">
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th class="col-md-10">商品列表</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody id="list">

            </tbody>
        </table>
    </div>
    <input type="hidden" id="page_index">
    <nav aria-label="Page navigation" class="clearfix">
        <ul id="page" class="pagination pull-right"></ul>
    </nav>
    <input type="hidden" id="goods_id" value="">
    <input type="hidden" id="goodsid" value="<?php echo $goodsid; ?>">
    <input type="hidden" id="ungoodsid" value="<?php echo $ungoodsid; ?>">
</div>
<script>
    require(['util'],function(util) {
        $(document).ready(function(){
            var width = $(".J-user_name").innerWidth();
            $('.J-admin_name').css('padding-left',width);
        });
        function isInArray2(arr,value){
            value = String(value);
            var index = arr.indexOf(value);
            if(index >= 0){
                return true;
            }
            return false;
        }
        var str1 = [];
        var str = $("#goodsid").val();
        if(str!=''){
           var str1=  str.split(',');
           $("#goods_id").val(str1);
        }
        util.initPage(getList);
        function getList(page_index) {
            $("#page_index").val(page_index);
            var goods_name = $("#goods_name").val();
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/goods/selectNumGoodsList'); ?>",
                async: true,
                data: {
                    "page_index": page_index,
                    "ungoodsid" :$("#ungoodsid").val(),
                    "goods_name": goods_name
                },
                success: function (data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            html += '<td>';
                            html += '<div class="media text-left">';
                            // html += '<div class="media-body max-w-300">';
                            // html += '<div class="line-2-ellipsis text-danger strong">商品名称：' + data["data"][i]['goods_name'] + '</div>';
                            // html += '<div class="line-1-ellipsis ">商品价格：' + data["data"][i]['price'] + '</div>';
                            html += '<div class="media-left"><img src="' + data["data"][i]['pic_cover'] + '" onerror=javascript:this.src="http://iph.href.lu/60x60" style="max-width:none;width:60px;height:60px;"></div>';
                            html += '<div class="media-body break-word">';
                            html += '<div class="line-2-ellipsis">' + data["data"][i]['goods_name'] + '</div>';
                            html += '<div class="line-1-ellipsis text-danger strong">' + data["data"][i]['price'] + '</div>';

                            html += '</div>';
                            html += '</div>';
                            html += '</td>';
                            if(str1!=[] && isInArray2(str1,data["data"][i]['goods_id'])){
                                html += '<td><a href="javascript:void(0);" class="text-primary selectedGoods" data-status="0" data-id = "' + data["data"][i]['goods_id'] + '" data-name="' + data["data"][i]['goods_name'] + '" data-pic="' + data["data"][i]['pic_cover_mid'] + '">取消</a></td>';
                            }else{
                                html += '<td><a href="javascript:void(0);" class="text-primary selectedGoods" data-status="1" data-id = "' + data["data"][i]['goods_id'] + '" data-name="' + data["data"][i]['goods_name'] + '" data-pic="' + data["data"][i]['pic_cover_mid'] + '">选择</a></td>';
                            }
                            html += '</tr>';
                        }

                    } else {
                        html += '<tr align="center"><th colspan="5">暂无符合条件的数据记录</th></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#list").html(html);selectedGoods();
                }
            });
        }
        $('.search').on('click', function () {
            util.initPage(getList);
        });
        Array.prototype.remove = function(val) {
            var index = this.indexOf(val);
            if (index > -1) {
                this.splice(index, 1);
            }
        };
        var goods_id = $("#goods_id").val();
        var goodsids = [];
        if(goods_id!=''){
            goodsids =goods_id.split(',');
        }
        function selectedGoods() {
            $('.selectedGoods').on('click', function () {
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');
                if(status==1){
                    $(this).attr('data-status',0);
                    $(this).html('取消');
                    goodsids.push(id);
                    $('#goods_id').val(goodsids)
                }else if(status==0){
                    $(this).attr('data-status',1);
                    $(this).html('选择');
                    goodsids.remove(id);
                    $('#goods_id').val(goodsids)
                }
            })
        }
    })
</script>