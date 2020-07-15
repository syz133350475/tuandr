<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/www.tuandr.com/addons/seckill/template/admin/secKillList.html";i:1583811700;}*/ ?>



<!--添加按钮和搜索框-->
<div class="row addBtnSearch addBtnSearchTo">
    <div class="col-sm-6 add">
        <?php if($is_reach): ?>
        <a href="<?php echo __URL('ADDONS_ADMIN_MAINaddSecKill'); ?>" class="add_btn"><i class="icon icon-add1"></i> 我要报名</a>
        <?php else: ?>
        <a href="javascript:;" class="unadd_btn">不可报名</a>
        <a href="javascript:;" class="to_requirements">报名要求</a>
        <?php endif; ?>
    </div>
    <div class="searchFr search" style="">
        <input type="text" class="searchs" id="search_text" placeholder="商品名称">
            <span class="pr">
                <input type="text" id="date" name="seckill_date_section" class="searchs" style="width: 42%" required="" placeholder="时间区间" title="时间区间" aria-required="true">
                <label for="seckill_date_section"><i class="fa icon-calendar"></i></label>
            </span>
        <button class="search_to" onclick="LoadingInfo(1)">搜索</button>
    </div>
</div>
<div class="infoTab">
    <ul id="myTab" class="nav nav-tabs v-nav-tabs">
        <li <?php if($status == 'going'): ?>class="active"<?php endif; ?> data-status="going" id="going">
            <a href="<?php echo __URL('ADDONS_ADMIN_MAINsecKillList'); ?>&status=going">
                <p>进行中</p>
                <p></p>
            </a>
        </li>
        <li <?php if($status == 'unstart'): ?>class="active"<?php endif; ?> data-status="unstart" id="unstart">
            <a href="<?php echo __URL('ADDONS_ADMIN_MAINsecKillList'); ?>&status=unstart">
                <p>待开始</p>
                <p></p>
            </a>
        </li>
        <li <?php if($status == 'uncheck'): ?>class="active"<?php endif; ?> data-status="uncheck" id="uncheck">
            <a href="<?php echo __URL('ADDONS_ADMIN_MAINsecKillList'); ?>&status=uncheck">
                <p>待审核</p>
                <p></p>
            </a>
        </li>
        <li <?php if($status == 'ended'): ?>class="active"<?php endif; ?> data-status="ended" id="ended">
            <a href="<?php echo __URL('ADDONS_ADMIN_MAINsecKillList'); ?>&status=ended" >
                <p>已结束</p>
                <p></p>
            </a>
        </li>
        <li <?php if($status == 'refused'): ?>class="active"<?php endif; ?> data-status="refused" id="refused">
            <a href="<?php echo __URL('ADDONS_ADMIN_MAINsecKillList'); ?>&status=refused" >
                <p>已拒绝</p>
                <p></p>
            </a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="{}">
            <!--表格-->
            <table class="table table-hover v-table">
                <thead>
                <tr>
                    <th><input type="checkbox" name="select_all" id="select_all"></th>
                    <th>商品信息</th>
                    <th>秒杀价</th>
                    <th>活动库存</th>
                    <th>限购量</th>
                    <th>场次</th>
                </tr>
                </thead>
                <tbody class="ol_tbody">

                </tbody>
            </table>
            <div class="page clearfix">
                <div class="M-box3 m-style fr">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page clearfix">
    <div class="M-box3 m-style fr">
    </div>
</div>
<!-- page end -->




<script type="text/javascript">
    require(['utilAdmin','util'], function (utilAdmin,util) {
        util.layDate("#date",true,function(value, date, endDate){
            var start_date=date.year+"-"+date.month+"-"+date.date;
            var end_date=endDate.year+"-"+endDate.month+"-"+endDate.date;

        })
    $(function () {
        LoadingInfo(1);
    });
    //搜索
    $('.search_to').click(function(){
        LoadingInfo(1);
    })
    function LoadingInfo(page_index) {
        //获取当前active的状态
        var status = $('#myTab .active').data('status');
        var date = $('#date').val();
        $('#page_index').val(page_index ? page_index : '1');
        $.ajax({
            type: "post",
            url: "<?php echo $getAdminSecKillList; ?>",
            data: {
                "page_index": page_index,
                'page_size': $("#showNumber").val(),
                "search_text": $("#search_text").val(),
                "status": status,
                "date": date,
            },
            success: function (data) {
                $('#going p').eq(1).html('('+data.status_goods_total.going_total+')');
                $('#unstart p').eq(1).html('('+data.status_goods_total.unstart_total+')');
                $('#uncheck p').eq(1).html('('+data.status_goods_total.uncheck_total+')');
                $('#ended p').eq(1).html('('+data.status_goods_total.ended_total+')');
                $('#refused p').eq(1).html('('+data.status_goods_total.refused_total+')');
                if(status == 'refused'){
                    var tr_th = '<tr> <th><input type="checkbox" name="select_all" id="select_all"></th> <th>商品信息</th> <th>秒杀价</th> <th>活动库存</th> <th>限购量</th><th>场次</th><th>原因</th> </tr>';
                    $('thead').html(tr_th);
                }
                var html = '';
                if (data["data"].length > 0) {
                    for (var i = 0; i < data["data"].length; i++) {
                        html += '<tr>';
                        html += '<td><input type="checkbox" name="slect_goods"></td>';
                        html += '<td><div class="media text-left"> <div class="media-left"> <img src="'+data['data'][i]['pic_cover_big']+'" width="60" height="60"> </div> <div class="media-body max-w-300"> <div class="line-1-ellipsis">'+data['data'][i]['goods_name']+'</div> </div> </div></td>';
                        html += '<td>' + data["data"][i]["seckill_price"] + '</td>';
                        html += '<td>' + data["data"][i]["seckill_num"] + '</td>';
                        html += '<td>' + data["data"][i]["seckill_limit_buy"] + '</td>';
                        if(status == 'going'){
                            html += '<td><p>' + data["data"][i]["seckill_date"] + '</p><p>' + data["data"][i]["seckill_name"] + '点场</p></td>';
                        }else{
                            html += '<td><div>'+timeStampTurnTimeYmd(data["data"][i]["seckill_time"])+'</div><div>' + data["data"][i]["seckill_name"] + '点场</div></td>';
                        }
                        if(status == 'refused'){
                            html +='<td>'+ data['data'][i]['seckill_del_info'] +'</td>'
                        }
                        html += '</tr>';
                    }
                } else {
                    html += '<tr align="center"><td class="h-200" colspan="6">暂无符合条件的数据记录</td></tr>';
                }
                $("tbody").html(html);
                utilAdmin.page(".M-box3", data['total_count'], data["page_count"], page_index, LoadingInfo);
            }
        });
    }
    //时间戳转时间类型
    function timeStampTurnTimeYmd(timeStamp){
        if(timeStamp > 0){
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
            return y + '-' + m + '-' + d;
        }else{
            return "";
        }
    }
    //切换tab
    $('#myTab li').click(function(){
        if( !$(this).hasClass('active') ){
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
        }
    })
    //点击报名要求，弹框
    $('.to_requirements').click(function(){
        util.seckillRequirementsDialog('url:/admin/addons/execute/addons/seckill/controller/Seckill/action/seckillRequirementsDialog',function(data){
        });
    })

    })
</script>

