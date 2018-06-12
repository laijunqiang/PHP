<?php
namespace Admin\Controller;
use Think\Controller;
class PermissionController extends Controller {
    public function index(){
        $ret = D('Permission')->getPermission();
        //dump($ret);
        $this->assign('ret', $ret);
        $this->display();
    }
}