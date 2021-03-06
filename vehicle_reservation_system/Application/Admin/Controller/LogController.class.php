<?php
namespace Admin\Controller;
use Think\Controller;
//Common模块和普通模块一样，可以添加控制器、模型和视图，并且支持多层，但不能直接访问，只能继承，其中模型层可以作为公用模型，在D方法实例化中调用。
//Common公共模块（不能直接访问）
class LogController extends Controller {
    public function index()
    {
        $count= D('Log')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(5)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = D('Log')->getLog($Page);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板

    }

    //录入日志处理
    public function addLog($log, $user)
    {
        $time=date("Y-m-d H:i:s");
        $data = array(
            'user' => $user, //用户ID
            'log' => $log, //操作内容
            'time' => $time //操作时间
        );
        D('Log')->addLog($data);
    }

    //删除日志处理
    public function deleteLog(){
        //dump($_POST);
        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        date_default_timezone_set("Asia/Shanghai");
        $_POST['delete_time']=date("Y-m-d H:i:s");
        $_POST['status']=1;
        $ret = D('Log')->deleteLog($_POST);
//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret) {
            return show(0,'删除失败');
        }else {
            $index = A('Log');
            $id=$_POST['id'];
            if (session('adminUser.account')!=null) {
                $index->addLog("删除日志ID为：$id 的日志", session('adminUser.account'));
            }else {
                $index->addLog("删除日志ID为：$id 的日志", session('User.name'));
            }
            return show(1, '删除成功');
        }
    }
    //批量删除日志处理
    public function deleteAllLog(){
        //dump($_POST);
        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        date_default_timezone_set("Asia/Shanghai");
        $_POST['delete_time']=date("Y-m-d H:i:s");
        $_POST['status']=1;
        $_POST['id']  = array('in',$_POST['arr']);
        $ret = D('Log')->deleteLog($_POST);
//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret) {
            return show(0,'删除失败');
        }else {
            $index = A('Log');
            $id=implode(",", $_POST['arr']);
            if (session('adminUser.account')!=null) {
                $index->addLog("删除日志ID为：$id 的日志", session('adminUser.account'));
            }else {
                $index->addLog("删除日志ID为：$id 的日志", session('User.name'));
            }
            return show(1, '删除成功');
        }
    }
}
