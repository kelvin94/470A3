<?php
//! View 类
/**
* 针对各个功能（list、post、delete）的各种 View子类
* 被Controller调用，完成不同功能的网页显示
*/
class View {
  protected $_data = array();

  var $model; //Model对象
  var $output; //用于保存输出HTML代码 的字符串

  //! 构造函数
  /**
  * 将参数中的Model对象接收并存储在成员变量$this->model中
  * 供子类通 过model对象获取数据
  */
  function __construct (&$model) {
    $this->model=$model;
  }


  function display() { //输出最终格式化的HTML数据
    echo($this->output);
  }
  public function __get($name)
    {
        if (array_key_exists($name, $this->_data)) {
            return $this->_data[$name];
        }
    }
}


class listView extends View //显示所有留言 的子类
{
  function __construct($model)
  {
    parent::__construct($model); //继承父类的构造函数（详见Controller）
    $this->model->listRectangles();
    while ($rectangles=$this->model->getRows()) { //逐行获取数据 
      $this->output.="done getting all rows";
      // $this->output.="姓名：$note[name]<br> 留 言：<br> $note[content]
      // <a href=\"".$_SERVER['PHP_SELF']."?action=delete& amp;id=$note[id]\">删除</a><br> <hr />";
    }
  }
}


class postView extends View //发表留言的子类
{
  function __construct($model, $post) {
    parent::__construct($model);
    $this->model->postNote($post[name],$post[content]);
    $this->output="Note Post OK!<br><a href=\"".$_SERVER['PHP_SELF']."?action=list\">查看</a>";
  }
}
class rectangleView extends View //发表留言的子类
{
  function __construct($model, $rectangle) {
    parent::__construct($model);
    echo "in rectangleView<br>";
    print_r($rectangle);
    $this->model->createRectangle($rectangle['width'],$rectangle['height'], $rectangle['color']);
    
    // print_r($allRectangles);
    // $test = '123';
    
    $allRectangles = $this->model->listRectangles();
    require('views/hello.php');
  }
  
}
class editRectangleView extends View //发表留言的子类
{
  function __construct($model, $rectangle) {
    parent::__construct($model);
    echo "in rectangleView<br>";
    print_r($rectangle);
    // $this->model->createRectangle($rectangle['width'],$rectangle['height'], $rectangle['color']);
    $this->model->editRectangle($rectangle['id'],$rectangle['width'],$rectangle['height'], $rectangle['color']);
    
    // print_r($allRectangles);
    // $test = '123';
    
    $allRectangles = $this->model->listRectangles();
    require('views/hello.php');
  }
  
}


class deleteView extends View //删除留言的子类
{
  function __construct($model, $id)
  {
    parent::__construct($model);
    $this->model->deleteRectangle($id);
    $allRectangles = $this->model->listRectangles();
    require('views/hello.php');
  }
}

class indexView extends View
{
  function __construct($model)
  {
    parent::__construct($model);
    $allRectangles = $this->model->listRectangles();
    // echo "<br> <p>inside indexView of View.php </p>";
    // print_r($allRectangles);
    require('views/hello.php'); // jyl：这样就可以return一个html了
    // echo "<br>";
    // while ($rectangles=$this->model->listRectangles()) { //逐行获取数据 
      // $this->output.="done getting all rows";
      // $this->output.="姓名：$note[name]<br> 留 言：<br> $note[content]
      // <a href=\"".$_SERVER['PHP_SELF']."?action=delete& amp;id=$note[id]\">删除</a><br> <hr />";
    // }
    // parent::__construct($model);
    // $test = 'inside indexView';
    // $height = '200';
    // $width = '300';
    // $this->output="Note Delete OK!<br><a href=\"".$_SERVER['PHP_SELF']."?action=list\">查看</a>";
  }
}
?>