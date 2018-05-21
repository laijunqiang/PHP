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

    public function record(){

        $this->display();
    }
    public function contact(){
        $this->display();
    }
    public function about(){
        $this->display();
    }
    public function edit(){
    $this->display();
}
}