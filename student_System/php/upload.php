<?php
header("Content-type:text/html;charset=utf-8");
include "class.php";
$sql=new Sql();
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

//  $file_type = $_FILES['myfile']['type']; 上传之后的文件类型 string(24) "application/octet-stream"
//  var_dump($_FILES['myfile']['name']);
//  array(2) { [0]=> string(5) "test2" [1]=> string(4) "xls" }
    $array=explode(".",$_FILES['myfile']['name']);
    $type=end($array);       //取出数组最后一个元素，即表格类型
//加载phpExcel的类
    require_once 'PHPExcel.php';
    require_once 'PHPExcel/IOFactory.php';
    require_once 'PHPExcel/Reader/Excel5.php';
    require_once 'PHPExcel/Reader/Excel2007.php';

    if ($type=='xls') {
//      2003以前的excel读取实例化excel5类，2003以后需要实例化excel2007类
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
    }else {
        $objReader = PHPExcel_IOFactory::createReader('excel2007');
    }
        //接收存在缓存中的excel表格
        $filename = $_FILES['myfile']['tmp_name'];
        $objPHPExcel = $objReader->load($filename); //$filename可以是上传的表格，或者是指定的表格。把EXCEL转化为对象
        $sheet = $objPHPExcel->getSheet(0);//取得excel工作sheet;取文件中的第一个表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        // $highestColumn = $sheet->getHighestColumn(); // 取得总列数
        if ($highestRow<2) {
            echo "<script>alert('数据为空，请重新上传！');window.location.href='student.php';</script>";
        }//循环读取excel表格,读取一条,插入一条
        //j表示从哪一行开始读取  从第二行开始读取，因为第一行是标题不保存
        //$a表示列号
        for ($j = 2; $j <= $highestRow; $j++) {
            $name = $objPHPExcel->getActiveSheet()->getCell("A" . $j)->getValue();//获取name列的值
            $sex = $objPHPExcel->getActiveSheet()->getCell("B" . $j)->getValue();//获取sex列的值
            $age = $objPHPExcel->getActiveSheet()->getCell("C" . $j)->getValue();//获取age列的值

            //EXCEL的是从1900-1-1日开始算的,单位是天数。24小时等于1。
            //时间值在EXCEL中本身就是用浮点数进行存储的。1995/12/25等于float(35058)
            //PHP 的时间函数是从1970-1-1日开始计算的，单位是秒数。1970-1-1是25569。
            $age=$age-25569;
            $age=date("Y-m-d",$age);

           //处理过程
            $age=str_replace('-','',$age);
            $number=$sql->number($sex,$age);

            $sql->studentInput($number,$name,$sex,$age);
            $result=$sql->result;
            if ($result==true) {
                echo "<script>alert('添加成功！');window.location.href='student.php';</script>";
            } else {
                echo "<script>alert('添加失败！');window.location.href='student.php';</script>";
            }
        }


