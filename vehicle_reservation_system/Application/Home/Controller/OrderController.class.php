<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index(){
        //判断司机有没有预约
        $ret= D('Order')->hasOrder(session('openid'));
        //司机有预约
        if ($ret){
            $this->redirect('Order/record');
        }else {
            $driver = D('Driver')->getDriverByOpenid(session('openid'));
            $this->assign('driver', $driver);
            $name = D('Oil')->getNameByType('芳香烃');
            $this->assign('name', $name);

            $this->display();
        }
    }
    public function driverInfo(){
        $driver = D('Driver')->getDriverByOpenid(session('openid'));

        $selectProvince = substr($driver['plate'], 0, 3);
        //var_dump($selectProvince);die;
        $selectCity = substr($driver['plate'], 3, 1);
        $selectPlate = substr($driver['plate'], 4);
        //$selectProvince=json_encode($selectProvince);
        $this->assign('selectProvince', $selectProvince);
        $this->assign('selectCity', $selectCity);
        $this->assign('selectPlate', $selectPlate);
        $data = array($selectProvince, $selectCity, $selectPlate);
        //dump($data);
        return show(1, "", $data);

    }

    //司机已有预约
    public function record(){
        $ret= D('Order')->hasOrder(session('openid'));
        $date=substr($ret['create_time'],0,10);
        $this->assign('date', $date);
        $this->assign('ret', $ret);
        $this->display();
    }

    //获取油品信息
    public function getOilName(){
        $ret = D('Oil')->getNameByType($_POST['type']);
        exit(json_encode($ret));
    }

    //提交预约
    public function addOrder(){
        //dump(session('openid'));
        //dump($_POST);
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");
        $_POST['plate'] = $_POST['province'] . $_POST['city'] . $_POST['plate'];
        //获取该用户ID
        $_POST['id'] = D('Driver')->getIdByOpenid(session('openid'));
        $ret = D('Driver')->updateDriver($_POST);
        if (!$ret) {
            return show(0, '预约失败');
        } else {
            $data=array();
            date_default_timezone_set("Asia/Shanghai");
            $data['number']="O".str_pad(rand(0,9999),4,'0',STR_PAD_LEFT);
            $data['create_time']=date("Y-m-d H:i:s");//订单创建时间
            //获取油品ID
            $data['oil_id']=D('Oil')->getIdByName($_POST['oil_name']);
            $data['driver_id']=$_POST['id'];
            //获取排队次序最大值
            $maxOrderNumber=D('Order')->getMaxOrder();

            $data['order_number']=$maxOrderNumber[0]['maxorder']+1;
            if ($data['order_number']==1){
                $data['order_status']=1;
                $status="装车中";
            }elseif($data['order_number']==2){
                $data['order_status']=2;
                $status="厂内待装";
            }else{
                $data['order_status']=3;
                $status="厂外待装";
            }
        /*    var_dump(session('openid'));
            var_dump($_POST);
            exit;*/
            $return=D('Order')->addOrder($data);
            if (!$return) {
                return show(0, '预约失败');
            } else {
                sendTemplate(session('openid'),$status,$_POST['oil_type'],$_POST['plate'],$_POST['company'],$_POST['phone']);
                return show(1, '预约成功');
            }
        }
    }
}