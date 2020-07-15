<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/www/wwwroot/www.tuandr.com/addons/distribution/template/platform/commissionRecordsList.html";i:1583811698;}*/ ?>



        <form class="v-filter-container">
            <div class="filter-fields-wrap">
                <div class="filter-item clearfix">
                    <div class="filter-item__field">
                        <div class="v__control-group">
                            <label class="v__control-label">流水单号</label>
                            <div class="v__controls">
                                <input type="text" id="no" class="v__control_input" autocomplete="off">
                            </div>
                        </div>
                        <div class="v__control-group">
                            <label class="v__control-label">会员信息</label>
                            <div class="v__controls">
                                <input type="text" id="search_text" class="v__control_input" placeholder="手机号码/会员ID/用户名/昵称" autocomplete="off">
                            </div>
                        </div>

                        <div class="v__control-group">
                            <label class="v__control-label">变动类型</label>
                            <div class="v__controls">
                                <select class="v__control_input" id="from_type">
                                    <option value="">请选择类型</option>
                                    <option value="1">订单完成</option>
                                    <option value="2">订单退款成功</option>
                                    <option value="3">订单支付成功</option>
                                    <option value="4">佣金提现</option>
                                    <option value="22">下级分销商升级</option>
                                </select>
                            </div>
                        </div>

                        <div class="v__control-group">
                            <label class="v__control-label">申请时间</label>
                            <div class="v__controls v-date-input-control">
                                <label for="orderTime">
                                    <input type="text" class="v__control_input pr-30" id="orderTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                                    <i class="icon icon-calendar"></i>
                                    <input type="hidden" id="orderStartDate">
                                    <input type="hidden" id="orderEndDate">
                                </label>
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
                                <a class="btn btn-success ml-15 dataExcel">导出明细表</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="screen-title">
            <span class="text">流水列表</span>
        </div>
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th>流水号</th>
                <th>会员信息</th>
                <th>类别</th>
                <th>变动金额</th>
                <th>个人所得税</th>
                <th>时间</th>
                <th>详情</th>
            </tr>
            </thead>
            <tbody id="list">
            </tbody>
        </table>
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="page" class="pagination pull-right"></ul>
        </nav>


<script>
    require(['util'],function(util){
        util.initPage(getAccountList);
        // util.layDate('#startDate');
        // util.layDate('#endDate');
        util.layDate('#orderTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;

            if(value){
                $('#orderStartDate').val(date1);
                $('#orderEndDate').val(date2);
            }
            else{
                $('#orderStartDate').val('');
                $('#orderEndDate').val('');
            }

        });
        
        function getAccountList(page_index){
            var records_no = $("#no").val();
            var search_text = $("#search_text").val();
            var start_date = $("#orderStartDate").val();
            var end_date = $("#orderEndDate").val();
            var from_type = $("#from_type").val();
            $.ajax({
                type : "post",
                url : "<?php echo $commissionRecordsListUrl; ?>",
                async : true,
                data : {
                    "page_index" : page_index, "search_text":search_text, "records_no":records_no, "from_type":from_type, "start_date":start_date, "end_date":end_date,'website_id':<?php echo $website_id; ?>
                },
                success : function(data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            html += '<td>' + data["data"][i]["records_no"]+ '</td>';
                            html += '<td><a href="' + __URL('PLATFORM_MAIN/member/memberDetail?member_id=' + data["data"][i]["uid"]) + '" class="text-primary block mt-04">' + data["data"][i]["user_info"]+ '</a></td>';
                            html += '<td>' + data["data"][i]["type_name"]+ '</td>';
                            html += '<td>' + data["data"][i]["commission"] + '</td>';
                            html += '<td>' + data["data"][i]["tax"] + '</td>';
                            html += '<td>' + data["data"][i]["create_time"] + '</td>';
                            html += '<td><a class="btn-operation send" href="javascript:;" data-id="' + data["data"][i]["id"]+ '">详情</a></td>';
                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td colspan="8" class="h-200">暂无符合条件的数据记录</td></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#list").html(html);
                    util.tips();
                    accountDetail();
                }
            });
        }
        $('.search').on('click',function(){
            util.initPage(getAccountList);
        });
        /**
         * 分红流水详情
         */
        function accountDetail(){
            $('.send').on('click',function(){
                var id = $(this).data('id');
                $.ajax({
                    type : "get",
                    url : "<?php echo $commissionInfoUrl; ?>",
                    async : true,
                    data : {
                        "id" : id
                    },
                    success : function(list) {
                        var html = "<form class='form-horizontal padding-15' id=''>";
                        html += "<div class='form-group'>";
                        html += "<label class='col-md-3 control-label'>流水号</label>";
                        html += "<div class='col-md-8'>";
                        html += "<p class='form-control-static'>"+list[0]['records_no']+"</p>";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='form-group'>";
                        html += "<label class='col-md-3 control-label'>订单或提现流水号</label>";
                        html += "<div class='col-md-8'>";
                        html += "<p class='form-control-static'>"+list[0]['data_id']+"</p>";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='form-group'>";
                        html += "<label class='col-md-3 control-label'>会员信息</label>";
                        html += "<div class='col-md-8'>";
                        html += "<p class='form-control-static'>"+list[0]['user_tel']+"</p>";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='form-group'>";
                        html += "<label class='col-md-3 control-label'>提现类型</label>";
                        html += "<div class='col-md-8'>";
                        html += "<p class='form-control-static'>"+list[0]['from_type']+"</p>";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='form-group'>";
                        html += "<label class='col-md-3 control-label'>金额</label>";
                        html += "<div class='col-md-8'>";
                        html += "<p class='form-control-static'>"+list[0]['commission']+"</p>";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='form-group'>";
                        html += "<label class='col-md-3 control-label'>个人所得税</label>";
                        html += "<div class='col-md-8'>";
                        html += "<p class='form-control-static'>"+list[0]['tax']+"</p>";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='form-group'>";
                        html += "<label class='col-md-3 control-label'>申请时间</label>";
                        html += "<div class='col-md-8'>";
                        html += "<p class='form-control-static'>"+list[0]['create_time']+"</p>";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='form-group'>";
                        html += "<label class='col-md-3 control-label'>备注</label>";
                        html += "<div class='col-md-8'>";
                        if(list[0]['text']){
                            html += "<p class='form-control-static'>"+ list[0]['text']+"</p>";
                        }else{
                            html += "<p class='form-control-static'>无</p>";
                        }
                        html += "</div>";
                        html += "</div>";
                        html += "</form>";
                        util.confirm('流水详情', html,function(){

                        })
                    }
                });
            })
        }
        /**
         * 余额流水数据导出
         */
        $('.dataExcel').on('click',function(){
            var search_text = $("#search_text").val();
            var start_date = $("#orderStartDate").val();
            var end_date = $("#orderEndDate").val();
            var from_type = $("#from_type").val();
            var records_no = $("#no").val();
            var website_id = <?php echo $website_id; ?>;
            window.location.href="<?php echo $commissionRecordsDataExcelUrl; ?>?from_type="+from_type+"&records_no="+records_no+"&start_date="+start_date+"&end_date="+end_date+"&search_text="+search_text+"&website_id="+website_id;
        })
    })
</script>
