<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"/www/wwwroot/www.tuandr.com/template/error_tmpl.html";i:1583811760;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo lang('jump_hint'); ?></title>
<link rel="stylesheet" type="text/css"
	href="__STATIC__/css/seller_center.css"></link>
</head>
<body style="background-color: #fff">
    <div class="system-message1" style="margin: 60px auto;width: 600px;text-align: center;">
    	<!--<img src="__STATIC__/images/error.png" style="margin-right:20px;"/>-->
        <div><img src="__STATIC__/images/404.gif"/></div>
    	<?php switch ($code) {case 0:?>
    	<ul>
    	<li class="error-msg"><?php echo(strip_tags($msg));?></li>
    	 <?php break;} ?>
    	<li> <?php echo lang('page_automation'); ?> <a id="href" href="<?php echo($url);?>"><?php echo lang('jump'); ?></a> <?php echo lang('waiting_time'); ?>： <b id="wait"><?php echo($wait);?></b></li>
    	</ul>
    	</div>
    <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
</body>
</html>