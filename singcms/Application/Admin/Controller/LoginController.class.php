<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->display();
    }
    public function check(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if (!trim($username)){
//在check()方法中是怎么调用function的show()方法的？？？？？
/*默认的公共函数文件位于公共模块 ./Application/Common 下，
访问所有的模块之前都会首先加载公共模块下面的配置文件（Conf/config.php）和公共函数文件（Common/function.php），
即默认的公共函数文件为 ./Application/Common/Common/function.php。*/
            return show(0,'用户名不能为空');
        }
        if (!trim($password)){
            return show(0,'密码不能为空');
        }
        $result=D('Admin')->getAdminByUsername($username);
/*  var_dump($result);如果不存在，则为空null。与之前的sql语句不同
    存在的话，返回一个数组 */
        if (!$result){
            return show(0,'该用户不存在');
        }
        if ($result['password']!=getMd5Password($password)){
            return show(0,'密码错误');
        }
//      session('name','value');session赋值
        session('admin',$result);
        return show(1,'登陆成功');
    }
}