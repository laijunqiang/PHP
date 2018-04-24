<?php
namespace Home\Controller;
use Think\Controller;
class PersonalCenterController extends Controller {
    public function index(){
        $account=$_SESSION['driverUser']['account'];
        //dump($account);
        $ret = D('Driver')->getDriverByAccount($account);
        //dump($ret);
        $this->assign('ret', $ret);
        $this->display();
    }
    //个人密码修改页面
    public function setPasswordPage(){
        $account=$_SESSION['driverUser']['account'];
        //dump($account);
        $ret = D('Driver')->getDriverByAccount($account);
        //dump($ret);
        $this->assign('ret', $ret);
        $this->display();
    }
}