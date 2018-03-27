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
    //设置时区
    date_default_timezone_set("PRC");
//  admin类
    class Sql
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

        //插入当前会话ID
        public function adminSession($sessionID,$name)
        {
            $query="update t_admin set session_id='$sessionID' where name='$name'";
            $this->result=$this->query($query);
        }
        public function teacherSession($sessionID,$name)
        {
            $query="update t_teacher set session_id='$sessionID' where number='$name'";
            $this->result=$this->query($query);
        }
        //查询当前会话ID
        public function adminSelectSession($name)
        {
            $query="select session_id from t_admin where name='$name'";
            $this->result=$this->query($query);
        }
        public function teacherSelectSession($number)
        {
            $query="select session_id from t_teacher where number='$number'";
            $this->result=$this->query($query);
        }

        //超级管理员和任课老师登陆查询
        public function adminLogin($name,$password)
        {
            $query="select * from t_admin where name='$name' and password='$password'";
            $this->result=$this->query($query);
        }
        public function teacherLogin($name,$password)
        {
            $query="select * from t_teacher where number='$name' and password='$password' and status=0";
            $this->result=$this->query($query);
        }
        public function logout($name)
        {
            $query="select * from t_admin where name='$name'";
            $this->result=$this->query($query);
        }

        //修改管理员与任课老师密码
        public function adminSetPassword($name,$password)
        {
            $this->password=$password;
            $query="update t_admin set password='$password',update_time=now() where name='$name'";
            $this->result=$this->mysqli->query($query);
        }
        public function teacherSetPassword($name,$password)
        {
            $this->password=$password;
            $query="update t_teacher set password='$password',update_time=now() where number='$name'";
            $this->result=$this->mysqli->query($query);
        }

//        管理学生信息
        public  function studentSelectId($name){
            $query="select id from t_student where name='$name' and status=0";
            $this->result=$this->mysqli->query($query);
        }
        public function studentSelect(){
            $query="select id,number,name,sex,age,create_time,update_time from t_student where status=0 order by id desc ";
            $this->result=$this->mysqli->query($query);
        }
        public function studentId($id){
            $query="select number,name,sex,age from t_student where status=0 and id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function studentInput($number,$name,$sex,$age){
            $query="insert into t_student(number,name,sex,age,create_time) values('$number','$name','$sex','$age',now())";
            $this->result=$this->mysqli->query($query);
        }
        public function studentEdit($id,$number,$name,$sex,$age){
            $query="update t_student set number='$number',name='$name',sex='$sex',age='$age',update_time=now() where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function studentDelete($id){
            $query="update t_student set delete_time=now(),status=1 where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
//        不区分大小写，like
        public function studentQuery($query){
            $query="select id,number,name,sex,age,create_time,update_time from t_student where (number like '%$query%'or name like '%$query%') and status=0";
            $this->result=$this->mysqli->query($query);
        }
        //学生性别转换，1表示男，0表示女
        public function sexChange($sex){
            if ($sex==1){
                return $sex='男';
            }else{
                return $sex='女';
            }
        }
        //年龄转换，当前年份-出生年份
        public function ageChange($age)
        {
            $age = substr($age, 0, 4);
            $date = date('Y');
            $age = $date - $age;
            return $age;
        }


//        管理课程信息
        public  function courseSelectId($name){
            $query="select id from t_course where name='$name' and status=0";
            $this->result=$this->mysqli->query($query);
        }
        public function courseSelect(){
            $query="select id,number,name,credit,time,create_time,update_time from t_course where status=0 order by id desc";
            $this->result=$this->mysqli->query($query);
        }
        public function courseId($id){
            $query="select number,name,credit,time from t_course where status=0 and id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function courseInput($number,$name,$credit,$time){
            $query="insert into t_course(number,name,credit,time,create_time) values('$number','$name','$credit','$time',now())";
            $this->result=$this->mysqli->query($query);
        }
        public function courseEdit($id,$number,$name,$credit,$time){
            $query="update t_course set number='$number',name='$name',credit='$credit',time='$time',update_time=now() where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function courseDelete($id){
            $query="update t_course set delete_time=now(),status=1 where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function courseQuery($query){
            $query="select id,number,name,credit,time,create_time,update_time from t_course where (number like '%$query%' or name like '%$query%') and status=0";
            $this->result=$this->mysqli->query($query);
        }

//        管理成绩信息
        public function scoreSelect(){
            $query="select * from v_score_second";
            $this->result=$this->mysqli->query($query);
        }
        public function scoreInput($student_id,$course_id,$score){
            $query="insert into t_score(student_id,course_id,score,create_time) values('$student_id','$course_id','$score',now())";
            $this->result=$this->mysqli->query($query);
        }

//        查询学生学习成绩   模糊查询 like '$....$'
        public function  select($number){
            $query="select number,name,course,score from v_score where number like'%$number%'";
            $this->result=$this->mysqli->query($query);
        }

//        管理任课老师信息
        public function teacherSelect(){
            $query="select id,number,password,name,create_time,update_time from t_teacher where status=0 order by id desc ";
            $this->result=$this->mysqli->query($query);
        }
        public function teacherID($id){
            $query="select number,password,name from t_teacher where status=0 and id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function teacherInput($number,$password,$name){
            $query="insert into t_teacher(number,password,name,create_time) values('$number','$password','$name',now())";
            $this->result=$this->mysqli->query($query);
        }
        public function teacherEdit($id,$number,$password,$name){
            $query="update t_teacher set number='$number',password='$password',name='$name',update_time=now() where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function teacherDelete($id){
            $query="update t_teacher set delete_time=now(),status=1 where id='$id'";
            $this->result=$this->mysqli->query($query);
        }
        public function teacherCourse($number){
            $query="select * from v_teacher_course where 任课老师账号='$number'";
            $this->result=$this->mysqli->query($query);
        }
        public function studentCourse($name){
            $query="select * from v_student where 课程='$name'";
            $this->result=$this->mysqli->query($query);
        }
        public function studentScore($name){
            $query="select * from v_score_second where 课程名='$name'";
            $this->result=$this->mysqli->query($query);
        }

        //学号算法
        public function number($sex,$age){
        //date('Y') +性别+出生年月+5位随机数
        /*  mt_rand(1, 99999) 随机取个1~99999之间的数
            str_pad(param1, param2, param3, param4）
            param1是要改变的值，param2是要想定param1位数，param3是如果param1位数不够param2位要补充的数，param4是在左边补还是右边补还是左右两侧*/
            $number = date('Y') .$sex.$age. str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
            return $number;
        }
        //剩下课程
        public function teacherSeleteCourse(){
            $query="select id,name from v_remaining_course";
            $this->result=$this->mysqli->query($query);
        }
        //剩下学生
        public function teacherSeleteStudent($id){
            $query="select id,name FROM t_student where id not in (select student_id FROM t_score where course_id='$id')";
            $this->result=$this->mysqli->query($query);
        }
        public function teacherInputCourse($teacher,$course){
            $query="insert into t_teacher_course(teacher_id,course_id,create_time) values('$teacher','$course',now())";
            $this->result=$this->mysqli->query($query);
        }
    }



