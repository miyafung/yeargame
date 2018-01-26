
var nametxt = $('.name');                                                   //设置名单盒子
var phonetxt = $('.phone');                                                  //设置名单姓名内容

var pcount = $('p.count').text();                                //获取参加抽奖名单数据
var runing = true,trigger = true;                                           //定义抽奖状态
var inUser = (Math.floor(Math.random() * 10000)) % 5 + 1;                   //指定获奖人信息
var num = 0;                                                                //初始化变量
var Lotterynumber = 5;                                                      //设置单次抽奖人数
var prizeN = 5;                                                  //设置奖项的初始值
var display = $('.modality');
//alert(typeof(prizeN));

//对手机号码进行部分隐藏处理
function hiddenPhone(phone){
    return phone.replace(phone.substr(3, 4), "****");
}

$(function () {
    nametxt.html(hiddenPhone($data['number']));                    //设置默认循环名单第一张图片
    phonetxt.html($data['name']);                                             //设置默认循环名单第一张姓名

});

function prizeNum(prizeN){
    switch(prizeN){
    case 5:
        alert('接下来进行5等奖的抽奖。。。');
        st = Lotterynumber = 5;
        break;
    case 4:
        alert('接下来进行4等奖的抽奖。。。');
        st = Lotterynumber = 4;
        break;
    case 3:
        alert('接下来进行3等奖的抽奖。。。');
        st = Lotterynumber = 3;
        break;
    case 2:
        alert('接下来进行2等奖的抽奖。。。');
        st = Lotterynumber = 2;
        break;
    case 1:
        alert('接下来进行1等奖的抽奖。。。');
        st = Lotterynumber = 1;
        break;
    case 0:
        alert('抽奖已结束。。。');
        break;
    }
}

// 开始停止
function start() {
    typeof(prizeN) == 'undefined' ? prizeN = 5 : prizeN;
    if (runing) {
        if ( pcount <= Lotterynumber ) {          //剩余抽奖人数不足预设的人数
            alert("抽奖人数不足5人");
        }else if(prizeN == 0){
            alert("游戏已结束！");
        }else{                                                              
            runing = false;                       //把设置状态改为false
            prizeNum(prizeN);
            prizeN--;
            $('#start').text('停止');             //点击抽奖按钮变为点击停止按钮
            startNum();                           //触发循环名单函数，遍历名单抽奖
        }
    } else {
        $('#start').text('自动抽取中('+ Lotterynumber+')');                 //进行抽奖
        zd();                                                //触发函数，边随机获取中奖名单，边打印中奖名单
    }
}
   
//键盘事件
$(document).keydown(function(e){
    if(!e) var e = window.event; 
    if(e.keyCode==32){
        start();
    }else if(e.keyCode==18){
        $('.modality').toggle();
    }
    if(!display.is(':hidden')){
        typeof(dlnum) == 'undefined' ? dlnum = 4 : dlnum;
        if(e.keyCode == 37){
            if(dlnum < 0){
                dlnum = 4;
            }
            $('.modality-list dl').eq(dlnum).addClass('selected').siblings().removeClass('selected');
            dlnum--;
        }else if(e.keyCode == 39){
            if(dlnum > 4){
                dlnum = 0;
            }
            $('.modality-list dl').eq(dlnum).addClass('selected').siblings().removeClass('selected');
            dlnum++;
        }
    }
 });


// 开始抽奖，数据会不停地循环参加名单，直到点击停止按钮
function startLuck() {
    runing = false;
    $('#btntxt').removeClass('start').addClass('stop');    //点击抽奖按钮变为点击停止按钮
    startNum();
}

// 循环参加名单
function startNum() {
    var num = Math.floor(Math.random() * pcount) ;               //获取随机数
    console.log(num);
    phonetxt.html(hiddenPhone(data[num].number));                //切换名单人员头像
    nametxt.html(data[num].name);                                //切换名单人员姓名
    t = setTimeout(startNum, 0);
}

// 停止跳动
function stop() {
    pcount = data.length-1;                 //获取抽奖名单人员总数
    clearInterval(t);                       //清除定时器
    t = 0;
}

// 打印中奖人
function zd() {
    if (trigger) {
        trigger = false;
        var i = 0;
        if ( pcount >= Lotterynumber ) {
            stopTime = window.setInterval
            (function () {
                if (runing) {
                    runing = false;
                    $('#btntxt').removeClass('start').addClass('stop');
                    startNum();
                } else {
                    runing = true;
                    //对数据的
                    if(data[num].tab == '1'){
                        startNum();
                    }else{
                        $('#btntxt').removeClass('stop').addClass('start');
                        stop();
                    }
                    i++;
                    Lotterynumber--;
                    $('#start').text('自动抽取中('+ Lotterynumber+')');
                    if ( i == st ) {
                        console.log("抽奖结束");
                        window.clearInterval(stopTime);
                        $('#start').text("开始");
                        Lotterynumber = st;
                        trigger = true;
                    };
                    $('.luck-user-list').prepend("<li><div class='luckuserName'>"+data[num]['name']+"</div><div class='luckuserPhone'>"+hiddenPhone(data[num]['number'])+"</div></li>");
                    $('.modality-list ul').append("<li><div class='luck-phone'>"+hiddenPhone(data[num]['number'])+"</div><p>"+data[num]['name']+"</p></li>");
                    //将已中奖者从数组中"删除",防止二次中奖
                    //data.splice(num, 1);
                    var id = data[num]['id'];
                    var url = '__CONTROLLER__/eidtThing';
                    $.post(url,{'state' : Lotterynumber,'id' : id },function(data){
                        if(data == 1){
                            console.log('更新数据成功');
                        }else if(data == 2){
                            console.log('更新数据失败');
                        }
                    },'json');
                    //data.roll.splice($.inArray(data.roll[num].name, data.roll), 1);
                }
            },1000);
        };
    }
}