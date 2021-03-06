<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        if(!session('adminUser') && !session('User')) {
            $this->redirect('Login/index');
        }else {
            if (session('User')!=null){
                //所属角色
                $role=D('Role')->getRoleById($_SESSION['User']['role_id']);
                //通过角色查看权限
                //dump($role);
                $permission=explode("|", $role['permission']);
                //dump($permission);
                $this->assign('permission',$permission);
                //第一个页面
                $src='';
                if ($permission[0]==1){
                    $src=U('Order/index');
                }elseif ($permission[0]==2){
                    $src=U('Driver/index');
                }elseif ($permission[0]==3){
                    $src=U('Oil/index');
                }elseif ($permission[0]==4){
                    $src=U('User/index');
                }elseif ($permission[0]==5){
                    $src=U('Role/index');
                }elseif ($permission[0]==6){
                    $src=U('Permission/index');
                }elseif($permission[0]==7){
                    $src=U('Log/index');
                }else{
                    $src=U('Notice/index');
                }
                $this->assign('src',$src);
            }
//        ajax跳转时，有display的控制器的视图会被覆盖
        $this->display();
        }
    }
}