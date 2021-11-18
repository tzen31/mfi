<?php
  //include 'peaks.php';

  //Peaks::getDatabaseConnection();

  //try 
  //{
    $conn="";
    $user = "root";
    $pass = "";
    $servername='localhost';    
    //$conn = new PDO("mysql:host=$servername;dbname=bddtest", $username, $password);
    //$pdo = new PDO('mysql:host=localhost;dbname=mfi', $user, $pass);
    //$pdo->setAttributes(PDO::ATTR_ERRMODE, pdo:: ERRMODE_EXCEPTION);
    $mysqli = mysqli_connect($servername, $user, $pass);
    //echo "Connexion à la Bdd mfi OK !<br>";
    $conn=mysqli_select_db($mysqli, 'mfi');
    //if ($conn) echo "Connexion à la Table peaks OK !";
    //return $pdo;
    //return $conn;
  //} 
  //catch (PDOException $e) 
  //{
  //  print "Erreur !; " . $e->getMessage() . "<br/>";
  //  die(); 
  //}
 

?>