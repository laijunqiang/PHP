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

}