<?php
header("Content-type:text/html;charset=utf-8");

//链接数据库
$mysqli=new mysqli("localhost","root","root","db_student_system");
!mysqli_connect_error() or die("连接失败！");

//判断表格是否上传成功
//is_uploaded_file() 函数判断指定的文件是否是通过 HTTP POST 上传的。如果 file 所给出的文件是通过 HTTP POST 上传的则返回 TRUE。
    if (!is_uploaded_file($_FILES['myfile']['tmp_name']))
    {
        echo "<script>alert('上传不能为空，请重新上传');window.location.href='student.php';</script>";
    }

//获取表格的大小，限制上传表格的大小5M
    $file_size = $_FILES['myfile']['size'];
    if ($file_size>5*1024*1024) {
        echo "<script>alert('上传失败，上传的表格不能超过5M的大小');window.location.href='student.php';</script>";
    }

//   $file_type = $_FILES['myfile']['type']; 上传之后的文件类型 string(24) "application/octet-stream"
//   var_dump($_FILES['myfile']['name']);
//  array(2) { [0]=> string(5) "test2" [1]=> string(4) "xls" }
    $array=explode(".",$_FILES['myfile']['name']);
    $type=end($array);       //取出数组最后一个元素，即表格类型
    if ($type=='xls') {
        require_once 'PHPExcel.php';
        require_once 'PHPExcel/IOFactory.php';
        require_once 'PHPExcel/Reader/Excel5.php';
        //以上三步加载phpExcel的类
//      2003以前的excel读取实例化excel5类，2003以后需要实例化excel2007类
        $objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
        //接收存在缓存中的excel表格
        $filename = $_FILES['myfile']['tmp_name'];
        $objPHPExcel = $objReader->load($filename); //$filename可以是上传的表格，或者是指定的表格。把EXCEL转化为对象
        $sheet = $objPHPExcel->getSheet(0);//取得excel工作sheet;取文件中的第一个表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        // $highestColumn = $sheet->getHighestColumn(); // 取得总列数

        //循环读取excel表格,读取一条,插入一条
        //j表示从哪一行开始读取  从第二行开始读取，因为第一行是标题不保存
        //$a表示列号
        for ($j = 2; $j <= $highestRow; $j++) {
            $a = $objPHPExcel->getActiveSheet()->getCell("A" . $j)->getValue();//获取number列的值
            $b = $objPHPExcel->getActiveSheet()->getCell("B" . $j)->getValue();//获取name列的值
            $c = $objPHPExcel->getActiveSheet()->getCell("C" . $j)->getValue();//获取sex列的值
            $d = $objPHPExcel->getActiveSheet()->getCell("D" . $j)->getValue();//获取age列的值


            //null 为主键id，自增可用null表示自动添加
            $sql = "INSERT INTO t_student(number,name,sex,age,create_time) VALUES('$a','$b','$c','$d',now())";
            $res = $mysqli->query($sql);
            if ($res) {
                echo "<script>alert('添加成功！');window.location.href='student.php';</script>";

            } else {
                echo "<script>alert('添加失败！');window.location.href='student.php';</script>";
            }
        }
    }

