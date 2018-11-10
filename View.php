<?php

class View {
  protected $_data = array();

  var $model;
  var $output;

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


class listView extends View
{
  function __construct($model)
  {
    parent::__construct($model);
    $this->model->listRectangles();
    while ($rectangles=$this->model->getRows()) {
      $this->output.="done getting all rows";
      
    }
  }
}



class rectangleView extends View
{
  function __construct($model, $rectangle) {
    parent::__construct($model);
    $this->model->createRectangle($rectangle['width'],$rectangle['height'], $rectangle['color'], $rectangle['rotateAngle'], $rectangle['flashyColor']);

    $allRectangles = $this->model->listRectangles();
    require('views/hello.php');
  }

}
class editRectangleView extends View
{
  function __construct($model, $rectangle) {
    parent::__construct($model);
    $this->model->editRectangle($rectangle['id'],$rectangle['width'],$rectangle['height'], $rectangle['color'], $rectangle['rotateAngle'], $rectangle['flashyColor']);

    $allRectangles = $this->model->listRectangles();
    require('views/hello.php');
  }

}


class deleteView extends View
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

    require('views/hello.php');
  }
}
?>