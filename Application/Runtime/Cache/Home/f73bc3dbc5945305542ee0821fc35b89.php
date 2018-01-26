<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>仿微信抢红包</title>
		<style>
			html,body,div{margin:0;padding:0;}
			body{background:#EAEAEA;font:16px/1.8 "微软雅黑";padding-bottom:20px}
			input{margin:0;display:inline-block;border:1px solid #ddd;padding:4px 2px;font-size:16px;font-family:"微软雅黑";margin-right: 5px;}
			input:focus{border-color:#3C9BD1;outline:none;}
			
			.wrap,.list { margin: 50px auto; width: 300px;}
			.title{   font-size: 42px;   color: #464646;text-align: center;}
			.line{height:40px;line-height:40px;text-align: center;}
			.btn{display:block;background:#3C9BD1;color:#fff;line-height: 40px;height:40px;text-align: center;width:200px;margin:0 auto;margin-top:50px;text-decoration: none;transition:all .3s linear;border-radius: 2px;}
			.btn:hover{opacity:.9;}
			.list{width:500px;border:1px solid #DBDBDB;padding:10px;BACKGROUND:#F5F5F5;text-align: center;}
			.list p span {color: red; padding: 0 8px;}
			.list p:empty{background: #000000;}
			.list:empty{display: none;}
			.link{position:fixed;height:20px;font-size: 12px;color:#999;text-align: center;width: 100%;bottom:0;line-height:20px;margin:0;padding:0;    background: #EAEAEA;padding:5px 0;}
			.link a{font-size:12px;color:#999;}
		</style>
	</head>
	<body>
		<h1 class="title">javascript实现仿微信抢红包</h1>
		<div class="wrap">
			<div class="line">红包个数：<input type="text" name="packetNumber" value="5" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength="10">个</div>
			<div class="line">总&ensp;金&ensp;额：<input type="text" name="money" value="5" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')" maxlength="10">元</div>
			<div class="line"><a class="btn" href="javascript:;">发红包</a></div>
		</div>
		<div class="list"></div>
		<p class="link">参考<a target="_blank" href="https://www.zybuluo.com/yulin718/note/93148">《微信红包的架构设计简介》</a>文章</p>

<script>
 "use strict";

var _createClass = function() {
    function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
            var descriptor = props[i];
            descriptor.enumerable = descriptor.enumerable || false;
            descriptor.configurable = true;
            if ("value" in descriptor)
                descriptor.writable = true;
            Object.defineProperty(target, descriptor.key, descriptor);
        }
    }
    return function(Constructor, protoProps, staticProps) {
        if (protoProps)
            defineProperties(Constructor.prototype, protoProps);
        if (staticProps)
            defineProperties(Constructor, staticProps);
        return Constructor;
    }
    ;
}();

function _classCallCheck(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
        throw new TypeError("Cannot call a class as a function");
    }
}

var MoneyPacket = function() {
    function MoneyPacket(packNumber, money) {
        _classCallCheck(this, MoneyPacket);
        
        this.min = 0.01;
        this.flag = true;
        this.packNumber = packNumber;
        this.money = money;
        if (!this.checkPackage()) {
            this.flag = false;
            return {
                "flag": this.flag
            };
        }
    }
    
    _createClass(MoneyPacket, [{
        key: "checkPackage",
        value: function checkPackage() {
            if (this.packNumber == 0) {
                alert("至少需要设置1个红包");
                return false;
            }
            if (this.money <= 0) {
                alert("红包总金额不能小于0");
                return false;
            }
            if (this.packNumber * this.min > this.money) {
                alert("单个红包金额不可低于0.01元");
                return false;
            }
            return true;
        }
    }]);
    
    return MoneyPacket;
}();

var getRandomMoney = function getRandomMoney(packet) {
    if (packet.packNumber == 0) {
        return;
    }
    if (packet.packNumber == 1) {
        var _lastMoney = Math.round(packet.money * 100) / 100;
        packet.packNumber--;
        packet.money = 0;
        return _lastMoney;
    }
    var min = 0.01
      , 
    max = packet.money / packet.packNumber * 2
      , 
    money = Math.random() * max;
    money = money < min ? min : money;
    money = Math.floor(money * 100) / 100;
    packet.packNumber--;
    packet.money = Math.round((packet.money - money) * 100) / 100;
    return money;
}
;

(function() {
    var oBtn = document.querySelector(".btn");
    var oList = document.querySelector(".list");
    
    oBtn.onclick = function() {
        var packetNumber = +document.querySelector("input[name=packetNumber]").value;
        var money = +document.querySelector("input[name=money]").value;
        var str = "";
        
        var packet = new MoneyPacket(packetNumber,money)
          , 
        num = packet.flag && packet.packNumber || 0;
        console.log("========================================================================");
        for (var i = 0; i < num; i++) {
            var _pack = getRandomMoney(packet);
            str += "<p>第<span>" + i + "</span>个红包:: <span>" + _pack.toFixed(2) + "</span>元&emsp;&emsp;==剩余红包:: <span>" + packet.money.toFixed(2) + "</span> 元<p>";
            console.log("第", i, "个红包::", _pack.toFixed(2), "元      ==剩余红包::", packet.money.toFixed(2), "元");
        }
        str !== "" && (oList.innerHTML = str);
    }
    ;
})();

</script>
	</body>
</html>