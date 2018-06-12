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
        $res=$this->_db->query("select * from v_order where status=0 order by order_status,order_number");
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
        $res=$this->_db->query("select * from v_order where status=0 and order_status='$status' order by order_number");
        return $res;
    }
    //通过搜索时间获取订单信息
    public function getOrderBySearch($startTime='',$endTime=''){
        $res=$this->_db->query("select * from v_order where status=0 and create_time between '$startTime' and '$endTime' order by order_status,create_time desc");
        return $res;
    }
    //通过订单ID查看订单信息
    public function getOrderById($id){
        $res = $this->_db->query("select * from v_order where status=0 and id='$id'");
        return $res[0];
    }
    //复合查询
    public function select($status='',$startTime='',$endTime=''){
        $res=$this->_db->query("select * from v_order where status=0 and order_status='$status'and create_time between '$startTime' and '$endTime' order by order_status,create_time desc");
        return $res;
    }

    //生成订单信息
    public function addOrder($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    //修改订单信息
    //save方法的返回值是影响的记录数，如果返回false则表示更新出错，因此一定要用恒等来判断是否更新失败。
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

    public function getOrderBySearchExcel($status='',$startTime='',$endTime=''){
        if ($status=='') {
            $res = $this->_db->query(
                "select id,number,oil_name,oil_type,plate,name,company,order_status,order_number,create_time,update_time from v_order 
                where status=0 and create_time between '$startTime' and '$endTime' order by order_status,create_time desc"
            );
        }else if ($startTime == ""&& $endTime=='') {   //按状态搜索
            $res = $this->_db->query(
                "select id,number,oil_name,oil_type,plate,name,company,order_status,order_number,create_time,update_time from v_order 
                where order_status='$status' order by order_number"
            );
        }else{
            $res = $this->_db->query(
                "select id,number,oil_name,oil_type,plate,name,company,order_status,order_number,create_time,update_time from v_order 
                where order_status='$status' and create_time between '$startTime' and '$endTime' order by order_status,create_time desc"
            );
        }
        return $res;
        //如果传入多个字段的名称
        //返回的是一个二维数组，类似select方法的返回结果，区别的是这个二维数组的键名是用户的id（准确的说是getField方法的第一个字段名）。
        //$data['status']=0;
        //return $this->_db->where($data)->getField('id,number,oil_name,oil_type,plate,driver_name,driver_company,order_status,order_number,create_time,update_time');
    }

    //查看个人订单
    public function getOrderByDriverId($driver_id){
        $res=$this->_db->where("status=0 and driver_id=$driver_id")->order('create_time desc')->select();
        return $res;
    }

    //获得排队次序最大值(返回二维数组)
    //query方法用于执行SQL查询操作，如果数据非法或者查询错误则返回false，否则返回查询结果数据集（同select方法）。
    public function getMaxOrder(){
        $res=$this->_db->query("select max(order_number) as maxOrder from v_order where status=0");
        return $res;
    }
    //获得排队次序最小值
    public function getMinOrder(){
        $res=$this->_db->query("select min(order_number) as minOrder from v_order where status=0");
        return $res;
    }

    //获取排队中的司机名字
    public function getDriverName(){
        $res=$this->_db->query("select name from v_order where status=0 && order_status!=0");
        return $res;
    }

    //通过排队次序获取个人订单
    public function getOrderByOrderNumber($orderNumber){
        $res=$this->_db->query("select * from v_order where status=0 && order_number='$orderNumber'");
        return $res[0];
    }

    //通过油品名获取排队信息
    public function getOrderByName($name=''){
        return $this->_db->query("select * from v_order where oil_name='$name' and status=0 and order_status!=0 order by order_number");
    }
    //通过搜索时间获取订单信息
    public function search($search =''){
        return $this->_db->query("select * from v_order where (plate like '%$search%'or company like '%$search%') and status=0 and order_status!=0");
    }

    //查询司机有没有预约
    public function hasOrder($openid=''){
        $res = $this->_db->query("select * from v_order where openid='$openid' and status=0 and order_status!=0");
        return $res[0];
    }
    //查询司机预约(包括已装)
    public function getOrderByOpenId($openid=''){
        $res = $this->_db->query("select * from v_order where openid='$openid' and status=0");
        return $res;
    }

    //查询可调换的顺序
    public function getRestOrderNumber($orderNumber){
        $res = $this->_db->query("select order_number from t_order where order_number not in (1,$orderNumber) order by order_number");
        return $res;
    }
}