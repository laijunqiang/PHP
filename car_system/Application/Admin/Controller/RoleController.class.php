<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends Controller
{
    public function index()
    {
        $ret = D('Role')->getRole();
        //dump($ret);
        $this->assign('ret', $ret);
        $this->display();
    }

    //录入权限页面
    public function add()
    {
        //查询剩余司机用户信息
        $restName=D('Role')->getDriver();
        if ($restName==null){
            $restName='';   //当role表为空时，$restName为空数组，查询出错。$restName为空字符串，查询成功。
        }
        //var_dump($restName);
        $ret = D('Driver')->getRestDriver($restName);
        $this->assign('ret', $ret);
        //dump($ret);
        //查询权限信息
        $return = D('Role')->getRole();
        //dump($ret);
        $this->assign('return', $return);
        $this->display();
    }

    //录入权限处理
    public function addRole()
    {
        //dump($_POST);
        //获取司机用户的ID
        $ret = D('Driver')->getIdByName($_POST['driver_name']);
        if (!$ret) {
            return show(0, '录入失败');
        } else {
            $_POST['driver_id']=$ret;
            date_default_timezone_set("Asia/Shanghai");
            $_POST['create_time'] = date("Y-m-d H:i:s");
            /*D方法实例化模型类的时候通常是实例化某个具体的模型类
             当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
             D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
             如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
            $ret = D('Role')->addRole($_POST);
            //dump($ret); //成功返回一个数组，失败返回NULL
            if (!$ret) {
                return show(0, '录入失败');
            } else {
                return show(1, '录入成功');
            }
        }
    }

    //修改权限页面
    public function update(){
        $id=$_GET['id'];
//      如果查询出错，find方法返回false，如果查询结果为空返回NULL，查询成功则返回一个关联数组（键值是字段名或者别名）。
        $ret = D('Role')->showRole($id);
        //在视图层可以通过{$ret.id}访问
        $this->assign('ret', $ret);
        $this->display();
    }
    //修改权限处理
    public function updateRole(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");
        //dump($_POST);
        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
        当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
        D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
        如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        $return = D('Role')->updateRole($_POST);

//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if (!$return) {
            return show(0, '修改权限失败');
        } else {
            return show(1, '修改权限成功');
        }
    }

    //删除权限处理
    public function deleteRole(){
        //dump($_POST);
        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        date_default_timezone_set("Asia/Shanghai");
        $_POST['delete_time']=date("Y-m-d H:i:s");
        $_POST['status']=1;
        $ret = D('Role')->deleteRole($_POST);
//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret) {
            return show(0,'删除失败');
        }else {
            return show(1, '删除成功');
        }
    }
}