<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index(){
        $name=D('Oil')->getNameByType('芳香烃');
        $this->assign('name',$name);
        $province=array('京', '津', '沪', '渝','冀', '豫','滇','辽','黑','湘','皖','鲁','新','苏','浙','赣','鄂','桂','甘','晋','蒙','陕','吉','闽','黔','粤','青','藏','蜀','宁','琼','台','港','澳');
        $city=range('A','Z');
        $this->assign('province', $province);
        $this->assign('city', $city);
        $this->display();
    }
    //获取油品信息
    public function getOilName(){
        $ret = D('Oil')->getNameByType($_POST['type']);
        exit(json_encode($ret));
    }
}