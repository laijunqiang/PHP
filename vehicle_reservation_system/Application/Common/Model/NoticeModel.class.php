<?php
namespace Common\Model;
use Think\Model;

/**
 * 公告信息管理操作
 * @author  singwa
 */
class NoticeModel extends Model {
    private $_db = '';

    public function __construct() {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('notice');
    }

    //获取公告信息
//orderby多个字段时，用逗号分隔每一个字段，如果字段不指明排序方式，默认是增序。排序的方法是先按第一个字段排序，如果有相同的再按后续的字段依次排序。
    public function getNotice(){
        $res=$this->_db->where('status=0')->order('top desc,create_time desc')->select();
        return $res;
    }

    //修改公告信息页面
    public function showNotice($id=''){
        return $this->_db->where("id='$id'")->find();
    }
    //修改公告信息
    public function updateNotice($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
    //删除公告信息
    public function deleteNotice($data){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
    //录入公告信息
    public function addNotice($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
    //获取公告信息
    public function getFirstNotice(){
        $res=$this->_db->where('status=0')->order('top desc,create_time desc')->find();
        return $res;
    }
}
