<?php

if (isset($_GET['profile-update'])) {
	$id=$_GET['profile-update'];

	$sel_adm="SELECT * FROM admin WHERE admin_id='$id'";
	$run_adm=mysqli_query($con, $sel_adm);
	$row_adm=mysqli_fetch_array($run_adm);
    $admin_id  = $row_adm['admin_id'];
    $admin_email  = $row_adm['admin_email'];
    $admin_name = $row_adm['admin_name'];
}

?>


<div class="mdk-drawer-layout__content page">

<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">profile</li>
                </ol>
            </nav>
            <h1 class="m-0">Edit Profile</h1>
        </div>
       
    </div>
</div>
                        <div class="container-fluid page__container">

                            

                            <div class="card card-form">
                                <div class="row no-gutters">
                                    <div class="col-lg-12 card-form__body card-body">
                                        <form class="validatedForm" action="" method="post">
                                            <div class="">
                                                <div class="form-row">
                                                   
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="name">Name</label>
                                                        <input name="name" type="text"
                                                               class="form-control"
                                                               id="name"
                                                               placeholder="Enter Name"
                                                               value="<?php  echo $admin_name;  ?>"
                                                               required="">
                                                     
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email"
                                                               class="form-control"
                                                               id="email"
                                                               placeholder="Enter Email"
                                                               value="<?php  echo $admin_email;  ?>"
                                                               required="">
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="password">Password</label>
                                                        <input type="password"
                                                               class="form-control"
                                                               id="password"
                                                               name="password"
                                                                >
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="password_confirm">Confirm Password</label>
                                                        <input type="password"
                                                               class="form-control"
                                                               id="password_confirm" name="password_confirm"
                                                               >
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <input name="profileUpdate" value="Submit" class="btn btn-primary"
                                                    type="submit">
                                        </form>
                                    </div>
                                </div>
                            </div>



                            
                        </div>

                    </div>
                    <!-- // END drawer-layout__content -->

                    
<?php 
          
	if (isset($_POST['profileUpdate']))
	{
		//Text Data Variables
		$name= $_POST['name'];
		$email= $_POST['email'];
		$password= $_POST['password'];

        if(!empty($password)){
            $update_admin = "UPDATE admin SET admin_email='$email', admin_name='$name' , admin_pass='$password' WHERE admin_id='$id'";
        }else{
            $update_admin = "UPDATE admin SET admin_email='$email', admin_name='$name'  WHERE admin_id='$id'";
        }
     
        
        $run_admin = mysqli_query($con, $update_admin);
       
        if ($run_admin) {
            $_SESSION['admin_email']=$_POST['email'];; //create session variable
            $_SESSION['admin_name']=$_POST['name'];;
           
            echo "<script>alert('Profile Updated!')</script>";
                 
            echo "<script>window.open('index.php','_self')</script>";
           
        }
        else{
            echo "<script>alert('Error')</script>";
        }
    
	}
    ob_end_flush();
?>