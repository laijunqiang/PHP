<?php
namespace Common\Model;
use Think\Model;

/**
 * 超级管理员用户操作
 * @author  singwa
 */
class AdminModel extends Model {
    private $_db = '';

    public function __construct() {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('admin');
    }

    public function getAdminByAccount($account='') {
        $res = $this->_db->where("account='$account'")->find();
        return $res;
    }
    //修改管理员密码
    public function update($data){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->where($data['account'])->save($data);
    }
}
