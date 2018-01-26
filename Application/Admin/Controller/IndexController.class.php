<?php
namespace Admin\Controller;
//use Think\Controller;
//后台首页
class IndexController extends CommonController{
    //后台首页，显示服务器基本信息
    public function index(){
        /*$p = I('get.p/d',0);       //当前页码
        $timeSolt = I('get.timeSolt/d',0);
        $data['guests'] = M('Index') -> count("id");        //获取所有访问信息
        $System = D('System');                                //实例化
        //获取当天和前一天的访客访问信息
        $data['yesterdayNum'] = $System -> timeCycle_yesterday($System-> getTime(1));
        $data['todayNum'] = $System -> timeCycle_today($System-> getTime(1));
        
        //获取用户访问信息
        $data['dataListArr'] = $System -> getUserInfo($p,$timeSolt);
        //获取用户登录信息
        $data['dataLogin'] = M('logininfomation') -> where(array('name'=>session('userinfo.name'))) -> find();
        
        $this->assign($data);*/
        $this->display();
    }
    
    
    //获取MySQL版本
    private function getMySQLVer(){
        $rst = M()->query('select version() as ver');
        return isset($rst[0]['ver']) ? $rst[0]['ver'] : '未知';
    }
}
