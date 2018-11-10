<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>
<body>


<?php


if($_SERVER['SERVER_ADDR'] != "::1"){
  // Production config DB
  define('DBHOST', '10.150.0.4');
  define('DBNAME', 'cmpt470');
  define("DBUSER", "jyl");
  define("DBPASS", "_kelvin5568QQ");
}else{
  // Developer server
  define('DBHOST', 'localhost');
  define('DBNAME', 'test3');
  define("DBUSER", "root");
  define("DBPASS", "kelvin5568qq"); // desktop
  // define("DBPASS", ""); // laptop
}


require_once('./DataAccess.php');
require_once('./Model.php');
require_once('./View.php');
require_once('./Controller.php');
$dao=new DataAccess(DBHOST,DBUSER,DBPASS,DBNAME);

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['method'])) {
  if( $_POST['method'] == 'put') {
    $action="put";
  } else if($_POST['method'] == 'destroy') {
    $action="destroy";
  }
} elseif($_SERVER['REQUEST_METHOD'] == "POST") {
  $action="create";
} else {
  $action = '';
}


switch ($action)
{

  case "create":
    $controller=new rectangleController($dao,$_POST);
    break;
  case "put":
    $controller=new putController($dao,$_POST);
    break;
  case "destroy":
    $controller=new deleteController($dao,$_POST["id"]);
    break;
  default:
    $controller=new indexController($dao);
    break;

}

$view=$controller->getView();
$view->display();
?>
</body>
</html>