<?php
namespace Admin\Controller;
use Think\Controller;
//后台用户登录
class LoginController extends Controller{
	public function index(){
		if (IS_POST){
            //先检查验证码
            if(false === $this->checkVerify(I('post.verify'))){
                $this->error('验证码错误',U('Login/index'));
            }
            if(!M('Admin')->create()){
                $this->error('登录失败！',U('Login/index'));
            }
            //判断是否存在该用户
            $data = M('Admin')->where(array('username'=>I('post.username')))->find();         //根据用户名查询密码
            if($data){      //判断密码
                if($data['password'] == md5(md5(I('post.password')).$data['salt'])){
                    if($data['on_sale'] == 'yes'){
                        //查询数据库是否已经存在该用户访问记录
                        $dataLogin = M("Logininfomation") -> where(array('name'=> I('post.username'))) -> find();
                        $this -> createUserInfor($dataLogin,I('post.username'));
                    }else{
                        $this->error('你的账号已被锁定，请联系管理员处理',U('Login/index'));
                    }
                }else{
                    $this->error('登录失败：用户名或密码错误。',U('Login/index'));
                }
            }else{
                $this->error('登录失败：用户名或密码错误。',U('Login/index'));
            }
        }
        $this->display();
	}


	/**
     * 登录模块
     * createUserInfor              记录登录信息
     */
    public function createUserInfor($dataLogin,$username){
        //获取时间与IP
        $nowIP = get_client_ip();
        $nowTime = date("Y-m-d h:i:s");
        if(count($dataLogin) == 0){
            $dataLogin['lastIP'] = $dataLogin['nowIP'] = $nowIP;
            $dataLogin['lastTime'] = $dataLogin['nowTime'] = $nowTime;
            $dataLogin['times'] = 1;
            $dataLogin['name'] = $username;
            M("Logininfomation") -> add($dataLogin);
        }else{
            $dataLogin['lastIP'] = $dataLogin['nowip'];
            $dataLogin['lastTime'] = $dataLogin['nowtime'];
            $dataLogin['nowIP'] = $nowIP;
            $dataLogin['nowTime'] = $nowTime;
            $dataLogin['times']++;
            M("Logininfomation") -> save($dataLogin);
        }
        session('userinfo',array('name'=>$username));
        $this->redirect('Index/index');
    }

    //生成验证码
    public function getVerify(){
        ob_clean();
        $Verify = new \Think\Verify();
        $Verify->entry();
    }
    
    //检查验证码
    private function checkVerify($code,$id=''){
        $Verify = new \Think\Verify();
        return $Verify->check($code,$id);
    }
    
    //退出系统
    public function logout(){
        session(null);              //清空后台所有会话
        $this->redirect('Login/index');
    }

}