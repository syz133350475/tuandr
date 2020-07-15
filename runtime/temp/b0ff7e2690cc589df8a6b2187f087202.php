<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:46:"template/platform/Order/orderExportDialog.html";i:1591330112;}*/ ?>
<form action="" class="form-horizontal padding-15">

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span> 报表类型</label>
        <div class="col-md-8">
            <label class="radio-inline">
                <input type="radio" name="charts" id="" value="0" checked=""> 标准报表
            </label>
            <label class="radio-inline">
                <input type="radio" name="charts" id="" value="1"> 自定义报表
            </label>
            <div class="help-block">标准报表为商城默认报表模版，自定义报表可根据自己需求组装导出模版内容</div>
        </div>
    </div>

    <div class="form-group radioChart1">
        <label class="col-md-2 control-label"><span class="text-bright">*</span> 报表字段</label>
        <div class="col-md-8">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">现有列表</div>
                <!-- List group -->
                <div class="panel-body excel-list" id="excel-basic">
                	<?php if(is_array($basic) || $basic instanceof \think\Collection || $basic instanceof \think\Paginator): if( count($basic)==0 ) : echo "" ;else: foreach($basic as $bk=>$ba): ?>
                    <div class="field-item" data-id="<?php echo $bk; ?>"><?php echo $ba[1]; ?></div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group radioChart2" style="display: none">
        <label class="col-md-2 control-label"><span class="text-bright">*</span> 报表字段</label>
        <div class="col-md-8">
            <select name="" id="reportSelect" class="form-control inline-block w-200">
            </select>
            <span class="select1">
                <a class="btn btn-primary saveTemplate">将现有列表保存为模板</a>
                <a class="btn btn-danger clearAll">清空现有列表</a>
            </span>
            <span class="select2" style="display: none;">
                <a class="btn btn-success saveTemplate">保存当前模板</a>
                <a class="btn btn-danger" id="delTemplate">删除当前模板</a>
                <a class="btn btn-danger clearAll">清空现有列表</a>
            </span>

            <div class="help-block">可根据业务需求，制定多个订单导出模版。也可不选择模版直接根据现有列表字段导出。</div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">现有列表(可拖拽排序)</div>
                <!-- List group -->
                <div class="panel-body" id="add_fields">
                    <?php if(is_array($basic) || $basic instanceof \think\Collection || $basic instanceof \think\Paginator): if( count($basic)==0 ) : echo "" ;else: foreach($basic as $bk2=>$ba2): ?>
                    <div class="field-item field-item-remove" data-id="<?php echo $bk2; ?>" data-title="<?php echo $ba2[1]; ?>" data-subtitle="<?php echo $ba2[1]; ?>"><?php echo $ba2[1]; ?><span><i class="fa fa-remove icon-danger icon"></i></span></div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"> 可选列表(点击选用)</div>
                <!-- List group -->
                <div class="panel-body" id="new_fields">
                    <?php if(is_array($more) || $more instanceof \think\Collection || $more instanceof \think\Paginator): if( count($more)==0 ) : echo "" ;else: foreach($more as $mk=>$mo): ?>
                    <div class="field-item field-item-add" data-id="<?php echo $mk; ?>" data-title="<?php echo $mo[1]; ?>" data-subtitle="<?php echo $mo[1]; ?>"><?php echo $mo[1]; ?></div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

        </div>
    </div>

</form>
<script>
    require(['util','jquery-ui'], function (util) {
       var excelList = '';
   	   var basic = <?php echo json_encode($basic); ?>;
   	   var more = <?php echo json_encode($more); ?>;
       excelTemplate(0);
 	   function excelTemplate(id){
           $.ajax({
               type: "post",
               url: "<?php echo __URL('PLATFORM_MAIN/order/excelTemplate'); ?>",
               async: true,
               data: '',
               success: function (data) {
              	   html = '<option value="0">请选择导出模板</option>';
                   if (data['code'] > 0 && data['data']) {
                	 excelList = data['data'];
                	 for (i in excelList){
                		 if(excelList[i].template_id==id){
                			 html += '<option value="'+excelList[i].template_id+'" selected = "selected">'+excelList[i].template_name+'</option>';
                		 }else{
                			 html += '<option value="'+excelList[i].template_id+'" >'+excelList[i].template_name+'</option>';
                		 }
        			 }
                   }
       			   $('#reportSelect').html(html);
               }
           });
  	   }
 	   function excelLists(value){
           var adds = news ='';
           var list = excelList[value];
           if(value==0){
               $('.select1').show();
               $('.select2').hide();
          	    for (b in basic){
          	    	adds += '<div class="field-item field-item-remove" data-id="'+b+'" data-title="'+basic[b][1]+'" data-subtitle="'+basic[b][1]+'">'+basic[b][1]+'<span><i class="fa fa-remove icon-danger icon"></i></span></div>';
			    }
          	    for (m in more){
          	    	news += '<div class="field-item field-item-add" data-id="'+m+'" data-title="'+more[m][1]+'" data-subtitle="'+more[m][1]+'">'+more[m][1]+'</div>';
			    }
           }else{
               $('.select1').hide();
               $('.select2').show();
               for (l in list.ids){
            	   for (b in basic){
	           	    	if(list.ids[l]==b){
	           	    		adds += '<div class="field-item field-item-remove" data-id="'+b+'" data-title="'+basic[b][1]+'" data-subtitle="'+basic[b][1]+'">'+basic[b][1]+'<span><i class="fa fa-remove icon-danger icon"></i></span></div>';
	           	    	} 
            	   }
            	   for (m in more){
	           	    	if(list.ids[l]==m){
	           	    		adds += '<div class="field-item field-item-remove" data-id="'+m+'" data-title="'+more[m][1]+'" data-subtitle="'+more[m][1]+'">'+more[m][1]+'<span><i class="fa fa-remove icon-danger icon"></i></span></div>';
	           	    	}
            	   }
               }
          	   for (b in basic){
          	    	var sign = 0;
          	    	for (l in list.ids){
	           	    	if(list.ids[l]==b){
	           	    		sign = 1;
	           	    	}
          	    	}
          	    	if(sign==0)news += '<div class="field-item field-item-add" data-id="'+b+'" data-title="'+basic[b][1]+'" data-subtitle="'+basic[b][1]+'">'+basic[b][1]+'</div>';
			    }
          	    for (m in more){
          	    	var sign = 0;
          	    	for (l in list.ids){
	           	    	if(list.ids[l]==m){	
	           	    		sign = 1;
	           	    	}
          	    	}
          	    	if(sign==0)news += '<div class="field-item field-item-add" data-id="'+m+'" data-title="'+more[m][1]+'" data-subtitle="'+more[m][1]+'">'+more[m][1]+'</div>';
			    }
           }
      	    $('#add_fields').html(adds);
      	    $('#new_fields').html(news);
           initEvents();
 	   }
	   function initEvents(){
		   $('.field-item-remove span').unbind('click').click(function(){
			   removeField($(this).closest('.field-item'));
		   });
	       $('.field-item-add').unbind('click').click(function(){
	    	   addField($(this));
	       })
	       $('#add_fields').sortable({
	   // 	   stop: function(){ changedata(false) }
	       });
	   }
	   function removeField(item){
		   var field = item.data('field');
		   var html = '<div class="field-item field-item-add"  data-field="' + field+'" data-id="' + item.data('id')+'"  data-title="' + item.data('title')+'"  data-subtitle="' + item.data('subtitle')+'">' +( item.data('subtitle') || item.data('title') )+ ' </div>';
		   $('#new_fields').append(html);
		   item.remove();
		   initEvents();
		//    changedata();
	   }
	   function addField(item){
		   var field = item.data('field');
		   var html = '<div class="field-item field-item-remove"  data-field="' + field+'" data-id="' + item.data('id')+'"  data-title="' + item.data('title')+'" data-subtitle="' + item.data('subtitle')+'">' +( item.data('subtitle') || item.data('title') ) + ' <span><i class="fa fa-remove icon-danger icon"></i></span></div>';
		   $('#add_fields').append(html);
		   item.remove();
		   initEvents();
		//    changedata();
	   }
	//    function changedata(isnew){
		   
	// 	   var columns = [];
	// 	   $('#add_fields').find('.field-item').each(function(){
	// 		   columns.push({
	// 			   field:$(this).data('field'), 
	// 			   title:$(this).data('title'),
	// 			   subtitle:$(this).data('subtitle'), 
	// 			   width:$(this).data('width')
	// 		   });
	// 	   });
	// 	   $.post("http://shop19.vslai.com/web/index.php?c=site&a=entry&p=export&op=save&do=order&m=sz_yi",{columns:columns,tempname:currentTemplate},function(ret){
	// 		   if(isnew){
	// 		   ret = eval("(" + ret + ")");
	// 		   if(ret.templates){
	// 			  $('#templates').empty();
	// 			  	var opt=new Option('请选择导出列模板','');
	// 				$('#templates')[0].options.add(opt);	
	// 			   $.each(ret.templates,function(i,tn){
	// 				   var opt=new Option(tn,tn);
	// 				  $('#templates')[0].options.add(opt);
	// 			  }); 
	// 			 $('#templates').val(currentTemplate).trigger('change');
				 
	// 		   }}
	// 	   });
	//    }
       initEvents();
      //全部清空
      $('.clearAll').on('click',function(){
           $('.field-item-remove').each(function(){
               var _this=$(this);
               removeField(_this);
           });
       })
      //删除模板确认框
      $('#delTemplate').on('click',function(){
          util.alert('确定删除当前模板？', function () {
        	  var template_id = $("#reportSelect").val();
              $.ajax({
                  type: "post",
                  url: "<?php echo __URL('PLATFORM_MAIN/order/deleteExcel'); ?>",
                  async: true,
                  data: {template_id:template_id},
                  success: function (data) {
                      if (data["code"] > 0) {
	                      excelTemplate(0);
	                      util.message(data["message"], 'success',function(){
	                    	  excelLists(0);
	                      });
                      } else {
                    	  util.message(data["message"], 'danger');
                      }
                  }
              })
          });
      })
      //保存模板
      var flag = false;
      $('.saveTemplate').on('click',function(){
          var html='';
          var text = '';
		  var template_id = $("#reportSelect").val();
		  if(template_id>0){
			  text = excelList[template_id].template_name;
		  }
          html +='<form class="form-horizontal padding-15"><div class="form-group"><label class="col-md-3 control-label">模板名称</label><div class="col-md-8"><input type="text" name="template_name" id="template_name" value="'+text+'" class="form-control"></div></div></form>';
          util.confirm('系统提示',html,function(){
				var template_name = $("#template_name").val();
	          	var ids = '';
	          	if (flag)return;
	        	$(".excel-list .field-item").each(function(){
	            	var id = $(this).data('id');
	            	ids += id + ',';
	        	});
				if(!template_name){
					util.message('请输入模板名称');
					return false;
				}
				if(ids.length==0){
					util.message('请添加模板字段');
					return false;
				}
	            $.ajax({
	                type: "post",
	                url: "<?php echo __URL('PLATFORM_MAIN/order/editExcelTemplate'); ?>",
	                data: {template_id:template_id,template_name:template_name,ids:ids},
	                success: function (data) {
	                    if (data["code"] > 0) {
	                    	excelTemplate(data["code"]);
	                        util.message(data["message"], 'success',function(){
	                        	flag = false;
	                        });
	                    } else {
	                        util.message(data["message"], 'danger',function(){
	                        	flag = false;
	                        });
	                    }
	                }
	            });
          })
      })

        // 自定义列表报表字段切换
        $('#reportSelect').on('change',function(){
            var value = $('#reportSelect option:selected').val();
            excelLists(value);
        })
        // 报表类型切换
        $('input[name="charts"]').on('change',function(){
            var value=$(this).val();
            if(value==0){
                $('.radioChart1').show();
                $('.radioChart2').hide();
                $('#excel-basic').addClass('excel-list');
                $('#add_fields').removeClass('excel-list');
            }
            if(value==1){
                $('.radioChart1').hide();
                $('.radioChart2').show();
                $('#excel-basic').removeClass('excel-list');
                $('#add_fields').addClass('excel-list');
            }
        })
    })
</script>