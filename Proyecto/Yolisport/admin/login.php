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
                <a href="../index.php"
                   class="navbar-brand"
                   style="min-width: 0">
                    <img class="navbar-brand-icon"
                         src="assets/images/stack-logo-blue.svg"
                         width="25"
                         alt="YOLISPORT">
                    <span>YOLISPORT</span>
                </a>
            </div>

            <h4 class="m-0">Sign In!</h4>
            <!-- <p class="mb-5">Create an account with YOLISPORT</p> -->

            <form action="login.php" method="post">
                
                <div class="form-group">
                    <label class="text-label"
                           for="email_2">Email Address:</label>
                    <div class="input-group input-group-merge">
                        <input id="email_2"
                               type="email"
                               required=""
                               name= "admin_email"
                               class="form-control form-control-prepended"
                               placeholder="Enter Your Email">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="password_2">Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password_2"
                               type="password"
                               required=""
                               name="admin_pass"
                               class="form-control form-control-prepended"
                               placeholder="Enter your password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                <input class="btn btn-primary mb-2"
                            type="submit" name="Admin_login" value="Admin_login"><br>
                    
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
  if (isset($_POST['Admin_login'])){
    $admin_email= ($_POST['admin_email']);
    $admin_password= ($_POST['admin_pass']);
    $select_admin="SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_pass='$admin_password'";
    $run_admin=mysqli_query($con, $select_admin);
    $row_count=mysqli_num_rows($run_admin);
    $row_adm=mysqli_fetch_array($run_admin);
    if ($row_count==1) {
      $_SESSION['admin_email']=$admin_email; //create session variable
      $_SESSION['admin_email']=$admin_email; //create session variable
      $_SESSION['admin_name']=$row_adm['admin_name'];
      $_SESSION['admin_id']=$row_adm['admin_id'];
      header('location: index.php');
    }
    else{
      echo "<script>alert('Invalid Email or Password')</script>";
    }
  }  //Login Script End
  ob_end_flush();
?>