 <?php 
   session_start();
   include("resource/myconfig.php"); 
   include_once("resource/apiClass.php");
   $links=$obj->get_social_medialink();
   $data=$obj->get_plan();

   if(isset($_GET['logout']) && ($_GET['logout']=="logout")){
      
     $response=$obj->logout();
     if($response){
      header('Location:index.php');
     } 
   }

/*if($_GET['Pid']){
    $planData = $obj->get_planData($_GET['Pid']);
   // print_r($planData);
    $allBenfit = $obj->get_benfit();
  }
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Meillure</title>

<link href="<?php echo $wwwroot;?>assets/css/style.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $wwwroot;?>assets/css/global.css" type="text/css" rel="stylesheet"/>

<link href="https://fonts.googleapis.com/css?family=Roboto|Oswald" rel="stylesheet">
<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body>








<!-- Login Start -->
<div class="popup-box" id="loginpop" style="display:none;">
  <div class="cut" onclick="popupOpen('loginpop')">X</div>
  <h3>Login To Continue</h3>
  <form>
  <div class="forminput">
    <ul>
    <li><input type="text" class="text" id="username"/><label>Your Email <span>*</span></label></li>
    <li><input type="password" class="text" id="password"/><label>Password <span>*</span></label></li>
    <li>
    <p>
    <input type="checkbox" class="textCheck" />
    Stayed In <i class="fa fa-question-circle-o">&nbsp;</i>
    <a href="#">Forgot Password?</a>
    </p>
    </li>    
    </ul>
  </div>
  <div class="pop-control">
    <ul>
    <li><button type="button" class="pop-btn" id="getLogin">Login</button></li>
    <li><a href="#">New on Meillure Couple ?</a><br /><input type="button" class="pop-btn1" onclick="popupOpen('signuppopup')" value="REGISTER FREE"></li>
    </ul>
  </div>
  </form>
</div>
<!-- Login Close -->

<!-- Login Start -->
<div class="popup-box" id="signuppopup" style="display:none;">
  <div class="cut" onclick="popupOpen()">X</div>
  <h3>SignUp To Continue</h3>
  <form id="signUpp" action="#" method="post">
  <div class="forminput">
    <ul>
    <li><input type="text" class="text" id="name" name="name" onkeypress="hideBorder('name')" />
        <label>User Name <span>*</span></label>
    </li>
    <li><input type="text" class="text" id="mobile" name="mobile" onkeypress="hideBorder('mobile')"/>
        <label>Mobile<span>*</span></label>
    </li>
    <li><input type="email" class="text" id="email" name="email" onkeypress="hideBorder('email')"/><label>Your Email <span>*</span></label>
     </li>
    <li><input type="password" class="text" id="Password" name="password" onkeypress="hideBorder('password')"/>
        <label>Password <span>*</span></label>
    </li>
     <li><input type="password" class="text" id="Repassword" onkeypress="hideBorder('repassword')"/>
        <label>Repassword <span>*</span></label>
     </li> 
    </ul>
  </div>
  <div class="pop-control">
    <ul>
    
    <li><button type="button" class="pop-btn" id="userRegister" >REGISTER</button></li>
    </ul>
  </div>
  </form>
</div>
<!-- Login Close -->


<div class="member-wrapper">
<!--banner start-->
<div class="member-banner"></div>
<!--banner close-->

<!--menu start-->
<div class="container">
  <div class="header">
    <div class="row middle">
      <div class="col-sm-3">
        <div class="logo"><a href="index.php"><img src="<?php echo $wwwroot ?>/assets/images/logo.png" /></a></div>
      </div>
      <div class="col-sm-9">
        <div class="links">
          <ul>                              
            <li><a href="index.php">Home</a></li>
         <!--    <li><a href="#">Request Callback</a></li> -->
            <?php $class=""; if(!isset($_SESSION['user'])) $class="none";else $class="display"?> 
            <li style=" display:<?php echo $class; ?>;">
                <a href="<?php echo $wwwroot ?>index.php?logout=logout">Logout</a>
            </li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">1-800-52316-19</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  <div class="upgrade">
    <div class="row middle">
      <div class="col-sm-7">
        <div class="upgradebox"><a href="#">Upgrade now to find your perfect life partner!</a></div>
      </div>
      <div class="col-sm-5">
        <div class="member-link">
          <ul>                              
            <li><a href="#">Why Paid Member? Know More</a></li>
            <li><a href="#">Buy Personalized Services - JS Exclusive</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
</div>
<!--menu close-->
</div>

<!--member start-->
<div class="membership module">
  <div class="container">
    
    <div class="tab-menu">
      <ul>
       <?php $basic=''; $amount=0;foreach ($data as $value) { 
           if($value['id']==3){
              $basic=$value['plan_name'];
              $amount=$value['price'];
           }
 ?>
          <li><a href="javascript:void(0);" id="planID-<?php echo $value['id'] ?>" >
                <?php echo $value['plan_name'] ?>
                <strong>From ₹ <?php echo $value['price']; ?></strong>
             </a>
          </li>
       <?php }?>
    
      <a href="#"  onclick="popupOpen('upgrade')">Compare Plans</a>
      </ul>
    </div>
    
    <div class="tab-detail">
      <div class="row">
        <div class="col-sm-8">
          <div class="tabBox">
            <div class="tabContent">
              <h2 id="planName"><?php echo $data[0]['plan_name']; ?> starts @ &#8377; <?php echo $data[0]['price']; ?></h2>
            
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="info-Box">
            <div class="basicStep">
              <div class="title">Basic Benefits</div>
              <ul>
              <?php 
              
              $allBenfit  = $obj->get_benfit();
              $planBenfit = $obj->getPlan_benfit($data[0]['id']);
              $planBen = array();
              foreach($planBenfit as $benPlan){
                $planBen[] = $benPlan['benifit_id'];

              }
              foreach($allBenfit as $ben){
                $class = 'fa fa-times';
                if(in_array($ben['id'],$planBen)){
                  $class = 'fa fa-check';
                }
                ?>
                  <li><i id="benfitID-<?php echo $ben['id'];?>" class="<?php echo $class;?>"></i> <?php echo $ben['benfit'];?> </li>
                <?php   } ?>
              
              </ul>
            </div>

            <div class="info-price" id="planN"><?php echo $data[0]['plan_name']; ?> starts @ &#8377;<?php echo $data[0]['price']; ?></div>
             <?php if(!isset($_SESSION['user'])){ ?>
            <div class="info-login"><a href="#" onclick="popupOpen('loginpop')">Login to Continue</a></div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!--member close-->
<div class="overlay-bg" style="display:none;"></div>

<!-- upgrade Start -->
<div class="popup-box tablePopup" id="upgrade" style="display:none;">
  <div class="cut" onclick="popupOpen('upgrade')">X</div>
  <table class="table">

    <!--Table head-->
    <thead class="head">
        <tr class="text-white">
            <th>Benefits You Get</th>
           <?php 
              foreach($data as $planName){
                echo '<th>'.$planName['plan_name'].'</th>';
              }
             
          ?>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
    <?php
      foreach($allBenfit as $benfit){
      ?>         
             
        <tr>
            <th scope="row"><?php echo $benfit['benfit'];?></th>
            <?php 
              foreach($data as $planName){
                $planBenfit = $obj->getPlan_benfit($planName['id']);
                $benArr = array();
                foreach($planBenfit as $ben){
                  $benArr[] =$ben['benifit_id'];
                }
                if(in_array($benfit['id'], $benArr)){
                  echo '<td><i class="fa fa-check"></i></td>';
                }else{
                     echo '<td><i class="fa fa-times"></i></td>';

                }
              }
             
          ?>
            
           
        </tr>
       <?php } ?>
    </tbody>
    <!--Table body-->
    
    <!--Table head-->
    <tfoot class="bottom">
        <tr>
            <th>Starts From</th>
             <?php 
              foreach($data as $planName){
                echo '<th>'.$planName['price'].'</th>';
            }
            ?>
        </tr>
    </tfoot>
    <!--Table head-->
    
  </table>
  <!--Table-->
</div>
<!-- close upgrade -->
<?php include('includes/footer.php') ?>
 <script src=http://cdn.webrupee.com/js type=”text/javascript”></script>