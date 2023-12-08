<?php 

$adminId  = '';
$adminEmail = $_SESSION['admin_email'];

// Prepare the SQL query
$query = "SELECT * FROM admin WHERE admin_email = '$adminEmail'";

// Execute the query
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    // Fetch the data as an associative array
    $adminData = mysqli_fetch_assoc($result);
    
    // Display the admin data
   
     
    if ($adminData) {
        $adminId = $adminData['admin_id'];
        // Add more fields as needed
    } else {
        echo "No admin data found.";
    }
} else {
    echo "Query execution failed: " . mysqli_error($con);
}


?>



<?php 

$id_admin = '';
$id_user = '';
$train_id  = '';
$train_user_name = '';
$train_user = '';
$exer_id = '';
$exer_date = '';
$exer_name = '';
$exer_series = '';
$exer_repetition = '';
$exer_rest = '';
$exer_id_training = array();


if (isset($_GET['edit-exercises'])) {
	$id=$_GET['edit-exercises'];

	$sel_trai="SELECT * FROM trainings WHERE id='$id'";
	$run_trai=mysqli_query($con, $sel_trai);
	$row_trai=mysqli_fetch_array($run_trai);

    
	$train_id=$row_trai['id'];
	$train_user=$row_trai['id_user'];
    $id_user =$row_trai['id_user'];
 	$id_admin=$row_trai['id_admin'];
    $id_admin=$row_trai['id_admin'];

    $sel_user="SELECT * FROM users WHERE user_id='$train_user'";
    $run_user=mysqli_query($con, $sel_user);
    $row_user=mysqli_fetch_array($run_user);
    $train_user_name = $row_user['user_name'];
}
// echo $train_id;
// exit;

$sel_exer="SELECT * FROM new_exercises WHERE id_training='$train_id'";
$run_exercises=mysqli_query($con, $sel_exer);
$row_exercises=mysqli_fetch_array($run_exercises);
if(isset($row_exercises)){


    $exer_id = $row_exercises['id'];
    $exer_date = $row_exercises['date'];

    if(isset($exer_date)){
        $exer_date = date_create($exer_date);
        $exer_date = date_format($exer_date,"Y-m-d");

    }


$exer_name = $row_exercises['name'];
$exer_series = $row_exercises['series'];
$exer_repetition = $row_exercises['repetition'];
$exer_rest = $row_exercises['rest'];
$exer_id_training  = $row_exercises['id_training'];
$exer_rest = explode("-", $exer_rest);
$hr = '';
$min = '';
$sec = '';
if (isset($exer_rest['0'])) {
    $hr = $exer_rest['0'];
}
if (isset($exer_rest['1'])) {
    $min = $exer_rest['1'];
}
if (isset($exer_rest['2'])) {
    $sec = $exer_rest['2'];
}


}



?>
                    <div class="mdk-drawer-layout__content page">

                        <div class="container-fluid page__heading-container">
                            <div class="page__heading d-flex align-items-end">
                                <div class="flex">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active"
                                                aria-current="page">Exercise</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">Edit Exercise</h1>
                                </div>
                               
                            </div>
                        </div>

                        <div class="container-fluid page__container">

                            

                            <div class="card card-form">
                                <div class="row no-gutters">
                                    <div class="col-lg-12 card-form__body card-body">
                                        <form method="post" action="">
                                            <div class="">
                                                <div class="form-row">
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="name">Select User</label>
                                                        <select name="user_id" type="text"
                                                               class="form-control"
                                                               id="name"
                                                               required="">
                                                               <option value="<?php echo $train_user; ?>"><?php echo $train_user_name; ?></option>
                                                               <?php
						$get_user="SELECT * FROM users";
						$run_user=mysqli_query($con, $get_user);
						while($row_days=mysqli_fetch_array($run_user)){
							$user_id=$row_days['user_id'];
							$user_name=$row_days['user_name'];
							echo "<option value='$user_id'>$user_name</option>";
						}
					?>
                                                        </select>
                                                     
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="name">Name</label>
                                                        <input type="text"
                                                        name="name"
                                                               class="form-control"
                                                               id="name"
                                                               placeholder="Enter Name"
                                                               value="<?php echo $exer_name; ?>"
                                                               required="">
                                                     
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="date">Date</label>
                                                        <input type="date" name="date"
                                                               class="form-control"
                                                               id="date"
                                                               placeholder="Enter Date"
                                                               value="<?php echo $exer_date; ?>"
                                                               required="">
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="series">Series</label>
                                                        <input type="number" name="series"
                                                               class="form-control"
                                                               id="series" value="<?php echo $exer_series; ?>"
                                                               required="" min="0">
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-row">
                                                    
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="repetition">Repetition</label>
                                                        <input type="number" name="repetition"
                                                               class="form-control"
                                                               id="repetition" value="<?php echo $exer_repetition; ?>"
                                                               required="" min="0">
                                                        
                                                    </div>
                                                    <div class="col-2 col-md-2 mb-3">
                                                <label for="series">Rest: </label>
                                                <label for="hrs">Hrs</label>
                                                        <input type="number" name="hrs"
                                                               class="form-control"
                                                               id="hrs"
                                                               required=""  min="0" max="24" value="<?php echo $hr; ?>">
                                                    </div>
                                                    <div class="col-2 col-md-2 mb-3">
                                                        <label for="min">Min</label>
                                                        <input type="number" name="min"
                                                               class="form-control"
                                                               id="min" value="<?php echo $min; ?>"
                                                               required="" min="0" max="60">
                                                    </div>
                                                    <div class="col-2 col-md-2 mb-3">
                                                        <label for="sec">Sec</label>
                                                        <input type="number" name="sec"
                                                               class="form-control" value="<?php echo $sec; ?>"
                                                               id="sec"
                                                               required="" min="0" max="60">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <input type="submit" name="update_workout" class="btn btn-primary"
                                                     value="Upate Workout">
                                        </form>
                                    </div>
                                </div>
                            </div>



                           
                        </div>

                    </div>
                    <!-- // END drawer-layout__content -->

                    
 
<?php 
          
	if (isset($_POST['update_workout']))
	{
         
       
		//Text Data Variables
		$name= $_POST['name'];
		$date= $_POST['date'];
		$userId= $_POST['user_id'];
		$repetition= $_POST['repetition'];
        $series= $_POST['series'];
        $hrs= $_POST['hrs'];
		$min= $_POST['min'];
        $sec= $_POST['sec'];
        $rest    = $hrs.'-'. $min .'-'.$sec;
         $update_tra = "UPDATE trainings SET id_user='$id_user', id_admin='$id_admin' WHERE id='$train_id'";
        $run_tra = mysqli_query($con, $update_tra);
       
        if ($run_tra) {
           
        }
        else{
            echo "<script>alert('Error')</script>";
        }
        $lastInsertedId = mysqli_insert_id($con);
         
        //Query For Inserting Workout Into Database.....
        $update_exer = "UPDATE new_exercises SET date='$date', name='$name', series='$series', repetition='$repetition', rest='$rest' WHERE id='$exer_id'";
			$run_update = mysqli_query($con, $update_exer);
			if ($run_update) {
				echo "<script>alert('Exercise Updated')</script>";
				echo "<script>window.open('index.php?view-exercises','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
	}
    ob_end_flush();
?>