<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta name="viewport" content="width=640"/>
<!-- <meta http-equiv="refresh" content="1"> -->
<meta charset="utf-8">
<title>Cooper</title>
<script src="/game/Public/Common/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/game/Public/Home/css/style.css">
</head>


<body>
<div class="yaoBox">
	<div class="yaoName"><span></span></div>
	<div id="yaoShow"></div>
</div>


<script>
function myrefresh(){
    var url = '/game/index.php/Home/Index/eidtyaoyiyao';   //初始化链接
	$.post(url,{id : 1},function(data){
		var $data = data;
		//var $number = ($data['numb']/1000).toFixed(2);
		$('.yaoName span').text($data['name']);
		if ($data['numb'] > 100) { 
			$('#yaoShow').text('恭喜你到达人生巅峰！');
		}else{
			$('#yaoShow').text($data['numb'] + '%');
		}
		
	    //console.log($data['numb']);
	},'json');

	setTimeout('myrefresh()',100); //指定1秒刷新一次
}
myrefresh();



</script>
</body>
</html>