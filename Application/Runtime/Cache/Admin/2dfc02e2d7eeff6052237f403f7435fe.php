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
    
<script src="/ecfiber/Public/Common/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/ecfiber/Public/Admin/js/kindeditor/kindeditor/kindeditor-all-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/ecfiber/Public/Admin/js/kindeditor/kindeditor/lang/zh-CN.js"></script>


<script>
    KindEditor.ready(function(K) {
            window.editor = K.create('#editor_id1');
            window.editor = K.create('#editor_id2');
    });
</script>
    <form method="post" enctype="multipart/form-data"></form>
</div>  
<script>
$(function(){
    var tip = ['1.多关键词要用英文逗号“,”隔开，例如“FC fiber pigtail, FC/UPC pigtail, FC fiber optical pigtail”','2.图片的上传尺寸：340*150（像素）','3.产品若为白色的相似色，建议加上投影凸显轮廓'];       //注意事项
    var $selected = '<?php if(is_array($classList)): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if(($v["id"]) == $cid): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>';                   //分类选择盒子
    tableHeader('添加新闻','添加');              //添加头部
    tdOdd(1);                                   //分类选择的分类框架
    $('#classList').append($selected);          //拼接分类选择
    tableTr(2).after($trTd(5));              //拼接表格框架
    tableTr(3).append(input('标题*','text','title')).append(input('编辑时间','text','time'));
    tableTr(4).append(tableSelect('上架','on_sale')).append(textarea('关键词','keyword'));
    tableTr(5).append(textarea('介绍','introduce')).append(input('图片上传','file','thumb'));
    tableTr(5).find('input').addClass('inputNone');             //给文件上传按钮添加样式
    tableTr(6).append(editor("describes",'editor_id1'));
    tableTr(7).append(notice(tip));                             //添加注意事项

    selectTag(3,0);           //左侧导航  
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