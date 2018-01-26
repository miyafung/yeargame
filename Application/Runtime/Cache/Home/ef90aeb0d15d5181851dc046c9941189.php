<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>飞宇年会抽奖结果</title>
<script src="/nianhui/Public/Common/js/jquery.min.js" type="text/javascript"></script>
<link href="/nianhui/Public/Common/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    h3 { text-align: center; }
    .tableList { margin-top: 60px;}
    table tr td,table tr th { text-align: center; }
</style>
</head>
<body>
<div class="container">
    <h3>飞宇年会抽奖结果</h3>
    <!-- <div class="search" style="overflow: hidden;">
        <div class="input-group" style="width: 400px; float: right;">
            <form method="post" enctype="multipart/form-data">
                <input style="width: 340px" type="text" name="searchIP" class="form-control" placeholder="请输入搜索内容">
                <button style="width: 60px; height: 34px; background-color: #ccc; border: none;" class="glyphicon glyphicon-search"></button>
            </form>
        </div>
    </div> -->
    <div class="table-responsive tableList">
        <table class="table">
            <thead style="background-color: #ddd">
                <tr>
                    <th>#</th>
                    <th>姓名</th>
                    <th>分类</th>
                    <th>奖品</th>
                    <th>是否领奖</th>
                </tr>
            </thead>
            <tbody id="dataL">
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                        <td></td>
                        <td><?php echo ($v["name"]); ?></td>
                        <td><?php echo ($v["company"]); ?></td>
                        <td><?php echo ($v["spoil"]); ?></td>
                        <td><a href="javascript:;" class="act-onsale" data-id="<?php echo ($v["id"]); ?>" data-status="<?php echo ($v["on_get"]); ?>"><?php if(($v["on_get"]) == "0"): ?>未领奖<?php else: ?>已领奖<?php endif; ?></a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
</div>
<form method="post" id="form">
    <input type="hidden" name="id" id="target_id">
    <input type="hidden" name="field" id="target_field">
    <input type="hidden" name="status" id="target_status">
</form>
<script type="text/javascript">

    for(var i=0; i<$('#dataL tr').length; i++){
        $('#dataL tr').eq(i).children('td').eq(0).text(i+1);
        if($('#dataL tr').eq(i).children('td').eq(4).text() == '未领奖'){
            $('#dataL tr').eq(i).children('td').eq(4).children('a').css('color','green')
        }else{
            $('#dataL tr').eq(i).children('td').eq(4).children('a').css('color','#aaa')
        }
    }

    //快捷操作
    function change_status(obj,field){
        $("#target_id").val(obj.attr("data-id"));
        $("#target_field").attr("value",field);
        $("#target_status").attr("value",(obj.attr("data-status")=="0") ? "1" : "0");
        $("#form").attr("action","<?php echo U('Index/change');?>").submit();
    }
    
    //快捷操作-上架
    $(".act-onsale").click(function(){
        change_status($(this),'on_get');
    });

    


</script>
</body>
</html>