<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index(){
        $ret = D('Order')->getOrder();
        //dump($ret); //成功返回二维数组，失败返回NULL
        $this->assign('ret', $ret);
        $this->display();
    }
    //生成订单页面
    public function add(){
        $this->display();
    }
    //生成订单处理
    public function addOrder(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['number']=date("YmdHis"); //订单编号
        $_POST['create_time']=date("Y-m-d H:i:s");//订单创建时间
        $goods_number='goods'.$_POST['number'];
        $data=array(
            'number'=>$goods_number,
            'name'=>$_POST['goods_name'],
            'quantity'=>$_POST['goods_quantity'],
            'create_time'=>$_POST['create_time']
        );
        //dump($data);
        $ret = D('Goods')->addGoods($data);
        //dump($ret); //成功返回一个数组，失败返回NULL
        if(!$ret) {
            return show(0,'生成订单失败');
        }else {
            $ret=D('Goods')->getIdByNumber($data['number']);
            $_POST['goods_id']=$ret;
            /*D方法实例化模型类的时候通常是实例化某个具体的模型类
             当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
             D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
             如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
            $return = D('Order')->addOrder($_POST);
            //dump($ret); //成功返回一个数组，失败返回NULL
            if (!$return) {
                return show(0, '生成订单失败');
            } else {
                $index = A('Log');
                $number=$_POST['number'];
                if (session('adminUser.account')!=null) {
                    $index->addLog("生成订单编号为：$number 的订单", session('adminUser.account'));
                }else {
                    $index->addLog("生成订单编号为：$number 的订单", session('adminUser.driver_name'));
                }
                return show(1, '生成订单成功');
            }
        }
    }

    //修改订单页面
    public function update(){
        $id=$_GET['id'];
//      如果查询出错，find方法返回false，如果查询结果为空返回NULL，查询成功则返回一个关联数组（键值是字段名或者别名）。
        $ret = D('Order')->showOrder($id);
        //在视图层可以通过{$ret.id}访问
        $this->assign('ret', $ret);
        $this->display();
    }
    //修改订单处理
    public function updateOrder(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");
        $data=array(
            'id'=>$_POST['goods_id'],
            'name'=>$_POST['goods_name'],
            'quantity'=>$_POST['goods_quantity'],
            'update_time'=>$_POST['update_time']
        );
        $ret = D('Goods')->updateGoods($data);
        //dump($ret); //成功返回一个数组，失败返回NULL
//      一有输出，ajax就会获取，但只能获取第一个输出
        //return没有效果，只是show()函数有exit输出，所以能接受
        if(!$ret) {
            return show(0, '修改订单失败');
        }else {
            /*D方法实例化模型类的时候通常是实例化某个具体的模型类
             当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
             D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
             如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
            $return = D('Order')->updateOrder($_POST);
//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
            if (!$return) {
                return show(0, '修改订单失败');
            } else {
                $index = A('Log');
                $number=$_POST['number'];
                if (session('adminUser.account')!=null) {
                    $index->addLog("修改订单编号为：$number 的订单", session('adminUser.account'));
                }else {
                    $index->addLog("修改订单编号为：$number 的订单", session('adminUser.driver_name'));
                }
                return show(1, '修改订单成功');
            }
        }
    }
    //删除订单处理
    public function deleteOrder(){

        /*D方法实例化模型类的时候通常是实例化某个具体的模型类
         当 \Admin\Model\AdminModel 类不存在的时候，D函数会尝试实例化公共模块下面的 \Common\Model\AdminModel类。
         D方法可以自动检测模型类，如果存在自定义的模型类，则实例化自定义模型类，
         如果不存在，则会实例化系统的\Think\Model基类，同时对于已实例化过的模型，不会重复实例化。*/
        date_default_timezone_set("Asia/Shanghai");
        $_POST['delete_time']=date("Y-m-d H:i:s");
        $_POST['status']=1;
        $ret = D('Order')->deleteOrder($_POST);
//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret) {
            return show(0,'删除失败');
        }else {
            $index = A('Log');
            $id=$_POST['id'];
            if (session('adminUser.account')!=null) {
                $index->addLog("删除订单ID为：$id 的订单", session('adminUser.account'));
            }else {
                $index->addLog("删除订单ID为：$id 的订单", session('adminUser.driver_name'));
            }
            return show(1, '删除成功');
        }
    }

    //查询未接单的订单信息
    public function selectOrder($status){
        $ret = D('Order')->getOrderByStatus($status);
        //dump($ret); //成功返回二维数组，失败返回NULL
        $this->assign('status',$status);
        $this->assign('ret', $ret);
        $this->display('index');

    }
    //查询时间段内的订单信息
    public function searchOrder($startTime,$endTime){
        //dump($startTime);
        //dump($endTime);
        $data=array();
        $data['departure_time']=array('between',"$startTime,$endTime");
        //dump($data);
        $ret = D('Order')->getOrderBySearch($data);
        //dump($ret); //成功返回二维数组，失败返回NULL
        $this->assign('ret', $ret);
        $this->assign('startTime',$startTime);
        $this->assign('endTime',$endTime);
        $this->display('index');
    }

    //导出Excel
    public  function getExcel($startTime,$endTime){
        $fileName="订单信息表";
        $headArr=array(
            "订单ID","订单编号","订单号","商品","数量","创建时间","出发时间","车牌号","目的地","订单状态","司机编号","提货单号","合同号","缺货信息","提货数量","提货时间","结算单位","修改时间"
        );
        if ($startTime!=null&&$endTime!=null){
            $timeData=array();
            $timeData['departure_time']=array('between',"$startTime,$endTime");
            //dump($data);
            $data = D('Order')->getOrderBySearchExcel($timeData);
        }else {
            $data = D('Order')->getOrderExcel();
        }

        /*$fileName ============  导出表的名字 */
        /*$headArr============  导出表的第一行名称 */
        /*$data============  导出表的数据（array） */
        /*此方法不用刻意去修改，直接使用即可注意导入类时不要出错就行了 */
        //header("Content-type: text/html;charset=utf-8");
        //对数据进行检验
        if(empty($data) || !is_array($data)){
            die("data must be a array");
        }
        //检查文件名
        if(empty($fileName)){
            exit;
        }

        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";
        vendor("PHPExcel.PHPExcel");//直接放入vendor下引入
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }

        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                //$value=iconv("utf-8","gb2312",$value);
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }
        ob_end_clean();//清除缓冲区,避免乱码
        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header("Content-type: text/csv");//重要
        header("Content-Type: application/force-download");
        //header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        //header('Cache-Control: max-age=0');
        header('Cache-Control: must-revalidate, post-check=0,pre-check=0');
        header('Expires:0');
        header('Pragma:public');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }
}