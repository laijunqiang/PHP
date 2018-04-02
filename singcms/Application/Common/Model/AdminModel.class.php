<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/2
 * Time: 9:53
 */
namespace Common\Model;
use Think\Model;
class AdminModel extends Model{
    private $_db='';
    public function __construct()
    {
/*  D方法实例化模型类的时候通常是实例化某个具体的模型类，
    如果你仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，
    由于不需要加载具体的模型类，所以性能会更高。  */
        $this->_db=M('admin');
    }
    public function getAdminByUsername($username){
        $result=$this->_db->where('username="'.$username.'"')->find();
        return $result;
    }


}