<?php
namespace Admin\Controller;
//商品分类控制器
class CategoryController extends CommonController{
    //分类列表
    public function index(){
        $data = D('System') -> getList('Category');
        $numb = 0;
        foreach($data as $v){
            $jump = U('Category/edit',array('id'=>$v['id']));
            if($v['pid'] > 0){
                $data[$numb]['className'] = 'class_child';
                $data[$numb]['classCate'] = '<a href="'.$jump.'">编辑</a> / <a href="#" class="act-del" data-id="'.$v['id'].'">删除</a>';
            }else{
                $data[$numb]['addClass'] = '添加子类';
                $data[$numb]['className'] = 'class_parent';
                $data[$numb]['classCate'] = '<a href="'.$jump.'">编辑</a>';
            }
            $numb++;
        }
        $this->assign('category',$data);
        $this->display();
    }
    
    //添加分类
    public function add(){
        $id = I('get.id/d',0);   //分类ID
        //$Category = D('Category');          //实例化模型
        $data = M('Category') -> getById($id);
        if(IS_POST){
            $this -> createObj('Category', '创建数据对象失败！');                     //创建数据对象
            M('Category')->pid = $id;                      //新闻分类
            $this -> addData('Category', '分类添加失败！');                      //添加到数据库
            $this->successAddData('Category','添加分类成功！',0);            //添加成功
        }
        $this->assign('category',$data);
        $this->display();
    }
    
    
    //修改分类
    public function edit(){
        $id = I('get.id/d',0);          //获取待修改的分类ID，“/d”用于转换为整型
        $data = M('Category') -> getById($id);
        if($id>10){
            $data['bigName'] = M('Category') ->field('name')-> getById($data['pid']);
            $data['bigName'] = $data['bigName']['name'];
        };
        if(IS_POST){
            $this->createObj('Category', '创建数据对象失败！');                      //创建数据对象
            $this -> errorSaveData($id,'修改分类失败！','Category');     //修改产品信息失败
            $this -> successSaveData('Category');                            //修改新闻成功
        }
        $this->assign('category',$data);
        $this->display();
    }
    
    //删除新闻
    public function del() {
        $mes['id'] = I('post.id/d',0);         //待删除分类ID
        $this -> delData($mes,'Category');
    }
}

    