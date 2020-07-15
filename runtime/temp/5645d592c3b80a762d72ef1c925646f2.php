<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/www.tuandr.com/addons/coupontype/template/admin/updateCouponType.html";i:1583811706;}*/ ?>



<div class="addCoupons">
    <form class="form-horizontal form-validate widthFixedForm" role="form" id="coupon_type_form">

        <div class="form-group">
            <label class="col-md-2 control-label">主动领取</label>
            <div class="col-md-5">
                <!--<label class="radio-inline" for="is_fetch_1">
                    <input type="radio" name="is_fetch" id="is_fetch_1" value="1" checked
                           style="margin-top: 1px">是</label>
                <label class="radio-inline" for="is_fetch_0">
                    <input type="radio" name="is_fetch" id="is_fetch_0" value="0" style="margin-top: 1px">否</label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="is_fetch" id="is_fetch" checked>
                        <label for="is_fetch" class=""></label>
                    </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label"><span class="red">*</span>优惠券名称</label>
            <div class="col-md-5">
                <input type="text" id="coupon_name" name="coupon_name" maxlength="20" class="form-control" required autocomplete="off" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">优惠券类型</label>
            <div class="col-md-5">
                <label class="radio-inline">
                    <input type="radio" name="coupon_genre" id="coupon_genre_1" value="1" checked
                           style="margin-top: 1px"> 无门槛券</label>
                <label class="radio-inline">
                    <input type="radio" name="coupon_genre" id="coupon_genre_2" value="2" style="margin-top: 1px">
                    满减券</label>
                <label class="radio-inline">
                    <input type="radio" name="coupon_genre" id="coupon_genre_3" value="3" style="margin-top: 1px">
                    折扣券</label>
                    <div class="mb-0 help-block">无门槛券可直接使用，满减券与折扣券需要满足一定金额使用</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label"><span class="red">*</span>面值</label>
            <div class="col-md-5">
                <div id="coupon_genre_type_1">
                    <div class="input-group w-200">
                        <input type="number" id="no_limit_money" name="no_limit_money" class="form-control" min="0" required>
                        <div class="input-group-addon">元</div>
                    </div>
                    <div class="mb-0 help-block">优惠的金额或折扣</div>
                </div>
                <div id="coupon_genre_type_2" style="display: none">
                    <div class="input-group">
                        <div class="input-group-addon">满</div>
                        <input type="number" id="reduction_at_least" name="reduction_at_least" class="form-control" min="0">
                        <div class="input-group-addon">元，减</div>
                        <input type="number" id="full_reduction_money" name="full_reduction_money" class="form-control" min="0">
                        <div class="input-group-addon">元</div>
                    </div>
                    <div class="mb-0 help-block">优惠的金额或折扣</div>
                </div>
                <div id="coupon_genre_type_3" style="display: none">
                    <div class="input-group">
                        <div class="input-group-addon">满</div>
                        <input type="number" id="discount_at_least" name="discount_at_least" class="form-control" min="0">
                        <div class="input-group-addon">元，打</div>
                        <input type="number" id="discount" name="discount" class="form-control" min="0">
                        <div class="input-group-addon">折</div>
                    </div>
                    <div class="mb-0 help-block">优惠的金额或折扣</div>
                </div>
            </div>

        </div>

        <div class="form-group">
            <label class="col-md-2 control-label"><span class="red">*</span>发放数量</label>
            <div class="col-md-5">
                <div class="input-group w-200">
                    <input type="number" id="count" name="count" class="form-control" required min="0" autocomplete="off">
                    <div class="input-group-addon">张</div>
                </div>
                <div class="mb-0 help-block">0代表不限制</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">每人限领</label>
            <div class="col-md-5">
                <div class="input-group w-200">
                    <input type="number" class="form-control" name="max_fetch" id="max_fetch" min="0">
                    <div class="input-group-addon">张</div>
                </div>
                <div class="mb-0 help-block">0代表不限制</div>
            </div>

        </div>
        <div class="form-group">
            <label class="col-md-2 control-label"><span class="red">*</span>领券时间</label>
            <div class="col-md-5">
                <div class="v-datetime-input-control">
                    <label for="receive_coupon_time">
                        <input type="text" class="form-control" id="receive_coupon_time" placeholder="请选择时间" value="" autocomplete="off" name="receive_coupon_time" required> 
                        <i class="icon icon-calendar"></i>
                        <input type="hidden" id="start_receive_time">
                        <input type="hidden" id="end_receive_time">
                     </label>
                </div>
                <div class="help-block mb-0">开始时间点为选中日期的0:00:00，结束时间点为选中日期的23:59:59</div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label"><span class="red">*</span>生效时间</label>
            <div class="col-md-5">
                <div class="v-datetime-input-control">
                    <label for="effect_time">
                        <input type="text" class="form-control" id="effect_time" placeholder="请选择时间" value="" autocomplete="off" name="effect_time" required>
                        <i class="icon icon-calendar"></i>
                        <input type="hidden" id="start_time">
                        <input type="hidden" id="end_time">
                    </label>
                </div>
                <div class="help-block mb-0">开始时间点为选中日期的0:00:00，结束时间点为选中日期的23:59:59</div>
            </div>

        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">优惠券说明</label>
            <div class="col-md-5">
                <textarea class="form-control ta_resize" name="desc" id="desc" rows="4"></textarea>
            </div>
        </div>
        <div class="form-group">
            <!-- 选择商品 -->
            <label class="col-md-2 control-label">参加活动商品</label>
            <div class="col-md-5">
                <label class="radio-inline">
                    <input class="allGoods" type="radio" value="1" name="range_type" checked="checked"/> 所有商品
                </label>
                <label class="radio-inline">
                    <input class="notallGoods" type="radio" name="range_type" value="0"> 部分商品
                </label>
            </div>
        </div>
        <div class="infoTab recomTab joinGoodsList addBtnSearch hidden" id="range_type">
            <ul id="myTab" class="nav nav-tabs" style="margin-bottom: 10px;">
                <li class="active"><a href="#goodsList" data-toggle="tab" aria-expanded="true"
                                      class="infoSingle">商品列表</a></li>
                <li class=""><a href="#goodsChosed" data-toggle="tab" aria-expanded="false" class="infoSingle">已选商品</a>
                </li>
                <li class="fr" style="text-align: right;">
                    <div class="search">
                        <input type="text" id="search_text" name="searchs" class="searchs" placeholder="商品名称">
                        <button class="search_to" type="button">搜索</button>
                    </div>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="goodsList">
                    <!--表格-->
                    <table class="table v-table">
                        <thead>
                        <tr>
                            <th>商品信息</th>
                            <th>库存</th>
                            <th>店铺</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody id="goods_lists">
                        </tbody>
                    </table>
                    <div class="page clearfix">
                        <div class="M-box3 m-style fr">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="goodsChosed">
                    <!--表格-->
                    <table class="table v-table">
                        <thead>
                        <tr>
                            <th>商品信息</th>
                            <th>库存</th>
                            <th>店铺</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-group add_back">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button class="btn adds" type="submit">保存</button>
                <a href="javascript:window.history.go(-1)" class="btn back">返回</a>
            </div>
        </div>
        <input type="hidden" name="coupon_type_id" id="coupon_type_id"/>
    </form>
</div>



<script>
    require(['utilAdmin', 'util'], function (utilAdmin, util) {
        $(function () {
            // $('#coupon_type_form').validate();
        util.layDate('#receive_coupon_time',true,function(value, date, endDate){
            var date1=date.year+'-'+date.month+'-'+date.date;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date;
            if(value){
                $('#start_receive_time').val(date1);
                $('#end_receive_time').val(date2);
                $('#receive_coupon_time').parents('.form-group').removeClass('has-error');
            }
            else{
                $('#start_receive_time').val('');
                $('#end_receive_time').val('');
            }
        });
        util.layDate('#effect_time',true,function(value, date, endDate){
            var date1=date.year+'-'+date.month+'-'+date.date;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date;
            if(value){
                $('#start_time').val(date1);
                $('#end_time').val(date2);
                $('#effect_time').parents('.form-group').removeClass('has-error');
            }
            else{
                $('#start_time').val('');
                $('#end_time').val('');
            }
        });

            window['coupon_type_info'] = <?php echo $coupon_type_info; ?>;
            window['post_coupon_type_url'] = "<?php echo $addCouponTypeUrl; ?>";
            if (typeof (coupon_type_info) == 'object') {
                window['post_coupon_type_url'] = "<?php echo $updateCouponTypeUrl; ?>";
                $("#coupon_type_id").val(coupon_type_info.coupon_type_id);
                $("#coupon_name").val(coupon_type_info.coupon_name);

                if (coupon_type_info.is_fetch == 1) {
                    $("#is_fetch").attr("checked", true);
                } else if (coupon_type_info.is_fetch == 0) {
                    $("#is_fetch").attr("checked", false);
                }

                if (coupon_type_info.coupon_genre == 1) {
                    $("#coupon_genre_1").attr("checked", "checked");
                    $("#no_limit_money").val(coupon_type_info.money);
                } else if (coupon_type_info.coupon_genre == 2) {
                    $("#coupon_genre_2").attr("checked", "checked");
                    $("#full_reduction_money").val(coupon_type_info.money);
                    $("#reduction_at_least").val(coupon_type_info.at_least);
                } else if (coupon_type_info.coupon_genre == 3) {
                    $("#coupon_genre_3").attr("checked", "checked");
                    $("#discount").val(coupon_type_info.discount);
                    $("#discount_at_least").val(coupon_type_info.at_least);
                }
                switchCouponGenre(coupon_type_info.coupon_genre);

            $('#coupon_genre_type_' + coupon_type_info.coupon_genre).show().siblings().hide();
            $('#coupon_genre_type_' + coupon_type_info.coupon_genre).find('input').prop('required', true);
            $('#coupon_genre_type_' + coupon_type_info.coupon_genre).show().siblings().find('input').removeAttr('required');

                $("#count").val(coupon_type_info.count);
                $("#max_fetch").val(coupon_type_info.max_fetch);
                $("#start_receive_time").val(utilAdmin.timeStampTurnDate(coupon_type_info.start_receive_time));
                $("#end_receive_time").val(utilAdmin.timeStampTurnDate(coupon_type_info.end_receive_time));
                var val1 = utilAdmin.timeStampTurnDate(coupon_type_info.start_receive_time)+' - '+utilAdmin.timeStampTurnDate(coupon_type_info.end_receive_time);
                $("#receive_coupon_time").val(val1);

                $("#start_time").val(utilAdmin.timeStampTurnDate(coupon_type_info.start_time));
                $("#end_time").val(utilAdmin.timeStampTurnDate(coupon_type_info.end_time));
                var val2 = utilAdmin.timeStampTurnDate(coupon_type_info.start_time)+' - '+utilAdmin.timeStampTurnDate(coupon_type_info.end_time);
                $("#effect_time").val(val2);

                $("#desc").val(coupon_type_info.desc);

                if (coupon_type_info.range_type == 1) {
                    $("input[type=radio][name='range_type'][value=1]").attr("checked", "checked");
                } else if (coupon_type_info.range_type === 0) {
                    $("input[type=radio][name='range_type'][value=0]").attr("checked", "checked");
                }
                if (coupon_type_info.range_type == 0) {
                    $('#range_type').removeClass('hidden')
                    $("input[type=radio][name='range_type'][value=0]").prop("checked", true);
                    var goods_html = '';
                    $.each(coupon_type_info.goods_list, function (k, v) {
                        if (v.goods_name){
                            goods_html += '<tr id="html_' + v.goods_id + '" data-goodsid="' + v.goods_id + '">';
                            goods_html += '<td class="picword_td">';
                            goods_html += '<div class="media text-left">';
                            goods_html += '<div class="media-left">';
                            goods_html += '<div>';
                            if (v.picture_info != null) {
                                goods_html += '<p><img src="' + __IMG(v.picture_info.pic_cover_micro) + '" width="60" height="60"></p></div>';
                            } else {
                                goods_html += '<p><img src="__ROOT__/" width="60" height="60"></p></div>';
                            }
                            goods_html += '</div>';
                            goods_html += '<div class="media-body max-w-300">';
                            goods_html += '<div class="line-2-ellipsis"><a href="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + v.goods_id) + '" target="_blank" class="new-window" title="' + v.goods_name + '">' + v.goods_name + '</a></div>';
                            goods_html += ' <div class="small-muted line-2-ellipsis">' + v.price + '</div>';
                            goods_html += '</div></div></td>';
                            goods_html += '<td>' + v.stock + '</td>';
                            goods_html += '<td>' + v.shop_name + '</td>';
                            goods_html += '<td class="td-js-class">';
                            goods_html += '<a class="join cancelJoin" data-goodsId="' + v.goods_id + '" id="id_' + v.goods_id + '" href="javascript:;">取消参加</a>';
                            goods_html += '</td>';
                            goods_html += '</tr>';
                        }
                    })
                    $("#goodsChosed tbody").html(goods_html);
                }
                LoadingInfo(1);
            } else {
                $("button[type=submit]").html('添加')
                // 保存编辑时选择的商品id，防止重新加载商品列表时，已选中的商品为没选中，然后被重复选中
                coupon_type_info = {}
                coupon_type_info.goods_id_array = [];
                LoadingInfo(1);
            }
        });

        var flag = false;//防止重复提交
        function postCouponType() {
            var coupon_type_id = $("#coupon_type_id").val();
            var coupon_name = $("#coupon_name").val();
            var count = $("#count").val();
            var start_receive_time = $("#start_receive_time").val();
            var end_receive_time = $("#end_receive_time").val();
            var start_time = $("#start_time").val();
            var end_time = $("#end_time").val();
            var coupon_genre = $("input[name='coupon_genre']:checked").val();
            var max_fetch = $("#max_fetch").val();
            var range_type = $("input[name='range_type']:checked").val();
            var is_fetch = $("input[name='is_fetch']").is(':checked')?1:0;
            var desc = $("#desc").val();
            var obj = $("#goodsChosed tbody tr");
            var goods_id_array = '';
            obj.each(function (i) {
                goods_id_array += ',' + obj.eq(i).attr("data-goodsId");
            });
            goods_id_array = goods_id_array.substring(1);

            var money;
            var discount;
            var at_least;
            if (coupon_name === '') {
                utilAdmin.message('请输入优惠券名称！', 'info', function () {
                    $('#coupon_name').focus();
                });
                return false;
            }
            if (coupon_genre == 1) {
                money = $("#no_limit_money").val();
                at_least = 0;
                discount = 0;
                if (money <= 0) {
                    utilAdmin.message('请输入大于0的金额', 'info', function () {
                        $("#no_limit_money").focus();
                    });
                    return false;
                }
            } else if (coupon_genre == 2) {
                money = $("#full_reduction_money").val();
                at_least = $("#reduction_at_least").val();
                discount = 0;
                if (money <= 0) {
                    utilAdmin.message('请输入大于0的金额', 'info', function () {
                        $("#full_reduction_money").focus();
                    });
                    return false;
                }
            } else if (coupon_genre == 3) {
                money = 0;
                at_least = $("#discount_at_least").val();
                discount = $("#discount").val();
                if ((!(discount >= 0) || !(discount <= 10)) || discount === '') {
                    utilAdmin.message('请输入0-10的折扣', 'info', function () {
                        $("#discount").focus();
                    });
                    return false;
                }
            }

            if (count === '') {
                utilAdmin.message('请输入发放数量！', 'info', function () {
                    $('#count').focus();
                });
                return false;
            }
            if (parseInt(count) < parseInt(max_fetch) && parseInt(count) != 0){
                utilAdmin.message('每人最大领取数目要小于发放数量！', 'info', function () {
                    $('#max_fetch').focus();
                });
                return false;
            }
            if (start_receive_time === '') {
                utilAdmin.message('请输入领券时间！', 'info', function () {
                    $('#start_receive_time').focus();
                });
                return false;
            }
            if (end_receive_time === '') {
                utilAdmin.message('请输入领券时间！', 'info', function () {
                    $('#end_receive_time').focus();
                });
                return false;
            }
            if (start_time === '') {
                utilAdmin.message('请输入生效时间！', 'info', function () {
                    $('#start_time').focus();
                });
                return false;
            }
            if (end_time === '') {
                utilAdmin.message('请输入生效时间！', 'info', function () {
                    $('#end_time').focus();
                });
                return false;
            }
            if (utilAdmin.DateTurnTime(start_receive_time) > utilAdmin.DateTurnTime(end_receive_time)) {
                utilAdmin.message('开始领券时间大于结束时间', 'info', function () {
                    $("#receive_coupon_time").focus();
                });
                return false;
            }
            if (utilAdmin.DateTurnTime(start_time) > utilAdmin.DateTurnTime(end_time)) {
                utilAdmin.message('开始生效时间大于结束时间', 'info', function () {
                    $("#effect_time").focus();
                });
                return false;
            }
            if (util.DateTurnTime(end_receive_time) > util.DateTurnTime(end_time)) {
                $("#end_receive_time").focus();
                util.message("最大领取时间应小于最大使用时间");
                return;
            }
            if (range_type == 0 && goods_id_array === '') {
                utilAdmin.message('请选择商品', 'info', function () {});
                return;
            }

            if (flag) {
                return;
            }
            flag = true;
            $.ajax({
                type: "post",
                url: post_coupon_type_url,
                data: {
                    'coupon_type_id': coupon_type_id,
                    //admin 添加优惠券都是本店
                    'shop_range_type': 1,
                    'coupon_name': coupon_name,
                    'coupon_genre': coupon_genre,
                    'money': money,
                    'count': count,
                    'at_least': at_least,
                    'discount': discount,
                    'max_fetch': max_fetch,
                    'range_type': range_type,
                    'start_receive_time': start_receive_time,
                    'end_receive_time': end_receive_time,
                    'start_time': start_time,
                    'end_time': end_time,
                    'is_fetch': is_fetch,
                    'desc': desc,
                    'goods_list': goods_id_array,
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        utilAdmin.message(data["message"], 'success', function () {
                            location.href = "<?php echo __URL('ADDONS_ADMIN_MAINcouponTypeList'); ?>";
                        });
                    } else {
                        utilAdmin.message(data["message"]);
                        flag = false;
                    }
                }
            });
        }

        // 切换优惠券对应的输入
        $("input[name='coupon_genre']").on('change', function () {
            switchCouponGenre($("input[name='coupon_genre']:checked").val());
        })

        // 搜索商品
        $(".search_to").on('click', function () {
            LoadingInfo(1)
        })

        //加入商品
        $('body').on('click', '.joins', function () {
            var goods_id = $(this).attr('data-goodsId');
            $(this).removeClass('joins').addClass('cancelJoin');
            $(this).parent().html('<a class="join cancelJoin" data-goodsid="' + goods_id + '" id="id_' + goods_id + '" href="javascript:;">取消参加</a>');
            var html = $('#html_' + goods_id).html();
            $("#goodsChosed tbody").append('<tr data-goodsid="' + goods_id + '" id="html_' + goods_id + '">' + html + '</tr>');
            coupon_type_info.goods_id_array.push(parseInt(goods_id));
        })

        //取消参加
        $('body').on('click', '.cancelJoin', function () {
            var goods_id = $(this).attr('data-goodsId');
            $('#goodsChosed tbody #html_' + goods_id + '').remove();
            $('#id_' + goods_id + '').removeClass('cancelJoin').addClass('joins');
            $('#id_' + goods_id + '').html("参加活动");
            coupon_type_info.goods_id_array.splice($.inArray(parseInt(goods_id), coupon_type_info.goods_id_array), 1)
        })

        function switchCouponGenre(couponGenre) {
            switch (couponGenre) {
                case ('1'):
                case (1):
                    $("#coupon_genre_type_1").show();
                    $("#coupon_genre_type_2").hide();
                    $("#coupon_genre_type_3").hide();
                    break;
                case ('2'):
                case (2):
                    $("#coupon_genre_type_2").show();
                    $("#coupon_genre_type_1").hide();
                    $("#coupon_genre_type_3").hide();
                    break;
                case ('3'):
                case (3):
                    $("#coupon_genre_type_3").show();
                    $("#coupon_genre_type_1").hide();
                    $("#coupon_genre_type_2").hide();
                    break;
            }
        }

        function LoadingInfo(page_index) {
            $('#page_index').val(page_index ? page_index : '1');
            var search_text = $("#search_text").val();
            if ($("input[name='range_type']").val() == 0) {
                $("#turn-ul").show();
            } else {
                $("#turn-ul").hide();
            }
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/goods/getsearchgoodslist'); ?>",
                data: {
                    "page_index": page_index,
                    "page_size": $("#showNumber").val(),
                    "search_text": search_text,
                },
                success: function (data) {
                    $data_array = data['data'];
                    var html = '';
                    if (data['data'].length > 0) {
                        for (var i = 0; i < data['data'].length; i++) {
                            var curr = data['data'][i];

                            html += '<tr id="html_' + curr["goods_id"] + '">';
                            html += '<td class="picword_td">';
                            html += '<div class="media text-left ">';

                            if (curr["picture_info"] != null) {
                                html += '<div class="media-left"><p><img src="' + __IMG(curr["picture_info"]['pic_cover_micro']) + '" style="width:60px;height:60px;"></p></div>';
                            } else {
                                html += '<div class="media-left"><p><img src="__ROOT__/" style="width:60px;height:60px;"></p></div>';
                            }

                            html += '<div class="media-body max-w-300 ">';
                            html += ' <div class="line-2-ellipsis line-title">';
                            html += ' <a href="javascript:;" target="_blank" class="a-goods-title">' + curr["goods_name"] + ' </a>';
                            html += ' </div>';
                            html += ' <div class="small-muted line-2-ellipsis">' + curr["price"] + '</div>';
                            html += ' </div></div></td>';

                            html += '<td>' + curr["stock"] + '</td>';
                            html += '<td>' + curr["shop_name"] + '</td>';
                            if (coupon_type_info.goods_id_array.length > 0) {
                                if (jQuery.inArray(curr["goods_id"], coupon_type_info.goods_id_array) == "-1") {
                                    html += '<td class="td-js-class"><a href="javascript:;" class="join joins" id="id_' + curr["goods_id"] + '" data-goodsId="' + curr["goods_id"] + '">' + '参加活动' + '</a></td>';
                                } else {
                                    html += '<td class="td-js-class"><a href="javascript:;" class="join cancelJoin" id="id_' + curr["goods_id"] + '" data-goodsId="' + curr["goods_id"] + '">' + '取消参加' + '</a></td>';
                                }
                            } else {
                                html += '<td class="td-js-class"><a href="javascript:;" class="join joins" id="id_' + curr["goods_id"] + '" data-goodsId="' + curr["goods_id"] + '">' + '参加活动' + '</a></td>';
                            }
                        }//end for
                    } else {
                        html += '<tr align="center"><th colspan="4">暂无符合条件的数据记录</th></tr>';
                    }
                    $("#goods_lists").html(html);
                    utilAdmin.page('.M-box3', data['total_count'], data["page_count"], page_index, LoadingInfo);
                }
            });
        }

        utilAdmin.validate($('.form-validate'), function (form) {
            postCouponType();
        })

        $("input[name='coupon_genre']").on('change', function () {
            $('#coupon_genre_type_' + $(this).val()).show().siblings().hide();
            $('#coupon_genre_type_' + $(this).val()).find('input').prop('required', true);
            $('#coupon_genre_type_' + $(this).val()).show().siblings().find('input').removeAttr('required');
        })

        $('input[name=range_type]').on('change', function () {
            if ($(this).val() == 0) {
                $('#range_type').removeClass('hidden');
            } else {
                $('#range_type').addClass('hidden');
            }
        })
    })
</script>
