


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
                                    <h1 class="m-0">Exercise Lists </h1>
                                </div>
                               
                            </div>
                        </div>

                        <div class="container-fluid page__container">
                        

                            <div class="card card-form">
                                <div class="row no-gutters">
                                    
                                    <div class="col-lg-12 card-form__body">

                                        <div class="table-responsive border-bottom"
                                             data-toggle="lists"
                                             data-lists-values='["js-lists-values-employee-name"]'>
                                            <table class="table mb-0 thead-border-top-0">
                                                <thead>
                                                    <tr>
                                                        <th>Exercise No</th>
                                                        <th>Exercise Name</th>
                                                        <th>Series</th>
                                                        <th>Repetition</th>
                                                        <th>Rest</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list"
                                                       id="staff02">
                                                       <?php 
            $i=0;
            $exer_id = '';
			$exer_name = '';
            $exer_series = '';
            $exer_repetition = '';
            $exer_rest = '';

            $sel_train="SELECT * FROM trainings";
			$run_train=mysqli_query($con, $sel_train);
			while ($row_train=mysqli_fetch_array($run_train)) {
				$train_id=$row_train['id'];
                $sel_exer="SELECT * FROM new_exercises WHERE id_training = $train_id";
                $run_exer=mysqli_query($con, $sel_exer);
                $row_exer=mysqli_fetch_array($run_exer);
               
                if(isset($row_exer)){

                    $exer_id= $row_exer['id'];
                    $exer_name=$row_exer['name'];
                    $exer_series=$row_exer['series'];
                    $exer_repetition=$row_exer['repetition'];
                    $exer_rest=$row_exer['rest'];
                }
                
				$i++;
			
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $exer_name; ?></td>
            <td><?php echo $exer_series; ?></td>
            <td><?php echo $exer_repetition ?></td>
            <td><?php echo $exer_rest ?></td>
			<td><a href="index.php?edit-exercises=<?php echo $train_id; ?>">Edit</a></td>
			<td><a href="index.php?delete-exercise=<?php echo $train_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            
                        </div>

                    </div>
                    <!-- // END drawer-layout__content -->

                  