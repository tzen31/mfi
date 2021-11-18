<?php
class Peaks {
  // Properties
  public $id;
  public $lat;
  public $lon;
  public $altitude;
  public $name;

  // Methods
  public function getDatabaseConnection() {
    try {
      $user = "root";
      $pass = "";
      $pdo = new PDO('mysql:host=localhost;dbname=mfi', $user, $pass);
      $pdo->setAttributes(PDO::ATTR_ERRMODE, pdo:: ERRMODE_EXCEPTION);
      echo "OK !";
      return $pdo;
    } catch (PDOException $e) {
      print "Erreur !; " . $e->getMessage() . "<br/>";
      die(); 
    }
  } 


  function readPeak($id)
  {
      $sql="SELECT * from peaks where id=$id";
      $stmt = $con->query($sql);
      $row=$stmt->fetchAll();
      if (!empty($row))
      {
        return $row[0];
      }
  }
  
  function createPeak($id)
  {
      $sql="INSERT INTO peaks ($lat, $lon, $altitude, $name)
              VALUES ('$lat', '$lon', '$altitude', '$name')";
      $con->exec($sql);        
  }
  
  function updatePeak($latitude, $longitude, $altitude)
  {
      $sql="UPDATE peaks set lat='$lat', lon='$lon', altitude='$altitude', name='$name'";
      $stmt = $con->query($requete);
  }

  function deletePeak($id)
  {
      $sql="DELETE from peaks where id='$id'";
      $stmt = $con->query($requete);
  }
  
}

