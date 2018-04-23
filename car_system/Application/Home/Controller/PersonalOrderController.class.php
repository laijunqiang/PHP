<?php
namespace Home\Controller;
use Think\Controller;
class PersonalOrderController extends Controller {
    public function index(){
        //dump($_SESSION['driverUser']['id']);
        $driver_id=$_SESSION['driverUser']['id'];
        $ret = D('Order')->getOrderByDriverId($driver_id);
        //dump($ret); //成功返回二维数组，失败返回NULL
        $this->assign('ret', $ret);
        $this->display();
    }
    //获取订单详细细节
    public function showOrder($id){
//        dump($id);
        $ret= D('Order')->showOrder($id);
//        dump($ret);//find()返回一维数组
        $this->assign('ret', $ret);
        $this->display();
    }
    //送达订单
    public function deliveryOrder($id){
//        dump($id);
        $ret =D('Order')->showOrder($id);
        $this->assign('ret',$ret);
        $this->display();
    }
}