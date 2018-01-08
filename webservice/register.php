<?php 
   include_once("resource/apiClass.php");
  
    $name=$_POST['name'];
    $username=$_POST['email'];
    $mobile=$_POST['mobile']; 
    $password=$_POST['password'];

    $data=['name'=>$name,"email"=>$username,"mobile"=>$mobile,"password"=>md5($password)];
    
    $response=$obj->register_users($data);
    echo json_encode($response);


 ?>