<?php
include('includes/config.php');
$msg = '';

if(isset($_SESSION['error'])){
    echo "cjxd";exit;
    $msg = $_SESSION['error'];
   // $_SESSION['error'] = '';
}
    

if(isset($_POST['submit'])){
    $userExit = $con->query("SELECT * FROM `tbl_user` WHERE email ='".$_POST['username']."' and password ='".md5($_POST['password'])."'");
    if($userExit->num_rows >0){
        $detail = mysqli_fetch_array($userExit);
        $_SESSION['name']  = $detail['name'];
        $_SESSION['email'] = $detail['email'];
        $_SESSION['pic']   = $detail['picture'];
        $_SESSION['userID']   = $detail['id'];
        $_SESSION['error'] ='';
        header('Location: dashboard.php');
    }else{
        $msg = 'Invalid username or password';
        $_SESSION['error'] = $msg;

        header("Refresh:0");

    }

}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Kissan <?php echo $msg;?></b></a>
           
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="#" method="POST">
                    <div class="msg"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                           <!-- <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>-->
                        </div>
                        <div class="col-xs-4">
                            <input  name="submit" class="btn btn-block bg-pink waves-effect" type="submit" value="SIGN IN">
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <!--<a href="sign-up.html">Register Now!</a>-->
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
   <!-- <script src="js/pages/examples/sign-in.js"></script>-->
</body>

</html>