var $windowWidth = $(document).width();                 //全局变量，获取浏览器当前宽度
var $spanTag = '<span class="tag fa fa-hand-o-right fa-lg"></span>';

//网站域名
function webUrl(){
    return '../../';
}

/**
 * 鼠标移入图片缩略图，显示放大图片在浏览器中央
 * tooltipPhoto  为图片类属性
 */
function tooltipPhoto(){
    $('a.tooltipPhoto').mouseover(function(){
        this.myTitle = this.title;
        this.title = '';
        var imgTitle = this.myTitle ? this.myTitle : "";
        var tooltip = "<div id='tooltipPhoto'><img src='" + this.href + "'alt='产品预览图' width=300/><p>"+imgTitle+"</p></div>";
        $("body").append(tooltip);
        $('#tooltipPhoto').css({"top":"60px","left":($windowWidth/2-150)+"px"}).show("fast");
    }).mouseout(function(){
        this.title = this.myTitle;
        $('#tooltipPhoto').remove();
    }).mousemove(function(){
        $('#tooltipPhoto').css({"top":"60px","left":($windowWidth/2-150)+"px"});
    });
}
/**
 * 以下为提示框显示效果
 */
$('.tipHover').mouseover(function(e){           //鼠标移入事件
    var x=10,y=30;
    var $content = $(this).attr('tip');
    this.myTitle = this.title;                  //提取提示内容给myTitle
    this.title = '';                            //清空原来的提示内容
    var $toolTip = "<div id='tooltip'>"+this.myTitle+"</div>";      //创建提示标题框盒子
    var $tooltipIcon = "<img src='"+webUrl()+"Public/Admin/img/tooltip.png' id='tooltipIcon'>";         //创建提示框上的小图标
    $('body').append($toolTip);                 //追加提示框
    $('body').append($tooltipIcon);             //追加提示框上的小图标
    //alert($content);
    if($content == 'tipHoverRight'){
        $('#tooltip').css({"top":(e.pageY+y) + "px","left":(e.pageX+x) + "px"}).show('fast');       //指定提示框的位置
        $('#tooltipIcon').css({"top":(e.pageY+26) + "px","left":(e.pageX+18) + "px"}).show('fast'); //指定提示框上小图标的位置
    }else if($content == 'tipHoverLeft'){
        $('#tooltip').css({"top":(e.pageY+y) + "px","right":($windowWidth-e.pageX-4) + "px"}).show('fast');       //指定提示框的位置
        $('#tooltipIcon').css({"top":(e.pageY+26) + "px","right":($windowWidth-e.pageX+4) + "px"}).show('fast'); //指定提示框上小图标的位置
    }
}).mouseout(function(){                         //鼠标移出事件
    this.title = this.myTitle;                  //把提示框的内容还给原来的提示标签
    $("#tooltip").remove();                     //移除提示框
    $("#tooltipIcon").remove();                 //移除提示框上的小图标
}).mousemove(function(e){                       //移动事件
    var x=10;
    var y=30;
    var $content = $(this).attr('tip');
    if($content == 'tipHoverRight'){
        $('#tooltip').css({"top":(e.pageY+y) + "px","left":(e.pageX+x) + "px"});            //指定提示框的位置
        $('#tooltipIcon').css({"top":(e.pageY+26) + "px","left":(e.pageX+18) + "px"});      //指定提示框上小图标的位置
    }else if($content == 'tipHoverLeft'){
        $('#tooltip').css({"top":(e.pageY+y) + "px","right":($windowWidth-e.pageX-4) + "px"});            //指定提示框的位置
        $('#tooltipIcon').css({"top":(e.pageY+26) + "px","right":($windowWidth-e.pageX+4) + "px"});      //指定提示框上小图标的位置
    }
});


/**
 * 列表页的对象
 */


//快捷操作表单追加
function formQuick($num,$item){
    if($num == 1){
        var form = '<form method="post" id="form"><input type="hidden" name="id" id="target_id"></form>';
    }else{
        var form = '<form method="post" id="form"><input type="hidden" name="id" id="target_id"><input type="hidden" name="field" id="target_field"><input type="hidden" name="status" id="target_status"></form>';
    }
    $item.append(form);
    
}

//删除数据信息
function delData($url){
    $(".act-del").click(function(){
        if(confirm('你确定要删除该数据吗？')){
            $("#target_id").val($(this).attr("data-id"));
            $("#form").attr("action",$url).submit();
        }
    });
}

//遍历数据修改后返回主页加深行背景
function deepenLine(){
    for(var i=0; i<$('.hiddenThing').size(); i++){
        if(((document.URL).split('/',8)[6]) == 'id'){               //判断域名数组中第7个是否是id
            if($('.hiddenThing').eq(i).text() == (document.URL).split('/',8)[7]){
                $('.hiddenThing').eq(i).parent().parent('tr').children('td').css('backgroundColor','#f7f7f7');
            }
        }
    }
}

//快捷操作
//$num表示要不要移除推荐
function quickAction(url,$num){
    function change_status(obj,field){
        $("#target_id").val(obj.attr("data-id"));
        $("#target_field").attr("value",field);
        $("#target_status").attr("value",(obj.attr("data-status")=="yes") ? "no" : "yes");
        $("#form").attr("action",url).submit();
    }

    //快捷操作-上架
    $(".act-onsale").click(function(){
        change_status($(this),'on_sale');
    });
    
    if($num){
        //快捷操作-推荐
        $(".act-recommend").click(function(){
            change_status($(this),'recommend');
        });
    }
}

function morePower(url,$num){
    function change_status(obj,field){
        $("#target_id").val(obj.attr("data-id"));
        $("#target_field").attr("value",field);
        $("#target_status").attr("value",(obj.attr("data-status")=="yes") ? "no" : "yes");
        $("#form").attr("action",url).submit();
    }

    //快捷操作-上架
    $(".act-onsale").click(function(){
        change_status($(this),'on_sale');
    });
    
    //快捷操作-中文
    $(".act-cn").click(function(){
        change_status($(this),'cn');
    });
    
    //快捷操作-英文
    $(".act-en").click(function(){
        change_status($(this),'en');
    });
    
    //快捷操作-点餐
    $(".act-orders").click(function(){
        change_status($(this),'orders');
    });
    
    //快捷操作-查询
    $(".act-inquire").click(function(){
        change_status($(this),'inquire');
    });
    
    //快捷操作-管理员
    $(".act-super").click(function(){
        change_status($(this),'super');
    });
    
    //快捷操作-投票
    $(".act-vote").click(function(){
        change_status($(this),'vote');
    });
}

//下拉菜单
function downList($url){
    $('#category').change(function(){
        var url = $url;
        location.href = url.replace("_ID_",$(this).val());
    });
}

//搜索框
function search($content,$item){
    var search = '<div class="content_title_filtrate"><form method="get" enctype="multipart/form-data"><input type="text" name="searchIP" placeholder="'+$content+'"><button type="submit" onclick="varify()">搜索</button></form></div>';
    $item.append(search);
}

function varify(){
    var $content = $('.content_title_filtrate').find('input').val();
    if($content == ''){
        modal('error','搜索内容不能为空！');
        return false;
    }
}

//分类选择
function selectedProduct($item,$url,$content){
    var selected = '<div class="content_title"><div class="content_title_select">分类选择:<select id="category" class="cid"><option value="-1" >All</option></select><a href="'+$url+'">'+$content+'</a></div></div>';
    $item.prepend(selected);
}

function onlyAddInfo($url,$content){
    return '<div class="content_title"><div class="content_title_select"><a href="'+$url+'">'+$content+'</a></div></div>';
}
    
//鼠标移入信息列表的样式
function lineHover(){
    var $lengthTr = $('.tableListWrap tr').size()-1;
    $('.tableListWrap tr').hover(function(){
        if(($(this).index() > 1) && ($(this).index()<$lengthTr)){
            $(this).children('td').addClass('listStyleBgColor');
            $(this).children('td').find('.opration').css('visibility','visible');
        }
    },function(){
        $(this).children('td').removeClass('listStyleBgColor');
        $(this).children('td').find('.opration').css('visibility','hidden');
    });
}

//针对下拉列表选择父类则进行错误提示
$('#category').change(function(){
    $positionVal = $(this).val();
    if($positionVal <= 10){
        $('.errTip').show();
    }else{
        $('.errTip').hide();
    }
    $('.inputHidden').val($(this).val());
});

//主页表格
//表格框架
function tableIndexHeader($num,$content,$dataCount,$pagelist){
    if(!$dataCount){
        return '<table class="tableListWrap"><tr><th colspan="'+$num+'">'+$content+'</th></tr></table>';
    }else{
        return '<table class="tableListWrap"><tr><th colspan="'+$num+'">'+$content+'</th></tr><tr><td width="50"><input name="visitor[]" type="checkbox" value="" /></td><td colspan="'+($num-1)+'" class="oprationLast"> 删除 / 共 <span id="pageNum">'+$dataCount+'</span> 条数据 </tr></table><div class="pageList">'+$pagelist+'</div>';
    }
}

//遍历输出数据头
function tableList($arr){
    var $th='';
    for(var i=0; i<$arr.length; i++){
        $th += '<td>'+$arr[i]+'</td>';
    }
    return '<tr>'+$th+'</tr>';
}

//并排数据遍历显示
function tableListShow(trArr){
    var tr = '';
    for(var i=0; i<trArr.length; i++){
        tr += "<tr><td>"+trArr[i][0]+"</td><td>"+trArr[i][1]+"</td><td>"+trArr[i][2]+"</td><td>"+trArr[i][3]+'</td></tr>';
    }
    return tr;
}



//以下为数据页面操作
/**
 * 表格追加样式
 */
function tableHeader($content1,$content2){
    var tableHeader = '<table class="tableWrap"><tr><th colspan="4">'+$content1+'</th></tr><tr><td colspan="4"><input type="submit" class="addForm inputNone" value="'+$content2+'" name="return"></td></tr></table>';
    $('.contentBox form').prepend(tableHeader);
};

function tdOdd($num){
    var inner = '<tr><td>类别</td><td colspan="3"><select id="classList" name="cid"></select></td></tr>';
    $('.tableWrap tr').eq($num).after(inner);
}

function input($content,$type,$name,$value){
    if(!$value){
        return '<td>'+$content+'</td><td><input type="'+$type+'" name="'+$name+'"></td>';
    }else{
        return '<td>'+$content+'</td><td><input type="'+$type+'" name="'+$name+'" value="'+$value+'"></td>';
    }
}

function textarea($content,$name,$value){
    if(!$value){
        return '<td>'+$content+'</td><td><textarea rows="2" cols="60" name="'+$name+'"></textarea></td>';
    }else{
        return '<td>'+$content+'</td><td><textarea rows="2" cols="60" name="'+$name+'">'+$value+'</textarea></td>';
    }
}

//编辑器
function editor($name,$id,$value){
    if(!$value){
        return '<td>说明</td><td colspan="3"><textarea id="'+$id+'" name="'+$name+'" style="width: 100%;min-height:300px;"></textarea></td>';
    }else{
        return '<td>说明</td><td colspan="3"><textarea id="'+$id+'" name="'+$name+'" style="width: 100%;min-height:300px;">'+$value+'</textarea></td>';
    }
}

function existPhoto($content,$type,$url,$path){
    if($type == ''){
        return '<td>'+$content+'</td><td><img src="'+webUrl()+'public/Common/img/preview.jpg" width="120"></td>';
    }else{
        return '<td>'+$content+'</td><td><span class="thumbClose"><img src="'+$path+'" width="120" style="border: 1px solid #ddd;"><a class="closeThumb" href="'+$url+'"><img style="width:20px;" src="'+webUrl()+'public/Admin/img/a7.png"></a></span></td>';
    }
}

function tableSelect($content,$name){
    var select = '<td>'+$content+'</td><td><select name="'+$name+'"><option value="yes" selected>Yes</option><option value="no">No</option></select></td>';
    return select;
}

function existSelect($content,$name,$value){
    if($value == 'no'){
        return '<td>'+$content+'</td><td><select name="'+$name+'"><option value="yes">Yes</option><option value="no" selected>No</option></select>';
    }else{
        return '<td>'+$content+'</td><td><select name="'+$name+'"><option value="yes">Yes</option><option value="no" selected>No</option></select>';
    }
    
}


function $trTd($num){
    var trTd = '<tr></tr>';
    for(var i=1; i<$num;i++){
        trTd = trTd + '<tr></tr>';
    }
    return trTd;
}

function tableTr($num){
    return $('.tableWrap tr').eq($num);
}

function tableTrTdLeft($length,$num){
    for(var i=1; i<=$length; i++){
        $('.tableListWrap tr').eq(i).children('td').eq($num).css('text-align','left');
    }
    return this;
}


//表格的注意事项
function notice($tip){
    //alert($tip.length);
    var $p='';
    for(var i=0; i<$tip.length; i++){
        $p += '<p>'+$tip[i]+'</p>';
        //alert(1);
    }
    return '<td>注意</td><td colspan="3" class="tableNotice">'+$p+'</td>';
}


//小卡片式表格
function cardTable(listArr){
    var tr = '';
    for( var i=0; i<listArr.length; i++){
        tr+='<tr><td>'+listArr[i][0]+'</td><td>'+listArr[i][1]+'</td></tr>';
    }
    return '<table class="cardInfo">'+tr+'</table>';
}


//侧边导航选择状态
function selectTag($m,$n){
    return $('.menuLeftLi').eq($m).addClass('selected').children('ul').children('li').eq($n).find('a').append($spanTag);
}


//必填标识
function tipMust(){
    return '<span style="color: red;">*</span>';
}

