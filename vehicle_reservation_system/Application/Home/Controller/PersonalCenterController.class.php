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
    //个人密码修改
    public function setPassword(){
        $_POST['password'] = getMd5Password($_POST['password']);
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");

        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        $ret = D('Driver')->update($_POST);
        //        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret) {
            return show(0,'修改失败，请重新修改！');
        }else {
            return show(1, '修改成功');
        }
    }
}