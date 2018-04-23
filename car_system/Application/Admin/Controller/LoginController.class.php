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

        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        $ret = D('Admin')->getAdminByAccount($account); //find()得到一维数组
        $return=D('Driver')->getDriverByAccount($account);
        $driver=D('Role')->getRoleByDriverId($return['id']);

        //dump($ret); //成功返回一个数组，失败返回NULL
        if ($ret!=null&&$ret['password'] == getMd5Password($password)){
            //系统提供了Session管理和操作的完善支持，全部操作可以通过一个内置的session函数完成
            //该函数可以完成Session的设置、获取、删除和管理操作。
            session('adminUser', $ret);
            //dump($_SESSION['adminUser']['account']);
            //登录成功,写入日志
            $index = A('Log');//A 方法用于实例化其他模块（当于 new 关键字），模块被实例化之后，就可以以对象的方式调用模块内的操作。
            $index->addLog("登录系统", session('adminUser.account'));//二维数组取值

            return show(1, '登录成功');
        }elseif($ret!=null&&$ret['password'] != getMd5Password($password)){
            return show(0,'密码错误');
        }elseif ($driver!=null&&$return['password'] == getMd5Password($password)){
            session('adminUser', $driver);
            $index = A('Log');
            $index->addLog("登录系统", session('adminUser.driver_name'));
            return show(1, '登录成功');
        }elseif ($driver!=null&&$ret['password'] != getMd5Password($password)){
            return show(0,'密码错误');
        }else {
            return show(0,'该用户不存在');
        }
    }

    //退出登录清除用户SESSION相关信息
    public function loginout() {
        //dump(session('adminUser.account'));
        $index = A('Log');
        if (session('adminUser.account')!=null) {
            $index->addLog("退出系统", session('adminUser.account'));
        }else {
            $index->addLog("退出系统", session('adminUser.driver_name'));
        }
        session('adminUser', null);
/*        redirect方法的参数用法和U函数的用法一致，U('地址表达式',['参数'],['伪静态后缀'],['显示域名'])
        地址表达式的格式定义如下：
        [模块/控制器/操作#锚点@域名]?参数1=值1&参数2=值2...
        如果不定义模块的话 就表示当前模块名称*/
        $this->redirect('Admin/login/index');
    }
}