<?php
namespace Common\Model;
use Think\Model;

/**
 * 超级管理员用户操作
 * @author  singwa
 */
class GoodsModel extends Model {
    private $_db = '';

    public function __construct() {
        //仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高。
        $this->_db = M('goods');
    }
    //获取商品信息
    public function getGoods(){
        $res=$this->_db->where('status=0')->order('create_time desc')->select();
        return $res;
    }

    //生成商品信息
    public function addGoods($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
    //读取商品ID值
    public function getIdByNumber($number){
        return $this->_db->where("number='$number'")->getField('id');
    }
    //通过商品名获取商品ID
    public function getIdByName($name){
        return $this->_db->where("name='$name'")->getField('id');
    }
    //修改商品信息
    public function updateGoods($data = array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->save($data);
    }
}
