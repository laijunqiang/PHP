<?php
namespace Common\Model;
use Think\Model;

/**
 * 用户操作
 * @author  singwa
 */
class UserModel extends Model {
    private $_db = '';

    public function __construct() {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('user');
    }
    //获取用户信息
    public function getUser(){
        $res=$this->_db->where('status=0')->order('create_time desc')->select();
        return $res;
    }
    //生成用户信息
    public function addUser($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    //修改用户信息页面
    public function showUser($id=''){
        return $this->_db->where("id='$id'")->find();
    }
    //修改用户信息
    public function updateUser($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
    //获取用户账号信息
    public function getAccount(){
        $res=$this->_db->where('status=0')->order('create_time desc')->getField('account',true);
        return $res;
    }
    //获取用户账号信息(修改)
    public function getAccountUpdate($id=''){
        $res=$this->_db->where("status=0&&id!='$id'")->order('create_time desc')->getField('account',true);
        return $res;
    }

    public function getUserByAccount($account='') {
        $res = $this->_db->where("account='$account'&& status=0")->find();
        return $res;
    }
}
