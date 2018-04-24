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
        $res=$this->_db->where('status=0')->order('order_status,create_time desc')->select();
        return $res;
    }
    //通过订单状态获取订单信息
    public function getOrderByStatus($status=''){
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
        $res=$this->_db->where('status=0')->order('order_status,create_time desc')->getField('id,number,order_number,goods_name,goods_quantity,create_time,departure_time,car_plate,destination,order_status,driver_number,pick_number,contract_number,short_info,pick_quantity,pick_time,company,update_time');
        return $res;
    }

    public function getOrderBySearchExcel($data = array()){
        $data['status']=0;
        return $this->_db->where($data)->getField('id,number,order_number,goods_name,goods_quantity,create_time,departure_time,car_plate,destination,order_status,driver_number,pick_number,contract_number,short_info,pick_quantity,pick_time,company,update_time');
    }

    //查看个人订单
    public function getOrderByDriverId($driver_id){
        $res=$this->_db->where("status=0 and driver_id=$driver_id")->order('order_status,create_time desc')->select();
        return $res;
    }
}