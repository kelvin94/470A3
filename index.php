<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PHP MVC留言板</title>
</head>
<body>
<a href="post.htm">添加新留言</a><br>
<p>


<?php
// print_r($_SERVER);
//echo "<br>";
// print_r($_SERVER);

if($_SERVER['SERVER_ADDR'] != "::1"){
  // Production config DB
  define('DBHOST', 'localhost');
  define('DBNAME', 'test3');
  define("DBUSER", "root");
  define("DBPASS", "");
}else{
  // Developer server
  define('DBHOST', 'localhost');
  define('DBNAME', 'test3');
  define("DBUSER", "root");
  define("DBPASS", "");
}
//!index.php 总入口

require_once('./DataAccess.php');
require_once('./Model.php');
require_once('./View.php');
require_once('./Controller.php');
//创建DataAccess对象（请根据你的需要修改参数值）
$dao=new DataAccess(DBHOST,DBUSER,DBPASS,DBNAME);
//根据$_GET["action"]取值的不同调用不同的控制器子类
// print_r($_POST);

print_r($_SERVER['REQUEST_METHOD']);
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['method'])) {
  if( $_POST['method'] == 'put') {
    $action="put";
  }
} elseif($_SERVER['REQUEST_METHOD'] == "POST") {
  $action="create";
} else {
  $action = '';
}


switch ($action)
{
  // case "post":
  //   $controller=new postController($dao,$_POST);
  //   break;
  case "create":
    $controller=new rectangleController($dao,$_POST);
    // $controller=new listController($dao);
    break;
  case "put":
    $controller=new rectangleController($dao,$_POST);
    // $controller=new listController($dao);
    break;
  // case "list":
  //   $controller=new listController($dao);
  //   break;
  // case "delete":
  //   $controller=new deleteController($dao,$_GET["id"]);
  //   break;
  default:
    $controller=new indexController($dao);
    break;

}




$view=$controller->getView(); //获取视图对象
$view->display(); //输出HTML
?>
</body>
</html>