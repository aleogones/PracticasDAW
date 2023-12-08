<?php 
ob_start();
session_start();
include ("includes/db.php");

?> 

<html lang="en" dir="ltr">

      
<!-- Mirrored from demo.frontted.com/YOLISPORT/120/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jun 2023 13:19:11 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="assets/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="assets/css/app.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/app.rtl.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="assets/css/vendor-material-icons.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/vendor-material-icons.rtl.css"
              rel="stylesheet">

        <!-- Font Awesome FREE Icons -->
        <link type="text/css"
              href="assets/css/vendor-fontawesome-free.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/vendor-fontawesome-free.rtl.css"
              rel="stylesheet">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async
                src="https://www.googletagmanager.com/gtag/js?id=UA-133433427-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-133433427-1');
        </script>

    </head>

    <body class="layout-login">

        <div class="layout-login__overlay"></div>
        <div class="layout-login__form bg-white"
             data-perfect-scrollbar>
            <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
                <a href="index.html"
                   class="navbar-brand"
                   style="min-width: 0">
                    <img class="navbar-brand-icon"
                         src="assets/images/stack-logo-blue.svg"
                         width="25"
                         alt="YOLISPORT">
                    <span>YOLISPORT</span>
                </a>
            </div>

            <h4 class="m-0">Sign Up!</h4>
            <!-- <p class="mb-5">Create an account with YOLISPORT</p> -->

            <form action="signup.php" method="post">
                
                <div class="form-group">
                    <label class="text-label"
                           for="user_name">Username:</label>
                    <div class="input-group input-group-merge">
                    <input type="text" id="user_name" name="user_name" class="form-control form-control-prepended" placeholder="Your name..">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="user_email">Email:</label>
                    <div class="input-group input-group-merge">
                    <input type="email" id="user_email" class="form-control form-control-prepended" name="user_email" placeholder="Your email..">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="password">Password:</label>
                    <div class="input-group input-group-merge">
                    <input type="password" id="password" name="user_pass" placeholder="Your password.." class="form-control form-control-prepended">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="user_weight">Weight:</label>
                    <div class="input-group input-group-merge">
                    <input type="text" id="user_weight" class="form-control form-control-prepended" name="user_weight" placeholder="Your weight..">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="user_age">Age	:</label>
                    <div class="input-group input-group-merge">
                    <input type="text" id="user_age" class="form-control form-control-prepended" name="user_age" placeholder="Your age..">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="user_contact">Contact:</label>
                    <div class="input-group input-group-merge">
                    <input type="text" id="user_contact" class="form-control form-control-prepended" name="user_contact" placeholder="Your contact..">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group text-center">
                <input class="btn btn-primary mb-2"
                            type="submit" name="user_signup" value="SignUp"><br>
                    <a class="text-body text-underline"
                       href="login.html">I have already account</a>
                </div>
            </form>
        </div>

        <!-- jQuery -->
        <script src="assets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/vendor/popper.min.js"></script>
        <script src="assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="assets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="assets/vendor/material-design-kit.js"></script>

        <!-- App -->
        <script src="assets/js/toggle-check-all.js"></script>
        <script src="assets/js/check-selected-row.js"></script>
        <script src="assets/js/dropdown.js"></script>
        <script src="assets/js/sidebar-mini.js"></script>
        <script src="assets/js/app.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="assets/js/app-settings.js"></script>

    </body>


<!-- Mirrored from demo.frontted.com/YOLISPORT/120/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jun 2023 13:19:11 GMT -->
</html>

<?php 
	//Login Script Start
  if (isset($_POST['user_login'])){
    $user_email= ($_POST['user_email']);
    $user_password= ($_POST['user_pass']);
    $select_user="SELECT * FROM users WHERE user_email='$user_email' AND user_pass='$user_password'";
    $run_user=mysqli_query($con, $select_user);
    $row_count=mysqli_num_rows($run_user);
    if ($row_count==1) {
      $_SESSION['user_email']=$user_email; //create session variable
      header('location: index.php');
    }
    else{
      echo "<script>alert('Invalid Email or Password')</script>";
    }
  }  //Login Script End


//Sign Up Script Start
  if (isset($_POST['user_signup']))
  {
    $user_name= ($_POST['user_name']);
    $user_email= ($_POST['user_email']);
    $user_password= ($_POST['user_pass']);
    $user_weight= ($_POST['user_weight']);
    $user_age= ($_POST['user_age']);
    $user_contact= ($_POST['user_contact']);
    
    $select_signup_user="SELECT * FROM users WHERE user_email='$user_email'";
    $run_signup_user=mysqli_query($con, $select_signup_user);
    $row_count_signup=mysqli_num_rows($run_signup_user);
    
    
    if($row_count_signup >=1){
        echo "<script>alert('This Email Id is already exist')</script>";
        exit();
      }
    //Validations
    if($user_name==''){
      echo "<script>alert('Please fill out this field')</script>";
      exit();
    }
    elseif ($user_email=='') {
      echo "<script>alert('Please fill out this field')</script>";
      exit();
    }
    elseif ($user_password=='') {
      echo "<script>alert('Please fill out this field')</script>";
      exit();
    }
    elseif ($user_weight=='') {
      echo "<script>alert('Please fill out this field')</script>";
      exit();
    }
    elseif ($user_age=='') {
      echo "<script>alert('Please fill out this field')</script>";
      exit();
    }
    elseif ($user_contact=='') {
      echo "<script>alert('Please fill out this field')</script>";
      exit();
    }
    else{
      $insert_user="INSERT INTO users(user_name, user_email,user_pass,user_weight,user_age,user_contact) VALUES('$user_name','$user_email','$user_password','$user_weight','$user_age','$user_contact')";
      $run_user=mysqli_query($con, $insert_user);
      $lastInsertedId = mysqli_insert_id($con);
      if ($run_user) {
        $_SESSION['user_email']=$user_email; //create session variable
        $_SESSION['user_name']=$user_name;
        $_SESSION['user_weight']=$user_weight; 
        $_SESSION['user_age']=$user_age;
        $_SESSION['user_contact']=$user_contact;
        $_SESSION['user_id']= $lastInsertedId;
        
        echo "<script>alert('Registered Seccussfully..')</script>";
        header('location: index.php');
      }
    }
  }  //Sign Up Script End


?>