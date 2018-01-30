<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/29
 * Time: 15:28
 */
    //连接数据库db_student_system,并插入数据
/*    $mysqli=new mysqli("localhost","root","root","db_student_system");
    $query="insert into t_admin(id,name,password,create_time) values(1,'张老师','123456',now()),(2,'李老师','123456',now()),(3,'林老师','123456',now())";
    $result=$mysqli->query($query);
    $query="insert into t_student(number,name,sex,age,create_time) values('1514080901201','张三',1,'1995-01-01',now()),('1514080901202','李四',0,'1995-01-02',now()),('1514080901203','王五',1,'1995-01-03',now())";
    $result=$mysqli->query($query);
    $query="insert into t_course(number,name,credit,time,create_time) values('A001','php',2,'2019-3-1',now()),('A002','java',2,'2019-3-2',now()),('A003','c++',2,'2019-3-1',now())";
    $result=$mysqli->query($query);
    $query="insert into t_score(student_id,course_id,score,create_time) values(1,1,85.5,now()),(2,1,90.5,now()),(3,3,95,now())";
    $result=$mysqli->query($query);*/


//  admin类
    class admin
    {
        private $password;
        private $mysqli;
        private $result;
        //构造函数
        function __construct()
        {
            $this->mysqli=new mysqli("localhost","root","root","db_student_system");
        }
        //数据库查询
        function query($sql){
            $this->result=$this->mysqli->query($sql);
            return $this->result;
        }
        //修改密码
        public function setPassword($name,$password)
        {
            $this->password=$password;
            $query="update t_admin set password='$password' where name='$name'";
            $this->result=$this->mysqli->query($query);
        }
    }



