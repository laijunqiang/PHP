<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index(){
        $ret = D('Order')->getOrder();
        //dump($ret); //成功返回二维数组（返回的都是字符串数据），失败返回NULL
        $this->assign('ret', $ret);
        $this->display();
    }
    //司机接单处理页面
    public function takeOrder($id){
        //dump($id); 字符串数据

        //获取司机编号
        $driver=D('Driver')->getDriverByAccount($_SESSION['driverUser']['account']);
        $this->assign('driver',$driver);
        //获取订单信息
        $ret =D('Order')->showOrder($id);
        $this->assign('ret',$ret);
        //获取车辆信息
        $car=D('Car')->getCar();
        $this->assign('car',$car);
        $this->display();
    }
    //司机接单处理
    public function updateOrder(){
        $car_plate=$_POST['car_plate'];
        $car_id=D('Car')->getIdByPlate($car_plate);
        $_POST['car_id']=$car_id;
        //dump($_POST);
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");
        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        $ret = D('Order')->updateOrder($_POST);
//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret) {
            return show(0,'提交失败');
        }else {
            return show(1, '提交成功');
        }
    }
}