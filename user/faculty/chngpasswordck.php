<?php
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	
// initializing variables
$errors = array(); 

// connect to the database
include "../../connect/db_conn.php";

// REGISTER USER
if (isset($_POST['change_pass'])) {
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	// receive all input values from the form
	$op = test_input($_POST['op']);
	$np = test_input($_POST['np']);
	$c_np = test_input($_POST['c_np']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($op)) { array_push($errors, "Old Password is required"); }
  if (empty($np)) { array_push($errors, "New Password is required"); }
  if ($np != $c_np) {
	array_push($errors, "Confirm Password do not match");
  }
  


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
		
		// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $id = $_SESSION['id'];

  	$sql = "SELECT password
                FROM user WHERE 
                id='$id' AND password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	$sql_2 = "UPDATE user
        	          SET password='$np'
        	          WHERE id='$id'";
        	mysqli_query($conn, $sql_2);
			
		
  
?>

<script type="text/javascript">
				alert('Changed');
				window.location="../index.php";
			</script>

<?php
  }
  ?>
  <script type="text/javascript">
				alert('Incorrect');
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