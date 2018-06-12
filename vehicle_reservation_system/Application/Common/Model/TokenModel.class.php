<?php
namespace Common\Model;
use Think\Model;

/**
 * 超级管理员用户操作
 * @author  singwa
 */
class TokenModel extends Model {
    private $_db = '';

    public function __construct() {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('token');
    }

    public function getToken() {
        $res = $this->_db->find();
        return $res;
    }

    public function add($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    public function update($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        $appid=$data['appid'];
        //"appid=$appid"直接解释为字符串，错误
        return $this->_db->where("appid='$appid'")->save($data);
    }
}
