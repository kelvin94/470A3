<?php
/**
* 一个用来访问MySQL的类
* 仅仅实现演示所需的基本功能，没有容错等
* 代码未作修改，只是把注释翻译一下，加了点自己的体会
*/
class DataAccess {
var $db; //用于存储数据库连接
var $query; //用于存储查询源
//! 构造函数.
/**
* 创建一个新的DataAccess对象
* @param $host 数据库服务器名称
* @param $user 数据库服务器用户名
* @param $pass 密码
* @param $db 数据库名称
*/
function __construct($host,$user,$password,$dbname) {
  // $this->db=mysqli_connect($host,$user,$pass); //连接数据库服务器
  $this->db = mysqli_connect( $host, $user, $password, $dbname ) or die( "ERROR : " . mysqli_error() ); // NOTE: mysqli_connect() will return an object representing the connection to the database, or FALSE on failure
  
  // if($this->db->connect_errno) {
  //   echo "Failed to connect to MySQL: (" . $this->db->connect_errno . ") " . $this->db->connect_error;
  // }
  // mysqli_select_db($this->db,$db); //选择所需数据库
  //特别注意$db和$this->db的区别
  //前者是构造函数参数
  //后者是类的数据成员
  // TODO: 检查 rectangle table是否存在不在就create
  $result2 = $this->db->query("CREATE TABLE Rectangles(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(ID),
    Width int,
    Height int,
    Color varchar(255));");
  // $result2 = mysqli_query($this->db, $query);
  echo "<br>";
  echo "<br>";
  echo $result2;
  echo "<br>";
  if ($result = mysqli_query($this->db, "SHOW TABLES LIKE 'rectangles'")) {
    echo "<br>";
    if($result->num_rows < 1 || $result == null) {
        echo "Table not exists";
        // $query = "SELECT * FROM students";
        // $query = "CREATE TABLE Rectangles(Width int,
        //   Height int,
        //   Color varchar(255));";
        $result2 = $this->db->query("CREATE TABLE Rectangles(
          ID int NOT NULL AUTO_INCREMENT,
          PRIMARY KEY(ID),
          Width int,
          Height int,
          Color varchar(255));");
        // $result2 = mysqli_query($this->db, $query);
        echo "<br>";
        echo "<br>";
        echo $result2;
        echo "<br>";
      }
  }
  else {
      echo "Table does not exist";
  }
}
//! 执行SQL语句
/**
* 执行SQL语句，获取一个查询源并存储在数据成员$query中
* @param $sql 被执行的SQL语句字符串
* @return void
*/
function fetch($sql) {
// $this->query=mysql_unbuffered_query($sql,$this->db); // Perform query here
  $this->query=mysqli_query($this->db,$sql)or trigger_error($this->db->error."[$sql]"); // Perform query here

}
//! 获取一条记录
/**
* 以数组形式返回查询结果的一行记录，通过循环调用该函数可遍历全部记录
* @return mixed
*/
function getRow () {
if ( $row=mysql_fetch_array($this->query,MYSQL_ASSOC) )
//MYSQL_ASSOC参数决定了数组键名用字段名表示
return $row;
else
return false;
}
}
?>