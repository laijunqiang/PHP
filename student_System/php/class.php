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
        public $result;
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
            $query="update t_admin set password='$password',update_time=now() where name='$name'";
            $this->result=$this->mysqli->query($query);
        }
//        管理学生信息
        public function stuSelect($id){
            $query="select number,name,sex,age from t_student where delete_time='0' and id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function stuLuru($number,$name,$sex,$age){
            $query="insert into t_student(number,name,sex,age,create_time) values('$number','$name','$sex','$age',now())";
            $this->result=$this->mysqli->query($query);
        }
        public function stuBianji($id,$number,$name,$sex,$age){
            $query="update t_student set number='$number',name='$name',sex='$sex',age='$age',update_time=now() where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function stuDele($id){
            $query="update t_student set delete_time=now() where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
//        不区分大小写，like
        public function stuChaxun($chaxun){
            $query="select id,number,name,sex,age,create_time,update_time from t_student where (number like '%$chaxun%'or name like '%$chaxun%') and delete_time='0'";
            $this->result=$this->mysqli->query($query);
        }

//        管理课程信息
        public function couSelect($id){
            $query="select number,name,credit,time from t_course where delete_time='0' and id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function couLuru($number,$name,$credit,$time){
            $query="insert into t_course(number,name,credit,time,create_time) values('$number','$name','$credit','$time',now())";
            $this->result=$this->mysqli->query($query);
        }
        public function couBianji($id,$number,$name,$credit,$time){
            $query="update t_course set number='$number',name='$name',credit='$credit',time='$time',update_time=now() where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function couDele($id){
            $query="update t_course set delete_time=now() where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function couChaxun($chaxun){
            $query="select id,number,name,credit,time,create_time,update_time from t_course where (number like '%$chaxun%' or name like '%$chaxun%') and delete_time='0'";
            $this->result=$this->mysqli->query($query);
        }

//        管理成绩信息
        public function scoLuru($student_id,$course_id,$score){
            $query="insert into t_score(student_id,course_id,score,create_time) values('$student_id','$course_id','$score',now())";
            $this->result=$this->mysqli->query($query);
        }

//        查询学生学习成绩
        public function  select($number){
            $query="select t_student.number,t_student.`name`,t_course.`name`,t_score.score from t_student,t_course,t_score where t_student.number like '%$number%' and t_student.id=t_score.student_id and t_course.id=t_score.course_id and t_student.delete_time=0 and t_course.delete_time='0'";
            $this->result=$this->mysqli->query($query);
        }

//        管理任课老师信息
        public function teaSelect($id){
            $query="select number,password,name from t_teacher where delete_time='0' and id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function teaLuru($number,$password,$name){
            $query="insert into t_teacher(number,password,name,create_time) values('$number','$password','$name',now())";
            $this->result=$this->mysqli->query($query);
        }
        public function teaBianji($id,$number,$password,$name){
            $query="update t_teacher set number='$number',password='$password',name='$name',update_time=now() where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function teaDele($id){
            $query="update t_teacher set delete_time=now() where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
    }



