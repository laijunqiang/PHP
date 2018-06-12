<?php
namespace Home\Controller;
use Think\Controller;
class PersonalCenterController extends Controller {
    public function index(){
        $ret = D('Driver')->getDriverByOpenid(session('openid'));
        //dump($ret);
        $this->assign('ret', $ret);
        $order=D('Order')->hasOrder(session('openid'));
        //dump($order);
        $this->assign('order', $order);
        $this->display();
    }

    public function record(){
        $ret= D('Order')->getOrderByOpenId(session('openid'));
        foreach ($ret as $key=>$value){
            $ret[$key]['create_time']=substr($value['create_time'],0,10);
        }
        $this->assign('ret', $ret);
        $this->display();
    }
    public function contact(){
        $this->display();
    }
    public function about(){
        $this->display();
    }
    public function edit(){
        $driver =D('Driver')->getDriverByOpenid(session('openid'));
        $this->assign('driver', $driver);
        $this->display();
    }
    //提交预约
    public function update(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time'] = date("Y-m-d H:i:s");
        //获取该用户ID
        $_POST['id'] = D('Driver')->getIdByOpenid(session('openid'));
        $ret = D('Driver')->updateDriver($_POST);
        if (!$ret) {
            return show(0, '修改失败');
        } else {
            return show(1, '修改成功');
        }
    }
}