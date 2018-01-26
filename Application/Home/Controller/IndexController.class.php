<?php
namespace Home\Controller;
use Think\Controller;
//前台主页控制器
class IndexController extends Controller {
	public function show(){
		$where['state']  = array('gt',0);
		$data['data'] = M('Admin') -> where($where) -> select();
		//$data['count'] = M('Admin') -> where($where) -> count();
		$this -> assign($data);
		$this -> display();
	}

	public function index(){
		$where['state']  = array('gt',0);
		$data['data'] = M('Admin') -> where(array('state'=>0)) -> select();
		shuffle(shuffle(shuffle($data['data'])));
		$data['target'] = M('Admin') -> where($where) -> select();
		$where1['state']  = 0;
		$where1['tab']  = 1;
		$data['white'] = M('Admin') -> where($where1) -> select();
		shuffle(shuffle(shuffle($data['white'])));
		
		$where1['tab']  = array('gt',0);
		$data['white2'] = M('Admin') -> where($where1) -> select();
		shuffle(shuffle(shuffle($data['white2'])));
		$data['prize'] = M('Prize') -> select();
		$shu['state'] = 0;
		$shu['spoil'] = null;
		if(IS_POST){
			M('Admin') -> data($shu) -> where($where) -> save();
		}
		$this -> assign($data);
		$this -> display();
	}

	public function mob(){
		$where['state']  = array('gt',0);
		$data['data'] = M('Admin') -> where(array('state'=>0)) -> select();
		shuffle(shuffle(shuffle($data['data'])));
		$data['target'] = M('Admin') -> where($where) -> select();
		$where1['state']  = 0;
		$where1['tab']  = 1;
		$data['white'] = M('Admin') -> where($where1) -> select();
		shuffle(shuffle(shuffle($data['white'])));
		
		$where1['tab']  = array('gt',0);
		$data['white2'] = M('Admin') -> where($where1) -> select();
		shuffle(shuffle(shuffle($data['white2'])));
		$data['prize'] = M('Prize') -> select();
		$shu['state'] = 0;
		$shu['spoil'] = null;
		if(IS_POST){
			M('Admin') -> data($shu) -> where($where) -> save();
		}
		$this -> assign($data);
		$this -> display();
	}


	public function eidtThing(){
		$data['name'] = $_POST['name'];
		$data['state'] = $_POST['state'];
		$data['spoil'] = $_POST['spoil'];
		//$data['number'] = $_POST['adnumber'];
		$r = M('Admin') -> data($data) ->  where(array('name'=>$data['name'])) -> save();
		if($r){
			$this -> ajaxReturn(1);
		}
		$this -> display();
	}


	//快捷修改
    public function change(){
        $data['id'] = I('post.id/d');     //待处理商品ID
        $data['on_get'] = I('post.status');
        M('Admin') -> data($data) ->  where(array('id'=>$data['id'])) -> save();
        $this->redirect('Index/show');
		$this -> display();
    }
}