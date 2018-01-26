<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>飞宇抽奖</title>
<link href="/game/Public/Common/css/sweet-alert.css" rel="stylesheet">
<link href="/game/Public/Common/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="/game/Public/Common/js/jquery.min.js" type="text/javascript"></script>
<script src="/game/Public/Common/bootstrap/js/bootstrap.min.js"></script>
<script src='/game/Public/Common/js/prefixfree.min.js'></script>
<script src='/game/Public/Common/js/sweet-alert.min.js'></script>
<style class="cp-pen-styles">
	body,h1,h2,h3,h4,h5,h6,hr,p,blockquote,dl,dt,dd,ul,li,ol,pre,form,fieldset,legend,button,input,textarea,th,td{margin: 0;padding: 0;}
	ul,ol{ list-style: none;}
    html,body { height: 100%; max-width: 100%; margin: 0; overflow: hidden; font-family: sans-serif; }
    #space { width: 100%; }
    #warp { position: absolute; z-index: 9; bottom: 0; left: 0; right: 0; margin: 20px auto; color: rgba(209, 255, 255, 1); border: 2px solid; padding: 1em; width: 10em; text-align: center; font-weight: 700; font-size: 1.2em; display: inline-block; text-decoration: none; background: rgba(0, 0, 0, 0.8); }
	.container { width: 1300px; position: absolute; top: 50%; left: 50%; margin-left: -650px; margin-top: -350px; }
	.prizeBox,.orderBox { position: relative; /*border: 2px solid #0b819b;*/ float: left; background-color: rgba(51,51,51,0.3); }
	.prizeTitle { width: 480px; position: absolute; top: -52px; left: 50%; margin-left: -240px; }
	.prizeBox { width: 480px; height: 700px; margin-right: 62px; }
	.orderBox { width: 728px; height: 700px; }
    .prizeListOrder { margin-top: 84px; }
	.joinNumb { text-align: center; color: #eee; font-size: 12px; margin-top: 30px; }
	.prizeName { width: 220px; height: 220px; border-radius: 90px; /*border: 2px solid yellow;*/ margin: 90px auto 66px; line-height: 220px; text-align: center; font-size: 40px; color: #eee; position: relative;}
    .prizeInfo { position: relative; }
    .prizeBgTurn { position: absolute; top: -66px; left: 56px; z-index: 0; width: 360px; }
    .removeC { animation: a 50s; }
    .nextPrize { margin: 0 auto; width: 110px; font-size: 22px; }
	.joinPhone { text-align: center; color: #eee; padding-top: 20px; overflow: hidden; }
    .nextPrize li { float: left; cursor: pointer; color: #fff; margin: 0 10px; }
    .nextPrize li.nextPrizeCurrent { color: #ff9c00; }
    /*.nextPrize li.nextPrizeNone { color: #999; }*/
	.prizeThing { width: 390px; background-color: #bbb; border: 1px solid #eee; padding: 10px; margin: 24px auto 0; border-radius: 30px; }
	.prizeLeft,.prizeRight { display: inline-block; width: 36px; height: 36px; font-size: 36px; cursor: pointer; }
	.prizeThingName { width: 280px; display: inline-block; text-align: center; height: 36px; line-height: 36px; font-size: 36px; }
	.prizeJoinNumber { color: #eee; text-align: center; margin: 10px 0; }
	.prizeBtn { width: 330px; margin: 20px auto 0;  }
	.prizeBtn button { width: 260px; background-color: #ff9c00; color: #eee; text-align: center; height: 50px; line-height: 50px; border: 1px solid #ff9c00; margin: 64px auto 0; display: block; }
	.orderBox { color: #eee; }
    .prizeListOrder .current { display: block; }
	.prizeGetBox { width: 690px; margin: 60px auto 0; /*padding: 20px;*/ display: none;}
    #cusList0,#cusList1{ padding: 0 160px; }
	.prizeGetBox li { float: left; margin: 60px 10px; width: 148px; text-align: center; }
    .prizeGetBox li img { width: 124px; margin-bottom: 30px; }
    .prizeGetBox li p { font-size: 24px; }

    #cusList0 li img,#cusList1 li img { width: 250px; }
    #cusList0 li,#cusList1 li { width: 350px; }
    #cusList0 li p,#cusList1 li p{ font-size: 36px; }

    #cusList2,#cusList3,#cusList4,#cusList5,#cusList6 { padding: 0 76px; }
    #cusList2 li img,#cusList3 li img,#cusList4 li img,#cusList5 li img,#cusList6 li img { width: 190px; }
    #cusList2 li,#cusList3 li,#cusList4 li,#cusList5 li,#cusList6 li { width: 240px;}
    #cusList2 li p,#cusList3 li p,#cusList4 li p,#cusList5 li p,#cusList6 li p { font-size: 28px}

    #cusList8 li,#cusList9 li { width: 204px; }
    #cusList8 li img,#cusList9 li img,#cusList10 li img,#cusList11 li img,#cusList12 li img,#cusList13 li img { width: 160px; }

    #cusList10 li,#cusList11 li,#cusList12 li,#cusList13 li,#cusList14 li,#cusList15 li { width: 118px; }
    #cusList10 li img,#cusList11 li img,#cusList12 li img,#cusList13 li img,#cusList14 li img,#cusList15 li img { width: 110px; }

    #cusList14 li,#cusList15 li {  margin: 20px 10px 60px; }

	h4 { text-align: center; margin: 20px 0; font-size: 22px; }
	.prizeGetName { margin-right: 20px; }

    @keyframes a{ form{transform: rotate(0deg)} to{transform: rotate(36000deg)} }
    #reset { display: none; }
</style>
</head>
<body>
<!-- <canvas id="space"></canvas> -->
<canvas id="canvas"></canvas>

	<div class="container">
		<div class="prizeBox">
			<img class="prizeTitle" src="/game/Public/Home/img/prizeTop.png">
			<!-- <p class="joinNumb">参加抽奖人数: 243 </p> -->
			<div class="prizeInfo">
                <img class="prizeBgTurn" src="/game/Public/Home/img/bg.png">
				<div class="prizeName">
                    <img src="/game/Public/Home/img/10.png" width="220">
                </div>
				<div class="joinPhone">
                    <ul class="nextPrize">
                        <li>现金大奖</li>
                    </ul>
                </div>
			</div>
			<div class="opration">
				<div class="prizeThing">
					<span class="glyphicon glyphicon-circle-arrow-left prizeLeft"></span>
					<span class="prizeThingName awardName">特等奖</span>
					<span class="glyphicon glyphicon-circle-arrow-right prizeRight"></span>
				</div>
				<p class="prizeJoinNumber">一次抽取 <span id="prizeJoinNumberN">1</span> 人</p>
				<div class="prizeBtn">
					<button id="start" type="button" onclick="start()">开始</button>
				</div>
                <button id="reset">重置数据</button>
			</div>
		</div>
		<div class="orderBox">
			<img class="prizeTitle" src="/game/Public/Home/img/orderTop.png">
            <div class="prizeListOrder">
                <h4><span class="awardName"></span><!-- (<span class="prizeX">现金大奖</span>) --> —— <!--获奖人数： <span class="prizeGetNum"></span> --><span class="prizeX">现金大奖</span></h4>
                <ul class="prizeGetBox current" id="cusList0"></ul>
            </div>
			
		</div>
	</div>
	<script src='/game/Public/Common/js/stopExecutionOnTimeout.js'></script>
	
<script>
    /**
     * 以下部分为函数
     */
    $('.prizeTitle').click(function(){
        $('#reset').toggle();
    });
    
    //根据数据库的数据进行拼接追加到获奖菜单面板上
    function overData(a,b){
        $('#cusList'+a).append('<li><p>'+ b['name'] + '</p></li>');
    }

    //遍历打印中奖人员名单
    for(var i=15; i>0; i--){
        $('.prizeListOrder .current').after('<ul class="prizeGetBox" id="cusList'+i+'"></ul>');
    }

    //在获奖名单上同步切换奖品
    function togePrize(){
        $('.prizeX').text($('.nextPrizeCurrent').text());
    }

    //遍历显示参与抽奖人数
    function prizeArrList(){
        for(var z=0; z<prizeArr.length; z++){
            if(prizeArr[z]['name'] == $('.nextPrizeCurrent').text()){
                $('#prizeJoinNumberN').text(prizeArr[z]['num']);
                $('.prizeName').text('');
                $('.prizeName').append('<img src='+prizeArr[z]['url']+' width="220">');
                $('.prizeGetBox').eq(z).addClass('current').stop().siblings().removeClass('current');
                break;
            }
        }
    }

    //对奖品进行点击操作
    function prizeClick(){
        $('.nextPrize li').click(function(){
            $(this).addClass('nextPrizeCurrent').stop().siblings().removeClass('nextPrizeCurrent');
            $('.prizeX').text($(this).text());
            prizeArrList();
        });
    }

    function nextPrizeWidth(a){
        $('ul.nextPrize').css('width',a+'px');
    }


    function defaultP(){
        $('.nextPrize li').eq(0).addClass('nextPrizeCurrent');
    }

    //根据奖项拼接奖品
    function prizeThingList(){
        var awardNameB = $('.prizeThingName').text();
        $('.nextPrize>li').remove();
        switch(awardNameB){
            case '特等奖':
                nextPrizeWidth(110);
                $('.nextPrize').append('<li>现金大奖</li>');
                break;
            case '一等奖':
                nextPrizeWidth(134);
                $('.nextPrize').append('<li>苹果笔记本</li>');
                break;
            case '二等奖':
                nextPrizeWidth(248);
                $('.nextPrize').append('<li>iphone 8</li><li>小米笔记本</li>');
                break;
            case '三等奖':
                nextPrizeWidth(388);
                $('.nextPrize').append('<li>小米电视55寸</li><li>ipad Mini</li><li>华为手机</li>');
                break;
            case '四等奖':
                nextPrizeWidth(420);
                $('.nextPrize').append('<li>小米电视32寸</li><li>海尔冰箱</li><li>小天鹅洗衣机</li>');
                break;
            case '五等奖':
                nextPrizeWidth(350);
                $('.nextPrize').append('<li>行李箱</li><li>电饭煲</li><li>床上用品四件套</li>');
                break;
            case '六等奖':
                nextPrizeWidth(394);
                $('.nextPrize').append('<li>九阳电炖锅</li><li>品牌背包</li><li>艾美特电风扇</li>');
                break;
            }
            defaultP();
    }

    //未抽奖状态
    function prizeIn(){
        defaultCo();
        prizeThingList();
    }

    //奖品图片路径
    function pathUrl(a){
        return '/game/Public/Home/img/'+a+'.png';
    }

    //点击左右方向按钮，进行筛选操作奖项
    function prizeJoin(t){
        $('.awardName').text(prizeNum[t]['name']);
    }

    //左右方向按钮点击切换封装函数
    function clickLeftRight(t){
        prizeJoin(t);       //点击左右方向按钮，进行筛选操作奖项
        prizeThingList();   //显示奖品信息
        togePrize();
        prizeArrList();     //展示中奖人员信息
        //prizeGetNum();      //获取中奖人数
        prizeClick();       //恢复产品点击选择事件
    }

    //中奖名单显示
    function addHtml(a,b,c){
        var randNumber = GetRnd(0,8);
        if(c == 0){
            $('#cusList'+a).append('<li><img src="/game/Public/Home/img/person1'+randNumber+'.png"><p>'+ b['name'] + '</p></li>');
        }else{
            $('#cusList'+a).append('<li><img src="/game/Public/Home/img/person2'+randNumber+'.png"><p>'+ b['name'] + '</p></li>');
        }
        
    }

    //ajax操作
    function postAjax(name,num,awardName){
        var url = '/game/index.php/Home/Prize/eidtThing';   //初始化链接
        $.post(url,{'name': name,'state' : num,'spoil' : awardName },function(data){
            if(data == 1){
                console.log('数据更新成功');
            }else if(data == 2){
                console.log('数据更新失败');
            }
        });
    }

    //遍历抽奖显示名单
    function getRandNum(prizeNumb) {
        $('.prizeName img').remove();
        var awardName = $('.awardName').eq(0).text();
        var bianlishu = GetRnd(0, mobile.length - 1);
        $('.prizeName').text(mobile[bianlishu]['name']);
    }

    //获取随机数
    function GetRnd(min, max) {
        var randnum = parseInt(Math.random() * (max - min + 1)+min);
        return randnum;
    }

    //对随机获取到的值进行判断取整
    Array.prototype.removeEleAt = function (dx) {
        if (isNaN(dx) || dx > this.length) {
            return false;
        }
        this.splice(dx, 1);
    }





    /**
     * 以下部分为基本操作
     */
    
    //初始化奖品等级数组
    var prizeNum = [
        {name: "特等奖", num: 1},
        {name: "一等奖", num: 1},
        {name: "二等奖", num: 2},
        {name: "三等奖", num: 3},
        {name: "四等奖", num: 3},
        {name: "五等奖", num: 3},
        {name: "六等奖", num: 3},
    ];

    //name奖品，num奖品数，url奖品图片路径，state奖品标识符
    var prizeArr = [
        {name:'现金大奖',num:1,url:pathUrl(10),state:10},
        {name:'苹果笔记本',num:1,url:pathUrl(11),state:11},
        {name:'iphone 8',num:2,url:pathUrl(21),state:21},
        {name:'小米笔记本',num:2,url:pathUrl(22),state:22},
        {name:'小米电视55寸',num:2,url:pathUrl(31),state:31},
        {name:'ipad Mini',num:2,url:pathUrl(32),state:32},
        {name:'华为手机',num:2,url:pathUrl(33),state:33},
        {name:'小米电视32寸',num:4,url:pathUrl(41),state:41},
        {name:'海尔冰箱',num:3,url:pathUrl(42),state:42},
        {name:'小天鹅洗衣机',num:3,url:pathUrl(43),state:43},
        {name:'行李箱',num:5,url:pathUrl(51),state:51},
        {name:'电饭煲',num:5,url:pathUrl(52),state:52},
        {name:'床上用品四件套',num:5,url:pathUrl(53),state:53},
        {name:'九阳电炖锅',num:5,url:pathUrl(61),state:61},
        {name:'品牌背包',num:10,url:pathUrl(62),state:62},
        {name:'艾美特电风扇',num:10,url:pathUrl(63),state:63},
    ];
    
    //调取奖品的点击事件
    prizeClick();

    //prizeGetNum();

    //同步在中奖名单显示奖品名称
    defaultP();     

    //点击左右方向按钮，进行筛选操作奖项
    prizeJoin(0); 

    

    //获取数据库数据
    var t = 0;
    var cusListN = 0;
    var cusListB = '';
    var removeImg = '';
    var arr=<?php echo json_encode($data);?>;  
    var mobile=eval(arr);
    var target = eval(<?php echo json_encode($target);?>);
    //var prizeNum = eval(<?php echo json_encode($prize);?>);
    var white = eval(<?php echo json_encode($white);?>);
    var white2 = eval(<?php echo json_encode($white2);?>);
    var count = target.length;
    if(count == 0){
        $('.prizeName').text('');
        $('.prizeName').append('<img src="/game/Public/Home/img/10.png" width="220">');
    }else{
        for(var i=0; i < count; i++){
            for(var p =0; p<prizeArr.length; p++){
                if(target[i]['spoil'] == prizeArr[p]['name']){
                    overData(p,target[i]);      //遍历追加中奖名单
                    cusListN = $('#cusList'+p).children('li').length - 1;
                    var randNumber = GetRnd(0,8);
                    if(target[i]['sex'] == 0){
                        cusListB = '<img src="/game/Public/Home/img/person1'+randNumber+'.png">';
                    }else{
                        cusListB = '<img src="/game/Public/Home/img/person2'+randNumber+'.png">';
                    }
                    $('#cusList'+p).children('li').eq(cusListN).prepend(cusListB);
                    //prizeOut();                 //更换奖品图片为不中奖状态
                } 
                
            }
            
        }
    }

    //重置数据操作
    $('#reset').click(function(){
        var url = '/game/index.php/Home/Prize/panpel'; 
        $.post(url,function(data){
            
        },'json');
    });
    
    //键盘事件
    /*$(document).keydown(function(e){
        if(e.keyCode == 37){
            t--;
            if (t < 0) {
                t = 6;
            }
            clickLeftRight(t);
        }else if(e.keyCode == 39){
            t++;
            if(t > 6){
                t = 0;
            }
            clickLeftRight(t);
        }
    })*/
    //左右方向键点击事件
    $('.prizeLeft').click(function(){
        t--;
    	if (t < 0) {
    		t = 6;
    	}
        clickLeftRight(t);
    });
    $('.prizeRight').click(function(){
        t++;
        if(t > 6){
            t = 0;
        }
        clickLeftRight(t);
    });


    //判断获奖人数
    //$('.prizeGetNum').text($('.prizeGetBox li').length);

	var timer;			//定时器时间
    var prizeOrders = new Array;			//初始化获奖名单数组

    //点击开始操作按钮
    function start() {

        if(!$(".nextPrize li").hasClass('nextPrizeCurrent') || $('.prizeListOrder .current>li').length > 0){
            //alert('已抽奖，不能重复再抽！')
            swal("已抽奖，不能重复再抽", "", "error");
        }else{
            timer = setInterval("getRandNum(1)", 10);
            $('.prizeBtn button').attr({'id':'stop','onclick':'stop()'}).text('暂停');
            $('.prizeBgTurn').addClass('removeC');
        }
            
    }

    function bianli(){
        return randnumN = GetRnd(0, mobile.length - 1);
    }


    //点击暂停按钮
    function stop() {
        //清除定时器
        $('.prizeBgTurn').removeClass('removeC');
        clearInterval(timer);
        //var teshu = [];
        //teshu['name'] = $('.prizeName').text();
        //teshu['sex'] = $('.prizeName').text();
        $('.prizeName').text('');
        for(var t = 0; t < prizeArr.length; t++){
            if(prizeArr[t]['name'] == $('.prizeX').text()){
                $('.prizeName').prepend('<img src="'+prizeArr[t]['url']+'" width="220">');
            }
        }
        

        //获取要打印的参与抽奖个数
        var prizeNumb = $('#prizeJoinNumberN').text();

        //打印信息
        for (var i = 0; i < prizeNumb; i++) {
            if (mobile.length > 0) {
                /*if(i==0){
                    for(var ii=0; ii<mobile.length; ii++){
                        if(teshu['name'] == mobile[ii]['name']){
                            var randnum = ii;
                        }
                    }
                }else{
                    var randnum = GetRnd(0, mobile.length - 1);
                }*/
                var awardName = $('.awardName').eq(0).text();
                if(awardName == '特等奖' || awardName == '一等奖'){
                    var randnumN = GetRnd(0, white.length - 1);
                }else if(awardName == '二等奖'){
                    var randnumN = GetRnd(0, white2.length - 1);
                }else{
                    var randnumN = GetRnd(0, mobile.length - 1);
                }

                
                //ajax操作  
                var adnumber = mobile[randnumN]['name'];  
                //拼接所有中奖的信息
                for(var x=0; x < prizeArr.length; x++){
                    if(prizeArr[x]['name'] == $('.nextPrizeCurrent').text()){
                        /*if(i == 0){
                            addHtml(x,teshu);
                        }else if(prizeArr[x]['num']>1){
                            addHtml(x,mobile[randnum]);
                        }*/
                        if(awardName == '特等奖' || awardName == '一等奖'){
                            addHtml(x,white[randnumN],white[randnumN]['sex']);
                            postAjax(white[randnumN]['name'],prizeArr[x]['state'],prizeArr[x]['name']);
                        }else if(awardName == '二等奖'){
                            addHtml(x,white2[randnumN],white2[randnumN]['sex']);
                            postAjax(white2[randnumN]['name'],prizeArr[x]['state'],prizeArr[x]['name']);
                        }else{
                            addHtml(x,mobile[randnumN],mobile[randnumN]['sex']);
                            postAjax(mobile[randnumN]['name'],prizeArr[x]['state'],prizeArr[x]['name']);
                        };
                        break;
                    } 
                }
                
                //去除已中奖的人及中奖信息
                if(awardName == '特等奖' || awardName == '一等奖'){
                    for(var ii=0; ii < mobile.length; ii++){
                        if(mobile[ii]['name'] == white[randnumN]['name']){
                            mobile.removeEleAt(ii);
                        }
                    }

                    for(var ii=0; ii < white2.length; ii++){
                        if(white2[ii]['name'] == white[randnumN]['name']){
                            white2.removeEleAt(ii);
                        }
                    }
                    white.removeEleAt(randnumN);
                }else if(awardName == '二等奖'){
                    for(var ii=0; ii < mobile.length; ii++){
                        if(mobile[ii]['name'] == white2[randnumN]['name']){
                            mobile.removeEleAt(ii);
                        }
                    }

                    for(var ii=0; ii < white.length; ii++){
                        if(white[ii]['name'] == white2[randnumN]['name']){
                            white.removeEleAt(ii);
                        }
                    }
                    white2.removeEleAt(randnumN);
                }else{
                    for(var ii=0; ii < white.length; ii++){
                        if(white[ii]['name'] == mobile[randnumN]['name']){
                            white.removeEleAt(ii);
                        }
                    }

                    for(var ii=0; ii < white2.length; ii++){
                        if(white2[ii]['name'] == mobile[randnumN]['name']){
                            white2.removeEleAt(ii);
                        }
                    }
                    mobile.removeEleAt(randnumN);
                }
                //重新整理出带抽奖名单
                var o = 0;
                for (p = 0; p < mobile.length; p++) {
                    if (typeof mobile[p] != "undefined") {
                        mobile[o] = mobile[p];
                        o++;
                    }
                }
            } else {
                addHtml("奖品已抽完",0);
            }


        }

        //改变点击按钮操作状态
        $('.prizeBtn button').attr({'id':'start','onclick':'start()'}).text('开始');
    }


</script>
 <!-- <script>
    
 
 
    window.requestAnimFrame = (function(){   return  window.requestAnimationFrame})();
 var canvas = document.getElementById("space");
 var c = canvas.getContext("2d");
 
 var numStars = 1900;
 var radius = '0.'+Math.floor(Math.random() * 9) + 1  ;
 var focalLength = canvas.width *2;
 var warp = 0;
 var centerX, centerY;
 
 var stars = [], star;
 var i;
 
 var animate = true;
 
 initializeStars();
 
 function executeFrame(){
  
  if(animate)
    requestAnimFrame(executeFrame);
  moveStars();
  drawStars();
 }
 
 function initializeStars(){
  centerX = canvas.width / 2;
  centerY = canvas.height / 2;
  
  stars = [];
  for(i = 0; i < numStars; i++){
    star = {
      x: Math.random() * canvas.width,
      y: Math.random() * canvas.height,
      z: Math.random() * canvas.width,
      o: '0.'+Math.floor(Math.random() * 99) + 1
    };
    stars.push(star);
  }
 }
 
 function moveStars(){
  for(i = 0; i < numStars; i++){
    star = stars[i];
    star.z--;
    
    if(star.z <= 0){
      star.z = canvas.width;
    }
  }
 }
 
 function drawStars(){
  var pixelX, pixelY, pixelRadius;
  
  // Resize to the screen
  if(canvas.width != window.innerWidth || canvas.width != window.innerWidth){
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    initializeStars();
  }
  if(warp==0)
  {c.fillStyle = "rgba(0,10,20,1)";
  c.fillRect(0,0, canvas.width, canvas.height);}
  c.fillStyle = "rgba(209, 255, 255, "+radius+")";
  for(i = 0; i < numStars; i++){
    star = stars[i];
    
    pixelX = (star.x - centerX) * (focalLength / star.z);
    pixelX += centerX;
    pixelY = (star.y - centerY) * (focalLength / star.z);
    pixelY += centerY;
    pixelRadius = 1 * (focalLength / star.z);
    
    c.fillRect(pixelX, pixelY, pixelRadius, pixelRadius);
    c.fillStyle = "rgba(209, 255, 255, "+star.o+")";
    //c.fill();
  }
 }
 executeFrame();
 
 </script> -->
<script>
//宇宙特效
"use strict";
var canvas = document.getElementById('canvas'),
ctx = canvas.getContext('2d'),
w = canvas.width = window.innerWidth,
h = canvas.height = window.innerHeight,
//w = canvas.width = 3072,
//h = canvas.height = 1152,

hue = 217,
stars = [],
count = 0,
maxStars = 1300;//星星数量

var canvas2 = document.createElement('canvas'),
  ctx2 = canvas2.getContext('2d');
canvas2.width = 100;
canvas2.height = 100;
var half = canvas2.width / 2,
  gradient2 = ctx2.createRadialGradient(half, half, 0, half, half, half);
gradient2.addColorStop(0.025, '#CCC');
gradient2.addColorStop(0.1, 'hsl(' + hue + ', 61%, 33%)');
gradient2.addColorStop(0.25, 'hsl(' + hue + ', 64%, 6%)');
gradient2.addColorStop(1, 'transparent');

ctx2.fillStyle = gradient2;
ctx2.beginPath();
ctx2.arc(half, half, half, 0, Math.PI * 2);
ctx2.fill(); 
// End cache

function random(min, max) {
  if (arguments.length < 2) {
    max = min;
    min = 0;
  }

  if (min > max) {
    var hold = max;
    max = min;
    min = hold;
  }

  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function maxOrbit(x, y) {
  var max = Math.max(x, y),
    diameter = Math.round(Math.sqrt(max * max + max * max));
  return diameter / 2;
  //星星移动范围，值越大范围越小，
}

var Star = function() {

  this.orbitRadius = random(maxOrbit(w, h));
  this.radius = random(60, this.orbitRadius) / 8; 
  //星星大小
  this.orbitX = w / 2;
  this.orbitY = h / 2;
  this.timePassed = random(0, maxStars);
  this.speed = random(this.orbitRadius) / 200000; 
  //星星移动速度
  this.alpha = random(2, 10) / 10;

  count++;
  stars[count] = this;
}

Star.prototype.draw = function() {
  var x = Math.sin(this.timePassed) * this.orbitRadius + this.orbitX,
    y = Math.cos(this.timePassed) * this.orbitRadius + this.orbitY,
    twinkle = random(10);

  if (twinkle === 1 && this.alpha > 0) {
    this.alpha -= 0.05;
  } else if (twinkle === 2 && this.alpha < 1) {
    this.alpha += 0.05;
  }

  ctx.globalAlpha = this.alpha;
  ctx.drawImage(canvas2, x - this.radius / 2, y - this.radius / 2, this.radius, this.radius);
  this.timePassed += this.speed;
}

for (var i = 0; i < maxStars; i++) {
  new Star();
}

function animation() {
  ctx.globalCompositeOperation = 'source-over';
  ctx.globalAlpha = 0.5; //尾巴
  ctx.fillStyle = 'hsla(' + hue + ', 64%, 6%, 2)';
  ctx.fillRect(0, 0, w, h)

  ctx.globalCompositeOperation = 'lighter';
  for (var i = 1, l = stars.length; i < l; i++) {
    stars[i].draw();
  };

  window.requestAnimationFrame(animation);
}

animation();
</script>
</body>
</html>