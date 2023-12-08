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
    echo "Query execution failed: " . mysqli_error($connection);
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
                        aria-current="page">Exercise</li>
                </ol>
            </nav>
            <h1 class="m-0">Create Exercise</h1>
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
                                                               <option>Select a User</option>
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
                                                               value=""
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
                                                               value=""
                                                               required="">
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="series">Series</label>
                                                        <input type="number" name="series"
                                                               class="form-control"
                                                               id="series"
                                                               required="" min="0">
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-row">
                                                    
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="repetition">Repetition</label>
                                                        <input type="number" name="repetition"
                                                               class="form-control"
                                                               id="repetition"
                                                               required="" min="0">
                                                        
                                                    </div>
                                                    <div class="col-2 col-md-2 mb-3">
                                                <label for="series">Rest: </label>
                                                <label for="hrs">Hrs</label>
                                                        <input type="number" name="hrs"
                                                               class="form-control"
                                                               id="hrs"
                                                               required=""  min="0" max="24">
                                                    </div>
                                                    <div class="col-2 col-md-2 mb-3">
                                                        <label for="min">Min</label>
                                                        <input type="number" name="min"
                                                               class="form-control"
                                                               id="min"
                                                               required="" min="0" max="60">
                                                    </div>
                                                    <div class="col-2 col-md-2 mb-3">
                                                        <label for="series">Sec</label>
                                                        <input type="number" name="sec"
                                                               class="form-control"
                                                               id="series"
                                                               required="" min="0" max="60">
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-row">
                                                     <div class="col-12 col-md-12 mb-3">
                                                        <label for="coments">Coments</label>
                                                        <input type="text" name="coments"
                                                               class="form-control"
                                                               id="coments"
                                                               >
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" name="insert_workout" class="btn btn-primary"
                                                     value="Assign Workout">
                                        </form>
                    </div>
                                </div>
                            </div>



                           
                        </div>

                    </div>
                    <!-- // END drawer-layout__content -->
             

                    <?php 
          
          if (isset($_POST['insert_workout']))
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
              $coments = $_POST['coments'];
               $insert_tra =  "INSERT INTO trainings (id_user, id_admin) VALUES ('$userId', '$adminId')";
              
              $run_tra = mysqli_query($con, $insert_tra);
             
              if ($run_tra) {
                 
              }
              else{
                  echo "<script>alert('Error')</script>";
              }
              $lastInsertedId = mysqli_insert_id($con);
               
              //Query For Inserting Workout Into Database.....
              $insert_exer = "insert into new_exercises(name, date, id_admin, repetition, series, rest, id_training, coments) values('$name','$date','$adminId','$repetition','$series','$rest', '$lastInsertedId', '$coments')";
              $run_exer = mysqli_query($con, $insert_exer);
              if ($run_exer) {
                  echo "<script>alert('Exercise Inserted')</script>";
                  echo "<script>window.open('index.php?add-exercises','_self')</script>";
              }
              else{
                  echo "<script>alert('Error')</script>";
              }
          }
          ob_end_flush();
      ?> 