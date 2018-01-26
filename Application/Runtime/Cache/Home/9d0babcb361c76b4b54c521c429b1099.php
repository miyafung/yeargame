<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Window-target" content="_top" />
<!--网页不会被缓存-->
<meta http-equiv="pragma" content="cache" />
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<title>深圳亿创飞宇光通信技术有限公司 -- 官网</title>
<link rel="stylesheet" href="/ecfiber/Public/Home/css/style.css" />
<link rel="stylesheet" href="/ecfiber/Public/Common/css/reset.css" />
<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
<script type="text/javascript" src="/ecfiber/Public/Common/js/jquery.min.js"></script>
</head>
<body>
<!-- 头部 -->
<div class="ecHeaderWrap">
	<div class="ecHeaderBg">
		<div class="ecHeaderLeft"></div>
		<div class="ecHeaderRight"></div>
	</div>
	<div class="ecHeaderContent">
		<a href="/ecfiber" class="ecLogo">
			<h1>
				<img src="/ecfiber/Public/Common/img/logo.png" width="100">
			</h1>
		</a>
		<ul class="ecNav">
			<li><a href="/ecfiber">Home</a></li>
			<li><a href="<?php echo U('Goods/index');?>">Products</a></li>
			<li><a href="<?php echo U('Solution/index');?>">Solutions</a></li>
			<li><a href="<?php echo U('News/index');?>">News</a></li>
			<li><a href="<?php echo U('About/index');?>">About us</a></li>
			<li><a href="<?php echo U('Contact/index');?>">Contact us</a></li>
			<li><a href="<?php echo U('Downloads/index');?>">Downloads</a></li>
		</ul>

		<div class="ecSearch">
			<div class="ecSearchBtn">
				<img class="ecHeadSear" src="/ecfiber/Public/Common/img/search.png">
			</div>
			<div class="ecLanguage">
				<span class="current"><a href="javascript:;">EN</a></span>
				<span><a href="javascript:;">CN</a></span>
			</div>
		</div>
	</div>
</div>

<div class="ecContent">
	<div class="ecProductModel">
		<ul class="ecContactUl">
			<li>
				<h4><img src="/ecfiber/Public/Home/img/address.png"></h4>
				<h3 class="ecContactUlTitle">OFFICE ADDRESS</h3>
				<p class="ecContactUlText">Deliwei Industrial Park, Longhua, Shenzhen, China 518109</p>
			</li>
			<li>
				<h4><img src="/ecfiber/Public/Home/img/email.png"></h4>
				<h3 class="ecContactUlTitle">E-MAIL ADDRESS</h3>
				<p class="ecContactUlText">Send us an e-mail using yourfavorite e-mail client:</p>
				<p class="ecContactUlText"><span>sale@www.flyinfiber.com</span></p>
			</li>
			<li>
				<h4><img src="/ecfiber/Public/Home/img/chat.png"></h4>
				<h3 class="ecContactUlTitle">PHONE NUMBER</h3>
				<p class="ecContactUlText">We are available from monday to friday from 9AM to 6PM Phone:</p>
				<p class="ecContactUlText"><span>+86-0755-265655645</span></p>
			</li>
		</ul>
	</div>
</div>
<div class="ecContactForm">
	<div class="ecContactFormModel">
		<h3>Contact Form</h3>
		<p class="ecContactFormP">We are alway thrilled to receive anying about your project.We would love help you building your product.</p>
		<form method="post" enctype="multipart/form-data">
			<div class="ecContactFormLeft">
				<div class="ecContactFormLeftInput">
					<input type="text" name="name" onfocus="nameFocus()" onblur="nameBlur()" placeholder="Your name" />
					<p class="ecErrorTip"></p>
				</div>
				<div class="ecContactFormLeftInput">
					<input type="text" name="email" onfocus="emailFocus()" onblur="emailBlur()" placeholder="Your E-mail" />
					<p class="ecErrorTip"></p>
				</div>
				<div class="ecContactFormLeftInput">
					<input type="text" name="company" onfocus="companyFocus()" onblur="companyBlur()" placeholder="What is your company"/>
					<p class="ecErrorTip"></p>
				</div>
			</div>
			<div class="ecContactFormRight">
				<textarea name="content" cols="76" rows="9" placeholder="Explain us your project,we would love to help   :)" ></textarea>
			</div>
			<input type="submit" class="ecFormSend" value="SEND" disabled/>
		</form>
	</div>
</div>
<script type="text/javascript">
	$('.ecNav li').eq(5).find('a').addClass('current');
	var IconR = '<span class="fa fa-check-circle-o ecIconR"></span>',IconE = '<span class="fa fa-times-circle-o ecIconE"></span>',chinaReg = /[\u4e00-\u9fa5]/g;   //匹配中文字符;
	function object(i){
		return $('.ecContactFormLeftInput').eq(i).children('input');
	}
	function length(i){
		return object(i).val().replace(chinaReg,"ab").length;
	}
	function text(i){
		return $('.ecContactFormLeftInput').eq(i).children('.ecErrorTip');
	}
	function nameFocus(){
		text(0).html('Text length is 4-18 characters');
	}
	function emailFocus(){
		text(1).html('Please enter your usual email address');
	}
	function companyFocus(){
		text(2).html('Please enter your current company name');
	}
	//提交按钮状态
	function buttonJ(){
		$num = $('.ecContactFormLeft').find('span.ecIconR').length;
		if($num == 3){

			$('.ecFormSend').removeAttr('disabled');
			$('.ecFormSend').css('cursor','pointer');
			$('.ecFormSend').click(function(){
				alert('提交成功');
			})
		}
	}

	function inputOper(obj,content,ob){
		obj.html(content);
		obj.next('span').remove();
		obj.after(ob);
	}
	function nameBlur(){
		var obj = text(0),len = length(0);
		//判断是否为空
		if(object(0).val() == ""){
			inputOper(obj,'Name cannot be empty',IconE);
			return false;
		}
		//判断文字长度
		if(len<4 || len>18){
			inputOper(obj,'You entered ' + len + ' characters, but the text length is 4-18 characters',IconE);
			return false;
		}
		inputOper(obj,'',IconR);
		buttonJ();
		return true;
	}
	function emailBlur(){
		var obj = text(1),reg = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
		//判断是否为空
		if(object(1).val() == ""){
			inputOper(obj,'Mailbox cannot be empty',IconE);
			return false;
		}
		//验证邮箱格式
		if(reg.test(object(1).val()) == false){
			inputOper(obj,'Incorrect email format',IconE);
			return false;
		}
		inputOper(obj,'',IconR);
		buttonJ();
		return true;
	}
	function companyBlur(){
		var obj = text(2),len = length(2);
		//判断是否为空
		if(object(2).val() == ""){
			inputOper(obj,'Company cannot be empty',IconE);
			return false;
		}
		//判断文字长度
		if(len<4 || len>40){
			inputOper(obj,'You entered ' + len + ' characters, but the text length is 4-40 characters',IconE);
			return false;
		}
		inputOper(obj,'',IconR);
		buttonJ();
		return true;
	}
	
	
</script>


<div class="ecFooterWrap">
	<div class="ecFooterModel">
		<img class="ecFooterModelTopBg" src="/ecfiber/Public/Home/img/footerTop.png">
		<ul class="ecFooterModelList">
			<li><span class="fa fa-truck"></span><span>Multiple convenient delivery</span></li>
			<li><span class="fa fa-globe"></span><span>Certificate of quality system</span></li>
			<li><span class="fa fa-credit-card"></span><span>Multiple payment methods</span></li>
			<li><span class="fa fa-handshake-o"></span><span>Multiple warranty service</span></li>
		</ul>
		<div class="ecFooterModelCon">
			<ul class="ecFooterModelConLeft">
				<li>
					<h3>Company</h3>
					<p><a href="javascript:;">About us</a></p>
					<p><a href="javascript:;">Contact</a></p>
					<p><a href="javascript:;">News Room</a></p>
				</li>
				<li>
					<h3>Customer Service</h3>
					<p><a href="javascript:;">Return Policy</a></p>
					<p><a href="javascript:;">Quality Control</a></p>
					<p><a href="javascript:;">Business Account</a></p>
				</li>
				<li>
					<h3>Resources</h3>
					<p><a href="javascript:;">Solutions</a></p>
					<p><a href="javascript:;">Products</a></p>
					<p><a href="javascript:;">Downloads</a></p>
				</li>
				<li>
					<h3>Links</h3>
					<p><a href="javascript:;">Flyin Optronics Co.,Ltd.</a></p>
					<p><a href="javascript:;">Flyin Optronics Co.,Ltd.</a></p>
					<p><a href="javascript:;">Flyin Optronics Co.,Ltd.</a></p>
				</li>
			</ul>
			<div class="ecFooterModelConRight">
				<h3>How to find us? &nbsp;&nbsp;<span class="fa fa-hand-o-down"></span></h3>
				<p><span class="fa fa-phone"></span>+86-0755-265655645</p>
				<p><span class="fa fa-envelope-o"></span>sale@www.flyinfiber.com</p>
			</div>
		</div>
	</div>
	<div class="ecFooterModelBottom" >Copyright © 2012-2016 Flyin Optronics Co.,Ltd. All Rights Reserved.</div>
</div>
<script type="text/javascript">


//搜索框点击事件
$('.ecHeadSear').on("click",function(){
	var $search = '<form method="post" enctype="multipart/form-data"><input class="ecClickSearch" type="text" name="search" onblur="searchBlur()" placeholder="Please enter search keywords"><input class="ecClickSearch" type="image" src="/ecfiber/Public/Common/img/search.png"></form>';
	$(this).after($search);
	$(this).hide();
});


function searchBlur(){
	var $searchImg = '<img class="ecHeadSear" src="/ecfiber/Public/Common/img/search.png">';
	$('.ecHeadSear').show();
	$('.ecSearchBtn form').hide();
}
</script>
</body>
</html>