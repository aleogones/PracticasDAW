<?php 

// include ("includes/db.php");

	if (isset($_GET['delete-exercise'])) {
		$delete_id=$_GET['delete-exercise'];

        $delete_trai="DELETE FROM 	trainings WHERE id ='$delete_id'";
		mysqli_query($con,$delete_trai);

        $delete_exer="DELETE FROM new_exercises WHERE id_training='$delete_id'";
        $run_delete=mysqli_query($con,$delete_exer);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('index.php?view-exercises','_self')</script>";
		}

	}

?>