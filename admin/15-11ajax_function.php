<?php
session_start();
include("includes/config.php");

 switch($_POST['actionData']) {
	 
     
    case 'userBlock':
		$id = $_POST['id'];
		if($_POST['block'] == 'block'){
			$select_spa = $con->query("update tbl_user set status = 1 where id='".$id."'");
		}else{
			$select_spa = $con->query("update tbl_user set status = 0 where id='".$id."'");
		}
		if($select_spa){
			echo 1;exit;
		}else{
			echo 0;exit;
		}
	    
	break;
	  case 'delPlan':
	  $id = $_POST['id'];
	  $con->query("Delete from `tbl_plan_price` where plan_id='".$id."'");
	  $delete = $con->query("Delete from `tbl_plan` where plan_id='".$id."'");
	  if($delete){
	  	echo 'success';exit;

	  }else{
	  	echo 'error';exit;
	  }
	  break;
	     case 'delCity':
	  $id = $_POST['id'];
	  $delete = $con->query("Delete from `tbl_city` where id='".$id."'");
	  if($delete){
	  	echo 'success';exit;
        }else{
	  	echo 'error';exit;
	  }
	  break;
	     case 'delReligion':
	  $id = $_POST['id'];
	  $delete = $con->query("Delete from `Religion` where id='".$id."'");
	  if($delete){
	  	echo 'success';exit;
        }else{
	  	echo 'error';exit;
	  }

	  break;
	     case 'delbenifitPlan':
	  $id = $_POST['id'];
	  $delete = $con->query("Delete from `tbl_plan_benfit` where id='".$id."'");
	  if($delete){
	  	echo 'success';exit;
        }else{
	  	echo 'error';exit;
	  }


	  break;
	     case 'delPlanName':
	  $id = $_POST['id'];
	  $delete = $con->query("Delete from `tbl_plan_name` where id='".$id."'");
	  if($delete){
	  	echo 'success';exit;
        }else{
	  	echo 'error';exit;
	  }

	  break;
	     case 'delCountry':
	  $id = $_POST['id'];
	  $delete = $con->query("Delete from `countries` where id='".$id."'");
	  if($delete){
	  	echo 'success';exit;
        }else{
	  	echo 'error';exit;
	  }

	  break;
	     case 'delstate':
	  $id = $_POST['id'];
	  $delete = $con->query("Delete from `states` where id='".$id."'");
	  if($delete){
	  	echo 'success';exit;
        }else{
	  	echo 'error';exit;
	  }

	  break;
	     case 'delBanner':
	  $id = $_POST['id'];
	  $delete = $con->query("Delete from `tbl_banner` where id='".$id."'");
	  if($delete){
	  	echo 'success';exit;
        }else{
	  	echo 'error';exit;
	  }
		
	}

?>