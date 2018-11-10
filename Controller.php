<?php

class Controller {
  var $model; // Model
  var $view; // View

  function __construct ($dao) {
    $this->model=new Model($dao);
  }
  function getView() {
    return $this->view;
    }
}

class listController extends Controller{ //extends表示继承
  function __construct ($dao) {
    parent::__construct($dao);
    $this->view=new listView($this->model);

  }
}

class rectangleController extends Controller{
  function __construct ($dao, $rectangle) {
    $this->createAction($dao, $rectangle);
  }

  public function createAction($dao, $rectangle) {
    parent::__construct($dao);
    $this->view=new rectangleView($this->model, $rectangle);

  }
}
class putController extends Controller{
  function __construct ($dao, $rectangle) {
    parent::__construct($dao);
    $this->view=new editRectangleView($this->model, $rectangle);
  }

}

class deleteController extends Controller{
  function __construct ($dao, $id) {
    parent::__construct($dao);
    $this->view=new deleteView($this->model, $id);
  }
}

class indexController extends Controller{
  function __construct ($dao) {
    parent::__construct($dao);
    $this->view=new indexView($this->model);
  }
}
?>