<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index(){
        //dump($stop);
        $ret = D('Order')->getOrder();
        //dump($ret); //成功返回二维数组，失败返回NULL
        $this->assign('ret', $ret);
        //因为order是SQL的关键字,不能用它作表名或字段名
        $maxOrder= D('Order')->getMaxOrder();
        //dump($maxOrder[0]['maxorder']);
        $this->assign('maxOrder',$maxOrder[0]['maxorder']);

        /*      var_dump(__ROOT__);          "/laijunqiang/vehicle_reservation_system"
        var_dump(__PUBLIC__);        "__PUBLIC__"
        var_dump($_SERVER['DOCUMENT_ROOT'] );   "/www/web/yijiangbangtest_wsandos_com/public_html"*/

//      $_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt"
        $fp = fopen($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt",'r');//打开文件
        if(file_exists($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt")){//当文件存在时，才读取内容
            $stop = fgetc($fp);//每执行一次fgetc()，文件指针就向后移动一位
        }else{
            echo "文件不存在！" ;
        }
        fclose($fp);
        //dump($stop);
        $this->assign('stop',$stop);
        $this->display();
    }
    //生成订单页面
    public function add(){
        //已知司机名，就可以知道他的车牌号与公司名
        /*$province=array('京', '津', '沪', '渝','冀', '豫','滇','辽','黑','湘','皖','鲁','新','苏','浙','赣','鄂','桂','甘','晋','蒙','陕','吉','闽','黔','粤','青','藏','蜀','宁','琼','台','港','澳');
        $city=range('A','Z');
        $this->assign('province', $province);
        $this->assign('city', $city);*/
        $driverName=array();
        $ret= D('Order')->getDriverName();
        foreach ($ret as $value){
            $driverName[]=$value['name'];
        }
        //获得未排队的司机名（已完善信息的司机）
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

        $order=array();
        //获取司机信息
        $driver=D('Driver')->getDriverByName($_POST['driver_name']);
        $_POST['driver_id']=$driver['id'];
        $order['openid']=$driver['openid'];
        $order['plate']=$driver['plate'];
        $order['driver_company']=$driver['company'];
        $order['phone']=$driver['phone'];

        //获取排队次序最大值
        $maxOrderNumber=D('Order')->getMaxOrder();
        $_POST['order_number']=$maxOrderNumber[0]['maxorder']+1;
        if ($_POST['order_number']==1){
            $_POST['order_status']=1;
            $status="装车中";
        }elseif($_POST['order_number']==2){
            $_POST['order_status']=2;
            $status="厂内待装";
        }else{
            $_POST['order_status']=3;
            $status="厂外待装";
        }

        $return = D('Order')->addOrder($_POST);
        //dump($ret); //成功返回一个数组，失败返回NULL
        if (!$return) {
            return show(0, '生成车辆失败');
        } else {
            sendTemplate($order['openid'],$status,$_POST['oil_type'],$order['plate'],$order['driver_company'],$order['phone']);
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
        $res = D('Order')->getOrderById($_POST['id']);
        //下一车辆上移
        //比较运算符优先级比算术运算符低
        //$res['order_number']+3 不能被重新赋值
        for ($i=$res['order_number']+1;$i<= $res['order_number']+3;$i++) {
            $data=array();
            date_default_timezone_set("Asia/Shanghai");
            $data['update_time']=date("Y-m-d H:i:s");
            $order = D('Order')->getOrderByOrderNumber($i);
            $data['id']=$order['id'];
            $data['order_number'] = $order['order_number'] - 1;
            if ($data['order_number'] == 1) {
                $data['order_status'] = 1;
                $status = "厂内待装";
            } elseif ($data['order_number'] == 2) {
                $data['order_status'] = 2;
                $status = "厂内待装";
            } else {
                $data['order_status'] = 3;
                $status = "厂外待装";
            }
            $return = D('Order')->updateOrder($data);
            if (!$return){
                return show(0,'删除失败！');
            }else{
                if($data['order_number']==1||$data['order_number']==2){
                    sendTemplate($order['openid'],$status,$order['oil_type'],$order['plate'],$order['company'],$order['phone']);
                }
            }
        }

        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");
        //通过订单ID获取个人订单信息
        $order= D('Order')->getOrderById($_POST['id']);
        //判断删除前的状态
        if ($order['order_number']==1){
            $order_status=1;
        }elseif($order['order_number']==2){
            $order_status=2;
        }else{
            $order_status=3;
        }
        $_POST['order_number']=$order['order_number']+3;
        if ($_POST['order_number']==1){
            $_POST['order_status']=1;
            $nowStatus="厂内待装";
        }elseif($_POST['order_number']==2){
            $_POST['order_status']=2;
            $nowStatus="厂内待装";
        }else{
            $_POST['order_status']=3;
            $nowStatus="厂外待装";
        }
        $ret = D('Order')->updateOrder($_POST);
        if(!$ret){
            return show(0,'删除失败');
        }else {
            //判断删除前状态是否与删除后状态相同
            if ($_POST['order_number'] != $order_status) {
                sendTemplate($order['openid'], $nowStatus, $order['oil_type'], $order['plate'], $order['company'], $order['phone']);
            }
            $index = A('Log');
            $id=$_POST['id'];
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
        $maxOrder= D('Order')->getMaxOrder();
        //dump($maxOrder);
        $this->assign('maxOrder',$maxOrder[0]['maxorder']);
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
            $ret = D('Order')->getOrderBySearch($startTime,$endTime);
        }else if ($startTime==""||$endTime==""){   //按状态搜索
            //dump($status);
            $ret = D('Order')->getOrderByStatus($status);
        }else{     //复合查询
            $ret = D('Order')->select($status,$startTime,$endTime);
        }
        $maxOrder= D('Order')->getMaxOrder();
        //dump($maxOrder);
        $this->assign('maxOrder',$maxOrder[0]['maxorder']);
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
        $fileName = "排队信息表";
        $headArr = array(
            "订单ID", "订单编号", "油品名称", "油品类型", "车牌号", "真实姓名", "隶属公司", "订单状态", "排队次序","创建时间","修改时间"
        );

        $data = D('Order')->getOrderBySearchExcel($status,$startTime,$endTime);

//        用foreach来遍历数组，所操作的是指定数组的一个拷贝，而不是数组本身,所以可以通过引用
        foreach ($data as &$v) {
            if ($v['order_status']==0) {
                $v['order_status'] ="已装";
            }elseif ($v['order_status']==1) {
                $v['order_status'] ="装车中";
            }elseif ($v['order_status']==2) {
                $v['order_status'] ="厂内待装";
            }else{
                $v['order_status'] ="厂外待装";
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

    //修改车辆顺序页面
    public function update(){
        $id=$_GET['id'];
        $ret = D('Order')->getOrderById($id);
        $this->assign("ret",$ret);
        $restOrderNumber = D('Order')->getRestOrderNumber($ret['order_number']);
        $this->assign("restOrderNumber",$restOrderNumber);
        $this->display();
    }

    //修改车辆顺序
    public function updateOrder(){
        //分两种情况，范围内上移和下移
        if ($_POST['oldOrderNumber']<$_POST['newOrderNumber']){
            for ($i=$_POST['oldOrderNumber']+1;$i<=$_POST['newOrderNumber'];$i++) {
                $order = D('Order')->getOrderByOrderNumber($i);
                $data=array();
                date_default_timezone_set("Asia/Shanghai");
                $data['update_time']=date("Y-m-d H:i:s");
                $data['id']=$order['id'];
                $data['order_number']=$order['order_number']-1;
                if ($data['order_number']==1){
                    $data['order_status']=1;
                    $status="装车中";
                }elseif($data['order_number']==2){
                    $data['order_status']=2;
                    $status="厂内待装";
                }else{
                    $data['order_status']=3;
                    $status="厂外待装";
                }
                $return = D('Order')->updateOrder($data);
                if (!$return){
                    return show(0,'修改顺序失败！');
                }else{
                    if($data['order_number']==1||$data['order_number']==2){
                        sendTemplate($order['openid'],$status,$order['oil_type'],$order['plate'],$order['company'],$order['phone']);
                    }
                }
            }
        }else{
            for ($i=$_POST['oldOrderNumber']-1;$i>=$_POST['newOrderNumber'];$i--) {
                $order = D('Order')->getOrderByOrderNumber($i);
                $data=array();
                $data['id']=$order['id'];
                $data['order_number']=$order['order_number']+1;
                if ($data['order_number']==1){
                    $data['order_status']=1;
                    $status="装车中";
                }elseif($data['order_number']==2){
                    $data['order_status']=2;
                    $status="厂内待装";
                }else{
                    $data['order_status']=3;
                    $status="厂外待装";
                }
                $return = D('Order')->updateOrder($data);
                if (!$return){
                    return show(0,'修改顺序失败！');
                }else{
                    if($data['order_number']==2||$data['order_number']==3){
                        sendTemplate($order['openid'],$status,$order['oil_type'],$order['plate'],$order['company'],$order['phone']);
                    }
                }
            }
        }
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time']=date("Y-m-d H:i:s");
        //判断修改前的状态
        if ($_POST['oldOrderNumber']==1){
            $order_status=1;
        }elseif($_POST['oldOrderNumber']==2){
            $order_status=2;
        }else{
            $order_status=3;
        }
        //判断修改后的状态
        if ($_POST['newOrderNumber']==1){
            $_POST['order_status']=1;
            $status="装车中";
        }elseif($_POST['newOrderNumber']==2){
            $_POST['order_status']=2;
            $status="厂内待装";
        }else{
            $_POST['order_status']=3;
            $status="厂外待装";
        }
        $_POST['order_number']=$_POST['newOrderNumber'];
        $ret = D('Order')->updateOrder($_POST);
        if (!$ret){
            return show(0,'修改顺序失败！');
        }else{
            if($_POST['order_status']!=$order_status){
                $order=D('Order')->getOrderById($_POST['id']);
                sendTemplate($order['openid'],$status,$order['oil_type'],$order['plate'],$order['company'],$order['phone']);
            }
            $index = A('Log');
            $id=$_POST['id'];
            if (session('adminUser.account')!=null) {
                $index->addLog("修改订单ID为：$id 的订单", session('adminUser.account'));
            }else {
                $index->addLog("修改订单ID为：$id 的订单", session('User.name'));
            }
            return show(1, '修改顺序成功！');
        }
    }
    //暂停全部车辆排队
    public function stop(){
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time'] = date("Y-m-d H:i:s");
        //获得排队次序最大值
        $maxOrderNumber = D('Order')->getMaxOrder();
        //获得排队次序最小值
        $minOrderNumber = D('Order')->getMinOrder();

        //全部车辆下移
        for ($i = $maxOrderNumber[0]['maxorder'];$i >=$minOrderNumber[0]['minorder'];$i--) {
            $order = D('Order')->getOrderByOrderNumber($i);
            $data=array();
            $data['order_number'] = $order['order_number']+1;
            $data['id'] = $order['id'];
            if ($data['order_number'] == 1) {
                $data['order_status'] = 1;
                $status="装车中";
            } elseif ($data['order_number'] == 2) {
                $data['order_status'] = 2;
                $status="厂内待装";
            } else {
                $data['order_status'] = 3;
                $status="厂外待装";
            }

            $ret=D('Order')->updateOrder($data);
            if (!$ret){
                return show(0,'暂停失败！');
            }else{
                if($data['order_number']==2||$data['order_number']==3){
                    sendTemplate($order['openid'],$status,$order['oil_type'],$order['plate'],$order['company'],$order['phone']);
                }
            }
        }

        $fp = fopen($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt",'w');
        $ret=fwrite($fp,'1');
        if (!$ret){
            echo "写入出现错误！";
        }
        fclose($fp);

        $index = A('Log');
        if (session('adminUser.account') != null) {
            $index->addLog("暂停全部车辆排队", session('adminUser.account'));
        } else {
            $index->addLog("暂停全部车辆排队", session('User.name'));
        }
        //$this->index();//可以调用index方法，但是index方法中的$this->display()展示的是stop.html
        //重定向到New模块的Category操作，可以传参数
        //$this->redirect('New/category', array('cate_id' => 2), 5, '页面跳转中...');
        $this->redirect('Order/index');
    }

    //恢复全部车辆排队
    public function start()
    {
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time'] = date("Y-m-d H:i:s");
        //获得排队次序最大值
        $maxOrderNumber = D('Order')->getMaxOrder();
        //获得排队次序最小值
        $minOrderNumber = D('Order')->getMinOrder();

        //全部车辆下移
        for ($i = $minOrderNumber[0]['minorder'];$i <=$maxOrderNumber[0]['maxorder'];$i++) {
            $order = D('Order')->getOrderByOrderNumber($i);
            $data=array();
            $data['order_number'] = $order['order_number']-1;
            $data['id'] = $order['id'];
            if ($data['order_number'] == 1) {
                $data['order_status'] = 1;
                $status="装车中";
            } elseif ($data['order_number'] == 2) {
                $data['order_status'] = 2;
                $status="厂内待装";
            } else {
                $data['order_status'] = 3;
                $status="厂外待装";
            }

            $ret=D('Order')->updateOrder($data);
            if (!$ret){
                return show(0,'恢复失败！');
            }else{
                if($data['order_number']==1||$data['order_number']==2){
                    sendTemplate($order['openid'],$status,$order['oil_type'],$order['plate'],$order['company'],$order['phone']);
                }
            }
        }

        $fp = fopen($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt",'w');
        $ret=fwrite($fp,'0');
        if (!$ret){
            echo "写入出现错误！";
        }
        fclose($fp);

        $index = A('Log');
        if (session('adminUser.account') != null) {
            $index->addLog("恢复全部车辆排队", session('adminUser.account'));
        } else {
            $index->addLog("恢复全部车辆排队", session('User.name'));
        }
        //$this->index();//可以调用index方法，但是index方法中的$this->display()展示的是stop.html
        $this->redirect('Order/index');
    }
    //装车完成
    public function over()
    {
        date_default_timezone_set("Asia/Shanghai");
        $_POST['update_time'] = date("Y-m-d H:i:s");
        $_POST['order_status'] = 0;
        $_POST['order_number'] = null;//string(0) ""转换整形为 int(0)
        $ret = D('Order')->updateOrder($_POST);
        if (!$ret) {
            return show(0, '装车完成失败');
        } else {
            //推送装车完成通知
//          通过订单ID查看订单信息,再通过司机名查看司机信息
            $order=D('Order')->getOrderById($_POST['id']);
            sendTemplate($order['openid'],"已装",$order['oil_type'],$order['plate'],$order['company'],$order['phone']);
            //获得排队次序最大值
            $maxOrderNumber = D('Order')->getMaxOrder();
            //全部车辆上移
            for ($i = 2; $i <= $maxOrderNumber[0]['maxorder']; $i++) {
                //dump($i);
                $order = D('Order')->getOrderByOrderNumber($i);
                $_POST['order_number'] = $order['order_number'] - 1;
                $_POST['id'] = $order['id'];
                if ($_POST['order_number'] == 1) {
                    $_POST['order_status'] = 1;
                    $status="装车中";
                } elseif ($_POST['order_number'] == 2) {
                    $_POST['order_status'] = 2;
                    $status="厂内待装";
                } else {
                    $_POST['order_status'] = 3;
                    $status="厂外待装";
                }
                //dump($_POST);
                $ret=D('Order')->updateOrder($_POST);
                if (!$ret){
                    return show(0, '装车完成失败');
                }else {
                    if ($i < 4) {
                        sendTemplate($order['openid'], $status, $order['oil_type'], $order['plate'], $order['company'], $order['phone']);
                    }
                }
            }
            //exit;
            $index = A('Log');
            if (session('adminUser.account') != null) {
                $index->addLog("暂停全部车辆排队", session('adminUser.account'));
            } else {
                $index->addLog("暂停全部车辆排队", session('User.name'));
            }
            //$this->index();//可以调用index方法，但是index方法中的$this->display()展示的是stop.html
            return show(1, '装车完成');
        }
    }

}