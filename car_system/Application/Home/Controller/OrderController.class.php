<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index(){
        $ret = D('Order')->getOrder();
        //dump($ret); //成功返回二维数组，失败返回NULL
        $this->assign('ret', $ret);
        $this->display();
    }
    //司机接单处理页面
    public function takeOrder($id){
        //dump($id);
        $ret =D('Order')->showOrder($id);
        //获取司机编号
        $driver=D('Driver')->getDriverByAccount($_SESSION['driverUser']);
        $this->assign('driver',$driver);
        $this->assign('ret',$ret);
        $this->display();
    }
}