<?php
namespace Common\Model;
use Think\Model;

/**
 * 权限信息管理操作
 * @author  singwa
 */
class RoleModel extends Model {
    private $_db = '';

    public function __construct() {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('role');
    }

    //获取权限信息
    public function getRole(){
        $res=$this->_db->where('status=0')->order('create_time desc')->select();
        return $res;
    }
    //录入权限信息
    public function addRole($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
    //获取用户信息
    public function getName(){
        return $this->_db->where('status=0')->order('create_time desc')->getField('name',true);//返回整个列的数据
    }
    //获取用户信息(修改)
    public function getNameUpdate($id=''){
        return $this->_db->where("status=0&&id!='$id'")->order('create_time desc')->getField('name',true);//返回整个列的数据
    }
    //修改权限信息页面
    public function showRole($id=''){
        return $this->_db->where("id='$id'")->find();
    }
    //修改权限信息
    public function updateRole($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }

    //删除权限信息
    public function deleteRole($data){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
    //查询是否有权限
    public function getNameById($id=''){
        $res=$this->_db->where("status=0 and id='$id'")->getField('name');
        return $res;
    }
    //通过ID查询权限
    public function getRoleById($id=''){
        $res=$this->_db->where("status=0 and id='$id'")->find();
        return $res;
    }
}
