<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>后台登录 - 亿创飞宇光通信技术有限公司</title>
<link rel="stylesheet" href="/ecfiber/Public/Admin/css/login.css" />
<script src="/ecfiber/Public/Common/js/jquery.min.js"></script>
</head>
<body>
<div class="ecLogin">
    <form method="post" class="ecLoginForm">
        <a href="{__root__}" class="ecLogoTitle">
            <h1><img src="/ecfiber/Public/Common/img/logo.png" width="200"></h1>
        </a>
        <i class="ecLabel">EN</i>
        <input type="text" name="username" placeholder="用户名" required />
        <input type="password" name="password" placeholder="密码" required />
        <input class="loginVerify" type="text" name="verify" required placeholder="验证码"/><img src="<?php echo U('Admin/Login/getVerify');?>" id="verify_img" title="点击刷新验证码"/>
        <input type="submit" id="btn" value="登录">
    </form>
</div>

<script>
    //验证码点击刷新
    $(function(){
        var img = $("#verify_img");
        var src = img.attr("src")+"?";
        img.click(function(){
                img.attr("src",src+Math.random());
        });
    });
    var $n = 0;
    $('#btn').click(function(){
        for(var i=0; i<3; i++){
            if($('input').eq(i).val() == ''){
                $n++;
            };
        }
        if($n == 0){
            $('#btn').attr('value','登录中...');
        }
    });
</script>
</body>
</html>