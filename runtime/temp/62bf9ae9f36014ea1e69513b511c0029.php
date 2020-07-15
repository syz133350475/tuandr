<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:36:"template/admin/Shop/goodsDialog.html";i:1583811760;}*/ ?>
<div class="goods-dialog" id="goods-dialog">
    <ul class="nav nav-tabs v-nav-tabs pt-15" role="tablist">
        <li role="presentation" class="active"><a href="#list" aria-controls="list" role="tab" data-toggle="tab" class="flex-auto-center">商品列表</a></li>
        <li role="presentation" ><a href="#selectedList" aria-controls="selectedList" role="tab" data-toggle="tab" class="flex-auto-center">已选商品</a></li>
        <div class="input-group search-input-group pull-right">
            <input type="text" class="form-control" name="name" placeholder="商品名称">
            <span class="input-group-btn"><button class="btn btn-primary search">搜索</button></span>
        </div>
    </ul>
    <div class="dialog-box tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="list">
            <table class="table v-table table-auto-center">
                <thead>
                    <tr>
                        <th>商品列表</th>
                        <th>店铺</th>
                        <th width="150">操作</th>
                    </tr>
                </thead>
                <tbody id="content"></tbody>
            </table>
            <nav aria-label="Page navigation" class="clearfix">
                <ul id="page_goods" class="pagination pull-right"></ul>
            </nav>
        </div>
        <div role="tabpanel" class="tab-pane" id="selectedList">
            <div class="divTable goodsTable">
                <div class="divThead">
                    <div class="divTh">商品列表</div>
                    <div class="divTh">店铺</div>
                    <div class="divTh">操作</div>
                </div>
                <div class="divTbody" id="curr-list"></div>
            </div>
        </div>
    </div>
    <p class="small-muted text-right padding-15">按住拖动可进行排序</p>
    <input type="hidden" id="selectedData">
</div>
<script id='goods_tpl_content' type='text/html'>
    <%each data as item itemid%>
    <tr>
        <td>
            <div class="media text-left">
                <div class="media-left">
                    <img src="<%item.pic_cover_micro%>" onerror="this.src='http://iph.href.lu/60x60';" width="60" height="60">
                </div>
                <div class="media-body max-w-300">
                    <div class="line-2-ellipsis"><%item.goods_name%></div>
                    <div class="line-1-ellipsis text-danger strong"><%item.price%></div>
                </div>
            </div>
        </td>
        <td>
            <%item.shop_name%>
        </td>
        <td>
            <a href="javascript:void(0);" class="text-<%if item.isselect == '0'%>primary<%else%>danger<%/if%> curr_btn" isselect="<%item.isselect%>" data-goods_id="<%item.goods_id%>" ><%if item.isselect == '0'%>推荐<%else%>取消推荐<%/if%></a>
        </td>
    </tr>
    <%/each%>
</script>
<script id="goods_curr_list" type="text/html">
    <%each data as item%>
        <div class="divTr" data-goods_id="<%item.goods_id%>">
            <div class="divTd">
                <div class="media text-left">
                    <div class="media-left">
                        <img src="<%item.pic_cover_micro%>" onerror="this.src='http://iph.href.lu/60x60';" width="60" height="60">
                    </div>
                    <div class="media-body max-w-300">
                        <div class="line-2-ellipsis"><%item.goods_name%></div>
                        <div class="line-1-ellipsis text-danger strong"><%item.price%></div>
                    </div>
                </div>
            </div>
            <div class="divTd">
                <%item.shop_name%>
            </div>
            <div class="divTd">
                <a href="javascript:void(0);" class="text-danger curr_btn" isselect="<%item.isselect%>" data-goods_id="<%item.goods_id%>" >取消推荐</a>
                <a href="javascript:void(0);" class="text-primary moveItem ml-10" style="cursor: move;" >拖动</a>
            </div>
        </div>
    <%/each%>
</script>
<script>
require(['util','tpl'],function(util,tpl){
    var session = new util.Storage('session');
    var page_index = 1;
    var curr_data = {};
    var all_data = {};
    var itemid = session.getItem('goods_data_itemid');
    console.log(itemid)
    if(session.getKey('goods_data_'+itemid)){
        curr_data = JSON.parse(session.getItem('goods_data_'+itemid))
        console.log(curr_data)
    }
    util.initPage(LoadingInfo,'page_goods')
    function LoadingInfo(page_index){
        var val = $('input[name="name"]').val();
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/config/modalGoodsList'); ?>",
            async: true,
            data: {
                "page_index": page_index,
                "search_text": val
            },
            success: function (data) {
                data.data.forEach(function(item,index,arr){
                    item.isselect = '0';
                    for(var i in curr_data.data){
                        if(item.goods_id == curr_data.data[i].goods_id){
                            item.isselect = '1';
                        }
                    }
                })
                all_data = data;
                $('#goods-dialog #content').html(tpl('goods_tpl_content',all_data));
                $('#goods-dialog #curr-list').html(tpl('goods_curr_list',curr_data));
                $('#goods-dialog #selectedData').data(curr_data);
                $('#page_goods').paginator('option', {
                    totalCounts: data.total_count
                });
            }
        });
    }
    // 搜索
    $('.search').on('click',function(){
        LoadingInfo(1)
    })
    // 推荐
    $('#goods-dialog').on('click','.curr_btn',function(){
        var newObj = {};
        var index = 0;
        var isselect = $(this).attr('isselect');
        var curr_id = $(this).data('goods_id');
        $.each(all_data.data,function(i,e){
            if(index == 0){
                if(curr_id == e.goods_id){
                    if(isselect=='1'){
                        // 取消推荐
                        e.isselect = '0';
                        delete curr_data.data['C'+curr_id];
                    }else{
                        // 推荐
                        e.isselect = '1';
                        newObj = e;
                        index++;
                        if (newObj) {
                            if (typeof(curr_data.data) === 'undefined') {
                                curr_data.data = {}
                            }
                            newObj = $.extend(true, {}, newObj);
                            curr_data.data['C'+curr_id] = newObj;
                        }
                    }
                }
            }
        })
        $('#goods-dialog #content').html(tpl('goods_tpl_content',all_data));
        $('#goods-dialog #curr-list').html(tpl('goods_curr_list',curr_data));
        $('#goods-dialog #selectedData').data(curr_data);
    })
    $("#goods-dialog #curr-list").sortable({
        opacity: 0.8,
        placeholder: "highlight",
        handle:'.moveItem',
        revert: 100,
        start: function (event, ui) {
            var height = ui.item.height();
            $(".highlight").css({"height": height + "px"});
            $(".highlight").html('<div class="text-center" style="line-height:'+height+'px;"><i class="icon icon-add1"></i> 拖动到此处</div>');
        },
        update: function (event, ui) {
            var newObj = {};
            $('#goods-dialog #curr-list .divTr').each(function(i,e){
                var thisid = $(this).data('goods_id');
                newObj['C'+thisid] = curr_data.data['C'+thisid];
            })
            
            curr_data.data = newObj;
            console.log(curr_data)
        }
    })
})
</script>