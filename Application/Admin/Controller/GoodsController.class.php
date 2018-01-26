<?php
namespace Admin\Controller;
//商品控制器
class GoodsController extends CommonController {
    //商品列表
    public function index() {
        $searCon = I('get.searchIP',0);
        $System = D('System');
        $info = $this -> getIdCidP();             //获取id,cid,p的参数
        //获取商品列表
        $field = 'a.name,a.id,a.category_id,a.thumb,a.on_sale,a.recommend,a.add_time,a.num,a.sorts';
        $data = $System -> getSearch('Goods','goods',$info['p'],$searCon,'name',$info['cid'],'category_id','__CATEGORY__ ',$field);
        $data = array_merge($data,$info);                           //合并数组
        $data['classList'] = $System->getList('Category');           //查询分类列表
        $this->assign($data);
        $this->display();
    }
	
    //商品添加
    public function add(){
        $cid = I('get.cid/d',1);   //分类ID
        $Goods = M('Goods');                                                        //实例化模型
        if(IS_POST){
            $this->createObj('Goods', '添加商品失败');                              //创建数据对象
            //处理特殊字段
            $cid = $Goods->category_id = I('post.cid/d');                                             //商品分类
            $Goods->describes = I('post.describes','','htmlpurifier');              //商品描述（富文本过滤）;
            $Goods->parameters = I('post.parameters','','htmlpurifier');            //商品描述（富文本过滤）
            $this -> dealPictureModel('Goods');                                       //如果有图片上传，则上传并生成预览图
            $this -> dealFileModel('Goods','file');                                              //上传文件
            $this -> addData('Goods', '添加商品失败！');                              //添加到数据库
            $this -> successAddData('Goods','添加商品成功！',$cid);                    //添加商品成功
        }
        $where['pid'] = array('gt',0);
        $data['classList'] = M('Category')-> where($where) ->select();                           //查询分类列表
        $data['cid'] = $cid;
        $this->assign($data);
        $this->display();
    } 
        
    //商品修改
    public function edit(){
        $info = $this -> getIdCidP();                                           //获取id,cid,p的参数
        $Goods = M('Goods');                                                    //实例化模型
        $data['goods'] = $Goods -> getById($info['id']);                        //查询产品数据列表
        $where['pid'] = array('gt',0);
        $data['classList'] = M('Category')-> where($where) ->select();                //查询产品分类列表
        if(IS_POST){
            $this->createObj('Goods', '编辑产品信息失败！');                      //创建数据对象
            //处理特殊字段
            $info['cid'] = $Goods->category_id = I('post.cid/d');               //保存商品分类\
            $Goods -> describes = I('post.describes','','htmlpurifier');        //商品描述（富文本过滤）
            $Goods -> parameters = I('post.parameters','','htmlpurifier');      //商品描述（富文本过滤）
            $this -> dealPictureModel('Goods','none','none',$info['id']);                             //图片的处理
            $this -> dealFileModel('Goods','file',$info['id']);                      //文件的处理
            $this -> errorSaveData($info['id'],'修改产品信息失败！','Goods');    //修改产品信息失败
            $this -> successSaveData('Goods',$info);                            //修改商品成功
        }
        $data = array_merge($data,$info);                                       //合并数组
        $this->assign($data);
        $this->display();
    }
	
    //删除商品（放入回收站）
    public function del() {
        $mes = $this->getCidPPostId();                 //获取参数
        $this -> delData($mes,'Goods','none','files');
    }
	
    //快捷修改
    public function change(){
        $info = $this -> getChangeData();       //获取参数
        $this->getChange($info,'Goods');
    }
        
    //删掉指定的产品图片1
    public function delPhoto(){
        $info = $this -> getIdCidP();       //获取参数
        $this -> delPictureModel($info,'Goods');
    }
        
    //删掉指定的PDF文件
    public function delFile(){
        $info = $this -> getIdCidP();       //获取参数
        $this -> delFileModel('Goods',$info,'files');
    }
        
    //商品详情 在线编辑器 图片上传
    public function uploadImage(){
        $this -> uploadImage();
    } 
}