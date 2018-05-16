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
    //获取车牌号信息
    public function getPlate(){
        $res=$this->_db->where('status=0')->order('create_time desc')->getField('plate',true);
        return $res;
    }
    //获取车牌号信息(修改)
    public function getPlateUpdate($id=''){
        $res=$this->_db->where("status=0&&id!='$id'")->order('create_time desc')->getField('plate',true);
        return $res;
    }
    //获取车架号信息
    public function getFrame(){
        $res=$this->_db->where('status=0')->order('create_time desc')->getField('frame',true);
        return $res;
    }
    //获取车架号信息(修改)
    public function getFrameUpdate($id=''){
        $res=$this->_db->where("status=0&&id!='$id'")->order('create_time desc')->getField('frame',true);
        return $res;
    }
    //通过车牌号获取车辆ID
    public function getIdByPlate($car_plate){
        $res=$this->_db->where("plate='$car_plate'")->getField('id');
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
}
