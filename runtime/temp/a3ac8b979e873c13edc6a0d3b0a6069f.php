<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/www/wwwroot/www.tuandr.com/addons/customform/template/platform/customFormList.html";i:1583811704;}*/ ?>

<!-- page -->
<!--<div class="mb-20">
    <a href="<?php echo __URL('ADDONS_MAINaddCustomForm'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加模板</a>
    <div class="input-group search-input-group pull-right">
        <div style="margin-right: 20%;">
            <input type="text" class="form-control" id="search_text" name="search_text" placeholder="模板名称">
        </div>
        <div>
            <button type="submit" class="btn btn-primary search">搜索</button>
        </div>
    </div>
</div>-->
<div class="mb-20">
    <a href="<?php echo __URL('ADDONS_MAINaddCustomForm'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加模板</a>
    <div class="input-group search-input-group ml-10" style="float:right">
        <input type="text" class="form-control" id="search_text" name="search_text" placeholder="模板名称">
        <span class="input-group-btn">
            <button class="btn btn-primary search J-search" type="button">搜索</button>
        </span>
    </div>
</div>
<table class="table v-table table-auto-center">
    <thead>
    <tr>
        <th>模板标签</th>
        <th>模板名称</th>
        <th>使用情况</th>
        <th class="col-md-2 pr-14 operationLeft">操作</th>
    </tr>
    </thead>
    <tbody id="custom_form_list">
    <?php if($data['custom_forms']): foreach($data['custom_forms'] as $custom): ?>
    <tr class="tr_h">
        <td>
            <?php if($custom['custom_tag']['tag_name']): ?>
            <span class="label label-primary"><?php echo $custom['custom_tag']['tag_name']; ?></span>
            <?php endif; ?>
        </td>
        <td>
            <span><?php echo $custom['name']; ?></span>
        </td>
        <td class="td_<?php echo $custom['id']; ?>">
            <?php if($data['set_data']->order_coupon == 1 && $data['set_data']->order_id == $custom['id']): ?>
            <?php echo $data['set_data']->order_chmod_text; ?> </br>
            <?php endif; if($data['set_data']->member == 1 && $data['set_data']->member_id == $custom['id']): ?>
            <?php echo $data['set_data']->member_text; ?>  </br>
            <?php endif; if($data['set_data']->distributor == 1 && $data['set_data']->distributor_id == $custom['id']): ?>
            <?php echo $data['set_data']->district_text; ?>  </br>
            <?php endif; if($data['set_data']->shareholder == 1 && $data['set_data']->shareholder_id == $custom['id']): ?>
            <?php echo $data['set_data']->share_text; ?>   </br>
            <?php endif; if($data['set_data']->region == 1 && $data['set_data']->region_id == $custom['id']): ?>
            <?php echo $data['set_data']->region_text; ?> </br>
            <?php endif; if($data['set_data']->captain == 1 && $data['set_data']->captain_id == $custom['id']): ?>
            <?php echo $data['set_data']->captain_text; ?> </br>
            <?php endif; if($data['set_data']->channel_dealer == 1 && $data['set_data']->channel_id == $custom['id']): ?>
            <?php echo $data['set_data']->channel_text; endif; if($data['set_data']->shop_apply_dealer == 1 && $data['set_data']->apply_id == $custom['id']): ?>
            <?php echo $data['set_data']->shop_text; endif; ?>
        </td>
        <td class="operationLeft fs-0">
            <?php if(($data['set_data']->order_coupon == 1 && $data['set_data']->order_id == $custom['id']) || ($data['set_data']->member == 1 && $data['set_data']->member_id == $custom['id']) || ($data['set_data']->distributor == 1 && $data['set_data']->distributor_id == $custom['id']) || ($data['set_data']->shareholder == 1 && $data['set_data']->shareholder_id == $custom['id']) || ($data['set_data']->region == 1 && $data['set_data']->region_id == $custom['id']) || ($data['set_data']->captain == 1 && $data['set_data']->captain_id == $custom['id']) || ($data['set_data']->channel_dealer == 1 && $data['set_data']->channel_id == $custom['id']) || ($data['set_data']->shop_apply_dealer == 1 && $data['set_data']->apply_id == $custom['id'])): ?>
            <a href="<?php echo __URL('ADDONS_MAINupdateCustomForm&custom_form_id='); ?><?php echo $custom['id']; ?>&type=1" class="btn-operation" data-type="edit" data-custom-form-id="<?php echo $custom['id']; ?>">查看</a>
            <a href="<?php echo __URL('ADDONS_MAINcustomData&custom_form_id='); ?><?php echo $custom['id']; ?>" class="btn-operation" data-type="edit" data-custom-form-id="<?php echo $custom['id']; ?>">数据</a>
            <?php else: ?>
            <a href="<?php echo __URL('ADDONS_MAINupdateCustomForm&custom_form_id='); ?><?php echo $custom['id']; ?>" class="btn-operation" data-type="edit" data-custom-form-id="<?php echo $custom['id']; ?>">编辑</a>
            <a href="javascript:;" data-custom-form-id="<?php echo $custom['id']; ?>" class="btn-operation text-red1 del a_<?php echo $custom['id']; ?>">删除</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; else: ?>
    <tr><td class="h-200" colspan="4">暂无符合条件的数据记录</td></tr>
    <?php endif; ?>
    </tbody>
    
</table>
<input type="hidden" id="page_index">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>

<!-- page end -->


<script id="shop_curr_list" type="text/html">
    
</script>

<script>
    $('.search').click(function () {
        var search_text = $('#search_text').val();
        $.ajax({
            type: "post",
            url: "<?php echo $customFormListUrl; ?>",
            async: true,
            data: {
                "page_index": '', "search_text": search_text,
            },
            success: function (data) {
                $(".tr_h").addClass('hidden');
                var html = '';
                $.each(data['custom_forms']['data'],function (i,item) {
                    var id = item['id'];

                    html += "<tr>";
                        html += "<td>"+item['name']+"</td>";
                        html += "<td class='new_td_"+id+"'>";
                            if(item['name'] == data['set_data']['order_name'] && data['set_data']['order_coupon'] == 1){
                                html += "<span>"+data['set_data']['order_chmod_text']+"</span>"+"<br>";
                            }
                    if(item['name'] == data['set_data']['member_name'] && data['set_data']['member'] == 1){
                        html += "<span>"+data['set_data']['member_text']+"</span>"+"<br>";
                    }
                    if(item['name'] == data['set_data']['distributor_name'] && data['set_data']['distributor'] == 1){
                        html += "<span>"+data['set_data']['district_text']+"</span>"+"<br>";
                    }
                    if(item['name'] == data['set_data']['shareholder_name'] && data['set_data']['shareholder'] == 1){
                        html += "<span>"+data['set_data']['share_text']+"</span>"+"<br>";
                    }
                    if(item['name'] == data['set_data']['region_name'] && data['set_data']['region'] == 1){
                        html += "<span>"+data['set_data']['region_text']+"</span>"+"<br>";
                    }
                    if(item['name'] == data['set_data']['captain_name'] && data['set_data']['captain'] == 1){
                        html += "<span>"+data['set_data']['captain_text']+"</span>"+"<br>";
                    }
                    if(item['name'] == data['set_data']['channel_name'] && data['set_data']['channel_dealer'] == 1){
                        html += "<span>"+data['set_data']['channel_text']+"</span>";
                    }
                        html += "</td>";
                    html += "<td></td>";
                    html += "<td class='operationLeft fs-0'><a href='<?php echo __URL('ADDONS_MAINupdateCustomForm&custom_form_id="+id+"'); ?>' class='btn-operation' data-type='edit' data-custom-form-id='"+id+"'>编辑</a>";
                    html += "<a href='javascript:;' data-custom-form-id='"+id+"' class='hidden btn-operation text-red1 del delete_"+id+"'>删除</a>";
                    html += "</td>";
                    html += "</tr>";

                })
                $("#custom_form_list").html(html);
                
                $.each(data['custom_forms']['data'],function (i,it) {
                    var cn = $('.new_td_' + it['id']).children('span').length;
                    if (cn == 0) {
                        $(".delete_"+it['id']).removeClass('hidden');
                    }
                })
            }
        });
    });
    require(['util', 'tpl'], function (util, tpl) {
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
        $('#custom_form_list').on('click', '.del', function () {
            var custom_form_id = $(this).attr('data-custom-form-id');
            util.alert('删除？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $deleteCustomFormUrl; ?>",
                    data: {"custom_form_id": custom_form_id},
                    dataType: "json",
                    success: function (data) {
                        location.reload();
                    }
                })
            })
        })
        $('#custom_form_list').on('click', '.btn-operation', function () {
            var type = $(this).attr('data-type');
            var custom_form_id = $(this).attr('data-custom-form-id');
            if (type == 'edit') {
                location.href = __URL('ADDONS_MAINupdateCustomFrom&custom_form_id=' + custom_form_id);
            }
        })
    })

    <?php foreach($data['custom_forms'] as $custom): ?>
    var cn = $(".td_"+"<?php echo $custom['id']; ?>").html();

    if (cn.length > 21){
        $(".a_"+"<?php echo $custom['id']; ?>").addClass('hidden');
    }
    <?php endforeach; ?>


</script>

