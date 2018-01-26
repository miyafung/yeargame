<?php
namespace Admin\Controller;
//新闻控制器
class NewsController extends CommonController {
    //新闻列表
    public function index() {
        $info = $this -> getIdCidP();             //获取id,cid,p的参数
        $searCon = I('get.searchIP',0);           //获取搜索内容
        //判断查询列表，如果查询则导出查询数据，否则导出所有有数据
        $field = 'a.id,a.thumb,a.clas_id,a.title,a.time,a.on_sale,a.add_time';
        $data = D('System') -> getSearch('News','news',$info['p'],$searCon,'title|on_sale',$info['cid'],'clas_id','__CLAS__ ',$field);
        $data = array_merge($data,$info);                                       //合并数组
        $data['classList'] = D('System')->getList('Clas');                       //查询分类列表
        $this->assign($data);
        $this->display();
    }
	
    //新闻添加
    public function add(){
        $cid = I('get.cid/d',2);                                                //获取参数
        if(IS_POST){
            $this -> createObj('News', '添加新闻信息失败');                     //创建数据对象
            //处理特殊字段
            $cid = M('News')->clas_id = I('post.cid/d',2);                      //新闻分类
            M('News')->describes = I('post.describes','','htmlpurifier');       //新闻描述（富文本过滤）
            $size = array('width'=>360,'height'=>225);                          //设置图片大小
            $this -> dealPictureModel('News',$size,'news');                         //如果有图片上传，则上传并生成预览图
            $this -> addData('News', '新闻信息添加失败！');                      //添加到数据库
            $this->successAddData('News','添加新闻信息成功！',$cid);            //添加成功
        }
        $data['classList'] = D('System')->getList('Clas');                      //查询分类列表
        $data['cid'] = $cid;
        $this->assign($data);
        $this->display();

    }
	
    //新闻修改
    public function edit(){
        $info = $this -> getIdCidP();                                           //获取id,cid,p的参数
        $News = M('News');                                                      //实例化模型
        $data['news'] = $News -> getById($info['id']);                          //查询新闻数据列表
        $data['classList'] = D('System') -> getList('Clas');                    //查询新闻分类列表
        if(IS_POST){
            $this->createObj('News', '编辑新闻信息失败！');                      //创建数据对象
            //处理特殊字段
            $info['cid'] = $News -> clas_id = I('post.cid/d',0);                //保存新闻分类
            $News -> describes = I('post.describes','','htmlpurifier');         //新闻描述（富文本过滤）
            $size = array('width'=>360,'height'=>225);                          //设置图片大小
            $this -> dealPictureModel('News',$size,'news',$info['id']);            //如果有预览图文件上传，则更新预览图
            $this -> errorSaveData($info['id'],'修改新闻信息失败！','News');     //修改产品信息失败
            $this -> successSaveData('News',$info);                            //修改新闻成功
        }
        $data = array_merge($data,$info);                                       //合并数组
        $this->assign($data);
        $this->display();
    }
	
    //删除新闻
    public function del() {
        $mes = $this->getCidPPostId();                  //获取参数
        $this -> delData($mes,'News','news');
    }
        
    //删掉指定的产品图片1
    public function delPhoto(){
        $info = $this -> getIdCidP();       //获取参数
        $this -> delPictureModel($info,'News','news');
    }
	
    //新闻列表快捷修改
    public function change(){
        $info = $this -> getChangeData();       //获取参数
        $this->getChange($info,'News');
    }
	
    //商品详情 在线编辑器 图片上传
    public function uploadImage(){
        $this -> uploadImage();
    } 
}