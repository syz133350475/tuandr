<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/www/wwwroot/www.tuandr.com/addons/delivery/template/platform/goodsShortName.html";i:1583811700;}*/ ?>
<!--<form class="form">
    <div class="v-form-inline v-form-inline">
        <div class="form-group">
            <select class="form-control" id="goods_type">
                <option value="1">全部简称</option>
                <option value="2">已填写</option>
                <option value="3">未填写</option>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" id="category_id">

            </select>
        </div>
        <div class="form-group">
            <input class="form-control" id="goods_name" placeholder="商品名称">
        </div>
        <div class="form-group">
            <a class="btn btn-primary search"><i class="icon icon-search "></i> 搜索</a>
        </div>
    </div>
</form>-->

<form class="v-filter-container" style="padding-left: 20px">
    <div class="filter-fields-wrap">
        <div class="filter-item clearfix">
            <div class="filter-item__field">

                <div class="v__control-group" style="margin-right: 20px;">
                    <div class="v__controls">
                        <select class="v__control_input" id="goods_type">
                            <option value="1">全部简称</option>
                            <option value="2">已填写</option>
                            <option value="3">未填写</option>
                        </select>
                    </div>
                </div>

                <div class="v__control-group" style="margin-right: 20px;">
                    <div class="v__controls">
                        <select class="v__control_input" id="category_id"></select>
                    </div>
                </div>
                <div class="v__control-group">
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="goods_name" placeholder="商品名称" autocomplete="off">
                    </div>
                </div>

            </div>
        </div>
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <div class="v__controls">
                        <a class="btn btn-primary search"><i class="icon icon-search"></i> 搜索</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<table class="table v-table table-auto-center">
    <thead>
    <tr>
        <th class="col-md-6">商品信息</th>
        <th class="col-md-6">商品简称</th>
    </tr>
    </thead>
    <tbody id="goods_list">
    </tbody>
</table>
<input type="hidden" id="pageIndex">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>

<script id="tpl_category_option" type="text/html">
    <option value="0">全部分类</option>
    <%each data as item%>
    <option value="<%item.category_id%>"><%item.category_name%></option>
    <%/each%>
</script>
<script>
    require(['util', 'tpl'], function (util, tpl) {
        util.initPage(LoadingInfo);
        getCategory();

        function getCategory() {
            $.ajax({
                type: "post",
                url: "<?php echo $categoryUrl; ?>",
                success: function (data) {
                    $("#category_id").html(tpl('tpl_category_option', data))
                }
            })
        }

        function LoadingInfo(page_index) {
            var goods_name = $("#goods_name").val();
            var goods_type = $("#goods_type").val();
            var category_id = $("#category_id").val();
            $("#pageIndex").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $goodsListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "page_size": $("#showNumber").val(),
                    "goods_name": goods_name,
                    "goods_type": goods_type,
                    "category_id": category_id
                },
                success: function (data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            html += '<td>';
                            html += '<div class="media text-left">';
                            html += '<div class="media-left"><p><img src="' + __IMG(data["data"][i]["pic_cover_micro"]) + '" style="width:60px;height:60px;"></p></div>';
                            html += '<div class="media-body break-word">';
                            html += '<div class="line-2-ellipsis line-title">';
                            html += '<a class="a-goods-title" href="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + data["data"][i]["goods_id"]) + '" target="_blank">' + data["data"][i]["goods_name"] + '</a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</td>';
                            html += '<td><input class="form-control J_short_name" name="short_name" data-short-name="' + data["data"][i]["short_name"] + '" data-goods-id="' + data["data"][i]["goods_id"] + '" class="J_short_name" value="' + data["data"][i]["short_name"] + '"></td>';
                            html += '</tr>';
                        }
                    } else {
                        html += '<tr align="center"><td colspan="8" style="text-align: center;font-weight: normal;color: #999;">暂无符合条件的数据记录</td></tr>';
                    }
                    $("#goods_list").html(html);
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                }
            });
        }

        //搜索
        $('.search').on('click', function () {
            util.initPage(LoadingInfo);
        });


            $("#goods_list").on("blur", ".J_short_name", function () {
                var goods_id = $(this).data('goods-id');
                var short_name = $(this).val();
                var old_short_name = $(this).data('short-name');
                var _this = $(this);
                if (short_name == old_short_name) {
                    return false;
                }

                $.ajax({
                    type: "post",
                    data: {
                        "goods_id": goods_id,
                        "up_type": "short_name",
                        "up_content": short_name,
                    },
                    url: "<?php echo $ajaxEditGoodsUrl; ?>",
                    success: function (data) {
                        if (data.code > 0) {
                            _this.data('short-name', short_name)
                            util.message('修改成功', 'success');
                        } else {
                            util.message(data.message);
                        }
                    }
                })
            })

    })

</script>


