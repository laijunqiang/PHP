<?php
namespace Common\Model;
use Think\Model;

/**
 * 司机用户操作
 * @author  singwa
 */
class DriverModel extends Model {
    private $_db = '';

    public function __construct() {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('driver');
    }

    public function getDriverByAccount($account='') {
        $res = $this->_db->where("account='$account'")->find();
        return $res;
    }
    //获取司机信息
    public function getDriver(){
        $res=$this->_db->where('status=0')->order('create_time desc')->select();
        return $res;
    }
    //获取司机ID值
    public function getIdByName($name){
        return $this->_db->where("name='$name'")->getField('id');
    }
    public function getIdByNumber($number){
        return $this->_db->where("number='$number'")->getField('id');
    }
    //修改司机信息页面
    public function showDriver($id=''){
        return $this->_db->where("id='$id'")->find();
    }
    //修改司机信息
    public function updateDriver($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
    //删除司机信息
    public function deleteDriver($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
    //获得现有司机的账号
    public function getDriverAccount(){
        $res=$this->_db->where('status=0')->order('create_time desc')->getField('account',true);// 获取account数组
        return $res;
    }
    //录入司机信息
    public function addDriver($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
    //修改司机密码
    public function update($data){
        if(!$data || !is_array($data)) {
            return 0;
        }
        $account=$data['account'];//字符串需要引号
        return $this->_db->where("account='$account'")->save($data);
    }
    //获取司机账号信息(修改)
    public function getAccountUpdate($id=''){
        $res=$this->_db->where("status=0&&id!='$id'")->order('create_time desc')->getField('account',true);
        return $res;
    }
}
