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
            return show(0,'用户名不能为空');
        }
        if (!trim($password)){
            return show(0,'密码不能为空');
        }
    }
}