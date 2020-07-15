<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/www/wwwroot/www.tuandr.com/addons/seckill/template/platform/secKillCount.html";i:1583811700;}*/ ?>

        <!-- page -->
        <form class="v-filter-container">
            <div class="filter-fields-wrap">
                <div class="filter-item clearfix">
                    <div class="filter-item__field">
                        <div class="v__control-group">
                            <label class="v__control-label">商品名称</label>
                            <div class="v__controls">
                                <input type="text" id="search_text" class="v__control_input" autocomplete="off">
                            </div>
                        </div>

                        <div class="v__control-group">
                            <label class="v__control-label">秒杀日期</label>
                            <div class="v__controls v-date-input-control">
                                <label for="seckill_date">
                                    <input type="text" class="v__control_input pr-30" id="seckill_date" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                                    <i class="icon icon-calendar"></i>
                                </label>
                            </div>
                        </div>

                        <div class="v__control-group">
                            <label class="v__control-label">秒杀时段</label>
                            <div class="v__controls">
                                <select class="v__control_input" id="seckill_name" >
                                    <option value=-1>所有时段</option>
                                    <?php if(is_array($sk_quantum_arr) || $sk_quantum_arr instanceof \think\Collection || $sk_quantum_arr instanceof \think\Paginator): if( count($sk_quantum_arr)==0 ) : echo "" ;else: foreach($sk_quantum_arr as $key=>$sk_quantum): ?>
                                        <option value="<?php echo $sk_quantum; ?>"><?php echo $sk_quantum; ?>点场</option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="v__control-group">
                            <label class="v__control-label">排序方式</label>
                            <div class="v__controls">
                                <select class="v__control_input" id="sort">
                                    <option value="store_num_asc">按销量升序</option>
                                    <option value="store_num_desc">按销量降序</option>
                                    <option value="store_price_asc">按销售额升序</option>
                                    <option value="store_price_desc">按销售额降序</option>
                                    <option value="seckill_price_asc">按秒杀价升序</option>
                                    <option value="seckill_price_desc">按秒杀价降序</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="filter-item clearfix">
                    <div class="filter-item__field">
                        <div class="v__control-group">
                            <label class="v__control-label"></label>
                            <div class="v__controls">
                                <a class="btn btn-primary search"><i class="icon icon-search"></i> 搜索</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="screen-title" data-id="t2"><span class="text">数据列表</span></div>
        <div class="flex-auto-center mb-20 bg-col text-center border-col">
            <div class="flex-1 padding-15">
                <h3 class="strong">商品总数</h3>
                <p id="goods_quantity_total"></p>
            </div>
            <div class="flex-1 padding-15">
                <h3 class="strong">总销量</h3>
                <p id="store_num_total"></p>
            </div>
            <div class="flex-1 padding-15">
                <h3 class="strong">总销售额</h3>
                <p id="store_price_total"></p>
            </div>
        </div>
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th>序号</th>
                <th>商品名称</th>
                <th>秒杀价</th>
                <th>销量</th>
                <th>销售额</th>
            </tr>
            </thead>
            <tbody id="goods_count_list">

            </tbody>
        </table>
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="page" class="pagination pull-right"></ul>
        </nav>



<script id="shop_curr_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td><div <%if index == 0 || index== 1 || index == 2%>class="ranking placed" <%/if%>><%index+1%></div></td>
        <td>
            <div class="media text-left">
                <div class="media-left">
                    <img src="<%item.goods_img%>" onerror="" width="60" height="60">
                </div>
                <div class="media-body max-w-300">
                    <div class="line-2-ellipsis"><%item.goods_name%></div>
                    <div class="line-1-ellipsis text-danger strong"><%item.shop_name%>旗舰店</div>
                </div>
            </div>
        </td>
        <td><%item.seckill_price%></td>
        <td><%item.store_num%></td>
        <td><%item.store_price%></td>
    </tr>
    <%/each%>
</script>
<script>
    require(['util', 'tpl'], function (util, tpl) {
        $(function () {
            util.layDate("#seckill_date");
        })
        util.initPage(LoadingInfo);
        tpl.helper("timeStamp", function (timeStamp) {
            if (timeStamp > 0) {
                var date = new Date();
                date.setTime(timeStamp * 1000);
                var y = date.getFullYear();
                var m = date.getMonth() + 1;
                m = m < 10 ? ('0' + m) : m;
                var d = date.getDate();
                d = d < 10 ? ('0' + d) : d;
                var h = date.getHours();
                h = h < 10 ? ('0' + h) : h;
                var minute = date.getMinutes();
                var second = date.getSeconds();
                minute = minute < 10 ? ('0' + minute) : minute;
                second = second < 10 ? ('0' + second) : second;
                return y + '-' + m + '-' + d + ' ' + h + ':' + minute + ':' + second;
            } else {
                return "";
            }
        });


        function LoadingInfo(page_index) {
            // console.dir(123123123);return;
            //获取条件商品名称、秒杀日期、秒杀时段、排序方式
            var search_text = $('#search_text').val();
            var seckill_date = $('#seckill_date').val();
            var seckill_name = $('#seckill_name').val();
            var order = $('#sort').val();
            $("#page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $getSecGoodsInfoCount; ?>",
                data: {
                    "page_index": page_index,
                    "search_text": search_text,
                    "seckill_date": seckill_date,
                    "seckill_name": seckill_name,
                    "order": order,
                },
                success: function (data) {
                    // console.log(data);return;
                    //更新总数
                    $('#goods_quantity_total').html(data.goods_count_total.goods_quantity_total);
                    $('#store_num_total').html(data.goods_count_total.store_num_total);
                    $('#store_price_total').html(data.goods_count_total.store_price_total);
                    html ='';
                    html += '<tr><td colspan="5" class="h-200">暂无符合条件的数据记录</td></tr>';
                    if(tpl('shop_curr_list', data)){
                        for(var i = 0;i < data.data.length; i++){
                            data.data[i]['goods_img'] = __IMG( data.data[i]['goods_img']);
                        }
                        $("#goods_count_list").html(tpl('shop_curr_list', data));
                    }else{
                        $("#goods_count_list").html(html);
                    }
                }
            });
        }
        $('.search').click(function(){
            util.initPage(LoadingInfo);
        })
    })

</script>

