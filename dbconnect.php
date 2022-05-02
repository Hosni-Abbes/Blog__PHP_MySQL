<?php 
  DEFINE ("HOST", "localhost");
  DEFINE ("USERNAME", "root");
  DEFINE ("PASSWORD", "");
  DEFINE ("DBNAME", "blog");

  $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
  if(!$conn){
    throw new Exception("Failed to connect to database");
    exit();
  }


?>