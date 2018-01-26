<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta name="viewport" content="width=640"/>
<meta charset="utf-8">
<title>Cooper</title>
<script src="/game/Public/Common/js/jquery.min.js"></script>
</head>


<body>
<div id="shaketext">DK/t0</div>
<script>
/*$(function(){
　　if (window.DeviceMotionEvent) {
　　　　// 移动浏览器支持运动传感事件
　　　　window.addEventListener('devicemotion', deviceMotionHandler, false);
　　} 
});
var SHAKE_THRESHOLD = 300000;
// 定义一个变量保存上次更新的时间
var last_update = 0;
// 紧接着定义x、y、z记录三个轴的数据以及上一次出发的时间
var x;
var y;
var z;
var last_x;
var last_y;
var last_z;
var count = 0;

function deviceMotionHandler(eventData) {
　　// 获取含重力的加速度
　　var acceleration = eventData.accelerationIncludingGravity; 

　　// 获取当前时间
　　var curTime = new Date().getTime(); 
　　var diffTime = curTime -last_update;
　　// 固定时间段
　　if (diffTime > 100) {
　　　　last_update = curTime; 

　　　　x = acceleration.x; 
　　　　y = acceleration.y; 
　　　　z = acceleration.z; 

　　　　var speed = Math.abs(x + y + z - last_x - last_y - last_z) / diffTime * 300000; 

　　　　if (speed > SHAKE_THRESHOLD) { 
　　　　　　// TODO:在此处可以实现摇一摇之后所要进行的数据逻辑操作
　　　　　　count++;
			var px = count*19;
			// var text = count*8;
			var text = count;

			//ajax操作  
            //var id = data[num]['id'];               //初始化获奖对象在数据库对应的ID值
            var url = '/game/index.php/Home/Index/eidtyao';   //初始化链接
            $.post(url,{'numb' : text },function(data){
                if(data == 1){
                    console.log('数据更新成功');
                }else if(data == 2){
                    console.log('数据更新失败');
                }
            },'json');

			//var gamer=document.getElementById("game-start-water");
			var gamertext=document.getElementById("shaketext");
			//gamertext.style.cssText = "display:none;";
			//gamer.style.cssText = "position:absolute; z-index:1; top:" + (470-px) + "px;";
			$("#shaketext").html("DK/t" + text);
			/*if(px>=380){
				alert("380了哦！！");
			}*
　　　　}

　　　　last_x = x; 
　　　　last_y = y; 
　　　　last_z = z; 
　　} 
}*/

//先判断设备是否支持HTML5摇一摇功能
var count = 0;
if (window.DeviceMotionEvent) {
	//获取移动速度，得到device移动时相对之前某个时间的差值比
	window.addEventListener('devicemotion', deviceMotionHandler, false);
}else{
	alert('您好，你目前所用的设置好像不支持重力感应哦！');
}

//设置临界值,这个值可根据自己的需求进行设定，默认就3000也差不多了
var shakeThreshold = 3000;
//设置最后更新时间，用于对比
var lastUpdate     = 0;
//设置位置速率
var curShakeX=curShakeY=curShakeZ=lastShakeX=lastShakeY=lastShakeZ=0;

function deviceMotionHandler(event){

	//获得重力加速
	var acceleration =event.accelerationIncludingGravity;

	//获得当前时间戳
	var curTime = new Date().getTime();

	if ((curTime - lastUpdate)> 100) {

		//时间差
		var diffTime = curTime -lastUpdate;
			lastUpdate = curTime;


		//x轴加速度
		curShakeX = acceleration.x;
		//y轴加速度
		curShakeY = acceleration.y;
		//z轴加速度
		curShakeZ = acceleration.z;

		var speed = Math.abs(curShakeX + curShakeY + curShakeZ - lastShakeX - lastShakeY - lastShakeZ) / diffTime * 10000;

		if (speed > shakeThreshold) {
			//TODO 相关方法，比如：

			//播放音效
			//shakeAudio.play();
			//播放动画
			/*$('.shake_box').addClass('shake_box_focus');
			clearTimeout(shakeTimeout);
			var shakeTimeout = setTimeout(function(){
				$('.shake_box').removeClass('shake_box_focus');
			},1000)*/
			count++;
			var text = count;
			//ajax操作  
            //var id = data[num]['id'];               //初始化获奖对象在数据库对应的ID值
            var url = '/game/index.php/Home/Index/eidtyao';   //初始化链接
            $.post(url,{'numb' : text },function(data){
                if(data == 1){
                    console.log('数据更新成功');
                }else if(data == 2){
                    console.log('数据更新失败');
                }
            },'json');
            $("#shaketext").html("DK/t" + text);

		}

		lastShakeX = curShakeX;
		lastShakeY = curShakeY;
		lastShakeZ = curShakeZ;
	}
}
</script>
</body>
</html>