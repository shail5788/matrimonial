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

<!--online start-->
<div class="online-chat">
  <div class="title">ONLINE MATCHES<div class="chat-icon fa fa-wechat">&nbsp;</div></div>
  <div class="chat-list-box" style="display:none;">
    <div class="chat-list">
      <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image1.jpg" /></div>
      <div class="name"><p>Ravi Kumar</p></div>
      <div class="icon"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image2.jpg" /></div>
      <div class="name"><p>Anjan Sharma</p></div>
      <div class="icon active"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image3.jpg" /></div>
      <div class="name"><p>Kapil Goswami</p></div>
      <div class="icon"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image4.jpg" /></div>
      <div class="name"><p>Rawat jain</p></div>
      <div class="icon active"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image5.jpg" /></div>
      <div class="name"><p>Sanjay Kholi</p></div>
      <div class="icon"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image6.jpg" /></div>
      <div class="name"><p>Ramesh Nagar</p></div>
      <div class="icon active"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image1.jpg" /></div>
      <div class="name"><p>Ravi Kumar</p></div>
      <div class="icon"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image2.jpg" /></div>
      <div class="name"><p>Anjan Sharma</p></div>
      <div class="icon active"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image4.jpg" /></div>
      <div class="name"><p>Rawat jain</p></div>
      <div class="icon active"><p>&nbsp;</p></div>
    </div>
    <div class="chat-list">
      <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image5.jpg" /></div>
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
        <div class="logo"><a href="index.php"><img src="<?php echo $wwwroot;?>assets/images/logo.png" /></a></div>
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
            <li><div class="user-img"><img src="<?php echo $wwwroot;?>assets/images/profile-image3.jpg" /></div>
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
    <div class="profile-img"><img src="<?php echo $wwwroot;?>assets/images/profile-image.jpg" /></div>
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
  
<div class="user-profile">
    <!--tab statt-->
    <div class="profile-tab">
          <ul>
           <li class="active">Interests Received<p>7</p></li>
           <li>Filtered Interests<p>3</p></li>
           <li>Accepted Me<p>2</p></li>
           <li>Messages Me<p>8</p></li>
          </ul>
    </div>
    <!--tab close-->
    
    <!--profile-image start-->
    <div class="row">
    
      <div class="profile-post row">
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image1.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image2.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image3.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image4.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image5.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image6.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image7.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image8.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
        
        
      </div>
      <div class="profile-title">Just Joined Matches<strong>155</strong></div>
      <div class="profile-post row">
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image1.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image2.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image3.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image4.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
      </div>
      <div class="profile-title">Desired Partner Matches<strong>255</strong></div>
      <div class="profile-post row">
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image1.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image2.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image3.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="post">
           <div class="img"><img src="<?php echo $wwwroot;?>assets/images/profile-image4.jpg" /></div>
           <div class="text">
            <p>36, 5' 9", New Delhi & Chapra</p>
            <p>Hindi-Delhi, Kshatriya </p>
            <p>B.E/B.Tech</p>
            <p>Rs. 50 - 70lac, Software Professional</p>
           </div>
          </div>
        </div>
      </div>
      
    </div>
    <!--profile-image close-->
</div>

  </div>
</div>
<!--wrapper close-->

<?php include_once("includes/footer.php") ?>