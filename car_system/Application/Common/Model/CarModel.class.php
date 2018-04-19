<?php
namespace Common\Model;
use Think\Model;

/**
 * 车辆信息管理操作
 * @author  singwa
 */
class CarModel extends Model {
    private $_db = '';

    public function __construct() {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('Car');
    }

    //获取车辆信息
    public function getCar(){
        $res=$this->_db->where('status=0')->order('create_time')->select();
        return $res;
    }
    //修改车辆信息页面
    public function showCar($id=''){
        return $this->_db->where("id='$id'")->find();
    }
    //修改车辆信息
    public function updateCar($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
    //删除司机信息
    public function deleteCar($data){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
}
