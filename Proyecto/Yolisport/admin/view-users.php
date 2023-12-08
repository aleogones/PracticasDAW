


                    <div class="mdk-drawer-layout__content page">

                        <div class="container-fluid page__heading-container">
                            <div class="page__heading d-flex align-items-end">
                                <div class="flex">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active"
                                                aria-current="page">User</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">User Lists</h1>
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
                                                        <th>User No</th>
                                                        <th>User Name</th>
                                                        <th>User Email</th>
                                                        <th>User Weight</th>
                                                        <th>User Age</th>
                                                        <th>User Contact</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list"
                                                       id="staff02">
                                                       <?php 
		$i=0;
			$sel_user="SELECT * FROM users";
			$run_user=mysqli_query($con, $sel_user);
			while ($row_user=mysqli_fetch_array($run_user)) {
				$user_id=$row_user['user_id'];
				$user_name=$row_user['user_name'];
				$user_email=$row_user['user_email'];
				$user_weight=$row_user['user_weight'];
				$user_age=$row_user['user_age'];
				$user_contact=$row_user['user_contact'];

				$i++;
			
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $user_name; ?></td>
			<td><?php echo $user_email; ?></td>
			<td><?php echo $user_weight; ?></td>
			<td><?php echo $user_age; ?></td>
			<td><?php echo $user_contact; ?></td>
			<td><a href="index.php?delete_user=<?php echo $user_id; ?>">Delete</a></td>
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

                    