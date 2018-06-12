<?php
namespace Common\Model;
use Think\Model;

/**
 * 权限操作
 * @author  singwa
 */
class PermissionModel extends Model{
    private $_db = '';

    public function __construct()
    {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('permission');
    }

    //获取权限信息
    public function getPermission()
    {
        $res = $this->_db->query("select * from t_permission where status=0 order by create_time desc");
        return $res;
    }
}