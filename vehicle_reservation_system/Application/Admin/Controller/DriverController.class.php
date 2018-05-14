<?php
namespace Admin\Controller;
use Think\Controller;
class DriverController extends Controller {
    public function index(){
        $ret = D('Driver')->getDriver();
        //dump($ret);
        $this->assign('ret', $ret);
        $this->display();
    }
}