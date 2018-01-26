<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ajax test</title>
<script src="/game/Public/Common/js/jquery.min.js" type="text/javascript"></script>
<style>
	 .datashow { width: 900px; height: 400px; overflow-y: scroll; margin: 50px auto; }
	.datashow table { width: 880px; }
	.dataAdd,.dataSearch { width: 600px; margin: 50px auto 0; } 
	.stable { width: 800px; margin: 50px auto; }
</style>
</head>
<body>
<div class="datashow">
	<table>
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="<?php echo ($v["id"]); ?>">    
	            <td><?php echo ($v["id"]); ?></td>
	            <td><?php echo ($v["name"]); ?></td>
	            <td><?php echo ($v["number"]); ?></td>
	            <td><?php echo ($v["state"]); ?></td>
	            <td><?php echo ($v["tab"]); ?></td>
	            <td><?php echo ($v["time"]); ?></td>
	        </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
	</table>
</div>
<div class="dataAdd">
	<!-- <form method="get" enctype="multipart/form-data"> -->
		<input type="text" id="name" name="name" >
		<input type="text" id="number" name="number" >
		<input type="submit" id="btn" value="添加" >
	<!-- </form> -->
</div>	
<div class="dataSearch">
	<input type="text" id="search" name="search">
	<input type="submit" id="sbtn" value="搜索" >
</div>

<script>
	/*var name = $('#name').val();
	var number = $('#number').val();
	$('#btn').click(function(){
		$.ajax({
			url : '/game/index.php/Home/Index/ajaxchuli',
			type : 'post',
			data : {
				'name' : name,
				'number' : number
			},
			dataType : 'text',
			success : function(data){
				if(data == 2){
					alert('提交成功');
				}else if(data == 3){
					alert('提交失败');
				}
				//console.log($data);
				
			}
		});
		var url = '/game/index.php/Home/Index/ajaxchuli';
		$.post(url,{'name' : name,'number' : number},function(data){
			if(data == 2){
					alert('提交成功');
				}else if(data == 3){
					alert('提交失败');
				}
			},'text');

		});*/

	var search = $(" input[name='search']").val();
	$('#sbtn').click(function(){
		console.log(search);
		if(search == ''){
			alert('搜索内容不能为空');
			return;
		}else{
			var url = '/game/index.php/Home/Index/search';
			$.post(url,{'search' : search},function(data){
				var cont = '<table class="stable"><tr><td>'+data.id+'</td><td>'+data.name+'</td><td>'+data.number+'</td><td>'+data.state+'</td><td>'+data.tab+'</td><td>'+data.time+'</td></tr></table>';
				if(data == 3){
					alert('提交失败');
				}else{
					$('.dataSearch').after(cont);
				}
				
			},'text');
		}
	})
		
</script>
</body>
</html>