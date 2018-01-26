<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 TRANSITIONAL//EN">
<html>
<head>
<title>抽奖结果显示</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="/game/Public/Common/js/jquery.min.js" type="text/javascript"></script>
<link href="/game/Public/Common/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/game/Public/Home/css/htmleaf-demo.css">
<link rel="stylesheet" href="/game/Public/Home/css/samples-styles.css">
<style type="text/css">
    td.alt { background-color: #ffc; background-color: rgba(230, 127, 34, 0.2); }
</style>
</head>
<body>
<div class="htmleaf-container">
    <div class="htmleaf-content">
        <div class="input-group">
            <div class="input-group-addon">过滤条件</div>
            <input class="form-control" type="search" id="input-filter" size="15" placeholder="输入过滤条件"></input>
        </div>
        <br>
        <table class="tableList">
            <tr>
                <th scope="col" title="President Number">#</th>
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">Prize</th>
            </tr>

            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>    
                    <td></td>
                    <td><?php echo ($v["name"]); ?></td>
                    <td><?php echo ($v["company"]); ?></td>
                    <td><?php echo ($v["spoil"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
</div>
<script src="/game/Public/Home/js/jquery.filtertable.min.js"></script>
<script>
    var len = $('.tableList tr').length;
    for(var i=1; i<len; i++){
        $('.tableList tr').eq(i).children('td').eq(0).text(i);
    }

    $('table').filterTable({ // apply filterTable to all tables on this page
        inputSelector: '#input-filter' // use the existing input instead of creating a new one
    });


</script>
<!-- <div class="datashow">
    <table>
        <tr>
            <th scope="col" title="President Number">#</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Prize</th>
        </tr>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>    
                <td></td>
                <td><?php echo ($v["name"]); ?></td>
                <td><?php echo ($v["company"]); ?></td>
                <td><?php echo ($v["spoil"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div> -->
</body>
</html>