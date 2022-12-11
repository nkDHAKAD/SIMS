<?php
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	
// initializing variables
$errors = array(); 

// connect to the database
include "../../connect/db_conn.php";

// REGISTER USER
if (isset($_POST['new_course'])) {
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	// receive all input values from the form
	$code = test_input($_POST['code']);
	$title = test_input($_POST['title']);
	$duretion = test_input($_POST['duretion']);
	$reg_fee = test_input($_POST['reg_fee']);
	$cer_fee = test_input($_POST['cer_fee']);
	$tution_fee = test_input($_POST['tution_fee']);
	$total_fee = test_input($_POST['total_fee']);
	

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($code)) { array_push($errors, "Code is required"); }
  if (empty($total_fee)) { array_push($errors, "Total Fee is required"); }
  if (empty($tution_fee)) { array_push($errors, "Tution Fee is required"); }
  if (empty($duretion)) { array_push($errors, "course duretion is required"); }
  if (empty($title)) { array_push($errors, "course title is required"); }
  
    
  
  // first check the database to make sure 
  // a student does not already exist with the same reg_no and/or phone
  $user_check_query = "SELECT * FROM course WHERE code='$code' OR title='$title' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['code'] === $code) {
      array_push($errors, "Course code already exists");
    }

    if ($user['title'] === $title) {
      array_push($errors, "course title already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO course (code, title, duretion, reg_fee, cer_fee, tution_fee, total_fee) 
  			  VALUES('$code', '$title', '$duretion', '$reg_fee', '$cer_fee', '$tution_fee', '$total_fee' )";
	mysqli_query($conn, $query);
	

  
?>

<script type="text/javascript">
				alert('SUCCESS');
				window.location="../index.php";
			</script>

<?php
  }
}


?>

<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>