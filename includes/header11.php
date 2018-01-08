<?php 

 session_start();
   include_once("resource/apiClass.php");
   include_once("resource/myconfig.php");

    $links=$obj->get_social_medialink();
    $religions=$obj->get_religion();
    $bannerImage =$obj->allHomeSlider();
       if(isset($_GET['logout']) && ($_GET['logout']=="logout")){
      
       $response=$obj->logout();
       
       if($response){
         
         header('Location:index.php');
       } 
   }
   
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Meilleure</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $wwwroot ?>assets/images/favicon.ico">
<link href="<?php echo $wwwroot;?>assets/css/style.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $wwwroot;?>assets/css/global.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $wwwroot;?>assets/js/jquery.bxslider.css" type="text/css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Roboto|Oswald" rel="stylesheet">
<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="google_translate_element">
<div class="overlay-bg" style="display:none;"></div>



<!-- Login popup -->
<div class="popup-box" id="loginpop" style="display:none;">
  <div class="cut" onclick="popupOpen('loginpop')">X</div>
  <h3>Login To Continue</h3>
   <div class="col-md-12 alert alert-danger" id="showMsg" style="display: none;"></div>
  <form action="#" method="post">
  <div class="forminput">
    <ul>
    <li class="lemail"><input type="text" class="text" id="username" onkeypress="hideBorder('username')"/><label class="username">Your Email <span>*</span></label></li>
    <li class="lpass"><input type="password" class="text" id="password" onkeypress="hideBorder('password')" /><label class="password">Password <span>*</span></label></li>
    <li>
    <p>
    <input type="checkbox" class="textCheck" />
    Remember Me <i class="fa fa-question-circle-o">&nbsp;</i>
    <a href="javascript:void(0);" id="fPasswordjh" onclick="popupOpen('forget_password')">Forgot Password?</a>
    </p>
    </li>    
    </ul>
  </div>


  <div class="pop-control">
    <ul>
    <li><button type="button" class="pop-btn" id="getLogin">Login</button></li>
    <li><a href="#">New on Meillure Couple ?</a><br /><input type="button" class="pop-btn" id="signbtn" onclick="popupOpen('signuppopup')" value="REGISTER FREE"></li>
    </ul>
  </div>
  </form>
</div>
<!-- login popup close -->

<!-- sign up popup open  -->
<div class="popup-box" id="signuppopup" style="display:none;">
  <div class="cut" onclick="popupOpen()">X</div>
  <h3>SignUp To Continue</h3>
  <div class="col-md-12 alert alert-danger" id="regshowMsg" style="display: none;"></div>
  <form id="signUpp" action="#" method="post">
  <div class="forminput">
    <ul>
    <li class="uname">
    <label>Your Name<span>*</span></label>
    <input type="text" class="text" id="name" name="name" />
        <strong>&nbsp;</strong>
    </li>

    <li class="umobile">
    <label>Mobile<span>*</span></label>
    <select class="text small" id="phoneCode" name="phoneCode" />
    	<?php foreach ($get_ccode as $value) : ?>
    	  <option value="<?php echo $value['phonecode'] ?>"><?php echo $value['phonecode'] ?></option>  

    	<?php endforeach ?>
    </select>
    <input type="text" class="text small1" id="phone" name="phone"/>
    <strong>&nbsp;</strong>
    </li>
    <li class="umobile">
    <label>Gender<span>*</span></label>
      <div class="gender">
        <input name="gender" id="gender" type="radio" value="Male" />&nbsp;Male&nbsp;&nbsp;&nbsp;<input name="gender" id="gender" type="radio" value="Female" />&nbsp;Female
      </div>
    </li>

    
    <li class="uemail">
    <label>Your Email<span>*</span></label>
    <input type="email" class="text" id="email" name="email" />
    <strong></strong>
     </li>
    <li class="upass">
    <label>Password<span>*</span></label>
    <input type="password" class="text" id="password" name="password"/>
    <strong></strong> 
    </li>
    
     <li class="urpass">
    <label>Confirm password<span>*</span></label> 
     <input type="password"  name="repassword" class="text" id="repassword"/>
        <strong></strong>
     </li>
     <!--id="userRegister"-->
     <li><button type="submit" class="pop-btn" id="userRegister">REGISTER</button></li> 
    </ul>
  </div>
  </form>
</div>
<!-- signup popup close -->


<!-- forgot popup open  -->
<div class="popup-box" id="forget_password" style="display:none;">
  <div class="cut" onclick="popupOpen()">X</div>
  <h3>Forget Password</h3>

  <div class="col-md-12 showfeedBack" style="display: none;"></div>
  <form action="#" method="post">
  <div class="forminput">
    <ul>
        <li class="forPass">
          <input type="text" class="text" id="emailAddress" onkeypress="hideBorder('emailAddress')"/>
            <label class="emailAddress">Your Email <span>*</span></label>
       </li>
    </ul>
  </div>


  <div class="pop-control">
    <ul>
     <li><button type="button" class="pop-btn" id="changePassword">Forget Password</button></li>
   </ul>
  </div>
  </form>
</div>
<!-- forgot popup close -->



<!-- feedback popup open  -->
<div class="popup-box" id="feedbackpop" style="display:none;">
  <div class="cut" onclick="popupOpen()">X</div>
  <h3>FEEDBACK</h3>
  <div class="col-md-12 alert alert-danger" id="regshowMsg" style="display: none;"></div>
  <form id="feedbackp" action="#" method="post">
  <div class="forminput">
    <ul>
    <li class="uname"><input type="text" class="text" id="name" name="name" onkeypress="hideBorder('name')" />
        <label class='name'>Your Name <span>*</span></label>
    </li>
    <li class="uemail"><input type="email" class="text" id="email" name="email" onkeypress="hideBorder('email')"/><label class="email">Your Email <span>*</span></label>
     </li>
     <li class="umessage"><textarea class="text" id="message" name="message" onkeypress="hideBorder('message')" placeholder="Enter Feedback" /></textarea>
     </li>
     
    </ul>
  </div>
  <div class="pop-control">
    <ul>
    
    <li><button type="button" class="pop-btn" id="saveFeedback">SAVE FEEDBACK</button></li>
    </ul>
  </div>
  </form>
</div>
<!-- feedback popup close -->

<div class="wrapper">
  <!--banner start-->
  <div class="banner">
    <div class="sliderbox"> 
    <div class="homeslider">
    <?php 
    foreach($bannerImage as $img){
      //print_r($img['image']);exit;
      echo '<div class="slide" style="background:url('.$wwwroot.'assets/images/'.$img["image"].') center top no-repeat;"></div>';
    }
    ?>
    </div>
  </div>  

  </div>
  <!--banner close-->

  <!--menu start-->
  <div class="container">
    <div class="header">
      <div class="row middle">
        <div class="col-sm-3">
          <div class="logo"><a href="index.php"><img src="<?php echo $wwwroot;?>assets/images/logo.png" /></a></div>
        </div>
        <div class="col-sm-9">
          <div class="links">
            <ul>
               <li><a href="javascript:void(0)"><?php if($_SESSION['user']) echo $_SESSION['user']['name'];?></a></li>
              <li>
                 <?php if(isset($_SESSION['user'])){?>
                  <a href="<?php echo $wwwroot ?>index.php?logout=logout"  class="drop logout">
                    <img src="<?php echo $wwwroot?>assets/images/header-icon1.png" />
                    Logout
                  </a>
                 <?php }else{ ?> 
                  <a href="javascript:void(0);" onclick="popupOpen('loginpop')" class="drop">
                    <img src="<?php echo $wwwroot?>assets/images/header-icon1.png" />
                    Login
                  </a>
                 <?php } ?> 
              </li> 
              <li>
                <a href="#">
               Help
                </a>
              </li>
              <li>
                <select class="language">
                    <option>French</option>
                    <option>English</option>
                 </select>
             </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
