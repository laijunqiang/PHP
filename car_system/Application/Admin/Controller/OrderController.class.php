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
        //获取商品信息
        $ret=D('Goods')->getGoods();
        $this->assign('ret',$ret);
        $this->display();
    }
    //生成订单处理
    public function addOrder(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['number']="O".date("YmdHis"); //订单编号
        $_POST['create_time']=date("Y-m-d H:i:s");//订单创建时间
        //获取商品ID
        $ret=D('Goods')->getIdByName($_POST['goods_name']);
        $_POST['goods_id']=$ret;
        //dump($_POST);
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

    //修改订单页面
    public function update(){
        $id=$_GET['id'];
//      如果查询出错，find方法返回false，如果查询结果为空返回NULL，查询成功则返回一个关联数组（键值是字段名或者别名）。
        $ret = D('Order')->showOrder($id);
        //在视图层可以通过{$ret.id}访问
        $this->assign('ret', $ret);
        $goods=D('Goods')->getGoods();
        $this->assign('goods',$goods);
        $car = D('Car')->getCar();
        $this->assign('car',$car);
        $driver = D('Driver')->getDriver();
        $this->assign('driver',$driver);
        $this->display();
    }
    //修改订单处理
    public function updateOrder(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");
        //dump($_POST); //成功返回一个数组，失败返回NULL
//      一有输出，ajax就会获取，但只能获取第一个输出
        //return没有效果，只是show()函数有exit输出，所以能接受
        //取出商品ID
        $_POST['goods_id']=D('Goods')->getIdByName($_POST['goods_name']);
        //取出车辆ID
        $_POST['car_id']=D('Car')->getIdByPlate($_POST['car_plate']);
        //取出司机ID
        $_POST['driver_id']=D('Driver')->getIdByNumber($_POST['driver_number']);
        $return = D('Order')->updateOrder($_POST);
//       save方法的返回值是影响的记录数，如果返回false则表示更新出错
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

    //查询订单信息
    public function select($status){
        //dump($status);
        if ($status==''){
            $ret = D('Order')->getOrder();
        } else {
            $ret = D('Order')->getOrderByStatus($status);
        }
        //dump($ret); //成功返回二维数组，失败返回NULL
        $this->assign('status',$status);
        $this->assign('ret', $ret);
        $this->display('index');
    }

    public function search($status,$searchTime){
        //dump($status);
        //dump($searchTime);
        $startTime=substr($searchTime,0,19);
        $endTime=substr($searchTime,22,19);
        if ($status==""&&$searchTime==""){
            $ret = D('Order')->getOrder();
        }else if ($status==""){  //按搜索时间搜索
            $data=array();
            $data['departure_time']=array('between',"$startTime,$endTime");
            $ret = D('Order')->getOrderBySearch($data);
        }else if ($startTime==""||$endTime==""){   //按状态搜索
            //dump($status);
            $ret = D('Order')->getOrderByStatus($status);
        }else{     //复合查询
            $data=array();
            $data['status']=0;
            $data['order_status']=$status;
            $data['departure_time']=array('between',"$startTime,$endTime");
            $ret = D('Order')->select($data);
        }
        //dump($ret); //成功返回二维数组，失败返回NULL
        $this->assign('status',$status);
        $this->assign('ret', $ret);
        $this->assign('searchTime',$searchTime);
        $this->display('index');

    }
    //导出Excel
    public  function getExcel($status,$searchTime){
        //dump($status==null);   $status为空串，===null。
        $startTime = substr($searchTime, 0, 19);
        $endTime = substr($searchTime, 22, 19);
        $fileName = "订单信息表";
        $headArr = array(
            "订单ID", "订单编号", "订单号", "商品", "数量", "创建时间", "出发时间", "车牌号", "目的地", "订单状态", "司机编号", "提货单号", "合同号", "缺货信息", "提货数量", "提货时间", "结算单位", "真实数量", "修改时间"
        );
        if ($status == "") {  //按搜索时间搜索
            $arr = array();
            $arr['departure_time'] = array('between', "$startTime,$endTime");
            $data = D('Order')->getOrderBySearchExcel($arr);

        } else if ($searchTime == "") {   //按状态搜索
            $arr['order_status'] = $status;
            $data = D('Order')->getOrderBySearchExcel($arr);
        } else {     //复合查询
            $arr = array();
            $arr['order_status'] = $status;
            $arr['departure_time'] = array('between', "$startTime,$endTime");
            $data = D('Order')->getOrderBySearchExcel($arr);
        }
//        用foreach来遍历数组，所操作的是指定数组的一个拷贝，而不是数组本身,所以可以通过引用
        foreach ($data as &$v) {
            if ($v['goods_quantity']) {
                $v['goods_quantity'] = $v['goods_quantity']."kg";
            }
            if ($v['pick_quantity']) {
                $v['pick_quantity'] = $v['pick_quantity']."kg";
            }
            if ($v['real_quantity']) {
                $v['real_quantity'] = $v['real_quantity']."kg";
            }
            if ($v['order_status'] == 0) {
                $v['order_status'] = "未接单";
            } elseif ($v['order_status'] == 1) {
                $v['order_status'] = "已接单";
            } elseif ($v['order_status'] == 2) {
                $v['order_status'] = "已结束";
            }
            unset($v);//必须释放$v，因为如果不释放的话，第二次循环时变成'&&v'出错，相当于[74] => &array(19)
        }
        //dump($data);
        /*$filename ============  导出表的名字 */
        /*$headArr============  导出表的第一行名称 */
        /*$data============  导出表的数据（array） */
        /*此方法不用刻意去修改，直接使用即可注意导入类时不要出错就行了 */
        //header("Content-type: text/html;charset=utf-8");
        //对数据进行检验
        if (empty($data) || !is_array($data)) {
            die("data must be a array");
        }
        //检查文件名
        if (empty($fileName)) {
            exit;
        }
        $date = date("Y_m_d", time());
        $fileName .= "_{$date}.xls";
        vendor("PHPExcel.PHPExcel");//直接放入vendor下引入
        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel(); //1：实例化PHPExcel类， 等同于在桌面上新建一个excel
        $objActSheet = $objPHPExcel->getActiveSheet();//获取当前活动sheet
        //设置表头
        $key = ord("A");//ord() 函数返回字符串的首个字符的 ASCII 值。
        //通过引用改变值
        foreach ($headArr as $v) {
            $colum = chr($key); //chr() 函数从指定的 ASCII 值返回字符。
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);//2：填充数据
            $key += 1;//66,67,68......
            //dump($key);
        }
        /*通过$array[$k]改变值
        foreach($array as $k => $v){
            $array[$k] = 1;
        }*/

        $column = 2;
        foreach ($data as $key => $rows) { //行写入
            $span = ord("A");
            foreach ($rows as $keyName => $value) {// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);//A2,B2,C2........填充数据
                $span++;
            }
            $column++;
        }
        ob_end_clean();//清除缓冲区,避免乱码
        $objPHPExcel->getActiveSheet()->setTitle('订单');
        //3：输出到浏览器
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');//Excel2003，即Excel5
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }
}