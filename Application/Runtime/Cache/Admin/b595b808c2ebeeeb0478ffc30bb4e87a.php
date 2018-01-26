<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Flyin - Background management system</title>
<link rel="stylesheet" type="text/css" href="/ecfiber/Public/Admin/css/reset.css" /><link rel="stylesheet" type="text/css" href="/ecfiber/Public/Admin/css/style.css" /><link rel="stylesheet" type="text/css" href="/ecfiber/Public/Admin/css/prettyPhoto.css" /><link rel="stylesheet" type="text/css" href="/ecfiber/Public/Admin/css/clearbox.css" />
<script src="/ecfiber/Public/Common/js/jquery.min.js"></script>
<link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">      <!-- 引用图标文件 -->


</head>
<body>
<div class="header">
    <div class="headerLogo">
        <a href="<?php echo U('Cadmin/Index/index');?>" title="点击中英文网站后台切换">
            <img src="/ecfiber/Public/Admin/img/logo.png" width="100">
        </a>
        <sup>EN</sup>
    </div>
    <ul class="headerLeftOperation">
        <li><a href="/ecfiber/" target="_blank" class="a_color"><span class="fa fa-paw fa-lg icon_margin_right icon_color"></span>前台首页</a></li>
        <li><a href="<?php echo U('Login/logout');?>" class="a_color"><span class="fa fa-power-off fa-lg icon_margin_right icon_color"></span>注销登录</a></li>
    </ul>
</div>
    
<ul class="menuLeft">
    <li class="menuLeftLi" title="点击切换导航栏样式"><span class="fa fa-exchange fa-lg"></span></li>
    <li class="menuLeftLi"><span class="fa fa-tachometer fa-lg"></span>
        <ul>
            <li><a href="<?php echo U('Index/index');?>">数据面板</a></li>
        </ul>
    </li>
    <li class="menuLeftLi"><span class="fa fa-cubes fa-lg"></span>
        <ul>
            <li><a href="<?php echo U('Goods/index');?>">产品列表</a></li>
            <li><a href="<?php echo U('Category/index');?>">分类列表</a></li>
        </ul>
    </li>
    <li class="menuLeftLi"><span class="fa fa-street-view fa-lg"></span>
        <ul>
            <li><a href="<?php echo U('News/index');?>">新闻管理</a></li>
            <li><a href="<?php echo U('Newindex/index');?>">新闻主页</a></li>
            <li><a href="<?php echo U('Zhanhui/index');?>">展会新闻</a></li>
        </ul>
    </li>
    <li class="menuLeftLi"><span class="fa fa-heart fa-lg"></span>
        <ul>
            <li><a href="<?php echo U('Service/index');?>">服务列表</a></li>
            <li><a href="<?php echo U('Lists/index');?>">服务分类</a></li>
        </ul>
    </li>
    <li class="menuLeftLi"><span class="fa fa-wrench fa-lg"></span>
        <ul>
            <li><a href="<?php echo U('Title/index');?>">Banner</a></li>
        </ul>
    </li>
    <li class="menuLeftLi"><span class="fa fa-envelope fa-lg"></span>
        <ul>
            <li><a href="<?php echo U('Mail/index');?>">客户询盘</a></li>
        </ul>
    </li>
    <li class="menuLeftLi"><span class="fa fa-gear fa-lg"></span>
        <ul>
            <li><a href="<?php echo U('Admin/index');?>">管理员信息</a></li>
            <li><a href="<?php echo U('System/index');?>">系统配置</a></li>
        </ul>
    </li>
</ul>
<main>
    <div class="content">
        <div class="borderedModel">
    <div class="borderedModel_4">
        <div class="borderedModelIcon"><img src="/ecfiber/Public/Admin/img/adminIcon.png"></div>
        <div class="borderedModelRight">
            <p class="borderedModelTitle">管理员：<?php echo ($admin_name); ?></p>
            <p class="borderedModelCon">上次登录时间：<?php echo ($dataLogin["lasttime"]); ?></p>
        </div>
    </div>

    <!-- <div class="bordered_count_right ">
            <table class="bordered_table_long bordered_table_sort tablePaddingLeft">
                <tr>
                    <th colspan="2">登录信息</th>
                </tr>
                <tr>
                    <td>管理员：</td>
                    <td><?php echo ($admin_name); ?></td>
                </tr>
                <tr>
                    <td>上次登录时间：</td>
                    <td><?php echo ($dataLogin["lasttime"]); ?></td>
                </tr>
                <tr>
                    <td>本次登录时间：</td>
                    <td><?php echo ($dataLogin["nowtime"]); ?></td>
                </tr>
                <tr>
                    <td>上次登录IP：</td>
                    <td><?php echo ($dataLogin["lastip"]); ?></td>
                </tr>
                <tr>
                    <td>本次登录IP：</td>
                    <td><?php echo ($dataLogin["nowip"]); ?></td>
                </tr>
                <tr>
                    <td>现在时间：</td>
                    <td id="current_time"></td>
                </tr>
            </table>
        </div> -->
</div>

<!-- <form method="post" id="form">
    <input type="hidden" name="id" id="target_id">
</form> -->

<script> 
$(function(){
    //产品数据的显示隐藏
    function Cmd(obj){
        $(obj).next("div").find("div").each(function(){
            $(this).hide();
        });
        $("#div" + obj.value).show();
    }
    
    selectTag(1,0);           //左侧导航  
});
    
</script>
    </div>
</div>
<script src="/ecfiber/Public/Common/js/jquery.cookie.js" type="text/javascript" charset="utf-8"></script>
<script src="/ecfiber/Public/Admin/js/common.js"></script>
<script>
    //以下为左侧导航菜单效果
    var $pointer = $('.menuLeft li.menuLeftLi');                //定义鼠标移入对象
    var $iconImg = "<img id='menuLeftIcon' src='/ecfiber/Public/Admin/img/menuLeftIcon.png'/>";      //创建盒子
    $pointer.hover(function(){  
        var $menuNum = $(this).index()-1;                       //减一避开第一个对象
        if($menuNum>=0){
            $(this).prepend($iconImg);                          //追加小图标
            $(this).children('ul').stop().show();               //显示二级分类信息
        }
    },function(){
        $(this).find('#menuLeftIcon').remove();                 //移除小图标
        $(this).children('ul').stop().hide();                   //隐藏二级分类信息
    });
</script>
</body>
</html>