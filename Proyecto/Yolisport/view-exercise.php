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
$hr = '';
$min = '';
$sec = '';

if (isset($_GET['view-exercise'])) {
	$id=$_GET['view-exercise'];

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
$exer_coments = $row_exercises['coments'];
$exer_rest = explode("-", $exer_rest);

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

<div style="padding-bottom: calc(5.125rem / 2); position: relative; margin-bottom: 1.5rem;">
                            <div class="bg-primary"
                                 style="min-height: 150px;">
                               <h1 style="text:center;"> <center>No Pain No Gain! </center><h1>
                            </div>
                        </div>


                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <div class="tab-content">
                                        <div class="tab-pane active"
                                             id="activity">

                                            <div class="card">
                                                <div class="px-4 py-3">
                                                    <div class="d-flex mb-1">
                                                        
                                                        <div class="flex">
                                                            <div class="d-flex align-items-center mb-1">
                                                                <strong class="text-15pt">Exercise Name: </strong>
                                                                <small class="ml-2 "><?php echo $exer_name  ?></small>
                                                            </div>

                                                            <div class="d-flex align-items-center mb-1">
                                                                <strong class="text-15pt">Series: </strong>
                                                                <small class="ml-2 "><?php echo $exer_series  ?></small>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-1">
                                                                <strong class="text-15pt">Repetition: </strong>
                                                                <small class="ml-2 "><?php echo $exer_repetition  ?></small>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-1">
                                                                <strong class="text-15pt">Rest: </strong>
                                                                <small class="ml-2 ">Hrs: <?php   echo $hr  ?> Min:  <?php echo $min  ?> Sec: <?php echo $sec  ?></small>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-1">
                                                                <strong class="text-15pt">Date: </strong>
                                                                <small class="ml-2 "><?php echo $exer_date  ?></small>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-1">
                                                                <strong class="text-15pt">Coments: </strong>
                                                                <small class="ml-2 "><?php echo $exer_coments  ?></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>

                    </div>