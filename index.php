<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PHP MVC留言板</title>
</head>
<body>
<a href="post.htm">添加新留言</a><br>
<p>


<?php
//!index.php 总入口
/**
* index.php的 调用形式为：
* 显示所有留言：index.php?action=list
* 添加留 言 ：index.php?action=post
* 删除留言 ：index.php?action=delete& id=x
*/
require_once('./DataAccess.php');
require_once('./Model.php');
require_once('./View.php');
require_once('./Controller.php');
//创建DataAccess对象（请根据你的需要修改参数值）
$dao=new DataAccess('localhost','root','kelvin5568qq','test3');
//根据$_GET["action"]取值的不同调用不同的控制器子类
print_r($_POST);
// $action=$_POST["action"];

switch ($action)
{
case "post":
  $controller=new postController($dao,$_POST);
  break;
case "list":
  $controller=new listController($dao);
  break;
case "delete":
  $controller=new deleteController($dao,$_GET["id"]);
  break;
default:
  $controller=new indexController($dao);
  break;

}




$view=$controller->getView(); //获取视图对象
$view->display(); //输出HTML
?>
</body>
</html>