<?php 
   session_start();
   if(!isset($_SESSION['user']) || $_SESSION['user']==""){
        header('Location:index.php');
    }
     include("resource/myconfig.php"); 
     include_once("resource/apiClass.php"); 
      $email=$_SESSION['user']['email'];
      $data = $obj->get_sign_user($email);
      $countryName = $obj->get_country_name($data[0]['country']);
      $stateName = $obj->get_state_name($data[0]['province']);
      $cityName = $obj->get_city_name($data[0]['city']);
      $professionName = $obj->get_profession($data[0]['profession']);
      $professionalName = $obj->get_professionalName($data[0]['professional']);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD Xphp 1.0 Transitional//EN" "http://www.w3.org/TR/xphp1/DTD/xphp1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xphp">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Meilleure</title>
<script src="assets/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="assets/js/global.js" type="text/javascript"></script>
<script src="assets/js/validation.js" type="text/javascript"></script>

<link href="assets/css/style.css" type="text/css" rel="stylesheet"/>
<link href="assets/css/global.css" type="text/css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto|Oswald" rel="stylesheet">
<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--editbox start-->
<div class="overlay">&nbsp;</div>
<div class="profile-edit-pop" id="aboutpopup1">
 <div class="view-title">Education & Career <div class="cut" onclick="fade('aboutpopup1')">X</div></div>
     <div class="fieldrow">
       <ul>
         <li><label>About</label><div class="textbox"><textarea id="about" class="text"> <?php echo $data[0]['about'];?></textarea></div></li>
        
        
         <li><label>&nbsp;</label><div class="textbox"><input name="" type="button" class="btn red" value="Submit" /><input name="" type="button" class="btn" value="Cancel" /></div></li>
         
       </ul>
     </div>
</div>
<!--editbox close-->

<!--editbox start-->
<div class="overlay">&nbsp;</div>
<div class="profile-edit-pop" id="aboutpopup">
 <div class="view-title">Education & Career <div class="cut" onclick="fade('aboutpopup')">X</div></div>
     <div class="fieldrow">
       <ul>
         <li><label>Education Department</label><div class="textbox"><input type="text" class="text" /></div></li>
         <li><label>Education</label><div class="textbox"><input type="text" class="text" /></div></li>
         <li><label>Profession</label><div class="textbox"><input id="profession" value="<?php echo $professionName[0]['profession'] ?>"type="text" class="text" /></div></li>
         <li><label>Professional</label><div class="textbox"><input type="text" class="text" id="professional" value="<?php echo $professionalName[0]['professional'] ?>"/></div></li>
        
         <li><label>&nbsp;</label><div class="textbox"><input name="" type="button" class="btn red" value="Submit" /><input name="" type="button" class="btn" value="Cancel" /></div></li>
         
       </ul>
     </div>
</div>
<!--editbox close-->
<!--editbox start-->
<div class="overlay">&nbsp;</div>
<div class="profile-edit-pop" id="basicpopup">
 <div class="view-title">Contact Details <div class="cut" onclick="fade('basicpopup')">X</div></div>
     <div class="fieldrow">
       <ul>
         <li><label>Email id</label><div class="textbox"><input id="email" value="<?php echo $data[0]['email'];?>" type="text" class="text" /></div></li>
         <li><label>Mobile No</label><div class="textbox"><input type="text" id="mobile" value="<?php echo $data[0]['mobile'];?>" class="text" /></div></li>
         <li><label>Address</label><div class="textbox"><input id="address" value="<?php echo $data[0]['address'];?>" type="text" class="text" /></div></li>
         <li><label>Country</label><div class="textbox"><input type="text" class="text" /></div></li>
         <li><label>State / Province</label><div class="textbox"><input type="text" class="text" /></div></li>
         <li><label>City</label><div class="textbox"><input type="text" class="text" /></div></li>
         <li><label>Nationality</label><div class="textbox"><input id="nationality" value="" type="text" class="text" /></div></li>
         <li><label>&nbsp;</label><div class="textbox"><input name="" type="button" class="btn red" value="Submit" /><input name="" type="button" class="btn" value="Cancel" /></div></li>
         
       </ul>
     </div>
</div>
<!--editbox close-->

<!--editbox start-->
<div class="overlay">&nbsp;</div>
<div class="profile-edit-pop" id="critical">
 <div class="view-title">Critical Fields <div class="cut" onclick="fade('critical')">X</div></div>
     <div class="fieldrow">
       <ul>
         <li><label>Date Of Birth</label><div class="textbox"><input type="date" class="text" id="dob" value="<?php echo $data[0]['dob'];?>"/></div></li>
         <li><label>Marital Status</label><div class="textbox">
         <select name="marital" id="marital">
         <?php 
            $selected = '';
            $selected1 = '';
            $selected2 = '';
            $selected3 = '';
            if($data[0]['marital_status'] == 'single')
                $selected = 'selected';
            if($data[0]['marital_status'] == 'divorced')
                $selected1 = 'selected';
            if($data[0]['marital_status'] == 'widowed')
                $selected2 = 'selected';
            if($data[0]['marital_status'] == 'seperated')
                $selected3 = 'selected';

         ?>
           <option value="single" <?php echo $selected;?>>Single</option>
           <option value="divorced" <?php echo $selected1;?>>Divorced</option>
           <option value="widowed" <?php echo $selected2;?>>Widowed</option>
           <option value="seperated" <?php echo $selected3;?>>Seperated</option>
         </select>
         </div>
         </li>
         <li>
         <label>Gender</label>
         <div class="textbox">
         <?php
         $selected = '';
          $selected1 = '';
         if($data[0]['gender'] == ''){
            $selected = 'checked';
         }else{
            $selected1 = 'checked';
         }
         ?>
            <input type="radio" class="text" name="gender" id="gender" value="male" <?php echo $selected;?>/>Male 
            <input type="radio" id="gender" class="text" name="gender" value="female" <?php echo $selected1;?> />Female
         </div>
         </li>
        
         <li><label>&nbsp;</label><div class="textbox"><input id="criticalBtn" type="button" class="btn red" value="Submit" /><input name="" type="button" class="btn" value="Cancel" /></div></li>
         
       </ul>
     </div>
</div>
<!--editbox close-->

<!--editbox start-->
<div class="overlay">&nbsp;</div>
<div class="profile-edit-pop" id="basicD">
 <div class="view-title">Basic Detail <div class="cut" onclick="fade('basicD')">X</div></div>
     <div class="fieldrow">
       <ul>
         <li><label>Full Name</label><div class="textbox">
         <input type="text" id="fullName" class="text" value="<?php echo $data[0]['name'];?>" /></div></li>
         <li>
         <label>Height</label><div class="textbox">
          <input type="text" class="text" id="height" value="<?php echo $data[0]['height'];?>" />
         </div></li>

         <li><label>Weight</label><div class="textbox">
           <input type="text" class="text" id="weight" value="<?php echo $data[0]['wieght'];?>" />
         </div></li>
        
         <li><label>&nbsp;</label><div class="textbox"><input name="" type="button" class="btn red" value="Submit" /><input name="" type="button" class="btn" value="Cancel" /></div></li>
         
       </ul>
     </div>
</div>
<!--editbox close-->

<!--online start-->
<div class="online-chat">
  <div class="title">ONLINE MATCHES<div class="chat-icon fa fa-wechat">&nbsp;</div></div>
  <div class="chat-list-box" style="display:none;">
    <div class="chat-list">
      <div class="img"><img src="images/profile-image1.jpg" /></div>
      <div class="name"><p>Ravi Kumar</p></div>
      <div class="icon"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="images/profile-image2.jpg" /></div>
      <div class="name"><p>Anjan Sharma</p></div>
      <div class="icon active"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="images/profile-image3.jpg" /></div>
      <div class="name"><p>Kapil Goswami</p></div>
      <div class="icon"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="images/profile-image4.jpg" /></div>
      <div class="name"><p>Rawat jain</p></div>
      <div class="icon active"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="images/profile-image5.jpg" /></div>
      <div class="name"><p>Sanjay Kholi</p></div>
      <div class="icon"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="images/profile-image6.jpg" /></div>
      <div class="name"><p>Ramesh Nagar</p></div>
      <div class="icon active"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="images/profile-image1.jpg" /></div>
      <div class="name"><p>Ravi Kumar</p></div>
      <div class="icon"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="images/profile-image2.jpg" /></div>
      <div class="name"><p>Anjan Sharma</p></div>
      <div class="icon active"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="images/profile-image4.jpg" /></div>
      <div class="name"><p>Rawat jain</p></div>
      <div class="icon active"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="images/profile-image5.jpg" /></div>
      <div class="name"><p>Sanjay Kholi</p></div>
      <div class="icon"><p>&nbsp;</p></div>
    </div> 
    
  </div>
</div>
<!--online close-->

<div class="create-wrapper">
<!--banner start-->
<div class="profile-banner"></div>
<!--banner close-->

<!--menu start-->
<div class="container">

  <div class="header">
    <div class="row middle">
      <div class="col-sm-3">
        <div class="logo"><a href="index.php"><img src="images/logo.png" /></a></div>
      </div>
      <div class="col-sm-7">
        <div class="links menu">
          <ul>                              
            <li><a href="index.php">Home</a></li>
            <li><a href="matches.php" class="drop">Matches</a>
              <ul>
                <li><a href="matches.php">Desired Partner Matches</a></li>
                <li><a href="matches.php">Daily Recommendations</a></li>
                <li><a href="matches.php">Just Joined Matches</a></li>
                <li><a href="matches.php">Verified Matches</a></li>
                <li><a href="matches.php">Mutual Matches</a></li>
                <li><a href="matches.php">Members Looking for Me</a></li>
                <li><a href="matches.php">Kundli Matches</a></li>
                <li><a href="matches.php">Shortlisted Profiles</a></li>
                <li><a href="matches.php">Profile Visitors</a></li>
              </ul>
            </li>
            <li><a href="inbox.php" class="drop">Inbox</a>
              <ul>
                <li><a href="inbox.php">Interests</a></li>
                <li><a href="inbox.php">Acceptances</a></li>
                <li><a href="inbox.php">Messages</a></li>
                <li><a href="inbox.php">Requests</a></li>
                <li><a href="inbox.php">Declined / Blocked members</a></li>
                <li><a href="inbox.php">Viewed Contacts</a></li>
              </ul>
            </li>
            <li><a href="index.php" class="drop">Search</a>
              <ul>
                <li><a href="index.php">Search</a></li>
                <li><a href="index.php">My Saved Searches</a></li>
                <li><a href="index.php">Search by Profile ID</a></li>
              </ul>
            </li>
            <li><a href="index.php">Upgrade</a></li>
            <li><a href="index.php">Help</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="links">
          <ul>
            <li><div class="bell"><span class="fa fa-bell">&nbsp;</span><strong>4</strong></div>
              <ul>
                <li><a href="inbox.php">Just Joined Matches</a></li>
                <li><a href="inbox.php">Messages</a></li>
                <li><a href="inbox.php">Photo Requests</a></li>
                <li><a href="inbox.php">Interests Received</a></li>
                <li><a href="inbox.php">Accepted Me</a></li>
                <li><a href="inbox.php">Declined/Cancelled</a></li>
                <li><a href="inbox.php">Daily Recommendations</a></li>
                <li><a href="inbox.php">Filtered Interests</a></li>
                <li><a href="inbox.php">Filtered Interests</a></li>
              </ul>
            </li>
            <li><div class="user-img"><img src="images/profile-image3.jpg" /></div>
              <ul>
                <li><a href="user-detail.php">My Profile (YZZZ8101)</a></li>
                <li><a href="inbox.php">Desired Partner Profile</a></li>
                <li><a href="inbox.php">Alert Manager</a></li>
                <li><a href="inbox.php">Profile Visibility</a></li>
                <li><a href="inbox.php">Hide/Delete profile</a></li>
                <li><a href="inbox.php">Change Password</a></li>
                <li><a href="inbox.php">You are a Free Member</a></li>
                <li><a href="inbox.php">Upgrade</a></li>
                <li><a href="inbox.php">Sign out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
   
</div>
<!--menu close-->
</div>


<!--wrapper start-->
<div class="container">
  <div class="inner-row">

<!--member start-->
<div class="profile-row row middle">
  <div class="col-sm-1">
    <div class="profile-img"><img src="<?php echo  $wwwroot."user-profiles/".$data[0]['picture'] ;?>" /></div>
  </div>
  <div class="col-sm-8">
    <div class="profile-detail">
      <h1><?php echo $data[0]['name'];?></h1>
      <h2>Add detail to your profile</h2>
      <ul>
       <li>Upload Photos :  28%</li>
       <li>Upload Photos :  28% </li>
       <li>Upload Photos :  28%</li>
      </ul>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="progress-bar">
      <div class="count">Profile Completion <strong>75%</strong></div>
      <div class="bar"><ul style="width:75%;">&nbsp;</ul></div>
    </div>
  </div>
</div>
<!--member close-->
  

<!--parter detail box start-->


<div class="row flex1 p-t-b-40">
  
  <!--left detail start-->
  <div class="col-sm-8">
    <div class="partner-detail-box">
    <div class="detail">


<!--Critical start-->
<div class="box">
  <div class="edit-box">&nbsp;</div>
  <div class="view-title">Critical Fields <div class="critical editbtn" onclick="fade('critical')">Edit</div></div>

  <div class="row">
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Date Of Birth</strong></p>
          <p id="dob"><?php echo $data[0]['dob'];?></p>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Marital Status</strong></p>
          <p id="matStatus"><?php echo $data[0]['marital_status'];?></p>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Gender</strong></p>
          <p id="genderData"><?php echo $data[0]['gender'];?></p>
        </div> 
    </div>
</div>    
</div>






<!--basic start-->
<div class="box">
  <div class="view-title">Basic Details <div class="editbtn basicD" onclick="fade('basicD')">Edit</div></div>

  <div class="row">
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Full Name</strong></p>
          <p><?php echo $data[0]['name'];?></p>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Height</strong></p>
          <p><?php echo $data[0]['height'];?> </p>
        </div> 
    </div>
   <div class="col-sm-4">
        <div class="view">
          <p><strong>Weight</strong></p>
          <p><?php echo $data[0]['wieght'];?></p>
        </div> 
    </div>
    <!-- <div class="col-sm-4">
        <div class="view">
          <p><strong>Mother Tongue</strong></p>
          <p>Hindi-Delhi</p>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Annual Income, Location</strong></p>
          <p>Rs. 0 - 1 Lakh, New Delhi </p>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Caste, Sect</strong></p>
          <p>Hindu: Jat, Not filled in </p>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Profile managed by</strong></p>
          <p>His profile is managed by Self</p>
        </div> 
    </div>    -->
  </div>    
</div>
<!--basic close-->


<!--basic start-->
<div class="box">
  <div class="view-title">About me <div class="editbtn aboutpopup1" onclick="fade('aboutpopup1')">Edit</div></div>

  <div class="row">
    <div class="col-sm-12">
        <div class="view">
          <p><?php echo $data[0]['about'];?></p>
        </div> 
    </div>
   <!-- <div class="col-sm-4">
        <div class="view">
          <p><strong>About My Family </strong></p>
          <p>6' 0" </p>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Education</strong></p>
          <p>Hindu</p>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Occupation</strong></p>
          <p>Hindi-Delhi</p>
        </div> 
    </div>-->
  </div>    
</div>
<!--basic close-->
  

<!--education start-->
<div class="box">

  <div class="view-title">Education & Career <div class="editbtn aboutpopup" onclick="fade('aboutpopup')">Edit</div></div>

  <div class="row">
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Education Department</strong></p>
          <p>B.E/B.Tech</p>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Education</strong></p>
          <p>Not filled in </p>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Profession</strong></p>
          <p><?php echo $professionName[0]['profession'] ?></p>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="view">
          <p><strong>Professional</strong></p>
          <p><?php echo $professionalName[0]['professional'] ?></p>
        </div> 
    </div>
   
  </div>    
</div>
<!--education close-->







     </div>
    </div>
  </div>
  <!--left detail close-->
  
  <!--right detail start-->
  <div class="col-sm-4">
    <div class="partner-detail-box">
      <div class="detail">
        
        <div class="box">
          <div class="view-title">Contact Details <div class="basicpopup editbtn" onclick="fade('basicpopup')">Edit</div></div>
        
          <div class="row">
            <div class="col-sm-12">
                <div class="view">
                  <p><strong>Email id</strong></p>
                  <p><?php echo $data[0]['email'];?></p>
                </div> 
            </div>
            <div class="col-sm-12">
                <div class="view">
                  <p><strong>Mobile No</strong></p>
                  <p><?php echo $data[0]['mobile'];?></p>
                </div> 
            </div>
            <div class="col-sm-12">
                <div class="view">
                  <p><strong>Address</strong></p>
                  <p><?php echo $data[0]['address'];?></p>
                </div> 
            </div>
            <div class="col-sm-12">
                <div class="view">
                  <p><strong>Country</strong></p>
                  <p><?php echo $countryName[0]['name'];?></p>
                </div> 
            </div>
            <div class="col-sm-12">
                <div class="view">
                  <p><strong>State / Province</strong></p>
                  <p><?php echo $stateName[0]['name'];?></p>
                </div> 
            </div>
            <div class="col-sm-12">
                <div class="view">
                  <p><strong>City </strong></p>
                  <p><?php echo $cityName[0]['city'];?></p>
                </div> 
            </div>
             <div class="col-sm-12">
                <div class="view">
                  <p><strong>Nationality </strong></p>
                  <p><?php echo $countryName[0]['name'];?></p>
                </div> 
            </div>
           
            
        </div>    
        
        </div>        
        
      </div>
    </div>
  </div>
  <!--right detail close-->
  
</div>




<!--parter detail box close-->


</div>
<!--parter detail box close-->

  </div>
</div>
<!--wrapper close-->

<!--footer start-->
<div class="footer module">
  <div class="container">


    <div class="row">
      <div class="col-sm-3">
        <div class="f-title">Explore</div>
        <div class="link">
        <ul>
         </li>
         <li><a href="#">Home</a></li>
         <li><a href="#">Advanced search</a></li>
         <li><a href="#">Success stories</a></li>
         <li><a href="#">Sitemap</a></li>
        </ul>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="f-title">Services</div>
        <div class="link">
        <ul>
         </li>
         <li><a href="#">Membership Options</a></li>
         <li><a href="#">Meilleure Couple Careers</a></li>
        </ul>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="f-title">Help</div>
        <div class="link">
        <ul>
         </li>
         <li><a href="#">Contact us</a></li>
         <li><a href="#">Feedback / Queries</a></li>
         <li><a href="#">Meilleure Couple centers (32)</a></li>
        </ul>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="f-title">Legal</div>
        <div class="link">
        <ul>
         <li><a href="#">About Us</a></li>
         <li><a href="#">Fraud Alert</a></li>
         <li><a href="#">Terms of use</a></li>
         <li><a href="#">3rd party terms of use</a></li>
         <li><a href="#">Privacy policy</a></li>
         <li><a href="#">Privacy Features</a></li>
         <li><a href="#">Summons/Notices</a></li>
         <li><a href="#">Grievances</a></li>
        </ul>
       </div> 
      </div>
    </div>
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="f-title">App available on</div>
            <div class="link1">
              <ul>
                <li><a href="#"><img src="images/app-icon1.png" class="f-img" /></a></li>
                <li><a href="#"><img src="images/app-icon2.png" class="f-img" /></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-sm-4">
            <div class="f-title">Follow Us</div>
            <div class="link1">
              <ul>
                <li><a href="#"><img src="images/social-icon1.png" /></a></li>
                <li><a href="#"><img src="images/social-icon2.png" /></a></li>
                <li><a href="#"><img src="images/social-icon3.png" /></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-sm-4">
            <div class="f-title">Customer Service (Toll free)</div>
            <div class="callus"><p>1-800-419-6299</p></div>
          </div>
          
        </div>
      </div>
    </div>
    
    
  </div>
</div>
<div class="footer1">
  <p>All rights reserved © 2017 Meilleure Couple Services.</p>
</div>
<!--footer close-->


</body>
</php>
