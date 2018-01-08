<?php
    
    include_once("resource/apiClass.php");
  
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $data=$obj->user_authentication($username,$password);
    echo json_encode($data);




?>