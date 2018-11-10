<?php
class DataAccess {
var $db;
var $query;

function __construct($host,$user,$password,$dbname) {
  $this->db = mysqli_connect( $host, $user, $password, $dbname ) or die( "ERROR : " . mysqli_error() ); // NOTE: mysqli_connect() will return an object representing the connection to the database, or FALSE on failure
  
  if($this->db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $this->db->connect_errno . ") " . $this->db->connect_error;
  }

  if ($result = mysqli_query($this->db, "SHOW TABLES LIKE 'rectangles';")) {
    if($result->num_rows < 1 || $result == null) {
      $result2 = $this->db->query("CREATE TABLE Rectangles(
        ID int NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(ID),
        Width int,
        Height int,
        Color varchar(255),
        rotateAngle int,
        flashyColor varchar(255));");
    }
  }
  else {
      echo "Table does  exist";
  }
}

// execute the sql statement
function fetch($sql) {
  $this->query=mysqli_query($this->db,$sql)or trigger_error($this->db->error."[$sql]"); // Perform query here
}

}
?>