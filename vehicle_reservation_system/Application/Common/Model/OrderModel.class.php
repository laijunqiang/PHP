<?php
namespace Common\Model;
use Think\Model;

/**
 * 订单信息管理
 * @author  singwa
 */
class OrderModel extends Model {
    private $_db = '';

    public function __construct() {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('order');
    }
    //获取订单信息
    public function getOrder(){
//        支持对多个字段的排序,如果没有指定desc或者asc排序规则的话，默认为asc。
        $res=$this->_db->where('status=0')->order('order_status,order_number')->select();
        return $res;
    }
    //获取正在排队的订单信息
    public function getOrdering(){
//        支持对多个字段的排序,如果没有指定desc或者asc排序规则的话，默认为asc。
        $res=$this->_db->where('status=0 && order_status!=0')->order('order_status,order_number')->select();
        return $res;
    }
    //通过订单状态获取订单信息
    public function getOrderByStatus($status=''){
        //dump($status); 如果$status=""，而order_status为数字类型，则$status会强制格式化为数字格式后进行查询操作(""转化为0)。
        return $this->_db->where("order_status='$status' and status=0")->select();
    }
    //通过搜索时间获取订单信息
    public function getOrderBySearch($data = array()){
        $data['status']=0;
        return $this->_db->where($data)->order('order_status,create_time desc')->select();
    }
    //复合查询
    public function select($data = array()){
        return $this->_db->where($data)->select();
    }

    //生成订单信息
    public function addOrder($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
    //修改订单信息页面或获取个人订单信息
    public function showOrder($id=''){
        return $this->_db->where("id='$id'")->find();
    }
    //修改订单信息
    public function updateOrder($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
    //删除订单信息
    public function deleteOrder($data){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }

    public function getOrderExcel(){
//        支持对多个字段的排序,如果没有指定desc或者asc排序规则的话，默认为asc。
        $res=$this->_db->where('status=0')->order('order_status,create_time desc')->getField('id,number,oil_name,oil_type,plate,driver_name,driver_company,order_status,order_number,create_time,update_time');
        return $res;
    }

    public function getOrderBySearchExcel($data = array()){
        //如果传入多个字段的名称
        //返回的是一个二维数组，类似select方法的返回结果，区别的是这个二维数组的键名是用户的id（准确的说是getField方法的第一个字段名）。
        $data['status']=0;
        return $this->_db->where($data)->getField('id,number,oil_name,oil_type,plate,driver_name,driver_company,order_status,order_number,create_time,update_time');
    }

    //查看个人订单
    public function getOrderByDriverId($driver_id){
        $res=$this->_db->where("status=0 and driver_id=$driver_id")->order('order_status,create_time desc')->select();
        return $res;
    }

    //获得排队次序最大值
    public function getMaxOrder(){
        $res=$this->_db->where('status=0')->max('order_number');
        return $res;
    }
    //获得排队次序最小值
    public function getMinOrder(){
        $res=$this->_db->where('status=0')->min('order_number');
        return $res;
    }

    //获取排队中的司机名字
    public function getDriverName(){
        $res=$this->_db->where('status=0 && order_status!=0')->getField('driver_name',true);
        return $res;
    }

    //通过排队次序获取个人订单
    public function getOrderByOrderNumber($orderNumber){
        $res=$this->_db->where("status=0 && order_number='$orderNumber'")->find();
        return $res;
    }

    //通过油品名获取排队信息
    public function getOrderByName($name=''){
        return $this->_db->where("oil_name='$name' and status=0 and order_status!=0")->select();
    }
}