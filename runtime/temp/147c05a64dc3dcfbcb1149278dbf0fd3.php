<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/www.tuandr.com/addons/seckill/template/admin/updateSecKill.html";i:1586931646;}*/ ?>




<div class="addCoupons">
    <form class="form-horizontal widthFixedForm" role="form" id="seckill_form">
        <div class="screen-title">
            <span class="text">规则设置</span>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label"><span class="red">*</span>活动时间</label>
            <div class="col-md-8">
                <div class="v-datetime-input-control">
                    <label for="seckill_time">
                        <input type="text" class="form-control" autocomplete="off" data-mindate="<?php echo $apply_start_date; ?>" data-maxdate="<?php echo $apply_end_date; ?>" readonly name="seckill_time" id="seckill_time" placeholder="请选择时间" required>
                        <i class="icon icon-calendar"></i>
                    </label>
                </div>
                <div class="help-block mb-0">开始时间点为选中日期的0:00:00</div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label"><span class="red">*</span>活动场次</label>
            <div class="col-md-5">
                <select class="form-control w-200" name="seckill_name" id="seckill_name" required title="请选择活动场次">
                    <?php if(is_array($sk_quantum_arr) || $sk_quantum_arr instanceof \think\Collection || $sk_quantum_arr instanceof \think\Paginator): if( count($sk_quantum_arr)==0 ) : echo "" ;else: foreach($sk_quantum_arr as $key=>$sk_quantum): ?>
                        <option value="<?php echo $sk_quantum; ?>"><?php echo $sk_quantum; ?>点场</option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <div class="mb-0 help-block">可选择【秒杀设置】勾选的秒杀时段。</div>
            </div>
        </div>

        <div class="form-group" id="sele_goods">
            <label class="col-md-2 control-label"><span class="red">*</span>选择商品</label>
            <div class="col-md-5">
                <div  id="selectGoods" class="btn btn-primary">点击选择</div>
                <div class="mb-0 help-block">只能选择未参加“限时折扣、预售、砍价、拼团”活动或24小时内没有参加秒杀的商品。</div>
            </div>
        </div>

        <div id="goods_info_box" class="form-group hidden">
            <label class="col-md-2 control-label"></label>
            <div class="col-md-5">
                <div class="media text-left sele-goods-info1">
                    <div class="media-left img-box1">
                        <img src="" onerror="this.src='http://iph.href.lu/60x60';" width="60" height="60">
                    </div>
                    <div class="media-body max-w-300">
                        <div class="line-2-ellipsis goods_name"></div>
                        <div class="line-1-ellipsis text-danger strong price"></div>
                    </div>
                </div>
                <input type="hidden" name="goods_id" id="goods_id" value="">
                <input type="hidden" name="single_sku_id" id="single_sku_id" value="">
            </div>
        </div>

        <div id="product_sku" class="hide">
            <div class="form-group">
                <label class="col-md-2 control-label">活动库存 / 价格</label>
                <div class="col-md-9">
                    <table class="table table-bordered table-auto-center" id="stock_table" required style="display: table;">

                    </table>
                </div>
            </div>
        </div>
        <div id="four-select" class="show">
            <div class="form-group" id="">
                <label class="col-md-2 control-label"><span class="red">*</span>活动库存</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input type="number" class="form-control" id="seckill_num" name="seckill_num" min="0" required>
                        <div class="input-group-addon">件</div>
                    </div>
                    <div class="mb-0 help-block">秒杀活动的商品库存，与商品发布里面的库存相互独立。</div>
                </div>
            </div>

            <div class="form-group" id="">
                <label class="col-md-2 control-label"><span class="red">*</span>活动价格</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input type="number" class="form-control" id="seckill_price" name="seckill_price" min="0" step="0.01" required>
                        <div class="input-group-addon">元</div>
                    </div>
                    <div class="mb-0 help-block">参与秒杀的活动价格。</div>  
                </div>
            </div>
            <div class="form-group" id="">
                <label class="col-md-2 control-label">限购</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input type="number" class="form-control" id="seckill_limit_buy" name="seckill_limit_buy" min="1" step="1" required>
                        <div class="input-group-addon">件</div>
                    </div>
                    <div class="mb-0 help-block">用户最多可以秒杀多少件商品。</div>
                </div>
            </div>

            <div class="form-group" id="">
                <label class="col-md-2 control-label">虚拟抢购量</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input type="number" class="form-control" id="seckill_vrit_num" name="seckill_vrit_num" min="0" step="1" required>
                        <div class="input-group-addon">件</div>
                    </div>
                    <div class="mb-0 help-block">活动开始后，前端抢购量将会以实际购买量+虚拟抢购量显示。</div>     
                </div>
            </div>

        </div>
        <div class="form-group add_back">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button class="btn adds" type="button">报名</button>
                <a href="javascript:window.history.go(-1)" class="btn back">返回</a>
            </div>
        </div>

    </form>
</div>
<div class="modal fade" id="licenseImg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 99999998" aria-hidden="true">

    <div class="modal-dialog" style="width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="select_goods_close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">选择商品</h4>
            </div>
            <div class="modal-body" style="height: 450px;overflow-y: scroll">
                <div class="goods-dialog" id="goods-dialog">
                    <ul class="nav v-nav-tabs pt-15" role="tablist">
                        <li class="search_text">
                            <div class="input-group search-input-group pull-right">
                            <input type="text" class="form-control" name="select_goods_name" placeholder="商品名称">
                            <span class="input-group-btn"><button class="btn search search-color" >搜索</button></span>
                        </div>
                        </li>


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
                            <!--<nav aria-label="Page navigation" class="clearfix">
                                <ul id="page_goods" class="pagination pull-right"></ul>
                            </nav>-->
                        </div>
                    </div>
                    <input type="hidden" id="selectedData">
                </div>

                <div class="page clearfix">
                    <div class="M-box3 m-style fr">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="batch_update_content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 525px;margin-top:200px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="batch_update_title"></h4>
            </div>
            <div class="modal-body" id="batch_update_form">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary confirm-update">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>



<script>
  require(['utilAdmin','util'], function (utilAdmin,util) {
    $(function () {
        // console.log('<?php echo $apply_start_date; ?>');
        // console.log('<?php echo $apply_end_date; ?>');

        util.layDate2("#seckill_time");
        //util.layDate("#seckill_time");
    })

        function postSeckillList(){
            // var check = $("#seckill_form").valid();
            // if (!check){
            //     $('#coupon_type_form').find('.error[aria-required]')[0].focus();
            //     return;
            // }

            // 验证
            var seckill_time=$('#seckill_time').val();
            var seckill_name=$('#seckill_name').val();
            // var seckill_num=$('#seckill_num').val();
            // var seckill_price=$('#seckill_price').val();
            // var seckill_limit_buy=$('#seckill_limit_buy').val();
            // var seckill_vrit_num=$('#seckill_vrit_num').val();

            if (seckill_time === '') {
                utilAdmin.message('请输入活动时间','info', function () {
                    $('#seckill_time').focus();
                });
                return false;
            }
            if (seckill_name === '') {
                utilAdmin.message('请输入活动场次','info', function () {
                    $('#seckill_name').focus();
                });
                return false;
            }


            //判断商品是否选择了
            var goods_id = $('#goods_id').val();
            if(goods_id == ''){
                $('#sele_goods').addClass('has-error');
                if($('#seckill_goods-error').length == 0){
                    var info = '<label id="seckill_goods-error" class="error" for="seckill_goods">请选择商品</label>';
                    $('#selectGoods').after(info);
                }
            }
            if($('#product_sku').hasClass('hidden')){
                sku_id = $('#single_sku_id').val();
                // var data = {'goods_info':{sku_id:{}}};
                var data = {};
                data.goods_info = {};
                data.goods_info[sku_id] = {};
            }else{
                var data = {};
            }

            // 活动时间
            var seckill_time = $('#seckill_time').val();
            data.seckill_time = seckill_time;
            //活动场次
            var seckill_name = $('#seckill_name').val();
            data.seckill_name = seckill_name;
            //商品id
            data.goods_id = goods_id;
            //活动库存
            if($('#product_sku').hasClass('hidden')){
                //活动库存
                var  seckill_num = $('#seckill_num').val();
                //活动价格
                var  seckill_price = $('#seckill_price').val();
                //限购
                var seckill_limit_buy = $('#seckill_limit_buy').val();
                //虚拟抢购量
                var seckill_vrit_num = $('#seckill_vrit_num').val();
                if (seckill_price === '') {
                    utilAdmin.message('请输入活动价格','info', function () {
                        $('#seckill_price').focus();
                    });
                    return false;
                }
                if (seckill_num === '') {
                    utilAdmin.message('请输入活动库存','info', function () {
                        $('#seckill_num').focus();
                    });
                    return false;
                }
                if (seckill_limit_buy === '') {
                    utilAdmin.message('请输入限购','info', function () {
                        $('#seckill_limit_buy').focus();
                    });
                    return false;
                }
                /*if (seckill_vrit_num === '') {
                    utilAdmin.message('请输入虚拟抢购量','info', function () {
                        $('#seckill_vrit_num').focus();
                    });
                    return false;
                }*/
                data.goods_info[sku_id]['seckill_num'] = seckill_num;
                data.goods_info[sku_id]['seckill_price'] = seckill_price;
                data.goods_info[sku_id]['seckill_limit_buy'] = seckill_limit_buy;
                data.goods_info[sku_id]['seckill_vrit_num'] = seckill_vrit_num;
            }else{
                //这里是有sku的区间，先获取当前商品有多少个sku_id
                var sku_obj = $('input[name=sku_id]');
                var seckill_num_obj = $('input[name=seckill_num]');
                var seckill_price_obj = $('input[name=seckill_price]');
                var seckill_limit_buy_obj = $('input[name=seckill_limit_buy]');
                var seckill_vrit_num_obj = $('input[name=seckill_vrit_num]');
                var goods_info = {};
                for(var i=0;i<sku_obj.length;i++){
                    var sku_id = $(sku_obj[i]).val();
                    goods_info[sku_id] = {};
                    var seckill_num = $(seckill_num_obj[i]).val();
                    var seckill_price = $(seckill_price_obj[i]).val();
                    var seckill_limit_buy = $(seckill_limit_buy_obj[i]).val();
                    var seckill_vrit_num = $(seckill_vrit_num_obj[i]).val();
                    // console.log(typeof seckill_limit_buy);return;
                    if (seckill_price === '0') {
                        utilAdmin.message('请输入活动价格','info', function () {
                            $('#seckill_price').focus();
                        });
                        return false;
                    }
                    if (seckill_num === '0') {
                        utilAdmin.message('请输入活动库存','info', function () {
                            $('#seckill_num').focus();
                        });
                        return false;
                    }
                    if (seckill_limit_buy === '0') {
                        utilAdmin.message('请输入限购','info', function () {
                            $('#seckill_limit_buy').focus();
                        });
                        return false;
                    }
                    /*if (seckill_vrit_num === '0') {
                        utilAdmin.message('请输入虚拟抢购量','info', function () {
                            $('#seckill_vrit_num').focus();
                        });
                        return false;
                    }*/
                    goods_info[sku_id].seckill_num = seckill_num;
                    goods_info[sku_id].seckill_price = seckill_price;
                    goods_info[sku_id].seckill_limit_buy = seckill_limit_buy;
                    goods_info[sku_id].seckill_vrit_num = seckill_vrit_num;
                }
                data.goods_info = goods_info;
            }
            $.post('<?php echo $addSecKillUrl; ?>',
                data,
                function(res){
                    if (res["code"] > 0) {
                        utilAdmin.message('报名成功','success', function(){
                            location.href = "<?php echo __URL('ADDONS_ADMIN_MAINsecKillList'); ?>";
                        });
                    } else {
                        utilAdmin.message(res["message"],'danger');
                    }
                });
        }

        // })
    //选择商品
        $('#selectGoods').click(function () {
            LoadingInfo(1);
            $('#licenseImg').modal('show');
        })
        //选择商品
        function LoadingInfo(page_index){
            $('#page_index').val(page_index ? page_index : '1');
            //0为商家店铺商品 1为全平台的商品
            var goods_type = 0;
            //搜索框
            var search_text = $('input[name=select_goods_name]').val();
            var seckill_time = $('#seckill_time').val();
            var seckill_name = $('#seckill_name').val();
            $.post(
                '<?php echo $modalSeckillGoodsList; ?>',
                {goods_type:goods_type,page_index:page_index,search_text:search_text,seckill_time:seckill_time,seckill_name:seckill_name},
                function(data){
                    var html = '';
                    data['data'] = Object.values(data['data']);
                    if(data['data'] != ''){
                        data['data'].forEach(function(item,i){
                            var promotion_span = '';
                            if(item.promotion_type){
                                promotion_span = '<span class="btn btn-sm btn-danger" style="padding:2px 5px">'+item.promotion_name+'</span>&nbsp;';
                                 var select_str =  '--'
                            }else{
                                var select_str = '            <a href="javascript:;" class="text-primary selec_btn" data-img="'+item.pic_cover+'" data-goods_name="'+item.goods_name+'" data-price="'+item.price+'" data-sku_list=\''+item.sku_list+'\' data-goods_id="'+item.goods_id+'" >选择</a>\n';
                            }
                            html += '<tr>\n' +
                                '        <td>\n' +
                                '            <div class="media text-left">\n' +
                                '                <div class="media-left">\n' +
                                '                    <img src="'+item.pic_cover+'" onerror="this.src=\'http://iph.href.lu/60x60\';" width="60" height="60">\n' +
                                '                </div>\n' +
                                '                <div class="media-body max-w-300">\n' +
                                '                    <div class="line-2-ellipsis">'+ promotion_span + item.goods_name + '</div>\n' +
                                '                    <div class="line-1-ellipsis text-danger strong">'+item.price+'</div>\n' +
                                '                </div>\n' +
                                '            </div>\n' +
                                '        </td>\n' +
                                '        <td>\n' +
                                select_str
                                +
                                '        </td>\n' +
                                '    </tr>';
                        })
                    }else{
                        html += '<tr><td class="h-200" colspan="2">暂无符合记录的数据记录</td></tr>'
                    }

                    $('#goods-dialog #content').html(html);
                    utilAdmin.page(".M-box3", data['total_count'], data["page_count"], page_index, LoadingInfo);
                })
        }

    // 选择
    $('#goods-dialog').on('click','.selec_btn',function(){
        var goods_name = $(this).data('goods_name');
        var img = $(this).data('img');
        var price = $(this).data('price');
        var sku_list = $(this).data('sku_list');
        var goods_id = $(this).data('goods_id');
        $('.img-box1 img').attr('src',img);
        $('.goods_name').html(goods_name);
        $('.price').html(price);
        $('#goods_id').val(goods_id);
        $('#goods_info_box').removeClass('hidden');
        $('#goods_info_box').addClass('show');
        if(sku_list['attr_value_items'] != '' || sku_list['attr_value_items'] === undefined){
            $('#product_sku').removeClass('hidden');
            $('#product_sku').addClass('show');
            var html = '<thead>';
            for(sku_ids in sku_list){
                if(sku_ids == 0){
                    var th_name_str = sku_list[sku_ids]['th_name_str'];
                    th_name_str_arr = th_name_str.split(' ');
                    for(th_id in th_name_str_arr){
                        html += '<th>'+th_name_str_arr[th_id]+'</th>\n';
                    }
                    html += ' <th class="table-center">售价</th>\n' +
                        '<th class="table-center">库存</th>\n' +
                        '<th class="table-center">活动价格</th>\n' +
                        '<th class="table-center">活动库存</th>\n' +
                        '<th class="table-center">限购</th>\n' +
                        '<th class="table-center">虚拟抢购量</th>\n';
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
                        // html +='<td class="table-center" skuchild="'+spec_val_arr[0]+'"><img src="'+spec_val_arr[1]+'"></td>\n';
                        html +='<td class="table-center" skuchild="'+spec_val_arr[0]+'">'+spec_val_arr[1]+'</td>\n';
                    }else{
                        spec_val_arr = spec_arr[spec_id].split('=');
                        html +='<td class="table-center" skuchild="'+spec_val_arr[0]+'">'+spec_val_arr[1]+'</td>\n';
                    }
                }
                html += '<td class="table-center">'+sku_list[sku_ids]['price']+'</td>\n' +
                    '<td class="table-center">'+sku_list[sku_ids]['stock']+'</td>\n' +
                    '<td class="table-center"><input type="number" min="0.01" step="0.01"  name="seckill_price" class="form-control"></td>\n' +
                    '<td class="table-center"><input type="number" min="1" step="1"  name="seckill_num" class="form-control"></td>\n' +
                    '<td class="table-center"><input type="number" min="1" step="1"  name="seckill_limit_buy" class="form-control"></td>\n' +
                    '<td class="table-center"><input type="number" min="0" step="1"  name="seckill_vrit_num" class="form-control"></td>\n' +
                    '<input type="hidden" name="sku_id" class="form-control" value="'+ sku_list[sku_ids]['sku_id'] +'">\n' +
                    '</tr>\n'
            }
            html += '<tbody>\n';
            html += '<tfoot>\n' +
                '<tr>\n' +
                '<td colspan="10" class="text-left">\n' +
                '批量修改：\n' +
                '<a href="javascript:;" class="text-primary batchSet" data-batch_type="seckill_price" required>活动价格</a>\n' +
                '<a href="javascript:;" class="text-primary batchSet" data-batch_type="seckill_num" required>活动库存</a>\n' +
                '<a href="javascript:;" class="text-primary batchSet" data-batch_type="seckill_limit_buy">限购</a>\n' +
                '<a href="javascript:;" class="text-primary batchSet" data-batch_type="seckill_vrit_num">虚拟抢购量</a>\n' +
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
            var sku_id = sku_list['sku_id'];
            $('#single_sku_id').val(sku_id);
            $('#product_sku').removeClass('show');
            $('#product_sku').addClass('hidden');
            $('#four-select').removeClass('hidden');
            $('#four-select').addClass('show');
        }
        if($('#sele_goods').hasClass('has-error')){
            $('#sele_goods').removeClass('has-error');
            $('#sele_goods #seckill_time-error').remove();
        }

        $('#select_goods_close').click();
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

    // 批量设置弹框
    $('#stock_table').on('click','.batchSet',function(){
        var batch_text = $(this).text();
        var batch_type = $(this).data('batch_type');
        $('#batch_update_title').html('批量修改'+batch_text);
        var html = '<form class="form-horizontal" id="batch_update_form" role="form">\n' +
            '                    <div class="form-group">\n' +
            '                        <label id="update_name" class="col-sm-3 control-label">'+ batch_text +'</label>\n' +
            '                        <div class="col-sm-9">\n' +
            '                            <input type="number" min="0" class="form-control" id="batch_'+ batch_type +'" placeholder="请输入'+ batch_text +'">\n' +
            '                             <input type="hidden" id="now_type" data-batch_text="'+batch_text+'" value="'+batch_type+'">\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </form>';
        $('#batch_update_form').html(html);
        $('#batch_update_content').modal('show');
    })
    //批量修改每个状态值
    $('.confirm-update').click(function(){
        //获取当前的类型
        var batch_type = $('#now_type').val();
        var batch_text = $('#now_type').data('batch_text');
        var batch_value = $('#batch_'+batch_type).val();
        if( batch_value == '' ){
            utilAdmin.message(batch_text+'不能为空','warning');
        }
        $('input[name='+ batch_type +']').val(batch_value);
        $('.close').click();
    })
    //搜索
    $('.search').click(function(){
        LoadingInfo(1);
    });
    $('body').on('click','.adds',function(){
        postSeckillList();
    })

  })
</script>

