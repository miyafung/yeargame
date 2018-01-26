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
        <div class="contentBox">
    <table class="tableListWrap">
        <tr>
            <th colspan="5">选择类别</th>
        </tr>
        <tr>
            <td>名称</td>
            <td>分类ID</td>
            <td colspan="2">添加大类</td>
        </tr>
        <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="<?php echo ($v["className"]); ?>">
                <td><?php echo str_repeat('— ',$v['level']); echo ($v["name"]); ?></td>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php if(empty($v["addClass"])): else: ?><a href='<?php echo U("Category/add",array("id"=>$v["id"]));?>'><?php echo ($v["addClass"]); ?></a><?php endif; ?></td>
                <td><?php echo ($v["classCate"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<script>
$(function(){
    var box = $('.contentBox');
    $('.tableListWrap tr').hover(function(){
        $(this).addClass('listStyleBgColor');
    },function(){
        $(this).removeClass('listStyleBgColor');
    });
    var parent = $('.class_parent');
    //var child = $('.class_child');
    parent.find('td:eq(1)').css({'font-size':'16px','color':'red'});
    formQuick(1,box);                                     //追加快捷操作表单
    delData("<?php echo U('Category/del');?>");            //数据删除
    tableTrTdLeft($('.tableListWrap tr').length-1,0);                   //左对齐
    selectTag(2,1);           //左侧导航  
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