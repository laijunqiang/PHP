<?php
namespace Common\Model;
use Think\Model;

class OilModel extends Model {
    private $_db = '';

    public function __construct() {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('oil');
    }
    //获取油品信息
    public function getOil(){
        $res=$this->_db->where('status=0')->order('create_time desc')->select();
        return $res;
    }
    //生成油品信息
    public function addOil($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
    //读取油品ID值
    public function getIdByNumber($number){
        return $this->_db->where("number='$number'")->getField('id');
    }
    //通过油品名获取油品ID
    public function getIdByName($name){
        return $this->_db->where("name='$name'")->getField('id');
    }
    //修改油品信息页面
    public function showOil($id=''){
        return $this->_db->where("id='$id'")->find();
    }
    //修改油品信息
    public function updateOil($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
    //获取油品名信息
    public function getName(){
        $res=$this->_db->where('status=0')->order('create_time desc')->getField('name',true);
        return $res;
    }
    //获取油品名信息(修改)
    public function getNameUpdate($id=''){
        $res=$this->_db->where("status=0&&id!='$id'")->order('create_time desc')->getField('name',true);
        return $res;
    }
}
