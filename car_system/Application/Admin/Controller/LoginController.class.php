<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        //后台先访问此处，判断是否存在SESSION
        if(session('adminUser')) {
            $this->redirect('Index/index');
        }else {
            $this->display();
        }
    }

    public function check() {

        $account = $_POST['account'];
        $password = $_POST['password'];
        //超级管理员查询
        $ret = D('Admin')->getAdminByAccount($account); //find()得到一维数组
        //管理员查询
        $return=D('Driver')->getDriverByAccount($account);
        $driver=D('Role')->getRoleByDriverId($return['id']);

        //dump($ret); //成功返回一个数组，失败返回NULL
        if ($ret!=null&&$ret['password'] == getMd5Password($password)){
            //系统提供了Session管理和操作的完善支持，全部操作可以通过一个内置的session函数完成
            //该函数可以完成Session的设置、获取、删除和管理操作。
            session('adminUser', $ret);
            //dump($_SESSION['adminUser']['account']);
            //超级管理员登陆成功
            return show(1, '登录成功');
        }elseif($ret!=null&&$ret['password'] != getMd5Password($password)){
            //超级管理员密码错误
            return show(0,'密码错误，请重新登陆！');
        }elseif ($driver!=null&&$return['password'] == getMd5Password($password)){
            session('adminUser', $driver);
            return show(1, '登录成功');
        }elseif ($driver!=null&&$ret['password'] != getMd5Password($password)){
            //超级管理员密码错误
            return show(0,'密码错误，请重新登陆！');
        }else {
            //不存在此用户
            return show(0,'该用户不存在，请重新登陆！');
        }
    }

    //退出登录清除用户SESSION相关信息
    public function loginout() {
        //dump(session('adminUser.account'));
        session('adminUser', null);
/*        redirect方法的参数用法和U函数的用法一致，U('地址表达式',['参数'],['伪静态后缀'],['显示域名'])
        地址表达式的格式定义如下：
        [模块/控制器/操作#锚点@域名]?参数1=值1&参数2=值2...
        如果不定义模块的话 就表示当前模块名称*/
        $this->redirect('Admin/login/index');
    }
}