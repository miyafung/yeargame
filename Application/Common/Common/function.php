<?php

//获取一维数组分类列表
function category_list($data,&$rst,$pid=0,$level=0){
    foreach ($data as $v){
        if($v['pid'] == $pid){
            $v['level'] = $level;           //保存分类级别
            $rst[] = $v;                    //保存符合条件的元素
            category_list($data, $rst,$v['id'],$level+1);       //递归
        }
    }
}



//根据任意分类ID查找子孙分类ID
function category_child($data,&$rst,$id=0){
    foreach ($data as $v){
        if($v['pid'] == $id){
            $rst[] = (int)$v['id'];
            category_child($data, $rst,$v['id']);
        }
    }
}


//通过开源组件HTML Purifier过滤富文本
//该函数用于在后台编辑商品详情时过滤富文本，过滤后保存到数据库中
function htmlpurifier($html){
    static $Purifier;
    if(empty($Purifier)){
        //载入第三方类库
        if(!Vendor('htmlpurifier.HTMLPurifier','','.standalone.php')){
            die('载入HTMLPurifier类库失败！');
        }
        $Purifier = new HTMLPurifier($html);
    }
    return $Purifier->purify($html);
}


//按父子关系转换分类为多维数组
function category_tree($data,$pid=0,$level=0){
    $temp = $rst = array();
    foreach ($data as $v) $temp[$v['id']] = $v;
    foreach ($temp as $v){
        if(isset($temp[$v['pid']])){
            $temp[$v['pid']]['child'][] = &$temp[$v['id']];
        } else {
            $rst[] = &$temp[$v['id']];
        }
    }
    return $rst;
}


//查找分类的家谱
function category_family($data,$id){
    $rst = category_parent($data,$id);
    foreach (array_reverse($rst['pids']) as $v){
        foreach ($data as $vv){
            ($vv['pid'] == $v) && $rst['parent'][$v][] = $vv;
        }
    }
    return $rst;
}

//根据任意分类ID查找父分类（包括自己）
function category_parent($data,$id=0){
    $rst = array('pcat'=>array(),'pids'=>array($id));
    for($i=0;$id && $i<10; ++$i){           //最多10层，防止意外死循环
        foreach ($data as $v){
            if ($v['id'] == $id){
                $rst['pcat'][] = $v;            //父分类信息
                $rst['pids'][] = $id = $v['pid'];   //父分类ID
            }
        }
    }
    return $rst;
}


/*
 * 商品列表过虑项的URL生成
 * @param $type 生成的URL类型（cid,price,order）
 * @param $data 相应的数据当前的值（为空表示消除该参数）
 * $param string 生成好的携带正确参数的URL
 */
function mkFilterURL($type,$data=''){
    $params = I('get.');
    unset($params['p']);        //先清除分页
    //if($type=='cid') unset($params['price']);       //切换分类时清除价格
    if($data){          //添加到参数
        $params[$type] = $data;
    } else {            //$data为空时清除参数
        unset($params[$type]);
    }
    return U('Goods/index',$params);
}


/*function download($file_url,$new_name=''){  
    if(!isset($file_url)||trim($file_url)==''){  
        echo '500';  
    }  
    if(!file_exists($file_url)){ //检查文件是否存在  
        echo '404';  
    } 
    $file_name=basename($file_url);  
    $file_type=explode('.',$file_url);  
    $file_type=$file_type[count($file_type)-1];  
    $file_name=trim($new_name=='')?$file_name:urlencode($new_name);  
    $file_type=fopen($file_url,'r'); //打开文件  
    //输入文件标签 
    header("Content-type: application/octet-stream");  
    header("Accept-Ranges: bytes");  
    header("Accept-Length: ".filesize($file_url));  
    header("Content-Disposition: attachment; filename=".$file_name);  
    //输出文件内容  
    echo fread($file_type,filesize($file_url));  
    fclose($file_type);
}  */


function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){
    if(function_exists("mb_substr")){
        if($suffix){
            return mb_substr($str, $start, $length, $charset)."...";
        }else{
            return mb_substr($str, $start, $length, $charset);
        }
    }elseif(function_exists('iconv_substr')) {
        if($suffix){
            return iconv_substr($str,$start,$length,$charset)."...";
        }else{
            return iconv_substr($str,$start,$length,$charset);
        }
    }
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix){
        return $slice."...";
    }else{
        return $slice;
    }
    
    
    function download($file_url,$new_name=''){  
        if(!isset($file_url)||trim($file_url)==''){  
            echo '500';  
        }  
        if(!file_exists($file_url)){ //检查文件是否存在  
            echo '404';  
        } 
        $file_name=basename($file_url);  
        $file_type=explode('.',$file_url);  
        $file_type=$file_type[count($file_type)-1];  
        $file_name=trim($new_name=='')?$file_name:urlencode($new_name);  
        $file_type=fopen($file_url,'r'); //打开文件  
        //输入文件标签 
        header("Content-type: application/octet-stream");  
        header("Accept-Ranges: bytes");  
        header("Accept-Length: ".filesize($file_url));  
        header("Content-Disposition: attachment; filename=".$file_name);  
        //输出文件内容  
        echo fread($file_type,filesize($file_url));  
        fclose($file_type);
    }
    
}

