<?php
namespace Admin\Controller;
use Think\Controller;
class DriverController extends Controller {
    public function index(){
        $ret = D('Driver')->getDriver();
        //dump($ret);
        $this->assign('ret', $ret);
        $this->display();
    }

    //修改司机页面
    public function update(){
        $id=$_GET['id'];
//      如果查询出错，find方法返回false，如果查询结果为空返回NULL，查询成功则返回一个关联数组（键值是字段名或者别名）。
        $ret = D('Driver')->showDriver($id);
        //在视图层可以通过{$ret.id}访问
        $this->assign('ret', $ret);
        $this->display();
    }
    //修改司机处理
    public function updateDriver(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");
        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        $_POST['password']=getMd5Password($_POST['password']);
        $ret = D('Driver')->updateDriver($_POST);
//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret) {
            return show(0,'修改司机失败');
        }else {
            $index = A('Log');
            $number=$_POST['number'];
            if (session('adminUser.account')!=null) {
                $index->addLog("修改订单编号为：$number 的用户", session('adminUser.account'));
            }else {
                $index->addLog("修改订单编号为：$number 的用户", session('adminUser.driver_name'));
            }
            return show(1, '修改司机成功');
        }
    }
    //删除司机处理
    public function deleteDriver(){

        date_default_timezone_set("Asia/Shanghai");
        $_POST['delete_time']=date("Y-m-d H:i:s");
        $_POST['status']=1;
        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        $ret = D('Driver')->deleteDriver($_POST);
//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret) {
            return show(0,'删除失败');
        }else {
            $index = A('Log');
            $id=$_POST['id'];
            if (session('adminUser.account')!=null) {
                $index->addLog("删除司机ID为：$id 的用户", session('adminUser.account'));
            }else {
                $index->addLog("删除司机ID为：$id 的用户", session('adminUser.driver_name'));
            }
            return show(1, '删除成功');
        }
    }

    //录入司机页面
    public function add(){
        $this->display();
    }
    //录入司机处理
/*    public function addDriver(){
        //dump($_POST);
        date_default_timezone_set("Asia/Shanghai");
        $_POST['number']=date("His");
        $_POST['create_time']=date("Y-m-d H:i:s");
        $_POST['password']=getMd5Password($_POST['password']);

        $ret = D('Driver')->addDriver($_POST);
        //dump($ret); //成功返回一个数组，失败返回NULL
        if(!$ret) {
            return show(0,'录入失败');
        }else {
            $index = A('Log');
            $number=$_POST['number'];
            if (session('adminUser.account')!=null) {
                $index->addLog("生成司机编号为：$number 的用户", session('adminUser.account'));
            }else {
                $index->addLog("生成司机编号为：$number 的用户", session('adminUser.driver_name'));
            }
            return show(1, '录入成功');
        }
    }
    */

    //上传图片处理，from表单上传<form action="/admin.php/Driver/upload" enctype="multipart/form-data" method="post" >
    public function upload()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->autoSub = false;
        $upload->rootPath = './'; // 设置文件上传保存的根路径
        $upload->savePath = 'Public/image/'; // 设置文件上传的保存路径（相对于根路径）
        // 上传文件
        /*如果没有参数的话，会获取$_FILES
        public function upload($files='') {
        if('' === $files){
            $files  =   $_FILES;
        }*/
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功,photo为<input type="file" name="photo" />的photo
            $path = $info['photo']['savepath'] . $info['photo']['savename'];
            echo $path;
/*            $_POST['image']="/".$path; //图片路径
            date_default_timezone_set("Asia/Shanghai");
            $account=D('Driver')->getDriverAccount();
            foreach ($account as $v){
                if ($v==$_POST['account'])
                    $this->error('司机账号已被使用，请重新输入！');//错误页面的默认跳转页面是返回前一页，通常不需要设置
            }

            $_POST['number'] = date("His");
            $_POST['create_time'] = date("Y-m-d H:i:s");
            $_POST['password'] = getMd5Password($_POST['password']);
            $ret = D('Driver')->addDriver($_POST);
            //dump($ret); //成功返回一个数组，失败返回NULL
            if (!$ret) {
                $this->error('录入失败，请重新录入！');//错误页面的默认跳转页面是返回前一页，通常不需要设置
            } else {
                $index = A('Log');
                $number = $_POST['number'];
                if (session('adminUser.account') != null) {
                    $index->addLog("生成司机编号为：$number 的司机", session('adminUser.account'));
                } else {
                    $index->addLog("生成司机编号为：$number 的司机", session('adminUser.driver_name'));
                }
                $this->success('录入成功！','/admin.php/Driver');
            }*/
        }
    }

}