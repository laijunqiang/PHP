<?php
namespace Common\Model;
use Think\Model;

/**
 * 操作日志信息管理操作
 * @author  singwa
 */
class LogModel extends Model {
    private $_db = '';

    public function __construct() {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('log');
    }

    //获取日志信息
    public function getLog(){
        $res=$this->_db->where('status=0')->order('time desc')->select();
        return $res;
    }

    //录入日志信息
    public function addLog($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
    //删除司机信息
    public function deleteLog($data){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
}
