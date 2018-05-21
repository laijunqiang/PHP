<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        if(!session('driverUser')) {
            $this->redirect('Login/index');
        }else {
            $firstNotice=D('Notice')->getFirstNotice();
            $content=$firstNotice['content'];
            $this->assign('content',$content);
            $order=D('Order')->getOrdering();
            $this->assign('order',$order);
//            ajax跳转时，有display的控制器的视图会被覆盖
            $this->display();
        }
    }
    //通过油品类型查询排队信息
    public function selectType($type){
        $this->assign('type',$type);
        //dump($type);
        //获取油品名
        $name=D('Oil')->getNameByType($type);
        $this->assign('name',$name);
        $firstName=$name[0];
        //通过油品名获取排队信息
        $order = D('Order')->getOrderByName($firstName);
        $this->assign('order', $order);
        $firstNotice=D('Notice')->getFirstNotice();
        $content=$firstNotice['content'];
        $this->assign('content',$content);
        $this->display('index');
    }
    //通过油品名称查询排队信息
    public function selectName($name,$type){
        $this->assign('type',$type);
        $this->assign('oilName',$name);
        $order = D('Order')->getOrderByName($name);
        $this->assign('order', $order);
        $firstNotice=D('Notice')->getFirstNotice();
        $content=$firstNotice['content'];
        $this->assign('content',$content);
        $name=D('Oil')->getNameByType($type);
        $this->assign('name',$name);

        //通过油品名获取排队信息
        $this->display('index');
    }
    //搜索框搜索
    public function search($search){
        $this->assign('search',$search);
        $order=D('Order')->search($search);
        $this->assign('order',$order);
        $firstNotice=D('Notice')->getFirstNotice();
        $content=$firstNotice['content'];
        $this->assign('content',$content);
        $this->display('index');
    }

}