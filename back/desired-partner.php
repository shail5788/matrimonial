<?php 
   session_start();
   include_once("resource/myconfig.php") ;
   include_once("resource/apiClass.php");
   

  if(!isset($_SESSION['user']) || $_SESSION['user']==""){
          header('Location:index.php');
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Meilleure</title>
<script src="assets/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="assets/js/global.js" type="text/javascript"></script>
<link href="assets/css/style.css" type="text/css" rel="stylesheet"/>
<link href="assets/css/global.css" type="text/css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto|Oswald" rel="stylesheet">
<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body>


  <?php include_once("includes/popup.php"); ?>



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
        <div class="logo"><a href="index.html"><img src="assets/images/logo.png" /></a></div>
      </div>
      <div class="col-sm-7">
        <div class="links menu">
          <ul>                              
            <li><a href="index.html">Home</a></li>
            <li><a href="matches.html" class="drop">Matches</a>
              <ul>
                <li><a href="matches.html">Desired Partner Matches</a></li>
                <li><a href="matches.html">Daily Recommendations</a></li>
                <li><a href="matches.html">Just Joined Matches</a></li>
                <li><a href="matches.html">Verified Matches</a></li>
                <li><a href="matches.html">Mutual Matches</a></li>
                <li><a href="matches.html">Members Looking for Me</a></li>
                <li><a href="matches.html">Kundli Matches</a></li>
                <li><a href="matches.html">Shortlisted Profiles</a></li>
                <li><a href="matches.html">Profile Visitors</a></li>
              </ul>
            </li>
            <li><a href="inbox.html" class="drop">Inbox</a>
              <ul>
                <li><a href="inbox.html">Interests</a></li>
                <li><a href="inbox.html">Acceptances</a></li>
                <li><a href="inbox.html">Messages</a></li>
                <li><a href="inbox.html">Requests</a></li>
                <li><a href="inbox.html">Declined / Blocked members</a></li>
                <li><a href="inbox.html">Viewed Contacts</a></li>
              </ul>
            </li>
            <li><a href="index.html" class="drop">Search</a>
              <ul>
                <li><a href="index.html">Search</a></li>
                <li><a href="index.html">My Saved Searches</a></li>
                <li><a href="index.html">Search by Profile ID</a></li>
              </ul>
            </li>
            <li><a href="index.html">Upgrade</a></li>
            <li><a href="index.html">Help</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="links">
          <ul>
            <li><div class="bell"><span class="fa fa-bell">&nbsp;</span><strong>4</strong></div>
              <ul>
                <li><a href="inbox.html">Just Joined Matches</a></li>
                <li><a href="inbox.html">Messages</a></li>
                <li><a href="inbox.html">Photo Requests</a></li>
                <li><a href="inbox.html">Interests Received</a></li>
                <li><a href="inbox.html">Accepted Me</a></li>
                <li><a href="inbox.html">Declined/Cancelled</a></li>
                <li><a href="inbox.html">Daily Recommendations</a></li>
                <li><a href="inbox.html">Filtered Interests</a></li>
                <li><a href="inbox.html">Filtered Interests</a></li>
              </ul>
            </li>
            <li><div class="user-img"><img src="assets/images/profile-image3.jpg" /></div>
              <ul>
                <li><a href="user-detail.html">My Profile (YZZZ8101)</a></li>
                <li><a href="inbox.html">Desired Partner Profile</a></li>
                <li><a href="inbox.html">Alert Manager</a></li>
                <li><a href="inbox.html">Profile Visibility</a></li>
                <li><a href="inbox.html">Hide/Delete profile</a></li>
                <li><a href="inbox.html">Change Password</a></li>
                <li><a href="inbox.html">You are a Free Member</a></li>
                <li><a href="inbox.html">Upgrade</a></li>
                <li><a href="inbox.html">Sign out</a></li>
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
    <div class="profile-img"><img src="assets/images/profile-image.jpg" /></div>
  </div>
  <div class="col-sm-6">
    <div class="profile-detail">
      <h1>Rajni Janjua</h1>
      <h2>Add detail to your profile</h2>
      <ul>
       <li>Upload Photos :  28%</li>
       <li>Upload Photos :  28% </li>
       <li>Upload Photos :  28%</li>
      </ul>
    </div>
  </div>
  <div class="col-sm-5">
    <div class="count-box">
      <div class="box active">
       <div class="count">20</div>
       <p><strong>79</strong></p>
       <p>Daily Recommendations</p>
      </div>
      <div class="box">
       <div class="count">30</div> 
       <p><strong>116</strong></p>
       <p>Just Joined</p>
      </div>
    </div>
  </div>
</div>
<!--member close-->
  

<!--desired start-->
<div class="desired">
          
    <div class="title">
    <strong>Desired Partner Profile</strong>
    <p>The criteria you mention here determines the ‘Desired Partner Matches’ you see. So please review this information carefully. Moreover, Filters determine whose      Interests/Calls you want to receive.
    </p>
    </div>

    <div class="title1">No. of Mutual Matches with below criteria - <strong>155</strong></div>

    <div class="title">
    <strong> <span id="check">&nbsp;</span> I also want to receive matches based on the history of my interests and acceptances</strong>
    <p>These matches may not fully fulfil your Desired Partner Preference.</p>
    </div>

    
    <div class="row flex1">
    
      <div class="col-sm-8">
      
            <!--box 1 start-->
            <div class="box-wrap">
              <div class="title2">Basic Info <div class="edit" onclick="fade('partner-pop')" id="edit-basic-info" ><span class="fa fa-pencil">&nbsp;</span>Edit</div></div>
                <div class="row box">      
                   <div class="col-sm-3"><p><strong>Age</strong></p></div>
                   <div class="col-sm-4"><p id='bage'><?php echo $data[0]['age'] ?> years of age</p></div>
                   <div class="col-sm-3">
                     <div class="btn active">Filter ON
                     </div>
                   </div>
                </div>
                <div class="row box">      
                   <div class="col-sm-3"><p><strong>Height</strong></p></div>
                   <div class="col-sm-4"><p id="bheight"><?php echo $data[0]['height'] ?></p></div>
                </div> 
                <div class="row box">      
                   <div class="col-sm-3"><p><strong>Marital Status</strong></p></div>
                   <div class="col-sm-4"><p id="bms"><?php echo $data[0]['marital_status']; ?></p></div>
                   <div class="col-sm-3">
                     <div class="btn active">Filter ON</div>
                   </div>
                </div> 
        
                <div class="row box">      
                   <div class="col-sm-3"><p><strong>Country</strong></p></div>
                   <div class="col-sm-4"><p id="bc"><?php echo $data[0]['country'][0]['name']; ?></p></div>
                   <div class="col-sm-3">
                     <div class="btn">Filter OFF</div>
                   </div>
                </div> 
                <div class="row box">      
                   <div class="col-sm-3"><p><strong>State</strong></p></div>
                   <div class="col-sm-4"><p id="bs"><?php echo $data[0]['state'][0]['name']; ?></p></div>
                   <div class="col-sm-3">
                     <div class="btn">Filter OFF</div>
                   </div>
                </div> 
                <div class="row box">      
                   <div class="col-sm-3"><p><strong>City</strong></p></div>
                   <div class="col-sm-4"><p id="bcity"><?php echo $data[0]['city']; ?></p></div>
                   <div class="col-sm-3">
                     <div class="btn">Filter OFF</div>
                   </div>
                </div> 
                 
            </div>
            <!--box 1 close-->

          
            <!--box 3 start-->
            <div class="box-wrap">
              <div class="title2">Education & Work <div class="edit" onclick="fade('education-partner-pop')" ><span class="fa fa-pencil">&nbsp;</span>Edit</div></div>
                <div class="row box">      
                   <div class="col-sm-3"><p><strong>Highest Education</strong></p></div>
                   <div class="col-sm-4"><p id="hq"><?php echo $data[0]['highest_qualification'][0]['education'] ?></p></div>
                </div>
                <div class="row box">      
                   <div class="col-sm-3"><p><strong>Occupation</strong></p></div>
                   <div class="col-sm-4"><p id="occ"><?php echo $data[0]['occupation'][0]['professional'] ?></p></div>
                </div> 
                <div class="row box">      
                   <div class="col-sm-3"><p><strong>Income</strong></p></div>
                   <div class="col-sm-4"><p id="bicm"><?php echo $data[0]['income']."/annum"; ?></p></div>
                   <div class="col-sm-3">
                     <div class="btn">Filter OFF</div>
                   </div>
                </div> 
                 
            </div>
            <!--box 3 close-->    
            
            <!--box 4 start-->
              <!-- <div class="box-wrap">
                <div class="title2">Lifestyle <div class="edit" onclick="fade('partner-pop')" ><span class="fa fa-pencil">&nbsp;</span>Edit</div></div>
                  <div class="row box">      
                     <div class="col-sm-3"><p><strong>Dietary habits</strong></p></div>
                     <div class="col-sm-4"><p>-</p></div>
                  </div>
                  <div class="row box">      
                     <div class="col-sm-3"><p><strong>Drinking habits</strong></p></div>
                     <div class="col-sm-4"><p>-</p></div>
                  </div> 
                  <div class="row box">      
                     <div class="col-sm-3"><p><strong>Smoking habits</strong></p></div>
                     <div class="col-sm-4"><p>-</p></div>
                  </div> 
                  <div class="row box">      
                     <div class="col-sm-3"><p><strong>Body type</strong></p></div>
                     <div class="col-sm-4"><p>-</p></div>
                  </div> 
                  <div class="row box">      
                     <div class="col-sm-3"><p><strong>Challenged</strong></p></div>
                     <div class="col-sm-4"><p>-</p></div>
                  </div> 
                   
              </div> -->
            <!--box 4 close-->        
        
            <!--box 5 start-->
            <div class="box-wrap">
              <div class="title2">Desired partner <div class="edit" onclick="fade('about-partner-pop')" ><span class="fa fa-pencil">&nbsp;</span>Edit</div></div>
                <div class="row box">      
                   <div class="col-sm-3"><p><strong>About Desired Partner</strong></p></div>
                   <div class="col-sm-4"><p id="babout"><?php echo $data[0]['about_partner']; ?></p></div>
                   <div class="col-sm-3">
                     <div class="btn">Filter ON</div>
                   </div>
                </div>
            </div>
            <!--box 5 close-->

            <!--box 5 start-->
            <div class="box-wrap">
              <input type="button" class="mainbtn" value="Proceed" />
            </div>
            <!--box 5 close-->        
            
                    
      </div>
      
      <div class="col-sm-4">
       <div class="instruction">
         <h1>Instruction</h1>
         <h2>Filter set as strict filter On</h2>
         <p>Interests from people outside this filter range will go to your Filtered Inbox, and they will also not be able to see your Phone/EmailID.</p>
         <h2>Filter set as strict filter OFF</h2>
         <p>Interests from people outside this filter range will go to your Filtered Inbox, and they will also not be able to see your Phone/EmailID.</p>
         
       </div>
      
      </div>
      
    </div>

</div>
<!--setting close-->


</div>

  </div>
</div>
<!--wrapper close-->

<!--footer start-->
<?php include_once("includes/footer.php") ?>
