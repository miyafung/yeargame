<?php
namespace Admin\Controller;
use Think\Controller;
//后台公共控制器
class CommonController extends Controller{
    /*
     * 优先执行模块
     
    public function __construct() {
        parent::__construct();              //先执行父类构造方法
        $this->checkUser();                 //登录检查
        //已经登录，为模板分配用户名变量
        $this->assign('admin_name', session('userinfo.name'));
    }
    
    public function __call($method,$arg){
        header("Content-Type: text/html; charset=utf-8"); 
        echo '<script type="text/javascript">alert("嘿，还想调用这不存在的'.$method.'，没门！")</script>';
    }
    
    //检查用户是否已经登录
    private function checkUser(){
        if(!session('?userinfo')){              //未登录，请先登录
            $this->redirect('Login/index');
        }
    }*/
    
    /**
     * 图片模块
     * dealPictureModel                 //图片处理模块
     * delPictureModel                  //图片的删除处理模块
     * delPicture                       //图片源文件的删除
     */
    //图片处理模块
    public function dealPictureModel($type,$size,$route,$id){
        if(isset($_FILES['thumb']) && $_FILES['thumb']['error']===0) {
            if(!empty($id)){                                                 //判断$id是否存在
                $this -> delPicture($type,$id,$route);                 //先删除图片
            }
            $rst = D('System') -> uploadThumb('thumb',$size,$route);   //上传并生成预览图
            if(!$rst['flag']){                                              //判断是否上传成功
                $this->error('上传图片失败：'.$rst['error'],__SELF__);
            }
            M($type)->thumb = $rst['path'];                                 //上传成功，保存文件路径
        }
    }
    
    //图片的删除处理模块
    public function delPictureModel($info,$type,$route){
        $this -> delPicture($type,$info['id'],$route);                    //删除商品图片
        M($type)->thumb = NULL;                                                 //清空$thumb字段的数据
        $data = '';
        M($type)->field('thumb')->where(array('id'=>$info['id']))->save($data);
        $this -> success('图片删除成功！',U($type.'/edit',array('id'=>$info['id'],'cid'=>$info['cid'],'p'=>$info['p'])));         //操作成功，跳转
    }
    
    //图片源文件的删除
    public function delPicture($type,$id,$route){
        $thumb = M($type)->where(array('id'=>$id))->getField('thumb');         //取出原图文件名
        if(!$thumb) return ;                                                //商品图片不存在时直接返回
        if(!empty($route) && $route != 'none'){
            $path = "./Public/Uploads/$route/$thumb";                           //准备图路径
            if(is_file($path)) unlink($path);                                   //删除图文件
        }else{
            $path = "./Public/Uploads/big/$thumb";                          //准备大图路径
            if(is_file($path)) unlink($path);                                   //删除大图文件
            $path = "./Public/Uploads/small/$thumb";                          //准备小图路径
            if(is_file($path)) unlink($path);                                   //删除小图文件
        }
        //会残留空目录，可以通过其它方式定期清理
    }
    
    
    /**
     * 文件模块
     * dealFileModel                        //更新文件
     * delFileModel                         //文件的删除模块
     * delFilePath                          //删除PDF源文件
     */
    
    //更新文件
    public function dealFileModel($type,$route,$id){
        if(isset($_FILES['file']) && $_FILES['file']['error']===0) {
            if(!empty($id)){
                $this->delFilePath($type,$route,$id);                          //先删除文件
            }
            $rst = D('System')->uploadFile('file',$route);                         //上传并生成预览图
            if(!$rst['flag']){                                              //判断是否上传成功
                $this->error('更新文件失败：'.$rst['error'],'__SELF__');
            }
            M($type)->file = $rst['path'];                                  //上传成功，保存文件路径
        }
    }
    
    //文件的删除模块
    public function delFileModel($type,$info,$route){
        $jump = U($type.'/edit',array('id'=>$info['id'],'cid'=>$info['cid']));
        $this->delFilePath($type,$route,$info['id']);                      //删除商品文件
        $this->file = NULL;                                                 //清空file字段的数据
        $data = '';
        M($type)->field('file')->where(array('id'=>$info['id']))->save($data);
        $this -> success('文件成功删除！',$jump);                      //操作成功，跳转
    }
    
    //删除PDF源文件
    public function delFilePath($type,$route,$id){
        $file = M($type)->where(array('id'=>$id))->getField('file');        //取出PDF文件文件名
        if(!$file) return ;                                                 //PDF文件不存在时直接返回
        $path = "./Public/Uploads/$route/$file";                            //准备PDF文件路径
        if(is_file($path)) unlink($path);                                   //删除文件
        //会残留空目录，可以通过其它方式定期清理
    }
    
    
    
    
    /**
     * 数据模块
     * delData                          //删除带有图片、文件的数据
     */
    //图片、文件及数据一并删除
    public function delData($mes,$type,$route,$routeFile){
        $id = $mes['id'];                                                   //配置参数
        $jump = U($type.'/index',array('cid'=>$mes['cid'],'p'=>$mes['p']));
        if(!IS_POST) $this->error('删除失败：未选择参数',$jump);             //阻止直接访问
        //检查表单令牌
        /*if(!M($type)->autoCheckToken($_POST)){
            $this->error('表单已过期，请重新提交',$jump);
        }*/
        if(!empty($route)){
            $this->delPicture($type,$id,$route);                                //删除商品图片
        }
        if(!empty($routeFile)){
                $this->delFilePath($type,$routeFile,$id);                              //删除产品文件
            }
        M($type)->where(array('id'=>$id))->delete();                        //删除商品数据
        $this->success('删除成功！',$jump);                                 //删除成功，跳转
    }
    
    
    /**
     * 验证模块
     * createObj                //创建数据对象      
     * addData                  //添加到数据库
     * successAddData           //添加数据成功
     * errorSaveData            //修改信息失败
     * successSaveData          //成功修改信息
     */
    
    
    //创建数据对象
    public function createObj($type,$content){
        if(!M($type)->create(null,2)){
            $this->error($content,U($type.'/index'));
        }
    }
    
    //添加到数据库
    public function addData($type,$content){
        if(!M($type)->add()){
            $this->error($content,'__SELF__');
        }
    }
    
    //添加数据成功
    public function successAddData($type,$content,$cid){
        if(isset($_POST['return'])){
            $this->success($content,U($type.'/index',array('cid'=>$cid)));
        }
    }
    
    //保存到数据库
    public function errorSaveData($id,$conetnt,$type){
        $where = array('id' => $id);
        if(false === M($type) -> where($where) -> save()){
            $this->error($conetnt,'__SELF__');
        }
    }
    
    //修改数据成功
    public function successSaveData($type,$info){
        if(isset($_POST['return'])){
            if(empty($info)){
                $this->success('信息修改成功！',U($type.'/index'));
            }else{
                $this->success('信息修改成功！',U($type.'/index',array('id'=>$info['id'],'cid'=>$info['cid'],'p'=>$info['p'])));
            }
            
        }  
    }
    
    

    /**
     *其他模块
     * getIdCidP                    //获取基本参数
     * getIdP                       //获取没有分类的基本参数
     * getCidPPostId                //两个get，一个post的参数配置
     * getChangeData                //配置快捷操作的参数
     * getChange                    //快捷操作
     * uploadImage                  //编辑器
     */
    public function getIdCidP(){
        $info['id'] = I('get.id/d',0);
        $info['cid'] = I('get.cid/d',-1);
        $info['p'] = I('get.p/d',0);
        return $info;
    }
    
    public function getIdP(){
        $info['id'] = I('get.id/d',0);
        $info['p'] = I('get.p/d',0);
        return $info;
    }
    
    public function getCidPPostId(){
        $mes['id'] = I('post.id/d');                      //待处理Id
        $mes['cid'] = I('get.cid/d');
        $mes['p'] = I('get.p/d',0);                 
        return $mes;
    }
    
    public function getChangeData(){
        $info['cid'] = I('get.cid/d',0);    //分类ID
        $info['p'] = I('get.p/d',0);        //当前页码
        $info['id'] = I('post.id/d',0);     //待处理商品ID
        $info['field'] = I('post.field');   //待处理字段
        $info['status'] = I('post.status');	//待处理字段值
        return $info;
    }
    
    public function getChange($info,$type){
        $id = $info['id'];
        $jump = U($type.'/index',array('id'=>$id,'cid'=>$info['cid'],'p'=>$info['p']));
        $field = $info['field'];
        $status = $info['status'];
        if(!IS_POST) $this->error('操作失败');          //阻止直接访问
        //检测输入变量
        if($field!='on_sale' && $field!='recommend' && $field!='cn' && $field!='en' && $field!='vote' && $field!='orders' && $field!='inquire' && $field!='super'){
                $this->error('操作失败：非法字段',$jump);
        }
        if($status!='yes' && $status!='no'){
                $this->error('操作失败：非法状态值',$jump);
        }
        //检查表单令牌
        /*if(!M($type)->autoCheckToken($_POST)){
               $this->error('表单已过期，请重新提交',$jump);
        }*/
        //执行操作
        if(false === M($type)->where(array('id'=>$id)) -> save(array($field=>$status))){
                $this->error('操作失败：数据库保存失败',$jump);
        }
        if($field=='cn' || $field=='en' || $field=='vote' || $field=='orders' || $field=='inquire' || $field=='super'){
            $this->success('修改权限成功！',$jump);                        //操作成功成功，跳转
        }else{
            $this->success('修改状态成功！',$jump);                        //操作成功成功，跳转
        }
        
    }
    
    public function uploadImage(){
        $savePath = './Public/Uploads/describes';           //上传目录
        //上传配置
        $config = array(
            'savePath' => $savePath,     //存储文件夹
            'subPath' => date('Y-m/d'),  //子目录
            'allowFiles' => array('.gif','.png','.jpg','.jpeg','.bmp')  //允许的文件格式
        );
        //实例化UMEditor配套的文件上传类
        $Upload = new \Components\Uploader('upfile',$config);
        //返回JSON数据给UMEditor
        //$type = $_REQUEST['type'];
        $callback=$_GET['callback'];
        $info = $Upload->getFileInfo();
        $info = $callback ? "<script>$callback(".json_encode($info).')</script>' : json_encode($info);
        $this->ajaxReturn($info,'EVAL');
    }
    
}