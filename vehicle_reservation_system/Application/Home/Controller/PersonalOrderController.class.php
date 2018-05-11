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
        $this->display('index');
    }
    //获取订单详细细节
    public function showOrder($id){
//        dump($id);
        $ret= D('Order')->showOrder($id);
//        dump($ret);//find()返回一维数组
        $this->assign('ret', $ret);
        $this->display();
    }
    //送达订单页面
    public function deliveryOrder($id){
//        dump($id);
        $ret =D('Order')->showOrder($id);
        $this->assign('ret',$ret);
        $this->display();
    }
    //送达处理
    public function updateOrder()
    {
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time'] = date("Y-m-d H:i:s");
        //dump($_POST);
        $ret = D('Order')->updateOrder($_POST);
        //dump($ret);
        if (!$ret) {
            return show(0, '提交失败');
        } else {
            return show(1, '提交成功');
        }
    }
    //以月为单位，进行订单查询
    public function select($searchTime){
        if ($searchTime==""){
            $this->index();//会执行/Application/Home/View/PersonalOrder/select.html
        }else {
            $startTime = substr($searchTime, 0, 7);
            $endTime = substr($searchTime, 10, 7);
            $start = $startTime . "-01 00:00:00";
            $end = $endTime . "-31 23:59:59";
            //dump($startTime);"2018-04"
            //dump($endTime);
            $driver_id = $_SESSION['driverUser']['id'];
            $data = array();
            $data['driver_id'] = $driver_id;
            $data['departure_time'] = array('between', "$start,$end");
            $ret = D('Order')->getOrderBySearch($data);
            //dump($ret); //成功返回二维数组，失败返回NULL
            $this->assign('ret', $ret);
            $this->assign('searchTime', $searchTime);
            $this->display('index');
        }
    }
}