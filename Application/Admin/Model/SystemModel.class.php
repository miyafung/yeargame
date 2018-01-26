<?php
namespace Admin\Model;
use Think\Model;
class SystemModel extends Model {
    /**
     * 登录设置
     * 
     */
    //判断管理员用户名和密码
    public function checkLogin(){
        //当执行create()方法后，$this->data就保存了从表单提交过来的数据
        $username = $this->data['username'];        //表单提交的用户名
        $password = $this->data['password'];        //表单提交的密码
        $data = $this->field('password,salt')->where(array('username'=>$username))->find();         //根据用户名查询密码
        if($data){      //判断密码
            return $data['password'] == $this->password($password,$data['salt']);
        }
        return false;
    }
    
    
    /*
     * 编辑器
     * editorWrite          编辑器的相关配置
     */
    public function editorWrite($savePath){
        $config = array(                                                        //上传配置
            'savePath' => $savePath,                                            //存储文件夹
            'subPath' => date('Y-m/d'),                                         //子目录
            'allowFiles' => array('.gif','.png','.jpg','.jpeg','.bmp')          //允许的文件格式
        );
        $Upload = new \Components\Uploader('upfile',$config);                   //实例化UMEditor配套的文件上传类
        $callback=$_GET['callback'];
        $info = $Upload->getFileInfo();
        $info = $callback ? "<script>$callback(".json_encode($info).')</script>' : json_encode($info);
        $this->ajaxReturn($info,'EVAL');
    }
    
    /*
     * 其他
     * getPageData              查询数据
     * getSearch                搜索查询
     */
    
    public function getPageData($type,$class,$p,$cid,$classId,$Bclass,$field){
        if($cid > 0 && !empty($cid)){                                           //查找未分类的商品
            $where['a.'.$classId] = array('eq',$cid);
        }
        $pagesize = C('USER_CONFIG.pagesize');                                  //每页显示商品数
        if(!empty($field)){
            $count = M($type)->alias('a')->where($where)->count();              //获取符合条件的商品总数
            $Page = new \Think\Page($count,$pagesize);                          //实例化分页类
            $this->_customPage($Page);                                          //定制分页类样式
            //查询数据
            $data = M($type)->alias('a')->join($Bclass.' AS c ON c.id='.$classId,' LEFT ')->field($field)->where($where)->order('a.id desc')->page($p,$pagesize)->select();
        }else{
            $count = M($type)->count();                                         //获取符合条件的商品总数
            $Page = new \Think\Page($count,$pagesize);                          //实例化分页类
            $this->_customPage($Page);                                          //定制分页类样式
            $data = M($type)->order('id desc')->page($p,$pagesize)->select();   //查询数据
        }
        
        //返回结果
        return array(
            $class => $data,                        //列表数组
            'pagelist' => $Page->show(),            //分页链接HTML
            'dataCount' => $count,                  //统计数据
        );
    }
    
    //针队后台搜索查询
    public function getSearch($type,$class,$p,$searCon,$search,$cid,$classId,$Bclass,$field){
        if(gettype($searCon) == 'string' && $searCon != ''){
            $where[$search] = array('like','%'.$searCon.'%');                   //准备查询条件
            $data[$class] = M($type)-> where($where) ->select();                //根据搜索条件查询数据
            $data['dataCount'] = M($type)-> where($where) ->count();            //统计数据
        }else{
            $data = $this->getPageData($type,$class,$p,$cid,$classId,$Bclass,$field);   //默认查询所有的数据
        }
        return $data;
    }
    

    /**
     * 以下均为模块处理分拆处理的公共处理部分
     * uploadThumb              图片上传部分
     * _customPage              分页部分
     */
    
    //返回数组（flag=是否执行成功，error=失败时的错误信息，path=成功时的保存路径）
    public function uploadThumb($upfile,$size,$route){
        $file['temp'] = './Public/Uploads/temp/';                               //准备临时目录
        file_exists($file['temp']) or mkdir($file['temp'],0777,true);           //自动创建临时目录
        //上传文件
        $Upload = new \Think\Upload(array(
            'exts' => array('jpg','jpeg','png','gif'),                          //允许的文件后缀
            'rootPath' => $file['temp'],                                        //文件保存路径
            'autoSub' => false,                                                 //不生成子目录
        ));
        if(false===($rst = $Upload->uploadOne($_FILES[$upfile]))){
            return array('flag'=>false,'error'=>$Upload->getError());           //上传失败时，返回错误信息
        }
        $file['name'] = $rst['savename'];                   //准备生成缩略图,并获取文件名
        if (!empty($route) && $route != 'none'){                                   //判断图片的路径
            $file['path'] = './Public/Uploads/'.$route.'/';                     //图片路径
        }else{
            $file['path1'] = './Public/Uploads/big/';                           //产品大图路径
            $file['path2'] = './Public/Uploads/small/';                         //产品小图路径
        }
        file_exists($file['path']) or mkdir($file['path'],0777,true);           //创建保存目录
        $Image = new \Think\Image();                                            //生成缩略图,并实例化图像处理类
        if(!empty($route) && $route != 'none'){                                    //再次判断图片的路径
            $Image->open($file['temp'].$file['name']);                          //打开文件
            if(!empty($size) && $size != 'none'){
                $Image -> thumb($size['width'],$size['height'],2)->save($file['path'].$file['name']);
            }else{
                $Image -> save($file['path'].$file['name']);                    //保存图片
            }
        }else{
            //./表示从入口文件开始
            $source1 = './Public/Common/img/water.png';                         //获取水印信息
            $Image->open($file['temp'].$file['name']);                          //打开文件
            $Image->thumb(750,750,2)->water($source1,\Think\Image::IMAGE_WATER_CENTER,50)->save($file['path1'].$file['name']);      //保存产品大图,并添加水印
            $Image->open($file['temp'].$file['name']);                          //再次打开文件
            $Image->thumb(300,300,2)->save($file['path2'].$file['name']);       //保存产品小图，并添加水印
        }
        unlink($file['temp'].$file['name']);                                    //删除临时文件
        return array('flag'=>true,'path'=>$file['save'].$file['name']);         //返回文件路径
    }

    //文件上传部分
    public function uploadFile($upfile,$route){
        $file['files'] = './Public/Uploads/'.$route.'/';                        //准备目录
        file_exists($file['files']) or mkdir($file['files'],0777,true);         //自动创建目录
        //上传文件
        $Upload = new \Think\Upload(array(
            'exts' => array('pdf','txt','doc','xls','ppt'),                     //允许的文件后缀
            'rootPath' => $file['files'],                                       //文件保存路径
            'autoSub' => false,                                                 //不生成子目录
        ));
        if(false===($rst = $Upload->uploadOne($_FILES[$upfile]))){
                return array('flag'=>false,'error'=>$Upload->getError());       //上传失败时，返回错误信息
        }
        $file['name'] = $rst['savename'];                                       //文件名
        return array('flag'=>true,'path'=>$file['name']);                       //返回文件路径
    }
    
    //定制分页类样式
    private function _customPage($Page){
        $Page->lastSuffix = false;
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('first','首页');
        $Page->setConfig('last','尾页');
    }
    
    
    /**
     * 分类处理模块
     * getData                  //查询分类数据
     * getList                  //获得分类列表
     * getSubIds                //获得所有子孙分类
     */
    //查询分类数据
    private function getData($type){
        static $data = null;                                //缓存查询结果
        if(!$data) $data = M($type)->select();
        return $data;
    }

    //获得分类列表
    public function getList($type){
        category_list($this->getData($type),$data);
        return $data;
    }

    //查找所有子孙分类
    public function getSubIds($type,$id){
        $data = array($id);                                 //将ID自身放入数组头部
        category_child($this->getData($type),$data,$id);
        return $data;
    }
    
    //密码加密函数
    private function password($password,$salt){
        return md5(md5($password).$salt);
    }



    //获取时间周期
    /*public function getTime($cycle){
        //获取时间信息
        $Y = date(Y);
        $m = date(m);
        $d = date(d);
        $dateNum=date( "Y-m-d", gmmktime(0, 0,0,$m,$d-$cycle,$Y) );
        $dateNum = explode('-',$dateNum);
        $dateNum=gmmktime($dateNum[1],$dateNum[ 2],$dateNum[0]);
        return $dateNum;
    }
    
    //把时间记录转换为时间戳
    public function timeCycle($timeSolt1,$timeBetween){
        //拿到数据之后，多数据中的时间转换为时间戳
        $m = 0;
        $timeBetween2 = array([]=>array([]));
        foreach($timeBetween as $v){
            $timeBetween1 = explode(' ',$v['time']);
            //trace($timeBetween);
            $timeBetween1 = explode('-',$timeBetween1[0]);
            //trace($timeBetween);
            $timeBetween1=gmmktime($timeBetween1[1],$timeBetween1[ 2],$timeBetween1[0]);
            if($timeBetween1 >= $timeSolt1){
                $timeBetween1 = array('ip'=>$v['ip'],'id'=>$v['id'],'sorts'=>$v['sorts'],'addres'=>$v['addres'],'time'=>$v['time']);
                $timeBetween2 = array_merge_recursive($timeBetween2,array($m=>$timeBetween1));
                $m += 1;
            }
        }
        return $timeBetween2;
        //trace($timeBetween2);
    }
    
    
    //提取每一天的昨天数据量
    public function  timeCycle_yesterday($dateNum){
        $m = 0;
        $data = $this->field('time')->select();
        //trace($data);
        foreach($data as $v){
            $timeBetween1 = explode(' ',$v['time']);
            //trace($timeBetween1);
            $timeBetween1 = explode('-',$timeBetween1[0]);
            $timeBetween1=gmmktime($timeBetween1[1],$timeBetween1[ 2],$timeBetween1[0]);
            //trace($timeBetween1);
            if($timeBetween1 == $dateNum){
                $m += 1;
            }
            
        }
        return $m;
    }
    
    
    
    //提取每一天的今天的数据量
    public function  timeCycle_today($dateNum){
        
        $m = 0;
        $data = $this->field('time')->select();
        //trace($data);
        foreach($data as $v){
            $timeBetween1 = explode(' ',$v['time']);
            //trace($timeBetween);
            $timeBetween1 = explode('-',$timeBetween1[0]);
            //trace($timeBetween);
            $timeBetween1=gmmktime($timeBetween1[1],$timeBetween1[2],$timeBetween1[0]);
            if($timeBetween1 > $dateNum){
                $m += 1;
            }
            
        }
        return $m;
    }*/
    
    
}