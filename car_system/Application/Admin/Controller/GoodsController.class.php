<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function index(){
        $ret = D('Goods')->getGoods();
        //dump($ret);
        $this->assign('ret', $ret);
        $this->display();
    }

    //修改商品页面
    public function update(){
        $id=$_GET['id'];
//      如果查询出错，find方法返回false，如果查询结果为空返回NULL，查询成功则返回一个关联数组（键值是字段名或者别名）。
        $ret = D('Goods')->showGoods($id);
        $this->assign('ret', $ret);
        //在视图层可以通过{$ret.id}访问
        $this->display();
    }
    //修改商品处理
    public function updateGoods(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");

        $name=D('Goods')->getNameUpdate($_POST['id']);
        foreach ($name as $v){
            if ($v==$_POST['name'])
                return show(0,'商品名已存在，请重新修改');
        }

        $ret = D('Goods')->updateGoods($_POST);
//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret) {
            return show(0,'修改商品失败，请重新修改');
        }else {
            $index = A('Log');
            $number=$_POST['number'];
            if (session('adminUser.account')!=null) {
                $index->addLog("修改商品编号为：$number 的商品", session('adminUser.account'));
            }else {
                $index->addLog("修改商品编号为：$number 的商品", session('User.name'));
            }
            return show(1, '修改商品成功');
        }
    }
    //删除商品处理
    public function deleteGoods(){

        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        date_default_timezone_set("Asia/Shanghai");
        $_POST['delete_time']=date("Y-m-d H:i:s");
        $_POST['status']=1;
        $ret = D('Goods')->updateGoods($_POST);
//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret) {
            return show(0,'删除失败');
        }else {
            $index = A('Log');
            $id=$_POST['id'];
            if (session('adminUser.account')!=null) {
                $index->addLog("删除商品ID为：$id 的商品", session('adminUser.account'));
            }else {
                $index->addLog("删除商品ID为：$id 的商品", session('User.name'));
            }
            return show(1, '删除成功');
        }
    }

    //录入商品页面
    public function add(){
        $this->display();
    }
    //录入商品处理
    public function addGoods(){
        //dump($_POST);
        date_default_timezone_set("Asia/Shanghai");
        $_POST['create_time']=date("Y-m-d H:i:s");
        $_POST['number']="G".str_pad(rand(0,9999),4,'0',STR_PAD_LEFT);
        $goods=D('Goods')->getName();
        foreach ($goods as $v){
            if ($v==$_POST['name'])
                return show(0,'商品已存在，请重新录入');
        }
        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        $ret = D('Goods')->addGoods($_POST);
        //dump($ret); //成功返回一个数组，失败返回NULL
        if(!$ret) {
            return show(0,'录入失败');
        }else {
            $index = A('Log');
            $number=$_POST['number'];
            if (session('adminUser.account')!=null) {
                $index->addLog("生成商品编号为：$number 的商品", session('adminUser.account'));
            }else {
                $index->addLog("生成商品编号为：$number 的商品", session('User.name'));
            }
            return show(1, '录入成功');
        }
    }


}