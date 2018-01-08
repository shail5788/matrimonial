<?php
   
  include_once("resource/apiClass.php");
  
  $opt_number=$_POST['otp'];
  
  $response=$obj->verify_otp($opt_number);
  echo json_encode($response); 
  

 ?>