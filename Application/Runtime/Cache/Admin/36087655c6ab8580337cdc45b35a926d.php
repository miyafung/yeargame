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
            <li><a href="<?php echo U('Banner/index');?>">Banner</a></li>
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
        <div class="contentBox"></div>
<script>
$(function(){
    var list = '<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>'+
                    '<tr>'+
                        '<td>'+
                            '<input name="visitor[]" type="checkbox" value="" />'+
                            '<span class="hiddenThing"><?php echo ($v["id"]); ?></span>'+
                        '</td>'+
                        '<td class="thumbPhoto">'+
                            '<?php if(empty($v["thumb"])): ?><img src="/ecfiber/Public/Common/img/none.png" width="40"/>'+
                                '<?php else: ?>'+
                                '<a href="/ecfiber/Public/Uploads/news/<?php echo ($v["thumb"]); ?>" class="tooltipPhoto" title="<?php echo ($v["title"]); ?>"><img src="/ecfiber/Public/Uploads/news/<?php echo ($v["thumb"]); ?>" width="30" /></a>'+
                            '<?php endif; ?>'+
                        '</td>'+
                        '<td>'+
                            '<a href="'+"<?php echo U('Home/News/newsDetails',array('cid'=>$v['clas_id'],'id'=>$v['id']));?>"+'" target="_blank">'+"<?php echo ($v["title"]); ?>"+'</a>'+
                            '<p class="opration"><a href="'+"<?php echo U('News/edit',array('id'=>$v['id'],'cid'=>$v['clas_id'],'p'=>$p));?>"+'">编辑</a>　<a href="#" class="act-del" data-id="<?php echo ($v["id"]); ?>">删除</a></p>'+
                        '</td>'+
                        '<td><a href="#" class="act-onsale" data-id="<?php echo ($v["id"]); ?>" data-status="<?php echo ($v["on_sale"]); ?>"><?php if(($v["on_sale"]) == "yes"): ?>已上架<?php else: ?>未上架<?php endif; ?></a></td>'+
                        '<td><?php echo ($v["time"]); ?></td>'+
                    '</tr>'+
                '<?php endforeach; endif; else: echo "" ;endif; ?>';
    var box = $('.contentBox');
    var tableThArr = ['选择','缩略图','名称','状态','编辑时间'];        //表头
    box.append(tableIndexHeader(tableThArr.length,'新闻列表',"<?php echo $dataCount ?>",'<?php echo $pagelist ?>')).find("tr:first").after(list).after(tableList(tableThArr));
    //追加分类选择
    selectedProduct(box,"<?php echo U('News/add',array('cid'=>$cid));?>",'添加新闻');
    var selected = '<?php if(is_array($classList)): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if(($v["id"]) == $cid): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>';
    $('select option').after(selected);
    search('请输入名称关键词',$('.content_title'));                          //在页面中追加搜索框
    lineHover();                                                            //鼠标移入显示操作按钮
    formQuick(2,box);                                                       //追加快捷操作表单
    downList("<?php echo U('News/index',array('cid'=>'_ID_'));?>");                    //下拉菜单跳转
    deepenLine();                                                           //遍历数据修改后返回主页加深行背景
    tooltipPhoto();                                                         //鼠标移入缩略图，显示大图
    quickAction("<?php echo U('News/change',array('cid'=>$cid,'p'=>$p));?>");          //快捷操作
    delData("<?php echo U('News/del',array('p'=>$p,'cid'=>$cid));?>");                 //数据删除
    tableTrTdLeft($('.tableListWrap tr').length-1,2);                       //左对齐
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