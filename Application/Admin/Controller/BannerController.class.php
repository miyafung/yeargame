<?php
namespace Admin\Controller;
//Banner控制器
class BannerController extends CommonController {
    //Banner列表
    public function index() {
        $info = $this -> getIdP();             //获取id,cid,p的参数
        $searCon = I('get.searchIP',0);           //获取搜索内容
        //判断查询列表，如果查询则导出查询数据，否则导出所有有数据
        $data = D('System') -> getSearch('Banner','banner',$info['p'],$searCon,'name|on_sale');
        $data = array_merge($data,$info);                                       //合并数组
        $this->assign($data);
        $this->display();
    }
	
    //Banner添加
    public function add(){                                               //获取参数
        if(IS_POST){
            $this -> createObj('Banner', '添加Banner信息失败');                     //创建数据对象
            $size = array('width'=>1920,'height'=>474);                          //设置图片大小
            $this -> dealPictureModel('Banner',$size,'banner');                         //如果有图片上传，则上传并生成预览图
            $this -> addData('Banner', 'Banner添加失败！');                      //添加到数据库
            $this->successAddData('Banner','添加Banner成功！',$cid);            //添加成功
        }
        $this->assign($data);
        $this->display();

    }
	
    //Banner修改
    public function edit(){
        $info = $this -> getIdP();                                           //获取id,cid,p的参数
        $data['Banner'] = M('Banner') -> getById($info['id']);                          //查询Banner数据列表
        if(IS_POST){
            $this->createObj('Banner', '编辑Banner失败！');                      //创建数据对象
            //处理特殊字段
            $size = array('width'=>1920,'height'=>474);                          //设置图片大小
            $this -> dealPictureModel('Banner',$size,'banner',$info['id']);            //如果有预览图文件上传，则更新预览图
            $this -> errorSaveData($info['id'],'修改Banner失败！','Banner');     //修改产品信息失败
            $this -> successSaveData('Banner',$info);                            //修改Banner成功
        }
        $data = array_merge($data,$info);                                       //合并数组
        $this->assign($data);
        $this->display();
    }
	
    //删除Banner
    public function del() {
        $mes = $this->getCidPPostId();                  //获取参数
        $this -> delData($mes,'Banner','banner');
    }
        
    //删掉指定的产品图片1
    public function delPhoto(){
        $info = $this -> getIdP();       //获取参数
        $this -> delPictureModel($info,'Banner','banner');
    }
	
    //Banner列表快捷修改
    public function change(){
        $info = $this -> getChangeData();       //获取参数
        $this->getChange($info,'Banner');
    }
	
    //商品详情 在线编辑器 图片上传
    public function uploadImage(){
        $this -> uploadImage();
    } 

}