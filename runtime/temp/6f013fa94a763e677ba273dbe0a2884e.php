<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"/www/wwwroot/www.tuandr.com/addons/groupshopping/template/platform/groupShoppingGoodsDialog.html";i:1583811704;}*/ ?>
<div class="goods-dialog" id="goods-dialog">
    <ul class="nav nav-tabs v-nav-tabs pt-15" role="tablist">
        <li role="presentation" class="active"><a href="#list" aria-controls="list" role="tab" data-toggle="tab" class="flex-auto-center">商品列表</a></li>
        <div class="input-group search-input-group pull-right">
            <input type="text" class="form-control" name="name" placeholder="商品名称">
            <span class="input-group-btn"><button class="btn search search-color" >搜索</button></span>
        </div>
    </ul>
    <div class="dialog-box tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="list">
            <table class="table v-table table-auto-center">
                <thead>
                    <tr>
                        <th>商品信息</th>
                        <th width="150">操作</th>
                    </tr>
                </thead>
                <tbody id="content"></tbody>
            </table>
            <nav aria-label="Page navigation" class="clearfix">
                <ul id="page_goods" class="pagination pull-right"></ul>
            </nav>
        </div>
    </div>
    <input type="hidden" id="selectedData">
</div>
<script id='goods_tpl_content' type='text/html'>
    <%each data as item itemid%>
    <tr>
        <td>
            <div class="media text-left">
                <div class="media-left">
                    <img src="<%item.pic_cover%>" onerror="this.src='http://iph.href.lu/60x60';" width="60" height="60">
                </div>
                <div class="media-body max-w-300">
                    <div class="line-2-ellipsis"><%if item.promotion_type%><span class="btn btn-sm btn-danger" style="padding:2px 5px"><%item.promotion_name%></span>&nbsp;<%/if%><%item.goods_name%></div>
                    <div class="line-1-ellipsis text-danger strong"><%item.price%></div>
                </div>
            </div>
        </td>
        <td>
            <%if item.promotion_type%>
            --
            <%else%>
            <a href="javascript:;" class="text-primary selec_btn" data-img="<%item.pic_cover%>" data-goods_name="<%item.goods_name%>" data-price="<%item.price%>" data-sku_list="<%item.sku_list%>" data-goods_id="<%item.goods_id%>" >选择</a>
            <%/if%>
        </td>
    </tr>
    <%/each%>
</script>
<script>
require(['util','tpl'],function(util,tpl){
    $('.btn-primary').hide();
    $('.btn-default').hide();
    var all_data = {};
    util.initPage(LoadingInfo,'page_goods')
    function LoadingInfo(page_index){
        var val = $('input[name="name"]').val();
        $.ajax({
            type: "post",
            url: "<?php echo $modalGroupShoppingGoodsList; ?>",
            async: true,
            data: {
                "page_index": page_index,
                "search_text": val
            },
            success: function (data) {
                all_data = data;
                var html = '<tr><th colspan="6">暂无符合条件的数据记录</th></tr>';
                if(data.data){
                    $('#goods-dialog #content').html(tpl('goods_tpl_content',all_data));
                    $('#page_goods').show().paginator('option', {
                        totalCounts: data.total_count
                    });
                }else{
                    $("#goods-dialog #content").html(html);
                    $('#page_goods').hide();
                }
            }
        });
    }
    // 搜索
    $('.search').on('click',function(){
        LoadingInfo(1);
    });
    // 选择
    $('#goods-dialog').on('click','.selec_btn',function(){
        var goods_name = $(this).data('goods_name');
        var img_val = $(this).data('img');
        var price = $(this).data('price');
        var sku_list = $(this).data('sku_list');
        var goods_id = $(this).data('goods_id');
        $('.goods-img img').attr('src',img_val);
        $('.goods-text').html(goods_name);
        $('.goods-price').html(price);
        $('#goods_id').val(goods_id);
        $('#goods_info_box').removeClass('hidden');
        $('#goods_info_box').addClass('show');
        // console.log(sku_list.sku_name.length);return;
        // console.log(sku_list[0]['sku_name']);return;
        // console.log(sku_list.sku_name);return;
        if(sku_list.sku_name != undefined){
            sku_list.sku_name = (sku_list.sku_name).replace(/^\s+|\s+$/g,"");
        }
        if(sku_list.sku_name === undefined || sku_list.sku_name !== ''){
            $('#product_sku').removeClass('hidden');
            $('#product_sku').addClass('show');
            var html = '<thead>';
            for(sku_ids in sku_list){
                if(sku_ids == 0){
                    var th_name_str = sku_list[sku_ids]['th_name_str'];
                    th_name_str_arr = th_name_str.split(' ');
                    for(th_id in th_name_str_arr){
                        html += '<th class="vertical-middle">'+th_name_str_arr[th_id]+'</th>\n';
                    }
                html += ' <th class="vertical-middle">售价</th>\n' +
                    '<th class="vertical-middle">库存</th>\n' +
                    '<th class="vertical-middle th-price">拼团价</th>\n' +
                    '<th class="vertical-middle th-price">限购</th>\n';
                    html += '</thead>\n';
                    html += '<tbody>\n';
                }
                //处理规格
                var spec_val = sku_list[sku_ids]['new_im_str'];
                var spec_show_type = sku_list[sku_ids]['show_type_str'];
                var spec_arr = spec_val.split('§');
                var spec_show_arr = spec_show_type.split(' ');
                html += '<tr skuid="'+sku_list[sku_ids]['attr_value_items']+'" id="">\n';
                for(spec_id in spec_arr){
                    //判断展示类型是不是图片
                    if(spec_show_arr[spec_id] == '3'){
                        spec_val_arr = spec_arr[spec_id].split('=');
                        html +='<td skuchild="'+spec_val_arr[0]+'">'+spec_val_arr[1]+'</td>\n';
//                        html +='<td skuchild="'+spec_val_arr[0]+'"><img src="'+spec_val_arr[1]+'" style="width:50px;height:50px"></td>\n';
                    }else{
                        spec_val_arr = spec_arr[spec_id].split('=');
                        html +='<td skuchild="'+spec_val_arr[0]+'">'+spec_val_arr[1]+'</td>\n';
                    }
                }
                html += '<td>'+sku_list[sku_ids]['price']+'</td>\n' +
                    '<td>'+sku_list[sku_ids]['stock']+'</td>\n' +
                    '<td><input type="number" min="0.01" name="group_price" class="form-control"></td>\n' +
                    '<td><input type="number" min="1" step="1"  name="group_limit_buy" class="form-control"></td>\n' +
                    '<input type="hidden" name="sku_id" class="form-control" value="'+ sku_list[sku_ids]['sku_id'] +'">\n' +
                    '</tr>\n';
            }
            html += '<tbody>\n';
            html += '<tfoot>\n' +
                    '<tr>\n' +
                    '<td colspan="10" class="text-left">\n' +
                    '批量修改：\n' +
                    '<a href="javascript:;" class="text-primary batchSet" data-batch_type="group_price" required>拼团价</a>\n' +
                    '<a href="javascript:;" class="text-primary batchSet" data-batch_type="group_limit_buy">限购</a>\n' +
                    '</td>\n' +
                    '</tr>\n' +
                    '</tfoot>';
            $('#stock_table').html(html);
            // 合并单元格
            merge_cell();
            $('#product_sku').removeClass('hidden');
            $('#product_sku').addClass('show');
            $('#four-select').remove('show');
            $('#four-select').addClass('hidden');
        }else{
            $('#sku_id').val(sku_list.sku_id);
            $('#product_sku').removeClass('show');
            $('#product_sku').addClass('hidden');
            $('#four-select').removeClass('hidden');
            $('#four-select').addClass('show');
        }
        if($('#sele_goods').hasClass('has-error')){
            $('#sele_goods').removeClass('has-error');
            $('#sele_goods #group-error').remove();
        }

        $('.jconfirm-closeIcon').click();
    })
    //合并单元格
    function merge_cell(){
        var td = $(' #stock_table td');
        for(var i=0;i<td.length;i++){
            var td_skuchild = $(td[i]).attr('skuchild');
            if(td_skuchild != undefined){
                 var td_box = $('td[skuchild="'+td_skuchild+'"]');
                 if(td_box.length>1){
                     $(td_box[0]).attr('rowspan',td_box.length);
                     for(var j=1;j<td_box.length;j++){
                         td_box[j].remove();
                     }
                 }
            }
        }
    }
})
</script>