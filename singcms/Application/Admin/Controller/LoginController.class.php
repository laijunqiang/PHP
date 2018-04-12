<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 * D方法实例化模型类的时候通常是实例化某个具体的模型类
当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。
 */

header("Content-type:text/html;charset=utf-8");
class LoginController extends Controller {

    public function index(){
        //后台先访问此处，判断是否存在SESSION
        if(session('adminUser')) {
           $this->redirect('/admin.php?c=index');
        }

        $this->display();
    }

    public function check() {

        $username = $_POST['username'];
        $password = $_POST['password'];
        //在服务器端强校验，较安全
        if(!trim($username)) {
            return show(0,'用户名不能为空');
        }
        if(!trim($password)) {
            return show(0,'密码不能为空');
        }
       /* D方法实例化模型类的时候通常是实例化某个具体的模型类
        当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
        D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
        如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        $ret = D('Admin')->getAdminByUsername($username);
      //dump($ret); //成功返回一个数组，失败返回NULL
        if(!$ret || $ret['status'] !=1) {
            return show(0,'该用户不存在');
        }

        if($ret['password'] != getMd5Password($password)) {
            return show(0,'密码错误');
        }

        D("Admin")->updateByAdminId($ret['admin_id'],array('lastlogintime'=>time()));
        //系统提供了Session管理和操作的完善支持，全部操作可以通过一个内置的session函数完成
        //该函数可以完成Session的设置、获取、删除和管理操作。
        session('adminUser', $ret);

        return show(1,'登录成功');


    }
//退出登录清除用户SESSION相关信息
    public function loginout() {
        session('adminUser', null);
        $this->redirect('/admin.php?c=login');
    }

}