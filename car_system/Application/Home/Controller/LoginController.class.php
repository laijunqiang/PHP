<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        //后台先访问此处，判断是否存在SESSION
        if(session('driverUser')) {
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
        $ret = D('Driver')->getDriverByAccount($account);
        //dump($ret); //成功返回一个数组，失败返回NULL
        if(!$ret || $ret['status'] !=0) {
            return show(0,'该用户不存在');
        }elseif ($ret['password'] != getMd5Password($password)){
            return show(0,'密码错误');
        }else {
            //系统提供了Session管理和操作的完善支持，全部操作可以通过一个内置的session函数完成
            //该函数可以完成Session的设置、获取、删除和管理操作。
            session('driverUser', $ret['account']);
            return show(1, '登录成功');
        }
    }

    //退出登录清除用户SESSION相关信息
    public function loginout() {
        session('driverUser', null);
        /*        redirect方法的参数用法和U函数的用法一致，U('地址表达式',['参数'],['伪静态后缀'],['显示域名'])
                地址表达式的格式定义如下：
                [模块/控制器/操作#锚点@域名]?参数1=值1&参数2=值2...
                如果不定义模块的话 就表示当前模块名称*/
        $this->redirect('Login/index');
    }
}