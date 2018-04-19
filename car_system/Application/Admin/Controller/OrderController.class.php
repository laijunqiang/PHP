<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index(){
        $ret = D('Order')->getOrder();
        //dump($ret); //成功返回二维数组，失败返回NULL
        $this->assign('ret', $ret);
        $this->display();
    }
    //生成订单页面
    public function add(){
        $this->display();
    }
    //生成订单处理
    public function addOrder(){
        //dump($_POST);
        date_default_timezone_set("Asia/Shanghai");
        $_POST['number']=date("YmdHis");
        $_POST['create_time']=date("Y-m-d H:i:s");
        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        $ret = D('Order')->addOrder($_POST);
        //dump($ret); //成功返回一个数组，失败返回NULL
        if(!$ret) {
            return show(0,'生成订单失败');
        }else {
            return show(1, '生成订单成功');
        }
    }

    //修改订单页面
    public function update(){
        $id=$_GET['id'];
//      如果查询出错，find方法返回false，如果查询结果为空返回NULL，查询成功则返回一个关联数组（键值是字段名或者别名）。
        $ret = D('Order')->showOrder($id);
        //在视图层可以通过{$ret.id}访问
        $this->assign('ret', $ret);
        $this->display();
    }
    //修改订单处理
    public function updateOrder(){
        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        $ret = D('Order')->updateOrder($_POST);
        //dump($ret); //成功返回一个数组，失败返回NULL
        if(!$ret) {
            return show(0,'修改订单失败');
        }else {
            return show(1, '修改订单成功');
        }
    }
    //删除订单处理
    public function deleteOrder(){
        $id=$_GET['id'];
        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        $ret = D('Order')->updateOrder($id);
        $this->redirect('Login/index');
    }

}