<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index(){
        $ret = D('Order')->getOrder();
        //dump($ret); //成功返回二维数组，失败返回NULL
        $this->assign('ret', $ret);
        //因为order是SQL的关键字,不能用它作表名或字段名
        $maxOrder= D('Order')->getMaxOrder();
        $this->assign('maxOrder',$maxOrder);
        $this->display();
    }
    //生成订单页面
    public function add(){
        //已知司机名，就可以知道他的车牌号与公司名
        /*$province=array('京', '津', '沪', '渝','冀', '豫','滇','辽','黑','湘','皖','鲁','新','苏','浙','赣','鄂','桂','甘','晋','蒙','陕','吉','闽','黔','粤','青','藏','蜀','宁','琼','台','港','澳');
        $city=range('A','Z');
        $this->assign('province', $province);
        $this->assign('city', $city);*/
        $driverName= D('Order')->getDriverName();
        //获得未排队的司机名
        $restDriverName= D('Driver')->getRestDriverName($driverName);
        $this->assign('restDriverName',$restDriverName);
        $this->display();
    }
    //获取油品信息
    public function getOilName(){
        $ret = D('Oil')->getNameByType($_POST['type']);
        exit(json_encode($ret));
    }
    //生成订单处理
    public function addOrder(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['number']="O".str_pad(rand(0,9999),4,'0',STR_PAD_LEFT);
        $_POST['create_time']=date("Y-m-d H:i:s");//订单创建时间
        //获取油品ID
        $oil_id=D('Oil')->getIdByName($_POST['oil_name']);
        $_POST['oil_id']=$oil_id;

        //获取司机相关信息
        $driver=D('Driver')->getDriverByName($_POST['driver_name']);
        $_POST['plate']=$driver['plate'];
        $_POST['driver_id']=$driver['id'];
        $_POST['driver_company']=$driver['company'];
        //获取排队次序最大值
        $maxOrderNumber=D('Order')->getMaxOrder();
        $_POST['order_number']=$maxOrderNumber+1;
        if ($_POST['order_number']==1){
            $_POST['order_status']=1;
        }elseif($_POST['order_number']==2){
            $_POST['order_status']=2;
        }else{
            $_POST['order_status']=3;
        }

        $return = D('Order')->addOrder($_POST);
        //dump($ret); //成功返回一个数组，失败返回NULL
        if (!$return) {
            return show(0, '生成车辆失败');
        } else {
            $index = A('Log');
            $number=$_POST['number'];
            if (session('adminUser.account')!=null) {
                $index->addLog("生成订单编号为：$number 的订单", session('adminUser.account'));
            }else {
                $index->addLog("生成订单编号为：$number 的订单", session('User.name'));
            }
            return show(1, '添加车辆成功');
        }
    }

    //删除订单处理
    public function deleteOrder(){

        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");
        $id=$_POST['id'];
        //通过订单ID获取个人订单信息
        $order= D('Order')->showOrder($_POST['id']);
        $order_number=$order['order_number']+1;
        $order1=  D('Order')->getOrderByOrderNumber($order_number);
        $order2= D('Order')->getOrderByOrderNumber($order_number+1);
        $order3=  D('Order')->getOrderByOrderNumber($order_number+2);

        $_POST['order_number']=$order['order_number']+3;
        if ($_POST['order_number']==1){
            $_POST['order_status']=1;
        }elseif($_POST['order_number']==2){
            $_POST['order_status']=2;
        }else{
            $_POST['order_status']=3;
        }
        $ret = D('Order')->updateOrder($_POST);

        //下一车辆上移
        for ($i=1;$i<=3;$i++) {
            $_POST['order_number'] = ${'order'.$i}['order_number']-1;
            $_POST['id'] = ${'order'.$i}['id'];
            if ($_POST['order_number'] == 1) {
                $_POST['order_status'] = 1;
            } elseif ($_POST['order_number'] == 2) {
                $_POST['order_status'] = 2;
            } else {
                $_POST['order_status'] = 3;
            }
            $return = D('Order')->updateOrder($_POST);
            if(!$return) {
                return show(0,'删除失败');
            }
        }

//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret) {
            return show(0,'删除失败');
        }else {
            $index = A('Log');
            if (session('adminUser.account')!=null) {
                $index->addLog("删除订单ID为：$id 的订单", session('adminUser.account'));
            }else {
                $index->addLog("删除订单ID为：$id 的订单", session('User.name'));
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
            $data['create_time']=array('between',"$startTime,$endTime");
            $ret = D('Order')->getOrderBySearch($data);
        }else if ($startTime==""||$endTime==""){   //按状态搜索
            //dump($status);
            $ret = D('Order')->getOrderByStatus($status);
        }else{     //复合查询
            $data=array();
            $data['status']=0;
            $data['order_status']=$status;
            $data['create_time']=array('between',"$startTime,$endTime");
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

    //下移功能
    public function down(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");
        $id=$_POST['id'];
        //通过订单ID获取个人订单信息
        $order= D('Order')->showOrder($_POST['id']);
        $order_number=$order['order_number']+1;
        $nextOrder=D('Order')->getOrderByOrderNumber($order_number);
        $_POST['order_number']=$order['order_number']+1;
        if ($_POST['order_number']==1){
            $_POST['order_status']=1;
        }elseif($_POST['order_number']==2){
            $_POST['order_status']=2;
        }else{
            $_POST['order_status']=3;
        }
        $ret = D('Order')->updateOrder($_POST);

        //下一车辆上移
        $_POST['order_number']=$order['order_number'];
        $_POST['id']=$nextOrder['id'];
        if ($_POST['order_number']==1){
            $_POST['order_status']=1;
        }elseif($_POST['order_number']==2){
            $_POST['order_status']=2;
        }else{
            $_POST['order_status']=3;
        }
        $return = D('Order')->updateOrder($_POST);

//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret||!$return) {
            return show(0,'下移失败');
        }else {
            $index = A('Log');
            if (session('adminUser.account')!=null) {
                $index->addLog("下移订单ID为：$id 的订单", session('adminUser.account'));
            }else {
                $index->addLog("下移订单ID为：$id 的订单", session('User.name'));
            }
            return show(1, '下移成功');
        }
    }
    //上移功能
    public function up(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");
        $id=$_POST['id'];
        //通过订单ID获取个人订单信息
        $order= D('Order')->showOrder($_POST['id']);
        $order_number=$order['order_number']-1;
        $nextOrder=D('Order')->getOrderByOrderNumber($order_number);
        $_POST['order_number']=$order['order_number']-1;
        if ($_POST['order_number']==1){
            $_POST['order_status']=1;
        }elseif($_POST['order_number']==2){
            $_POST['order_status']=2;
        }else{
            $_POST['order_status']=3;
        }
        $ret = D('Order')->updateOrder($_POST);

        //上一车辆下移
        $_POST['order_number']=$order['order_number'];
        $_POST['id']=$nextOrder['id'];
        if ($_POST['order_number']==1){
            $_POST['order_status']=1;
        }elseif($_POST['order_number']==2){
            $_POST['order_status']=2;
        }else{
            $_POST['order_status']=3;
        }
        $return = D('Order')->updateOrder($_POST);

//        save方法的返回值是影响的记录数，如果返回false则表示更新出错
        if(!$ret||!$return) {
            return show(0,'上移失败');
        }else {
            $index = A('Log');
            if (session('adminUser.account')!=null) {
                $index->addLog("上移订单ID为：$id 的订单", session('adminUser.account'));
            }else {
                $index->addLog("上移订单ID为：$id 的订单", session('User.name'));
            }
            return show(1, '上移成功');
        }
    }
    //暂停全部车辆排队
    public function stop()
    {
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time'] = date("Y-m-d H:i:s");
        //获得排队次序最大值
        $maxOrderNumber = D('Order')->getMaxOrder();

        //全部车辆下移
        for ($i = 1; $i <= $maxOrderNumber; $i++) {
            dump($i);
            $order = D('Order')->getOrderByOrderNumber($i);
            $_POST['order_number'] = $order['order_number'] + 1;
            $_POST['id'] = $order['id'];
            if ($_POST['order_number'] == 1) {
                $_POST['order_status'] = 1;
            } elseif ($_POST['order_number'] == 2) {
                $_POST['order_status'] = 2;
            } else {
                $_POST['order_status'] = 3;
            }
            dump($_POST);
            D('Order')->updateOrder($_POST);
        }
        exit;
        $index = A('Log');
        if (session('adminUser.account') != null) {
            $index->addLog("暂停全部车辆排队", session('adminUser.account'));
        } else {
            $index->addLog("暂停全部车辆排队", session('User.name'));
        }
        $this->redirect('Order/index');
    }

}