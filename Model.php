<?php

class Model {
  var $dao;

  function __construct($dao) {
    $this->dao=$dao;
  }

  public function listRectangles() {
    $this->dao->fetch("SELECT * FROM rectangles;");
    // print_r($this->dao->query->fetch_all());
    return $this->dao->query->fetch_all();
  }

  function createRectangle($width,$height, $color, $rotateAngle, $flashyColor) {
    $sql = "INSERT INTO ".DBNAME.".`rectangles`
    ( `width`, `height`, `color`, `rotateAngle`, `flashyColor`)
    VALUES ( '$width', '$height', '$color', '$rotateAngle', '$flashyColor');";

    $this->dao->fetch($sql);
  }
  ////////////////////////////// EDIT rectangle ///////////
  function editRectangle($id, $width,$height, $color, $rotateAngle, $flashyColor) {
    $sql = 'UPDATE ' . DBNAME . '.' . 'rectangles' .
    ' SET width='.$width . ', height='.$height . ', color=' . '"' . $color. '"' . ', rotateAngle=' . $rotateAngle . ', flashyColor=' . '"' . $flashyColor . '"' .
    ' WHERE id=' . $id. ";";
    $this->dao->fetch($sql);
  }
  //////////////////////////////END EDIT rectangle ///////////

  function deleteRectangle($id) {
    $sql = "DELETE FROM ". DBNAME . '.' . 'rectangles' . ' WHERE ' . 'id=' . $id . ';' ;
    $this->dao->fetch($sql);
  }

}
?>