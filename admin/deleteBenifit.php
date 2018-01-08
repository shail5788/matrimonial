<?php   
include("includes/adminFunction.php");
include("includes/config.php");
 if(isset($_POST["del"]) && $_POST["del"]=="del")
  {
      
      $id = $_POST["id"];
      
      $delata = $con->query("DELETE FROM tbl_plan_benfit where id='".$id."'");

      if($delata)
      {
        echo "success";
      }
      else
      {
        echo "fail";
      }
  }
?>   